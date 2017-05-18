<?php
function getInstagramMedia(){
  $token = '48128506.6d8ceff.687e9ca1da804f4db1e32c6acec6a953';
  $url = 'https://api.instagram.com/v1/users/self/media/recent/?count=12&access_token='.$token;
  $instagramInfo = curl($url);
  $instagramPhotos = new stdClass;
  foreach($instagramInfo['data'] as $info){
      $id = $info['id'];
      $instagramPhotos->$id = new stdClass;
      if($info['type'] == 'image'){
        $instagramPhotos->$id->image = $info['images']['standard_resolution']['url'];
      }else{
        $instagramPhotos->$id->image = $info['images']['standard_resolution']['url'];
        $instagramPhotos->$id->video = $info['videos']['standard_resolution']['url'];
      }
      $instagramPhotos->$id->url = $info['link'];
      $instagramPhotos->$id->caption = $info['caption']['text'];

  }
  return $instagramPhotos;
}

function displayInstagramPhotos(){
  $photos = getInstagramMedia();
  foreach ($photos as $key => $photo) {
    echo '<div class="card">

            <a href="'.$photo->url.'" target="_blank" class="card-content">
              <div class="card-title">';
              if($photo->video){
                echo '<video class="card-header-video" loop autoplay="autoplay">
                  <source src="'.$photo->video.'" type="video/mp4">
                </video></div>';
              } else{
                echo '<img class="card-header-image" src="'.$photo->image.'"/> </div>';
              }
              echo'
              <div class="card-body">
                <div class="card-body-header">
                   <div class="insta-social-icon"> <i class="fa fa-instagram social-card" aria-hidden="true"></i> </div>
                <div class="account-name"> @coronaelectricbeach </div>  </div>
                <p class="card-body-caption"> '.$photo->caption.' </p>
                 </div>

              </a>
            </div>';
  }
}
?>
