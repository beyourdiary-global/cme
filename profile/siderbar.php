<?php
// Get the current tab from URL parameter, default to 'orders'
$currentTab = $_GET['tab'] ?? 'orders';

// Define available tabs mapping
$tabs = [
    'orders' => 'ordersTab.php',
    'wishlist' => 'wishlistTab.php', 
    'payment' => 'paymentMethodTab.php',
    'reviews' => 'reviewTab.php',
    'personal' => 'personalInfoTab.php',
    'addresses' => 'addressTab.php',
    'notifications' => 'notificationTab.php'
];

// Validate current tab
if (!array_key_exists($currentTab, $tabs)) {
    $currentTab = 'orders';
}
?>

<div class="col-lg-3 profile-sidebar collapse d-lg-block" id="profileSidebar" data-aos="fade-right" data-aos-delay="200">
    <div class="profile-header">
        <div class="profile-avatar">
        <span>S</span>
        </div>
        <div class="profile-info">
        <h4>Sarah Anderson</h4>
        <div class="profile-bonus">
            <i class="bi bi-gift"></i>
            <span>100 bonuses available</span>
        </div>
        </div>
    </div>

    <div class="profile-nav">
        <ul class="nav flex-column" id="profileTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo ($currentTab === 'orders') ? 'active' : ''; ?>" 
                    id="orders-tab" 
                    data-tab="orders" 
                    data-target="orders" 
                    type="button" 
                    role="tab" 
                    aria-controls="orders" 
                    aria-selected="<?php echo ($currentTab === 'orders') ? 'true' : 'false'; ?>">
            <i class="bi bi-box-seam"></i>
            <span>Orders</span>
            <span class="badge">1</span>
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo ($currentTab === 'wishlist') ? 'active' : ''; ?>" 
                    id="wishlist-tab" 
                    data-tab="wishlist" 
                    data-target="wishlist" 
                    type="button" 
                    role="tab" 
                    aria-controls="wishlist" 
                    aria-selected="<?php echo ($currentTab === 'wishlist') ? 'true' : 'false'; ?>">
            <i class="bi bi-heart"></i>
            <span>Wishlist</span>
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo ($currentTab === 'payment') ? 'active' : ''; ?>" 
                    id="payment-tab" 
                    data-tab="payment" 
                    data-target="payment" 
                    type="button" 
                    role="tab" 
                    aria-controls="payment" 
                    aria-selected="<?php echo ($currentTab === 'payment') ? 'true' : 'false'; ?>">
            <i class="bi bi-credit-card"></i>
            <span>Payment methods</span>
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo ($currentTab === 'reviews') ? 'active' : ''; ?>" 
                    id="reviews-tab" 
                    data-tab="reviews" 
                    data-target="reviews" 
                    type="button" 
                    role="tab" 
                    aria-controls="reviews" 
                    aria-selected="<?php echo ($currentTab === 'reviews') ? 'true' : 'false'; ?>">
            <i class="bi bi-star"></i>
            <span>My reviews</span>
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo ($currentTab === 'personal') ? 'active' : ''; ?>" 
                    id="personal-tab" 
                    data-tab="personal" 
                    data-target="personal" 
                    type="button" 
                    role="tab" 
                    aria-controls="personal" 
                    aria-selected="<?php echo ($currentTab === 'personal') ? 'true' : 'false'; ?>">
            <i class="bi bi-person"></i>
            <span>Personal info</span>
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo ($currentTab === 'addresses') ? 'active' : ''; ?>" 
                    id="addresses-tab" 
                    data-tab="addresses" 
                    data-target="addresses" 
                    type="button" 
                    role="tab" 
                    aria-controls="addresses" 
                    aria-selected="<?php echo ($currentTab === 'addresses') ? 'true' : 'false'; ?>">
            <i class="bi bi-geo-alt"></i>
            <span>Addresses</span>
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo ($currentTab === 'notifications') ? 'active' : ''; ?>" 
                    id="notifications-tab" 
                    data-tab="notifications" 
                    data-target="notifications" 
                    type="button" 
                    role="tab" 
                    aria-controls="notifications" 
                    aria-selected="<?php echo ($currentTab === 'notifications') ? 'true' : 'false'; ?>">
            <i class="bi bi-bell"></i>
            <span>Notifications</span>
            </button>
        </li>
        </ul>

        <h6 class="nav-section-title">Customer service</h6>
        <ul class="nav flex-column">
        <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="bi bi-question-circle"></i>
            <span>Help center</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="bi bi-file-text"></i>
            <span>Terms and conditions</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="logout" class="nav-link logout">
            <i class="bi bi-box-arrow-right"></i>
            <span>Log out</span>
            </a>
        </li>
        </ul>
    </div>
