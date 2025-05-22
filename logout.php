<?php
session_start();

// Unset all session variables
$_SESSION = [];

// Destroy the session
session_destroy();

// Redirect to login or home page
header("Location: login.php"); // Change to 'index.php' if you prefer
exit;
