<?php
	include('app/init.php');
	require_once('vendor/autoload.php');

	\Stripe\Stripe::setApiKey('sk_test_9djIyU6PL02OsKkEj79SLmAG00vy3Eqn1K');

	// Sanitize POST Array
	$POST = filter_var_Array($_POST, FILTER_SANITIZE_STRING);

	$first_name = $POST['first_name'];
	$last_name = $POST['last_name'];
	$email = $POST['email'];
	$token = $POST['stripeToken'];
	$cart = $POST['cart'];
	$price = $cart['price'] * 100;

	// Create Customer in Stripe
	$customer = \Stripe\Customer::create(array(
		"email" => $email,
		"source" => $token
	));

	// Charge Customer
	$charge = \Stripe\Charge::create(array(
		"amount" => $price,
		"currency" => "usd",
		"description" => "Online Store Purchase",
		"customer" => $customer->id
	));

	$Transactions->addTransaction($charge->id, $customer->id, $cart['name'], $cart['price'], "usd", "Success", date("Y-m-d H:i:s"));


	// Redirect to success
	header('Location: success.php?tid=' . $charge->id . '&product=' . $charge->description);

