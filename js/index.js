var searchresults = $('#searchresults');

$(document).ready(function(){
  M.AutoInit();
  $('#search').blur(function(){
    searchresults.removeClass('searching');
    $(this).val('');
  });
  $('#search').keyup(function(){
    var v = $(this).val();
    if(v != ''){
      if(!searchresults.hasClass('searching')){
        searchresults.addClass('searching');
      }
    }
    else{
      searchresults.removeClass('searching');
    }
  });
});
