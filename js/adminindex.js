$(document).ready(function(){
  M.AutoInit();
  var pagename = $('main').data('id');
  $('#'+pagename).addClass('active');
});
