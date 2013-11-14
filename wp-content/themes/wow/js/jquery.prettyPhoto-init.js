jQuery(document).ready(function(){

	"use strict";


	/////////////////////////////////////// Lightbox ///////////////////////////////////////

	jQuery("div.gallery-item .gallery-icon a").prepend('<span class="lightbox-hover icon-plus"></span>').attr("rel", "prettyPhoto[gallery]").width(jQuery(this).find('.attachment-thumbnail').width());
		
	jQuery("a[rel^='prettyPhoto']").prettyPhoto({
		theme: 'pp_default',
		deeplinking: false,
		social_tools: '',
		default_width: '768'
	});


	/////////////////////////////////////// Image Hover ///////////////////////////////////////


	jQuery('.lightbox-hover').css({'opacity':'0'});
	jQuery("a[rel^='prettyPhoto']").hover(
		function() {
			jQuery(this).find('.lightbox-hover').stop().fadeTo(750, 1);
		},
		function() {
			jQuery(this).find('.lightbox-hover').stop().fadeTo(750, 0);
		}
	);


});