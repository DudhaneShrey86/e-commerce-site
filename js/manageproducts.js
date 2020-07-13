function searchitem(v){
  v = v.toLowerCase();
  $('.parenttofind').hide();
  $('#nofound').hide();
  if(v != ""){
    var flag = 0;
    $('.productname').each(function(){
      if($(this).text().toLowerCase().includes(v)){
        $(this).parents('.parenttofind').show();
        flag = 1;
      }
    });
    if(flag == 0){
      $('#nofound').show();
    }
  }
  else{
    $('.parenttofind').show();
  }
}


$(document).ready(function(){
  $('#search').keyup(function(){
    searchitem($(this).val());
  });
});
