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
    <h2>My Reviews</h2>
    <p class="text-muted">Reviews you've written for products</p>
</div>

<div class="reviews-content" data-aos="fade-up" data-aos-delay="100">
    <div class="reviews-stats mb-4">
        <div class="row">
            <div class="col-md-3">
                <div class="stat-card text-center p-3 border rounded">
                    <h4 class="text-primary">8</h4>
                    <small class="text-muted">Total Reviews</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card text-center p-3 border rounded">
                    <h4 class="text-warning">4.5</h4>
                    <small class="text-muted">Average Rating</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card text-center p-3 border rounded">
                    <h4 class="text-success">156</h4>
                    <small class="text-muted">Helpful Votes</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card text-center p-3 border rounded">
                    <h4 class="text-info">3</h4>
                    <small class="text-muted">Pending Reviews</small>
                </div>
            </div>
        </div>
    </div>

    <div class="reviews-filter mb-4">
        <div class="row">
            <div class="col-md-6">
                <select class="form-select">
                    <option value="">All Reviews</option>
                    <option value="5">5 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="3">3 Stars</option>
                    <option value="2">2 Stars</option>
                    <option value="1">1 Star</option>
                </select>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Search reviews...">
            </div>
        </div>
    </div>

    <div class="reviews-list">
        <!-- Sample review -->
        <div class="review-item border rounded p-3 mb-3">
            <div class="row">
                <div class="col-md-3">
                    <img src="https://via.placeholder.com/100x100" class="img-fluid rounded" alt="Product">
                </div>
                <div class="col-md-9">
                    <div class="d-flex justify-content-between">
                        <h6>Premium Wireless Headphones</h6>
                        <small class="text-muted">Sept 20, 2025</small>
                    </div>
                    <div class="rating mb-2">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <span class="ms-2">5.0</span>
                    </div>
                    <p class="mb-2">"Excellent sound quality and comfortable to wear for long periods. The noise cancellation works great!"</p>
                    <div class="review-actions">
                        <small class="text-muted me-3">
                            <i class="bi bi-hand-thumbs-up"></i> 12 people found this helpful
                        </small>
                        <button class="btn btn-sm btn-outline-secondary me-2">Edit</button>
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="review-item border rounded p-3 mb-3">
            <div class="row">
                <div class="col-md-3">
                    <img src="https://via.placeholder.com/100x100" class="img-fluid rounded" alt="Product">
                </div>
                <div class="col-md-9">
                    <div class="d-flex justify-content-between">
                        <h6>Smart Fitness Tracker</h6>
                        <small class="text-muted">Sept 15, 2025</small>
                    </div>
                    <div class="rating mb-2">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star text-muted"></i>
                        <span class="ms-2">4.0</span>
                    </div>
                    <p class="mb-2">"Good fitness tracker with accurate step counting. Battery life could be better."</p>
                    <div class="review-actions">
                        <small class="text-muted me-3">
                            <i class="bi bi-hand-thumbs-up"></i> 8 people found this helpful
                        </small>
                        <button class="btn btn-sm btn-outline-secondary me-2">Edit</button>
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-4">
        <button class="btn btn-outline-secondary">Load More Reviews</button>
    </div>
</div>