<?php
require_once '../config.php';
// ...session/user checks as in index.php...
?>
<!DOCTYPE html>
<html lang="en" class="layout-menu-fixed layout-compact" data-assets-path="../assets/" data-template="vertical-menu-template-free">
<head>
    <?php include_once 'include/head.php'; ?>
</head>
<body>
<div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
    <?php include_once 'include/menu.php'; ?>
    <div class="layout-page">
      <?php include_once 'include/navbar.php'; ?>
      <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
          <div class="row mb-4">
            <div class="col-12">
              <h4 class="fw-bold py-3 mb-4">Settings</h4>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header pb-0">
                  <ul class="nav nav-tabs card-header-tabs" id="settingsTabs" role="tablist">
                    <li class="nav-item">
                      <button class="nav-link active" id="personal-tab" data-bs-toggle="tab" data-bs-target="#personal" type="button" role="tab" aria-controls="personal" aria-selected="true">
                        Personal Info
                      </button>
                    </li>
                    <li class="nav-item">
                      <button class="nav-link" id="account-tab" data-bs-toggle="tab" data-bs-target="#account" type="button" role="tab" aria-controls="account" aria-selected="false">
                        Account Details
                      </button>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                  <div class="tab-content" id="settingsTabsContent">
                    <?php include_once 'settings/personal-info-tab.php'; ?>
                    <?php include_once 'settings/account-details-tab.php'; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include_once 'include/components/footer.php'; ?>
        <div class="content-backdrop fade"></div>
      </div>
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <?php include_once 'include/components/buy-now-btn.php'; ?>
  <?php include_once 'include/components/scripts.php'; ?>
  
  <!-- Tab functionality script -->
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    // Initialize Bootstrap tabs
    var tabLinks = document.querySelectorAll('#settingsTabs .nav-link');
    var tabPanes = document.querySelectorAll('#settingsTabsContent .tab-pane');
    
    tabLinks.forEach(function(tabLink) {
      tabLink.addEventListener('click', function(e) {
        e.preventDefault();
        
        // Remove active class from all tabs and panes
        tabLinks.forEach(function(link) {
          link.classList.remove('active');
          link.setAttribute('aria-selected', 'false');
        });
        tabPanes.forEach(function(pane) {
          pane.classList.remove('show', 'active');
        });
        
        // Add active class to clicked tab
        this.classList.add('active');
        this.setAttribute('aria-selected', 'true');
        
        // Show corresponding tab pane
        var targetId = this.getAttribute('data-bs-target').substring(1);
        var targetPane = document.getElementById(targetId);
        if (targetPane) {
          targetPane.classList.add('show', 'active');
        }
      });
    });
  });
  </script>
  
  <style>
  /* Tab styling to ensure proper colors and better clickability */
  .nav-tabs .nav-link {
    border: 1px solid transparent;
    border-top-left-radius: 0.375rem;
    border-top-right-radius: 0.375rem;
    color: #6c757d;
    cursor: pointer;
    padding: 12px 20px; /* Increase padding for larger click area */
    display: block;
    width: 100%;
    text-align: center;
    text-decoration: none;
    background: none;
    border: none;
    outline: none;
    font-size: 14px;
    font-weight: 500;
    transition: all 0.2s ease;
    position: relative;
    z-index: 1;
  }
  
  .nav-tabs .nav-link:hover {
    border-color: #e9ecef #e9ecef #dee2e6;
    color: #495057;
    background-color: #f8f9fa;
  }
  
  .nav-tabs .nav-link.active {
    color: #495057;
    background-color: #fff;
    border-color: #dee2e6 #dee2e6 #fff;
    border: 1px solid #dee2e6;
    border-bottom-color: #fff;
  }
  
  .nav-tabs {
    border-bottom: 1px solid #dee2e6;
  }
  
  /* Ensure nav-item takes full clickable area */
  .nav-tabs .nav-item {
    margin-bottom: -1px;
    cursor: pointer;
  }
  
  /* Make sure the entire tab area is clickable */
  .nav-tabs .nav-item .nav-link {
    border: 1px solid transparent;
    margin: 0;
  }
  
  /* Fix any potential overlay issues */
  .card-header-tabs {
    margin-bottom: 0;
  }
  
  /* Ensure no interference from other elements */
  .nav-tabs .nav-link:focus {
    outline: 2px solid #0d6efd;
    outline-offset: 2px;
  }
  </style>
</body>
</html>
   