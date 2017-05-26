<?php
error_reporting(-1);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WQ86GL9');</script>
    <!-- End Google Tag Manager -->
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
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WQ86GL9"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
  <!-- Start NAV bar -->
  <?php include 'assets/html/nav.html'; ?>
  <!-- END NAV BAR -->
  <script>
  if(screen && screen.width > 480){
    document.write('<section class="video-section">'+
      '<video class="main-video" loop autoplay="autoplay">'+
        '<source src="/assets/videos/CEB-water-view.mp4" type="video/mp4">'+
      '</video>'+
    '</section>');
  }
  </script>


  <div class="main-info">

      <h1 class="text-center headline"><a href="https://instagram.com/coronaelectricbeach" target="_blank"> Stay Connected @coronaelectricbeach </a></h1>
      <div class="social-card container">
        <div class="cards">
                <?php displayInstagramPhotos();   ?>
          <!-- Cards go here -->

        </div>
      </div>




      <!-- <hr class="section-break">
      <h1 class="text-center headline"><a href="https://twitter.com/electricbeach" target="_blank"> Latest Tweets @electricbeach </a></h1>
      <div class="social-card container">
        <div class="cards">

      <?php  getTweets(); ?>
    </div>
  </div> -->
  </div>






  <?php include 'assets/html/footer.html'; ?>
  </body>

</html>
