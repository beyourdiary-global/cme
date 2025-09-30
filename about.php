<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once 'include/header.php'; ?>
</head>

<body class="about-page">

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
            <li class="current">About</li>
          </ol>
        </nav>
        <h1>About</h1>
      </div>
    </div><!-- End Page Title -->

    <!-- About 2 Section -->
    <section id="about-2" class="about-2 section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row mb-lg-5">
          <span class="text-uppercase small-title mb-2">About Our Company</span>
          <div class="col-lg-6">
            <h2 class="about-title">Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</h2>
          </div>
          <div class="col-lg-6 description-wrapper">
            <p class="about-description">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
          </div>
        </div>

        <div class="row g-4">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="content-card">
              <div class="card-image">
                <img src="assets/img/about/about-portrait-16.webp" alt="" class="img-fluid">
              </div>
              <div class="card-content">
                <h3>Ut enim ad minima veniam</h3>
                <p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur.</p>
                <a href="#" class="read-more">
                  Read More <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div><!-- End Content Card -->

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="content-card">
              <div class="card-image">
                <img src="assets/img/about/about-portrait-4.webp" alt="" class="img-fluid">
              </div>
              <div class="card-content">
                <h3>Quis autem vel eum iure</h3>
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum.</p>
                <a href="#" class="read-more">
                  Read More <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div><!-- End Content Card -->

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
            <div class="content-card">
              <div class="card-image">
                <img src="assets/img/about/about-portrait-1.webp" alt="" class="img-fluid">
              </div>
              <div class="card-content">
                <h3>Nam libero tempore</h3>
                <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet.</p>
                <a href="#" class="read-more">
                  Read More <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
          <!-- End Content Card -->

        </div>

      </div>

    </section><!-- /About 2 Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item">
              <i class="bi bi-emoji-smile"></i>
              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Happy Clients</strong> <span>consequuntur quae</span></p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item">
              <i class="bi bi-journal-richtext"></i>
              <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Projects</strong> <span>adipisci atque cum quia aut</span></p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item">
              <i class="bi bi-headset"></i>
              <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Hours Of Support</strong> <span>aut commodi quaerat</span></p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item">
              <i class="bi bi-people"></i>
              <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Hard Workers</strong> <span>rerum asperiores dolor</span></p>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Stats Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="testimonials-slider swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "slidesPerView": 1,
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "navigation": {
                "nextEl": ".swiper-button-next",
                "prevEl": ".swiper-button-prev"
              }
            }
          </script>

          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/person/person-f-1.webp" class="testimonial-img" alt="">
                  <h3>Saul Goodman</h3>
                  <h4>Ceo &amp; Founder</h4>
                </div>
              </div>
            </div><!-- End Testimonial Item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/person/person-f-2.webp" class="testimonial-img" alt="">
                  <h3>Sara Wilsson</h3>
                  <h4>Designer</h4>
                </div>
              </div>
            </div><!-- End Testimonial Item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/person/person-m-1.webp" class="testimonial-img" alt="">
                  <h3>Jena Karlis</h3>
                  <h4>Store Owner</h4>
                </div>
              </div>
            </div><!-- End Testimonial Item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/person/person-m-2.webp" class="testimonial-img" alt="">
                  <h3>Matt Brandon</h3>
                  <h4>Freelancer</h4>
                </div>
              </div>
            </div><!-- End Testimonial Item -->

          </div>

          <div class="swiper-navigation w-100 d-flex align-items-center justify-content-center">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>

        </div>

      </div>

    </section><!-- /Testimonials Section -->

  </main>

  <?php include_once 'include/footer.php'; ?>
  <?php include_once 'include/globalFooterScript.php'; ?>

</body>

</html>