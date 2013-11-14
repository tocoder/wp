<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>


<!-- BEGIN FOOTER BOTTOM -->
		<footer id="footer-bottom" class=" show-footer-language-list">
			<!-- BEGIN SOCIAL LINKS -->
				<div id="social-icons">
					<a href="#" class="icon-rss-sign" title="RSS Feed" rel="nofollow" target="_blank"></a>			
					<a href="#" class="icon-twitter-sign" title="Twitter" rel="nofollow" target="_blank"></a>			
					<a href="#" class="icon-facebook-sign" title="Facebook" rel="nofollow" target="_blank"></a>			
					<a href="#" class="icon-youtube-sign" title="YouTube" rel="nofollow" target="_blank"></a>			
					<a href="#" class="icon-google-plus-sign" title="Google+" rel="nofollow" target="_blank"></a>														
				</div>
	
				<!-- ENDO SOCIAL LINKS -->
				<!-- BEGIN COPYRIGHT -->
				<div id="copyright">Copyright &copy; 2008-2013 vbarrack.com, J and Three L Trading Limited. All Rights Reserved. Designated trademarks and brands are the property of their respective owners. Use of this Web site constitutes acceptance of the Vbarrack.com User Agreement and Privacy Policy.</div>
				<!-- END COPYRIGHT -->
				<!-- BEGIN LANGUAGE SELECTOR -->
				<div id="footer-language-list"><ul><li><img src="<?php echo get_template_directory_uri(); ?>/images/en.png" height="12" alt="en" width="18" /><span  class="icl_lang_sel_current">English</span></li><li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/es.png" height="12" alt="es" width="18" /></a><a href="#"><span  class="icl_lang_sel_native">Español</span> <span  class="icl_lang_sel_translated"><span  class="icl_lang_sel_native">(</span>Spanish<span  class="icl_lang_sel_native">)</span></span></a></li><li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/de.png" height="12" alt="de" width="18" /></a><a href="#"><span  class="icl_lang_sel_native">Deutsch</span> <span  class="icl_lang_sel_translated"><span  class="icl_lang_sel_native">(</span>German<span  class="icl_lang_sel_native">)</span></span></a></li><li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/fr.png" height="12" alt="fr" width="18" /></a><a href="#"><span  class="icl_lang_sel_native">Français</span> <span  class="icl_lang_sel_translated"><span  class="icl_lang_sel_native">(</span>French<span  class="icl_lang_sel_native">)</span></span></a></li></ul></div>
				<!-- END LANGUAGE SELECTOR -->
		</footer>
		<!-- END FOOTER -->
</div>
<?php wp_footer(); ?>

<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/hoverIntent.js?ver=3.6'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var uberMenuSettings = {"speed":"300","trigger":"click","orientation":"horizontal","transition":"fade","hoverInterval":"20","hoverTimeout":"400","removeConflicts":"on","autoAlign":"off","noconflict":"off","fullWidthSubs":"off","androidClick":"off","iOScloseButton":"off","loadGoogleMaps":"off","repositionOnLoad":"off"};
/* ]]> */
</script>
<!--mobile click menu--->
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/ubermenu.min.js?ver=3.6'></script>
<!----seach button---->
<!--
<script type='text/javascript' src='js/woocommerce.js?ver=3.6'></script>
-->
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/custom.js'></script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/jquery.superslides.js'></script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/jquery.touchSwipe.min.js?ver=3.6'></script>
</body>
</html>