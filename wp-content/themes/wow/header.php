<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title>
<?php wp_title( '|', true, 'right' ); ?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel='stylesheet'  href='<?php bloginfo('template_url'); ?>/css/menu.css?ver=2.3.2.1' type='text/css' media='all' />
<?php wp_head(); ?>
<link rel='stylesheet'  href='http://sell.wpengine.com/wp-content/themes/sell/lib/fonts/font-awesome/css/font-awesome.min.css?ver=3.6' type='text/css' media='all' />
<link rel='stylesheet'  href='<?php bloginfo('template_url'); ?>/css/responsive.css?ver=3.6' type='text/css' media='all' />
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/jquery.js'></script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/jquery-migrate.min.js'></script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/jquery.jqtransform.js'></script>
<script>
	var navigationText = "Navigation";
	var emptySearchText = "Please enter something in the search box!";
</script>
<script>
		jQuery(document).ready(function(){
			"use strict";
			if(window.devicePixelRatio >= 2){		
				jQuery('.post-thumbnail img').each(function() {
					jQuery(this).attr({src: jQuery(this).attr('data-rel')});
				});		
			}
		});
</script>
</head>

<body <?php body_class(); ?>>
<script type="text/javascript">
  /* LP Mobile JS Configuration */
  var _LP_CFG_ = {
			  
    app_id : "acd91c62"
  };
  /* End of Configuration */
 
  /* LP Mobile JS include */
  (function(){var a=_LP_CFG_.lpjsid="lpjs-"+(new Date).getTime(),b=document.createElement("script"),s=document.getElementsByTagName("script")[0];b.id=a;b.type="text/javascript";b.async=true;b.src="https://d3tpuxked45kzt.cloudfront.net/lp_lib/liveperson-mobile.js";s.parentNode.insertBefore(b,s)})();
  /* End of Include */
</script>
<!-- BEGIN PAGE WRAPPER -->
<div id="page-wrapper" class="pageall">
<!-- BEGIN HEADER -->

