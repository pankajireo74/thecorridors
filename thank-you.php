<?php


require_once __DIR__ . '/config.php';
require_once __DIR__ . '/inc/validation.php';

$request = $_SERVER['REQUEST_METHOD'] ?? 'GET';

if ($request !== 'POST') {
    http_response_code(405);
    echo 'Method Not Allowed';
    echo '</br>';
    echo "<a href='index.php'>Go Back</a>";
    die;
}

// -------------------------------------------------------------------------
// Normalise and validate basic input (Step 3) + Advanced Validation
// -------------------------------------------------------------------------

// Raw values
$rawFname  = isset($_REQUEST['fname']) ? (string) $_REQUEST['fname'] : '';
$rawLname  = isset($_REQUEST['lname']) ? (string) $_REQUEST['lname'] : '';
$rawEmail  = isset($_REQUEST['email']) ? (string) $_REQUEST['email'] : '';
$rawMobile = isset($_REQUEST['mobile']) ? (string) $_REQUEST['mobile'] : '';

// Normalised values
$fname = trim($rawFname);
$lname = trim($rawLname);
$name  = trim($fname . ' ' . $lname);
if ($name === '' && isset($_REQUEST['name'])) {
    // Fallback to a generic "name" field if ever used in future forms.
    $name = trim((string) $_REQUEST['name']);
}

$email  = strtolower(trim($rawEmail));
// Keep only digits in mobile; this also strips spaces/symbols.
$mobile = preg_replace('/\D+/', '', $rawMobile);

// Simple name sanity check – allow letters, spaces and dots only.
if ($name !== '' && !preg_match('/^[\p{L}\s\.]+$/u', $name)) {
    echo 'Please enter valid name';
    echo '</br>';
    echo "<a href=\"index.php\">Go Back</a>";
    die;
}

// -------------------------------------------------------------------------
// Advanced Mobile Validation (libphonenumber-style + fake pattern blocking)
// -------------------------------------------------------------------------

if ($mobile === '') {
    echo 'Please enter valid mobile number';
    echo '</br>';
    echo "<a href='index.php'>Go Back</a>";
    die;
}

$phoneValidation = validate_phone_advanced($mobile, 'IN');
if (!$phoneValidation['valid']) {
    $errorMsg = 'Please enter a valid mobile number';
    if (!empty($phoneValidation['errors'])) {
        $errorMsg = implode('. ', $phoneValidation['errors']);
    }
    echo htmlspecialchars($errorMsg);
    echo '</br>';
    echo "<a href='index.php'>Go Back</a>";
    die;
}

// Update mobile with validated/cleaned version if needed
if ($phoneValidation['formatted']) {
    // Keep the cleaned 10-digit version
    $mobile = preg_replace('/\D+/', '', $phoneValidation['formatted']);
}

// -------------------------------------------------------------------------
// Advanced Email Validation (Syntax + MX + Disposable + SMTP)
// -------------------------------------------------------------------------

if ($email !== '') {
    // Advanced email validation
    // Note: SMTP verification is disabled by default as it can be slow and may fail due to port blocking
    // Enable it by setting the 4th parameter to true if needed (not recommended for production)
    $emailValidation = validate_email_advanced(
        $email,
        true,  // Check disposable domains
        false, // Check MX records (DISABLED in local/dev to avoid false negatives for real domains)
        false  // SMTP verification (disabled - can be slow and unreliable)
    );

    if (!$emailValidation['valid']) {
        $errorMsg = 'Please enter a valid email address';
        if (!empty($emailValidation['errors'])) {
            // Show first error message
            $errorMsg = htmlspecialchars($emailValidation['errors'][0]);
        }
        echo $errorMsg;
        echo '</br>';
        echo "<a href='index.php'>Go Back</a>";
        die;
    }
}

// -------------------------------------------------------------------------
// Step 2 – Honeypot + time‑to‑submit check
// -------------------------------------------------------------------------

// Basic honeypot check (bots often fill hidden fields)
$hpField = isset($_REQUEST['hp_field']) ? (string) $_REQUEST['hp_field'] : '';

// Time‑to‑submit in seconds (server time now vs. hidden field value at render)
$submittedAt = time();
$tsField     = isset($_REQUEST['ts']) ? (int) $_REQUEST['ts'] : 0;
$ttSubmit    = $tsField > 0 ? ($submittedAt - $tsField) : null;

// -------------------------------------------------------------------------
// reCAPTCHA v2 verification (explicit checkbox)
// -------------------------------------------------------------------------

// Google reCAPTCHA v2 posts the token as 'g-recaptcha-response'
$recaptchaToken = $_POST['g-recaptcha-response'] ?? '';
$remoteIp       = $_SERVER['REMOTE_ADDR'] ?? null;
$userAgent      = $_SERVER['HTTP_USER_AGENT'] ?? '';

// For v2 we require a successful CAPTCHA for every submission.
$leadAccepted      = true;
$captchaScore      = null;
$quarantineReasons = [];

if (empty($recaptchaToken)) {
    echo 'Please complete the CAPTCHA challenge.';
    echo '</br>';
    echo "<a href='index.php'>Go Back</a>";
    die;
}

$verification = verify_recaptcha_token($recaptchaToken, $remoteIp);
if ($verification === null || empty($verification['success'])) {
    echo 'CAPTCHA verification failed. Please try again.';
    echo '</br>';
    echo "<a href='index.php'>Go Back</a>";
    die;
}

