<?php
require_once 'config.php'; // Includes DB connection and common functions

$errors = [];
$message = '';
$firstName = $lastName = $email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input
    $firstName = sanitizeInput(trim($_POST['firstName']));
    $lastName = sanitizeInput(trim($_POST['lastName']));
    $email = sanitizeEmail(trim($_POST['email']));
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $newsletter = isset($_POST['newsletter']) ? 1 : 0;
    $terms = isset($_POST['terms']);

    // CSRF Token validation
    $csrf_token = $_POST['csrf_token'] ?? '';
    if (!validateCsrfToken($csrf_token)) {
        $errors[] = "Invalid or expired form submission. Please try again.";
    }

    // Validation
    if (!$terms) {
        $errors[] = "You must agree to the Terms of Service.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address.";
    }
    if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters.";
    }
    if ($password !== $confirmPassword) {
        $errors[] = "Passwords do not match.";
    }

    if (empty($errors)) {
        // Check if user already exists
        $stmt = $pdo->prepare("SELECT user_id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            $errors[] = "This email is already registered.";
        } else {
            // All good: create user
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $token = bin2hex(random_bytes(32));
            $expires = date('Y-m-d H:i:s', strtotime('+1 day'));

            $insert = $pdo->prepare("
                INSERT INTO users (email, password_hash, first_name, last_name, is_email_verified, is_active, activation_token, activation_token_expires)
                VALUES (?, ?, ?, ?, 0, 1, ?, ?)
            ");

            try {
                $insert->execute([$email, $passwordHash, $firstName, $lastName, $token, $expires]);

                // Send verification email
                if (sendVerificationEmail($email, $firstName, $token)) {
                    $message = "Registration successful! Please check your email to verify your account.";
                } else {
                    $errors[] = "Failed to send verification email.";
                }

            } catch (Exception $e) {
                $errors[] = "Error saving your data: " . $e->getMessage();
            }
        }
    }
}

// Generate CSRF token for form
$csrf_token = generateCsrfToken();

