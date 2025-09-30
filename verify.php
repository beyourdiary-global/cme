<?php
require_once 'config.php';

$token = $_GET['token'] ?? '';
$statusMessage = '';
$isError = false;

if (!$token) {
    $statusMessage = "Invalid verification link.";
    $isError = true;
} else {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE activation_token = ?");
    $stmt->execute([$token]);
    $user = $stmt->fetch();

    if (!$user) {
        $statusMessage = "Invalid or expired activation token.";
        $isError = true;
    } elseif ((new DateTime() > new DateTime($user['activation_token_expires']))) {
        $statusMessage = "This verification link has expired.";
        $isError = true;
    } elseif ($user['is_email_verified']) {
        $statusMessage = "Your email is already verified.";
    } else {
        // Mark email as verified
        $update = $pdo->prepare("UPDATE users SET is_email_verified = 1, activation_token = NULL, activation_token_expires = NULL WHERE user_id = ?");
        $update->execute([$user['user_id']]);

        // Log the user in
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['role'] = $user['role'];

        // Optional: update last_login timestamp
        $pdo->prepare("UPDATE users SET last_login = NOW() WHERE user_id = ?")->execute([$user['user_id']]);

        // Redirect to dashboard or home
        header("Location: index.php"); // Change this to your desired target
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'include/header.php'; ?>
</head>

<body class="verify-page">

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
                        <li><a href="index.php">Home</a></li>
                        <li class="current">Verify Email</li>
                    </ol>
                </nav>
                <h1>Email Verification</h1>
            </div>
        </div>

        <section class="verification section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="verification-wrapper text-center" data-aos="zoom-in" data-aos-delay="200">
                            <?php if ($statusMessage): ?>
                                <div class="alert <?= $isError ? 'alert-danger' : 'alert-info' ?>">
                                    <?= htmlspecialchars($statusMessage) ?>
                                </div>
                                <a href="login.php" class="btn btn-primary mt-3">Go to Login</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include_once 'include/footer.php'; ?>
    <?php include_once 'include/globalFooterScript.php'; ?>

</body>

</html>
