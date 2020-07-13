var walink1 = "https://wa.me/";
var walink2 = "?text=";
var str1 = "Hey, I want to know about the availability of the product - ";
$(document).ready(function(){
  $('#generatewalink').click(function(){
    if($('#name').val() == ""){
      alert("Type in the name of the product first.");
    }
    else{
      var url = walink1 + $('#phoneno').val() + walink2 + str1 + $('#name').val();
      $('#w_link').val(encodeURI(url));
    }
  });
  $('#w_link').click(function(){
    $(this).select();
  });
});
