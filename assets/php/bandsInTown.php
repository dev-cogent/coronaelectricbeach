<?php




function bandDateConversion($time){
  $newDate = date('M d D', strtotime($time));
  return $newDate;
}
