<?php
require_once 'config.php';

// Page-specific variables
$pageTitle = "Starter Page";
$pageDescription = "A flexible starter template for creating custom pages";
$createdDate = date('F j, Y');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once 'include/header.php'; ?>
</head>

<body class="starter-page-page">

  <header id="header" class="header position-relative">
    <?php include_once 'include/topbar.php'; ?>
    <?php include_once 'include/mainHeader.php'; ?>
    <?php include_once 'include/navigation.php'; ?>
    <?php include_once 'main/annoucementBar.php'; ?>
    <?php include_once 'main/mobileSearchForm.php'; ?>
  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container">
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current"><?= $pageTitle ?></li>
          </ol>
        </nav>
        <h1><?= $pageTitle ?></h1>
      </div>
    </div><!-- End Page Title -->

    <!-- Starter Section -->
    <section id="starter-section" class="starter-section section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Welcome to Your Starter Template</h2>
        <p><?= $pageDescription ?> - Perfect foundation for building custom functionality</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up">
        
        <!-- Welcome Card -->
        <div class="welcome-card mb-5" data-aos="fade-up" data-aos-delay="100">
          <div class="card">
            <div class="card-body text-center p-5">
              <div class="icon mb-4">
                <i class="bi bi-rocket-takeoff display-1 text-primary"></i>
              </div>
              <h3>Ready to Build Something Amazing?</h3>
              <p class="lead mb-4">This starter page provides a clean foundation with all the essential components you need to create custom pages for your website.</p>
              <div class="meta-info">
                <small class="text-muted">Template created on <?= $createdDate ?></small>
              </div>
            </div>
          </div>
        </div>

        <!-- Features Grid -->
        <div class="features-section mb-5" data-aos="fade-up" data-aos-delay="200">
          <h3 class="text-center mb-4">What's Included</h3>
          <div class="row g-4">
            <div class="col-md-6 col-lg-3">
              <div class="feature-box text-center h-100">
                <div class="icon mb-3">
                  <i class="bi bi-layout-text-window-reverse display-4 text-primary"></i>
                </div>
                <h4>Complete Header</h4>
                <p>Full navigation, topbar, search, and mega menus already integrated</p>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="feature-box text-center h-100">
                <div class="icon mb-3">
                  <i class="bi bi-code-slash display-4 text-success"></i>
                </div>
                <h4>PHP Variables</h4>
                <p>Dynamic content management with customizable PHP variables</p>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="feature-box text-center h-100">
                <div class="icon mb-3">
                  <i class="bi bi-phone display-4 text-info"></i>
                </div>
                <h4>Responsive Design</h4>
                <p>Mobile-first design that looks great on all device sizes</p>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="feature-box text-center h-100">
                <div class="icon mb-3">
                  <i class="bi bi-magic display-4 text-warning"></i>
                </div>
                <h4>AOS Animations</h4>
                <p>Smooth scroll animations and effects built right in</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Content Examples -->
        <div class="content-examples mb-5" data-aos="fade-up" data-aos-delay="300">
          <h3 class="text-center mb-4">Content Examples</h3>
          <div class="row g-4">
            <div class="col-lg-6">
              <div class="example-card">
                <h4><i class="bi bi-card-text me-2"></i>Text Content</h4>
                <p>Add your custom content here. This starter template gives you a clean slate to build upon with professional styling and responsive layout already in place.</p>
                <ul class="list-unstyled">
                  <li><i class="bi bi-check2 text-success me-2"></i>Professional typography</li>
                  <li><i class="bi bi-check2 text-success me-2"></i>Consistent spacing</li>
                  <li><i class="bi bi-check2 text-success me-2"></i>Accessible color scheme</li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="example-card">
                <h4><i class="bi bi-palette me-2"></i>Visual Elements</h4>
                <p>The template includes Bootstrap icons, cards, buttons, and other UI components ready to use.</p>
                <div class="button-group mt-3">
                  <button class="btn btn-primary me-2">Primary Button</button>
                  <button class="btn btn-outline-secondary me-2">Secondary</button>
                  <button class="btn btn-success">Success</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Quick Links -->
        <div class="quick-links" data-aos="fade-up" data-aos-delay="400">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title text-center mb-4">Quick Actions</h4>
              <div class="row text-center">
                <div class="col-md-3 mb-3">
                  <a href="index.php" class="btn btn-outline-primary w-100">
                    <i class="bi bi-house-door me-2"></i>Back to Home
                  </a>
                </div>
                <div class="col-md-3 mb-3">
                  <a href="about.php" class="btn btn-outline-info w-100">
                    <i class="bi bi-info-circle me-2"></i>Learn More
                  </a>
                </div>
                <div class="col-md-3 mb-3">
                  <a href="contact.php" class="btn btn-outline-success w-100">
                    <i class="bi bi-envelope me-2"></i>Contact Us
                  </a>
                </div>
                <div class="col-md-3 mb-3">
                  <a href="support.php" class="btn btn-outline-warning w-100">
                    <i class="bi bi-question-circle me-2"></i>Get Support
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Development Tips -->
        <div class="dev-tips mt-5" data-aos="fade-up" data-aos-delay="500">
          <div class="alert alert-info">
            <h5><i class="bi bi-lightbulb me-2"></i>Development Tips</h5>
            <ul class="mb-0">
              <li>Customize the <code>$pageTitle</code> and <code>$pageDescription</code> variables at the top</li>
              <li>Add your custom CSS classes to the existing structure</li>
              <li>Use the included PHP includes for consistent header/footer</li>
              <li>Leverage Bootstrap 5 classes for rapid development</li>
            </ul>
          </div>
        </div>

      </div>

    </section><!-- /Starter Section -->

  </main>

  <?php include_once 'include/footer.php'; ?>
  <?php include_once 'include/globalFooterScript.php'; ?>

</body>

</html>