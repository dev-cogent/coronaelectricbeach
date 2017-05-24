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

function autoTab(current,next){
      if (current.getAttribute&&current.value.length==current.getAttribute("maxlength"))next.focus();
}


$(document).ready( function(){
  $( ".year").keyup(function() {
    var currentTime = new Date();
    var inputMonth = $('.month').val();
    var inputDay = $('.day').val();
    var inputYear = $('.year').val();
    var currentYear = currentTime.getFullYear();

    $('input.required').each(function(current) {
        if (inputMonth,inputDay,inputYear != '' && inputYear.length == 4) {

            console.log('all inputs filled');
            if((currentYear - inputYear) <= 21 ){
            //  event.preventDefault();
              $('.lock-container').empty();

              $('.lock-container').append("<div class='error-message'>  We're sorry, but you are not of legal drinking age. <br> You are now being redirected to responsibility.org. </div>")
            //   setTimeout(function () {
            //   window.location.href="https://responsibility.org/";}, 3000);
             }
            else{
              document.cookie="corona-age-verify=true;";
              window.location.href="/";
            }
        }
        else{
            console.log('theres an empty input');
            return false
        }
    });
  });

})


// validateForm();

// function validateForm () {
//   var fields = $('input.required');
//   var currentTime = new Date();
//   var inputMonth = $('.month').val();
//   var inputDay = $('.day').val();
//   var inputYear = $('.year').val();
//   var currentYear = currentTime.getFullYear();
//
//   for(var i=0; i<fields.length;i++) {
//     if ($(fields[i]).val()) != ''){
//       if((currentYear - inputYear) <= 21 ){
//         window.location.href="https://responsibility.org/";
//       }else{
//         document.cookie="corona-age-verify=true;";
//         window.location.href="/";
//       }
//
//     }
//   }
// }
