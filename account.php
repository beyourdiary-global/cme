<?php
ob_start(); // Start output buffering
require_once 'config.php';
require_once 'common.func.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once 'include/header.php' ?>
</head>

<body class="account-page">

  <header id="header" class="header position-relative">
    <!-- Top Bar -->
    <?php include_once 'include/topbar.php' ?>
    <?php include_once 'include/mainHeader.php' ?>
    <?php include_once 'include/navigation.php' ?>
    <?php include_once 'main/annoucementBar.php' ?>
    <?php include_once 'main/mobileSearchForm.php' ?>
  </header>

  <main class="main">
    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container">
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Account</li>
          </ol>
        </nav>
        <h1>Account</h1>
      </div>
    </div><!-- End Page Title -->
    
    <!-- Account Section -->
    <section id="account" class="account section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!-- Mobile Sidebar Toggle Button -->
        <div class="sidebar-toggle d-lg-none mb-3">
          <button class="btn btn-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#profileSidebar" aria-expanded="false" aria-controls="profileSidebar">
            <i class="bi bi-list me-2"></i> Profile Menu
          </button>
        </div>

        <div class="row">
          <!-- Profile Sidebar and Content (both included in siderbar.php) -->
          <?php include_once 'profile/siderbar.php'; ?>
        </div>

      </div>
    </section><!-- /Account Section -->

  </main>

  <?php include_once 'include/footer.php' ?>
  <?php include_once 'include/globalFooterScript.php' ?>
</body>

</html>
