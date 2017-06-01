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



    <script type="text/javascript" src="/assets/js/index.js"></script>
    <link rel="stylesheet" href="/assets/css/nav-bar.css">
    <link rel="stylesheet" href="/assets/css/index.css">
    <title>Corona Electric Beach</title>
    <?php include 'assets/php/curl.php'; ?>
    <?php include 'assets/php/bandsInTown.php';?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>


  <body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WQ86GL9"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->


  <!-- Start NAV bar -->
    <?php include 'assets/html/nav.html'; ?>

      <!-- END NAV BAR -->

    <!-- END NAV BAR -->
  <script>
  //Checking if the this is mobile or desktop.
  if(screen && screen.width > 480){
    document.write('<section class="video-section">'+
      '<video class="main-video" loop autoplay="autoplay">'+
        '<source src="/assets/videos/CEB-web-animation6.mp4" type="video/mp4">'+
      '</video>'+
    '</section>');
  }
  </script>

    <div class="main-info">
      <section class="container  content-section text-center beats">
        <br/>
        <p class="mermaid-text">Experience all the fun in the sun with Corona Electric Beach featuring world-renowned DJs.</p>

      <p class="mermaid-text">Traveling across the US and partnering with festival pioneers, Corona Electric Beach is where</p><p class="mermaid-text">“Beats meet the beach”</p>
      <!-- "bears beets battlestar galactica" - Jim Halpert -->

      </section>

      <section class="container content-section">
        <hr class="section-break">
        <h1 class="text-center"> Venue Activations </h1>
        <div class="image-container">
          <img class="background-image" src="/assets/images/CEB_MAP1.png"/>

        </div>

      </section>


      <section class="container content-section">
        <hr class="section-break">
        <h1 class="text-center"> Festival Activations </h1>

      <!-- <div class="row"> -->
      <!-- <div class="col-xs-12 col-sm-12"> -->
        <div class="col-xs-12 col-sm-6 col-lg-4">
          <!-- <div class="logo-container"> -->
        <a href="http://lasvegas.electricdaisycarnival.com/" class="festival-link vegas" target="_blank">
        <img class="festivals electric lasvegas" src="/assets/images/edc-las-vegas-optimized.png"/></a>
        <!-- </div> -->
          </div>
        <div class="col-xs-12 col-sm-6 col-lg-4">

          <a href="http://www.springawakeningfestival.com/" class="festival-link spring" target="_blank">
          <img class="festivals spring" src="/assets/images/springawakening.png"/></a>

        </div>

        <div class="col-xs-12 col-sm-6 col-lg-4">
            <!-- <div class="logo-container hard"> -->
        <a href="http://hardfest.com/hardsummer" class="festival-link hardfest" target="_blank">
        <img class="festivals hard" src="/assets/images/hard-3.png"/></a>
            <!-- </div> -->
        </div>

      <div class="white-space-1"></div>
        <div class="col-xs-12 col-sm-6 col-lg-4">
          <!-- <div class="logo-container"> -->
        <a href="http://orlando.electricdaisycarnival.com/" class="festival-link ed" target="_blank">
        <img class="festivals electric orlando" src="/assets/images/edcORL6_1.png"/></a>
          <!-- </div> -->
        </div>
        <div class="col-xs-12 col-sm-6 col-lg-4">
         <!-- <div class="logo-container"> -->
        <a href="http://www.nocturnalwonderland.com/" class="festival-link noct" target="_blank">
        <img class="festivals nocturnal" src="/assets/images/nocturnal.png"/></a>
        <!-- </div> -->
        </div>
        <div class="col-xs-12 col-sm-6 col-lg-4">
          <!-- <div class="logo-container"> -->
        <a href="http://escapehalloween.com/" class="festival-link esc" target="_blank">
        <img class="festivals escape" src="/assets/images/escape-2.png"/></a>
          <!-- </div> -->
        </div>


        <!-- </div> -->
      </section>

      <section class="container content-section">
        <hr class="section-break">
        <h1 class="text-center"> Upcoming Shows </h1>
        <table class="bands-in-town-table">
          <tbody>
            <?php
            $url = 'http://api.bandsintown.com/artists/electricbeach/events.json?api_version=2.0&app_id=electricbeach';
            $bandsInTown = curl($url);
            foreach($bandsInTown as $info){
              echo'
              <tr>

                <td class="band-date" id="row-no-padding">'.bandDateConversion($info['datetime']).'</td>
                <td> <a href="https://bandsintown.com/event/'.$info['id'].'" target="_blank">'.$info['venue']['name'].'</a><div class="sub-text">w/';
                for($i = 1; $i < count($info['artists']); $i++){
                  if(count($info['artists']) == $i + 1){
                    echo $info['artists'][$i]['name'];
                  }else{
                    echo $info['artists'][$i]['name'].', ';
                  }

                }
                echo'

                </div></td>
                <td>'.$info['formatted_location'].'</td>
                <td>';
                  if($info['ticket_url']){
                  echo '<a href="'.$info['ticket_url'].'" target="_blank">
                    <button class="primary-button bands-btn">TICKETS </button>
                  </a>';}
                  if($info['facebook_rsvp_url']){
                  echo '
                  <a href="'.$info['facebook_rsvp_url'].'" target="_blank">
                    <button class="primary-button bands-btn">RSVP</button>
                  </a>';
                }
                echo'</td>
              </tr>';
            }

            ?>
          </tbody>
        </table>
      </section>



      <!-- <section class="container content-section"> -->

      <!-- </div>

      </section> -->




    <?php include 'assets/html/footer.html'; ?>



  </body>

</html>
