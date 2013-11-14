<?php
/*
 Template Name:Buy Diablo3 Item
 */
get_header();

global $post;
		$slug = get_post( $post )->post_name;
		
		$page_number	=	10;
	
		$pages	=	isset($_GET['pages'])	?	$_GET['pages']		:	1;	
		
		$type	=	isset($_GET['type'])	?	$_GET['type']		:	'Diablo3UsItem';
		$gender	=	isset($_GET['gender'])	?	$_GET['gender']		:	'';
		$character_class	=	isset($_GET['character_class'])	?	$_GET['character_class']		:	'';
		
		if($gender != ''){
			$xml_feed_url = "http://vbarrack:ee69b5604bf2bf2d5e12ea57963b57e8@api.vbarrack.com/api/items?type=$type&gender=$gender";
		}else if($gender != '' && $character_class != ''){
			$xml_feed_url = "http://vbarrack:ee69b5604bf2bf2d5e12ea57963b57e8@api.vbarrack.com/api/items?type=$type&gender=$gender&character_class=$character_class";
		}else{
			$xml_feed_url = "http://vbarrack:ee69b5604bf2bf2d5e12ea57963b57e8@api.vbarrack.com/api/items?type=$type";
		}
		
		if($type != '' || $gender != '' || $character_class != ''){
			$parameter="&type=$type&gender=$gender&character_class=$character_class";
		}
		
		
		$xml	=	simplexml_load_file($xml_feed_url);
		$page_total	=	count($xml);
		
		
?>
<script>
//<![CDATA[

    function validateFields(count){ 
        if ((document.getElementById('server_id_'+count).value != "") && (document.getElementById('character_name_'+count).value != "") && (document.getElementById('faction_'+count).value != "")){
            return true;
        } else{
            showDiv();
            return false;
        }
    }
    
    function showDiv() {
        if (document.getElementById) 
            document.getElementById('hideShow').style.display = "";
    }
    
    function showDetails(count){
        jQuery('#purchase_gold_form_'+count).toggle();
    }

//]]>
</script>
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
	<?php include('Diablo3_Item.php'); ?>
	
	<div class="item-middle mobile_full">


	<table id="tableAccomm" class="listView" border="0" cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<td id="name" width="75%"><a href="/items">Item</a></td>
				<td id="name" width="15%"><a href="/items">Price</a></td>
			</tr>
		</thead>
		<tbody>
		
			
			<?php
				$i=0;
				foreach($xml as $key=>$value){
					
					        
					if($i>=(($pages*$page_number)-$page_number) &&  $i<($pages*$page_number) ){

			?>
			<tr style="background-color:#252017;">
				<td style="padding:10px;">
				<p></p><p></p><p></p>
				
				<?php echo $value->armory;?>
				<span class="corner tl"></span>
				<span class="corner tr"></span>
				<span class="corner bl"></span>
				<span class="corner br"></span>

				</td>
				<td style="padding:10px;">
				<span class="gold_list_item" style="color:white;">USD $<?php echo $value->price;?></span>
				<img alt="Buy Now" class="add_to_cart" id="order_image_<?php echo $i;?>" onclick="showDetails(<?php echo $i;?>);" onmouseover="this.style.cursor=&quot;hand&quot;;this.style.cursor=&quot;pointer&quot;" src="<?php echo get_template_directory_uri(); ?>/img/Order_Now.png" width="75">
				</td>
			</tr>
			<tr id="purchase_gold_form_<?php echo $i;?>" style="display:none">
				<form action="<?php echo home_url('/');?>buy" method="post" name="order_gold_form" onsubmit="return validateFields(<?php echo $i;?>);">          
					<td colspan="100">
						<div style="padding:20px">
							<h2>Please fill in the server and your battletag.</h2>
							<br>
							<font color="red">*</font> Select Your Game Server: <br>
								<select id="server_id_<?php echo $i;?>" name="server[server_id]">
									<option value="">Select Server</option>
									<option value="US">US</option>
									<option value="EU">EU</option>
									<option value="Asia">Asia</option>
								</select><br>

							<font color="red">*</font> Fill in Your battle tags: <br><input id="character_name_<?php echo $i;?>" name="character_name" type="text">
						</div>
						
						<?php 
						
							preg_match('/style="background-image: url\(([^>]*).png/i',$value->armory,$reg);

							$url=$reg[1];
						?>
						<input id="action" name="action" type="hidden" value="add">
						<input id="id" name="id" type="hidden" value="<?php echo $value->id; ?>">
						<input id="species" name="species" type="hidden" value="Diablo3Item">
						<input id="picture" name="picture_url" type="hidden" value="<?php echo $url.'.png'; ?>">
						<input id="title" name="title" type="hidden" value="<?php echo $value->{'title'}; ?>">
						<input id="on" name="on" type="hidden" value="<?php echo time(); ?>">
						<input id="price" name="price" type="hidden" value="<?php echo $value->price; ?>">
						<input id="product_name" name="product_name" type="hidden" value="<?php echo $slug; ?>">

						<input alt="Buy Now" class="add_to_cart" src="<?php echo get_template_directory_uri(); ?>/img/Order_Now.png" type="image">
					
					</td>
				</form> 
			</tr>
			<?php 
					}
					$i++;					
				}
			?>
			
		</tbody>
	</table>
	<div id="pagination">
		<div style="margin-left:10px;float:left"> 
			<!-- 304 Matched, displaying <b>1 - 7</b> out of <b>304</b>-->
		</div>
		<div style="float:right">
			<div class="pagination">
			<?php 
				$page_on	=	ceil($page_total/$page_number);
			?>
			
			<?php if($pages == 1 ){?>
					<span class="disabled prev_page">« Previous</span> 
			<?php }else{ ?>
				<a href="<?php echo home_url();?>/diablo3-item/?pages=<?php echo 1?><?php echo $parameter;?>">« First page</a>
			<?php }?>
			
			<?php 
				if($page_on>5){
					$num		=	$pages+5;
					$page_num	=	1;
				}else{
					$num		=	$page_on;
					$page_num	=	1;
				}
			?>
			<?php for($z=$page_num;$z<=$num;$z++){?>
				<?php if($z == $pages){ ?>
					<span class="current"><?php echo $z;?></span>		
				<?php }else{?>
					<a href="<?php echo home_url();?>/diablo3-item/?pages=<?php echo $z;?><?php echo $parameter;?>" class="next_page"><?php echo $z;?></a>
				<?php }?>
			<?php } ?>
			

			<?php if($page_on>10){?>
				<?php echo '...';?>
				<?php for($y=($page_on-1);$y<=$page_on;$y++){?>
					<a href="<?php echo home_url();?>/diablo3-item/?pages=<?php echo $y;?><?php echo $parameter;?>" class="next_page"><?php echo $y;?></a>
				<?php }?>
			<?php }?>
			
			<?php if($pages != $page_on ){?>
				<a href="<?php echo home_url();?>/diablo3-item/?pages=<?php echo ($pages+1);?><?php echo $parameter;?>">Next »</a> 
			<?php } ?>	

			
			 		
			</div>
		</div>
		<div class="clear"></div>
	</div>
	
	</div>

	<?php get_sidebar('video'); ?>
	<!-- END ARTICLE -->				
</div>
<?php get_footer(); ?>