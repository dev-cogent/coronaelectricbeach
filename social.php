<!DOCTYPE html>
<head>
  <?php include 'assets/html/head.html'; ?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/assets/css/nav-bar.css">
  <link rel="stylesheet" href="/assets/css/social.css">

</head>


<body>

<!-- Start NAV bar -->
<?php include 'assets/html/nav.html'; ?>
<!-- END NAV BAR -->
<section class="video-section">
  <video class="main-video" loop autoplay="autoplay">
    <source src="/assets/videos/CEB alt logo top view water.mp4" type="video/mp4">
  </video>
  <div class="video-divider"></div>
</section>


<div class="main-info">
  <section class="container content-section">
    <h1 class="text-center p-t-50 p-b-50"> Stay Connected </h1>
    <?php
    getTweets();
    ?>
  </section>

  <section class="container content-section">
    <?php displayInstagramPhotos();   ?>
  </section>
</div>


</body>














<?php
function getTweets(){
  include 'assets/php/TwitterAPIExchange.php';
  $settings = array(
          'oauth_access_token'        => "384983365-gLbEc6hVcsMWQJTuWf207sFRiGBZTk90c0quYuuR",
          'oauth_access_token_secret' => "mVWQuD8o8taJmz0auuembNnl33zeS6TjITTQTChKvSXhK",
          'consumer_key'              => "sVKOtGf2xTT7iHBgC4WJcgHAD",
          'consumer_secret'           => "vgpJcVDEzUR2a4SJ0hjAktHI4qYS9bgXlEhHD5fMUdE8IMIAMK"
       );
  $ta_url='https://api.twitter.com/1.1/statuses/user_timeline.json';
  $getfield = '?screen_name=ElectricBeach&count=10';
  $requestMethod = 'GET';
  $twitter = new TwitterAPIExchange($settings);
  $follow_count=$twitter->setGetfield($getfield)
  ->buildOauth($ta_url, $requestMethod)
  ->performRequest();
  $json_twitter = json_decode($follow_count, true);
  $tweetsObj = new stdClass();
  foreach($json_twitter as $tweet){
      $id = $tweet['id'];
      $tweetsObj->$id = new stdClass();
      $tweetsObj->$id->text = linkTweetText($tweet['text']);
      $tweetsObj->$id->username = 'Electric Beach';
      $tweetsObj->$id->created = $tweet['created_at'];
  }
  displayTweets($tweetsObj);
}

function displayTweets($tweetsObj){
  foreach ($tweetsObj as $key => $value) {
    echo '<div class="col-xs-12">
            <div>
              <a href="https://twitter.com/ElectricBeach" target="_blank">
                <img src="https://pbs.twimg.com/profile_images/834846942614081536/HQhHYXNC_normal.jpg"/>
                <p class="d-inline">'.$value->username.'</p>
              </a>
            </div>
            <p>'.$value->text.'</p>
            <p class="date-time">'.getPastTime($value->created).' ago</p>
          </div>';
  }

}

function getPastTime($time){
  $time = strtotime($time);
  $time = time() - $time; // to get the time since that moment
  $time = ($time<1)? 1 : $time;
  $tokens = array (
      31536000 => 'year',
      2592000 => 'month',
      604800 => 'week',
      86400 => 'day',
      3600 => 'hour',
      60 => 'minute',
      1 => 'second'
  );

  foreach ($tokens as $unit => $text) {
      if ($time < $unit) continue;
      $numberOfUnits = floor($time / $unit);
      return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
  }
}

function linkTweetText($text){
  $textLink = explode(' ',$text);
  $textArr = [];
  foreach($textLink as $text){
      if(strpos($text,'https') !== FALSE){
       $text = '<a href="'.$text.'" target="_blank">'.$text.' </a>';
      }
      if(strpos($text,'#')!== FALSE){
        $text = '<a href="https://twitter.com/search?q='.urlencode($text).'" target="_blank">'.$text.'</a>';
      }
      if(strpos($text,'@')!== FALSE){
        $text = '<a href="https://twitter.com/'.$text.'" target="_blank">'.$text.'</a>';
      }
      array_push($textArr,$text);
  }
  $textLink = implode(' ',$textArr);
  return $textLink;
}

function getInstagramPhotos(){
  $token = '48128506.6d8ceff.687e9ca1da804f4db1e32c6acec6a953';
  $url = 'https://api.instagram.com/v1/users/self/media/recent/?access_token='.$token;
  $instagramInfo = curl($url);
  $instagramPhotos = new stdClass;
  foreach($instagramInfo['data'] as $info){
      $id = $info['id'];
      $instagramPhotos->$id = new stdClass;
      $instagramPhotos->$id->image = $info['images']['standard_resolution']['url'];
      $instagramPhotos->$id->url = $info['link'];
  }
  return $instagramPhotos;
}

function displayInstagramPhotos(){
  $photos = getInstagramPhotos();
  foreach ($photos as $key => $photo) {
    echo '<div class="col-xs-12 col-sm-6 col-lg-4 p-b-50">
            <a href="'.$photo->url.'" target="_blank"><img class="col-xs-12" style="height:320px;" src="'.$photo->image.'"/></a>
          </div>';
  }
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
