<!DOCTYPE html>
<head>
  <?php include 'assets/html/head.html'; ?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/assets/css/nav-bar.css">
  <link rel="stylesheet" href="/assets/css/shows.css">
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
    <h1 class="text-center p-t-50 p-b-50"> Upcoming Shows </h1>
    <table class="bands-in-town-table">
      <tbody>
        <?php foreach($bandsInTown as $info){
          echo'
          <tr>
            <td>'.$info['formatted_datetime'].'</td>
            <td>'.$info['venue']['name'].'<p class="sub-text">w/'.$info['artists'][1]['name'].'</p></td>
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
    <h1 class="text-center"> Past Shows </h1>
      <?php
      $url = 'https://api.vimeo.com/me/videos?fields=link,pictures,created_time,name&access_token=c2dd05bc1f903f37ae194e4d80e61444';
      $videosInfo = curl($url);
      foreach($videosInfo['data'] as $info){
        $picture = $info['pictures']['sizes'][3]['link_with_play_button'];
        $link = $info['link'];
        $eventName = str_replace('Corona Electric Beach','CEB',$info['name']);
        $createdTime = dateConverstion($info['created_time']);

        if(!$picture){
          continue;
        }else{
        echo'<div class="col-xs-12 col-sm-6 col-md-4 p-b-50 text-center">
              <a href="'.$link.'" target="_blank"><img class="col-xs-12 col-sm-12" src="'.$picture.'"/></a>
              <span class="event-description">'.$eventName.' | '.$createdTime.'</span>
             </div>';
        }
      }
      ?>
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

function dateConverstion($timeFormat){
  $newTime = date('m/d/Y',strtotime($timeFormat));
  return  $newTime;
}
?>
