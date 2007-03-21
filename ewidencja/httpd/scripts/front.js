$(document).ready(function(){
    $('#loginToolsHeader').css('cursor','pointer').toggle(function(){
        $('#loginToolsPan').hide();
    }, function(){
        $('#loginToolsPan').show();
    });
   
   $('input[@type=file]').attr('size', 4);
  
   
   $('#s_exp_date').datePicker().css('display', 'inline');
    
});


$(document).ready(function() {
  $('div.demo-show > div').hide();  
  $('div.demo-show > h3').click(function() {
    if ($(this).next('div').css('display') == 'none') {
        $(this).next('div:hidden').slideDown('fast').siblings('div:visible').slideUp('fast');
    } else {
        $(this).next('div:visible').slideUp('fast');
    }
  });
});
        