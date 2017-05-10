<!DOCTYPE html>
<head>
  <?php include 'assets/html/head.html'; ?>
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
    <source src="/assets/videos/___CEB_VID_4_WEBSITE.mp4" type="video/mp4">
  </video>
  <div class="video-divider"></div>
</section>

<div class="main-info">
  <section class="container content-section">
    <?php
    $url = 'http://api.bandsintown.com/artists/electricbeach/events.json?api_version=2.0&app_id=electricbeach';
    $bandsInTown = curl($url);
    ?>
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
</div>



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
