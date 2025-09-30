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
    <h2>Order History</h2>
    <p class="text-muted">View and track your orders</p>
</div>

<div class="orders-content" data-aos="fade-up" data-aos-delay="100">
    <div class="orders-filter mb-4">
        <div class="row">
            <div class="col-md-6">
                <select class="form-select" id="orderStatus">
                    <option value="">All Orders</option>
                    <option value="pending">Pending</option>
                    <option value="processing">Processing</option>
                    <option value="shipped">Shipped</option>
                    <option value="delivered">Delivered</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Search orders..." id="orderSearch">
            </div>
        </div>
    </div>

    <div class="orders-list">
        <!-- Sample order items -->
        <div class="order-item border rounded p-3 mb-3">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <h6 class="mb-1">Order #CME001</h6>
                    <small class="text-muted">Sept 28, 2025</small>
                </div>
                <div class="col-md-2">
                    <span class="badge bg-success">Delivered</span>
                </div>
                <div class="col-md-2">
                    <strong>$149.99</strong>
                </div>
                <div class="col-md-3">
                    <small class="text-muted">3 items</small>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-outline-primary btn-sm">View Details</button>
                </div>
            </div>
        </div>

        <div class="order-item border rounded p-3 mb-3">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <h6 class="mb-1">Order #CME002</h6>
                    <small class="text-muted">Sept 25, 2025</small>
                </div>
                <div class="col-md-2">
                    <span class="badge bg-warning">Processing</span>
                </div>
                <div class="col-md-2">
                    <strong>$89.50</strong>
                </div>
                <div class="col-md-3">
                    <small class="text-muted">2 items</small>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-outline-primary btn-sm">Track Order</button>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-4">
        <button class="btn btn-outline-secondary">Load More Orders</button>
    </div>
</div>