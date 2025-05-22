<div class="tab-header">
    <h2>Orders</h2>
    <div class="tab-filters">
    <div class="row">
        <div class="col-md-6 mb-3 mb-md-0">
        <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" id="statusFilter" data-bs-toggle="dropdown" aria-expanded="false">
            <span>Select status</span>
            <i class="bi bi-chevron-down"></i>
            </button>
            <ul class="dropdown-menu" aria-labelledby="statusFilter">
            <li><a class="dropdown-item" href="#">All statuses</a></li>
            <li><a class="dropdown-item" href="#">In progress</a></li>
            <li><a class="dropdown-item" href="#">Delivered</a></li>
            <li><a class="dropdown-item" href="#">Canceled</a></li>
            </ul>
        </div>
        </div>
        <div class="col-md-6">
        <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" id="timeFilter" data-bs-toggle="dropdown" aria-expanded="false">
            <span>For all time</span>
            <i class="bi bi-chevron-down"></i>
            </button>
            <ul class="dropdown-menu" aria-labelledby="timeFilter">
            <li><a class="dropdown-item" href="#">For all time</a></li>
            <li><a class="dropdown-item" href="#">Last 30 days</a></li>
            <li><a class="dropdown-item" href="#">Last 6 months</a></li>
            <li><a class="dropdown-item" href="#">Last year</a></li>
            </ul>
        </div>
        </div>
    </div>
    </div>
</div>

