<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once 'include/header.php'; ?>
</head>

<body class="blog-page">

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
            <li class="current">Blog</li>
          </ol>
        </nav>
        <h1>Blog</h1>
      </div>
    </div><!-- End Page Title -->

    <div class="container">
      <div class="row">

        <div class="col-lg-8">

          <!-- Blog Posts Section -->
          <section id="blog-posts" class="blog-posts section">

            <div class="container" data-aos="fade-up">

              <div class="row gy-4">

                <div class="col-lg-6">
                  <article>

                    <div class="post-img">
                      <img src="assets/img/blog/blog-1.webp" alt="" class="img-fluid">
                    </div>

                    <p class="post-category">Technology</p>

                    <h2 class="title">
                      <a href="blog-details.php">The Future of E-commerce: Trends to Watch</a>
                    </h2>

                    <div class="d-flex align-items-center">
                      <img src="assets/img/person/person-1.webp" alt="" class="img-fluid post-author-img flex-shrink-0">
                      <div class="post-meta">
                        <p class="post-author">Maria Doe</p>
                        <p class="post-date">
                          <time datetime="2024-01-01">Jan 1, 2024</time>
                        </p>
                      </div>
                    </div>

                  </article>
                </div><!-- End post list item -->

                <div class="col-lg-6">
                  <article>

                    <div class="post-img">
                      <img src="assets/img/blog/blog-2.webp" alt="" class="img-fluid">
                    </div>

                    <p class="post-category">Fashion</p>

                    <h2 class="title">
                      <a href="blog-details.php">Spring Fashion Trends 2024</a>
                    </h2>

                    <div class="d-flex align-items-center">
                      <img src="assets/img/person/person-2.webp" alt="" class="img-fluid post-author-img flex-shrink-0">
                      <div class="post-meta">
                        <p class="post-author">John Smith</p>
                        <p class="post-date">
                          <time datetime="2024-01-15">Jan 15, 2024</time>
                        </p>
                      </div>
                    </div>

                  </article>
                </div><!-- End post list item -->

                <div class="col-lg-6">
                  <article>

                    <div class="post-img">
                      <img src="assets/img/blog/blog-3.webp" alt="" class="img-fluid">
                    </div>

                    <p class="post-category">Lifestyle</p>

                    <h2 class="title">
                      <a href="blog-details.php">Sustainable Shopping: A Complete Guide</a>
                    </h2>

                    <div class="d-flex align-items-center">
                      <img src="assets/img/person/person-3.webp" alt="" class="img-fluid post-author-img flex-shrink-0">
                      <div class="post-meta">
                        <p class="post-author">Emily Johnson</p>
                        <p class="post-date">
                          <time datetime="2024-02-01">Feb 1, 2024</time>
                        </p>
                      </div>
                    </div>

                  </article>
                </div><!-- End post list item -->

                <div class="col-lg-6">
                  <article>

                    <div class="post-img">
                      <img src="assets/img/blog/blog-4.webp" alt="" class="img-fluid">
                    </div>

                    <p class="post-category">Business</p>

                    <h2 class="title">
                      <a href="blog-details.php">Building Customer Loyalty in Retail</a>
                    </h2>

                    <div class="d-flex align-items-center">
                      <img src="assets/img/person/person-4.webp" alt="" class="img-fluid post-author-img flex-shrink-0">
                      <div class="post-meta">
                        <p class="post-author">David Wilson</p>
                        <p class="post-date">
                          <time datetime="2024-02-15">Feb 15, 2024</time>
                        </p>
                      </div>
                    </div>

                  </article>
                </div><!-- End post list item -->

                <div class="col-lg-6">
                  <article>

                    <div class="post-img">
                      <img src="assets/img/blog/blog-5.webp" alt="" class="img-fluid">
                    </div>

                    <p class="post-category">Technology</p>

                    <h2 class="title">
                      <a href="blog-details.php">Mobile Commerce: Optimizing for Success</a>
                    </h2>

                    <div class="d-flex align-items-center">
                      <img src="assets/img/person/person-5.webp" alt="" class="img-fluid post-author-img flex-shrink-0">
                      <div class="post-meta">
                        <p class="post-author">Sarah Brown</p>
                        <p class="post-date">
                          <time datetime="2024-03-01">Mar 1, 2024</time>
                        </p>
                      </div>
                    </div>

                  </article>
                </div><!-- End post list item -->

                <div class="col-lg-6">
                  <article>

                    <div class="post-img">
                      <img src="assets/img/blog/blog-6.webp" alt="" class="img-fluid">
                    </div>

                    <p class="post-category">Marketing</p>

                    <h2 class="title">
                      <a href="blog-details.php">Social Media Marketing for Brands</a>
                    </h2>

                    <div class="d-flex align-items-center">
                      <img src="assets/img/person/person-6.webp" alt="" class="img-fluid post-author-img flex-shrink-0">
                      <div class="post-meta">
                        <p class="post-author">Michael Davis</p>
                        <p class="post-date">
                          <time datetime="2024-03-15">Mar 15, 2024</time>
                        </p>
                      </div>
                    </div>

                  </article>
                </div><!-- End post list item -->

              </div>

            </div>

          </section><!-- /Blog Posts Section -->

          <!-- Blog Pagination Section -->
          <section id="blog-pagination" class="blog-pagination section">

            <div class="container">
              <div class="d-flex justify-content-center">
                <ul>
                  <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
                  <li><a href="#" class="active">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
                </ul>
              </div>
            </div>

          </section><!-- /Blog Pagination Section -->

        </div>

        <div class="col-lg-4 sidebar">

          <div class="widgets-container">

            <!-- Search Widget -->
            <div class="search-widget widget-item">

              <h3 class="widget-title">Search</h3>
              <form action="" method="get">
                <input type="text" name="search" placeholder="Search...">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
              </form>

            </div><!--/Search Widget -->

            <!-- Categories Widget -->
            <div class="categories-widget widget-item">

              <h3 class="widget-title">Categories</h3>
              <ul class="mt-3">
                <li><a href="#">Technology <span>(25)</span></a></li>
                <li><a href="#">Fashion <span>(18)</span></a></li>
                <li><a href="#">Lifestyle <span>(12)</span></a></li>
                <li><a href="#">Business <span>(15)</span></a></li>
                <li><a href="#">Marketing <span>(8)</span></a></li>
                <li><a href="#">Design <span>(6)</span></a></li>
              </ul>

            </div><!--/Categories Widget -->

            <!-- Recent Posts Widget -->
            <div class="recent-posts-widget widget-item">

              <h3 class="widget-title">Recent Posts</h3>

              <div class="post-item">
                <img src="assets/img/blog/blog-recent-1.webp" alt="" class="flex-shrink-0">
                <div>
                  <h4><a href="blog-details.php">Top 10 E-commerce Platforms</a></h4>
                  <time datetime="2024-01-01">Jan 1, 2024</time>
                </div>
              </div><!-- End recent post item-->

              <div class="post-item">
                <img src="assets/img/blog/blog-recent-2.webp" alt="" class="flex-shrink-0">
                <div>
                  <h4><a href="blog-details.php">Customer Experience Trends</a></h4>
                  <time datetime="2024-01-15">Jan 15, 2024</time>
                </div>
              </div><!-- End recent post item-->

              <div class="post-item">
                <img src="assets/img/blog/blog-recent-3.webp" alt="" class="flex-shrink-0">
                <div>
                  <h4><a href="blog-details.php">Digital Marketing Strategies</a></h4>
                  <time datetime="2024-02-01">Feb 1, 2024</time>
                </div>
              </div><!-- End recent post item-->

              <div class="post-item">
                <img src="assets/img/blog/blog-recent-4.webp" alt="" class="flex-shrink-0">
                <div>
                  <h4><a href="blog-details.php">Fashion Industry Insights</a></h4>
                  <time datetime="2024-02-15">Feb 15, 2024</time>
                </div>
              </div><!-- End recent post item-->

              <div class="post-item">
                <img src="assets/img/blog/blog-recent-5.webp" alt="" class="flex-shrink-0">
                <div>
                  <h4><a href="blog-details.php">Retail Technology Updates</a></h4>
                  <time datetime="2024-03-01">Mar 1, 2024</time>
                </div>
              </div><!-- End recent post item-->

            </div><!--/Recent Posts Widget -->

            <!-- Tags Widget -->
            <div class="tags-widget widget-item">

              <h3 class="widget-title">Tags</h3>
              <ul>
                <li><a href="#">E-commerce</a></li>
                <li><a href="#">Fashion</a></li>
                <li><a href="#">Technology</a></li>
                <li><a href="#">Retail</a></li>
                <li><a href="#">Marketing</a></li>
                <li><a href="#">Trends</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Online</a></li>
                <li><a href="#">Shopping</a></li>
                <li><a href="#">Digital</a></li>
                <li><a href="#">Innovation</a></li>
              </ul>

            </div><!--/Tags Widget -->

          </div>

        </div>

      </div>
    </div>

  </main>

  <?php include_once 'include/footer.php'; ?>
  <?php include_once 'include/globalFooterScript.php'; ?>

</body>

</html>