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
          <!-- Profile Sidebar -->
          <?php include_once 'profile/siderbar.php'; ?>

          <!-- Profile Content -->
          <div class="col-lg-9 profile-content" data-aos="fade-left" data-aos-delay="300">
            <div class="tab-content" id="profileTabsContent">
              <!-- Orders Tab -->
              <div class="tab-pane fade show active" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                <?php include_once 'profile/subTab/ordersTab.php'; ?>
              </div>

              <!-- Wishlist Tab -->
              <div class="tab-pane fade" id="wishlist" role="tabpanel" aria-labelledby="wishlist-tab">
                <?php include_once 'profile/subTab/wishlistTab.php'; ?>
              </div>

              <!-- Payment Methods Tab -->
              <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                <?php include_once 'profile/subTab/paymentMethodTab.php'; ?>
              </div>

              <!-- Reviews Tab -->
              <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                <?php include_once 'profile/subTab/reviewTab.php'; ?>
              </div>

              <!-- Personal Info Tab -->
              <div class="tab-pane fade" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                <?php include_once 'profile/subTab/personalInfoTab.php'; ?>
              </div>

              <!-- Addresses Tab -->
              <div class="tab-pane fade" id="addresses" role="tabpanel" aria-labelledby="addresses-tab">
                <?php include_once 'profile/subTab/addressTab.php'; ?>
              </div>

              <!-- Notifications Tab -->
              <div class="tab-pane fade" id="notifications" role="tabpanel" aria-labelledby="notifications-tab">
               <?php include_once 'profile/subTab/notificationTab.php'; ?>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Account Section -->

  </main>

  <?php include_once 'include/footer.php' ?>
  <?php include_once 'include/globalFooterScript.php' ?>
</body>

</html>
