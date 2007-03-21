$(document).ready(function(){
    /**
               * Toggle Pannels script transform three 'div's' into show/hide panels with memory
               * TODO Recaftor everythink :)
               */
    $('.toggle_box').each(function(i){
        
        var box_id = $(this).attr('id');
        var box_width = $(this).width();
        $(this).find('.toggle_header').toggle(function(){
            $(this).parent().find('.toggle_content').width(box_width).hide();
            $(this).find('.register a').css('background-image', 'url(public/images/arrow1.gif)');
            $.cookie(box_id, '0'); //hide panel
        }, function(){
            $(this).parent().find('.toggle_content').width(box_width).show();
            $(this).find('.register a').css('background-image', 'url(public/images/arrow2.gif)');
            $.cookie(box_id, '1'); //show panel
        });
        if ($.cookie(box_id) == 0) {
            $(this).find('.toggle_header').click(); //hide panel if cookie is set '0'
            $(this).find('.toggle_content').hide(); //hide panel without fadeOut effect
        } else if ($.cookie(box_id) == 1) {
            $(this).find('.register a').css('background-image', 'url(public/images/arrow2.gif)');
        } else if ($.cookie(box_id) == null) {
            $(this).find('.toggle_header').click(); //hide panel by default
            $(this).find('.toggle_content').hide(); //hide panel without fadeOut effect
        }
    });
   


});