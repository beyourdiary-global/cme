<?php
require_once 'config.php';

// Shipping information variables
$pageTitle = "Shipping Information";
$freeShippingThreshold = 50;
$lastUpdated = date('F j, Y');

// Delivery options data
$deliveryOptions = [
    [
        'icon' => 'bi-lightning-charge',
        'title' => 'Express Delivery',
        'description' => 'Fastest delivery option for urgent orders. Perfect for last-minute purchases.',
        'timeframe' => '1-2 Business Days',
        'cost' => '$12.99'
    ],
    [
        'icon' => 'bi-box-seam',
        'title' => 'Standard Shipping',
        'description' => 'Our most popular shipping option with reliable delivery times.',
        'timeframe' => '3-5 Business Days',
        'cost' => '$5.99'
    ],
    [
        'icon' => 'bi-pin-map',
        'title' => 'Local Shipping',
        'description' => 'Available for orders within our local delivery zones.',
        'timeframe' => '2-3 Business Days',
        'cost' => '$3.99'
    ]
];

// Shipping rates
$shippingRates = [
    [
        'type' => 'Standard Shipping',
        'cost' => '$5.99',
        'info' => 'For orders under $' . $freeShippingThreshold,
        'highlight' => false
    ],
    [
        'type' => 'Free Shipping',
        'cost' => '$0.00',
        'info' => 'For orders over $' . $freeShippingThreshold,
        'highlight' => true
    ],
    [
        'type' => 'Express Shipping',
        'cost' => '$12.99',
        'info' => '1-2 business days delivery',
        'highlight' => false
    ]
];