<header id="header"> 
	<!-- BEGIN LOGO -->
	
	<div id="logo" style=""> <span class="logo-details">vbarrack.com</span> <a href="<?php echo home_url('/');?>" title="Sell"><img src="<?php echo get_template_directory_uri(); ?>/img/logo-trans.png" alt="vbarrack" width="100%" height="76"  /></a> </div>

	
	<nav id="mobile-nav"> <a id="megaMenuToggle" class="mobile-icon-nav mobile-icon megaMenuToggle"><i class="icon-th-list"></i>Menu</a> <a href="#" id="mobile-search-icon" class="mobile-icon"><i class="icon-search"></i>Search</a> <a href="#" id="mobile-account-icon" class="icon mobile-icon"><i class="icon-user"></i>Account</a> <a href="#" id="mobile-cart-icon" class="mobile-icon cart-button"> <i class="icon-shopping-cart"></i> <span class="mobile-basket-info">Basket</span> <span class="computer-basket-info"><span class="amount">&pound;0</span> (0)</span> </a> </nav>
	
	<nav id="left-header-nav" class="nav">
		<div id="megaMenu" class="megaMenuContainer megaMenu-nojs wpmega-preset-grey-white megaResponsive megaResponsiveToggle wpmega-withjs megaMenuFade megaMenuOnHover megaFullWidth megaMenuHorizontal wpmega-noconflict megaMinimizeResiduals megaResetStyles">
			<div id="megaMenuToggle" class="megaMenuToggle">Menu&nbsp; <span class="megaMenuToggle-icon"></span></div>
			<ul id="megaUber" class="megaMenu">
				<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat mega-with-sub ss-nav-menu-item-3 ss-nav-menu-mega ss-nav-menu-mega-fullWidth mega-colgroup current-menu-item"><a href="#"><span class="wpmega-link-title">Buy Account</span></a>
					<ul class="sub-menu sub-menu-1">	   
						<li class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1 "> <span class="um-anchoremulator" > <span class="wpmega-link-title">Buy WoW Account ( World of Warcraft )</span> </span>
							<ul class="sub-menu sub-menu-2">	   
								<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat ss-nav-menu-item-depth-2"><a href="<?php echo home_url(); ?>/wowus"><span class="wpmega-link-title">Buy WoW US Account</span></a></li>
								<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat ss-nav-menu-item-depth-2"><a href="<?php echo home_url(); ?>/woweu"><span class="wpmega-link-title">Buy WoW EU Account</span></a></li>
							</ul>
						</li>
						<li class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1 "><span class="um-anchoremulator" ><span class="wpmega-link-title">Buy Diablo 3 Account</span></span>
							<ul class="sub-menu sub-menu-2">
								<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat ss-nav-menu-item-depth-2"><a href="<?php echo home_url(); ?>/diablo3us"><span class="wpmega-link-title">Buy Diablo 3 US Account</span></a></li>
								<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat ss-nav-menu-item-depth-2"><a href="<?php echo home_url(); ?>/diablo3eu"><span class="wpmega-link-title">Buy Diablo 3 EU Account</span></a></li>
								<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat ss-nav-menu-item-depth-2"><a href="<?php echo home_url(); ?>/diablo3asia"><span class="wpmega-link-title">Buy Diablo 3 Asia Account</span></a></li>
							</ul>
						</li>
						<li  class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1 ss-nav-menu-notext "><span class="um-anchoremulator" ><span class="wpmega-link-title">Buy Guild Wars 2 Account</span></span>
							<ul class="sub-menu sub-menu-3">
								<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat ss-nav-menu-item-depth-2"><a href="<?php echo home_url(); ?>/guildwars2us"><span class="wpmega-link-title">Buy Guild Wars 2 US Account</span></a></li>
								<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat ss-nav-menu-item-depth-2"><a href="<?php echo home_url(); ?>/guildwars2eu"><span class="wpmega-link-title">Buy Guild Wars 2 EU Account</span></a></li>
							</ul>
						</li>
						<li  class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1 ss-nav-menu-notext "><span class="um-anchoremulator" >
							<ul class="sub-menu sub-menu-4">
								<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat ss-nav-menu-item-depth-2"><a href="<?php echo home_url(); ?>/lol"><span class="wpmega-link-title">Buy LOL Account ( League of Legends )</span></a></span></li>
								<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat ss-nav-menu-item-depth-2"><a href="<?php echo home_url(); ?>/runescape"><span class="wpmega-link-title">Buy Runescape Account</span></a></span></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat mega-with-sub ss-nav-menu-item-3  ss-nav-menu-mega ss-nav-menu-mega-fullWidth mega-colgroup mega-colgroup-3 "><a href="#" style="visibility: visible;"><span class="wpmega-link-title" style="visibility: visible;">Buy Gold</span></a>
					<ul class="sub-menu sub-menu-1" style="display: none;">
						<li class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1 ">
							<ul class="sub-menu sub-menu-2">
								<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat ss-nav-menu-item-depth-2"><a href="<?php echo home_url(); ?>/golds/wowus"><span class="wpmega-link-title">Buy WoW Us Gold</span></a></li>
								<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat ss-nav-menu-item-depth-2"><a href="<?php echo home_url(); ?>/golds/woweu"><span class="wpmega-link-title">Buy WoW EU Gold</span></a></li>
								<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat ss-nav-menu-item-depth-2"><a href="<?php echo home_url(); ?>/golds/diablo3us"><span class="wpmega-link-title">Buy Diablo 3 US Gold</span></a></li>
								<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat ss-nav-menu-item-depth-2"><a href="<?php echo home_url(); ?>/golds/diablo3eu"><span class="wpmega-link-title">Buy Diablo 3 Eu Gold</span></a></li>
								<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat ss-nav-menu-item-depth-2"><a href="<?php echo home_url(); ?>/golds/guildwars2us"><span class="wpmega-link-title">Buy Guild Wars 2 US Gold</span></a></li>	
								<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat ss-nav-menu-item-depth-2"><a href="<?php echo home_url(); ?>/golds/guildwars2eu"><span class="wpmega-link-title">Buy Guild Wars 2 EU Gold</span></a></li>	
								<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat ss-nav-menu-item-depth-2"><a href="<?php echo home_url(); ?>/golds/runescape"><span class="wpmega-link-title">Buy Runescape Gold</span></a></li>	
							</ul>
						</li>
					</ul>
				</li>
				<li class="menu-item menu-item-type-post_type menu-item-object-page ss-nav-menu-item-5 ss-nav-menu-reg um-flyout-align-center"><a href="<?php echo home_url(); ?>/diablo3-item/"><span class="wpmega-link-title">Buy Diablo 3 Item</span></a></li>
				<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat mega-with-sub ss-nav-menu-item-3  ss-nav-menu-mega ss-nav-menu-mega-fullWidth mega-colgroup mega-colgroup-3 "><a href="#" style="visibility: visible;"><span class="wpmega-link-title" style="visibility: visible;">Power Leveling</span></a>
					<ul class="sub-menu sub-menu-1" style="display: none;">
						<li class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1">
							<ul class="sub-menu sub-menu-2">
								<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat ss-nav-menu-item-depth-2"><a href="<?php echo home_url(); ?>/power-leveling/wow"><span class="wpmega-link-title">Power Leveling WoW Account</span></a></li>
								<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat ss-nav-menu-item-depth-2"><a href="<?php echo home_url(); ?>/power-leveling/diablo3"><span class="wpmega-link-title">Power Leveling Diablo 3 Account</span></a></li>
								<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat ss-nav-menu-item-depth-2"><a href="<?php echo home_url(); ?>/power-leveling/guildwars2"><span class="wpmega-link-title">Power Leveling Guild Wars 2 Account</span></a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat mega-with-sub ss-nav-menu-item-3  ss-nav-menu-mega ss-nav-menu-mega-fullWidth mega-colgroup mega-colgroup-3 "><a href="#" style="visibility: visible;"><span class="wpmega-link-title" style="visibility: visible;">Sell Account</span></a>
					<ul class="sub-menu sub-menu-1" style="display: none;">
						<li class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1 ">
							<ul class="sub-menu sub-menu-2">
								<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat ss-nav-menu-item-depth-2"><a href="<?php echo home_url(); ?>/sell/wow/"><span class="wpmega-link-title">Sell Your Wow Account</span></a></li>
								<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat ss-nav-menu-item-depth-2"><a href="<?php echo home_url(); ?>/sell/diablo3/"><span class="wpmega-link-title">Sell Your Diablo 3 Account</span></a></li>
								<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat ss-nav-menu-item-depth-2"><a href="<?php echo home_url(); ?>/sell/guildwars2/"><span class="wpmega-link-title">Sell Your Guild Wars 2 Account</span></a></li>
								<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat ss-nav-menu-item-depth-2"><a href="<?php echo home_url(); ?>/sell/runescape/"><span class="wpmega-link-title">Sell Your Runescape Account</span></a></li>
								<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat ss-nav-menu-item-depth-2"><a href="<?php echo home_url(); ?>/sell/lol/"><span class="wpmega-link-title">Sell Your League of Legends Account</span></a></li>
							</ul>
						</li>
					</ul>
				</li>		
				<li class="menu-item menu-item-type-post_type menu-item-object-page ss-nav-menu-item-5  ss-nav-menu-reg um-flyout-align-center"><a href="<?php echo home_url('/');?>about"><span class="wpmega-link-title">About Us</span></a></li>
				<li class="menu-item menu-item-type-post_type menu-item-object-page ss-nav-menu-item-5  ss-nav-menu-reg um-flyout-align-center"><a href="<?php echo home_url('/');?>faq"><span class="wpmega-link-title">FAQ</span></a></li>
				<li class="menu-item menu-item-type-post_type menu-item-object-page ss-nav-menu-item-7  ss-nav-menu-reg um-flyout-align-center"><a href="#"><span class="wpmega-link-title" id="lpButDivID-1381388655022"></span></a></li>
				
