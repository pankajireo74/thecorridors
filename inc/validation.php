<?php
/**
 * Advanced Email and Mobile Validation Utility
 * 
 * Features:
 * - Email: Syntax, MX record, Disposable domain blocking, SMTP verification
 * - Mobile: libphonenumber-style validation, Fake pattern blocking
 */

// Cache directory for disposable email domains list
define('CACHE_DIR', __DIR__ . '/../cache');
define('DISPOSABLE_EMAIL_LIST_URL', 'https://raw.githubusercontent.com/disposable-email-domains/disposable-email-domains/master/disposable_email_blocklist.conf');
define('DISPOSABLE_EMAIL_CACHE_FILE', CACHE_DIR . '/disposable_emails.json');
define('DISPOSABLE_EMAIL_CACHE_TTL', 86400); // 24 hours

/**
 * Ensure cache directory exists
 */
if (!file_exists(CACHE_DIR)) {
    @mkdir(CACHE_DIR, 0755, true);
}

/**
 * Download and cache disposable email domains list
 * 
 * @return array List of disposable email domains
 */
function get_disposable_email_domains(): array
{
    // Check cache first
    if (file_exists(DISPOSABLE_EMAIL_CACHE_FILE)) {
        $cacheData = json_decode(file_get_contents(DISPOSABLE_EMAIL_CACHE_FILE), true);
        if (isset($cacheData['timestamp']) && (time() - $cacheData['timestamp']) < DISPOSABLE_EMAIL_CACHE_TTL) {
            return $cacheData['domains'] ?? [];
        }
    }

    // Download fresh list
    $domains = [];
    try {
        $ch = curl_init(DISPOSABLE_EMAIL_LIST_URL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode === 200 && $response) {
            $lines = explode("\n", $response);
            foreach ($lines as $line) {
                $line = trim($line);
                // Skip comments and empty lines
                if (empty($line) || $line[0] === '#') {
                    continue;
                }
                $domains[] = strtolower($line);
            }
        }
    } catch (Exception $e) {
        // If download fails, try to use cached version even if expired
        if (file_exists(DISPOSABLE_EMAIL_CACHE_FILE)) {
            $cacheData = json_decode(file_get_contents(DISPOSABLE_EMAIL_CACHE_FILE), true);
            return $cacheData['domains'] ?? [];
        }
    }

    // Cache the result
    file_put_contents(
        DISPOSABLE_EMAIL_CACHE_FILE,
        json_encode([
            'timestamp' => time(),
            'domains' => $domains
        ])
    );

    return $domains;
}

/**
 * Check if email domain is disposable
 * 
 * @param string $email
 * @return bool True if disposable
 */
function is_disposable_email(string $email): bool
{
    $domain = strtolower(substr(strrchr($email, "@"), 1));
    if (empty($domain)) {
        return false;
    }

    $disposableDomains = get_disposable_email_domains();
    return in_array($domain, $disposableDomains, true);
}

/**
 * Check if email domain has MX records
 * 
 * @param string $email
 * @return bool True if MX records exist
 */
function has_mx_records(string $email): bool
{
    $domain = substr(strrchr($email, "@"), 1);
    if (empty($domain)) {
        return false;
    }

    // Check MX records
    $mxRecords = [];
    $result = getmxrr($domain, $mxRecords);
    
    // If getmxrr fails, try dns_get_record as fallback
    if (!$result) {
        $dnsRecords = @dns_get_record($domain, DNS_MX);
        $result = !empty($dnsRecords);
    }

    return $result;
}

/**
 * SMTP mailbox verification (non-OTP method)
 * Attempts to verify if mailbox exists by connecting to SMTP server
 * 
 * @param string $email
 * @param int $timeout Timeout in seconds
 * @return array ['valid' => bool, 'error' => string|null]
 */
