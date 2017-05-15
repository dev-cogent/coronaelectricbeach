<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include 'assets/html/head.html'; ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/nav-bar.css">
    <link rel="stylesheet" href="/assets/css/social.css">
    <title> SOCIAL - Corona Electric Beach</title>
    <?php include 'assets/php/curl.php';?>
    <?php include 'assets/php/twitter.php';?>
    <?php include 'assets/php/instagram.php';?>

  </head>


  <body>

  <!-- Start NAV bar -->
  <?php include 'assets/html/nav.html'; ?>
  <!-- END NAV BAR -->
  <section class="video-section">
    <video class="main-video" loop autoplay="autoplay">
      <source src="/assets/videos/CEB-water-view.mp4" type="video/mp4">
    </video>
    <div class="video-divider"></div>
  </section>


  <div class="main-info">
    <section class="container content-section">
      <h1 class="text-center headline"> Stay Connected </h1>
      <?php  getTweets(); ?>
    </section>

    <section class="container content-section">
      <?php displayInstagramPhotos();   ?>
    </section>
  </div>

  <?php include 'assets/html/footer.html'; ?>
  </body>

</html>
