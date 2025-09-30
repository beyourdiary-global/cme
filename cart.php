<?php
require_once 'config.php';

// Handle cart functionality
$cartItems = $_SESSION['cart'] ?? [];
$cartTotal = 0;

// Calculate cart total
foreach ($cartItems as $item) {
    $cartTotal += $item['price'] * $item['quantity'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once 'include/header.php'?>
</head>

<body class="cart-page">

    <header id="header" class="header position-relative">
    <?php include_once 'include/topbar.php'?>
    <?php include_once 'include/mainHeader.php'?>
    <?php include_once 'include/navigation.php'?>
    <?php include_once 'main/annoucementBar.php'?>
    <?php include_once 'main/mobileSearchForm.php'?>
  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container">
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Cart</li>
          </ol>
        </nav>
        <h1>Shopping Cart</h1>
      </div>
    </div><!-- End Page Title -->

    <!-- Cart Section -->
    <section id="cart" class="cart section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
            <div class="cart-items">
              <div class="cart-header d-none d-lg-block">
                <div class="row align-items-center">
                  <div class="col-lg-6">
                    <h5>Product</h5>
                  </div>
                  <div class="col-lg-2 text-center">
                    <h5>Price</h5>
                  </div>
                  <div class="col-lg-2 text-center">
                    <h5>Quantity</h5>
                  </div>
                  <div class="col-lg-2 text-center">
                    <h5>Total</h5>
                  </div>
                </div>
              </div>

              <!-- Cart Item 1 -->
              <div class="cart-item">
                <div class="row align-items-center">
                  <div class="col-lg-6 col-12 mt-3 mt-lg-0 mb-lg-0 mb-3">
                    <div class="product-info d-flex align-items-center">
                      <div class="product-image me-3">
                        <img src="assets/img/product/product-1.webp" alt="Product" class="img-fluid">
                      </div>
                      <div class="product-details">
                        <h6 class="product-title">Wireless Headphones</h6>
                        <p class="product-meta">Color: Black, Size: Large</p>
                        <button type="button" class="btn-remove-item">
                          <i class="bi bi-trash"></i> Remove
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 col-12 mt-3 mt-lg-0 text-center">
                    <div class="price-tag">
                      <span class="price">$89.99</span>
                    </div>
                  </div>
                  <div class="col-lg-2 col-12 mt-3 mt-lg-0 text-center">
                    <div class="quantity-selector">
                      <button type="button" class="quantity-btn minus">-</button>
                      <input type="number" class="quantity-input" value="1" min="1">
                      <button type="button" class="quantity-btn plus">+</button>
                    </div>
                  </div>
                  <div class="col-lg-2 col-12 mt-3 mt-lg-0 text-center">
                    <div class="item-total">
                      <span class="total-price">$89.99</span>
                    </div>
                  </div>
                </div>
              </div><!-- End Cart Item -->

              <!-- Cart Item 2 -->
              <div class="cart-item">
                <div class="row align-items-center">
                  <div class="col-lg-6 col-12 mt-3 mt-lg-0 mb-lg-0 mb-3">
                    <div class="product-info d-flex align-items-center">
                      <div class="product-image me-3">
                        <img src="assets/img/product/product-2.webp" alt="Product" class="img-fluid">
                      </div>
                      <div class="product-details">
                        <h6 class="product-title">Smart Watch</h6>
                        <p class="product-meta">Color: Silver, Size: 42mm</p>
                        <button type="button" class="btn-remove-item">
                          <i class="bi bi-trash"></i> Remove
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 col-12 mt-3 mt-lg-0 text-center">
                    <div class="price-tag">
                      <span class="price">$199.99</span>
                    </div>
                  </div>
                  <div class="col-lg-2 col-12 mt-3 mt-lg-0 text-center">
                    <div class="quantity-selector">
                      <button type="button" class="quantity-btn minus">-</button>
                      <input type="number" class="quantity-input" value="1" min="1">
                      <button type="button" class="quantity-btn plus">+</button>
                    </div>
                  </div>
                  <div class="col-lg-2 col-12 mt-3 mt-lg-0 text-center">
                    <div class="item-total">
                      <span class="total-price">$199.99</span>
                    </div>
                  </div>
                </div>
              </div><!-- End Cart Item -->

              <!-- Cart Item 3 -->
              <div class="cart-item">
                <div class="row align-items-center">
                  <div class="col-lg-6 col-12 mt-3 mt-lg-0 mb-lg-0 mb-3">
                    <div class="product-info d-flex align-items-center">
                      <div class="product-image me-3">
                        <img src="assets/img/product/product-3.webp" alt="Product" class="img-fluid">
                      </div>
                      <div class="product-details">
                        <h6 class="product-title">Bluetooth Speaker</h6>
                        <p class="product-meta">Color: Blue, Model: Mini</p>
                        <button type="button" class="btn-remove-item">
                          <i class="bi bi-trash"></i> Remove
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 col-12 mt-3 mt-lg-0 text-center">
                    <div class="price-tag">
                      <span class="price">$49.99</span>
                    </div>
                  </div>
                  <div class="col-lg-2 col-12 mt-3 mt-lg-0 text-center">
                    <div class="quantity-selector">
                      <button type="button" class="quantity-btn minus">-</button>
                      <input type="number" class="quantity-input" value="2" min="1">
                      <button type="button" class="quantity-btn plus">+</button>
                    </div>
                  </div>
                  <div class="col-lg-2 col-12 mt-3 mt-lg-0 text-center">
                    <div class="item-total">
                      <span class="total-price">$99.98</span>
                    </div>
                  </div>
                </div>
              </div><!-- End Cart Item -->

              <div class="cart-actions">
                <div class="row">
                  <div class="col-lg-6 mb-3 mb-lg-0">
                    <a href="category.php" class="btn btn-outline-primary">
                      <i class="bi bi-arrow-left"></i> Continue Shopping
                    </a>
                  </div>
                  <div class="col-lg-6 text-md-end">
                    <button type="button" class="btn btn-outline-secondary me-2">
                      Update Cart
                    </button>
                    <button type="button" class="btn btn-danger">
                      Clear Cart
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="cart-summary">
              <h4 class="summary-title">Order Summary</h4>

              <div class="summary-item">
                <span class="summary-label">Subtotal</span>
                <span class="summary-value">$389.96</span>
              </div>

              <div class="summary-item shipping-item">
                <span class="summary-label">Shipping</span>
                <div class="shipping-options">
                  <div class="form-check text-end">
                    <input class="form-check-input" type="radio" name="shipping" id="free-shipping" checked>
                    <label class="form-check-label" for="free-shipping">
                      Free Shipping <span class="text-muted">$0.00</span>
                    </label>
                  </div>
                  <div class="form-check text-end">
                    <input class="form-check-input" type="radio" name="shipping" id="express-shipping">
                    <label class="form-check-label" for="express-shipping">
                      Express Shipping <span class="text-muted">$15.00</span>
                    </label>
                  </div>
                  <div class="form-check text-end">
                    <input class="form-check-input" type="radio" name="shipping" id="overnight-shipping">
                    <label class="form-check-label" for="overnight-shipping">
                      Overnight Shipping <span class="text-muted">$25.00</span>
                    </label>
                  </div>
                </div>
              </div>

              <div class="summary-item">
                <span class="summary-label">Tax</span>
                <span class="summary-value">$31.20</span>
              </div>

              <div class="summary-item discount">
                <span class="summary-label">Discount</span>
                <span class="summary-value">-$0.00</span>
              </div>

              <div class="summary-total">
                <span class="summary-label">Total</span>
                <span class="summary-value">$421.16</span>
              </div>

              <div class="checkout-button">
                <a href="checkout.php" class="btn btn-accent w-100">
                  Proceed to Checkout <i class="bi bi-arrow-right"></i>
                </a>
              </div>

              <div class="continue-shopping">
                <a href="category.php" class="btn btn-link w-100">
                  <i class="bi bi-arrow-left"></i> Continue Shopping
                </a>
              </div>

              <div class="payment-methods">
                <p class="payment-title">We Accept</p>
                <div class="payment-icons">
                  <i class="bi bi-credit-card"></i>
                  <i class="bi bi-paypal"></i>
                  <i class="bi bi-wallet2"></i>
                  <i class="bi bi-bank"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Cart Section -->

  </main>

  <?php include_once 'include/footer.php'?>
  <?php include_once 'include/globalFooterScript.php'?>

</body>

</html>