function verify_smtp_mailbox(string $email, int $timeout = 5): array
{
    $domain = substr(strrchr($email, "@"), 1);
    if (empty($domain)) {
        return ['valid' => false, 'error' => 'Invalid email format'];
    }

    // Get MX records
    $mxRecords = [];
    $mxWeights = [];
    if (!getmxrr($domain, $mxRecords, $mxWeights)) {
        return ['valid' => false, 'error' => 'No MX records found'];
    }

    // Sort by priority (weight)
    array_multisort($mxWeights, $mxRecords);

    // Try to connect to the first MX server
    $mxHost = $mxRecords[0] ?? null;
    if (!$mxHost) {
        return ['valid' => false, 'error' => 'No MX host available'];
    }

    // Connect to SMTP server
    $smtpPort = 25;
    $connection = @fsockopen($mxHost, $smtpPort, $errno, $errstr, $timeout);
    
    if (!$connection) {
        // If port 25 is blocked, we can't verify, so return neutral (not invalid)
        // Many ISPs block port 25, so we'll be lenient here
        return ['valid' => true, 'error' => null]; // Assume valid if we can't connect
    }

    // Read greeting
    $response = fgets($connection, 515);
    if (substr($response, 0, 3) !== '220') {
        fclose($connection);
        return ['valid' => true, 'error' => null]; // Neutral if greeting fails
    }

    // Send HELO
    fputs($connection, "HELO " . $_SERVER['HTTP_HOST'] . "\r\n");
    $response = fgets($connection, 515);

    // Send MAIL FROM
    fputs($connection, "MAIL FROM: <noreply@" . $_SERVER['HTTP_HOST'] . ">\r\n");
    $response = fgets($connection, 515);

    // Send RCPT TO (this is where we check if mailbox exists)
    fputs($connection, "RCPT TO: <" . $email . ">\r\n");
    $response = fgets($connection, 515);
    $responseCode = substr($response, 0, 3);

    // Send QUIT
    fputs($connection, "QUIT\r\n");
    fclose($connection);

    // 250 = mailbox exists, 550 = mailbox doesn't exist
    if ($responseCode === '250') {
        return ['valid' => true, 'error' => null];
    } elseif ($responseCode === '550') {
        return ['valid' => false, 'error' => 'Mailbox does not exist'];
    }

    // For other codes, be neutral (many servers don't allow verification)
    return ['valid' => true, 'error' => null];
}

/**
 * Comprehensive email validation
 * 
 * @param string $email
 * @param bool $checkDisposable Check disposable domains
 * @param bool $checkMX Check MX records
 * @param bool $checkSMTP Check SMTP mailbox (slower, may fail due to port blocking)
 * @return array ['valid' => bool, 'errors' => array]
 */
function validate_email_advanced(
    string $email,
    bool $checkDisposable = true,
    bool $checkMX = true,
    bool $checkSMTP = false
): array {
    $errors = [];
    $email = strtolower(trim($email));

    // 1. Syntax check
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email syntax';
        return ['valid' => false, 'errors' => $errors];
    }

    // Split into local-part and domain
    [$localPart, $domain] = explode('@', $email, 2);

    // 1b. Local-part (username) anti-spam heuristics
    // ------------------------------------------------------------------
    // - Block obviously fake generic usernames (abc, user, test, etc.)
    // - Block numeric-only usernames
    // - Block very short usernames (1–2 chars) that are almost always junk

    // Generic usernames that are almost always fake when combined with
    // non-corporate domains. We intentionally DO NOT block normal
    // role-based addresses like sales@company.com, info@company.com, etc.
    $genericUsernames = [
        'abc', 'abcd', 'abc123',
        'user', 'username', 'user1',
        'demo', 'test', 'testing',
        'mail', 'email',
    ];

    if (in_array($localPart, $genericUsernames, true)) {
        $errors[] = 'Email username looks too generic or fake';
    }

    // Numeric-only usernames (e.g. 123456, 9876543210)
    if (preg_match('/^[0-9]+$/', $localPart)) {
        $errors[] = 'Email username cannot be only numbers';
    }

    // Very short usernames (length 1–2) are almost always junk
    if (strlen($localPart) < 3) {
        $errors[] = 'Email username is too short';
    }

    // Repeated character usernames like aaaaa, xxxxx, 11111
    if (preg_match('/^(.)\1{3,}$/', $localPart)) {
        $errors[] = 'Email username appears auto-generated';
    }

    // 1c. Domain anti-spam / unrealism heuristics
    // ------------------------------------------------------------------
    // Example: abc@abc.in, user@abc.in – domain label is too generic

    $domainParts = explode('.', $domain);
    $secondLevel = $domainParts[0] ?? '';
    $tld         = $domainParts[count($domainParts) - 1] ?? '';

    $genericSecondLevel = [
        'abc',
        'example',
        'test',
        'localhost',
        'invalid',
        'domain',
        'email',
    ];

    if (in_array($secondLevel, $genericSecondLevel, true)) {
        $errors[] = 'Email domain looks too generic or placeholder';
    }

    // If the whole domain is just a repeat of the local-part (abc@abc.in, xyz@xyz.com)
    if ($secondLevel !== '' && $secondLevel === $localPart) {
        $errors[] = 'Email appears to use a placeholder domain';
    }

    // TLD sanity: allow common TLDs; flag obviously strange ones as suspicious.
    // We do NOT block them outright, but mark them as questionable.
    $commonTlds = [
        'com','net','org','in','co','co.in','edu','gov','io','ai','info','biz',
        'me','us','uk','de','fr','ca','au','nl','sg','pk','bd',
    ];
    $effectiveTld = strtolower($tld);
    if (!in_array($effectiveTld, $commonTlds, true) && strlen($effectiveTld) > 4) {
        $errors[] = 'Email top-level domain looks unusual';
    }

    // 2. Disposable domain check
    if ($checkDisposable && is_disposable_email($email)) {
        $errors[] = 'Disposable email domains are not allowed';
    }

    // 3. MX record check
    if ($checkMX && !has_mx_records($email)) {
        $errors[] = 'Email domain does not have valid MX records';
    }

    // 4. SMTP mailbox verification (optional, can be slow and may fail)
    if ($checkSMTP) {
        $smtpResult = verify_smtp_mailbox($email);
        if (!$smtpResult['valid']) {
            $errors[] = $smtpResult['error'] ?? 'SMTP verification failed';
        }
    }

    return [
        'valid' => empty($errors),
        'errors' => $errors
    ];
}

