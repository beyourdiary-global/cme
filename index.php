<!DOCTYPE html>
<html lang="en">

<head>
 <?php include_once 'include/header.php'?>
</head>

<body class="index-page">

  <header id="header" class="header position-relative">
    <?php include_once 'include/topbar.php'?>
    <?php include_once 'include/mainHeader.php'?>
    <?php include_once 'include/navigation.php'?>
    <?php include_once 'main/annoucementBar.php'?>
    <!-- Mobile Search Form -->
    <?php include_once 'main/mobileSearchForm.php'?>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <?php include_once 'main/heroBanner.php'?>
    <!-- /Hero Section -->

    <!-- Promo Cards Section -->
    <?php include_once 'main/promoCard.php'?>
    <!-- /Promo Cards Section -->

    <!-- Category Cards Section -->
    <?php include_once 'main/categoryCard.php'?>
    <!-- /Category Cards Section -->

    <!-- Best Sellers Section -->
    <?php include_once 'main/bestSeller.php'?>
    <!-- /Best Sellers Section -->

    <!-- Product List Section -->
    <?php include_once 'main/productList.php'?>
    <!-- /Product List Section -->

  </main>
  <?php include_once 'include/footer.php'?>
  <?php include_once 'include/globalFooterScript.php'?>
</body>

</html>