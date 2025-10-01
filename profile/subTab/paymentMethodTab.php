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
    <h2>Payment Methods</h2>
    <p class="text-muted">Manage your saved payment methods</p>
</div>

<div class="payment-methods-content" data-aos="fade-up" data-aos-delay="100">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5>Saved Cards</h5>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPaymentModal">
            <i class="bi bi-plus"></i> Add New Card
        </button>
    </div>

    <div class="payment-methods-list">
        <!-- Sample payment method -->
        <div class="payment-method-item border rounded p-3 mb-3">
            <div class="row align-items-center">
                <div class="col-md-2">
                    <i class="bi bi-credit-card-2-front fs-2 text-primary"></i>
                </div>
                <div class="col-md-6">
                    <h6 class="mb-1">Visa ending in 4242</h6>
                    <small class="text-muted">Expires 12/2027</small>
                    <div class="mt-1">
                        <span class="badge bg-success">Default</span>
                    </div>
                </div>
                <div class="col-md-4 text-md-end">
                    <button class="btn btn-outline-secondary btn-sm me-2">Edit</button>
                    <button class="btn btn-outline-danger btn-sm">Remove</button>
                </div>
            </div>
        </div>

        <div class="payment-method-item border rounded p-3 mb-3">
            <div class="row align-items-center">
                <div class="col-md-2">
                    <i class="bi bi-credit-card-2-front fs-2 text-warning"></i>
                </div>
                <div class="col-md-6">
                    <h6 class="mb-1">Mastercard ending in 8888</h6>
                    <small class="text-muted">Expires 08/2026</small>
                </div>
                <div class="col-md-4 text-md-end">
                    <button class="btn btn-outline-primary btn-sm me-2">Set as Default</button>
                    <button class="btn btn-outline-secondary btn-sm me-2">Edit</button>
                    <button class="btn btn-outline-danger btn-sm">Remove</button>
                </div>
            </div>
        </div>
    </div>

    <div class="billing-address mt-5">
        <h5>Billing Address</h5>
        <div class="border rounded p-3">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-1"><strong>Sarah Anderson</strong></p>
                    <p class="mb-1">123 Main Street</p>
                    <p class="mb-1">New York, NY 10001</p>
                    <p class="mb-0">United States</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <button class="btn btn-outline-secondary">Edit Address</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Payment Method Modal -->
<div class="modal fade" id="addPaymentModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Payment Method</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Card Number</label>
                        <input type="text" class="form-control" placeholder="1234 5678 9012 3456">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Expiry Date</label>
                            <input type="text" class="form-control" placeholder="MM/YY">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">CVV</label>
                            <input type="text" class="form-control" placeholder="123">
                        </div>
                    </div>
                    <div class="mb-3 mt-3">
                        <label class="form-label">Cardholder Name</label>
                        <input type="text" class="form-control" placeholder="Name on card">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="setDefault">
                        <label class="form-check-label" for="setDefault">
                            Set as default payment method
                        </label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Add Card</button>
            </div>
        </div>
    </div>
</div>