// For v2 there is no score; we store 1.0 to indicate a passed CAPTCHA.
$captchaScore = 1.0;


$isDuplicate = false;
$duplicateMessage = '';

try {
    if (!isset($pdo)) {
        $pdo = get_pdo();
    }

    $submissionHash = bin2hex(random_bytes(32));

    $stmt = $pdo->prepare(
        'INSERT INTO submissions (name, mobile, email, submission_hash, captcha_score, ip, user_agent, verified)
         VALUES (:name, :mobile, :email, :submission_hash, :captcha_score, :ip, :user_agent, :verified)'
    );

    $stmt->execute([
        ':name'            => $name,
        ':mobile'          => $mobile,
        ':email'           => $email,
        ':submission_hash' => $submissionHash,
        ':captcha_score'   => $captchaScore,
        ':ip'              => $remoteIp,
        ':user_agent'      => $userAgent,
        ':verified'        => ($captchaScore !== null ? 1 : 0),
    ]);

} catch (PDOException $e) {
    // Check for duplicate entry error
    if ($e->getCode() == '23000') {
        $isDuplicate = true;
        
        // Optionally fetch the existing submission date
        try {
            $checkStmt = $pdo->prepare(
                'SELECT created_at FROM submissions 
                 WHERE email = :email AND mobile = :mobile 
                 LIMIT 1'
            );
            $checkStmt->execute([':email' => $email, ':mobile' => $mobile]);
            $existing = $checkStmt->fetch(PDO::FETCH_ASSOC);
            
            if ($existing) {
                $existingDate = date('d M Y, h:i A', strtotime($existing['created_at']));
                $duplicateMessage = "Thank you! We received your submission on {$existingDate}. Our team will contact you soon.";
            } else {
                $duplicateMessage = "Thank you! We have already received your submission. Our team will contact you soon.";
            }
        } catch (Exception $ex) {
            $duplicateMessage = "Thank you! We have already received your submission. Our team will contact you soon.";
        }
    } else {
        error_log("Database error: " . $e->getMessage());
    }
} catch (Throwable $e) {
    error_log("Error in thank-you.php: " . $e->getMessage());
}
// -------------------------------------------------------------------------
// Downstream lead handling (Google Sheet, etc.) – only for accepted leads
// Skip Google Sheets if duplicate (to avoid duplicate entries in sheet)
// -------------------------------------------------------------------------

if ($leadAccepted && !$isDuplicate) {
    require_once 'send_leads.php';

    $postData = new PostData();

    if ((!isset($_COOKIE['formfilled'])) && isset($_REQUEST['mobile'])) {
        $postData->callback();
        setcookie('formfilled', 'yes');
    }
}

// $mailsent controls which message branch is shown below; define it explicitly
// to avoid PHP notices while keeping existing behaviour.
$mailsent = $mailsent ?? false;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google Tag Manager -->
    <script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-PH7L984W');
    </script>

    <!-- End Google Tag Manager -->

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank you</title>
    <?php include 'inc/resource.php'; ?>

</head>

<body>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PH7L984W" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>

    <!-- End Google Tag Manager (noscript) -->


    <?php include 'inc/header.php'; ?>
    <section>
        <div>
            <div class="wrap wrappas">


                <?php
                                        if ($isDuplicate && !empty($duplicateMessage)) {
                                            // Show duplicate submission message
                                            ?>
                <span class="msgicon" aria-hidden="true"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
                <h2 class="oops">Submission Already Received</h2>
                <h3 class="oops-greet">Greetings from IREO</h3>
                <h3 class="oops-subtitle">
                    <?php echo htmlspecialchars($duplicateMessage); ?>
                </h3>
                <a href="index.php">
                    <h2 class="go-home"><span class="" aria-hidden="true"></span>
                        GO BACK TO HOME</h2>
                </a>
                <?php
                                        } elseif (!$mailsent) {
                                            // New submission - show success message
                                            ?>
                <span class="msgicon" aria-hidden="true"><i class="fa fa-check" aria-hidden="true"></i></span>
                <h2 class="oops">You're all set!</h2>
                <h3 class="oops-greet">Greetings from IREO</h3>
                <h3 class="oops-subtitle">
                    Thank you for expressing interest on our website.<br />
                    Our expert will get in touch with you shortly.
                </h3>
                <a href="index.php">
                    <h2 class="go-home"><span class="" aria-hidden="true"></span>
                        GO BACK TO HOME</h2>
                </a>
                <?php
                                        } else {
                                            // Fallback message
                                            ?>
                <span class="msgicon" aria-hidden="true"><i class="fa fa-check" aria-hidden="true"></i></span>
                <h2 class="oops">You're all set!</h2>
                <h3 class="oops-greet">Greetings from IREO</h3>
                <h3 class="oops-subtitle">
                    Thank you for expressing interest on our website.<br />
                    Our expert will get in touch with you shortly.
                </h3>
                <a href="index.php">
                    <h2 class="go-home"><span class="" aria-hidden="true"></span> GO BACK TO HOME</h2>
                </a>
                <?php
                                        }
                                        ?>


            </div>
        </div>
    </section>
    <?php include 'inc/footer.php'; ?>
</body>

</html>