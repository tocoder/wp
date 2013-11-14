<?php
/*
 Template Name:Buy
*/
get_header();
session_start(); 
$sessionid			=	session_id();

// golds general
$action		=	isset($_POST['action'])		?	$_POST['action']	:	'';

$autoid		=	isset($_POST['autoid'])		?	$_POST['autoid']	:	'';
$id			=	isset($_POST['id'])			?	$_POST['id']		:	'';
$product_name=	isset($_POST['product_name'])?	$_POST['product_name']:	'';
$species	=	isset($_POST['species'])	?	$_POST['species']	:	'';
$price		=	isset($_POST['price'])		?	$_POST['price']		:	'';

$on			=	isset($_POST['on'])			?	$_POST['on']		:	'';

$character_name	=	isset($_POST['character_name'])			?	$_POST['character_name']		:	'';
$server_id		=	isset($_POST['server']['server_id'])	?	$_POST['server']['server_id']	:	'';
$faction	=	isset($_POST['faction'])	?	$_POST['faction']	:	'';


$money_unit	=	'$';
$money_country='USD';

//account		
$title			=	isset($_POST['title'])			?	$_POST['title']			:	'';
$extra_species	=	isset($_POST['extra_species'])	?	$_POST['extra_species']	:	'';
$picture_url	=	isset($_POST['picture_url'])	?	$_POST['picture_url']	:	'';

$commit			=	isset($_POST['commit'])			?	$_POST['commit']		:	'';

$current_user =  wp_get_current_user(); 


if(isset($_POST['exaction']))
{
  if($_POST['exaction']!='' && $_POST['productid']!='' && $_POST['aid']!='')
  {
	$pid=$_POST['productid'];
	$acid=$_POST['aid'];
	     $sql	 =	"";
		$sql	.=	" SELECT * FROM wp_buy where  ";
		$sql	.=	"  session_id = '$sessionid' ";
		$sql	.=	" and product_id = '$pid'";
		
		if($current_user->data != NULL && $current_user->ID >0 && $sessionid != ''){

		$sql	 =	"";
		$sql	.=	" SELECT * FROM wp_buy where   ";
		$sql	.=	"    id = '{$current_user->ID}' ";
		$sql	.=	" and product_id = '$pid'";
		
		}
		 
		$my =$wpdb->get_row( $sql );	
		 
		if($my->autoid)
		{  
		   if($_POST['exaction']=='addextra')
		   {
		    if($my->accessories!='')
			{
		    $arr=explode(',',$my->accessories);
			$arr[]=$acid;
			$arr=array_unique($arr);
			}
			else
			$arr=Array($acid);
			 
			if(count($arr))
		   {
		     $es=implode(',',$arr); 
			 $product_price=0+$my->{'product_price'}+$_POST['aprice'];
			 
			 $wpdb->get_results("update wp_buy set accessories='$es',product_price='$product_price' where  autoid=".$my->autoid);
		   }
		   }
		   if($_POST['exaction']=='removeextra')
		   {
		    if($my->accessories!='')
			{
			$arr=array();
		    $arrs=explode(',',$my->accessories);
			foreach($arrs as $v)
			 {
			   if($v!=$acid)
			   $arr[]=$v;
			 }
			
			 
			
			if(count($arr))
		   {
		     $es=implode(',',$arr);  }
			 else
			 {
			  $es='';
			 }
			 $product_price=0+$my->{'product_price'}-$_POST['aprice'];
			 $wpdb->get_results("update wp_buy set accessories='$es',product_price='$product_price' where autoid=".$my->autoid);
		 
		   }
		   }
		}
		
		
  }
}

//session shopping cart
// if not log in add  insert data 
// use session id  be primary key
if($current_user->data == NULL && $action !=  ''){

		

		switch($action){
		case	'add':
		
			$sql	 =	"";

			$sql	.=	" SELECT product_id FROM wp_buy where 1 ";
			
			$sql	.=	" and product_id = $id ";

			$wpdb->get_results( $sql );	
			
			if($wpdb->num_rows == 0){
				$sql	 =	"";

				$sql	.=	" INSERT INTO wp_buy ( session_id,product_id,`on`,`title`,extra_species,product_name,product_type,product_price,picture_url,character_name,server_id,faction";

				$sql	.=  " )VALUES(	'$sessionid','$id','$on','$title','$extra_species','$product_name','$species','$price','$picture_url','$character_name','$server_id','$faction' ";
				
				$sql	.=  " )";
				
				$myrows = $wpdb->get_results( $sql );		
				
			}

			break;

		case	'delete':
				if($autoid != ''){
					$sql	 =	"";

					$sql	.=	" DELETE FROM `wp_buy` WHERE 1 and autoid= '$autoid'";
					$myrows = $wpdb->get_results( $sql );		
				}
			
			break;
	}
	
	
}

//if log in and  insert data
//use user id be primary key
if($current_user->data != NULL && $action !=  ''){
	

	switch($action){
		case	'add':
		
			$sql	 =	"";

			$sql	.=	" SELECT product_id FROM wp_buy where 1 ";
			
			$sql	.=	" and product_id = $id ";

			
			$wpdb->get_results( $sql );	
			
			if($wpdb->num_rows == 0){
				$sql	 =	"";

				$sql	.=	" INSERT INTO wp_buy ( id,session_id,product_id,`on`,`title`,extra_species,product_name,product_type,product_price,picture_url,character_name,server_id,faction";

				$sql	.=  " )VALUES(	'$current_user->ID','$sessionid','$id','$on','$title','$extra_species','$product_name','$species','$price','$picture_url','$character_name','$server_id','$faction' ";
				
				$sql	.=  " )";
				
				$myrows = $wpdb->get_results( $sql );		
				
			}

			break;

		case	'delete':
				if($autoid != ''){
					$sql	 =	"";

					$sql	.=	" DELETE FROM `wp_buy` WHERE 1 and autoid= '$autoid' ";
					$myrows = $wpdb->get_results( $sql );		
				}
			
			break;
	}
	

}

// merge not log in with log in data,
// precondition: sessin id same
if($current_user->data != NULL && $current_user->ID >0 && $sessionid != ''){

		$sql	 =	"";
		$sql	.=	" SELECT product_id FROM wp_buy where 1 ";
		$sql	.=	" and session_id = '$sessionid' ";
		$sql	.=	" and id = ''";
		
		$wpdb->get_results( $sql );	
		
		if($wpdb->num_rows > 0){
			$sql	 =	"";
			$sql	.=	" UPDATE `wp_buy` SET id = $current_user->ID  ";
			$sql	.=	" where 1";
			$sql	.=	" and id=''";
			$sql	.=	" and session_id='$sessionid'";
		
			$wpdb->get_results( $sql );	
		}
}


 

