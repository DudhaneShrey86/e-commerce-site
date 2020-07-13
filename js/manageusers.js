function validateform(){
  var flag = 1;
  if($('#designation').val() == null){
    $('#errortext').html("Please select a designation");
    flag = 0;
  }
  if($('#password').val() != $('#confirmpassword').val()){
    $('#errortext').html("Passwords do not match");
    flag = 0;
  }
  if(flag == 0){
    event.preventDefault();
  }
}


$(document).ready(function(){

});
