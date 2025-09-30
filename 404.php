<?php
require_once 'config.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once 'include/header.php'?>
</head>

<body class="page-404">

    <header id="header" class="header position-relative">
    <?php include_once 'include/topbar.php'?>
    <?php include_once 'include/mainHeader.php'?>
    <?php include_once 'include/navigation.php'?>
    <?php include_once 'main/annoucementBar.php'?>
    <?php include_once 'main/mobileSearchForm.php'?>
  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container">
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">404</li>
          </ol>
        </nav>
        <h1>404</h1>
      </div>
    </div><!-- End Page Title -->

    <!-- Error 404 Section -->
    <section id="error-404" class="error-404 section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0 align-items-center">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
            <div class="error-content text-center text-lg-start">
              <span class="error-badge" data-aos="fade-down" data-aos-delay="300">404 Error</span>
              <h1 class="error-title mt-4" data-aos="fade-up" data-aos-delay="400">Lost in Space?</h1>
              <p class="error-text mt-3" data-aos="fade-up" data-aos-delay="500">
                Looks like you've ventured into uncharted territory. The page you're looking for has drifted off into space.
              </p>
              <div class="error-actions mt-4" data-aos="fade-up" data-aos-delay="600">
                <a href="index.php" class="btn btn-outline">
                  <i class="bi bi-arrow-left me-2"></i>Return to Earth
                </a>
                <a href="category.php" class="btn btn-solid ms-3">
                  <i class="bi bi-search me-2"></i>Explore Pages
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
            <div class="error-illustration text-center">
              <div class="illustration-container">
                <div class="planet">
                  <i class="bi bi-globe2"></i>
                </div>
                <div class="astronaut">
                  <i class="bi bi-person-workspace"></i>
                </div>
                <div class="stars">
                  <i class="bi bi-star-fill star-1"></i>
                  <i class="bi bi-star-fill star-2"></i>
                  <i class="bi bi-star-fill star-3"></i>
                  <i class="bi bi-star-fill star-4"></i>
                  <i class="bi bi-star-fill star-5"></i>
                </div>
              </div>
              <div class="support-text mt-4">
                <p>Need help finding your way?</p>
                <a href="contact.php" class="support-link">
                  <i class="bi bi-life-preserver me-2"></i>Contact Support
                </a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Error 404 Section -->

  </main>

  <?php include_once 'include/footer.php'?>
  <?php include_once 'include/globalFooterScript.php'?>

</body>

</html>