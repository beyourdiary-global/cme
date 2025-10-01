<?php
require_once '../config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

// Check if user has admin role
if ($_SESSION['role'] !== 'admin') {
    // Redirect non-admin users to main site or show error
    header("Location: ../index.php?error=access_denied");
    exit;
}

// Optional: Get user info for display
$stmt = $pdo->prepare("SELECT first_name, last_name, email, role FROM users WHERE user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();

if (!$user) {
    // User not found, redirect to login
    session_destroy();
    header("Location: ../login.php");
    exit;
}
?>
<!DOCTYPE html>
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <?php include_once 'include/head.php'; ?>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <?php include_once 'include/menu.php'; ?>

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <?php include_once 'include/navbar.php'; ?>
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Welcome message for admin -->
              <div class="row mb-4">
                <div class="col-12">
                  <div class="alert alert-info">
                    <h5 class="alert-heading">Welcome, <?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?>!</h5>
                    <p class="mb-0">You are logged in as <strong><?= htmlspecialchars($user['role']) ?></strong></p>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Admin Dashboard</h5>
                      <p class="card-text">This is the admin control panel.</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 order-1">
                  <div class="row">
                    <div class="col-12 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <h6 class="card-title">Quick Stats</h6>
                          <!-- Add your admin stats here -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Total Revenue -->
                <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                  <!-- Your existing revenue section -->
                </div>
                <!--/ Total Revenue -->
                <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                  <div class="row">
                    <div class="col-12 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                              <div class="card-title">
                                <h6 class="mb-0">Profile Report</h6>
                              </div>
                              <div class="mt-sm-auto">
                                <small class="text-muted">Admin Analytics</small>
                              </div>
                            </div>
                            <div id="profileReportChart"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <?php include_once 'include/components/order-statistics.php'; ?>
                <?php include_once 'include/components/expense-overview.php'; ?>
                <?php include_once 'include/components/transactions.php'; ?>
              </div>
            </div>
            <!-- / Content -->

            <?php include_once 'include/components/footer.php'; ?>

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <?php include_once 'include/components/buy-now-btn.php'; ?>

    <?php include_once 'include/components/scripts.php'; ?>
  </body>
</html>