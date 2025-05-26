<?php
require_once 'config.php';
require_once 'common.func.php';

secureSessionStart();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to your login page URL
    exit;
}

$userId = $_SESSION['user_id'];
$errors = [];
$successMessage = '';

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
        $phone = preg_replace('/[^\d+]/', '', $phoneRaw); // Clean phone input
        $birthdate = sanitizeInput($_POST['birthdate'] ?? '');
        $gender = sanitizeInput($_POST['gender'] ?? '');

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

        if (empty($errors)) {
            try {
                // Check if email is taken by other users
                $stmt = $pdo->prepare("SELECT user_id FROM users WHERE email = ? AND user_id != ?");
                $stmt->execute([$email, $userId]);
                if ($stmt->fetch()) {
                    $errors[] = "Email is already registered by another user.";
                } else {
                    // Update user info
                    $stmt = $pdo->prepare("UPDATE users SET first_name = ?, last_name = ?, email = ?, phone = ?, updated_at = NOW() WHERE user_id = ?");
                    $stmt->execute([$firstName, $lastName, $email, $phone, $userId]);

                    $successMessage = "Your information has been updated. Thank you!";
                }
            } catch (Exception $e) {
                $errors[] = "Database error: " . htmlspecialchars($e->getMessage());
            }
        }
    }
}

// Fetch current user info to prefill the form
try {
    $stmt = $pdo->prepare("SELECT first_name, last_name, email, phone FROM users WHERE user_id = ?");
    $stmt->execute([$userId]);
    $user = $stmt->fetch();
    if (!$user) {
        echo "User  not found.";
        exit;
    }

    // Sanitize the phone number to remove unwanted characters
    $user['phone'] = preg_replace('/[^\d+]/', '', $user['phone']); // Remove anything that's not a digit or '+'
} catch (Exception $e) {
    echo "Database error: " . htmlspecialchars($e->getMessage());
    exit;
}

// Generate new CSRF token for the form
$csrf_token = generateCsrfToken();
?>
<div class="tab-header">
    <h2>Personal Information</h2>
</div>

<div class="personal-info-form" data-aos="fade-up" data-aos-delay="100">
    <?php if ($errors): ?>
        <div class="error-message text-danger">
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php else: ?>
        <div class="error-message text-danger"></div> <!-- empty error container for JS -->
    <?php endif; ?>
    <?php if ($successMessage): ?>
        <div class="sent-message text-success"><?php echo htmlspecialchars($successMessage); ?></div>
    <?php endif; ?>

    <form id="personalInfoForm" method="POST" action="">
        <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>" />

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName"
                    value="<?php echo htmlspecialchars($_POST['firstName'] ?? $user['first_name']); ?>" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName"
                    value="<?php echo htmlspecialchars($_POST['lastName'] ?? $user['last_name']); ?>" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="<?php echo htmlspecialchars($_POST['email'] ?? $user['email']); ?>" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone"
                    value="<?php echo htmlspecialchars($user['phone']); ?>"
                    pattern="^\+?[0-9]+$"
                    title="Phone number must contain only numbers and optionally start with +">
            </div>
        </div>

        <div class="mb-3">
            <label for="birthdate" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="birthdate" name="birthdate"
                value="<?php echo htmlspecialchars($_POST['birthdate'] ?? ''); ?>">
        </div>

        <div class="mb-3">
            <label class="form-label d-block">Gender</label>
            <?php
            $genderVal = $_POST['gender'] ?? '';
            ?>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="genderMale" value="male"
                    <?php echo ($genderVal === 'male') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="genderMale">Male</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="female"
                    <?php echo ($genderVal === 'female') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="genderFemale">Female</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="genderOther" value="other"
                    <?php echo ($genderVal === 'other') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="genderOther">Other</label>
            </div>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-save">Save Changes</button>
        </div>
    </form>
</div>

<script>
document.getElementById('personalInfoForm').addEventListener('submit', function(e) {
    const phoneInput = document.getElementById('phone');
    const phone = phoneInput.value.trim();
    const phonePattern = /^\+?[0-9]+$/;
    const errorElem = document.querySelector('.error-message');
    errorElem.textContent = ''; // clear previous error

    if (phone !== '' && !phonePattern.test(phone)) {
        e.preventDefault();
        errorElem.textContent = 'Phone number must contain only numbers and optionally start with +.';
        phoneInput.focus();
        return false;
    }
});
</script>
