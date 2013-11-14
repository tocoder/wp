<?php
/*
 Template Name:Pay
*/
get_header();

//buyer information

$buyer_fullname		=	isset($_POST['order']['buyer_fullname'])	?	$_POST['order']['buyer_fullname']	:	'';
$buyer_email		=	isset($_POST['order']['buyer_email'])		?	$_POST['order']['buyer_email']		:	'';
$buyer_phone		=	isset($_POST['order']['buyer_phone'])		?	$_POST['order']['buyer_phone']		:	'';
$buyer_address		=	isset($_POST['order']['buyer_address'])		?	$_POST['order']['buyer_address']	:	'';
$buyer_country		=	isset($_POST['order']['buyer_country'])		?	$_POST['order']['buyer_country']	:	'';

$credit_card_type	=	isset($_POST['order']['payment_type'])		?	$_POST['order']['payment_type']		:	'';


//buy product information should for database
$current_user =  wp_get_current_user(); 


if($current_user->data != NULL){
	
	//update buyer information
	$sql	 =	"";
	$sql	.=	" UPDATE  wp_buy  SET  buyers_name='$buyer_fullname',";
	$sql	.=	" buyers_email='$buyer_email',";
	$sql	.=	" buyers_phone='$buyer_phone',";
	$sql	.=	" buyers_address='$buyer_address',";
	$sql	.=	" buyers_country='$buyer_country',";
	$sql	.=	" buyers_server_to_play='$credit_card_type'";
	$sql	.=  " where 1=1";
	$sql	.=	" and id =  $current_user->ID ";
	$wpdb->get_results( $sql );	
	
	
	
	$sql	 =	"";
	$sql	.=	" SELECT product_price,`on` FROM wp_buy where 1 ";
	$sql	.=	" and id = $current_user->ID ";
	$sql	.=	" ORDER BY `on` DESC";
	$myrows	=	$wpdb->get_results( $sql );	
	$total	=	0;
	$on		=	'';
	foreach($myrows as $value){
		$total	+=	$value->product_price;
		$on		=	$value->on;
	}
	
}

$lang				=	isset($_POST['lang'])						?	$_POST['lang']						:	'';





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
	<div id="container">
		<div id="buy_detailed">
			<div class="prepend-1 span-14"> 
				
				<h1>We are processing your Order … </h1>
				<p>Your will redirect to PayPal in a moment. If it doesn't, click here here or below to try again.</p>
<?php		
	switch($credit_card_type){

	case 'creditcard':
		break;
		
	case 'paypal':
		session_unset();
		$paymentType = 'Sale';
?>

	<form action="pay/paypal/" method="POST" name="form1">
		<input type="hidden" name="paymentType" value='<?php echo $paymentType;?>' >
		
		<input type="hidden" name="buyers_name" value='<?php echo $buyers_name;?>' >
		<input type="hidden" name="buyer_email" value='<?php echo $buyer_email;?>' >
		<input type="hidden" name="buyer_phone" value='<?php echo $buyer_phone;?>' >
		<input type="hidden" name="buyer_address" value='<?php echo $buyer_address;?>' >
		<input type="hidden" name="buyer_country" value='<?php echo $buyer_country;?>' >
		<input type="hidden" name="buyer_id" value='<?php echo $current_user->ID;?>' >
		
		
		
		<input type="hidden" name="item_name" value="Invoice#<?php echo $on;?> on vbarrack.com">
		<input type="hidden" name="amount" value="<?php echo $total;?>">
		<input type="hidden" name="currency_code" value="<?php echo $lang;?>">


		<!-- Prompt buyers to enter their desired quantities. -->
		<input type="hidden" name="quantity" value="1">
    </form>


<?php		
		break;
	case 'paydollar':
		$currCode	=	array('344'=>'HKD','840'=>'USD','702'=>'SGD','156'=>'CNY','392'=>'JPY',
		'901'=>'TWD','036'=>'AUD','978'=>'EUR','826'=>'GBP','124'=>'CAD','446'=>'MOP','608'=>'PHP',
		'764'=>'THB','458'=>'MYR','360'=>'IDR','410'=>'KRW','682'=>'SAR','554'=>'NZD','784'=>'AED',
		'096'=>'BND','704'=>'VND');
		
		if(in_array($lang,$currCode)){
			$currCode=array_flip($currCode);
			$code 	=	$currCode[$lang];
		} else{
			$code	=	'840';
		}

		
	
		$currLang	=	array('USD'=>'E','Chinese'=>'X','Korean'=>'K','Japanese'=>'J','Thai'=>'T');
		if(in_array($lang,$currLang)){
			$dollar_lang 	=	$currLang[$lang];
		}else{
			$dollar_lang	=	'E';
		}

		
?>
<!--       
		https://www.paydollar.com/b2c2/eng/payment/payForm.jsp   
		https://test.paydollar.com/b2cDemo/eng/payment/payForm.jsp  
-->
										 
<form name="form1" method="post" action="https://www.paydollar.com/b2c2/eng/payment/payForm.jsp">
<!-- merchantId 需要商人ID 
secureHash
*Please login to PayDollar Merchant Administration Tools and download client library with sample code under Support  Developer Corner.
-->
<input type="hidden" name="merchantId" value="88059480">  
 

<input type="hidden" name="amount" value="<?php echo $total;?>" >
<input type="hidden" name="orderRef" value="<?php echo $on;?>">
<input type="hidden" name="currCode" value="840" >


<input type="hidden" name="mpsMode" value="NIL" >
<input type="hidden" name="successUrl" value="http://seoacer.com/china/wp/thanks/">
<input type="hidden" name="failUrl" value="http://seoacer.com/china/wp/Fail.html">
<input type="hidden" name="cancelUrl" value="http://seoacer.com/china/wp/Cancel.html">
<input type="hidden" name="payType" value="N">

<input type="hidden" name="lang" value="<?php echo $dollar_lang;?>">

<input type="hidden" name="payMethod" value="CC">


<input type="hidden" name="secureHash" value="44f3760c201d3688440f62497736bfa2aadd1bc0">

</form>
<?php
		break;
	case 'moneybookers':
		break;		
}
?>
				
				<p>Order Invoice #<?php echo $on;?></p>
			</div>
		</div>
	</div>
</div>
<script language="JavaScript"> 
setTimeout("document.form1.submit()",100);
</script> 
<?php get_footer(); ?>