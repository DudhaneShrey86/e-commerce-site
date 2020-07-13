var productnames = [];
var autocompleteobject = {};
function getoptions(){
  $.post({
    url: './getnames.php',
    data: {
      getnames: 'getnames'
    },
    success: function(result){
      productnames = JSON.parse(result);
      productnames.forEach((item) => {
        autocompleteobject[item.name] = null;
      });
      $('input.autocomplete').autocomplete({
        data: autocompleteobject,
        limit: 10,
        onAutocomplete: function(){
          setimage();
        }
      });
    }
  });
}
function setimage(){
  var v = $('#productname').val();
  productnames.forEach((item) => {
    if(item.name == v){
      $('#productimage').attr('src', item.image);
      $('#stockremaining').text(item.stock);
    }
  });

}
$(document).ready(function(){
  getoptions();
  $('#productname').keyup(function(){
    if($(this).val() == ''){
      $('#productimage').attr('src', '.././images/selectproduct.png');
      $('#stockremaining').text("Choose a product to see its remaining stock");
    }
  });
});
