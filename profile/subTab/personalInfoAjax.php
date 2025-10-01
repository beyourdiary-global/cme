<?php
// Prevent any output before JSON
ob_start();

// Suppress all errors/warnings for clean JSON output
error_reporting(0);
ini_set('display_errors', 0);

try {
    require_once '../../config.php';
    require_once '../../common.func.php';
} catch (Exception $e) {
    // Clean any output and return error
    ob_clean();
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'errors' => ['Configuration error: ' . $e->getMessage()]]);
    exit;
}

// Clean any output from includes
ob_clean();

// Set JSON header immediately
header('Content-Type: application/json');

try {
    secureSessionStart();
} catch (Exception $e) {
    echo json_encode(['success' => false, 'errors' => ['Session error: ' . $e->getMessage()]]);
    exit;
}

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'errors' => ['Please log in to continue.']]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'errors' => ['Invalid request method.']]);
    exit;
}

$userId = $_SESSION['user_id'];
$errors = [];
$successMessage = '';

// Validate CSRF token
$csrfToken = $_POST['csrf_token'] ?? '';
if (!validateCsrfToken($csrfToken)) {
    $errors[] = "Invalid CSRF token.";
} else {
    // Sanitize inputs
    $firstName = sanitizeInput($_POST['firstName'] ?? '');
    $lastName = sanitizeInput($_POST['lastName'] ?? '');
    $email = sanitizeEmail($_POST['email'] ?? '');
    $phoneRaw = $_POST['phone'] ?? '';
    $phone = preg_replace('/[^\d+]/', '', $phoneRaw);
    $birthdate = sanitizeInput($_POST['birthdate'] ?? '');
    $gender = strtolower(sanitizeInput($_POST['gender'] ?? ''));

    // Basic validation
    if (!$firstName) {
        $errors[] = "First name is required.";
    }
    if (!$lastName) {
        $errors[] = "Last name is required.";
    }
    if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required.";
    }

    // Validate phone: only digits and leading + allowed
    if ($phone !== '' && !preg_match('/^\+?[0-9]+$/', $phone)) {
        $errors[] = "Phone number must contain only numbers and optionally start with +.";
    }

    if ($gender && !in_array($gender, ['m', 'f', 'o'])) {
        $errors[] = "Invalid gender selected.";
    }

    if (empty($errors)) {
        try {
            // Check if email is taken by other users
            $stmt = $pdo->prepare("SELECT user_id FROM users WHERE email = ? AND user_id != ?");
            $stmt->execute([$email, $userId]);
            if ($stmt->fetch()) {
                $errors[] = "Email is already registered by another user.";
            } else {
                // Update user info
                $stmt = $pdo->prepare("UPDATE users SET first_name = ?, last_name = ?, email = ?, phone = ?, birthdate = ?, gender = ?, updated_at = NOW() WHERE user_id = ?");
                $stmt->execute([$firstName, $lastName, $email, $phone, $birthdate, $gender, $userId]);

                $successMessage = "Your information has been updated successfully!";
            }
        } catch (Exception $e) {
            $errors[] = "Database error: " . htmlspecialchars($e->getMessage());
        }
    }
}

// Return JSON response
echo json_encode([
    'success' => empty($errors),
    'errors' => $errors,
    'message' => $successMessage
]);
exit;
?>