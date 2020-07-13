function deleteitem(t){
  var id = t.data('id');
  var tablename = t.data('tablename');
  var parent = t.parents('.parenttofind');
  $.ajax({
    url: './deleteitem.php',
    type: 'POST',
    data: {
      id: id,
      tablename: tablename,
    },
    success: function(data){
      if(data == 'ok'){
        parent.fadeOut();
        M.toast({
          html: 'Delete Successful',
          displayLength: 1000
        });
      }
      else{
        console.log(data);
        M.toast({
          html: 'Some Error Occured',
          displayLength: 1000
        });
      }
    }
  });
}

$(document).ready(function(){
  M.AutoInit();
  var pagename = $('main').data('id');
  $('#'+pagename).addClass('active');
});
