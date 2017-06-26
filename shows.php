<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WQ86GL9');</script>
    <!-- End Google Tag Manager -->
    <?php include 'assets/html/head.html'; ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/nav-bar.css">
    <link rel="stylesheet" href="/assets/css/shows.css">
    <title>SHOWS - Corona Electric Beach</title>
    <script src="/assets/bootbox/bootbox.js"></script>
    <script src="/assets/js/shows.js"></script>
    <?php include 'assets/php/curl.php'; ?>
    <?php include 'assets/php/bandsInTown.php'; ?>
    <?php include 'assets/php/vimeo.php'; ?>

  </head>


  <body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WQ86GL9"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

  <!-- Start NAV bar -->
  <?php include 'assets/html/nav.html'; ?>
  <!-- END NAV BAR -->


  <script>
  if(screen && screen.width > 480){
    document.write('<section class="video-section">'+
      '<video muted class="main-video" loop autoplay="autoplay" >'+
        '<source src="/assets/videos/corona6_1_2017.mp4" type="video/mp4">'+
      '</video>'+
    '</section>');
  }
  </script>




  <div class="main-info">
    <section class="container content-section">
      <h1 class="text-center headline"> Upcoming Shows </h1>
      <table class="bands-in-town-table">
        <tbody>

          <?php
            $url = 'http://api.bandsintown.com/artists/electricbeach/events.json?api_version=2.0&app_id=electricbeach';
            $bandsInTown = curl($url);
            foreach($bandsInTown as $info){
              echo'
              <tr>

                <td class="band-date" id="row-no-padding">'.bandDateConversion($info['datetime']).'</td>
                <td> <a href="https://bandsintown.com/event/'.$info['id'].'" target="_blank">'.$info['venue']['name'].'</a><div class="sub-text">w/';
                for($i = 1; $i < count($info['artists']); $i++){
                  if(count($info['artists']) == $i + 1){
                    echo $info['artists'][$i]['name'];
                  }else{
                    echo $info['artists'][$i]['name'].', ';
                  }

                }
                echo'

                </div></td>
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
        $imageObj =[

          '31'=>[
            url=>'/assets/images/Jax Jones_LA.JPG',
            data=>NULL,
            name=>'Jax Jones | LA 6.24.17'
          ],
          '30'=>[
            url=>'/assets/images/Ephwurd_EDC Las Vegas.jpg',
            data=>NULL,
            name=>'Ephwurd | EDC Las Vegas 6.18.17'
          ],
          '29'=>[
            url=>'/assets/images/Ookay_EDC Las Vegas.jpg',
            data=>NULL,
            name=>'Ookay | EDC Las Vegas 6.17.17'
          ],
          '28'=>[
            url=>'/assets/images/Ghastly_EDC Las Vegas.JPG',
            data=>NULL,
            name=>'Ghastly | EDC Las Vegas 6.16.17'
          ],
          '27'=>[
            url=>'/assets/images/TJR_SpringAwakening.jpg',
            data=>NULL,
            name=>'TJR | Spring Awakening 6.11.17'
          ],
          '26'=>[
            url=>'/assets/images/Paul Oakenfold_Spring Awakening.jpg',
            data=>NULL,
            name=>'Paul Oakenfold | Spring Awakening 6.10.17'
          ],
          '25'=>[
            url=>'/assets/images/DJ Vanic_Spring Awakening.jpeg',
            data=>NULL,
            name=>'Vanic | Spring Awakening 6.9.17'
          ],
          '24'=>[
            url=>'/assets/images/Autograf_LA.jpg',
            data=>'/assets/videos/CEB_Autograf_RecapVideo_Resized.mov',
            name=>'Autograf | LA 5.27.17 '
          ],
          '23'=>[
            url=>'/assets/images/Lost Frequencies_Dallas.jpg',
            data=>'/assets/videos/Corona Electric Beach w- Lost Frequencies.mp4',
            name=>'Lost Frequencies | Dallas 5.27.17'
          ],
          '22'=>[
            url=>'/assets/images/Chromeo+MMW.jpg',
            data=>NULL,
            name=>'CHROMEO (DJ SET) | MIAMI x MMW 3.23.17'
          ],
          '21'=>[
            url=>'/assets/images/Watermat.jpg',
            data=>NULL,
            name=>'WATERMÄT | MIAMI 2.19.17'
          ],
          '20'=>[
            url=>'/assets/images/Gryffin.jpg',
            data=>'/assets/videos/gryffin.mp4',
            name=>'GRYFFIN | MIAMI 1.14.16'
          ],
          '19'=>[
            url=>'/assets/images/Chus.jpeg',
            data=>'/assets/videos/Ceballos.mp4',
            name=>'CHUS & CEBALLOS | FORT LAUDERDALE 10.29.16'
          ],
          '18'=>[
            url=>'/assets/images/armin.jpg',
            data=>'/assets/videos/Matoma.mp4',
            name=>'MATOMA | LA 8.14.16'
          ],
          '17'=>[
            url=>'/assets/images/thomas_jack.jpg',
            data=>'/assets/videos/tj.mp4',
            name=>'THOMAS JACK | DENVER 8.13.16'
          ],
          '16'=>[
            url=>'/assets/images/Atrak.jpg',
            data=>'/assets/videos/ATRAK.mp4',
            name=>'A-TRAK | CHICAGO x VOLLEYWOOD 7.16.16'
          ],
          '15'=>[
            url=>'/assets/images/snapping.jpg',
            data=>NULL,
            name=>'ILLENIUM | NOCTURNAL WONDERLAND 9.2.16'
          ],
          '14'=>[
            url=>'/assets/images/Brenmar.jpg',
            data=>'/assets/videos/ATRAK.mp4',
            name=>'BRENMAR | CHICAGO x VOLLEYWOOD 7.16.16'
          ],
          '13'=>[
            url=>'/assets/images/greenhair.jpg',
            data=>'/assets/videos/Drums.mp4',
            name=>'APE DRUMS | DALLAS 5.28.16'
          ],
          '12'=>[
            url=>'/assets/images/curlyhair.jpg',
            data=>'/assets/videos/Jillionaire.mp4',
            name=>'JILLIONAIRE | NEW YORK 6.18.16'
          ],
          '11'=>[
            url=>'/assets/images/hardy.jpg',
            data=>NULL,
            name=>'ASTRONOMAR | NOCTURNAL WONDERLAND 9.2.16'
          ],
          '10'=>[
            url=>'/assets/images/SNBRN.jpg',
            data=>NULL,
            name=>'HOOK N SLING | DALLAS 5.27.16'
          ],
          '9'=>[
            url=>'/assets/images/BonnieClyde.jpg',
            data=>NULL,
            name=>'BONNIE N CLYDE | EDC ORLANDO 11.4.16'
          ],
          '8'=>[
            url=>'/assets/images/HookNSling.jpg',
            data=>'/assets/videos/Sling.mp4',
            name=>'SNBRN | DALLAS 8.27.16'
          ],
          '7'=>[
            url=>'/assets/images/Virgil.jpg',
            data=>'/assets/videos/Garuda.mp4',
            name=>'VIRGIL | MONTAUK NY 7.2.16'
          ],
          '6'=>[
            url=>'/assets/images/Giraffage.jpg',
            data=>'/assets/videos/Cofresi.mp4',
            name=>'GIRAFFAGE | CHICAGO 6.15.16'
          ],
          '5'=>[
            url=>'/assets/images/LilJon.jpeg',
            data=>'/assets/videos/LilJon.mp4',
            name=>'LIL JON | ATL 8.6.16'
          ],
          '4'=>[
            url=>'/assets/images/DassikSelect.jpg',
            data=>NULL,
            name=>'EPHWURD | EDC ORLANDO 11.4.16'
          ],
          '3'=>[
            url=>'/assets/images/CheatCodes.jpg',
            data=>'/assets/videos/CheatCodes.mp4',
            name=>'CHEAT CODES | LA 5.22.16'
          ],
          '2'=>[
            url=>'/assets/images/PartyFavor.jpg',
            data=>'/assets/videos/ApeDrums.mp4',
            name=>'PARTY FAVOR | DALLAS 5.28.16'
          ],
          '1'=>[
            url=>'/assets/images/KeysNKrates1.jpg',
            data=>NULL,
            name=>'KEYS N KRATES | NOCTURNAL WONDERLAND 9.2.16'
          ],
          '0'=>[
            url=>'/assets/images/12thPlanet.jpg',
            data=>NULL,
            name=>'12TH PLANET | EDC ORLANDO 11.4.16'
          ],
        ];
        // $imageObj = array_reverse($imageObj);
        foreach($imageObj as $keyval => $info){
          echo '<div class="col-sm-12 col-md-6 col-lg-4 p-b-10 text-center vimeo-video" data-video="'.$info['data'].'">
                      <div class="image-container">
                          <div class="video-overlay">
                            <i class="fa fa-play-circle" aria-hidden="true"></i>
                          </div>
                          <img class="photo-shows" src="'.$info['url'].'"/>
                      </div>
                    <span class="event-description">'.$info['name'].'</span>
               </div>';
        }

        ?>
    </section>







  </div>


    <?php include 'assets/html/footer.html'; ?>
  </body>

</html>


<script type="text/javascript">




$(document).on('click','.vimeo-video',function(){
  var link = $(this).attr('data-video');
  console.log(window.innerWidth);
  console.log(window.screen.height);
  $.ajax({
      type: 'POST',
      url: 'assets/php/ajax/getVimeoVideo.php',
      data: {
          video:link,
          width:window.innerWidth
      },
      success: function (jqXHR, textStatus, errorThrown) {
         dialog = bootbox.dialog({
            message: jqXHR,
            closeButton: false
          });
          dialog.modal();
      }
  }); // end ajax request*/
  //var infohtml = url[0];


});
</script>
