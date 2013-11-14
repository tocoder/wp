jQuery(document).ready(function() { 
    var highlightRows = jQuery("#tableAccomm").find('tbody > tr');

   highlightRows.hover( function(){
   jQuery(this).children().css('background','none');
   jQuery(this).css('background-color','#E6E6E6');
   jQuery(this).children().css('background-color','#E6E6E6');

   },
     function(){
       jQuery(this).css('background-color','white');
       jQuery(this).children().css('background-color','white');
													
       jQuery(this).children().eq(0).css('background','transparent url(../../wp-content/themes/wow/img/bgstripes.gif) repeat scroll 0 0');
       jQuery(this).children().eq(2).css('background','transparent url(../../wp-content/themes/wow/img/bgstripes.gif) repeat scroll 0 0');
       jQuery(this).children().eq(4).css('background','transparent url(../../wp-content/themes/wow/img//bgstripes.gif) repeat scroll 0 0');

       jQuery(this).children().eq(1).css('background','#F9F9F9 url(../../wp-content/themes/wow/img/bgtdgrad.jpg) repeat-x scroll 100% 100%');
       jQuery(this).children().eq(3).css('background','#F9F9F9 url(../../wp-content/themes/wow/img/bgtdgrad.jpg) repeat-x scroll 100% 100%');
   }); 
 }); 
