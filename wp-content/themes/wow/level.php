<?php
/*
 Template Name:Level
 */
get_header();
 
global $post;
		$slug = get_post( $post )->post_name;
		$params	=	'';
		$game	=	'';
		$title	=	'';
		$money_unit	=	'$';
		
		switch($slug){
			case 'diablo3':
				$params	='?type=Diablo3PowerLevel';
				$game	='Diablo3PowerLevel';
				$title	='Purchase Diablo 3 Power Leveling';
				break;
			case 'guildwars2':
				$params	='?type=Guildwars2PowerLevel';
				$game	='Guildwars2PowerLevel';
				$title	='Purchase Guild Wars 2 Power Leveling';
				break;
			case 'wow':
			default:
				$params	='?type=WowPowerLevel';
				$game	='WowPowerLevel';
				$title	='Purchase WoW Power Leveling';	
		}
		
		$xml_feed_url	=	'http://vbarrack:ee69b5604bf2bf2d5e12ea57963b57e8@api.vbarrack.com/api/golds.xml'.$params;
		$xml	=	simplexml_load_file($xml_feed_url);

?>
<script>
//<![CDATA[

    function validateFields(count){ 
		
        if ((document.getElementById('server_id_'+count) && document.getElementById('server_id_'+count).value == "") || (document.getElementById('character_name_'+count) && document.getElementById('character_name_'+count).value == "") || (document.getElementById('faction_'+count) && document.getElementById('faction_'+count).value == "")){
            showDiv();
            return false;
        } else{
            return true;
        }
    }
    
    function showDiv() {
        if (document.getElementById) 
            document.getElementById('hideShow').style.display = "";
    }
    
    function showDetails(count){
        document.getElementById('purchase_gold_form_'+count).style.display = "";
        document.getElementById('order_image_'+count).style.visibility = 'hidden';
		
		
    }