?>
 
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery("#order_submit").click(function(){
		

		dataString='';
		dataString+='&order_buyer_fullname=' + jQuery("#order_buyer_fullname").val();
		dataString+='&order_buyer_email=' + jQuery("#order_buyer_email").val();
		dataString+='&order_buyer_phone=' + jQuery("#order_buyer_phone").val();
		dataString+='&order_buyer_address=' + jQuery("#order_buyer_address").val();
		dataString+='&order_buyer_country=' + jQuery("#order_buyer_country").val();
		
		dataString+='&terms=' + jQuery("#terms").is(":checked");
		dataString+='&return_policy=' + jQuery("#return_policy").is(":checked");
		dataString+='&privacy=' + jQuery("#privacy").is(":checked");
		dataString+='&faqs=' + jQuery("#faqs").is(":checked");
		dataString+='&userid=' + jQuery("#userid").val();
		dataString+='&total=' + jQuery("#buy_total").val();
		
		
		
		jQuery.ajax({
		  type: "POST",  
		  url: "<?php bloginfo( 'stylesheet_directory' ); ?>/submission.php", 
		  data:  dataString,  
		
		  success: function(data) { 
			
			//console.log();
			
			if ( data == 'success') {
				
				jQuery( "#new_order" ).submit();
			} else{
				jQuery(".errorExplanation").css('display','block');
				jQuery(".errorExplanation").html(data);
			}
		  },
		
		  error: function(xhr, status) {
			
		
		  }
		});  
		return false;
		
	})
})			
function Addextra(pid,aid,price)
{
   jQuery('#exaction').val('addextra');
  jQuery('#expid').val(pid);
   jQuery('#exaid').val(aid);
   jQuery('#aprice').val(price);
  jQuery('#extraform').submit();
}
function deletextra(pid,aid,price)
{
   jQuery('#exaction').val('removeextra');
  jQuery('#expid').val(pid);
   jQuery('#exaid').val(aid);
    jQuery('#aprice').val(price);
  jQuery('#extraform').submit();
}
</script> 
<form style='display:none'action='' id='extraform' method='post'>
<input type='hidden' name='exaction' id='exaction' value='addextra' />
<input type='hidden' name='productid' id='expid' value='' />
<input type='hidden' name='aid'  id='exaid' value='' />
<input type='hidden' name='aprice'  id='aprice' value='' />
</form>
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
	<div id="container">
	
		
		<div class="box_line both clr"></div>		
	
			<div class="errorExplanation paddingtop clr" style="display:none;">
			
			</div>
		
		
		
		<div id="buy_detailed">
			<div class="prepend-1 span-14"> 
  
				<h1>1. Confirm Purchase Details</h1>
				<p><strong>Purchase details for Characters </strong></p>
				<div id="cart">
			<table class="tablebookConfirm" border="0" cellpadding="0" cellspacing="0">
				<tbody>
				<tr>
					<th class="id"><h3>#</h3></th>
					<th class="details"><h3>Details </h3></th>
					<th class="price"><h3>Price</h3></th>
					<th class="total"><h3>Sub-Total</h3></th>
				</tr>				
				<tr class="blank">
					<td height="5"></td>
				</tr>	
				<?php 
					// session data
					if($current_user->data == NULL && $sessionid != ''){
						// not login
						$sql	 =	"";
						$sql	.=	" SELECT * FROM wp_buy where 1 ";
						$sql	.=	" and session_id = '$sessionid' ";
						$mysql	 =	$wpdb->get_results( $sql );
						
						$num_rows=	$wpdb->num_rows;
					
						
						if($num_rows>0){
							$total	=	'';
							$sub_total='';
							foreach($mysql as $key=>$value){
							
								$total	+= $value->product_price;
								$sub_total+= $value->product_price;
				?>

							<?php  
							$account=$value->product_id;
								if($value->extra_species == 'account_wow'){
								//wow account
								
								
							?>
								<tr>
									<td class="id">
										<img alt="picture" class="aion_thumb"  src="<?php echo $value->picture_url;?>" width="64">
										<a href="<?php echo $value->picture_url;?>"  target="_blank" title="">
											<img alt="Icon_enlarge" class="images" src="<?php echo get_template_directory_uri(); ?>/img/icon_enlarge.gif">
										</a>
										<a href="<?php echo home_url();?>/account/?accountid=<?php echo $value->product_id;?>">#<?php echo $value->product_id;?></a>
										<a href="#" class="delete" onclick="var f = document.createElement('form'); f.style.display = 'none'; this.parentNode.appendChild(f); f.method = 'POST'; f.action = this.href;var m = document.createElement('input'); m.setAttribute('type', 'hidden'); m.setAttribute('name', 'action'); m.setAttribute('value', 'delete'); f.appendChild(m);var s = document.createElement('input'); s.setAttribute('type', 'hidden'); s.setAttribute('name', 'autoid'); s.setAttribute('value', '<?php echo $value->autoid;?>'); f.appendChild(s);f.submit();return false;">(X)</a>
									</td>
									<td class="details">
										<b><a href="<?php echo home_url();?>/account/?accountid=<?php echo $value->product_id;?>"><?php echo $value->title;?></a></b><br>
										<a href="#" onclick="var f = document.createElement('form'); f.style.display = 'none'; this.parentNode.appendChild(f); f.method = 'POST'; f.action = this.href;var m = document.createElement('input'); m.setAttribute('type', 'hidden'); m.setAttribute('name', 'action'); m.setAttribute('value', 'delete'); f.appendChild(m);var s = document.createElement('input'); s.setAttribute('type', 'hidden'); s.setAttribute('name', 'autoid'); s.setAttribute('value', '<?php echo $value->autoid;?>'); f.appendChild(s);f.submit();return false;"><img alt="Remove_from_cart" src="<?php echo get_template_directory_uri(); ?>/img/Remove_from_Cart.png" width="120"></a>
									</td>
									<td class="price">
										<span><?php echo $money_country;?></span><?php echo $money_unit;?> <?php echo $value->product_price;?>
									</td>
									<td class="total"  >
										<span><?php echo $money_country;?></span><?php echo $money_unit;?> <?php echo $value->product_price;?>
									</td>
								</tr>
								<tr class="blank">
									<td height="5"></td>
								</tr>		
							<?php }else{?>
								
								<tr>
								<?php
									if($value->product_type=='golds'){
										$name=	$value->product_name.' Gold';
									}else if($value->product_type=='account'){
										$arr=explode('Character',$value->product_name);
										$name=	$arr[0].' Account';
									}else if($value->product_type== 'Diablo3Item'){
										$name=	'Diablo3Item';
									}else if($value->product_type== 'leveling'){
										$name=	'leveling';
										$leveling_title=	$value->title;
									}
								?>
									<td class="id">
										<?php if(isset($leveling_title)){?><div><?php echo $leveling_title;?></div><?php }?>
										<?php if($value->picture_url != ''){?>
											<img alt="picture" class="aion_thumb"  src="<?php echo $value->picture_url;?>" width="64">
											<a href="<?php echo $value->picture_url;?>"  target="_blank" title="">
												<img alt="Icon_enlarge" class="images" src="<?php echo get_template_directory_uri(); ?>/img/icon_enlarge.gif">
											</a>
										<?php }?>
										<a href="#">#<?php echo $value->product_id;?></a>

										<a href="#" class="delete" onclick="var f = document.createElement('form'); f.style.display = 'none'; this.parentNode.appendChild(f); f.method = 'POST'; f.action = this.href;var m = document.createElement('input'); m.setAttribute('type', 'hidden'); m.setAttribute('name', 'action'); m.setAttribute('value', 'delete'); f.appendChild(m);var s = document.createElement('input'); s.setAttribute('type', 'hidden'); s.setAttribute('name', 'autoid'); s.setAttribute('value', '<?php echo $value->autoid;?>'); f.appendChild(s);f.submit();return false;">(X)</a>
									</td>
									<td class="details">
									
										<b><?php echo $name;?></b><br>
										<a href="#" onclick="var f = document.createElement('form'); f.style.display = 'none'; this.parentNode.appendChild(f); f.method = 'POST'; f.action = this.href;var m = document.createElement('input'); m.setAttribute('type', 'hidden'); m.setAttribute('name', 'action'); m.setAttribute('value', 'delete'); f.appendChild(m);var s = document.createElement('input'); s.setAttribute('type', 'hidden'); s.setAttribute('name', 'autoid'); s.setAttribute('value', '<?php echo $value->autoid;?>'); f.appendChild(s);f.submit();return false;"><img alt="Remove_from_cart" src="<?php echo get_template_directory_uri(); ?>/img/Remove_from_Cart.png" width="120"></a>
									</td>
									<td class="price">
										<span><?php echo $money_country;?></span><?php echo $money_unit;?><?php echo $value->product_price;?>
									</td>
									<td class="total" rowspan="1">
										<span><?php echo $money_country;?></span><?php echo $money_unit;?><?php echo  $value->product_price;?>
									</td>
								</tr>
								<tr class="blank">
									<td height="5"></td>
								</tr>	
							<?php }?>
				<?php 
				           
						    $acxmlurl="http://vbarrack:ee69b5604bf2bf2d5e12ea57963b57e8@api.vbarrack.com/api/products/$account/product_accessories.xml";
								 $acxml	=	simplexml_load_file($acxmlurl);	
								 if($acxml!='')
								 print_r($acxml);
						    
							}
						}
					}
				?>
				
				<?php 
					//longin data
					if($current_user->data != NULL && $current_user->ID >0){
						$sql	 =	"";
						$sql	.=	" SELECT * FROM wp_buy where 1 ";
						$sql	.=	" and id = '$current_user->ID' ";
						$mysql	 =	$wpdb->get_results( $sql );
						
						$num_rows=	$wpdb->num_rows;
					
						
						if($num_rows>0){
							$total	=	'';
							$sub_total='';
							
							foreach($mysql as $key=>$value){
								$total	+= $value->product_price;
								$sub_total+= $value->product_price;
				?>

							<?php 
							$account=$value->product_id; 
							$accessories=array();
							if($value->accessories!='')
							$accessories=explode(',',$value->accessories);
							
						 
							 $acxmlurl="http://vbarrack:ee69b5604bf2bf2d5e12ea57963b57e8@api.vbarrack.com/api/products/$account/product_accessories.xml";
								 $acxml	=	simplexml_load_file($acxmlurl);	
								 $rowspan='';
								 if($acxml!='')
								 {
								   if(count($acxml->accessory))
								   {
                                         $rowspan='rowspan="'.(count($acxml->accessory)+1).'"';
										 if($value->extra_species != 'account_wow'){ 
										    $rowspan='rowspan="'.(count($acxml->accessory)+1).'"';
										 }
								   }
								   }
								   else
								   {
								      if($value->extra_species != 'account_wow'){ 
										    $rowspan='rowspan="1"';
										 }
								   }
								if($value->extra_species == 'account_wow'){
								//wow account
							?>
								<tr>
									<td class="id">
										
										<img alt="picture" class="aion_thumb"  src="<?php echo $value->picture_url;?>" width="64">
										<a href="<?php echo $value->picture_url;?>"  target="_blank" title="">
											<img alt="Icon_enlarge" class="images" src="<?php echo get_template_directory_uri(); ?>/img/icon_enlarge.gif">
										</a>
										<a href="<?php echo home_url();?>/account/?accountid=<?php echo $value->product_id;?>">#<?php echo $value->product_id;?></a>
										<a href="#" class="delete" onclick="var f = document.createElement('form'); f.style.display = 'none'; this.parentNode.appendChild(f); f.method = 'POST'; f.action = this.href;var m = document.createElement('input'); m.setAttribute('type', 'hidden'); m.setAttribute('name', 'action'); m.setAttribute('value', 'delete'); f.appendChild(m);var s = document.createElement('input'); s.setAttribute('type', 'hidden'); s.setAttribute('name', 'autoid'); s.setAttribute('value', '<?php echo $value->autoid;?>'); f.appendChild(s);f.submit();return false;">(X)</a>
									</td>
									<td class="details">
										<b><a href="<?php echo home_url();?>/account/?accountid=<?php echo $value->product_id;?>"><?php echo $value->title;?></a></b><br>
										<a href="#" onclick="var f = document.createElement('form'); f.style.display = 'none'; this.parentNode.appendChild(f); f.method = 'POST'; f.action = this.href;var m = document.createElement('input'); m.setAttribute('type', 'hidden'); m.setAttribute('name', 'action'); m.setAttribute('value', 'delete'); f.appendChild(m);var s = document.createElement('input'); s.setAttribute('type', 'hidden'); s.setAttribute('name', 'autoid'); s.setAttribute('value', '<?php echo $value->autoid;?>'); f.appendChild(s);f.submit();return false;"><img alt="Remove_from_cart" src="<?php echo get_template_directory_uri(); ?>/img/Remove_from_Cart.png" width="120"></a>
									</td>
									<td class="price">
										<span><?php echo $money_country;?></span><?php echo $money_unit;?> <?php echo  $value->product_price;?>
									</td>
									<td class="total" <?php echo $rowspan?> >
										<span><?php echo $money_country;?></span><?php echo $money_unit;?> <?php echo  $value->product_price;?>
									</td>
								</tr>
								 	
							<?php }else{?>
								<tr><?php
									
									if($value->product_type=='golds'){
										$name=	$value->product_name.' Gold';
									}else if($value->product_type=='account'){
										$arr=explode('Character',$value->product_name);
										$name=	$arr[0].' Account';
									}else if($value->product_type== 'Diablo3Item'){
										$name=	'Diablo3Item';
									}else if($value->product_type== 'leveling'){
										$name=	'leveling';
										$leveling_title=	$value->title;
									}?>
									
									<td class="id">
										<?php if(isset($leveling_title)){?><div><?php echo $leveling_title;?></div><?php }?>
										<?php if($value->picture_url != ''){?>
											<img alt="picture" class="aion_thumb"  src="<?php echo $value->picture_url;?>" width="64">
											<a href="<?php echo $value->picture_url;?>"  target="_blank" title="">
												<img alt="Icon_enlarge" class="images" src="<?php echo get_template_directory_uri(); ?>/img/icon_enlarge.gif">
											</a>
										<?php }?>
										<a href="#">#<?php echo $value->product_id;?></a>

										<a href="#" class="delete" onclick="var f = document.createElement('form'); f.style.display = 'none'; this.parentNode.appendChild(f); f.method = 'POST'; f.action = this.href;var m = document.createElement('input'); m.setAttribute('type', 'hidden'); m.setAttribute('name', 'action'); m.setAttribute('value', 'delete'); f.appendChild(m);var s = document.createElement('input'); s.setAttribute('type', 'hidden'); s.setAttribute('name', 'autoid'); s.setAttribute('value', '<?php echo $value->autoid;?>'); f.appendChild(s);f.submit();return false;">(X)</a>
									</td>
									<td class="details">
									
										<b><?php echo $name;?></b><br>
										<a href="#" onclick="var f = document.createElement('form'); f.style.display = 'none'; this.parentNode.appendChild(f); f.method = 'POST'; f.action = this.href;var m = document.createElement('input'); m.setAttribute('type', 'hidden'); m.setAttribute('name', 'action'); m.setAttribute('value', 'delete'); f.appendChild(m);var s = document.createElement('input'); s.setAttribute('type', 'hidden'); s.setAttribute('name', 'autoid'); s.setAttribute('value', '<?php echo $value->autoid;?>'); f.appendChild(s);f.submit();return false;"><img alt="Remove_from_cart" src="<?php echo get_template_directory_uri(); ?>/img/Remove_from_Cart.png" width="120"></a>
									</td>
									<td class="price">
										<span><?php echo $money_country;?></span><?php echo $money_unit;?><?php echo $value->product_price;?></span>
									</td>
									<td class="total"  <?php echo $rowspan?>>
										<span><?php echo $money_country;?></span><?php echo $money_unit;?><label id='total-<?php echo $value->product_id;?>'><?php echo  $value->product_price;?></label></span>
									</td>
								</tr>
								
							<?php }?>
				<?php 
							
								 if($acxml!='')
								 {
								   if(count($acxml->accessory))
								   {
								     foreach($acxml->accessory as $value)
									 {
									   $add=in_array($value->{'accessory-id'},$accessories);
									 ?>
									 <tr>
									<td class="id"> 
									<?php if($value->price>0) { 
									 
									     if($add)
										 {
										 ?>
										  <a href='javascript:;' onclick='deletextra(<?php echo ($value->{'product-id'} .','. $value->{'accessory-id'} . ','. $value->price); ?>)'> <img src='<?php echo get_template_directory_uri(); ?>/images/remove_extra.png' /></a>
										 <?php
										 }
										 else
										 {
										 
										 ?>
										 <a href='javascript:;' onclick='Addextra(<?php echo   $value->{'product-id'} ?>,<?php echo  $value->{'accessory-id'} ?>,<?php echo $value->price ?>);'> <img src='<?php echo get_template_directory_uri(); ?>/images/add_extra.png' /></a>
										 <?php }} ?>
									</td>
									<td class="details ">
									<div class='alleft'> <?php echo $value->title ?></div>
									</td>
									<td class="price">
										 <?php if($value->price==0 || $add) { ?>
										 <span class='green'>added <b><?php echo $money_unit;?><?php echo  $value->price;?></b></span>
										 <?php } else {?>
										 <span class='red'>+only <b><?php echo $money_unit;?><?php echo  $value->price;?></b></span>
										 <?php } ?>
									</td> 
								</tr>
										
									 <?php
									 }
								   }
								 }
							   ?>
							   <tr class="blank">
									<td height="5"></td>
								</tr>	
							   <?php
							}
						}
					}
				?>
				
			<tr class="blank">
				<td height="5"></td>
			</tr>
			</tbody>
		</table>

		<div id="cart_total">
			<table class="tablebookConfirmTotal" border="0" cellpadding="0" cellspacing="0">
				<tbody>
				<tr id="total">
					<td class="title">Total</td>
					<td class="total" id="total"><span><?php echo $money_country;?></span><?php echo $money_unit;?> <?php echo $total;?></td>
				</tr>
				<tr class="blank">
					<td height="5"></td>
				</tr>
				<tr>
					<td class="title">Assistance over live chat by VBarrack™ Customer Service Officer</td>
					<td class="total">
						<span class="green">INCLUDED</span>
					</td>
				</tr>
				<tr class="blank">
					<td height="5"></td>
				</tr>

				<tr class="totalPaid">
					<td class="title"><strong>Total Payable in USD</strong></td>
					<td class="total"><span><?php echo $money_country;?></span> 
						<?php echo $money_unit;?> <?php echo $total;?>
					</td>
				</tr> 
				<tr class="blank">
					<td height="5"></td>
				</tr>
				</tbody>
			</table>
		</div>


		</div>
				<div class="purchaseInfo"></div>
				<div id="tsCs" class="horizontal">  
				<div class="hr"><hr></div>
				<h4 class="blueHeading">Important Information</h4>
				<div class="pDetailsBoxContent">  
				<h2><font face="arial,helvetica,sans-serif" size="4" color="#800000">New Payment Features</font></h2><p><font face="arial,helvetica,sans-serif" size="2" color="#000000">We are now accepting Bill Me Later Service and Paypal Installment Plan when you are using Paypal to pay.</font></p><p><font face="arial,helvetica,sans-serif" size="2" color="#000000">Please contact our live support operator for further information.</font></p><h2><font face="arial,helvetica,sans-serif" size="4" color="#800000">100% Account Protection Guarantee</font></h2><p><font face="arial,helvetica,sans-serif" size="2" color="#000000">We aimed to provide&nbsp;safe wow accounts to our customers.</font></p><p><font face="arial,helvetica,sans-serif" size="2" color="#000000">Thus, all characters can be transferred to a brand new account where only YOU will&nbsp;knows the details.</font></p><p><font face="arial,helvetica,sans-serif" size="2" color="#000000">That's why Vbarrack.com is the only website that truly has zero re-claim rates.</font></p><h2><font face="arial,helvetica,sans-serif" size="4" color="#800000">Why Purchase the Vbarrack Security Package?</font></h2><p><font face="arial,helvetica,sans-serif" size="2" color="#000000">There is no bad record on a brand new account when you purchase a character with the security package.</font></p><p><font face="arial,helvetica,sans-serif" size="2" color="#000000">It does not affect the game play in your existing account.</font></p><p><font face="arial,helvetica,sans-serif" size="2" color="#000000">One month free game time comes with the security package.</font></p><p><font face="arial,helvetica,sans-serif" size="1" color="#000000">*Please remove the cd-keys package during the checkout if you are going to use your own set of keys. <br>*No protection guarantee will be given by us if you use your own set of keys for account creation.</font></p><h2><font face="arial,helvetica,sans-serif" size="4" color="#800000">The Character is Transferrable</font></h2><p><font face="arial,helvetica,sans-serif" size="2" color="#000000">You&nbsp;are able to transfer the character to any other realm, no matter it is PVP, PVE, RPVP or RP realms. Our live support operators will guide you through&nbsp;and help you&nbsp;complete the transfer with your own payment method / our paid character transfer package ($49) after the&nbsp;order has been made.</font></p><p><strong><font face="arial,helvetica,sans-serif" size="4" color="#800000">World of Warcraft Patch 5.0.4</font></strong></p><p><font color="#000000"><font face="arial,helvetica,sans-serif"><font size="2">Regarding the new patch at 28th August, 2012, Account-wide Achievements, pets, and mounts, w</font><font size="2">e have no guarantee that the extra pets and mounts would appear in your new account after the account to account transfer.&nbsp;Since it&nbsp;is a new feature in World of Warcraft, the mounts and pets&nbsp;are not considered as one of the pricing model, however, they considered as extra bonus to the account you have bought.</font></font></font></p><p><font face="arial,helvetica,sans-serif" size="2" color="#000000">Please be reminded that Blizzard Store Mounts are not avaliable for the required transfer character even if they are listed on the website. They are account-bounded items and unable to move to the new account.</font></p><p><font color="#000000"><font face="arial,helvetica,sans-serif"><font size="2">*</font><font size="1">For more details, please contact our Live Support</font></font></font></p><h2><font face="arial,helvetica,sans-serif" size="4" color="#800000">Security Concern</font></h2><p><font face="arial,helvetica,sans-serif" size="2" color="#000000">Any improper ingame activities will lead to suspension of the accounts.</font></p><p><font face="arial,helvetica,sans-serif" size="2" color="#000000">Account compromise is illegal, account closure will be resulted.</font></p><p><font face="arial,helvetica,sans-serif" size="2" color="#000000">Possible account termination when using illegal leveling or illegally obtained gold services.</font></p>
				</div>
				<div class="hr"><hr></div>
				</div>
				<div id="pods" class="horizontal"> </div>

			</div>
		</div>
		<div id="buy_pay">
			<!--<?php echo home_url('/');?>pay-->
		<form action="<?php echo home_url('/');?>pay" class="new_order" id="new_order" method="post" name="payform">
			<div class="span-9 last" style="margin-bottom:20px;"> 
				<h1>2. Checkout Now</h1>
				<div id="checkOutForm">

				<div class="checkoutForm clear">
					<fieldset>				
					<h3>Personal Details (Privacy Policy)&nbsp;&nbsp;&nbsp;<span class="small quiet weightNormal">
						<sub class="asterisk">*</sub> denotes required field</span>
					</h3>
					<div class="formField">
					  <label for="order_buyer_fullname">Full Name <sub class="asterisk">*</sub></label>
					  <input class="textfield required" id="order_buyer_fullname" name="order[buyer_fullname]" size="30" type="text" value="">
					</div>
					<div class="formField">
					  <label for="order_buyer_email">Email <sub class="asterisk">*</sub></label>
					  <input class="textfield required" id="order_buyer_email" name="order[buyer_email]" size="30" type="text" value="<?php if($current_user->user_email != ''){echo $current_user->user_email;} ?>">
					</div>
					<div class="formField">
					  <label for="order_buyer_phone">Cell Phone / Mobile <sub class="asterisk">*</sub></label>
					  <input class="textfield required" id="order_buyer_phone" name="order[buyer_phone]" size="30" type="text" value="">
					</div>
					<div class="formField">
					  <label for="order_buyer_address">Address <sub class="asterisk">*</sub></label>
					  <input class="textfield required" id="order_buyer_address" name="order[buyer_address]" size="30" type="text">
					</div>
					<div class="formField">
					  <label for="order_buyer_country">Country <sub class="asterisk">*</sub></label>
					  <select id="order_buyer_country" name="order[buyer_country]"><option value="United States">United States</option>
				<option value="United Kingdom">United Kingdom</option><option value="" disabled="disabled">-------------</option>
				<option value="Afghanistan">Afghanistan</option>
				<option value="Aland Islands">Aland Islands</option>
				<option value="Albania">Albania</option>
				<option value="Algeria">Algeria</option>
				<option value="American Samoa">American Samoa</option>
				<option value="Andorra">Andorra</option>
				<option value="Angola">Angola</option>
				<option value="Anguilla">Anguilla</option>
				<option value="Antarctica">Antarctica</option>
				<option value="Antigua And Barbuda">Antigua And Barbuda</option>
				<option value="Argentina">Argentina</option>
				<option value="Armenia">Armenia</option>
				<option value="Aruba">Aruba</option>
				<option value="Australia">Australia</option>
				<option value="Austria">Austria</option>
				<option value="Azerbaijan">Azerbaijan</option>
				<option value="Bahamas">Bahamas</option>
				<option value="Bahrain">Bahrain</option>
				<option value="Bangladesh">Bangladesh</option>
				<option value="Barbados">Barbados</option>
				<option value="Belarus">Belarus</option>
				<option value="Belgium">Belgium</option>
				<option value="Belize">Belize</option>
				<option value="Benin">Benin</option>
				<option value="Bermuda">Bermuda</option>
				<option value="Bhutan">Bhutan</option>
				<option value="Bolivia">Bolivia</option>
				<option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
				<option value="Botswana">Botswana</option>
				<option value="Bouvet Island">Bouvet Island</option>
				<option value="Brazil">Brazil</option>
				<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
				<option value="Brunei Darussalam">Brunei Darussalam</option>
				<option value="Bulgaria">Bulgaria</option>
				<option value="Burkina Faso">Burkina Faso</option>
				<option value="Burundi">Burundi</option>
				<option value="Cambodia">Cambodia</option>
				<option value="Cameroon">Cameroon</option>
				<option value="Canada">Canada</option>
				<option value="Cape Verde">Cape Verde</option>
				<option value="Cayman Islands">Cayman Islands</option>
				<option value="Central African Republic">Central African Republic</option>
				<option value="Chad">Chad</option>
				<option value="Chile">Chile</option>
				<option value="China">China</option>
				<option value="Christmas Island">Christmas Island</option>
				<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
				<option value="Colombia">Colombia</option>
				<option value="Comoros">Comoros</option>
				<option value="Congo">Congo</option>
				<option value="Congo, the Democratic Republic of the">Congo, the Democratic Republic of the</option>
				<option value="Cook Islands">Cook Islands</option>
				<option value="Costa Rica">Costa Rica</option>
				<option value="Cote d'Ivoire">Cote d'Ivoire</option>
				<option value="Croatia">Croatia</option>
				<option value="Cuba">Cuba</option>
				<option value="Cyprus">Cyprus</option>
				<option value="Czech Republic">Czech Republic</option>
				<option value="Denmark">Denmark</option>
				<option value="Djibouti">Djibouti</option>
				<option value="Dominica">Dominica</option>
				<option value="Dominican Republic">Dominican Republic</option>
				<option value="Ecuador">Ecuador</option>
				<option value="Egypt">Egypt</option>
				<option value="El Salvador">El Salvador</option>
				<option value="Equatorial Guinea">Equatorial Guinea</option>
				<option value="Eritrea">Eritrea</option>
				<option value="Estonia">Estonia</option>
				<option value="Ethiopia">Ethiopia</option>
				<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
				<option value="Faroe Islands">Faroe Islands</option>
				<option value="Fiji">Fiji</option>
				<option value="Finland">Finland</option>
				<option value="France">France</option>
				<option value="French Guiana">French Guiana</option>
				<option value="French Polynesia">French Polynesia</option>
				<option value="French Southern Territories">French Southern Territories</option>
				<option value="Gabon">Gabon</option>
				<option value="Gambia">Gambia</option>
				<option value="Georgia">Georgia</option>
				<option value="Germany">Germany</option>
				<option value="Ghana">Ghana</option>
				<option value="Gibraltar">Gibraltar</option>
				<option value="Greece">Greece</option>
				<option value="Greenland">Greenland</option>
				<option value="Grenada">Grenada</option>
				<option value="Guadeloupe">Guadeloupe</option>
				<option value="Guam">Guam</option>
				<option value="Guatemala">Guatemala</option>
				<option value="Guernsey">Guernsey</option>
				<option value="Guinea">Guinea</option>
				<option value="Guinea-Bissau">Guinea-Bissau</option>
				<option value="Guyana">Guyana</option>
				<option value="Haiti">Haiti</option>
				<option value="Heard and McDonald Islands">Heard and McDonald Islands</option>
				<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
				<option value="Honduras">Honduras</option>
				<option value="Hong Kong">Hong Kong</option>
				<option value="Hungary">Hungary</option>
				<option value="Iceland">Iceland</option>
				<option value="India">India</option>
				<option value="Indonesia">Indonesia</option>
				<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
				<option value="Iraq">Iraq</option>
				<option value="Ireland">Ireland</option>
				<option value="Isle of Man">Isle of Man</option>
				<option value="Israel">Israel</option>
				<option value="Italy">Italy</option>
				<option value="Jamaica">Jamaica</option>
				<option value="Japan">Japan</option>
				<option value="Jersey">Jersey</option>
				<option value="Jordan">Jordan</option>
				<option value="Kazakhstan">Kazakhstan</option>
				<option value="Kenya">Kenya</option>
				<option value="Kiribati">Kiribati</option>
				<option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
				<option value="Korea, Republic of">Korea, Republic of</option>
				<option value="Kuwait">Kuwait</option>
				<option value="Kyrgyzstan">Kyrgyzstan</option>
				<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
				<option value="Latvia">Latvia</option>
				<option value="Lebanon">Lebanon</option>
				<option value="Lesotho">Lesotho</option>
				<option value="Liberia">Liberia</option>
				<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
				<option value="Liechtenstein">Liechtenstein</option>
				<option value="Lithuania">Lithuania</option>
				<option value="Luxembourg">Luxembourg</option>
				<option value="Macao">Macao</option>
				<option value="Macedonia, The Former Yugoslav Republic Of">Macedonia, The Former Yugoslav Republic Of</option>
				<option value="Madagascar">Madagascar</option>
				<option value="Malawi">Malawi</option>
				<option value="Malaysia">Malaysia</option>
				<option value="Maldives">Maldives</option>
				<option value="Mali">Mali</option>
				<option value="Malta">Malta</option>
				<option value="Marshall Islands">Marshall Islands</option>
				<option value="Martinique">Martinique</option>
				<option value="Mauritania">Mauritania</option>
				<option value="Mauritius">Mauritius</option>
				<option value="Mayotte">Mayotte</option>
				<option value="Mexico">Mexico</option>
				<option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
				<option value="Moldova, Republic of">Moldova, Republic of</option>
				<option value="Monaco">Monaco</option>
				<option value="Mongolia">Mongolia</option>
				<option value="Montenegro">Montenegro</option>
				<option value="Montserrat">Montserrat</option>
				<option value="Morocco">Morocco</option>
				<option value="Mozambique">Mozambique</option>
				<option value="Myanmar">Myanmar</option>
				<option value="Namibia">Namibia</option>
				<option value="Nauru">Nauru</option>
				<option value="Nepal">Nepal</option>
				<option value="Netherlands">Netherlands</option>
				<option value="Netherlands Antilles">Netherlands Antilles</option>
				<option value="New Caledonia">New Caledonia</option>
				<option value="New Zealand">New Zealand</option>
				<option value="Nicaragua">Nicaragua</option>
				<option value="Niger">Niger</option>
				<option value="Nigeria">Nigeria</option>
				<option value="Niue">Niue</option>
				<option value="Norfolk Island">Norfolk Island</option>
				<option value="Northern Mariana Islands">Northern Mariana Islands</option>
				<option value="Norway">Norway</option>
				<option value="Oman">Oman</option>
				<option value="Pakistan">Pakistan</option>
				<option value="Palau">Palau</option>
				<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
				<option value="Panama">Panama</option>
				<option value="Papua New Guinea">Papua New Guinea</option>
				<option value="Paraguay">Paraguay</option>
				<option value="Peru">Peru</option>
				<option value="Philippines">Philippines</option>
				<option value="Pitcairn">Pitcairn</option>
				<option value="Poland">Poland</option>
				<option value="Portugal">Portugal</option>
				<option value="Puerto Rico">Puerto Rico</option>
				<option value="Qatar">Qatar</option>
				<option value="Reunion">Reunion</option>
				<option value="Romania">Romania</option>
				<option value="Russian Federation">Russian Federation</option>
				<option value="Rwanda">Rwanda</option>
				<option value="Saint Barthelemy">Saint Barthelemy</option>
				<option value="Saint Helena">Saint Helena</option>
				<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
				<option value="Saint Lucia">Saint Lucia</option>
				<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
				<option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
				<option value="Samoa">Samoa</option>
				<option value="San Marino">San Marino</option>
				<option value="Sao Tome and Principe">Sao Tome and Principe</option>
				<option value="Saudi Arabia">Saudi Arabia</option>
				<option value="Senegal">Senegal</option>
				<option value="Serbia">Serbia</option>
				<option value="Seychelles">Seychelles</option>
				<option value="Sierra Leone">Sierra Leone</option>
				<option value="Singapore">Singapore</option>
				<option value="Slovakia">Slovakia</option>
				<option value="Slovenia">Slovenia</option>
				<option value="Solomon Islands">Solomon Islands</option>
				<option value="Somalia">Somalia</option>
				<option value="South Africa">South Africa</option>
				<option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
				<option value="Spain">Spain</option>
				<option value="Sri Lanka">Sri Lanka</option>
				<option value="Sudan">Sudan</option>
				<option value="Suriname">Suriname</option>
				<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
				<option value="Swaziland">Swaziland</option>
				<option value="Sweden">Sweden</option>
				<option value="Switzerland">Switzerland</option>
				<option value="Syrian Arab Republic">Syrian Arab Republic</option>
				<option value="Taiwan, Province of China">Taiwan, Province of China</option>
				<option value="Tajikistan">Tajikistan</option>
				<option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
				<option value="Thailand">Thailand</option>
				<option value="Timor-Leste">Timor-Leste</option>
				<option value="Togo">Togo</option>
				<option value="Tokelau">Tokelau</option>
				<option value="Tonga">Tonga</option>
				<option value="Trinidad and Tobago">Trinidad and Tobago</option>
				<option value="Tunisia">Tunisia</option>
				<option value="Turkey">Turkey</option>
				<option value="Turkmenistan">Turkmenistan</option>
				<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
				<option value="Tuvalu">Tuvalu</option>
				<option value="Uganda">Uganda</option>
				<option value="Ukraine">Ukraine</option>
				<option value="United Arab Emirates">United Arab Emirates</option>
				<option value="United Kingdom">United Kingdom</option>
				<option value="United States">United States</option>
				<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
				<option value="Uruguay">Uruguay</option>
				<option value="Uzbekistan">Uzbekistan</option>
				<option value="Vanuatu">Vanuatu</option>
				<option value="Venezuela">Venezuela</option>
				<option value="Viet Nam">Viet Nam</option>
				<option value="Virgin Islands, British">Virgin Islands, British</option>
				<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
				<option value="Wallis and Futuna">Wallis and Futuna</option>
				<option value="Western Sahara">Western Sahara</option>
				<option value="Yemen">Yemen</option>
				<option value="Zambia">Zambia</option>
				<option value="Zimbabwe">Zimbabwe</option>
				</select>
					</div>
					<div class="formField">
					  <label for="order_server">Server to Play</label>
					  <select class="textfield required" id="order_server" name="order[server]"><option value="">Please Select</option>
				<option value="1">WOW US / Aegwynn</option>
				<option value="2">WOW US / Aerie Peak</option>
				<option value="3">WOW US / Agamaggan</option>
				<option value="4">WOW US / Aggramar</option>
				<option value="5">WOW US / Akama</option>
				<option value="6">WOW US / Alexstrasza</option>
				<option value="7">WOW US / Alleria</option>
				<option value="8">WOW US / Altar of Storms</option>
				<option value="9">WOW US / Alterac Mountains</option>
				<option value="10">WOW US / Aman'Thul</option>
				<option value="11">WOW US / Andorhal</option>
				<option value="12">WOW US / Anetheron</option>
				<option value="13">WOW US / Antonidas</option>
				<option value="14">WOW US / Anub'arak</option>
				<option value="15">WOW US / Anvilmar</option>
				<option value="16">WOW US / Arathor</option>
				<option value="17">WOW US / Archimonde</option>
				<option value="18">WOW US / Area 52</option>
				<option value="19">WOW US / Argent Dawn</option>
				<option value="20">WOW US / Arthas</option>
				<option value="21">WOW US / Arygos</option>
				<option value="22">WOW US / Auchindoun</option>
				<option value="23">WOW US / Azgalor</option>
				<option value="24">WOW US / Azjol-Nerub</option>
				<option value="635">WOW US / Azralon</option>
				<option value="25">WOW US / Azshara</option>
				<option value="26">WOW US / Azuremyst</option>
				<option value="27">WOW US / Baelgun</option>
				<option value="28">WOW US / Balnazzar</option>
				<option value="29">WOW US / Barthilas</option>
				<option value="30">WOW US / Black Dragonflight</option>
				<option value="31">WOW US / Blackhand</option>
				<option value="32">WOW US / Blackrock</option>
				<option value="33">WOW US / Blackwater Raiders</option>
				<option value="34">WOW US / Blackwing Lair</option>
				<option value="35">WOW US / Blade's Edge</option>
				<option value="36">WOW US / Bladefist</option>
				<option value="37">WOW US / Bleeding Hollow</option>
				<option value="38">WOW US / Blood Furnace</option>
				<option value="39">WOW US / Bloodhoof</option>
				<option value="40">WOW US / Bloodscalp</option>
				<option value="41">WOW US / Bonechewer</option>
				<option value="550">WOW US / Borean Tundra</option>
				<option value="481">WOW US / Borean Tundra</option>
				<option value="42">WOW US / Boulderfist</option>
				<option value="43">WOW US / Bronzebeard</option>
				<option value="44">WOW US / Burning Blade</option>
				<option value="45">WOW US / Burning Legion</option>
				<option value="46">WOW US / Caelestrasz</option>
				<option value="47">WOW US / Cairne</option>
				<option value="48">WOW US / Cenarion Circle</option>
				<option value="49">WOW US / Cenarius</option>
				<option value="50">WOW US / Cho'gall</option>
				<option value="51">WOW US / Chromaggus</option>
				<option value="52">WOW US / Coilfang</option>
				<option value="53">WOW US / Crushridge</option>
				<option value="54">WOW US / Daggerspine</option>
				<option value="55">WOW US / Dalaran</option>
				<option value="56">WOW US / Dalvengyr</option>
				<option value="57">WOW US / Dark Iron</option>
				<option value="58">WOW US / Darkspear</option>
				<option value="59">WOW US / Darrowmere</option>
				<option value="60">WOW US / Dath'Remar</option>
				<option value="551">WOW US / Dawnbringer</option>
				<option value="473">WOW US / Dawnbringer</option>
				<option value="61">WOW US / Deathwing</option>
				<option value="62">WOW US / Demon Soul</option>
				<option value="63">WOW US / Dentarg</option>
				<option value="64">WOW US / Destromath</option>
				<option value="65">WOW US / Dethecus</option>
				<option value="66">WOW US / Detheroc</option>
				<option value="67">WOW US / Doomhammer</option>
				<option value="68">WOW US / Draenor</option>
				<option value="69">WOW US / Dragonblight</option>
				<option value="70">WOW US / Dragonmaw</option>
				<option value="552">WOW US / Drak'Tharon</option>
				<option value="474">WOW US / Drak'Tharon</option>
				<option value="71">WOW US / Drak'thul</option>
				<option value="72">WOW US / Draka</option>
				<option value="73">WOW US / Drakkari</option>
				<option value="74">WOW US / Dreadmaul</option>
				<option value="75">WOW US / Drenden</option>
				<option value="76">WOW US / Dunemaul</option>
				<option value="77">WOW US / Durotan</option>
				<option value="78">WOW US / Duskwood</option>
				<option value="79">WOW US / Earthen Ring</option>
				<option value="80">WOW US / Echo Isles</option>
				<option value="81">WOW US / Eitrigg</option>
				<option value="82">WOW US / Eldre'Thalas</option>
				<option value="83">WOW US / Elune</option>
				<option value="84">WOW US / Emerald Dream</option>
				<option value="85">WOW US / Eonar</option>
				<option value="86">WOW US / Eredar</option>
				<option value="87">WOW US / Executus</option>
				<option value="88">WOW US / Exodar</option>
				<option value="89">WOW US / Farstriders</option>
				<option value="90">WOW US / Feathermoon</option>
				<option value="91">WOW US / Fenris</option>
				<option value="92">WOW US / Firetree</option>
				<option value="475">WOW US / Fizzcrank</option>
				<option value="93">WOW US / Frostmane</option>
				<option value="94">WOW US / Frostmourne</option>
				<option value="95">WOW US / Frostwolf</option>
				<option value="476">WOW US / Galakrond</option>
				<option value="632">WOW US / Gallywix</option>
				<option value="633">WOW US / Gallywix</option>
				<option value="96">WOW US / Garithos</option>
				<option value="97">WOW US / Garona</option>
				<option value="482">WOW US / Garrosh</option>
				<option value="98">WOW US / Ghostlands</option>
				<option value="99">WOW US / Gilneas</option>
				<option value="100">WOW US / Gnomeregan</option>
				<option value="631">WOW US / Goldrinn</option>
				<option value="101">WOW US / Gorefiend</option>
				<option value="102">WOW US / Gorgonnash</option>
				<option value="103">WOW US / Greymane</option>
				<option value="477">WOW US / Grizzly Hills</option>
				<option value="104">WOW US / Gul'dan</option>
				<option value="479">WOW US / Gundrak</option>
				<option value="105">WOW US / Gurubashi</option>
				<option value="106">WOW US / Hakkar</option>
				<option value="107">WOW US / Haomarush</option>
				<option value="108">WOW US / Hellscream</option>
				<option value="109">WOW US / Hydraxis</option>
				<option value="110">WOW US / Hyjal</option>
				<option value="111">WOW US / Icecrown</option>
				<option value="112">WOW US / Illidan</option>
				<option value="113">WOW US / Jaedenar</option>
				<option value="114">WOW US / Jubei'Thos</option>
				<option value="115">WOW US / Kael'thas</option>
				<option value="116">WOW US / Kalecgos</option>
				<option value="117">WOW US / Kargath</option>
				<option value="118">WOW US / Kel'Thuzad</option>
				<option value="119">WOW US / Khadgar</option>
				<option value="120">WOW US / Khaz Modan</option>
				<option value="121">WOW US / Khaz'goroth</option>
				<option value="122">WOW US / Kil'Jaeden</option>
				<option value="123">WOW US / Kilrogg</option>
				<option value="124">WOW US / Kirin Tor</option>
				<option value="125">WOW US / Korgath</option>
				<option value="126">WOW US / Korialstrasz</option>
				<option value="127">WOW US / Kul Tiras</option>
				<option value="128">WOW US / Laughing Skull</option>
				<option value="129">WOW US / Lethon</option>
				<option value="130">WOW US / Lightbringer</option>
				<option value="131">WOW US / Lightning's Blade</option>
				<option value="132">WOW US / Lightninghoof</option>
				<option value="133">WOW US / Llane</option>
				<option value="134">WOW US / Lothar</option>
				<option value="135">WOW US / Madoran</option>
				<option value="136">WOW US / Maelstrom</option>
				<option value="137">WOW US / Magtheridon</option>
				<option value="138">WOW US / Maiev</option>
				<option value="139">WOW US / Mal'Ganis</option>
				<option value="140">WOW US / Malfurion</option>
				<option value="141">WOW US / Malorne</option>
				<option value="142">WOW US / Malygos</option>
				<option value="143">WOW US / Mannoroth</option>
				<option value="144">WOW US / Medivh</option>
				<option value="145">WOW US / Misha</option>
				<option value="146">WOW US / Mok'Nathal</option>
				<option value="147">WOW US / Moon Guard</option>
				<option value="148">WOW US / Moonrunner</option>
				<option value="149">WOW US / Mug'thol</option>
				<option value="150">WOW US / Muradin</option>
				<option value="151">WOW US / Nagrand</option>
				<option value="152">WOW US / Nathrezim</option>
				<option value="153">WOW US / Nazgrel</option>
				<option value="154">WOW US / Nazjatar</option>
				<option value="638">WOW US / Nemesis</option>
				<option value="155">WOW US / Ner'zhul</option>
				<option value="485">WOW US / Nesingwary</option>
				<option value="486">WOW US / Nesingwary</option>
				<option value="156">WOW US / Nordrassil</option>
				<option value="157">WOW US / Norgannon</option>
				<option value="158">WOW US / Onyxia</option>
				<option value="159">WOW US / Perenolde</option>
				<option value="160">WOW US / Proudmoore</option>
				<option value="161">WOW US / Quel'dorei</option>
				<option value="162">WOW US / Quel'Thalas</option>
				<option value="163">WOW US / Ragnaros</option>
				<option value="164">WOW US / Ravencrest</option>
				<option value="165">WOW US / Ravenholdt</option>
				<option value="166">WOW US / Rexxar</option>
				<option value="167">WOW US / Rivendare</option>
				<option value="168">WOW US / Runetotem</option>
				<option value="169">WOW US / Sargeras</option>
				<option value="480">WOW US / Saurfang</option>
				<option value="170">WOW US / Scarlet Crusade</option>
				<option value="171">WOW US / Scilla</option>
				<option value="172">WOW US / Sen'Jin</option>
				<option value="173">WOW US / Sentinels</option>
				<option value="174">WOW US / Shadow Council</option>
				<option value="175">WOW US / Shadowmoon</option>
				<option value="176">WOW US / Shadowsong</option>
				<option value="177">WOW US / Shandris</option>
				<option value="178">WOW US / Shattered Halls</option>
				<option value="179">WOW US / Shattered Hand</option>
				<option value="180">WOW US / Shu'halo</option>
				<option value="181">WOW US / Silver Hand</option>
				<option value="182">WOW US / Silvermoon</option>
				<option value="183">WOW US / Sisters of Elune</option>
				<option value="184">WOW US / Skullcrusher</option>
				<option value="185">WOW US / Skywall</option>
				<option value="186">WOW US / Smolderthorn</option>
				<option value="187">WOW US / Spinebreaker</option>
				<option value="188">WOW US / Spirestone</option>
				<option value="189">WOW US / Staghelm</option>
				<option value="190">WOW US / Steamwheedle Cartel</option>
				<option value="191">WOW US / Stonemaul</option>
				<option value="192">WOW US / Stormrage</option>
				<option value="193">WOW US / Stormreaver</option>
				<option value="194">WOW US / Stormscale</option>
				<option value="195">WOW US / Suramar</option>
				<option value="196">WOW US / Tanaris</option>
				<option value="197">WOW US / Terenas</option>
				<option value="198">WOW US / Terokkar</option>
				<option value="199">WOW US / Thaurissan</option>
				<option value="200">WOW US / The Forgotten Coast</option>
				<option value="201">WOW US / The Scryers</option>
				<option value="202">WOW US / The Underbog</option>
				<option value="203">WOW US / The Venture Co</option>
				<option value="204">WOW US / Thorium Brotherhood</option>
				<option value="205">WOW US / Thrall</option>
				<option value="206">WOW US / Thunderhorn</option>
				<option value="207">WOW US / Thunderlord</option>
				<option value="208">WOW US / Tichondrius</option>
				<option value="209">WOW US / Tortheldrin</option>
				<option value="210">WOW US / Trollbane</option>
				<option value="211">WOW US / Turalyon</option>
				<option value="212">WOW US / Twisting Nether</option>
				<option value="213">WOW US / Uldaman</option>
				<option value="214">WOW US / Uldum</option>
				<option value="215">WOW US / Undermine</option>
				<option value="216">WOW US / Ursin</option>
				<option value="217">WOW US / Uther</option>
				<option value="218">WOW US / Vashj</option>
				<option value="219">WOW US / Vek'nilash</option>
				<option value="220">WOW US / Velen</option>
				<option value="221">WOW US / Warsong</option>
				<option value="222">WOW US / Whisperwind</option>
				<option value="223">WOW US / WildHammer</option>
				<option value="224">WOW US / Windrunner</option>
				<option value="553">WOW US / Winterhoof</option>
				<option value="484">WOW US / Wyrmrest Accord</option>
				<option value="225">WOW US / Ysera</option>
				<option value="226">WOW US / Ysondre</option>
				<option value="227">WOW US / Zangarmarsh</option>
				<option value="228">WOW US / Zul'jin</option>
				<option value="229">WOW US / Zuluhed</option>
				<option value="338">WOW EU / Aegwynn</option>
				<option value="230">WOW EU / Aerie Peak</option>
				<option value="231">WOW EU / Agamaggan</option>
				<option value="634">WOW EU / Aggra (Português)</option>
				<option value="232">WOW EU / Aggramar</option>
				<option value="233">WOW EU / Ahn'Qiraj</option>
				<option value="234">WOW EU / Al'Akir</option>
				<option value="339">WOW EU / Alexstrasza</option>
				<option value="340">WOW EU / Alleria</option>
				<option value="235">WOW EU / Alonsus</option>
				<option value="341">WOW EU / Aman'Thul</option>
				<option value="342">WOW EU / Ambossar</option>
				<option value="236">WOW EU / Anachronos</option>
				<option value="343">WOW EU / Anetheron</option>
				<option value="344">WOW EU / Antonidas</option>
				<option value="345">WOW EU / Anub'arak</option>
				<option value="421">WOW EU / Arak-arahm</option>
				<option value="422">WOW EU / Arathi</option>
				<option value="237">WOW EU / Arathor</option>
				<option value="423">WOW EU / Archimonde</option>
				<option value="238">WOW EU / Argent Dawn</option>
				<option value="346">WOW EU / Arthas</option>
				<option value="347">WOW EU / Arygos</option>
				<option value="239">WOW EU / Aszune</option>
				<option value="240">WOW EU / Auchindoun</option>
				<option value="241">WOW EU / Azjol-Nerub</option>
				<option value="348">WOW EU / Azshara</option>
				<option value="686">WOW EU / Azuremyst</option>
				<option value="349">WOW EU / Baelgun</option>
				<option value="242">WOW EU / Balnazzar</option>
				<option value="350">WOW EU / Blackhand</option>
				<option value="351">WOW EU / Blackmoore</option>
				<option value="352">WOW EU / Blackrock</option>
				<option value="243">WOW EU / Blade's Edge</option>
				<option value="244">WOW EU / Bladefist</option>
				<option value="245">WOW EU / Bloodfeather</option>
				<option value="246">WOW EU / Bloodhoof</option>
				<option value="247">WOW EU / Bloodscalp</option>
				<option value="353">WOW EU / Blutkessel</option>
				<option value="248">WOW EU / Boulderfist</option>
				<option value="249">WOW EU / Bronze Dragonflight</option>
				<option value="250">WOW EU / Bronzebeard</option>
				<option value="251">WOW EU / Burning Blade</option>
				<option value="252">WOW EU / Burning Legion</option>
				<option value="253">WOW EU / Burning Steppes</option>
				<option value="458">WOW EU / C'Thun</option>
				<option value="488">WOW EU / Chamber of Aspects</option>
				<option value="424">WOW EU / Chants éternels</option>
				<option value="425">WOW EU / Cho'gall</option>
				<option value="254">WOW EU / Chromaggus</option>
				<option value="426">WOW EU / Confrérie du Thorium</option>
				<option value="427">WOW EU / Conseil des Ombres</option>
				<option value="255">WOW EU / Crushridge</option>
				<option value="428">WOW EU / Culte de la Rive noire</option>
				<option value="256">WOW EU / Daggerspine</option>
				<option value="429">WOW EU / Dalaran</option>
				<option value="354">WOW EU / Dalvengyr</option>
				<option value="257">WOW EU / Darkmoon Faire</option>
				<option value="258">WOW EU / Darksorrow</option>
				<option value="259">WOW EU / Darkspear</option>
				<option value="355">WOW EU / Das Konsortium</option>
				<option value="356">WOW EU / Das Syndikat</option>
				<option value="489">WOW EU / Dawnbringer</option>
				<option value="260">WOW EU / Deathwing</option>
				<option value="261">WOW EU / Defias Brotherhood</option>
				<option value="262">WOW EU / Dentarg</option>
				<option value="357">WOW EU / Der abyssische Rat</option>
				<option value="358">WOW EU / Der Mithrilorden</option>
				<option value="359">WOW EU / Der Rat von Dalaran</option>
				<option value="360">WOW EU / Destromath</option>
				<option value="361">WOW EU / Dethecus</option>
				<option value="362">WOW EU / Die Aldor</option>
				<option value="363">WOW EU / Die Arguswacht</option>
				<option value="364">WOW EU / Die ewige Wacht</option>
				<option value="365">WOW EU / Die Nachtwache</option>
				<option value="366">WOW EU / Die Silberne Hand</option>
				<option value="367">WOW EU / Die Todeskrallen</option>
				<option value="263">WOW EU / Doomhammer</option>
				<option value="264">WOW EU / Draenor</option>
				<option value="265">WOW EU / Dragonblight</option>
				<option value="266">WOW EU / Dragonmaw</option>
				<option value="267">WOW EU / Drak'thul</option>
				<option value="430">WOW EU / Drek'Thar</option>
				<option value="459">WOW EU / Dun Modr</option>
				<option value="368">WOW EU / Dun Morogh</option>
				<option value="268">WOW EU / Dunemaul</option>
				<option value="369">WOW EU / Durotan</option>
				<option value="269">WOW EU / Earthen Ring</option>
				<option value="370">WOW EU / Echsenkessel</option>
				<option value="431">WOW EU / Eitrigg</option>
				<option value="432">WOW EU / Eldre'Thalas</option>
				<option value="433">WOW EU / Elune</option>
				<option value="270">WOW EU / Emerald Dream</option>
				<option value="271">WOW EU / Emeriss</option>
				<option value="272">WOW EU / Eonar</option>
				<option value="371">WOW EU / Eredar</option>
				<option value="273">WOW EU / Executus</option>
				<option value="460">WOW EU / Exodar</option>
				<option value="372">WOW EU / Festung der Stürme</option>
				<option value="373">WOW EU / Forscherliga</option>
				<option value="274">WOW EU / Frostmane</option>
				<option value="374">WOW EU / Frostmourne</option>
				<option value="275">WOW EU / Frostwhisper</option>
				<option value="375">WOW EU / Frostwolf</option>
				<option value="434">WOW EU / Garona</option>
				<option value="276">WOW EU / Genjuros</option>
				<option value="277">WOW EU / Ghostlands</option>
				<option value="376">WOW EU / Gilneas</option>
				<option value="377">WOW EU / Gorgonnash</option>
				<option value="278">WOW EU / Grim Batol</option>
				<option value="378">WOW EU / Gul'dan</option>
				<option value="279">WOW EU / Hakkar</option>
				<option value="280">WOW EU / Haomarush</option>
				<option value="281">WOW EU / Hellfire</option>
				<option value="282">WOW EU / Hellscream</option>
				<option value="435">WOW EU / Hyjal</option>
				<option value="436">WOW EU / Illidan</option>
				<option value="283">WOW EU / Jaedenar</option>
				<option value="437">WOW EU / Kael'thas</option>
				<option value="284">WOW EU / Karazhan</option>
				<option value="379">WOW EU / Kargath</option>
				<option value="285">WOW EU / Kazzak</option>
				<option value="380">WOW EU / Kel'Thuzad</option>
				<option value="286">WOW EU / Khadgar</option>
				<option value="438">WOW EU / Khaz Modan</option>
				<option value="381">WOW EU / Khaz'goroth</option>
				<option value="382">WOW EU / Kil'Jaeden</option>
				<option value="287">WOW EU / Kilrogg</option>
				<option value="439">WOW EU / Kirin Tor</option>
				<option value="288">WOW EU / Kor'gall</option>
				<option value="383">WOW EU / Krag'jin</option>
				<option value="440">WOW EU / Krasus</option>
				<option value="289">WOW EU / Kul Tiras</option>
				<option value="384">WOW EU / Kult der Verdammten</option>
				<option value="441">WOW EU / La Croisade écarlate</option>
				<option value="290">WOW EU / Laughing Skull</option>
				<option value="442">WOW EU / Les Clairvoyants</option>
				<option value="443">WOW EU / Les Sentinelles</option>
				<option value="291">WOW EU / Lightbringer</option>
				<option value="292">WOW EU / Lightning's Blade</option>
				<option value="385">WOW EU / Lordaeron</option>
				<option value="461">WOW EU / Los Errantes</option>
				<option value="386">WOW EU / Lothar</option>
				<option value="387">WOW EU / Madmortem</option>
				<option value="293">WOW EU / Magtheridon</option>
				<option value="388">WOW EU / Mal'Ganis</option>
				<option value="389">WOW EU / Malfurion</option>
				<option value="390">WOW EU / Malygos</option>
				<option value="391">WOW EU / Mannoroth</option>
				<option value="444">WOW EU / Marécage de Zangar</option>
				<option value="294">WOW EU / Mazrigos</option>
				<option value="445">WOW EU / Medivh</option>
				<option value="462">WOW EU / Minahonda</option>
				<option value="295">WOW EU / Molten Core</option>
				<option value="296">WOW EU / Moonglade</option>
				<option value="392">WOW EU / Mug'thol</option>
				<option value="297">WOW EU / Nagrand</option>
				<option value="393">WOW EU / Nathrezim</option>
				<option value="446">WOW EU / Naxxramas</option>
				<option value="394">WOW EU / Nazjatar</option>
				<option value="395">WOW EU / Nefarian</option>
				<option value="684">WOW EU / Nemesis</option>
				<option value="298">WOW EU / Neptulon</option>
				<option value="447">WOW EU / Ner'zhul</option>
				<option value="396">WOW EU / Nera'thor</option>
				<option value="397">WOW EU / Nethersturm</option>
				<option value="299">WOW EU / Nordrassil</option>
				<option value="398">WOW EU / Norgannon</option>
				<option value="399">WOW EU / Nozdormu</option>
				<option value="400">WOW EU / Onyxia</option>
				<option value="300">WOW EU / Outland</option>
				<option value="401">WOW EU / Perenolde</option>
				<option value="685">WOW EU / Pozzo dell'Eternità</option>
				<option value="402">WOW EU / Proudmoore</option>
				<option value="301">WOW EU / Quel'Thalas</option>
				<option value="302">WOW EU / Ragnaros</option>
				<option value="403">WOW EU / Rajaxx</option>
				<option value="448">WOW EU / Rashgarroth</option>
				<option value="303">WOW EU / Ravencrest</option>
				<option value="304">WOW EU / Ravenholdt</option>
				<option value="404">WOW EU / Rexxar</option>
				<option value="305">WOW EU / Runetotem</option>
				<option value="636">WOW EU / sanguino</option>
				<option value="449">WOW EU / Sargeras</option>
				<option value="487">WOW EU / Saurfang</option>
				<option value="306">WOW EU / Scarshield Legion</option>
				<option value="405">WOW EU / Sen'jin</option>
				<option value="307">WOW EU / Shadowmoon</option>
				<option value="308">WOW EU / Shadowsong</option>
				<option value="309">WOW EU / Shattered Halls</option>
				<option value="310">WOW EU / Shattered Hand</option>
				<option value="406">WOW EU / Shattrath</option>
				<option value="463">WOW EU / Shen'dralar</option>
				<option value="311">WOW EU / Silvermoon</option>
				<option value="450">WOW EU / Sinstralis</option>
				<option value="312">WOW EU / Skullcrusher</option>
				<option value="313">WOW EU / Spinebreaker</option>
				<option value="629">WOW EU / Sporeggar</option>
				<option value="314">WOW EU / Steamwheedle Cartel</option>
				<option value="315">WOW EU / Stonemaul</option>
				<option value="316">WOW EU / Stormrage</option>
				<option value="317">WOW EU / Stormreaver</option>
				<option value="318">WOW EU / Stormscale</option>
				<option value="319">WOW EU / Sunstrider</option>
				<option value="451">WOW EU / Suramar</option>
				<option value="320">WOW EU / Sylvanas</option>
				<option value="407">WOW EU / Taerar</option>
				<option value="321">WOW EU / Talnivarr</option>
				<option value="322">WOW EU / Tarren Mill</option>
				<option value="408">WOW EU / Teldrassil</option>
				<option value="452">WOW EU / Temple noir</option>
				<option value="323">WOW EU / Terenas</option>
				<option value="637">WOW EU / terokkar</option>
				<option value="409">WOW EU / Terrordar</option>
				<option value="324">WOW EU / The Maelstrom</option>
				<option value="325">WOW EU / The Sha'tar</option>
				<option value="326">WOW EU / The Venture Co</option>
				<option value="410">WOW EU / Theradras</option>
				<option value="411">WOW EU / Thrall</option>
				<option value="453">WOW EU / Throk'Feroth</option>
				<option value="327">WOW EU / Thunderhorn</option>
				<option value="412">WOW EU / Tichondrius</option>
				<option value="413">WOW EU / Tirion</option>
				<option value="414">WOW EU / Todeswache</option>
				<option value="328">WOW EU / Trollbane</option>
				<option value="329">WOW EU / Turalyon</option>
				<option value="330">WOW EU / Twilight's Hammer</option>
				<option value="331">WOW EU / Twisting Nether</option>
				<option value="464">WOW EU / Tyrande</option>
				<option value="454">WOW EU / Uldaman</option>
				<option value="687">WOW EU / ulduar</option>
				<option value="465">WOW EU / Uldum</option>
				<option value="415">WOW EU / Un'Goro</option>
				<option value="455">WOW EU / Varimathras</option>
				<option value="332">WOW EU / Vashj</option>
				<option value="416">WOW EU / Vek'lor</option>
				<option value="333">WOW EU / Vek'nilash</option>
				<option value="456">WOW EU / Vol'jin</option>
				<option value="334">WOW EU / Warsong</option>
				<option value="335">WOW EU / Wildhammer</option>
				<option value="483">WOW EU / Winterhoof</option>
				<option value="417">WOW EU / Wrathbringer</option>
				<option value="336">WOW EU / Xavius</option>
				<option value="418">WOW EU / Ysera</option>
				<option value="457">WOW EU / Ysondre</option>
				<option value="337">WOW EU / Zenedar</option>
				<option value="419">WOW EU / Zirkel des Cenarius</option>
				<option value="466">WOW EU / Zul'Jin</option>
				<option value="420">WOW EU / Zuluhed</option>
				<option value="467">WOW EU / Азурегос</option>
				<option value="468">WOW EU / Вечная Песня</option>
				<option value="469">WOW EU / Гордунни</option>
				<option value="470">WOW EU / Пиратская бухта</option>
				<option value="471">WOW EU / Термоштепсель</option>
				<option value="472">WOW EU / Ясеневый лес</option>
				<option value="630">RIFT US / Emberlord</option>
				<option value="571">Aedraxis</option>
				<option value="572">Akylios</option>
				<option value="573">Alsbeth</option>
				<option value="574">Amardis</option>
				<option value="575">Arcanis</option>
				<option value="576">Ashstone</option>
				<option value="577">Asphodel</option>
				<option value="578">Atrophinius</option>
				<option value="579">Belmont</option>
				<option value="580">Briarcliff</option>
				<option value="581">Byriel</option>
				<option value="582">Carrion</option>
				<option value="583">Corthana</option>
				<option value="584">Crucia</option>
				<option value="585">Dayblind</option>
				<option value="586">Deepstrike</option>
				<option value="587">Deepwood</option>
				<option value="588">Dimroot</option>
				<option value="589">Emberlord</option>
				<option value="590">Endless</option>
				<option value="591">Epoch</option>
				<option value="592">Estrael</option>
				<option value="593">Faeblight</option>
				<option value="594">Faemist</option>
				<option value="595">Freeholme</option>
				<option value="596">Galena</option>
				<option value="597">Gnarlwood</option>
				<option value="598">Greenscale</option>
				<option value="599">Greybriar</option>
				<option value="600">Hammerlord</option>
				<option value="601">Harrow</option>
				<option value="602">Kaleida</option>
				<option value="603">Keenblade</option>
				<option value="604">Kelpmere</option>
				<option value="605">Laethys</option>
				<option value="606">Lotham</option>
				<option value="607">Millrush</option>
				<option value="608">Molinar</option>
				<option value="609">Neddra</option>
				<option value="610">Nyx</option>
				<option value="611">Perspice</option>
				<option value="612">Plutonus</option>
				<option value="613">Rasmolov</option>
				<option value="614">Reclaimer</option>
				<option value="615">Regulos</option>
				<option value="616">Rocklift</option>
				<option value="617">Seastone</option>
				<option value="618">Shadefallen</option>
				<option value="619">Shatterbone</option>
				<option value="620">Silkweb</option>
				<option value="621">Snarebrush</option>
				<option value="622">Spitescar</option>
				<option value="623">Stonecrest</option>
				<option value="624">Sunrest</option>
				<option value="625">Tearfall</option>
				<option value="626">Threesprings</option>
				<option value="627">Todrin</option>
				<option value="628">Wolfsbane</option>
				<option value="639">GW2 US / Anvil Rock</option>
				<option value="640">GW2 US / Blackgate</option>
				<option value="641">GW2 US / Borlis Pass</option>
				<option value="642">GW2 US / Crystal Desert</option>
				<option value="643">GW2 US / Darkhaven</option>
				<option value="644">GW2 US / Dragonbrand</option>
				<option value="645">GW2 US / Ehmry Bay</option>
				<option value="646">GW2 US / Ferguson's Crossing</option>
				<option value="647">GW2 US / Fort Aspenwood</option>
				<option value="648">GW2 US / Gate of Madness</option>
				<option value="649">GW2 US / Henge of Denravi</option>
				<option value="650">GW2 US / Isle of Janthir</option>
				<option value="651">GW2 US / Jade Quarry</option>
				<option value="688">GW2 US / Kaineng</option>
				<option value="652">GW2 US / Maguuma</option>
				<option value="653">GW2 US / Northern Shiverpeaks</option>
				<option value="654">GW2 US / Sanctum of Rall</option>
				<option value="655">GW2 US / Sea of Sorrows</option>
				<option value="656">GW2 US / Sorrow's Furnace</option>
				<option value="657">GW2 US / Stormbluff Isle</option>
				<option value="658">GW2 US / Tarnished Coast</option>
				<option value="659">GW2 US / Yak's Bend</option>
				<option value="660">GW2 EU / Abaddon's Mouth</option>
				<option value="661">GW2 EU / Augury Rock</option>
				<option value="662">GW2 EU / Aurora Glade</option>
				<option value="663">GW2 EU / Baruch Bay</option>
				<option value="664">GW2 EU / Blacktide</option>
				<option value="665">GW2 EU / Desolation</option>
				<option value="666">GW2 EU / Drakkar lake</option>
				<option value="667">GW2 EU / Elona Reach</option>
				<option value="668">GW2 EU / Far Shiverpeaks</option>
				<option value="669">GW2 EU / Fissure of Woe</option>
				<option value="670">GW2 EU / Fort Ranik</option>
				<option value="671">GW2 EU / Gandara</option>
				<option value="672">GW2 EU / Gunnar's Hold</option>
				<option value="673">GW2 EU / Jade Sea</option>
				<option value="674">GW2 EU / Kodash</option>
				<option value="675">GW2 EU / Piken Square</option>
				<option value="676">GW2 EU / Ring of Fire</option>
				<option value="677">GW2 EU / Riverside</option>
				<option value="678">GW2 EU / Ruins of Surmia</option>
				<option value="679">GW2 EU / Seafarer's Rest</option>
				<option value="680">GW2 EU / Underworld</option>
				<option value="681">GW2 EU / Vabbi</option>
				<option value="682">GW2 EU / Vizunah Square</option>
				<option value="683">GW2 EU / Whiteside Ridge</option>
				<option value="554">FFXIV / Besaid</option>
				<option value="555">FFXIV / Bodhum</option>
				<option value="556">FFXIV / Cornelia</option>
				<option value="557">FFXIV / Fabul</option>
				<option value="558">FFXIV / Figaro</option>
				<option value="559">FFXIV / Gysahl</option>
				<option value="560">FFXIV / Istory</option>
				<option value="561">FFXIV / Kashuan</option>
				<option value="562">FFXIV / Lindblum</option>
				<option value="563">FFXIV / Melmond</option>
				<option value="564">FFXIV / Mysidia</option>
				<option value="565">FFXIV / Palamecia</option>
				<option value="566">FFXIV / Rabanastre</option>
				<option value="567">FFXIV / Saronia</option>
				<option value="568">FFXIV / Selbina</option>
				<option value="569">FFXIV / Trabia</option>
				<option value="570">FFXIV / Wutai</option>
				<option value="496">Aion US / Israphel-US-Asmodians</option>
				<option value="497">Aion US / Israphel-US-Elyos</option>
				<option value="506">Aion US / Nezekan-US-Asmodians</option>
				<option value="507">Aion US / Nezekan-US-Elyos</option>
				<option value="508">Aion US / Siel-US-Asmodians</option>
				<option value="509">Aion US / Siel-US-Elyos</option>
				<option value="512">Aion US / Vaizel-US-Asmodians</option>
				<option value="513">Aion US / Vaizel-US-Elyos</option>
				<option value="516">Aion US / Zikel-US-Asmodians</option>
				<option value="517">Aion US / Zikel-US-Elyos</option>
				<option value="518">Aion EU / Balder-EU-Asmodians</option>
				<option value="519">Aion EU / Balder-EU-Elyos</option>
				<option value="520">Aion EU / Castor-EU-Asmodians</option>
				<option value="521">Aion EU / Castor-EU-Elyos</option>
				<option value="522">Aion EU / Deltras-EU-Asmodians</option>
				<option value="523">Aion EU / Deltras-EU-Elyos</option>
				<option value="524">Aion EU / Gorgos-EU-Asmodians</option>
				<option value="525">Aion EU / Gorgos-EU-Elyos</option>
				<option value="526">Aion EU / Kahrun-EU-Asmodians</option>
				<option value="527">Aion EU / Kahrun-EU-Elyos</option>
				<option value="528">Aion EU / Kromede-EU-Asmodians</option>
				<option value="529">Aion EU / Kromede-EU-Elyos</option>
				<option value="530">Aion EU / Lephar-EU-Asmodians</option>
				<option value="531">Aion EU / Lephar-EU-Elyos</option>
				<option value="532">Aion EU / Nerthus-EU-Asmodians</option>
				<option value="533">Aion EU / Nerthus-EU-Elyos</option>
				<option value="534">Aion EU / Perento-EU-Asmodians</option>
				<option value="535">Aion EU / Perento-EU-Elyos</option>
				<option value="536">Aion EU / Spatalos-EU-Asmodians</option>
				<option value="537">Aion EU / Spatalos-EU-Elyos</option>
				<option value="538">Aion EU / Suthran-EU-Asmodians</option>
				<option value="539">Aion EU / Suthran-EU-Elyos</option>
				<option value="540">Aion EU / Telemachus-EU-Asmodians</option>
				<option value="541">Aion EU / Telemachus-EU-Elyos</option>
				<option value="542">Aion EU / Thor-EU-Asmodians</option>
				<option value="543">Aion EU / Thor-EU-Elyos</option>
				<option value="544">Aion EU / Urtem-EU-Asmodians</option>
				<option value="545">Aion EU / Urtem-EU-Elyos</option>
				<option value="546">Aion EU / Vidar-EU-Asmodians</option>
				<option value="547">Aion EU / Vidar-EU-Elyos</option>
				<option value="548">Aion EU / Votan-EU-Asmodians</option>
				<option value="549">Aion EU / Votan-EU-Elyos</option></select>
					</div>
					<div class="formField">
						<label>Coupon Code</label>
						<input class="textfield" id="coupon" name="coupon" style="width:140px" type="text">&nbsp;

						<a href="#" onclick="new Ajax.Request('https://www.vbarrack.com/coupons', {asynchronous:true, evalScripts:true, parameters:'coupon='+$('coupon').value + '&amp;authenticity_token=' + encodeURIComponent('wLvUGa2UQxlN431KR9kcbTtF1rMHYqqZ0iv9xO6h7lw=')}); return false;">Apply Code</a>
					</div>
					<div class="formField">
						<div id="coupon_error">
						</div>
					</div>
					</fieldset>
				</div>

				
			  <div class="globalForm clear">
			  <?php 
				$current_user =  wp_get_current_user(); 
				
				if($current_user->data == NULL){
			  ?>
				  <p>
					NOTE: As you are currently not logged in, please kindly register a new account or login if you already have an Virtual Barrack™ Account or choose the Guest Checkout
				  </p>
				<fieldset>
				  <?php do_action( 'wordpress_social_login' ); ?>	
				  
				  <div class="formField">
					<label for="register_type">Type</label>

					<input checked="checked" id="register_type_new" name="register_type" onclick="$('password_confirmation').show();$('user_msn_email').show();$('user_login').show();$('user_password').show()" type="radio" value="new">  
					<b>New</b>&nbsp;
					<input id="register_type_registered" name="register_type" onclick="$('password_confirmation').hide();$('user_msn_email').hide();$('user_login').show();$('user_password').show()" type="radio" value="registered"> 
					<b>Registered</b>&nbsp;
					<br>
					<input id="register_type_guest" name="register_type" onclick="$('password_confirmation').hide();$('user_msn_email').hide();$('user_login').hide();$('user_password').hide()" type="radio" value="guest"> 
					<b>Express (No Member Login)</b>

				  </div>
				  
				  <div id="user_login" class="formField">
					<label for="user_login">Email <sub class="asterisk">*</sub></label>
					<input class="textfield required" id="user_login" name="user[login]" size="30" type="text">
				  </div>
				  <div id="user_password" class="formField">
					<label for="user_password">Password <sub class="asterisk">*</sub></label>
					<input class="textfield required" id="user_password" name="user[password]" size="30" type="password">
				  </div>
				  <div id="password_confirmation" class="formField">
					<label for="user_password_confirmation">Confirm Password <sub class="asterisk">*</sub></label>
					<input class="textfield required" id="user_password_confirmation" name="user[password_confirmation]" size="30" type="password">
				  </div>
				  
				</fieldset>
				<?php } ?>
			  </div>
			  
			  <div class="globalForm clear">
				<fieldset>
					<label for="order_payment_type">Payment Method</label>
					<div class="formField">
						<div class="formField">
							<table><tbody><tr><td>
								<input checked="checked" name="order[payment_type]" type="radio" value="paypal"  >  
							</td><td>
						  
							<img alt="Paypal_mc_visa_amex_disc_210x80" src="<?php echo get_template_directory_uri(); ?>/img/paypal_mc_visa_amex_disc_210x80.gif">

							</td></tr></tbody></table>
						  
						</div>				
						<div class="formField">
							<table><tbody><tr><td>
								<input  name="order[payment_type]"  type="radio" value="paydollar">  
							</td><td>
							<img alt="paydollar" src="<?php echo get_template_directory_uri(); ?>/img/paydollar210x80.jpg">
							</td></tr></tbody></table>
						</div>
					</div>
				</fieldset>
			  </div>

			  <div class="clear"></div>
			  <div id="checkboxes">
				<fieldset>
				<div id="_terms" class="formField firstField">
				  
				  <input id="terms" name="order[terms]" type="checkbox"  checked="checked" >
				  <label for="terms" class="checkboxLabel">I agree to the <a href="#" target="_blank">Terms and Conditions</a>
				  </label>
				  <div class="valText">Please agree to the terms &amp; conditions </div>
				</div>
				
				<div id="_terms2" class="formField firstField">
				  <input id="return_policy" name="order[return_policy]" type="checkbox"  checked="checked" >
				  <label for="return_policy" class="checkboxLabel">I agree to the <a href="#" target="_blank">Return Policy</a>
				  </label>
				  <div class="valText">Please agree to the policy &amp; conditions </div>
				</div>

				<div id="_terms3" class="formField firstField">
				 
				  <input id="privacy" name="order[privacy]" type="checkbox"   checked="checked">
				  <label for="privacy" class="checkboxLabel">I agree to the <a href="#" target="_blank">Privacy Policy</a>
				  </label>
				  <div class="valText">Please agree to the privacy &amp; conditions </div>
				</div>
				<div id="_terms4" class="formField firstField">
			 
				  <input id="faqs" name="order[faqs]" type="checkbox"  checked="checked" >
				  <label for="faqs" class="checkboxLabel">I have read through <a href="#" target="_blank">the FAQs</a>
				  </label>
				  <div class="valText">Please agree to the faqs &amp; conditions </div>
				</div>
				
			   
				<div class="formField">
				  <ul>
					<li>· Please note that possible account termination will happen when using illegal leveling or illegally obtained gold services</li>
					<li>· Improper ingame activities will lead to suspension of the accounts.</li>
					<li>· Account compromise is illegal, account closure will be resulted.</li>
				  </ul>
				</div>
				</fieldset>
			  </div>
			  <div>
				<input id="buy_total" name="total" type="hidden" value="<?php echo $total;?>" />
				<input id="on" name="on" type="hidden" value="<?php echo $on;?>" />
				<input id="lang" name="lang" type="hidden" value="<?php echo $money_country;?>" />
				<input id="userid" name="userid" type="hidden" value="<?php if($current_user->data != NULL){echo $current_user->ID;} ?>" />
				
				<!--<input id="order_submit" name="commit" onclick="if (window.hiddenCommit) { window.hiddenCommit.setAttribute('value', this.value); }else { hiddenCommit = document.createElement('input');hiddenCommit.type = 'hidden';hiddenCommit.value = this.value;hiddenCommit.name = this.name;this.form.appendChild(hiddenCommit); }this.setAttribute('originalValue', this.value);this.disabled = true;this.value='Processing...';result = (this.form.onsubmit ? (this.form.onsubmit() ? this.form.submit() : false) : this.form.submit());if (result == false) { this.value = this.getAttribute('originalValue');this.disabled = false; }return result;" type="button" value="Confirm and Proceed Payment" style="cursor: pointer;">-->
				<input id="order_submit" name="commit"  type="button" value="Confirm and Proceed Payment" style="cursor: pointer;">
			  </div>

				</div>
			</div>
		</form>
		</div>
	</div> 
</div>



<?php get_footer(); ?>