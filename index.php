<!DOCTYPE html>


<html lang="en">
  <head>
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

  <!-- Start NAV bar -->
    <?php include 'assets/html/nav.html'; ?>

      <!-- END NAV BAR -->

    <!-- END NAV BAR -->
  <script>
  //Checking if the this is mobile or desktop.
  if(screen && screen.width > 480){
    document.write('<section class="video-section">'+
      '<video class="main-video" loop autoplay="autoplay">'+
        '<source src="/assets/videos/CEB-web-animation.mp4" type="video/mp4">'+
      '</video>'+
    '</section>');
  }
  </script>

    <div class="main-info">
      <section class="container  content-section text-center beats">
        <br/>
        <p>Experience all the fun in the sun with Corona Electric Beach featuring world-renowned DJs.</p>

      <p>Traveling across the US and partnering with festival pioneers, Corona Electric Beach is where “Beats meet the beach”.</p>
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

                <td class="band-date">'.bandDateConversion($info['datetime']).'</td>
                <td> <a href="https://bandsintown.com/event/14134447?artist=Electric%20Beach" target="_blank">'.$info['venue']['name'].'</a><div class="sub-text">w/'.$info['artists'][1]['name'].'</div></td>
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
        <div class="image-container">
        <div class="row">
        <div class="col-xs-12 col-sm-12 cold-md-12">
          <div class="col-xs-12 col-sm-6 col-lg-4">
          <a href="http://lasvegas.electricdaisycarnival.com/" target="_blank">
          <img class="festivals electric lasvegas" src="/assets/images/edc-lasvegas.png"/></a>
          </div>
          <div class="col-xs-12 col-sm-6 col-lg-4">
          <a href="http://www.springawakeningfestival.com/" target="_blank">
          <img class="festivals spring" src="/assets/images/springawakening.png"/></a>
          </div>
          <div class="col-xs-12 col-sm-6 col-lg-4">
          <a href="http://hardfest.com/hardsummer" target="_blank">
          <img class="festivals hard" src="/assets/images/HARD1.png"/></a>
          </div>
          <div class="col-xs-12 col-sm-6 col-lg-4">
           <div class="row-2">
          <a href="http://www.nocturnalwonderland.com/" target="_blank">
          <img class="festivals nocturnal" src="/assets/images/nocturnal.png"/></a>
          </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-lg-4">
            <div class="row-2">
          <a href="http://escapehalloween.com/" target="_blank">
          <img class="festivals escape" src="/assets/images/escape.png"/></a>
            </div>
          </div>
          
          <div class="col-xs-12 col-sm-6 col-lg-4">
            <div class="row-2">
          <a href="http://orlando.electricdaisycarnival.com/" target="_blank">
          <img class="festivals electric orlando" src="/assets/images/edcORL.png"/></a>
            </div>
          </div>
          </div>
        </div>
      </div>
     
      </section>
   



    <?php include 'assets/html/footer.html'; ?>



  </body>

</html>
