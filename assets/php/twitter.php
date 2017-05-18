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
  $getfield = '?screen_name=ElectricBeach&include_rts=false&count=30';
  $requestMethod = 'GET';
  $twitter = new TwitterAPIExchange($settings);
  $follow_count=$twitter->setGetfield($getfield)
  ->buildOauth($ta_url, $requestMethod)
  ->performRequest();
  $json_twitter = json_decode($follow_count, true);
  $tweetsObj = new stdClass();
  $count = 0;
  foreach($json_twitter as $tweet){
    if(!$tweet['entities']['media'][0]['media_url'] ){
      continue;
    }
    if($count == 12){
      break;
    }
      $id = $tweet['id'];
      $tweetsObj->$id = new stdClass();
      $tweetsObj->$id->text = linkTweetText($tweet['text']);
      $tweetsObj->$id->username = 'Electric Beach';
      $tweetsObj->$id->created = $tweet['created_at'];
      $tweetsObj->$id->media = $tweet['entities']['media'][0]['media_url'];
      $count++;
   }
  displayTweets($tweetsObj);
}

function displayTweets($tweetsObj){
  foreach ($tweetsObj as $key => $value) {
    echo '<div class="card">
            <div class="card-content">
              <div class="card-title">
              <img class="card-header-image" src="'.$value->media.'"/> </div>
              <div class="card-body">
                <div class="card-body-header">
                   <div class="insta-social-icon"> <i class="fa fa-twitter social-card" aria-hidden="true"></i> </div>
                <div class="account-name"> @coronaelectricbeach </div>  </div>
                <p class="card-body-caption"> '.$value->text.' </p>
                 </div>
              </div>
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


?>
