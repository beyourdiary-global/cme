<?php
// AJAX loader to handle tab content loading

// Try to find config.php in different locations
$config_paths = [
    dirname(__FILE__) . '/../config.php',
    dirname(__FILE__) . '/../../config.php',
    '../config.php',
    '../../config.php'
];

$config_loaded = false;
foreach ($config_paths as $config_path) {
    if (file_exists($config_path)) {
        require_once $config_path;
        $config_loaded = true;
        break;
    }
}

// If config not found, try to find common.func.php
if (!$config_loaded) {
    $func_paths = [
        dirname(__FILE__) . '/../common.func.php',
        dirname(__FILE__) . '/../../common.func.php',
        '../common.func.php',
        '../../common.func.php'
    ];
    
    foreach ($func_paths as $func_path) {
        if (file_exists($func_path)) {
            require_once $func_path;
            break;
        }
    }
}

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo '<div class="alert alert-warning">Please log in to view this content.</div>';
    exit;
}

// Get the requested tab
$tab = $_GET['tab'] ?? '';

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

// Validate tab
if (!array_key_exists($tab, $tabs)) {
    http_response_code(404);
    echo '<div class="alert alert-danger">Invalid tab requested: ' . htmlspecialchars($tab) . '</div>';
    exit;
}

// Set content type
header('Content-Type: text/html; charset=utf-8');

// Include the requested tab file
$tabFile = __DIR__ . '/subTab/' . $tabs[$tab];

if (file_exists($tabFile)) {
    // Capture output
    ob_start();
    include $tabFile;
    $content = ob_get_clean();
    
    // Return the content
    echo $content;
} else {
    http_response_code(404);
    echo '<div class="alert alert-danger">Content file not found: ' . htmlspecialchars($tabs[$tab]) . '<br>Looking for: ' . htmlspecialchars($tabFile) . '</div>';
}
?>