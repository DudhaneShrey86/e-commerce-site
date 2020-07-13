var searchresults = $('#searchresults');
var str = "";

function removeclasses(){
  var lasta = $('#lasta');
  if(window.innerWidth <= 992){
    if($('#productsdiv .card').hasClass('medium')){
      $('#productsdiv .card').removeClass('medium');
    }
    str = 'calc(100% - '+lasta.prev().width()+'px - '+lasta.prev().prev().width()+'px)';
  }
  else{
    if(!$('#productsdiv .card').hasClass('medium')){
      $('#productsdiv .card').addClass('medium');
    }
    str = 'auto';
  }
  lasta.css('width', str);
}

$(document).ready(function(){
  M.AutoInit();
  $('#search').blur(function(){
    setTimeout(function(){
      searchresults.removeClass('searching');
    }, 20);
    $(this).val('');
  });
  $('#search').keyup(function(){
    var v = $(this).val().toLowerCase();
    $('.searchresulta').hide();
    if(v != ''){
      if(!searchresults.hasClass('searching')){
        searchresults.addClass('searching');
      }
      $('.searchresulta').each(function(){
        if($(this).text().toLowerCase().includes(v)){
          $(this).show();
        }
      });
    }
    else{
      searchresults.removeClass('searching');
    }
  });
  removeclasses();
  $(window).resize(function(){
    removeclasses();
  });
});