<script type="text/javascript" charset="UTF-8" src="https://dev.liveperson.net/hc/P24901712/?cmd=mTagRepstate&site=P24901712&buttonID=7&divID=lpButDivID-1381388655022&bt=3&c=1"></script>
<!-- END LivePerson Button code -->
			</ul>
		</div>
	</nav>
	
	<!-- END LEFT NAV --> 
	
	<!-- BEGIN RIGHT NAV -->
	
	<nav id="right-header-nav" class="nav">
		<ul id="menu-right-menu" class="menu">
			<li id="menu-item-2663" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2663"><a href="#">My Account</a>
				<ul class="sub-menu">
					<li id="menu-item-2668" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2668"><a href="#">Lost Password</a></li>
				</ul>
			</li>
		</ul>
		<ul class="dropdowncart menu">
		<?php
			$current_user =  wp_get_current_user();
			$total	=	0;
			if($current_user->data != NULL){
				$sql	.=	" SELECT * FROM wp_buy where 1 ";
				$sql	.=	" and id = $current_user->ID ";
				$wpdb->get_results( $sql );
				$myrows	=	$wpdb->get_results( $sql );	
				
				$list	=	'';
				foreach($myrows as $value){				
					$total	+= $value->product_price;
				}
			}
		?>
			<li><a href="<?php echo home_url('/');?>buy" class="mobile-icon cart-button" title="View your shopping cart"> <i class="icon-shopping-cart"></i> <span class="mobile-basket-info">Basket (<?php echo $wpdb->num_rows;?>)</span> <span class="computer-basket-info"><span class="amount">$<?php echo $total;?></span> (<?php echo $wpdb->num_rows;?>)</span> </a>
				<!--	
				<ul class="sub-menu">			
						<li class="empty">No products in the cart.</li>
				</ul>
				-->
			</li>
		</ul>
	</nav>
	<!-- END RIGHT NAV --> 
</header>

<!-- END HEADER -->