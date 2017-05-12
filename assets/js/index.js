$(document).ready(function(){
  var verify = getCookie('corona-age-verify');
  if(!verify){
  window.location.href="/lockscreen.php";
  }

});
