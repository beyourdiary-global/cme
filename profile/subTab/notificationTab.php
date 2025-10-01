<?php
// Fix config path for AJAX loading
$config_paths = [
    dirname(dirname(dirname(__FILE__))) . '/config.php',
    '../config.php',
    '../../config.php'
];

foreach ($config_paths as $config_path) {
    if (file_exists($config_path)) {
        require_once $config_path;
        break;
    }
}

if (session_status() === PHP_SESSION_NONE) {
    secureSessionStart();
}

if (!isset($_SESSION['user_id'])) {
    echo '<div class="alert alert-warning">Please log in to view this content.</div>';
    exit;
}
?>

<div class="tab-header">
    <h2>Notification Settings</h2>
</div>
<div class="notifications-settings" data-aos="fade-up" data-aos-delay="100">
    <div class="notification-group">
    <h5>Order Updates</h5>
    <div class="notification-item">
        <div class="notification-info">
        <div class="notification-title">Order status changes</div>
        <div class="notification-desc">Receive notifications when your order status changes</div>
        </div>
        <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="orderStatusNotif" checked="">
        <label class="form-check-label" for="orderStatusNotif"></label>
        </div>
    </div>
    <div class="notification-item">
        <div class="notification-info">
        <div class="notification-title">Shipping updates</div>
        <div class="notification-desc">Receive notifications about shipping and delivery</div>
        </div>
        <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="shippingNotif" checked="">
        <label class="form-check-label" for="shippingNotif"></label>
        </div>
    </div>
    </div>

    <div class="notification-group">
    <h5>Account Activity</h5>
    <div class="notification-item">
        <div class="notification-info">
        <div class="notification-title">Security alerts</div>
        <div class="notification-desc">Receive notifications about security-related activity</div>
        </div>
        <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="securityNotif" checked="">
        <label class="form-check-label" for="securityNotif"></label>
        </div>
    </div>
    <div class="notification-item">
        <div class="notification-info">
        <div class="notification-title">Password changes</div>
        <div class="notification-desc">Receive notifications when your password is changed</div>
        </div>
        <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="passwordNotif" checked="">
        <label class="form-check-label" for="passwordNotif"></label>
        </div>
    </div>
    </div>

    <div class="notification-group">
    <h5>Marketing</h5>
    <div class="notification-item">
        <div class="notification-info">
        <div class="notification-title">Promotions and deals</div>
        <div class="notification-desc">Receive notifications about special offers and discounts</div>
        </div>
        <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="promoNotif">
        <label class="form-check-label" for="promoNotif"></label>
        </div>
    </div>
    <div class="notification-item">
        <div class="notification-info">
        <div class="notification-title">New product arrivals</div>
        <div class="notification-desc">Receive notifications when new products are added</div>
        </div>
        <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="newProductNotif">
        <label class="form-check-label" for="newProductNotif"></label>
        </div>
    </div>
    <div class="notification-item">
        <div class="notification-info">
        <div class="notification-title">Personalized recommendations</div>
        <div class="notification-desc">Receive notifications with product recommendations based on your interests</div>
        </div>
        <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="recommendNotif" checked="">
        <label class="form-check-label" for="recommendNotif"></label>
        </div>
    </div>
    </div>

    <div class="notification-actions">
    <button type="button" class="btn btn-save">Save Preferences</button>
    </div>
</div>

<script>
// Add functionality for the notification settings
document.addEventListener('DOMContentLoaded', function() {
    const saveBtn = document.querySelector('.btn-save');
    if (saveBtn) {
        saveBtn.addEventListener('click', function() {
            // Collect all notification preferences
            const preferences = {};
            const checkboxes = document.querySelectorAll('.notifications-settings input[type="checkbox"]');
            
            checkboxes.forEach(checkbox => {
                preferences[checkbox.id] = checkbox.checked;
            });
            
            console.log('Saving preferences:', preferences);
            
            // Here you would send the preferences to your backend
            // For now, just show a success message
            if (typeof showToast === 'function') {
                showToast('Notification preferences saved successfully!', 'success');
            } else {
                alert('Notification preferences saved successfully!');
            }
        });
    }
});
</script>