<div class="orders-table">
    <div class="table-header">
    <div class="row">
        <div class="col-md-3">
        <div class="sort-header">
            Order #
        </div>
        </div>
        <div class="col-md-3">
        <div class="sort-header">
            Order date
            <i class="bi bi-arrow-down-up"></i>
        </div>
        </div>
        <div class="col-md-3">
        <div class="sort-header">
            Status
        </div>
        </div>
        <div class="col-md-3">
        <div class="sort-header">
            Total
            <i class="bi bi-arrow-down-up"></i>
        </div>
        </div>
    </div>
    </div>

    <div class="order-items">
    <!-- Order Item 1 -->
    <div class="order-item">
        <div class="row align-items-center">
        <div class="col-md-3">
            <div class="order-id">78A6431D409</div>
        </div>
        <div class="col-md-3">
            <div class="order-date">02/15/2025</div>
        </div>
        <div class="col-md-3">
            <div class="order-status in-progress">
            <span class="status-dot"></span>
            <span>In progress</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="order-total">$2,105.90</div>
        </div>
        </div>
        <div class="order-products">
        <div class="product-thumbnails">
            <img src="assets/img/product/product-1.webp" alt="Product" class="product-thumb" loading="lazy">
            <img src="assets/img/product/product-2.webp" alt="Product" class="product-thumb" loading="lazy">
            <img src="assets/img/product/product-3.webp" alt="Product" class="product-thumb" loading="lazy">
        </div>
        <button type="button" class="order-details-link" data-bs-toggle="collapse" data-bs-target="#orderDetails1" aria-expanded="false" aria-controls="orderDetails1">
            <i class="bi bi-chevron-down"></i>
        </button>
        </div>
        <div class="collapse order-details" id="orderDetails1">
        <div class="order-details-content">
            <div class="order-details-header">
            <h5>Order Details</h5>
            <div class="order-info">
                <div class="info-item">
                <span class="info-label">Order Date:</span>
                <span class="info-value">02/15/2025</span>
                </div>
                <div class="info-item">
                <span class="info-label">Payment Method:</span>
                <span class="info-value">Credit Card (**** 4589)</span>
                </div>
            </div>
            </div>
            <div class="order-items-list">
            <div class="order-item-detail">
                <div class="item-image">
                <img src="assets/img/product/product-1.webp" alt="Product" loading="lazy">
                </div>
                <div class="item-info">
                <h6>Lorem ipsum dolor sit amet</h6>
                <div class="item-meta">
                    <span class="item-sku">SKU: PRD-001</span>
                    <span class="item-qty">Qty: 1</span>
                </div>
                </div>
                <div class="item-price">$899.99</div>
            </div>
            <div class="order-item-detail">
                <div class="item-image">
                <img src="assets/img/product/product-2.webp" alt="Product" loading="lazy">
                </div>
                <div class="item-info">
                <h6>Consectetur adipiscing elit</h6>
                <div class="item-meta">
                    <span class="item-sku">SKU: PRD-002</span>
                    <span class="item-qty">Qty: 2</span>
                </div>
                </div>
                <div class="item-price">$599.95</div>
            </div>
            <div class="order-item-detail">
                <div class="item-image">
                <img src="assets/img/product/product-3.webp" alt="Product" loading="lazy">
                </div>
                <div class="item-info">
                <h6>Sed do eiusmod tempor</h6>
                <div class="item-meta">
                    <span class="item-sku">SKU: PRD-003</span>
                    <span class="item-qty">Qty: 1</span>
                </div>
                </div>
                <div class="item-price">$129.99</div>
            </div>
            </div>
            <div class="order-summary">
            <div class="summary-row">
                <span>Subtotal:</span>
                <span>$1,929.93</span>
            </div>
            <div class="summary-row">
                <span>Shipping:</span>
                <span>$15.99</span>
            </div>
            <div class="summary-row">
                <span>Tax:</span>
                <span>$159.98</span>
            </div>
            <div class="summary-row total">
                <span>Total:</span>
                <span>$2,105.90</span>
            </div>
            </div>
            <div class="shipping-info">
            <div class="shipping-address">
                <h6>Shipping Address</h6>
                <p>123 Main Street<br>Apt 4B<br>New York, NY 10001<br>United States</p>
            </div>
            <div class="shipping-method">
                <h6>Shipping Method</h6>
                <p>Express Delivery (2-3 business days)</p>
            </div>
            </div>
        </div>
        </div>
    </div><!-- End Order Item -->

    <!-- Order Item 2 -->
    <div class="order-item">
        <div class="row align-items-center">
        <div class="col-md-3">
            <div class="order-id">47H76G09F33</div>
        </div>
        <div class="col-md-3">
            <div class="order-date">12/10/2024</div>
        </div>
        <div class="col-md-3">
            <div class="order-status delivered">
            <span class="status-dot"></span>
            <span>Delivered</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="order-total">$360.75</div>
        </div>
        </div>
        <div class="order-products">
        <div class="product-thumbnails">
            <img src="assets/img/product/product-4.webp" alt="Product" class="product-thumb" loading="lazy">
        </div>
        <button type="button" class="order-details-link" data-bs-toggle="collapse" data-bs-target="#orderDetails2" aria-expanded="false" aria-controls="orderDetails2">
            <i class="bi bi-chevron-down"></i>
        </button>
        </div>
        <div class="collapse order-details" id="orderDetails2">
        <div class="order-details-content">
            <div class="order-details-header">
            <h5>Order Details</h5>
            <div class="order-info">
                <div class="info-item">
                <span class="info-label">Order Date:</span>
                <span class="info-value">12/10/2024</span>
                </div>
                <div class="info-item">
                <span class="info-label">Payment Method:</span>
                <span class="info-value">Credit Card (**** 7821)</span>
                </div>
            </div>
            </div>
            <div class="order-items-list">
            <div class="order-item-detail">
                <div class="item-image">
                <img src="assets/img/product/product-4.webp" alt="Product" loading="lazy">
                </div>
                <div class="item-info">
                <h6>Ut enim ad minim veniam</h6>
                <div class="item-meta">
                    <span class="item-sku">SKU: PRD-004</span>
                    <span class="item-qty">Qty: 1</span>
                </div>
                </div>
                <div class="item-price">$329.99</div>
            </div>
            </div>
            <div class="order-summary">
            <div class="summary-row">
                <span>Subtotal:</span>
                <span>$329.99</span>
            </div>
            <div class="summary-row">
                <span>Shipping:</span>
                <span>$9.99</span>
            </div>
            <div class="summary-row">
                <span>Tax:</span>
                <span>$20.77</span>
            </div>
            <div class="summary-row total">
                <span>Total:</span>
                <span>$360.75</span>
            </div>
            </div>
            <div class="shipping-info">
            <div class="shipping-address">
                <h6>Shipping Address</h6>
                <p>123 Main Street<br>Apt 4B<br>New York, NY 10001<br>United States</p>
            </div>
            <div class="shipping-method">
                <h6>Shipping Method</h6>
                <p>Standard Shipping (5-7 business days)</p>
            </div>
            </div>
        </div>
        </div>
    </div><!-- End Order Item -->

    <!-- Order Item 3 -->
    <div class="order-item">
        <div class="row align-items-center">
        <div class="col-md-3">
            <div class="order-id">502TR872W2</div>
        </div>
        <div class="col-md-3">
            <div class="order-date">11/05/2024</div>
        </div>
        <div class="col-md-3">
            <div class="order-status delivered">
            <span class="status-dot"></span>
            <span>Delivered</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="order-total">$4,268.00</div>
        </div>
        </div>
        <div class="order-products">
        <div class="product-thumbnails">
            <img src="assets/img/product/product-5.webp" alt="Product" class="product-thumb" loading="lazy">
            <img src="assets/img/product/product-6.webp" alt="Product" class="product-thumb" loading="lazy">
            <img src="assets/img/product/product-7.webp" alt="Product" class="product-thumb" loading="lazy">
            <span class="more-products">+3</span>
        </div>
        <button type="button" class="order-details-link" data-bs-toggle="collapse" data-bs-target="#orderDetails3" aria-expanded="false" aria-controls="orderDetails3">
            <i class="bi bi-chevron-down"></i>
        </button>
        </div>
        <div class="collapse order-details" id="orderDetails3">
        <div class="order-details-content">
            <div class="order-details-header">
            <h5>Order Details</h5>
            <div class="order-info">
                <div class="info-item">
                <span class="info-label">Order Date:</span>
                <span class="info-value">11/05/2024</span>
                </div>
                <div class="info-item">
                <span class="info-label">Payment Method:</span>
                <span class="info-value">Credit Card (**** 4589)</span>
                </div>
            </div>
            </div>
            <div class="order-items-list">
            <div class="order-item-detail">
                <div class="item-image">
                <img src="assets/img/product/product-5.webp" alt="Product" loading="lazy">
                </div>
                <div class="item-info">
                <h6>Quis nostrud exercitation</h6>
                <div class="item-meta">
                    <span class="item-sku">SKU: PRD-005</span>
                    <span class="item-qty">Qty: 2</span>
                </div>
                </div>
                <div class="item-price">$1,299.99</div>
            </div>
            <div class="order-item-detail">
                <div class="item-image">
                <img src="assets/img/product/product-6.webp" alt="Product" loading="lazy">
                </div>
                <div class="item-info">
                <h6>Ullamco laboris nisi</h6>
                <div class="item-meta">
                    <span class="item-sku">SKU: PRD-006</span>
                    <span class="item-qty">Qty: 1</span>
                </div>
                </div>
                <div class="item-price">$799.99</div>
            </div>
            <div class="order-item-detail">
                <div class="item-image">
                <img src="assets/img/product/product-7.webp" alt="Product" loading="lazy">
                </div>
                <div class="item-info">
                <h6>Aliquip ex ea commodo</h6>
                <div class="item-meta">
                    <span class="item-sku">SKU: PRD-007</span>
                    <span class="item-qty">Qty: 3</span>
                </div>
                </div>
                <div class="item-price">$449.99</div>
            </div>
            <div class="order-item-detail">
                <div class="item-image">
                <img src="assets/img/product/product-8.webp" alt="Product" loading="lazy">
                </div>
                <div class="item-info">
                <h6>Duis aute irure dolor</h6>
                <div class="item-meta">
                    <span class="item-sku">SKU: PRD-008</span>
                    <span class="item-qty">Qty: 1</span>
                </div>
                </div>
                <div class="item-price">$249.99</div>
            </div>
            </div>
            <div class="order-summary">
            <div class="summary-row">
                <span>Subtotal:</span>
                <span>$3,899.94</span>
            </div>
            <div class="summary-row">
                <span>Shipping:</span>
                <span>$29.99</span>
            </div>
            <div class="summary-row">
                <span>Tax:</span>
                <span>$338.07</span>
            </div>
            <div class="summary-row total">
                <span>Total:</span>
                <span>$4,268.00</span>
            </div>
            </div>
            <div class="shipping-info">
            <div class="shipping-address">
                <h6>Shipping Address</h6>
                <p>456 Business Ave<br>Suite 200<br>San Francisco, CA 94107<br>United States</p>
            </div>
            <div class="shipping-method">
                <h6>Shipping Method</h6>
                <p>Premium Delivery (1-2 business days)</p>
            </div>
            </div>
        </div>
        </div>
    </div><!-- End Order Item -->

    <!-- Order Item 4 -->
    <div class="order-item">
        <div class="row align-items-center">
        <div class="col-md-3">
            <div class="order-id">34VB5540K83</div>
        </div>
        <div class="col-md-3">
            <div class="order-date">09/22/2024</div>
        </div>
        <div class="col-md-3">
            <div class="order-status canceled">
            <span class="status-dot"></span>
            <span>Canceled</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="order-total">$987.50</div>
        </div>
        </div>
        <div class="order-products">
        <div class="product-thumbnails">
            <img src="assets/img/product/product-8.webp" alt="Product" class="product-thumb" loading="lazy">
            <img src="assets/img/product/product-9.webp" alt="Product" class="product-thumb" loading="lazy">
        </div>
        <button type="button" class="order-details-link" data-bs-toggle="collapse" data-bs-target="#orderDetails4" aria-expanded="false" aria-controls="orderDetails4">
            <i class="bi bi-chevron-down"></i>
        </button>
        </div>
        <div class="collapse order-details" id="orderDetails4">
        <div class="order-details-content">
            <div class="order-details-header">
            <h5>Order Details</h5>
            <div class="order-info">
                <div class="info-item">
                <span class="info-label">Order Date:</span>
                <span class="info-value">09/22/2024</span>
                </div>
                <div class="info-item">
                <span class="info-label">Payment Method:</span>
                <span class="info-value">Credit Card (**** 7821)</span>
                </div>
            </div>
            </div>
            <div class="order-items-list">
            <div class="order-item-detail">
                <div class="item-image">
                <img src="assets/img/product/product-8.webp" alt="Product" loading="lazy">
                </div>
                <div class="item-info">
                <h6>In reprehenderit in voluptate</h6>
                <div class="item-meta">
                    <span class="item-sku">SKU: PRD-008</span>
                    <span class="item-qty">Qty: 1</span>
                </div>
                </div>
                <div class="item-price">$499.99</div>
            </div>
            <div class="order-item-detail">
                <div class="item-image">
                <img src="assets/img/product/product-9.webp" alt="Product" loading="lazy">
                </div>
                <div class="item-info">
                <h6>Velit esse cillum dolore</h6>
                <div class="item-meta">
                    <span class="item-sku">SKU: PRD-009</span>
                    <span class="item-qty">Qty: 1</span>
                </div>
                </div>
                <div class="item-price">$399.99</div>
            </div>
            </div>
            <div class="order-summary">
            <div class="summary-row">
                <span>Subtotal:</span>
                <span>$899.98</span>
            </div>
            <div class="summary-row">
                <span>Shipping:</span>
                <span>$12.99</span>
            </div>
            <div class="summary-row">
                <span>Tax:</span>
                <span>$74.53</span>
            </div>
            <div class="summary-row total">
                <span>Total:</span>
                <span>$987.50</span>
            </div>
            </div>
            <div class="shipping-info">
            <div class="shipping-address">
                <h6>Shipping Address</h6>
                <p>123 Main Street<br>Apt 4B<br>New York, NY 10001<br>United States</p>
            </div>
            <div class="shipping-method">
                <h6>Shipping Method</h6>
                <p>Standard Shipping (5-7 business days)</p>
            </div>
            </div>
        </div>
        </div>
    </div><!-- End Order Item -->

    <!-- Order Item 5 -->
    <div class="order-item">
        <div class="row align-items-center">
        <div class="col-md-3">
            <div class="order-id">112P45A90V2</div>
        </div>
        <div class="col-md-3">
            <div class="order-date">05/18/2024</div>
        </div>
        <div class="col-md-3">
            <div class="order-status delivered">
            <span class="status-dot"></span>
            <span>Delivered</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="order-total">$53.00</div>
        </div>
        </div>
        <div class="order-products">
        <div class="product-thumbnails">
            <img src="assets/img/product/product-10.webp" alt="Product" class="product-thumb" loading="lazy">
        </div>
        <button type="button" class="order-details-link" data-bs-toggle="collapse" data-bs-target="#orderDetails5" aria-expanded="false" aria-controls="orderDetails5">
            <i class="bi bi-chevron-down"></i>
        </button>
        </div>
        <div class="collapse order-details" id="orderDetails5">
        <div class="order-details-content">
            <div class="order-details-header">
            <h5>Order Details</h5>
            <div class="order-info">
                <div class="info-item">
                <span class="info-label">Order Date:</span>
                <span class="info-value">05/18/2024</span>
                </div>
                <div class="info-item">
                <span class="info-label">Payment Method:</span>
                <span class="info-value">Credit Card (**** 4589)</span>
                </div>
            </div>
            </div>
            <div class="order-items-list">
            <div class="order-item-detail">
                <div class="item-image">
                <img src="assets/img/product/product-10.webp" alt="Product" loading="lazy">
                </div>
                <div class="item-info">
                <h6>Eu fugiat nulla pariatur</h6>
                <div class="item-meta">
                    <span class="item-sku">SKU: PRD-010</span>
                    <span class="item-qty">Qty: 1</span>
                </div>
                </div>
                <div class="item-price">$49.99</div>
            </div>
            </div>
            <div class="order-summary">
            <div class="summary-row">
                <span>Subtotal:</span>
                <span>$49.99</span>
            </div>
            <div class="summary-row">
                <span>Shipping:</span>
                <span>$0.00</span>
            </div>
            <div class="summary-row">
                <span>Tax:</span>
                <span>$3.01</span>
            </div>
            <div class="summary-row total">
                <span>Total:</span>
                <span>$53.00</span>
            </div>
            </div>
            <div class="shipping-info">
            <div class="shipping-address">
                <h6>Shipping Address</h6>
                <p>123 Main Street<br>Apt 4B<br>New York, NY 10001<br>United States</p>
            </div>
            <div class="shipping-method">
                <h6>Shipping Method</h6>
                <p>Free Shipping (7-10 business days)</p>
            </div>
            </div>
        </div>
        </div>
    </div><!-- End Order Item -->

    <!-- Order Item 6 -->
    <div class="order-item">
        <div class="row align-items-center">
        <div class="col-md-3">
            <div class="order-id">28BA67U0981</div>
        </div>
        <div class="col-md-3">
            <div class="order-date">04/03/2024</div>
        </div>
        <div class="col-md-3">
            <div class="order-status canceled">
            <span class="status-dot"></span>
            <span>Canceled</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="order-total">$1,029.50</div>
        </div>
        </div>
        <div class="order-products">
        <div class="product-thumbnails">
            <img src="assets/img/product/product-11.webp" alt="Product" class="product-thumb" loading="lazy">
            <img src="assets/img/product/product-1-variant.webp" alt="Product" class="product-thumb" loading="lazy">
        </div>
        <button type="button" class="order-details-link" data-bs-toggle="collapse" data-bs-target="#orderDetails6" aria-expanded="false" aria-controls="orderDetails6">
            <i class="bi bi-chevron-down"></i>
        </button>
        </div>
        <div class="collapse order-details" id="orderDetails6">
        <div class="order-details-content">
            <div class="order-details-header">
            <h5>Order Details</h5>
            <div class="order-info">
                <div class="info-item">
                <span class="info-label">Order Date:</span>
                <span class="info-value">04/03/2024</span>
                </div>
                <div class="info-item">
                <span class="info-label">Payment Method:</span>
                <span class="info-value">Credit Card (**** 7821)</span>
                </div>
            </div>
            </div>
            <div class="order-items-list">
            <div class="order-item-detail">
                <div class="item-image">
                <img src="assets/img/product/product-11.webp" alt="Product" loading="lazy">
                </div>
                <div class="item-info">
                <h6>Excepteur sint occaecat</h6>
                <div class="item-meta">
                    <span class="item-sku">SKU: PRD-011</span>
                    <span class="item-qty">Qty: 1</span>
                </div>
                </div>
                <div class="item-price">$599.99</div>
            </div>
            <div class="order-item-detail">
                <div class="item-image">
                <img src="assets/img/product/product-1-variant.webp" alt="Product" loading="lazy">
                </div>
                <div class="item-info">
                <h6>Cupidatat non proident</h6>
                <div class="item-meta">
                    <span class="item-sku">SKU: PRD-001-V</span>
                    <span class="item-qty">Qty: 1</span>
                </div>
                </div>
                <div class="item-price">$349.99</div>
            </div>
            </div>
            <div class="order-summary">
            <div class="summary-row">
                <span>Subtotal:</span>
                <span>$949.98</span>
            </div>
            <div class="summary-row">
                <span>Shipping:</span>
                <span>$0.00</span>
            </div>
            <div class="summary-row">
                <span>Tax:</span>
                <span>$79.52</span>
            </div>
            <div class="summary-row total">
                <span>Total:</span>
                <span>$1,029.50</span>
            </div>
            </div>
            <div class="shipping-info">
            <div class="shipping-address">
                <h6>Shipping Address</h6>
                <p>456 Business Ave<br>Suite 200<br>San Francisco, CA 94107<br>United States</p>
            </div>
            <div class="shipping-method">
                <h6>Shipping Method</h6>
                <p>Free Express Shipping (1-2 business days)</p>
            </div>
            </div>
            <div class="cancellation-info mt-3">
            <h6>Cancellation Reason</h6>
            <p>Order was canceled at customer's request. Items were not in stock at the time of processing.</p>
            </div>
        </div>
        </div>
    </div><!-- End Order Item -->
    </div>

    <div class="pagination-container">
    <nav aria-label="Orders pagination">
        <ul class="pagination">
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">4</a></li>
        </ul>
    </nav>
    </div>
</div>