<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include 'assets/html/head.html'; ?>
    <script type="text/javascript" src="/assets/js/index.js"></script>
    <link rel="stylesheet" href="/assets/css/nav-bar.css">
    <link rel="stylesheet" href="/assets/css/index.css">
    <title>Corona Electric Beach</title>
  </head>


  <body>

  <!-- Start NAV bar -->
    <?php include 'assets/html/nav.html'; ?>
    <!-- END NAV BAR -->
    <section class="video-section">
      <video class="main-video" loop autoplay="autoplay">
        <source src="/assets/videos/CEB-web-animation.mp4" type="video/mp4">
      </video>
    </section>

    <div class="main-info">
      <section class="container  content-section text-center">
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
                <td>'.bandDateConversion($info['datetime']).'</td>
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
          <img class="background-image" src="/assets/images/CEB_MAP.png"/>

        </div>
      </section>


      <section class="container content-section">
        <hr class="section-break">
        <h1 class="text-center"> Festival Activations </h1>
        <div class="image-container">
          <a href="http://www.springawakeningfestival.com/" target="_blank"><img class="col-xs-12 col-sm-6" src="/assets/images/springawakening.png"/></a>
          <a href="http://www.nocturnalwonderland.com/" target="_blank"><img class="col-xs-12 col-sm-6" src="/assets/images/nocturnal.png"/></a>
          <a href="http://lasvegas.electricdaisycarnival.com/" target="_blank"><img class="col-xs-12 col-sm-6" src="/assets/images/edc.png"/></a>
          <a href="http://escapehalloween.com/" target="_blank" ><img class="col-xs-12 col-sm-6" src="/assets/images/escape.png"/></a>
          <a href="http://hardfest.com/hardsummer" target="_blank" ><img class="col-xs-12 col-sm-6" src="/assets/images/HARD.png"/></a>
          <a href="http://orlando.electricdaisycarnival.com/" target="_blank" ><img class="col-xs-12 col-sm-6" src="/assets/images/edcORL.png"/></a>
        </div>
      </section>
    </div>



<footer>
  
   <div class="social-icons social-icon-footer">
        <a href="https://www.instagram.com/coronaelectricbeach/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
      </div>
      <div class="social-icons social-icon-footer">
           <a  href="https://www.facebook.com/ElectricBeach/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
      </div>
      <div class="social-icons social-icon-footer">
         <a  href="https://twitter.com/ElectricBeach" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
      </div>


      <div class="footer-content">
          <p>Relax Responsibly.® Corona Extra® Beer. Imported by Crown Imports, Chicago, IL</p>
            <p><a target="_blank" href="https://www.coronausa.com/privacy">Privacy Policy</a>&nbsp;|
    <a target="_blank" href="mailto:contact@coronaelectricbeach.com">Contact</a> |
    <a target="_blank" href="https://www.coronausa.com/terms">Terms and Conditions</a></p>
    </div>
    </div>

    </footer>



  </body>

</html>
<?php
function bandDateConversion($time){
  $newDate = date('M d D', strtotime($time));
  return $newDate;
}


function curl($url) {
   $curl_connection = curl_init($url);
   curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
   curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
   $json = json_decode(curl_exec($curl_connection), true);
   curl_close($curl_connection);
   return $json;

} // end curl
?>
