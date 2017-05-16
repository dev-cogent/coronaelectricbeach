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
            <div class="pull-left">
              <a href="https://twitter.com/ElectricBeach" target="_blank">
                <img src="https://pbs.twimg.com/profile_images/834846942614081536/HQhHYXNC_normal.jpg"/>
              </a>
            </div>

            <div class="twitter-info pull-left">
              <a href="https://twitter.com/ElectricBeach" target="_blank">
                <p class="d-inline">'.$value->username.'</p>
              </a>
              <p>'.$value->text.'</p>
              <div class="date-time">'.getPastTime($value->created).' ago</div>
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
