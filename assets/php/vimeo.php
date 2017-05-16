<?php
function dateConverstion($timeFormat){
  $newTime = date('m.d.Y',strtotime($timeFormat));
  return  $newTime;
}

 ?>
