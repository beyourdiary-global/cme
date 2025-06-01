<?php
require_once 'config.php';

$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';

    if (empty($email)) {
        $error = 'Please enter your email address.';
    } else {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if (!$user) {
            $error = 'No account found with that email address.';
        } else {
            // Generate a password reset token
            $token = bin2hex(random_bytes(32));
            $pdo->prepare("UPDATE users SET reset_token = ?, reset_token_expiry = NOW() + INTERVAL 1 HOUR WHERE user_id = ?")->execute([$token, $user['user_id']]);

            // Send email with reset link (pseudo-code, implement actual email sending)
            $resetLink = "http://yourdomain.com/reset-password.php?token=$token";
            // mail($email, "Password Reset Request", "Click here to reset your password: $resetLink");

            $message = 'A password reset link has been sent to your email address.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'include/header.php' ?>
    <title>Forgot Password</title>
</head>

<body class="forgot-password-page">

    <header id="header" class="header position-relative">
        <?php include_once 'include/topbar.php' ?>
        <?php include_once 'include/mainHeader.php' ?>
        <?php include_once 'include/navigation.php' ?>
        <?php include_once 'main/annoucementBar.php' ?>
        <?php include_once 'main/mobileSearchForm.php' ?>
    </header>

    <main class="main">
        <?php include_once 'include/breadcrumb.php' ?>

        <section id="forgot-password" class="forgot-password section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-8" data-aos="zoom-in" data-aos-delay="200">
                        <div class="login-form-wrapper">
                            <div class="login-header text-center">
                                <h2>Forgot Password</h2>
                                <p>Please enter your email address to receive a password reset link.</p>
                            </div>

                            <?php if (!empty($message)): ?>
                                <div class="alert alert-success" role="alert"><?= htmlspecialchars($message) ?></div>
                            <?php endif; ?>

                            <?php if (!empty($error)): ?>
                                <div class="alert alert-danger" role="alert"><?= htmlspecialchars($error) ?></div>
                            <?php endif; ?>

                            <form method="POST" action="forgot-password.php" novalidate>
                                <div class="mb-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" aria-label="Email address" required autocomplete="email" autofocus>
                                </div>

                                <div class="d-grid gap-2 mb-4">
                                    <button type="submit" class="btn btn-primary" aria-live="polite">Send Reset Link</button>
                                </div>

                                <div class="login-link text-center">
                                    <span>Remembered your password?</span>
                                    <a href="login.php">Login here</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include_once 'include/footer.php' ?>
    <?php include_once 'include/globalFooterScript.php' ?>
    <script>
     document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('form[method="POST"]');
        if (!form) return;
        form.addEventListener('submit', function (e) {
            const emailInput = form.querySelector('input[name="email"]');
            const email = emailInput.value.trim();
            let errorMsg = "";

            // Remove any previous error
            let alertDiv = form.querySelector(".js-form-error");
            if (alertDiv) alertDiv.remove();

            if (!email) {
            errorMsg = "Please enter your email address.";
            emailInput.focus();
            } else if (!isValidEmail(email)) {
            errorMsg = "Please enter a valid email address.";
            emailInput.focus();
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