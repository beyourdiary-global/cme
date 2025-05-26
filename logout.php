<?php
session_start();

// Unset all session variables
$_SESSION = [];

// Destroy the session
session_destroy();

// Clear the remember_token cookie if it exists
if (isset($_COOKIE['remember_token'])) {
    setcookie('remember_token', '', time() - 3600, "/"); // delete cookie by setting expiry in past
}

// Clear the sec_session_id cookie if it exists
if (isset($_COOKIE['sec_session_id'])) {
    setcookie('sec_session_id', '', time() - 3600, "/"); // delete cookie by setting expiry in past
}

// Start a new session to set a message
session_start();
$_SESSION['logout_message'] = "You have been logged out successfully.";

// Redirect to login page
header("Location: login.php");
exit;
?>
