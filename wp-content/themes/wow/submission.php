<?php


if (HttpContext.Current.Request.UrlReferrer.Host != HttpContext.Current.Request.Url.Host){
$error_message	=	'';
$userid			=	isset($_POST['userid'])	?	$_POST['userid']	:	NULL;
$total			=	isset($_POST['total'])	?	$_POST['total']	:	'';


if( $userid != NULL ){
	

	//order
	$buyer_fullname		=	isset($_POST['order_buyer_fullname'])		?	$_POST['order_buyer_fullname']	:	'';
	$buyer_email		=	isset($_POST['order_buyer_email'])			?	$_POST['order_buyer_email']		:	'';
	$buyer_phone		=	isset($_POST['order_buyer_phone'])			?	$_POST['order_buyer_phone']		:	'';
	$buyer_address		=	isset($_POST['order_buyer_address'])		?	$_POST['order_buyer_address']	:	'';
	$buyer_country		=	isset($_POST['order_buyer_country'])		?	$_POST['order_buyer_country']	:	'';
	$terms				=	isset($_POST['terms'])						?	$_POST['terms']				:	'false';
	$return_policy		=	isset($_POST['return_policy'])				?	$_POST['return_policy']		:	'false';
	$privacy			=	isset($_POST['privacy'])					?	$_POST['privacy']			:	'false';
	$faqs				=	isset($_POST['faqs'])						?	$_POST['faqs']				:	'false';
	
	if($buyer_fullname == '' || $buyer_email == '' || $buyer_phone == '' || $buyer_address == ''  || $terms == 'false' || $return_policy == 'false' || $privacy == 'false' || $faqs == 'false' || $total==''){

		$error_message	.=	'<h3>There were problems with the following fields:</h3>';
		
		$error_message	.=	'<ul>';	

		if($buyer_fullname == ''){
			$error_message	.=	'<li>Buyer fullname can\'t be blank</li>';			
		}
		if($buyer_email == ''){
			$error_message	.=	'<li>Buyer email can\'t be blank</li>';
		}
		if($buyer_phone == ''){
			$error_message	.=	'<li>Buyer phone can\'t be blank</li>';
		}
		if($buyer_address == ''){
			$error_message	.=	'<li>Buyer address can\'t be blank</li>';
		}
		
		if($terms == 'false'){
			$error_message	.=	'<li>Terms must be accepted</li>';
		}
		if($return_policy == 'false'){
			$error_message	.=	'<li>Return policy must be accepted</li>';
		}
		if($privacy == 'false'){
			$error_message	.=	'<li>Privacy must be accepted</li>';
		}
		if($faqs == 'false'){
			$error_message	.=	'<li>Faqs must be accepted</li>';
		}
		if($total == ''){
			$error_message	.=	'<li>Shopping car is empty</li>';
		}
		 
		$error_message	.=	'</ul>';
	}
	
	if($buyer_fullname != '' && $buyer_email != '' && $buyer_phone != '' && $buyer_address != '' && $terms != 'false' && $return_policy != 'false'&& $privacy != 'false' && $faqs != 'false' && $total !=''  ){
		$error_message =	"success";
	}
}else if($userid == NULL){
	$error_message	=	'<p class="red big">';	
	$error_message	.=	'Fail to Login. The email you inputted may be registered before, Please Try Again. Forgotten your password? Or have any problem on login? Contact us through Live Chat!';
	$error_message	.=	'</p>';
}

$error_message =	"success"; 
echo $error_message;


}

?>