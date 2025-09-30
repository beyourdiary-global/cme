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
    <h2>My Wishlist</h2>
    <p class="text-muted">Items you want to buy later</p>
</div>

<div class="wishlist-content" data-aos="fade-up" data-aos-delay="100">
    <div class="wishlist-actions mb-4">
        <div class="row">
            <div class="col-md-6">
                <button class="btn btn-primary">
                    <i class="bi bi-cart-plus"></i> Add All to Cart
                </button>
                <button class="btn btn-outline-danger ms-2">
                    <i class="bi bi-trash"></i> Clear Wishlist
                </button>
            </div>
            <div class="col-md-6 text-md-end">
                <span class="text-muted">5 items in wishlist</span>
            </div>
        </div>
    </div>

    <div class="wishlist-items">
        <div class="row">
            <!-- Sample wishlist item -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="wishlist-item card h-100">
                    <div class="position-relative">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Product">
                        <button class="btn btn-sm btn-outline-danger position-absolute top-0 end-0 m-2">
                            <i class="bi bi-heart-fill"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">Premium Headphones</h6>
                        <p class="card-text text-muted small">High-quality wireless headphones with noise cancellation
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="h6 text-primary mb-0">$129.99</span>
                            <button class="btn btn-sm btn-primary">
                                <i class="bi bi-cart-plus"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="wishlist-item card h-100">
                    <div class="position-relative">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Product">
                        <button class="btn btn-sm btn-outline-danger position-absolute top-0 end-0 m-2">
                            <i class="bi bi-heart-fill"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">Smart Watch</h6>
                        <p class="card-text text-muted small">Fitness tracking smartwatch with heart rate monitor
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="h6 text-primary mb-0">$199.99</span>
                            <button class="btn btn-sm btn-primary">
                                <i class="bi bi-cart-plus"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>