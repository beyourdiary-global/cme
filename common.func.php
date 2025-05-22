<?php
/**
 * common.func.php
 * 
 * Provides common utility functions for session management,
 * input sanitization, CSRF protection, error handling,
 * and remember-me token management.
 */

/**
 * Starts a secure session with recommended settings.
 */
function secureSessionStart() {
    $sessionName = 'sec_session_id';
    $secure = isset($_SERVER['HTTPS']); // Set to true if using https
    $httponly = true;

    // Forces sessions to only use cookies.
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        header("Location: error.php?err=Could not initiate a safe session (ini_set)");
        exit();
    }

    // Get current cookies params.
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params([
        'lifetime' => $cookieParams["lifetime"],
        'path' => $cookieParams["path"],
        'domain' => $cookieParams["domain"],
        'secure' => $secure,
        'httponly' => $httponly,
        'samesite' => 'Lax' // or 'Strict' depending on your app requirements
    ]);

    session_name($sessionName);
    session_start();
    session_regenerate_id(true); // Regenerate session, delete old one.
}

/**
 * Sanitizes a string input to prevent XSS and other issues.
 *
 * @param string $input
 * @return string
 */
function sanitizeInput(string $input): string {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

/**
 * Sanitizes an email input.
 *
 * @param string $email
 * @return string
 */
function sanitizeEmail(string $email): string {
    return filter_var(trim($email), FILTER_SANITIZE_EMAIL);
}

/**
 * Generates a CSRF token and stores it in session.
 *
 * @return string The generated token.
 */
function generateCsrfToken(): string {
    if (!isset($_SESSION)) {
        secureSessionStart();
    }
    $token = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] = $token;
    $_SESSION['csrf_token_time'] = time();
    return $token;
}

/**
 * Validates the CSRF token from form submission.
 *
 * @param string|null $token
 * @param int $timeout Seconds after which token expires (default 3600)
 * @return bool
 */
function validateCsrfToken(?string $token, int $timeout = 3600): bool {
    if (!isset($_SESSION) || !isset($_SESSION['csrf_token']) || !isset($_SESSION['csrf_token_time'])) {
        return false;
    }
    if (!$token || $token !== $_SESSION['csrf_token']) {
        return false;
    }
    if (($_SESSION['csrf_token_time'] + $timeout) < time()) {
        // Token expired
        unset($_SESSION['csrf_token']);
        unset($_SESSION['csrf_token_time']);
        return false;
    }
    return true;
}

/**
 * Sets a remember me token for a user securely and stores in DB.
 *
 * @param PDO $pdo
 * @param int $userId
 * @return string The token string set as cookie.
 */
function setRememberMeToken(PDO $pdo, int $userId): string {
    $token = bin2hex(random_bytes(32));
    // Store token in DB
    $stmt = $pdo->prepare("UPDATE users SET remember_token = ? WHERE user_id = ?");
    $stmt->execute([$token, $userId]);

    // Set cookie with Secure and HttpOnly flags
    $secure = isset($_SERVER['HTTPS']);
    setcookie('remember_token', $token, time() + (86400 * 30), "/", "", $secure, true);

    return $token;
}

/**
 * Clears the remember me token from cookie and DB.
 *
 * @param PDO $pdo
 * @param int $userId
 */
function clearRememberMeToken(PDO $pdo, int $userId): void {
    // Clear cookie
    setcookie('remember_token', '', time() - 3600, "/");

    // Clear token from DB
    $stmt = $pdo->prepare("UPDATE users SET remember_token = NULL WHERE user_id = ?");
    $stmt->execute([$userId]);
}

/**
 * Simple function to get error message safely.
 *
 * @param string|null $error
 * @return string
 */
function displayError(?string $error): string {
    return $error ? htmlspecialchars($error) : '';
}
?>

