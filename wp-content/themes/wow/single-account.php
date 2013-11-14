<?php
/*
 Template Name:Single account
 */
get_header();
 	
	$money_unit	=	'$';
		
	#$game	=	isset($_GET['game'])	?	$_GET['game']	:	'wow';
	
	if(isset($_GET)){
		$account	=	$_GET['accountid'];
		$flag		=	$_GET['flag'];
		
		$xml_feed_url = 'http://vbarrack:ee69b5604bf2bf2d5e12ea57963b57e8@api.vbarrack.com/api/products/'.$account.'.xml';			
		$xml	=	simplexml_load_file($xml_feed_url);	
		 $acxmlurl="http://vbarrack:ee69b5604bf2bf2d5e12ea57963b57e8@api.vbarrack.com/api/products/$account/product_accessories.xml";
	/*
    	echo $acxmlurl.'<br /><pre>';
		print_r($xml);
		$acxml	=	simplexml_load_file($acxmlurl);	
		print_r($acxml	);//exit;
		
	*/
	//print_r($xml);
	}
   

?>

<div id="info-bar" style="">
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
	<div id="container">
		
	
		<div class="summary entry-summary game-detail-content">
			<form action="<?php echo home_url('/');?>buy" method="post" name="order_account_form" >            
				<input id="action" name="action" type="hidden" value="add">
				<input id="id" name="id" type="hidden" value="<?php echo $xml->id; ?>">
				<input id="species" name="species" type="hidden" value="account">
				<input id="picture" name="picture_url" type="hidden" value="<?php echo $xml->{'picture-url'}; ?>">
				<input id="title" name="title" type="hidden" value="<?php echo $xml->{'title'}; ?>">
				<input id="on" 	name="on" type="hidden" value="<?php echo time(); ?>">
				<input id="price" name="price" type="hidden" value="<?php echo $xml->{'price'}; ?>">
				<input id="product_name" name="product_name" type="hidden" value="<?php echo $xml->{'product-type'};?>">
				 
				 
				
			<?php 
				$arr=explode('Character',$xml->{'product-type'});
				if($arr[0]	==	'WowUs'	||	$arr[0]== 'WowEu'){ ?>
					<input id="extra" name="extra_species" type="hidden" value="account_wow">
				<div id="overviewRatings">
					<h2 class="blueHeading"><span><?php echo $xml->title;?></span></h2>
					<div id="overviewOvrRtng"> 
						<p><?php if($arr[0] == 'WowUs'){echo 'World Of Warcraft US';}else{ echo 'World Of Warcraft EU';}?></p>
						<span>ID #<?php echo $account;?></span>
						<?php if( $xml->mode != ''){?><p> Mode : <?php echo $xml->mode;?></p><?php }?>
						<p><?php echo $xml->{'summary'};?></p>
						<a><span class="price"><span class="from">Regular Price:</span><del><span class="amount"><?php echo $money_unit;?><?php echo $xml->{'original-price'};?></span></del> <ins><span class="amount"><?php echo $money_unit;?><?php echo $xml->price;?></span></ins></span></a>
						
					</div>
					<?php
						if($flag == 0){ 
					?>
						<div class="fright" >
							<img  src="<?php echo get_template_directory_uri(); ?>/img/requiretransfer.jpg" />
						</div>
					<?php 
						}else{
					?>
						<div class="fright">
							<img  src="<?php echo get_template_directory_uri(); ?>/img/premade.jpg" />
						</div>	
					<?php 
						}
					?>
				</div>
				<div class="hr clr"><hr></div>
				<div id="wrap_character_2d">
					<div class="item_wrap" style="text-align:center">
						   <img src="<?php echo $xml->{'picture-url'};?>">
					</div>
				</div>
				<div id="wrap_character_2d">
					<div class="item_wrap" style="text-align:center">
						   <img src="<?php echo $xml->{'second-picture-url'};?>">
					</div>
				</div>
				<div class="clear"></div>
				<h2 class="blueHeading">Description</h2>
				<div class="fright">
					<input alt="Buy Now" class="add_to_cart" src="<?php echo get_template_directory_uri(); ?>/img/Order_Now.png" type="image"  onclick="this.form.submit();" style="background:none;border:none;">
				</div>
				<div><?php echo $xml->description;?></div>
				<?php 
					}else{
				?>
				<div id="overviewRatings">
					<h2 class="blueHeading"><span><?php echo $xml->title;?></span></h2>
					<div id="overviewOvrRtng"> 
						<p><?php if($arr[0] == 'lol'){echo 'lots of laughs';}else{echo $arr[0]; }?></p>
						<span>ID #<?php echo $account;?></span>
						<?php if( $xml->mode != ''){?><p> Mode : <?php echo $xml->mode;?></p><?php }?>
						<p><?php echo $xml->{'summary'};?></p>
						<a><span class="price"><span class="from">Regular Price:</span><del><span class="amount"><?php echo $money_unit;?><?php echo $xml->{'original-price'};?></span></del> <ins><span class="amount"><?php echo $money_unit;?><?php echo $xml->price;?></span></ins></span></a>
					</div>
				</div>
				<div class="hr"></div>
				<div id="wrap_character_2d">
					<div class="item_wrap" style="text-align:center">
						   <img src="<?php echo $xml->{'picture-url'};?>">
					</div>
				</div>
				<div id="wrap_character_2d">
					<div class="item_wrap" style="text-align:center">
						   <img src="<?php echo $xml->{'second-picture-url'};?>">
					</div>
				</div>
				<div class="clear"></div>
				<h2 class="blueHeading">Description</h2>
				<div class="fright">
					<input alt="Buy Now" class="add_to_cart" src="<?php echo get_template_directory_uri(); ?>/img/Order_Now.png" type="image"  onclick="this.form.submit();" style="background:none;border:none;">
				</div>
				<div><?php echo $xml->description;?></div>
				
				
				<?php }
				
				?>
				<?php if($arr[0]	==	'WowUs'	||	$arr[0]== 'WowEu'){ ?>
				<div id="addInfo">
					<div class="yOvBox">
						<h4 class="blueHeading">Important Information</h4>
						<div>
						<h2><font face="arial,helvetica,sans-serif" size="4" color="#800000">New Payment Features</font></h2>
						<p><font face="arial,helvetica,sans-serif" size="2" color="#000000">We are now accepting Bill Me Later Service and Paypal Installment Plan when you are using Paypal to pay.</font></p>
						<p><font face="arial,helvetica,sans-serif" size="2" color="#000000">Please contact our live support operator for further information.</font></p>
						<h2><font face="arial,helvetica,sans-serif" size="4" color="#800000">100% Account Protection Guarantee</font></h2>
						<p><font face="arial,helvetica,sans-serif" size="2" color="#000000">We aimed to provide&nbsp;safe wow accounts to our customers.</font></p>
						<p><font face="arial,helvetica,sans-serif" size="2" color="#000000">Thus, all characters can be transferred to a brand new account where only YOU will&nbsp;knows the details.</font></p>
						<p><font face="arial,helvetica,sans-serif" size="2" color="#000000">That's why Vbarrack.com is the only website that truly has zero re-claim rates.</font></p>
						<h2><font face="arial,helvetica,sans-serif" size="4" color="#800000">Why Purchase the Vbarrack Security Package?</font></h2>
						<p><font face="arial,helvetica,sans-serif" size="2" color="#000000">There is no bad record on a brand new account when you purchase a character with the security package.</font></p>
						<p><font face="arial,helvetica,sans-serif" size="2" color="#000000">It does not affect the game play in your existing account.</font></p>
						<p><font face="arial,helvetica,sans-serif" size="2" color="#000000">One month free game time comes with the security package.</font></p><p><font face="arial,helvetica,sans-serif" size="1" color="#000000">*Please remove the cd-keys package during the checkout if you are going to use your own set of keys. <br>*No protection guarantee will be given by us if you use your own set of keys for account creation.</font></p>
						<h2><font face="arial,helvetica,sans-serif" size="4" color="#800000">The Character is Transferrable</font></h2>
						<p><font face="arial,helvetica,sans-serif" size="2" color="#000000">You&nbsp;are able to transfer the character to any other realm, no matter it is PVP, PVE, RPVP or RP realms. Our live support operators will guide you through&nbsp;and help you&nbsp;complete the transfer with your own payment method / our paid character transfer package ($49) after the&nbsp;order has been made.</font></p>
						<h2><font face="arial,helvetica,sans-serif" size="4" color="#800000">World of Warcraft Patch 5.0.4</font></h2>
						<p><font color="#000000"><font face="arial,helvetica,sans-serif"><font size="2">Regarding the new patch at 28th August, 2012, Account-wide Achievements, pets, and mounts, w</font><font size="2">e have no guarantee that the extra pets and mounts would appear in your new account after the account to account transfer.&nbsp;Since it&nbsp;is a new feature in World of Warcraft, the mounts and pets&nbsp;are not considered as one of the pricing model, however, they considered as extra bonus to the account you have bought.</font></font></font></p>
						<p><font face="arial,helvetica,sans-serif" size="2" color="#000000">Please be reminded that Blizzard Store Mounts are not avaliable for the required transfer character even if they are listed on the website. They are account-bounded items and unable to move to the new account.</font></p>
						<p><font color="#000000"><font face="arial,helvetica,sans-serif"><font size="2">*</font><font size="1">For more details, please contact our Live Support</font></font></font></p>
						<h2><font face="arial,helvetica,sans-serif" size="4" color="#800000">Security Concern</font></h2>
						<p><font face="arial,helvetica,sans-serif" size="2" color="#000000">Any improper ingame activities will lead to suspension of the accounts.</font></p><p><font face="arial,helvetica,sans-serif" size="2" color="#000000">Account compromise is illegal, account closure will be resulted.</font></p>
						<p><font face="arial,helvetica,sans-serif" size="2" color="#000000">Possible account termination when using illegal leveling or illegally obtained gold services.</font></p>
						</div>
					</div>
				</div>
				<?php }?>
				
				
				</form>
			</div>
		
		<?php 
			if($arr[0]	==	'WowUs'	||	$arr[0]== 'WowEu'){
				include('sidebar-gmae-wow.php');
			}else{
				include('sidebar-gmae.php');
			}	
		?>
</div>
<?php get_footer(); ?>