function sendVerificationEmail($email, $firstName, $token) {
    $verifyLink = "http://localhost/cme/verify.php?token=$token";
    $subject = "Verify Your Email Address";
    $body = "Hi $firstName,\n\nPlease verify your account by clicking the link below:\n$verifyLink\n\nThis link expires in 24 hours.\n\nThanks!";
    $headers = "From: no-reply@yourdomain.com";

    return mail($email, $subject, $body, $headers);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'include/header.php'; ?>
</head>

<body class="register-page">

    <header id="header" class="header position-relative">
        <?php include_once 'include/topbar.php'; ?>
        <?php include_once 'include/mainHeader.php'; ?>
        <?php include_once 'include/navigation.php'; ?>
        <?php include_once 'main/annoucementBar.php'; ?>
        <?php include_once 'main/mobileSearchForm.php'; ?>
    </header>

    <main class="main">

        <div class="page-title light-background">
            <div class="container">
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li class="current">Register</li>
                    </ol>
                </nav>
                <h1>Register</h1>
            </div>
        </div>

        <section id="register" class="register section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="registration-form-wrapper" data-aos="zoom-in" data-aos-delay="200">
                            <div class="section-header mb-4 text-center">
                                <h2>Create Your Account</h2>
                                <p>Sign up to start shopping and enjoy exclusive offers</p>
                            </div>

                            <!-- Display Errors -->
                            <?php if (!empty($errors)): ?>
                                <div class="alert alert-danger">
                                    <?php foreach ($errors as $error): ?>
                                        <p><?= htmlspecialchars($error) ?></p>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <!-- Display Success -->
                            <?php if (!empty($message)): ?>
                                <div class="alert alert-success">
                                    <p><?= htmlspecialchars($message) ?></p>
                                </div>
                            <?php endif; ?>

                            <form action="register.php" method="POST">
                                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token) ?>">

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="firstName">First Name</label>
                                            <input type="text" class="form-control" name="firstName" id="firstName" required minlength="2" placeholder="John" value="<?= htmlspecialchars($firstName) ?>" autocomplete="given-name">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="lastName">Last Name</label>
                                            <input type="text" class="form-control" name="lastName" id="lastName" required minlength="2" placeholder="Doe" value="<?= htmlspecialchars($lastName) ?>" autocomplete="family-name">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control" name="email" id="email" required placeholder="you@example.com" value="<?= htmlspecialchars($email) ?>" autocomplete="email">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <div class="password-input position-relative">
                                        <input type="password" class="form-control" name="password" id="password" required minlength="8" placeholder="At least 8 characters" autocomplete="new-password">
                                        <i class="bi bi-eye toggle-password" style="cursor: pointer; position: absolute; top: 50%; right: 10px; transform: translateY(-50%);"></i>
                                    </div>
                                    <small class="password-requirements">
                                        Must be at least 8 characters long and include uppercase, lowercase, number, and special character
                                    </small>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="confirmPassword">Confirm Password</label>
                                    <div class="password-input position-relative">
                                        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" required minlength="8" placeholder="Repeat your password" autocomplete="new-password">
                                        <i class="bi bi-eye toggle-password" style="cursor: pointer; position: absolute; top: 50%; right: 10px; transform: translateY(-50%);"></i>
                                    </div>
                                </div>

                                <div class="form-group mb-4 d-flex align-items-center">
                                    <input class="form-check-input me-2" type="checkbox" name="newsletter" id="newsletter" <?= isset($_POST['newsletter']) ? 'checked' : '' ?>>
                                    <label class="form-check-label mb-0" for="newsletter">
                                        Subscribe to our newsletter for exclusive offers and updates
                                    </label>
                                </div>

                                <div class="form-group mb-4 d-flex align-items-center">
                                    <input class="form-check-input me-2" type="checkbox" name="terms" id="terms" required>
                                    <label class="form-check-label mb-0" for="terms">
                                        I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                                    </label>
                                </div>

                                <div class="text-center mb-4">
                                    <button type="submit" class="btn btn-primary w-100">Create Account</button>
                                </div>

                                <div class="text-center">
                                    <p class="mb-0">Already have an account? <a href="login.php">Sign in</a></p>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <?php include_once 'include/footer.php'; ?>
    <?php include_once 'include/globalFooterScript.php'; ?>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
      const togglePasswordIcons = document.querySelectorAll('.toggle-password');

      togglePasswordIcons.forEach(icon => {
        icon.addEventListener('click', function () {
          const passwordInput = this.previousElementSibling;
          if (!passwordInput) return;

          if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            this.classList.remove('bi-eye');
            this.classList.add('bi-eye-slash');
          } else {
            passwordInput.type = 'password';
            this.classList.remove('bi-eye-slash');
            this.classList.add('bi-eye');
          }
        });
      });
    });

        // Place this after including common.js
        document.addEventListener('DOMContentLoaded', function () {
          const form = document.querySelector('form[action="register.php"]');
          if (!form) return;
          form.addEventListener('submit', function (e) {
            // Remove previous error
            let alertDiv = form.querySelector('.js-form-error');
            if (alertDiv) alertDiv.remove();

            // Get fields
            const firstName = form.querySelector('input[name="firstName"]');
            const lastName = form.querySelector('input[name="lastName"]');
            const email = form.querySelector('input[name="email"]');
            const password = form.querySelector('input[name="password"]');
            const confirmPassword = form.querySelector('input[name="confirmPassword"]');
            const terms = form.querySelector('input[name="terms"]');

            let errorMsg = "";

            // Password pattern: min 8 chars, 1 uppercase, 1 lowercase, 1 number, 1 special char
            const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;

            if (!firstName.value.trim()) {
              errorMsg = "Please enter your first name.";
              firstName.focus();
            } else if (!lastName.value.trim()) {
              errorMsg = "Please enter your last name.";
              lastName.focus();
            } else if (!email.value.trim()) {
              errorMsg = "Please enter your email address.";
              email.focus();
            } else if (typeof isValidEmail === "function" && !isValidEmail(email.value.trim())) {
              errorMsg = "Please enter a valid email address.";
              email.focus();
            } else if (!password.value) {
              errorMsg = "Please enter your password.";
              password.focus();
            } else if (typeof isValidPassword === "function" && !isValidPassword(password.value)) {
              errorMsg = "Password must be at least 8 characters long and include uppercase, lowercase, number, and special character.";
              password.focus();
            } else if (!confirmPassword.value) {
              errorMsg = "Please confirm your password.";
              confirmPassword.focus();
            } else if (password.value !== confirmPassword.value) {
              errorMsg = "Passwords do not match.";
              confirmPassword.focus();
            } else if (!terms.checked) {
              errorMsg = "You must agree to the Terms of Service.";
              terms.focus();
            }

            if (errorMsg) {
              e.preventDefault();
              alertDiv = document.createElement("div");
              alertDiv.className = "alert alert-danger js-form-error";
              alertDiv.setAttribute("role", "alert");
              alertDiv.textContent = errorMsg;
              form.insertBefore(alertDiv, form.firstChild);
            }
          });
        });
    </script>

</body>
</html>
