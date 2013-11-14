<?php
	switch($arr[0]){
		case	'WowUs':	
		case	'WowEu':	
			$game_name='WoW';
			break;
		case	'lol':
			$game_name='Lots of Laughs';
			break;
		case	'Runescape':
			$game_name='Runescape';
			break;
		case	'Guildwars2Us':
		case	'Guildwars2Eu':
			$game_name='Guildwars2';
			break;
		case	'Diablo3Eu':
		case	'Diablo3Us':
		case	'Diablo3Asia':
			$game_name='Diablo3';
			break;
	}
?>
<div  id="game-detail-info" class="mobile_full">
	<!-- BEGIN ARTICLE -->			
	<article class="post-2816 page type-page status-publish hentry instock">
		<div class="productPriceBox"> 
			<table border="0" class="tableBox" summary="Character Price">
				<tbody>
					<tr>
						<th colspan="2"><h4 class="blueHeading">Buy This <?php echo $game_name;?> Account Now!</h4>
						</th>
					</tr>
					<tr>
						<td>
							<p align="center" style="font-size:30px;">
							<style> 
							  .add_to_cart,.remove_from_cart{
								margin:0 0 0 60px;
								display:block;
							  }
							  .rent {
								margin:0 0 0 90px;
								display:block;
							  }
							</style>
							</p>
							<center>
								<h2 ><font style="color:#222222">Regular Price <span>USD</span> <del><?php echo $money_unit;?><?php echo $xml->{'original-price'};?></del></font></h2>
								<h1><font style="color:#FF0000">Now ONLY</font><span style="color:#FF0000"> USD</span> <font style="color:#FF0000"><?php echo $money_unit;?><?php echo $xml->price;?></font></h1> 
							</center>
							<form action="<?php echo home_url('/');?>buy" method="post"><div style="margin:0;padding:0;display:inline">
								<input id="action" name="action" type="hidden" value="add">
								<input id="id" name="id" type="hidden" value="<?php echo $xml->id; ?>">
								<input id="species" name="species" type="hidden" value="account">
								<input id="picture" name="picture_url" type="hidden" value="<?php echo $xml->{'picture-url'}; ?>">
								<input id="title" name="title" type="hidden" value="<?php echo $xml->{'title'}; ?>">
								<input id="on" 	name="on" type="hidden" value="<?php echo time(); ?>">
								<input id="price" name="price" type="hidden" value="<?php echo $xml->{'price'}; ?>">
								<input id="product_name" name="product_name" type="hidden" value="<?php echo $xml->{'product-type'};?>">
								
								
								<input alt="Buy Now" class="add_to_cart" src="<?php echo get_template_directory_uri(); ?>/img/Order_Now.png" type="image"  onclick="this.form.submit();" style="background:none;border:none;">
							</form>							
						</td>
					</tr>
				</tbody>
			</table>
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
