<?php
/*
 Template Name:Games
 */
get_header();

global $post;
		$slug = get_post( $post )->post_name;
		$params	=	'';
		$game	=	'';
		$money_unit	=	'$';
		
		$page_number	=	isset($_GET['pages'])	?	$_GET['pages']	 :	1;
		$per_page=	isset($_GET['per_page'])?	$_GET['per_page']:	7;
		
		
		switch($slug){
			case 'diablo3us':
				$params	='diablo3us';
				$game	='diablo3';
				break;
			case 'diablo3eu':
				$params	='diablo3eu';
				$game	='diablo3';
				break;
			case 'diablo3asia':
				$params	='diablo3asia';
				$game	='diablo3';
				break;
			case 'guildwars2us':
				$params	='guildwars2us';
				$game	='guildwars2';
				break;
			case 'guildwars2eu':
				$params	='guildwars2eu';
				$game	='guildwars2';
				break;
			case 'lol':
				$params	='lol';
				$game	='lol';
				break;
			case 'runescape':
				$params	='runescape';
				$game	='runescape';
			break;
			case 'woweu':
				$params	='woweu';
				$game	='wow';	
			break;
			
			case 'wowus':
			default:
				$params	=	'wowus';
				$game	='wow';
		}
		if($_GET){
			$auto_suggest_item	=	isset($_GET['auto_suggest_item']['title'])	?	$_GET['auto_suggest_item']['title']	:	'';
			$price	=	isset($_GET['price'])	?	$_GET['price']	:	'';	
			$race	=	isset($_GET['race'])	?	$_GET['race']	:	'';	
			$mode	=	isset($_GET['mode'])	?	$_GET['mode']	:	'';	
			$character_class	=	isset($_GET['character_class'])	?	$_GET['character_class']	:	'';	
			$level	=	isset($_GET['level'])	?	$_GET['level']	:	'';	
			$gender	=	isset($_GET['gender'])	?	$_GET['gender']	:	'';	
			$faction=	isset($_GET['faction'])	?	$_GET['faction']	:	'';	
			$talent	=	isset($_GET['talent'])	?	$_GET['talent']	:	'';	
			$profession=isset($_GET['profession'])	?	$_GET['profession']	:	'';	
			$t		=	isset($_GET['t'])		?	$_GET['t']		:	'';	
			$pr		=	isset($_GET['pr'])		?	$_GET['pr']		:	'';	
			$r		=	isset($_GET['r'])		?	$_GET['r']		:	'';	
			$type	=	isset($_GET['type'])	?	$_GET['type']	:	'';	
			$game_type	=	isset($_GET['game_type'])	?	$_GET['game_type']	:	$params;	
			

			if($type != ''){
				$game_type=$type;
			}

			$xml_feed_url = 'http://vbarrack:ee69b5604bf2bf2d5e12ea57963b57e8@api.vbarrack.com/api/products.xml?game='.$game_type.'&auto_suggest_item%5Btitle%5D='.$auto_suggest_item.'&price='.$price.'&mode='.$mode.'&character_class='.$character_class.'&level='.$level.'&gender='.$gender.'&r='.$r.'&race='.$race.'&faction='.$faction.'&talent='.$talent.'&profession='.$profession.'&t='.$t.'&pr='.$pr.'&page='.$page_number.'&per_page='.$per_page;
	
		}else{

			$xml_feed_url = 'http://vbarrack:ee69b5604bf2bf2d5e12ea57963b57e8@api.vbarrack.com/api/products.xml?game='.$params."&page=$page_number&per_page=$per_page";
		}
		

		$xml	=	simplexml_load_file($xml_feed_url);
		
		$page_total	=	count($xml);
		
		if($page_total	>=	$per_page){
		
			$page_number	=	$page_number+1;
			$text			=	'Next »';
			
		}else{
			$page_number	=	$page_number-1;
			$text			=	'« Previous';

		}
		$parameter	= '?game='.$params.'&auto_suggest_item%5Btitle%5D='.$auto_suggest_item.'&price='.$price.'&mode='.$mode.'&character_class='.$character_class.'&level='.$level.'&gender='.$gender.'&r='.$r.'&race='.$race.'&faction='.$faction.'&talent='.$talent.'&profession='.$profession.'&t='.$t.'&pr='.$pr.'&pages='.$page_number.'&per_page='.$per_page;



