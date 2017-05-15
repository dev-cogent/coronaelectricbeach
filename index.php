<!DOCTYPE html>
<head>
  <?php include 'assets/html/head.html'; ?>
  <script type="text/javascript" src="/assets/js/index.js">

  </script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/assets/css/nav-bar.css">
  <link rel="stylesheet" href="/assets/css/index.css">
</head>


<body>

<!-- Start NAV bar -->
  <?php include 'assets/html/nav.html'; ?>
  <!-- END NAV BAR -->
  <section class="video-section">
    <video class="main-video" loop autoplay="autoplay">
      <source src="/assets/videos/CEB web animation.mp4" type="video/mp4">
    </video>
  </section>

  <div class="main-info">
    <section class="container  content-section text-center">
      <br/>
      <p>Experience all the fun in the sun with Corona Electric Beach featuring world-renowned DJs.</p>

    <p>Traveling across the US and partnering with festival pioneers, Corona Electric Beach is where “Beats meet the beach”.</p>
    </section>

    <section class="container content-section">
      <?php
      $url = 'http://api.bandsintown.com/artists/electricbeach/events.json?api_version=2.0&app_id=electricbeach';
      $bandsInTown = curl($url);
      ?>
      <hr class="section-break">
      <h1 class="text-center"> Upcoming Shows </h1>
      <table class="bands-in-town-table">
        <tbody>
          <?php foreach($bandsInTown as $info){
            echo'
            <tr>
              <td>'.$info['formatted_datetime'].'</td>
              <td>'.$info['venue']['name'].'<p class="sub-text">w/'.$info['artists'][1]['name'].'</p></td>
              <td>'.$info['formatted_location'].'</td>
              <td>
                <a href="'.$info['ticket_url'].'" target="_blank">
                  <button class="primary-button bands-btn">TICKETS </button>
                </a>
                <a href="'.$info['facebook_rsvp_url'].'" target="_blank">
                  <button class="primary-button bands-btn">RSVP</button>
                </a>
              </td>
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
      <h1 class="text-center"> Venue Activations </h1>
      <div class="image-container">
        <img class="col-xs-12 col-sm-6" src="/assets/images/springawakening.png"/>
        <img class="col-xs-12 col-sm-6" src="/assets/images/nocturnal.png"/>
        <img class="col-xs-12 col-sm-6" src="/assets/images/edc.png"/>
        <img class="col-xs-12 col-sm-6" src="/assets/images/escape.png"/>
        <img class="col-xs-12 col-sm-6" src="/assets/images/HARD.png"/>
        <img class="col-xs-12 col-sm-6" src="/assets/images/edcORL.png"/>
      </div>
    </section>
  </div>


<footer>
  
   <div class="social-icons social-icon-footer">
        <a class="hover-color" href="https://www.instagram.com/coronaelectricbeach/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
      </div>
      <div class="social-icons social-icon-footer">
           <a class="hover-color" href="https://www.facebook.com/ElectricBeach/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
      </div>
      <div class="social-icons social-icon-footer">
         <a class="hover-color" href="https://twitter.com/ElectricBeach" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
      </div>

    <div class="footer-content">
        <p>Relax Responsibly.® Corona Extra® Beer. Imported by Crown Imports, Chicago, IL</p>
          <p><a class="hover-color" target="_blank" href="https://www.coronausa.com/privacy">Privacy Policy</a>&nbsp;| 
  <a class="hover-color" target="_blank" href="mailto:contact@coronaelectricbeach.com">Contact</a> |
  <a class="hover-color" target="_blank" href="https://www.coronausa.com/terms">Terms and Conditions</a></p>
  </div>
  </div>

  </footer>



</body>

<?php
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
<script>
$(document).ready(function(){
  $('body').fadeIn();
});