// International shipping info
$internationalInfo = [
    [
        'icon' => 'bi-clock-history',
        'title' => 'Delivery Time',
        'description' => '5-10 business days for most international destinations'
    ],
    [
        'icon' => 'bi-currency-dollar',
        'title' => 'Customs & Duties',
        'description' => 'Import duties and taxes are not included in the shipping cost'
    ],
    [
        'icon' => 'bi-shield-check',
        'title' => 'Reliable Service',
        'description' => 'Tracked shipping with leading international carriers'
    ]
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once 'include/header.php'; ?>
</head>

<body class="shiping-info-page">

  <header id="header" class="header position-relative">
    <?php include_once 'include/topbar.php'; ?>
    <?php include_once 'include/mainHeader.php'; ?>
    <?php include_once 'include/navigation.php'; ?>
    <?php include_once 'main/annoucementBar.php'; ?>
    <?php include_once 'main/mobileSearchForm.php'; ?>
  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container">
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current"><?= $pageTitle ?></li>
          </ol>
        </nav>
        <h1><?= $pageTitle ?></h1>
      </div>
    </div><!-- End Page Title -->

    <!-- Shipping Info Section -->
    <section id="shipping-info" class="shipping-info section">

      <div class="container" data-aos="fade-up">

        <!-- Info Header -->
        <div class="shipping-header text-center mb-5" data-aos="fade-up">
          <div class="shipping-icon mb-3">
            <i class="bi bi-truck display-1 text-primary"></i>
          </div>
          <h2>Fast & Reliable Shipping</h2>
          <p class="lead">We offer multiple shipping options to meet your delivery needs</p>
          <div class="update-info">
            <small class="text-muted">Last updated: <?= $lastUpdated ?></small>
          </div>
        </div>

        <div class="content-wrapper">
          <!-- Delivery Options -->
          <div class="content-block" data-aos="fade-up" data-aos-delay="100">
            <div class="section-heading">
              <i class="bi bi-truck"></i>
              <h3>Delivery Options</h3>
              <p>Choose the delivery option that best suits your needs</p>
            </div>

            <div class="row gy-4 gx-lg-5">
              <?php foreach ($deliveryOptions as $index => $option): ?>
              <div class="col-md-6 col-lg-4">
                <div class="delivery-card" data-aos="zoom-in" data-aos-delay="<?= ($index + 1) * 100 ?>">
                  <div class="card-icon">
                    <i class="bi <?= $option['icon'] ?>"></i>
                  </div>
                  <h4><?= $option['title'] ?></h4>
                  <p><?= $option['description'] ?></p>
                  <div class="delivery-time">
                    <i class="bi bi-clock"></i>
                    <span><?= $option['timeframe'] ?></span>
                  </div>
                  <div class="delivery-cost">
                    <strong><?= $option['cost'] ?></strong>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- Shipping Costs -->
          <div class="content-block" data-aos="fade-up" data-aos-delay="200">
            <div class="section-heading">
              <i class="bi bi-cash-coin"></i>
              <h3>Shipping Costs</h3>
              <p>Transparent pricing for all shipping options</p>
            </div>

            <div class="shipping-rates">
              <?php foreach ($shippingRates as $rate): ?>
              <div class="rate-item <?= $rate['highlight'] ? 'highlight' : '' ?>">
                <div class="rate-type"><?= $rate['type'] ?></div>
                <div class="rate-cost"><?= $rate['cost'] ?></div>
                <div class="rate-info"><?= $rate['info'] ?></div>
                <?php if ($rate['highlight']): ?>
                <div class="rate-badge">
                  <i class="bi bi-star-fill"></i>
                  <span>Popular</span>
                </div>
                <?php endif; ?>
              </div>
              <?php endforeach; ?>
            </div>

            <!-- Free Shipping Callout -->
            <div class="free-shipping-callout mt-4" data-aos="fade-up" data-aos-delay="300">
              <div class="callout-content">
                <div class="callout-icon">
                  <i class="bi bi-gift"></i>
                </div>
                <div class="callout-text">
                  <h5>Free Shipping Available!</h5>
                  <p>Enjoy free standard shipping on all orders over $<?= $freeShippingThreshold ?>. No minimum order restrictions apply.</p>
                </div>
                <div class="callout-action">
                  <a href="category.php" class="btn btn-primary">Shop Now</a>
                </div>
              </div>
            </div>
          </div>

          <!-- International Shipping -->
          <div class="content-block" data-aos="fade-up" data-aos-delay="300">
            <div class="section-heading">
              <i class="bi bi-globe"></i>
              <h3>International Shipping</h3>
              <p>We deliver worldwide with reliable carriers</p>
            </div>

            <div class="international-info">
              <?php foreach ($internationalInfo as $index => $info): ?>
              <div class="info-item" data-aos="fade-right" data-aos-delay="<?= ($index + 1) * 100 ?>">
                <i class="bi <?= $info['icon'] ?>"></i>
                <h5><?= $info['title'] ?></h5>
                <p><?= $info['description'] ?></p>
              </div>
              <?php endforeach; ?>
            </div>

            <!-- International Rates -->
            <div class="international-rates mt-4" data-aos="fade-up" data-aos-delay="400">
              <h5>International Shipping Rates</h5>
              <div class="rates-table">
                <div class="rate-row">
                  <span class="region">North America</span>
                  <span class="rate">$15.99</span>
                  <span class="time">5-7 days</span>
                </div>
                <div class="rate-row">
                  <span class="region">Europe</span>
                  <span class="rate">$19.99</span>
                  <span class="time">7-10 days</span>
                </div>
                <div class="rate-row">
                  <span class="region">Asia Pacific</span>
                  <span class="rate">$22.99</span>
                  <span class="time">8-12 days</span>
                </div>
                <div class="rate-row">
                  <span class="region">Rest of World</span>
                  <span class="rate">$25.99</span>
                  <span class="time">10-15 days</span>
                </div>
              </div>
            </div>
          </div>

          <!-- FAQ Section -->
          <div class="content-block" data-aos="fade-up" data-aos-delay="400">
            <div class="section-heading">
              <i class="bi bi-question-circle"></i>
              <h3>Shipping FAQ</h3>
              <p>Common questions about our shipping services</p>
            </div>

            <div class="faq-list">
              <div class="faq-item">
                <h3>
                  <i class="bi bi-question-circle"></i>
                  How can I track my order?
                  <i class="bi bi-chevron-down faq-toggle"></i>
                </h3>
                <div class="faq-answer">
                  <p>You can track your order using the tracking number provided in your shipping confirmation email. Simply visit our <a href="track-order.php">order tracking page</a> or click the tracking link in your email.</p>
                </div>
              </div>

              <div class="faq-item">
                <h3>
                  <i class="bi bi-question-circle"></i>
                  What if I'm not home for delivery?
                  <i class="bi bi-chevron-down faq-toggle"></i>
                </h3>
                <div class="faq-answer">
                  <p>If you're not available during delivery, the carrier will leave a delivery notice with instructions for redelivery or pickup. Most carriers will attempt delivery 2-3 times before returning the package to our facility.</p>
                </div>
              </div>

              <div class="faq-item">
                <h3>
                  <i class="bi bi-question-circle"></i>
                  Do you offer weekend delivery?
                  <i class="bi bi-chevron-down faq-toggle"></i>
                </h3>
                <div class="faq-answer">
                  <p>Weekend delivery is available for express shipping in select metropolitan areas. This option will be displayed at checkout if available for your delivery address.</p>
                </div>
              </div>

              <div class="faq-item">
                <h3>
                  <i class="bi bi-question-circle"></i>
                  Can I change my shipping address after placing an order?
                  <i class="bi bi-chevron-down faq-toggle"></i>
                </h3>
                <div class="faq-answer">
                  <p>Address changes are possible if your order hasn't been processed yet. Please contact our customer service team immediately at <a href="tel:+15551234567">+1 (555) 123-4567</a> or via our <a href="contact.php">contact form</a>.</p>
                </div>
              </div>

              <div class="faq-item">
                <h3>
                  <i class="bi bi-question-circle"></i>
                  Is shipping insurance included?
                  <i class="bi bi-chevron-down faq-toggle"></i>
                </h3>
                <div class="faq-answer">
                  <p>All orders are automatically insured up to $100. For orders over $100, additional insurance is included at no extra cost. You can also purchase extended coverage during checkout if desired.</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Support Contact -->
          <div class="shipping-support" data-aos="fade-up" data-aos-delay="500">
            <div class="support-card">
              <div class="support-icon">
                <i class="bi bi-headset"></i>
              </div>
              <div class="support-content">
                <h4>Need Shipping Help?</h4>
                <p>Our shipping specialists are here to assist you with any questions or concerns.</p>
                <div class="support-actions">
                  <a href="contact.php" class="btn btn-primary">Contact Support</a>
                  <a href="track-order.php" class="btn btn-outline-primary">Track Order</a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Shipping Info Section -->

  </main>

  <?php include_once 'include/footer.php'; ?>
  <?php include_once 'include/globalFooterScript.php'; ?>

</body>

</html>