$(document).ready(function(){
  var verify = getCookie('corona-age-verify');
  if(!verify){
  window.location.href="/lockscreen.php";
  }

});

function getCookie(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length == 2) return parts.pop().split(";").shift();
}