</div>

<!-- Tab Content Container with proper wrapper -->
<div class="col-lg-9">
    <div class="profile-content-wrapper">
        <div class="tab-content" id="tabContent">
            <?php
            // Load initial tab content
            $initialFile = __DIR__ . '/subTab/' . $tabs[$currentTab];
            if (file_exists($initialFile)) {
                include $initialFile;
            } else {
                echo '<div class="alert alert-danger">Content not found: ' . $tabs[$currentTab] . '</div>';
            }
            ?>
        </div>
    </div>
</div>

<style>
/* Ensure proper styling for AJAX loaded content */
.profile-content-wrapper {
    min-height: 500px;
}

.tab-content {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    padding: 30px;
}

/* Preserve original styling for loaded content */
.tab-content .personal-info-form,
.tab-content .orders-content,
.tab-content .wishlist-content {
    background: transparent;
    box-shadow: none;
    padding: 0;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabButtons = document.querySelectorAll('[data-tab]');
    const contentContainer = document.getElementById('tabContent');
    let isLoading = false;
    
    // Get the correct AJAX URL based on current location
    const currentPath = window.location.pathname;
    let ajaxBaseUrl = '/cme/profile/ajax-loader.php';
    
    console.log('Current path:', currentPath);
    console.log('AJAX base URL:', ajaxBaseUrl);
    
    // Handle tab clicks
    tabButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            if (isLoading) return; // Prevent multiple clicks
            
            const tabName = this.getAttribute('data-tab');
            
            // Don't reload if already active
            if (this.classList.contains('active')) {
                return;
            }
            
            isLoading = true;
            
            // Update active states
            tabButtons.forEach(btn => {
                btn.classList.remove('active');
                btn.setAttribute('aria-selected', 'false');
            });
            
            this.classList.add('active');
            this.setAttribute('aria-selected', 'true');
            
            // Show loading state
            contentContainer.innerHTML = '<div class="text-center py-5"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>';
            
            // Build the AJAX URL
            const ajaxUrl = `${ajaxBaseUrl}?tab=${tabName}`;
            
            // Load content via AJAX with debugging
            console.log('Loading tab:', tabName);
            console.log('Request URL:', ajaxUrl);
            
            fetch(ajaxUrl, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => {
                console.log('Response status:', response.status);
                console.log('Response URL:', response.url);
                
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.text();
            })
            .then(html => {
                console.log('Content loaded successfully');
                contentContainer.innerHTML = html;
                
                // Update URL without page refresh
                const newUrl = new URL(window.location);
                newUrl.searchParams.set('tab', tabName);
                history.pushState({tab: tabName}, '', newUrl);
                
                // Reinitialize any scripts in the loaded content
                reinitializeScripts();
            })
            .catch(error => {
                console.error('Error loading tab content:', error);
                contentContainer.innerHTML = `
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Error Loading Content</h4>
                        <p>Unable to load the requested tab content.</p>
                        <hr>
                        <p class="mb-0">Tab: ${tabName}</p>
                        <p class="mb-0">Error: ${error.message}</p>
                        <p class="mb-0">Request URL: ${ajaxUrl}</p>
                        <p class="mb-0">Current Path: ${currentPath}</p>
                    </div>
                `;
            })
            .finally(() => {
                isLoading = false;
            });
        });
    });
    
    // Handle browser back/forward buttons
    window.addEventListener('popstate', function(event) {
        if (event.state && event.state.tab) {
            const tabButton = document.querySelector(`[data-tab="${event.state.tab}"]`);
            if (tabButton && !tabButton.classList.contains('active')) {
                tabButton.click();
            }
        }
    });
    
    // Function to reinitialize scripts after content load
    function reinitializeScripts() {
        // Reinitialize AOS if present
        if (typeof AOS !== 'undefined') {
            AOS.refresh();
        }
        
        // Execute any inline scripts in the loaded content
        const scripts = contentContainer.querySelectorAll('script');
        scripts.forEach(script => {
            if (!script.src) {
                // Inline script - execute it
                try {
                    const scriptFunction = new Function(script.textContent);
                    scriptFunction();
                } catch (e) {
                    console.error('Error executing inline script:', e);
                }
            }
        });
    }
});
</script>