<?php
if($_POST['video']){
echo '<video class="modal-video" autoplay controls>
  <source src="'.$_POST['video'].'" type="video/mp4">
</video>';
}else{
  return 0;
}