//]]>
</script>
<div id="info-bar" style="padding-top: 102px; visibility: visible;">
	<div id="search">
		<div class="pp_search_container" id="pp_search_container_7560" >
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

	<?php get_sidebar('blog'); ?>
	
	<ul class="products">
	<div id="mainHeading" class="aion">
		<h1 class="floatLeft">
		<div style="padding:0 0 10px 460px;position:absolute">
		<div id="flashcontent">
		</div>			
		</div><?php echo $title;?>
		</h1>
		<div class="clear"></div>
	</div>
	<table id="tableAccomm" class="listView" border="0" cellpadding="0" cellspacing="0">
		<thead>
		  <tr>
			<td id="name" width="35%"><a href="#">title</a></td>	
			<td id="name" width="15%"><a href="#">Price</a></td>
			<td width="15%">&nbsp;</td>
			
		  </tr>
		</thead>
		<tbody>
			<script src="<?php echo get_template_directory_uri(); ?>/js/product_index.js" type="text/javascript"></script> 
			<div id="hideShow" class="error" style="display:none">
				<h3>Before purchase, please fill in the required details.</h3>
			</div>
			<?php
				$i=0;
				foreach($xml as $key=>$value){
			?>
			<tr >
				<td><span class="gold_list_item"><?php echo $value->title; ?></span>
				<p></p>
				<p><?php echo $value->description; ?></p>
				<p></p>
				</td>
				<td><span class="gold_list_item"><?php echo $money_unit;?><?php echo $value->price;?></span></td>
				<td>
					<img alt="Buy Now" class="add_to_cart" id="order_image_<?php echo $i; ?>" src="<?php echo get_template_directory_uri(); ?>/img/Order_Now.png" width="75"   onclick="showDetails(<?php echo $i;?>);" onmouseover="this.style.cursor='hand';this.style.cursor='pointer'" style="cursor: pointer;">
				</td> 
				
				<tr id="purchase_gold_form_<?php echo $i;?>" style="display:none;background-image: url(http://www.vbarrack.com/images/bookers/backgrounds/bgstripes.gif); background-attachment: scroll; background-color: transparent; background-position: 0px 0px; background-repeat: repeat repeat; ">
				<form action="<?php echo home_url('/');?>buy" method="post" name="order_gold_form" onsubmit="return validateFields(<?php echo $i;?>);" style="background-image: url(http://www.vbarrack.com/images/bookers/backgrounds/bgstripes.gif); background-attachment: scroll; background-color: transparent; background-position: 0px 0px; background-repeat: repeat repeat;">            
				<?php if($game	== 'WowPowerLevel'){?>
			
			<td colspan="3" >
              <div style="padding:20px">
				
                <h2> Step 1:  Power Level Option to Choose</h2>
                
                <table>
                  
                  <tbody><tr >
                    <td >
                        <h4><input checked="checked" id="power_level_accessory_19" name="power_level_accessory" type="radio" value="19"> <font color="#3366ff">Start PowerLeveling on a New Account which will be registered under your name with additional security. It will not affect your daily game play. You can transfer the character to your own account after the powerleveling.</font> - $99.00</h4>
                    </td>
                  </tr>
                  
                  <tr  >
                    <td  >
                        <h4><input checked="checked" id="power_level_accessory_20" name="power_level_accessory" type="radio" value="20"> <font color="#3366ff">Start PowerLeveling directly on your existing account.</font> - $0.00</h4>
                    </td>
                  </tr>
                  
                  
                </tbody></table>
				
				
                
                <h2>Step 2: Add Gold</h2>
                
                <font color="red">*</font> Do you need any Gold?: <br><select id="add_gold" name="add_gold"><option value="">No Thanks</option>
<option value="12020" selected="selected">WoW Gold EU $5,000</option>
<option value="12021">WoW Gold EU $5,000</option>
<option value="12022">WoW Gold EU $5,000</option>
<option value="12023">WoW Gold EU $10,000</option>
<option value="12024">WoW Gold EU $15,000</option>
<option value="12025">WoW Gold EU $20,000</option>
<option value="39742">WoW Gold EU $30,000</option>
<option value="39743">WoW Gold EU $50,000</option>
<option value="39744">WoW Gold EU $80,000</option>
<option value="39745">WoW Gold EU $100,000</option>
<option value="38085">GW 2 US Gold - 15 Gold</option>
<option value="39737">WoW Gold US $30,000</option>
<option value="12014">WoW Gold US $5,000</option>
<option value="12015">WoW Gold US $5,000</option>
<option value="12016">WoW Gold US $10,000</option>
<option value="12017">WoW Gold US $10,000</option>
<option value="12018">WoW Gold US $15,000</option>
<option value="12019">WoW Gold US $20,000</option>
<option value="18430">WoW Gold US $20,000</option>
<option value="27859">WoW 60 Days Game Time</option>
<option value="37071">WoW Gold US $4,000</option>
<option value="39738">WoW Gold US $30,000</option>
<option value="39739">WoW Gold US $50,000</option>
<option value="39740">WoW Gold US $80,000</option>
<option value="39741">WoW Gold US $100,000</option></select><br>
				
				
				

				
                <h2>Step 3: Add Justice Points</h2>
                <table>
                  
                  <tbody><tr style="background-color: white;">
                    <td >
                        <input checked="checked" id="add_justice_31377" name="add_justice" type="radio" value="31377"> 
                    </td>
                    <td >1,000 Justice Points ( 5 Days )</td>
                    <td >We will collect 1,000 Justice Points for you.</td>
                    <td >$19.00</td>
                  </tr>
                  
                  <tr>
                    <td>
                        <input checked="checked" id="add_justice_31378" name="add_justice" type="radio" value="31378"> 
                    </td>
                    <td>2,000 Jsutice Points ( 6 Days )</td>
                    <td>We will collect 2,000 Justice Points for you.</td>
                    <td>$39.00</td>
                  </tr>
                  
                  <tr>
                    <td>
                        <input checked="checked" id="add_justice_31379" name="add_justice" type="radio" value="31379"> 
                    </td>
                    <td>3,000 Justice Points ( 7 days )</td>
                    <td>We will collect 3,000 Justice Points for you.</td>
                    <td>$59.00</td>
                  </tr>
                  
                  <tr style="background-color: white;">
                    <td >
                        <input checked="checked" id="add_justice_31380" name="add_justice" type="radio" value="31380"> 
                    </td>
                    <td >4,000 Justice Points ( 8 Days )</td>
                    <td >We will collect 4,000 Justice Points</td>
                    <td  >$69.00</td>
                  </tr>
                  
                  <tr style="background-color: white;">
                    <td><input id="add_justice_" name="add_justice" type="radio" value=""> </td><td colspan="3" style="background-image: url(http://www.vbarrack.com/images/bookers/backgrounds/bgtdgrad.jpg); background-attachment: scroll; background-color: rgb(249, 249, 249); background-position: 100% 100%; background-repeat: repeat no-repeat;">No Thanks.</td>
                  </tr>
                </tbody></table>
				
              </div>
			  
					<input id="action" name="action" type="hidden" value="add">
					<input id="id" name="id" type="hidden" value="<?php echo $value->id; ?>">
					<input id="game_type" name="game_type" type="hidden" value="<?php echo $slug; ?>">
					<input id="species" name="species" type="hidden" value="leveling">
					<input id="title" name="title" type="hidden" value="<?php echo $value->title; ?>">
					<input id="price" name="price" type="hidden" value="<?php echo $value->price; ?>">
					<input id="on" name="on" type="hidden" value="<?php echo time(); ?>">
               		<input alt="Buy Now" class="add_to_cart" src="<?php echo get_template_directory_uri(); ?>/img/Order_Now.png" type="image"  onclick="validateFields(<?php echo $i;?>);" style="background:none;border:none;text-align: center;">

				</td>
              
            
				
				<?php } ?>
				
				<?php if($game	!='WowPowerLevel'){  ?> 
				<td  colspan="3" style="background-image: url(http://www.vbarrack.com/images/bookers/backgrounds/bgstripes.gif); background-attachment: scroll; background-color: transparent; background-position: 0px 0px; background-repeat: repeat repeat;text-align: center;">
						<input id="action" name="action" type="hidden" value="add">
						<input id="id" name="id" type="hidden" value="<?php echo $value->id; ?>">
						<input id="game_type" name="game_type" type="hidden" value="<?php echo $slug; ?>">
						<input id="species" name="species" type="hidden" value="leveling">
						<input id="title" name="title" type="hidden" value="<?php echo $value->title; ?>">
						<input id="price" name="price" type="hidden" value="<?php echo $value->price; ?>">
						<input id="on" name="on" type="hidden" value="<?php echo time(); ?>">
						<input alt="Buy Now" class="add_to_cart" src="<?php echo get_template_directory_uri(); ?>/img/Order_Now.png" type="image"  onclick="validateFields(<?php echo $i;?>);" style="background:none;border:none;">
				</td>
				<?php  } ?>
				</form>
				</tr>
				
				
				
				
				
				
				
				
				
			
			</tr>
			<?php $i++;
				}
			?>
			
		</tbody>
	</table>
	</ul>

	<div id="content">		
	<!-- BEGIN ARTICLE -->			
		<article class="post-2816 page type-page status-publish hentry instock">
		<!-- BEGIN ENTRY HEADER -->
			<div class="videoall">
				<div class="">
					<img src="<?php echo get_template_directory_uri(); ?>/img/video-words99ac.png">
					<a href="" style="float:right;"><img src="<?php echo get_template_directory_uri(); ?>/img/enlarge_button.jpg"></a>
				</div>
				<div class="">
					<img class="video" src="<?php echo get_template_directory_uri(); ?>/img/video.png">
				</div>
			</div>

		<div class="fpGuides">
		<ul>
			<li>
			<h2>24x7 Online Support</h2>
			<div style="float:left;width:120px;">
			<div>
			<table cellspacing="2" cellpadding="2" border="0">
			<tbody>
			<tr>
			<td align="center"></td>
			<td align="center">
			<a id="_lpChatBtn" onclick="lpButtonCTTUrl = 'https://server.iad.liveperson.net/hc/25905816/?cmd=file&amp;file=visitorWantsToChat&amp;site=25905816&amp;SESSIONVAR!skill=Vbarrack.com&amp;imageUrl=https://server.iad.liveperson.net/hcp/Gallery/ChatButton-Gallery/English/Small/2c&amp;referrer='+escape(document.location); lpButtonCTTUrl = (typeof(lpAppendVisitorCookies) != 'undefined' ? lpAppendVisitorCookies(lpButtonCTTUrl) : lpButtonCTTUrl); lpButtonCTTUrl = ((typeof(lpMTag)!='undefined' &amp;&amp; typeof(lpMTag.addFirstPartyCookies)!='undefined')?lpMTag.addFirstPartyCookies(lpButtonCTTUrl):lpButtonCTTUrl);window.open(lpButtonCTTUrl,'chat25905816','width=475,height=400,resizable=yes');return false;" target="chat25905816" href="https://server.iad.liveperson.net/hc/25905816/?cmd=file&amp;file=visitorWantsToChat&amp;site=25905816&amp;byhref=1&amp;SESSIONVAR!skill=Vbarrack.com&amp;imageUrl=https://server.iad.liveperson.net/hcp/Gallery/ChatButton-Gallery/English/Small/2c">
			</a></td>
			</tr>
			<tr>
			<td> </td>
			<td align="center">
			<div style="margin-top:5px;">
			<span style="font-size:10px; font-family:Arial, Helvetica, sans-serif;">
			<a target="_blank" style="text-decoration:none; color:#000" href="#">
			<b>Live Chat</b>
			</a>
			<span style="color:#000"> by </span>
			<a target="_blank" style="text-decoration:none; color:#FF9900" href="#">LivePerson</a>
			</span>
			</div>
			</td>
			</tr>
			<tr>
			<td> </td>
			<td align="center">
			<a onclick="javascript:window.open('https://solutions.liveperson.com/customer-service/?site=25905816&amp;domain=server.iad.liveperson.net&amp;origin=chatbutton&amp;referrer='+escape(document.location));return false;" target="_blank" href="https://solutions.liveperson.com/customer-service/?site=25905816&amp;domain=server.iad.liveperson.net&amp;origin=chatbutton">
			<img border="0" alt="Customer Service Rating by LivePerson" name="hcRating" src="https://server.iad.liveperson.net/hc/25905816/?cmd=rating&amp;site=25905816&amp;type=indicator">
			</a>
			</td>
			</tr>
			</tbody>
			</table>
			</div>
			</div>
			<p class="small quiet bottom"> As part of an ongoing efforts to offer the best in services and support to our valued customers, our live help service is available 24 hours, 7 days a week. Our customer representative teams are experienced MMO players which can provide tailor made solutions for our customers' questions. </p>
			</li>
			<li>
			<h2>Godaddy® SSL Verified</h2>
			<div style="float:left;padding-right:8px;">
			<span id="siteseal">
			<script src="https://seal.godaddy.com/getSeal?sealID=hWuyheNxoOqMZS0B2ZViL2Y5EKkFfGnYfn6f51HaWZ2lDvFrhDh2aV9" type="text/javascript">

			</script><img style="cursor:pointer;cursor:hand" width="132" height="31" src="https://seal.godaddy.com/images/3/siteseal_gd_3_h_l_m.gif" onclick="verifySeal();">
			</span>
			</div>
			<p class="small quiet bottom">
			Godaddy is a trusted provider of Internet infrastructure services for the networked world. Godaddy protects more than one million Web servers with digital certificates.
			<span class="genLink"></span>
			</p>
			</li>
			<li>
			<h2>Site secured by McAfee® </h2>
			<a href="#" target="_blank">
			<img border="0" height="54" oncontextmenu="alert('Copying Prohibited by Law - McAfee Secure is a Trademark of McAfee, Inc.'); return false;" alt="McAfee Secure sites help keep you safe from identity theft, credit card fraud, spyware, spam, viruses and online scams" src="<?php echo get_template_directory_uri(); ?>/img/23.gif" style="float:left;padding-right:8px" weight="94">
			</a>
			<p class="small quiet bottom">McAfee, Inc. is the world’s largest dedicated security technology company. McAfee delivers comprehensive protection for small and mid-sized businesses in one smart, simple, and secure solution. </p>
			</li>
			<li>
			<h2>Financial Support in NewZealand</h2>
			<img height="40px" style="float:left;padding-right:8px" src="<?php echo get_template_directory_uri(); ?>/img/nz.png">
			<p class="small quiet bottom"> VBarrack™ Limited is a registered business with financial assistance from New Zealand team-members selling MMO Characters and Accounts that are exclusively purchased from the original players. </p>
			</li>
			<li>
			<h2>Founded in Canada</h2>
			<img height="40px" style="float:left;padding-right:8px" src="<?php echo get_template_directory_uri(); ?>/img/ca.png">
			<p class="small quiet bottom"> VBarrack™ was founded in Canada, to help provide services to gamers of every level and ability to help them reach their potential. </p>
			</li>
			<li>
			<h2>100% Security Guaranteed</h2>
			<a href="#">
			<img style="float:left;padding-right:8px" src="<?php echo get_template_directory_uri(); ?>/img/star.png?1366900430" alt="Star">
			</a>
			<p class="small quiet bottom"> When you purchase anything from VBarrack™ , you can be assured that we have taken every precaution possible to ensure your personal data and payment details remain safe and secure. </p>
			</li>
			<li>
	<span></span>
	<div class="clear"></div>
	</li>
		</ul>
		</div>
		</article>
	</div>

	<!-- END ARTICLE -->			
</div>
<?php get_footer(); ?>