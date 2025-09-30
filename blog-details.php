<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once 'include/header.php'; ?>
</head>

<body class="blog-details-page">

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
            <li><a href="blog.php">Blog</a></li>
            <li class="current">Blog Details</li>
          </ol>
        </nav>
        <h1>Blog Details</h1>
      </div>
    </div><!-- End Page Title -->

    <div class="container">
      <div class="row">

        <div class="col-lg-8">

          <!-- Blog Details Section -->
          <section id="blog-details" class="blog-details section">
            <div class="container">

              <article class="article">

                <div class="post-img">
                  <img src="assets/img/blog/blog-1.webp" alt="" class="img-fluid">
                </div>

                <h2 class="title">The Future of E-commerce: Trends to Watch in 2024</h2>

                <div class="meta-top">
                  <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details.php">John Doe</a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.php"><time datetime="2024-01-01">Jan 1, 2024</time></a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details.php">12 Comments</a></li>
                  </ul>
                </div><!-- End meta top -->

                <div class="content">
                  <p>
                    The e-commerce landscape is evolving rapidly, driven by technological advancements and changing consumer behaviors. As we move into 2024, businesses must stay ahead of emerging trends to remain competitive in the digital marketplace.
                  </p>

                  <p>
                    From artificial intelligence and machine learning to augmented reality and voice commerce, the future of online retail is being shaped by innovative technologies that enhance the customer experience.
                  </p>

                  <blockquote>
                    <p>
                      "The future of e-commerce lies in creating personalized, seamless experiences that bridge the gap between digital and physical retail."
                    </p>
                  </blockquote>

                  <p>
                    Social commerce is gaining momentum as platforms like Instagram, TikTok, and Facebook integrate shopping features directly into their ecosystems.
                  </p>

                  <h3>Mobile-First Commerce Strategy</h3>
                  <p>
                    Mobile commerce continues to dominate the e-commerce space, with smartphones accounting for over 50% of all online transactions. Businesses must prioritize mobile optimization.
                  </p>
                  <img src="assets/img/blog/blog-inside-post.webp" class="img-fluid" alt="">

                  <h3>Sustainability and Conscious Consumption</h3>
                  <p>
                    Modern consumers are increasingly conscious about environmental impact and sustainability. E-commerce businesses are responding by implementing eco-friendly practices.
                  </p>

                </div><!-- End post content -->

                <div class="meta-bottom">
                  <i class="bi bi-folder"></i>
                  <ul class="cats">
                    <li><a href="#">Technology</a></li>
                    <li><a href="#">E-commerce</a></li>
                  </ul>

                  <i class="bi bi-tags"></i>
                  <ul class="tags">
                    <li><a href="#">Digital</a></li>
                    <li><a href="#">Trends</a></li>
                    <li><a href="#">Innovation</a></li>
                  </ul>
                </div><!-- End meta bottom -->

              </article>

            </div>
          </section><!-- /Blog Details Section -->

          <!-- Blog Comments Section -->
          <section id="blog-comments" class="blog-comments section">

            <div class="container">

              <h4 class="comments-count">3 Comments</h4>

              <div id="comment-1" class="comment">
                <div class="d-flex">
                  <div class="comment-img"><img src="assets/img/blog/comments-1.webp" alt=""></div>
                  <div>
                    <h5><a href="">Sarah Wilson</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                    <time datetime="2024-01-02">02 Jan 2024</time>
                    <p>
                      Great insights on the future of e-commerce! Very helpful article.
                    </p>
                  </div>
                </div>
              </div><!-- End comment #1 -->

              <div id="comment-2" class="comment">
                <div class="d-flex">
                  <div class="comment-img"><img src="assets/img/blog/comments-2.webp" alt=""></div>
                  <div>
                    <h5><a href="">Mike Johnson</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                    <time datetime="2024-01-03">03 Jan 2024</time>
                    <p>
                      The sustainability aspect is becoming increasingly important. Thanks for sharing!
                    </p>
                  </div>
                </div>
              </div><!-- End comment #2-->

              <div id="comment-3" class="comment">
                <div class="d-flex">
                  <div class="comment-img"><img src="assets/img/blog/comments-3.webp" alt=""></div>
                  <div>
                    <h5><a href="">Lisa Chen</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                    <time datetime="2024-01-04">04 Jan 2024</time>
                    <p>
                      AI personalization is making a huge difference. Great article!
                    </p>
                  </div>
                </div>
              </div><!-- End comment #3 -->

            </div>

          </section><!-- /Blog Comments Section -->

          <!-- Comment Form Section -->
          <section id="comment-form" class="comment-form section">
            <div class="container">

              <form action="">

                <h4>Post Comment</h4>
                <p>Your email address will not be published. Required fields are marked * </p>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <input name="name" type="text" class="form-control" placeholder="Your Name*" required>
                  </div>
                  <div class="col-md-6 form-group">
                    <input name="email" type="email" class="form-control" placeholder="Your Email*" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col form-group">
                    <input name="website" type="url" class="form-control" placeholder="Your Website">
                  </div>
                </div>
                <div class="row">
                  <div class="col form-group">
                    <textarea name="comment" class="form-control" placeholder="Your Comment*" rows="6" required></textarea>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Post Comment</button>
                </div>

              </form>

            </div>
          </section><!-- /Comment Form Section -->

        </div>

        <div class="col-lg-4 sidebar">

          <div class="widgets-container">

            <!-- Search Widget -->
            <div class="search-widget widget-item">

              <h3 class="widget-title">Search</h3>
              <form action="" method="get">
                <input type="text" name="search" placeholder="Search blog posts...">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
              </form>

            </div><!--/Search Widget -->

            <!-- Categories Widget -->
            <div class="categories-widget widget-item">

              <h3 class="widget-title">Categories</h3>
              <ul class="mt-3">
                <li><a href="#">Technology <span>(15)</span></a></li>
                <li><a href="#">E-commerce <span>(12)</span></a></li>
                <li><a href="#">Marketing <span>(8)</span></a></li>
                <li><a href="#">Business <span>(10)</span></a></li>
              </ul>

            </div><!--/Categories Widget -->

            <!-- Recent Posts Widget -->
            <div class="recent-posts-widget widget-item">

              <h3 class="widget-title">Recent Posts</h3>

              <div class="post-item">
                <img src="assets/img/blog/blog-recent-1.webp" alt="" class="flex-shrink-0">
                <div>
                  <h4><a href="blog-details.php">AI-Powered Customer Service</a></h4>
                  <time datetime="2024-01-10">Jan 10, 2024</time>
                </div>
              </div><!-- End recent post item-->

              <div class="post-item">
                <img src="assets/img/blog/blog-recent-2.webp" alt="" class="flex-shrink-0">
                <div>
                  <h4><a href="blog-details.php">Sustainable Packaging Solutions</a></h4>
                  <time datetime="2024-01-08">Jan 8, 2024</time>
                </div>
              </div><!-- End recent post item-->

            </div><!--/Recent Posts Widget -->

            <!-- Tags Widget -->
            <div class="tags-widget widget-item">

              <h3 class="widget-title">Tags</h3>
              <ul>
                <li><a href="#">E-commerce</a></li>
                <li><a href="#">AI</a></li>
                <li><a href="#">Mobile</a></li>
                <li><a href="#">Sustainability</a></li>
                <li><a href="#">Innovation</a></li>
                <li><a href="#">Technology</a></li>
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