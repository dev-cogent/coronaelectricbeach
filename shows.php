<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include 'assets/html/head.html'; ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/nav-bar.css">
    <link rel="stylesheet" href="/assets/css/shows.css">
    <title>SHOWS - Corona Electric Beach</title>
    <script src="/assets/bootbox/bootbox.js"></script>
  </head>


  <body>

  <!-- Start NAV bar -->
  <?php include 'assets/html/nav.html'; ?>
  <!-- END NAV BAR -->
  <section class="video-section">
    <video muted class="main-video" loop autoplay="autoplay" >
      <source src="/assets/videos/___CEB_VID_4_WEBSITE.mp4" type="video/mp4">
    </video>
    <div class="video-divider"></div>
  </section>

  <div class="main-info">
    <section class="container content-section">
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
      <h1 class="text-center"> Past Shows </h1>
        <?php
          $url = 'https://api.vimeo.com/me/videos?fields=privacy.view,link,pictures,created_time,uri,name&access_token=c2dd05bc1f903f37ae194e4d80e61444';
          $videosInfo = curl($url);

          foreach($videosInfo['data'] as $info){
            if($info['privacy']['view'] == 'unlisted') continue;
            $picture = $info['pictures']['sizes'][3]['link_with_play_button'];
            $link = $info['link'];
            $eventName = str_replace('Corona Electric Beach','CEB',$info['name']);
            $createdTime = dateConverstion($info['created_time']);
            if(!$picture){
              continue;
            }else{
            echo'<div class="col-xs-12 col-sm-6 col-md-4 p-b-50 text-center vimeo-video" data-video="'.$link.'">
                  <img class="col-xs-12 col-sm-12" src="'.$picture.'"/>
                  <span class="event-description">'.$eventName.' | '.$createdTime.'</span>
                 </div>';
            }
          }
        ?>
    </section>







  </div>



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

function dateConverstion($timeFormat){
  $newTime = date('m/d/Y',strtotime($timeFormat));
  return  $newTime;
}
?>

<script type="text/javascript">
$(document).on('click','.vimeo-video',function(){
  var link = $(this).attr('data-video');
  console.log(window.innerWidth);
  console.log(window.screen.height);
  $.ajax({
      type: 'POST',
      url: 'assets/php/ajax/getVimeoVideo.php',
      data: {
          link:link,
          width:window.innerWidth
      },
      success: function (jqXHR, textStatus, errorThrown) {
        var videoJSON = JSON.parse(jqXHR);
         dialog = bootbox.dialog({
            message: videoJSON.html,
            closeButton: true
          });
          dialog.modal();
      }
  }); // end ajax request*/
  //var infohtml = url[0];


});
</script>
