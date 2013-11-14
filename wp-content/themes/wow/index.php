<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

		<!-- BEGIN INFO BAR -->
		<div id="info-bar">
			<div id="search">
				<div class="pp_search_container" id="pp_search_container_7560" style="  ">
					<div style="display:none" class="chrome_xp"></div>
					<form autocomplete="off" action="" method="get" class="fr_search_widget" id="fr_pp_search_widget_7560">
						<div class="ctr_search">
						    <input type="text" id="pp_course_7560" onblur="if (this.value == '') {this.value = 'Search';}" onfocus="if (this.value == 'Search') {this.value = '';}" value="Search" name="rs" class="txt_livesearch" />
						    <span class="bt_search" id="bt_pp_search_7560">
							  <i class="icon-search"></i>
							</span>
						</div>
						
						<input type="hidden" name="search_in" value="product"  />
						<input type="hidden" name="search_other" value="product"  />
					</form>
				</div>
				<div style="clear:both;"></div>
			</div>	
		</div>		
		<!-- END INFO BAR -->		
		

		<!--------------------------------------------------------------->
		<!-- BEGIN PAGE WRAPPER -->	 					
		<!-- BEGIN CONTENT WRAPPER -->
	   <div id="content-wrapper">

	     <!--------------------------------------------------------------------------------------------------------------------------------->
			<aside id="sidebar">
						<div id="recent-posts-2" class="widget widget_recent_entries">		
							<h2 class="widgettitle">Virtual Barrack</h2>		
							<ul>
								<li><a href="#" title="Standard post with featured image">Standard post with featured image</a></li>
								<li><a href="#" title="Post with styling">Post with styling</a></li>
								<li><a href="#" title="Post with comments">Post with comments</a></li>
								<li><a href="#" title="Post with left sidebar">Post with left sidebar</a></li>
								<li><a href="#" title="Protected: Password protected post">Protected: Password protected post</a></li>
							</ul>
						</div>
						<div id="categories-2" class="widget widget_categories">
							<h2 class="widgettitle">Categories</h2>		
							<ul>
								<li class="cat-item cat-item-18"><a href="#" title="View all posts filed under Blog">Blog</a></li>
								<li class="cat-item cat-item-278"><a href="#" title="View all posts filed under News">News</a></li>
								<li class="cat-item cat-item-279"><a href="#" title="View all posts filed under Uncategorized">Uncategorized</a></li>
							</ul>
						</div>
						<div id="archives-2" class="widget widget_archive">
							<h2 class="widgettitle">Archives</h2>		
							<ul>
							<li><a href='#' title='July 2013'>July 2013</a></li>
							<li><a href='#' title='May 2013'>May 2013</a></li>
							<li><a href='#' title='October 2012'>October 2012</a></li>
							<li><a href='#' title='July 2012'>July 2012</a></li>
							</ul>
						</div>
			</aside>
		
	        <ul class="products">
						<li class="post-1865 product type-product status-publish hentry first sale outofstock">
							<a href="#">		
								<span class="product-image-container">
								<img src="img/1_small.jpg" data-rel="http://sell.wpengine.com/wp-content/uploads/2013/07/photodune-3032997-attractive-man-smiling-and-posing-in-the-studio-s-422x560.jpg" width="211" height="280" alt="attractive man smiling and posing in the studio" class="wp-post-image image-overlay" />
								<img src="img/1_small.jpg" data-rel="http://sell.wpengine.com/wp-content/uploads/2013/07/photodune-3033000-attractive-man-posing-in-the-studio-s-422x560.jpg" width="211" height="280" alt="attractive man posing in the studio" class="attachment-shop_catalog wp-post-image" />
								</span>	
							</a>
							<span class="product-details">
								<a href="#">	
									<h3>Black Jacket</h3>		
									<div class="star-rating" title="Rated 4.00 out of 5"><span style="width:80%"><strong class="rating">4.00</strong> out of 5</span></div>
									<span class="price"><del><span class="amount">&pound;59.99</span></del> <ins>
									<span class="amount">&pound;39.99</span></ins></span>
								</a>
								<a href="#" class="button">Read More</a>	
							</span>
						</li>
				
						<li class="post-1838 product type-product status-publish hentry featured instock">
							<a href="#">
								<span class="product-image-container">
								<img src="img/36633_small.jpg" data-rel="http://sell.wpengine.com/wp-content/uploads/2013/07/photodune-3232843-fashion-shoot-with-male-model-s-422x560.jpg" width="211" height="280" alt="Fashion shoot with male model" class="wp-post-image image-overlay" />
								<img src="img/36633_small.jpg" data-rel="http://sell.wpengine.com/wp-content/uploads/2013/07/photodune-3232853-fashion-shoot-with-male-model-s-422x560.jpg" width="211" height="280" alt="Fashion shoot with male model" class="attachment-shop_catalog wp-post-image" /></span>	
							</a>
						   <span class="product-details">
							<a href="#">
								<h3>Black Leather Jacket</h3>		
								<div class="star-rating" title="Rated 3.00 out of 5"><span style="width:60%"><strong class="rating">3.00</strong> out of 5</span></div>
								<span class="price"><span class="amount">&pound;99.99</span></span>
							</a>
						   <a href="#" rel="nofollow" data-product_id="1838" data-product_sku="CWD001" class=" button product_type_variable">Select options</a>
						  </span>
					    </li>
								
					   <li class="post-1978 product type-product status-publish hentry sale featured instock">
							<a href="#">	
								<span class="onsale">Sale!</span>
								<span class="product-image-container">
								<img src="img/barbarian.jpg"  width="211" height="280" alt="Fashion young businessman black suit casual tie" class="wp-post-image image-overlay" />
								<img src="img/barbarian.jpg"  width="211" height="280" alt="Fashion young businessman black suit casual tie" class="attachment-shop_catalog wp-post-image" /></span>	
							</a>
							<span class="product-details">
								<a href="#">
									<h3>Black Suit</h3>
						        	<span class="price"><span class="from">From: </span><del><span class="amount">&pound;119.99</span></del> <ins><span class="amount">&pound;99.99</span></ins></span>
								</a>
							   <a href="" rel="nofollow" data-product_id="1978" data-product_sku="PE1000" class=" button product_type_variable">Select options</a>
							</span>
						</li>
								
						<li class="post-1842 product type-product status-publish hentry last sale instock">
							<a href="#">	
							<span class="onsale">Sale!</span>
							<span class="product-image-container">
							<img src="img/demonhunter.jpg"  width="211" height="280" alt="Fashion shoot with male model" class="wp-post-image image-overlay" />
							<img src="img/demonhunter.jpg"  width="211" height="280" alt="Fashion shoot with male model" class="attachment-shop_catalog wp-post-image" /></span>	
							</a>
							  <span class="product-details">
								<a href="#">
								<h3>Blue Denim Shirt</h3>		
								<div class="star-rating" title="Rated 4.50 out of 5"><span style="width:90%"><strong class="rating">4.50</strong> out of 5</span></div>
								<span class="price"><span class="from">From: </span><del><span class="amount">&pound;25.99</span></del> <ins><span class="amount">&pound;15.99</span></ins></span>
								</a>
								<a href="#" rel="nofollow" data-product_id="1842" data-product_sku="CMS413" class=" button product_type_variable">Select options</a>
							 </span>
						</li>
						<li class="post-1863 product type-product status-publish hentry first instock">
							<a href="#">
							<span class="product-image-container">
							<img src="img/36633_small.jpg"  width="211" height="280" alt="sexy brunette woman" class="wp-post-image image-overlay" />
							<img src="img/36633_small.jpg"  width="211" height="280" alt="sexy brunette woman" class="attachment-shop_catalog wp-post-image" /></span>	
							</a>
					
							<span class="product-details">
								<a href="#">
									<h3>Blue Jean Jacket</h3>
									<span class="price"><span class="amount">&pound;65.99</span></span>
								</a>
								<a href="#" rel="nofollow" data-product_id="1863" data-product_sku="AIK3291" class=" button product_type_variable">Select options</a>
							</span>
						</li>
								
						<li class="post-1793 product type-product status-publish hentry featured instock">
							<a href="#">
								<span class="product-image-container">
								<img src="img/demonhunter.jpg" width="211" height="280" alt="attractive man posing in the studio &#8211; full body" class="attachment-shop_catalog wp-post-image" /></span>	
							</a>
							<span class="product-details">
								<a href="#">
									<h3>Blue Sweatshirt</h3>
									<span class="price"><span class="amount">&pound;33.99</span></span>
								</a>
								<a href="#" rel="nofollow" data-product_id="1793" data-product_sku="BT64832" class="add_to_cart_button button product_type_simple">Add to cart</a>
							</span>	
						</li>
								
						<li class="post-1840 product type-product status-publish hentry instock">	
							<a href="#">
								<span class="product-image-container">
								<img src="img/imgdemonhunter.jpg"  width="211" height="280" alt="Good looking young man" class="attachment-shop_catalog wp-post-image" /></span>	
							</a>
							<span class="product-details">
								<a href="#">
									<h3>Brown Jacket</h3>		
							   <div class="star-rating" title="Rated 3.00 out of 5"><span style="width:60%"><strong class="rating">3.00</strong> out of 5</span></div>
							   <span class="price"><span class="amount">&pound;16.99</span></span>
								</a>
								<a href="#" rel="nofollow" data-product_id="1840" data-product_sku="CMJ002" class="add_to_cart_button button product_type_simple">Add to cart</a>
							</span>
						</li>
								
						<li class="post-2030 product type-product status-publish hentry last instock">
							<a href="#">
								<span class="product-image-container">
								<img src="img/Untitled_small.jpg"  width="211" height="280" alt="photodune-4780803-well-groomed-and-styled-male-model-s" class="attachment-shop_catalog wp-post-image" /></span>	
							</a>
							<span class="product-details">
								<a href="#">
									<h3>Cream Cardigan</h3>
								<span class="price"><span class="amount">&pound;25.99</span></span>
								</a>
								<a href="#" rel="nofollow" data-product_id="2030" data-product_sku="" class=" button product_type_variable">Select options</a>
							</span>
						</li>
								
						<li class="post-2763 product type-product status-publish hentry first sale instock">
							<a href="#">	
							<span class="onsale">Sale!</span>
							<span class="product-image-container">
							<img src="img/witchdoctor.jpg"  width="211" height="280" alt="sexy fashion male model dressed elegant &#8211; casual posing against" class="wp-post-image image-overlay" />
							<img src="img/witchdoctor.jpg"  width="211" height="280" alt="sexy fashion male model dressed elegant &#8211; casual posing against" class="attachment-shop_catalog wp-post-image" /></span>	
							</a>
							<span class="product-details">
								<a href="#">
									<h3>Dark Red Suit</h3>
								   <span class="price"><del><span class="amount">&pound;89.99</span></del> <ins><span class="amount">&pound;77.99</span></ins></span>
								</a>
							<a href="#" rel="nofollow" data-product_id="2763" data-product_sku="DR43019" class="add_to_cart_button button product_type_simple">Add to cart</a>
							</span>
						</li>
								
						<li class="post-2716 product type-product status-publish hentry instock">
							<a href="#">
								<span class="product-image-container">
								<img src="img/wizard.jpg"  width="211" height="280" alt="Fashion Man" class="wp-post-image image-overlay" />
								<img src="img/wizard.jpg"  width="211" height="280" alt="Fashion Man" class="attachment-shop_catalog wp-post-image" /></span>	
							</a>
							<span class="product-details">
								<a href="#">
									<h3>Green Coat</h3>
									<span class="price"><span class="amount">&pound;65.99</span></span>
								</a>
							<a href="#" rel="nofollow" data-product_id="2716" data-product_sku="" class=" button product_type_variable">Select options</a>
							</span>
						</li>					
			</ul>

			<div id="content">		
				<!-- BEGIN ARTICLE -->			
					<article class="post-2816 page type-page status-publish hentry instock">
						<!-- BEGIN ENTRY HEADER -->
							<div class="videoall">
							    <div class="">
								<img src="img/video-words99ac.png">
								<a href="" style="float:right;"><img src="img/enlarge_button.jpg"></a>
								</div>
								<div class="">
								<img class="video" src="img/video.png">
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
								<a id="_lpChatBtn" onclick="lpButtonCTTUrl = 'https://server.iad.liveperson.net/hc/25905816/?cmd=file&file=visitorWantsToChat&site=25905816&SESSIONVAR!skill=Vbarrack.com&imageUrl=https://server.iad.liveperson.net/hcp/Gallery/ChatButton-Gallery/English/Small/2c&referrer='+escape(document.location); lpButtonCTTUrl = (typeof(lpAppendVisitorCookies) != 'undefined' ? lpAppendVisitorCookies(lpButtonCTTUrl) : lpButtonCTTUrl); lpButtonCTTUrl = ((typeof(lpMTag)!='undefined' && typeof(lpMTag.addFirstPartyCookies)!='undefined')?lpMTag.addFirstPartyCookies(lpButtonCTTUrl):lpButtonCTTUrl);window.open(lpButtonCTTUrl,'chat25905816','width=475,height=400,resizable=yes');return false;" target="chat25905816" href="https://server.iad.liveperson.net/hc/25905816/?cmd=file&file=visitorWantsToChat&site=25905816&byhref=1&SESSIONVAR!skill=Vbarrack.com&imageUrl=https://server.iad.liveperson.net/hcp/Gallery/ChatButton-Gallery/English/Small/2c">
								</td>
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
								<a onclick="javascript:window.open('https://solutions.liveperson.com/customer-service/?site=25905816&domain=server.iad.liveperson.net&origin=chatbutton&referrer='+escape(document.location));return false;" target="_blank" href="https://solutions.liveperson.com/customer-service/?site=25905816&domain=server.iad.liveperson.net&origin=chatbutton">
								<img border="0" alt="Customer Service Rating by LivePerson" name="hcRating" src="https://server.iad.liveperson.net/hc/25905816/?cmd=rating&site=25905816&type=indicator">
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
								
								</script>
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
								<img border="0" height="54" oncontextmenu="alert('Copying Prohibited by Law - McAfee Secure is a Trademark of McAfee, Inc.'); return false;" alt="McAfee Secure sites help keep you safe from identity theft, credit card fraud, spyware, spam, viruses and online scams" src="img/23.gif" style="float:left;padding-right:8px" weight="94">
								</a>
								<p class="small quiet bottom">McAfee, Inc. is the world’s largest dedicated security technology company. McAfee delivers comprehensive protection for small and mid-sized businesses in one smart, simple, and secure solution. </p>
								</li>
								<li>
								<h2>Financial Support in NewZealand</h2>
								<img height="40px" style="float:left;padding-right:8px" src="img/nz.png">
								<p class="small quiet bottom"> VBarrack™ Limited is a registered business with financial assistance from New Zealand team-members selling MMO Characters and Accounts that are exclusively purchased from the original players. </p>
								</li>
								<li>
								<h2>Founded in Canada</h2>
								<img height="40px" style="float:left;padding-right:8px" src="img/ca.png">
								<p class="small quiet bottom"> VBarrack™ was founded in Canada, to help provide services to gamers of every level and ability to help them reach their potential. </p>
								</li>
								<li>
								<h2>100% Security Guaranteed</h2>
								<a href="#">
								<img style="float:left;padding-right:8px" src="img/star.png?1366900430" alt="Star">
								</a>
								<p class="small quiet bottom"> When you purchase anything from VBarrack™ , you can be assured that we have taken every precaution possible to ensure your personal data and payment details remain safe and secure. </p>
								</li>
								<li>
								<span></span>
								<div class="clear"></div>
								</li>
								</ul>
								</div>
								</div>
					</article>
				<!-- END ARTICLE -->			
			</div>
         <!----------------------------------------------------------------->
		</div>
		<!-- END CONTENT WRAPPER -->	
		<!-- END PAGE WRAPPER -->		



<?php get_footer(); ?>