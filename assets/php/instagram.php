<?php
function getInstagramPhotos(){
  $token = '48128506.6d8ceff.687e9ca1da804f4db1e32c6acec6a953';
  $url = 'https://api.instagram.com/v1/users/self/media/recent/?count=12&access_token='.$token;
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
            <a href="'.$photo->url.'" target="_blank"><img class="instagram-image col-xs-12" src="'.$photo->image.'"/></a>
          </div>';
  }
}
?>
