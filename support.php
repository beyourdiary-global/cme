<?php
require_once 'config.php';

// Support business hours
$businessHours = [
    'Monday - Friday' => '9:00 AM - 8:00 PM',
    'Saturday' => '10:00 AM - 6:00 PM',
    'Sunday' => 'Closed'
];

// Support phone number
$supportPhone = '+1 (555) 123-4567';
$supportEmail = 'support@example.com';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once 'include/header.php'; ?>
</head>

<body class="support-page">

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
            <li class="current">Support</li>
          </ol>
        </nav>
        <h1>Support</h1>
      </div>
    </div><!-- End Page Title -->

    <!-- Support Section -->
    <section id="support" class="support section">

      <div class="container" data-aos="fade-up">

        <div class="row gy-5 gx-lg-5">
          <div class="col-lg-8">
            <!-- Help Categories -->
            <div class="help-categories" data-aos="fade-up">
              <div class="section-heading">
                <h3>How Can We Help You?</h3>
                <p>Browse through our help topics or search for specific assistance</p>
              </div>

              <div class="category-grid">
                <a href="#" class="category-card" data-aos="zoom-in" data-aos-delay="100">
                  <div class="icon">
                    <i class="bi bi-box-seam"></i>
                  </div>
                  <h4>Orders &amp; Shipping</h4>
                  <p>Track orders, shipping info, returns</p>
                </a>

                <a href="#" class="category-card" data-aos="zoom-in" data-aos-delay="200">
                  <div class="icon">
                    <i class="bi bi-credit-card"></i>
                  </div>
                  <h4>Payment &amp; Billing</h4>
                  <p>Payment methods, invoices, refunds</p>
                </a>

                <a href="#" class="category-card" data-aos="zoom-in" data-aos-delay="300">
                  <div class="icon">
                    <i class="bi bi-person-circle"></i>
                  </div>
                  <h4>Account Help</h4>
                  <p>Login issues, profile settings</p>
                </a>

                <a href="#" class="category-card" data-aos="zoom-in" data-aos-delay="400">
                  <div class="icon">
                    <i class="bi bi-gift"></i>
                  </div>
                  <h4>Products &amp; Services</h4>
                  <p>Product info, specifications, guides</p>
                </a>
              </div>
            </div>

            <!-- Common Help Topics -->
            <div class="help-topics" data-aos="fade-up" data-aos-delay="100">
              <div class="section-heading">
                <h3>Popular Help Topics</h3>
                <p>Quick solutions to common questions</p>
              </div>

              <div class="topics-grid">
                <div class="topic-item">
                  <i class="bi bi-clock-history"></i>
                  <h5>Track Your Order</h5>
                  <p>Find your order status and tracking information quickly and easily through your account or order confirmation email.</p>
                  <a href="track-order.php" class="learn-more">Learn More <i class="bi bi-arrow-right"></i></a>
                </div>

                <div class="topic-item">
                  <i class="bi bi-arrow-repeat"></i>
                  <h5>Return Policy</h5>
                  <p>Learn about our hassle-free return process and get your items returned or exchanged within 30 days.</p>
                  <a href="return-policy.php" class="learn-more">Learn More <i class="bi bi-arrow-right"></i></a>
                </div>

                <div class="topic-item">
                  <i class="bi bi-shield-check"></i>
                  <h5>Account Security</h5>
                  <p>Keep your account secure with two-factor authentication and learn how to reset your password safely.</p>
                  <a href="#" class="learn-more">Learn More <i class="bi bi-arrow-right"></i></a>
                </div>

                <div class="topic-item">
                  <i class="bi bi-wallet2"></i>
                  <h5>Payment Methods</h5>
                  <p>We accept all major credit cards, PayPal, Apple Pay, and many other secure payment options.</p>
                  <a href="#" class="learn-more">Learn More <i class="bi bi-arrow-right"></i></a>
                </div>
              </div>
            </div>

            <!-- FAQ Section -->
            <div class="faq-section" data-aos="fade-up" data-aos-delay="200">
              <div class="section-heading">
                <h3>Frequently Asked Questions</h3>
                <p>Quick answers to questions you may have</p>
              </div>

              <div class="faq-list">
                <div class="faq-item">
                  <h3>
                    How do I track my order?
                    <i class="bi bi-chevron-down faq-toggle"></i>
                  </h3>
                  <div class="faq-answer">
                    <p>You can track your order by clicking the tracking link in your shipping confirmation email, or by logging into your account and viewing your order history. You'll receive real-time updates on your order status.</p>
                  </div>
                </div>

                <div class="faq-item">
                  <h3>
                    What payment methods do you accept?
                    <i class="bi bi-chevron-down faq-toggle"></i>
                  </h3>
                  <div class="faq-answer">
                    <p>We accept all major credit cards (Visa, MasterCard, American Express), PayPal, Apple Pay, Google Pay, and Shop Pay. All payments are processed securely using SSL encryption.</p>
                  </div>
                </div>

                <div class="faq-item">
                  <h3>
                    How can I change my password?
                    <i class="bi bi-chevron-down faq-toggle"></i>
                  </h3>
                  <div class="faq-answer">
                    <p>You can reset your password by going to the login page and clicking "Forgot Password", or by visiting your account settings page if you're already logged in. We'll send you a secure reset link via email.</p>
                  </div>
                </div>

                <div class="faq-item">
                  <h3>
                    What is your return policy?
                    <i class="bi bi-chevron-down faq-toggle"></i>
                  </h3>
                  <div class="faq-answer">
                    <p>We offer a 30-day return policy for most items. Items must be in original condition with tags attached. Free return shipping is provided for defective items or our errors.</p>
                  </div>
                </div>

                <div class="faq-item">
                  <h3>
                    How long does shipping take?
                    <i class="bi bi-chevron-down faq-toggle"></i>
                  </h3>
                  <div class="faq-answer">
                    <p>Standard shipping takes 3-7 business days, while expedited shipping takes 1-3 business days. Free shipping is available on orders over $50 and typically takes 5-7 business days.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="support-sidebar" data-aos="fade-up" data-aos-delay="100">
              <!-- Contact Support -->
              <div class="contact-support">
                <div class="icon-box">
                  <i class="bi bi-headset"></i>
                </div>
                <h4>Need More Help?</h4>
                <p>Our support team is available 24/7</p>
                <div class="support-actions">
                  <a href="#" class="btn-chat">
                    <i class="bi bi-chat-dots"></i>
                    Live Chat
                  </a>
                  <a href="contact.php" class="btn-email">
                    <i class="bi bi-envelope"></i>
                    Send Email
                  </a>
                  <div class="divider">or call us</div>
                  <a href="tel:<?= str_replace([' ', '(', ')', '-'], '', $supportPhone) ?>" class="phone-number">
                    <i class="bi bi-telephone"></i>
                    <?= $supportPhone ?>
                  </a>
                </div>
              </div>

              <!-- Support Resources -->
              <div class="support-resources">
                <h5>Support Resources</h5>
                <ul>
                  <li>
                    <i class="bi bi-file-text"></i>
                    <a href="#">User Guides</a>
                  </li>
                  <li>
                    <i class="bi bi-play-circle"></i>
                    <a href="#">Video Tutorials</a>
                  </li>
                  <li>
                    <i class="bi bi-book"></i>
                    <a href="#">Documentation</a>
                  </li>
                  <li>
                    <i class="bi bi-download"></i>
                    <a href="#">Downloads</a>
                  </li>
                </ul>
              </div>

              <!-- Business Hours -->
              <div class="business-hours">
                <h5>Business Hours</h5>
                <ul>
                  <?php foreach ($businessHours as $day => $hours): ?>
                  <li>
                    <span><?= $day ?>:</span>
                    <span><?= $hours ?></span>
                  </li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Support Section -->

  </main>

  <?php include_once 'include/footer.php'; ?>
  <?php include_once 'include/globalFooterScript.php'; ?>

</body>

</html>