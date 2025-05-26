<?php
require_once 'config.php';

// Check if user is already logged in via session
if (isset($_SESSION['user_id'])) {
    header("Location: index");
    exit;
}

// Auto-login via "Remember Me" cookie
if (!isset($_SESSION['user_id']) && isset($_COOKIE['remember_token'])) {
    $token = $_COOKIE['remember_token'];
    $stmt = $pdo->prepare("SELECT * FROM users WHERE remember_token = ?");
    $stmt->execute([$token]);
    $user = $stmt->fetch();

    if ($user) {
        // Regenerate session ID to prevent session fixation
        session_regenerate_id(true);

        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['role'] = $user['role'];

        // Update last_login
        $pdo->prepare("UPDATE users SET last_login = NOW() WHERE user_id = ?")->execute([$user['user_id']]);

        header("Location: index.php");
        exit;
    }
}

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$remember = isset($_POST['remember']);
$error = '';

// Define cookie expiration time constant
define('REMEMBER_ME_EXPIRY', 86400 * 30); // 30 days

// Generic error message to avoid giving attackers clues
$generic_error_message = 'Invalid login credentials.';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($email) || empty($password)) {
        $error = 'Please enter both email and password.';
    } else {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if (!$user || !password_verify($password, $user['password_hash'])) {
            // Use generic error message for both cases
            $error = $generic_error_message;
        } elseif (!$user['is_email_verified']) {
            $error = 'Please verify your email before logging in.';
        } elseif (!$user['is_active']) {
            $error = 'Your account is inactive.';
        } else {
            // Login success
            // Regenerate session ID
            session_regenerate_id(true);

            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            $_SESSION['role'] = $user['role'];

            // Update last login time
            $pdo->prepare("UPDATE users SET last_login = NOW() WHERE user_id = ?")->execute([$user['user_id']]);

            // Remember Me - set secure and HttpOnly flags on cookie
            if ($remember) {
                $token = bin2hex(random_bytes(32));
                setcookie('remember_token', $token, time() + REMEMBER_ME_EXPIRY, "/", "", isset($_SERVER['HTTPS']), true);
                $pdo->prepare("UPDATE users SET remember_token = ? WHERE user_id = ?")->execute([$token, $user['user_id']]);
            } else {
                setcookie('remember_token', '', time() - 3600, "/");
                $pdo->prepare("UPDATE users SET remember_token = NULL WHERE user_id = ?")->execute([$user['user_id']]);
            }

            header("Location: index.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once 'include/header.php' ?>
</head>

<body class="login-page">

  <header id="header" class="header position-relative">
    <?php include_once 'include/topbar.php' ?>
    <?php include_once 'include/mainHeader.php' ?>
    <?php include_once 'include/navigation.php' ?>
    <?php include_once 'main/annoucementBar.php' ?>
    <?php include_once 'main/mobileSearchForm.php' ?>
  </header>

  <main class="main">
    <?php include_once 'include/breadcrumb.php' ?>

    <section id="login" class="login section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center">
          <div class="col-lg-5 col-md-8" data-aos="zoom-in" data-aos-delay="200">
            <div class="login-form-wrapper">
              <div class="login-header text-center">
                <h2>Login</h2>
                <p>Welcome back! Please enter your details</p>
              </div>

              <?php if (isset($_SESSION['logout_message'])): ?>
                <div class="alert alert-success" role="alert"><?= htmlspecialchars($_SESSION['logout_message']) ?></div>
                <?php unset($_SESSION['logout_message']); // Clear the message after displaying ?>
              <?php endif; ?>

              <?php if (!empty($error)): ?>
                <div class="alert alert-danger" role="alert"><?= htmlspecialchars($error) ?></div>
              <?php endif; ?>

              <form method="POST" action="login.php" novalidate>
                <div class="mb-4">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" aria-label="Email address" value="<?= htmlspecialchars($email) ?>" required autocomplete="email" autofocus>
                </div>

                <div class="mb-3">
                  <div class="d-flex justify-content-between">
                    <label for="password" class="form-label">Password</label>
                    <a href="#" class="forgot-link" tabindex="0" aria-label="Forgot password?">Forgot password?</a>
                  </div>
                  <input type="password" class="form-control" id="password" name="password" aria-label="Password" required autocomplete="current-password">
                </div>

                <div class="mb-4 form-check">
                  <input type="checkbox" class="form-check-input" id="remember" name="remember" <?= $remember ? 'checked' : '' ?> aria-describedby="rememberHelp">
                  <label class="form-check-label" for="remember">Remember me for 30 days</label>
                  <small id="rememberHelp" class="form-text text-muted">Stay logged in for 30 days on this device.</small>
                </div>

                <div class="d-grid gap-2 mb-4">
                  <button type="submit" class="btn btn-primary" aria-live="polite">Sign in</button>
                </div>

                <div class="signup-link text-center">
                  <span>Don't have an account?</span>
                  <a href="register.php">Sign up for free</a>
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
</body>

</html>
