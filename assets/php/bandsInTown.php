<?php




function bandDateConversion($time){
  $newDate = date('M d <\d\i\v\ \c\l\a\s\s\=\"\d\a\t\e\T\i\m\e\"\>D<\/d\i\v\>', strtotime($time));
  return $newDate;
}
