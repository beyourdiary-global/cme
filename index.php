<?php
// Start session and include config at the very top
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
 <?php include_once 'include/header.php'?>
</head>

<body class="index-page">

  <header id="header" class="header position-relative">
    <?php include_once 'include/topbar.php'?>
    <?php include_once 'include/mainHeader.php'?>
    <?php include_once 'include/navigation.php'?>
    <?php include_once 'main/annoucementBar.php'?>
    <!-- Mobile Search Form -->
    <?php include_once 'main/mobileSearchForm.php'?>
  </header>

  <main class="main">
    
    <!-- Show access denied error if present -->
    <?php if (isset($_GET['error']) && $_GET['error'] === 'access_denied'): ?>
      <section class="py-5">
        <div class="container">
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h4 class="alert-heading">Access Denied!</h4>
            <p>You don't have permission to access the admin area. Only administrators can access the CMS.</p>
            <hr>
            <p class="mb-0">Please contact your administrator if you believe this is an error.</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        </div>
      </section>
    <?php endif; ?>

    <!-- Hero Section -->
    <?php include_once 'main/heroBanner.php'?>
    <!-- /Hero Section -->

    <!-- Promo Cards Section -->
    <?php include_once 'main/promoCard.php'?>
    <!-- /Promo Cards Section -->

    <!-- Category Cards Section -->
    <?php include_once 'main/categoryCard.php'?>
    <!-- /Category Cards Section -->

    <!-- Best Sellers Section -->
    <?php include_once 'main/bestSeller.php'?>
    <!-- /Best Sellers Section -->

    <!-- Product List Section -->
    <?php include_once 'main/productList.php'?>
    <!-- /Product List Section -->

  </main>
  <?php include_once 'include/footer.php'?>
  <?php include_once 'include/globalFooterScript.php'?>
</body>

</html>