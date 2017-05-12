<?php
if($_POST['width'] < 600){
  $width = 320;
  $height = 320;
}else{
  $width = 540;
  $height = 540;
}
$url = 'https://vimeo.com/api/oembed.json?url='.$_POST['link'].'&height='.$height.'&width='.$height.'&access_token=c2dd05bc1f903f37ae194e4d80e61444?access_token=c2dd05bc1f903f37ae194e4d80e61444';
$videoInfo = curl($url);
echo json_encode($videoInfo);
function curl($url) {
   $curl_connection = curl_init($url);
   curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
   curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
   $json = json_decode(curl_exec($curl_connection), true);
   curl_close($curl_connection);
   return $json;

} // end curl
