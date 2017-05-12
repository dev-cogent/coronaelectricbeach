$(document).on('click','.submit-btn',function(){
  var currentTime = new Date();
  var inputMonth = $('.month').val();
  var inputDay = $('.day').val();
  var inputYear = $('.year').val();
  var currentYear = currentTime.getFullYear();
  if((currentYear - inputYear) <= 21 ){
    window.location.href="https://responsibility.org/";
  }else{
    document.cookie="corona-age-verify=true;";
    window.location.href="/";
  }


});