/**
 * Common fake/invalid phone number patterns to block
 */
function get_fake_phone_patterns(): array
{
    return [
        // Repeated digits
        '/^(\d)\1{9}$/',                    // 1111111111, 2222222222, etc.
        '/^(\d)\1{8}$/',                    // 111111111, etc.
        
        // Sequential digits
        '/^0123456789$/',                   // 0123456789
        '/^1234567890$/',                   // 1234567890
        '/^9876543210$/',                   // 9876543210
        '/^0987654321$/',                   // 0987654321
        
        // Common test numbers
        '/^0000000000$/',                   // All zeros
        '/^1111111111$/',                   // All ones
        '/^9999999999$/',                   // All nines
        
        // Invalid Indian patterns (if country code is +91)
        '/^0{10}$/',                        // All zeros
        '/^1{10}$/',                        // All ones
    ];
}

/**
 * Validate phone number using libphonenumber-style validation
 * 
 * @param string $phone Phone number (digits only)
 * @param string $defaultCountry Default country code (e.g., 'IN' for India)
 * @return array ['valid' => bool, 'errors' => array, 'formatted' => string|null]
 */
function validate_phone_advanced(string $phone, string $defaultCountry = 'IN'): array
{
    $errors = [];
    
    // Remove all non-digit characters
    $phone = preg_replace('/\D+/', '', $phone);
    
    if (empty($phone)) {
        $errors[] = 'Phone number is required';
        return ['valid' => false, 'errors' => $errors, 'formatted' => null];
    }

    // Check fake patterns
    $fakePatterns = get_fake_phone_patterns();
    foreach ($fakePatterns as $pattern) {
        if (preg_match($pattern, $phone)) {
            $errors[] = 'Phone number appears to be invalid or fake';
            break;
        }
    }

    // Country-specific validation
    if ($defaultCountry === 'IN') {
        // Indian phone numbers: 10 digits, starting with 6-9
        if (strlen($phone) === 10) {
            $firstDigit = (int) $phone[0];
            if ($firstDigit < 6 || $firstDigit > 9) {
                $errors[] = 'Indian mobile numbers must start with 6, 7, 8, or 9';
            }
        } elseif (strlen($phone) === 12 && substr($phone, 0, 2) === '91') {
            // With country code
            $phone = substr($phone, 2); // Remove country code
            $firstDigit = (int) $phone[0];
            if ($firstDigit < 6 || $firstDigit > 9) {
                $errors[] = 'Indian mobile numbers must start with 6, 7, 8, or 9';
            }
        } elseif (strlen($phone) === 11 && $phone[0] === '0') {
            // With leading zero (landline format, but we want mobile)
            $errors[] = 'Mobile numbers should not start with 0';
        } else {
            $errors[] = 'Indian mobile numbers must be 10 digits';
        }
    } else {
        // Generic validation for other countries
        if (strlen($phone) < 7 || strlen($phone) > 15) {
            $errors[] = 'Phone number must be between 7 and 15 digits';
        }
    }

    // Additional validation: check for obviously invalid numbers
    if (strlen($phone) === 10) {
        // Check if it's a valid mobile format (not all same digits, not sequential)
        $uniqueDigits = count(array_unique(str_split($phone)));
        if ($uniqueDigits < 3) {
            $errors[] = 'Phone number appears to be invalid';
        }
    }

    $formatted = null;
    if (empty($errors) && $defaultCountry === 'IN' && strlen($phone) === 10) {
        $formatted = '+91 ' . substr($phone, 0, 5) . ' ' . substr($phone, 5);
    }

    return [
        'valid' => empty($errors),
        'errors' => $errors,
        'formatted' => $formatted
    ];
}


