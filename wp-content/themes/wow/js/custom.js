/////////////////////////////////////// Document Ready ///////////////////////////////////////


jQuery(document).ready(function(){

	"use strict";


	/////////////////////////////////////// Mobile Navigation Menu ///////////////////////////////////////


	jQuery("<option />", {"selected": "selected", "value": "", "text": navigationText}).prependTo(".nav select");
        	
	jQuery(".nav select").change(function() {
		window.location = jQuery(this).find("option:selected").val();
	});


	/////// Moved Right Nav On iPad Portrait ///////

	function gpMoveiPadNav() {
		if(jQuery(window).width() < 960) {
			jQuery('#left-header-nav').append(jQuery('#right-header-nav'));	
		} else {
			jQuery('#left-header-nav').after(jQuery('#right-header-nav'));
		}
	}
	
	gpMoveiPadNav();

	jQuery(window).resize(function() {
		gpMoveiPadNav();		
	});
	
	
	/////// Info Bar Top Padding ///////

	
	function gpInfoBarTopPadding() {
		jQuery('.fixed-header #info-bar, .page-template-homepage-php #info-bar').css('padding-top', jQuery('#header').outerHeight(true) + 15);
	}
	
	gpInfoBarTopPadding();
	
	jQuery(window).resize(function() {
		gpInfoBarTopPadding();		
	});

			
	/////// Language Selector ///////
	

	function gpLanguageSelector() {
	
		jQuery('.icl_lang_sel_current').parent('li').addClass('chosen');

		if(jQuery(window).width() > 767) {
	
			jQuery('#footer-language-list ul').prepend(jQuery('#footer-language-list .chosen'));

			jQuery('#footer-language-list').hover(function() {	
				jQuery(this).find('ul').append(jQuery('#footer-language-list .chosen'));
			}, function() {
				jQuery(this).find('ul').prepend(jQuery('#footer-language-list .chosen'));
			});
			
		} else {
		
			jQuery('#footer-language-list').hover(function() {	
				jQuery(this).find('ul').prepend(jQuery('#footer-language-list .chosen'));
			}, function() {
				jQuery(this).find('ul').prepend(jQuery('#footer-language-list .chosen'));
			});
		
		}
	
	}		
	
	gpLanguageSelector();
	
	jQuery(window).resize(function() {
		gpLanguageSelector();		
	});
		
	
	/////// Lightbox Hover ///////

		
	jQuery('a.prettyphoto').prepend('<span class="lightbox-hover">+</span>');
		
	jQuery('.lightbox-hover').css('opacity', '0');
	jQuery('a.prettyphoto').hover(
		function() {
			jQuery(this).find('.lightbox-hover').stop().fadeTo(750, 1);
		},
		function() {
			jQuery(this).find('.lightbox-hover').stop().fadeTo(750, 0);
		}
	);


	/////// Slide Down/Up Search On Mobiles ///////

	
	jQuery('#mobile-search-icon').toggle(function() {
		jQuery('#info-bar #search').stop().slideDown();
	}, function() {
		jQuery('#info-bar #search').stop().slideUp();
	});				
	

	/////// Prevent Empty Search - Thomas Scholz http://toscho.de ///////


	(function($) {
		$.fn.preventEmptySubmit = function(options) {
			var settings = {
				inputselector: "#searchbar",
				msg          : emptySearchText
			};
			if (options) {
				$.extend(settings, options);
			}
			this.submit(function() {
				var s = $(this).find(settings.inputselector);
				if(!s.val()) {
					alert(settings.msg);
					s.focus();
					return false;
				}
				return true;
			});
			return this;
		};
	})(jQuery);

	jQuery('#searchform').preventEmptySubmit();
	
		
});


/////////////////////////////////////// Load Window ///////////////////////////////////////

jQuery(window).load(function(){

	"use strict";


	/////// Display Content Wrapper & Footer ///////

	
	jQuery('#header, #header #megaMenu ul.megaMenu > li.menu-item > a span.wpmega-link-title, #header #megaMenu ul.megaMenu > li.menu-item > a, #info-bar, #content-wrapper, #footer-bottom, #footer-widgets').css('visibility', 'visible');


});	