<?php
/***********************************************************
SetExpressCheckout.php

This is the main web page for the Express Checkout sample.
The page allows the user to enter amount and currency type.
It also accept input variable paymentType which becomes the
value of the PAYMENTACTION parameter.

When the user clicks the Submit button, ReviewOrder.php is
called.

Called by index.html.

Calls ReviewOrder.php.

***********************************************************/
// clearing the session before starting new API Call
session_unset();
	
	$paymentType = 'Sale';
?>
	<form action="paypal/ReviewOrder.php" method="POST">
		<input type=hidden name=paymentType value='<?php echo $paymentType?>' >
		<input type="hidden" name="item_name" value="Invoice#<?php echo $on;?> on vbarrack.com">
		<input type="hidden" name="amount" value="<?php echo $total;?>">
		<input type="hidden" name="currency_code" value="<?php echo $lang;?>">


		<!-- Prompt buyers to enter their desired quantities. -->
		<input type="hidden" name="quantity" value="1">
    </form>