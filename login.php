<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once 'include/header.php'?>
</head>

<body class="login-page">

  <header id="header" class="header position-relative">
    <!-- Top Bar -->
    <?php include_once 'include/topbar.php'?>
    <!-- Main Header -->
    <?php include_once 'include/mainHeader.php'?>
    <!-- Navigation -->
    <?php include_once 'include/navigation.php'?>
    <!-- Announcement Bar -->
    <?php include_once 'main/annoucementBar.php'?>
    <!-- Mobile Search Form -->
    <?php include_once 'main/mobileSearchForm.php'?>
  </header>

  <main class="main">
    <!-- Page Title -->
    <?php include_once 'include/breadcrumb.php'?>
    <!-- End Page Title -->

    <!-- Login Section -->
    <section id="login" class="login section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center">
          <div class="col-lg-5 col-md-8" data-aos="zoom-in" data-aos-delay="200">
            <div class="login-form-wrapper">
              <div class="login-header text-center">
                <h2>Login</h2>
                <p>Welcome back! Please enter your details</p>
              </div>

              <form>
                <div class="mb-4">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter your email" required="" autocomplete="email">
                </div>

                <div class="mb-3">
                  <div class="d-flex justify-content-between">
                    <label for="password" class="form-label">Password</label>
                    <a href="#" class="forgot-link">Forgot password?</a>
                  </div>
                  <input type="password" class="form-control" id="password" placeholder="Enter your password" required="" autocomplete="current-password">
                </div>

                <div class="mb-4 form-check">
                  <input type="checkbox" class="form-check-input" id="remember">
                  <label class="form-check-label" for="remember">Remember for 30 days</label>
                </div>

                <div class="d-grid gap-2 mb-4">
                  <button type="submit" class="btn btn-primary">Sign in</button>
                  <button type="button" class="btn btn-outline">
                    <i class="bi bi-google me-2"></i>Sign in with Google
                  </button>
                </div>

                <div class="signup-link text-center">
                  <span>Don't have an account?</span>
                  <a href="#">Sign up for free</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Login Section -->

  </main>

  <?php include_once 'include/footer.php'?>
  <?php include_once 'include/globalFooterScript.php'?>

</body>

</html>