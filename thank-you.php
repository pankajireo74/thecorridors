<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$request = $_SERVER['REQUEST_METHOD'];

if ($request !== 'POST') {
    http_response_code(405);
    echo 'Method Not Allowed';
    echo '</br>';
    echo "<a href='index.php'>Go Back</a>";
    die;
}

if ($_REQUEST['mobile'] == '') {
    echo 'Please enter valid mobile number';
    echo '</br>';
    echo "<a href='index.php'>Go Back</a>";
    die;
}

if (strlen($_REQUEST['mobile']) !== 10) {
    echo 'Please enter valid mobile number';
    echo '</br>';
    echo "<a href='index.php'>Go Back</a>";
    die;
}

$email = $_REQUEST['email'];
$mobile = str_replace(' ', '', $_REQUEST['mobile']);

require_once 'send_leads.php';

$postData = new PostData();

if ((!isset($_COOKIE['formfilled'])) && isset($_REQUEST['mobile'])) {
    $postData->callback();
    setcookie('formfilled', 'yes');
} 
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
                                        if (!$mailsent) {
                                            ?>

                <span class="msgicon" aria-hidden="true"><i class="fa fa-check" aria-hidden="true"></i></span>
                <h2 class="oops">You're all set!</h2>
                <h3 class="oops-greet">Greetings from IREO
                </h3>
                <h3 class="oops-subtitle">
                    Thank you for expressing interest on our website.<br />
                    Our expert will get in touch with you shortly.
                </h3>
                <a href="index.php">
                    <h2 class="go-home"><span class="" aria-hidden="true">
                        </span>

                        GO
                        BACK TO HOME</h2>
                </a>

                <?php
                                        } else {
                                            ?>
                <span class="msgicon" aria-hidden="true"><i class="fa fa-check" aria-hidden="true"></i></span>
                <h2 class="oops">You're all set!</h2>
                <h3 class="oops-greet">Greetings from IREO
                </h3>
                <h3 class="oops-subtitle">
                    Thank you for expressing interest on our website.<br />
                    Our expert will get in touch with you shortly.
                </h3>
                <a href="index.php">
                    <h2 class="go-home"><span class="" aria-hidden="true">
                        </span> GO
                        BACK TO HOME</h2>
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