?>


<div id="info-bar" style="padding-top: 102px; visibility: visible;">
	<div id="search">
		<div class="pp_search_container" id="pp_search_container_7560" style="  ">
			<div style="display:none" class="chrome_xp"></div>
			<form autocomplete="off" action="" method="get" class="fr_search_widget" id="fr_pp_search_widget_7560">
				<div class="ctr_search">
					<input type="text" id="pp_course_7560" onblur="if (this.value == '') {this.value = 'Search';}" onfocus="if (this.value == 'Search') {this.value = '';}" value="Search" name="rs" class="txt_livesearch">
					<span class="bt_search" id="bt_pp_search_7560">
					  <i class="icon-search"></i>
					</span>
				</div>
				
				<input type="hidden" name="search_in" value="product">
				<input type="hidden" name="search_other" value="product">
			</form>
		</div>
		<div style="clear:both;"></div>
	</div>	
</div>
<div id="content-wrapper" style="visibility: visible;">

	<!--------------------------------------------------------------------------------------------------------------------------------->
	<?php get_sidebar('blog'); ?>
	
	<ul class="products">
	<?php
		require_once('sidebar-'."$game".'.php');
		
	?>
	<?php
		foreach($xml as $key=>$value){
		
	?>
	<li class="product type-product status-publish hentry first sale outofstock">
			<a href="#" >		
			<span class="product-image-container">
				<img src="<?php echo $value->{'picture-url'}; ?>" width="211" height="280" alt="attractive man smiling and posing in the studio" class="wp-post-image image-overlay">
				<img src="<?php echo $value->{'picture-url'}; ?>" width="211" height="280" alt="attractive man posing in the studio" class="attachment-shop_catalog wp-post-image">
			</span>	
			</a>
			
			<?php  if($value->{'tag-list'}==''){$flag=0;}else{$flag=1;}?>
			<span class="product-details">
				<a href="<?php echo home_url('/');?>account/?accountid=<?php echo $value->id;    echo "&flag=$flag";   ?>" <?php if($game == 'wow'){?>class="wowtitle"<?php }?>>	
					<h3><?php echo $value->title; ?></h3>
					<span class="price"><span class="from">From: </span><del><span class="amount"><?php echo $money_unit; ?><?php echo $value->{'original-price'}; ?></span></del> <ins><span class="amount"><?php echo $money_unit; ?><?php echo $value->price; ?></span></ins></span>
				</a>
				
				
				<div class="clr"></div>
				<div class="description "><?php echo $value->summary; ?></div>
				<?php #echo home_url('/').'account/accountid/'.$value->id; ?>
				<a href="<?php echo home_url('/');?>account/?accountid=<?php echo $value->id; ?>&flag=<?php echo $flag; ?>" class="button">Read More</a>	
				<div class="clr"></div>
				<?php if($game == 'wow'){
						if($value->{'tag-list'}==''){
				?>
					<div  class=" fright"><img  src="<?php echo get_template_directory_uri(); ?>/img/requiretransfer.png" /></div>	
				<?php }else{
				?>
					<div  class=" fright"><img  src="<?php echo get_template_directory_uri(); ?>/img/premade.png" /></div>	
				<?php 
						}
					}
				?>
			
			
			</span>
			

		</li>
			
	<?php } ?>
	

		<div class="fright"><a href="<?php echo the_permalink();?><?php echo $parameter;?>"><?php echo $text;?></a></div>
	
	</ul>
	
	
	
	<?php get_sidebar('video'); ?>
	<!-- END ARTICLE -->			
</div>
<?php get_footer(); ?>