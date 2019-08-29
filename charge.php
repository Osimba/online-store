<?php
	require_once('vendor/autoload.php');

	\Stripe\Stripe::setApiKey('sk_test_9djIyU6PL02OsKkEj79SLmAG00vy3Eqn1K');

	// Sanitize POST Array
	$POST = filter_var_Array($_POST, FILTER_SANITIZE_STRING);

	$first_name = $POST['first_name'];
	$last_name = $POST['last_name'];
	$email = $POST['email'];
	$token = $POST['stripeToken'];

	// Create Customer in Stripe
	$customer = \Stripe\Customer::create(array(
		"email" => $email,
		"source" => $token
	));

	// Charge Customer
	$charge = \Stripe\Charge::create(array(
		"amount" => 5000,
		"currency" => "usd",
		"description" => "Online Store Purchase",
		"customer" => $customer->id
	));

	$Transactions->addTransaction($charge->id, $customer->id, );


	// Redirect to success
	header('Location: success.php?tid=' . $charge->id . '&product=' . $charge->description);

/*
	print('<pre>');
	print_r($charge);
	print('</pre>');

$charge = \Stripe\Charge::create(['amount' => 2000, 'currency' => 'usd', 'source' => 'tok_189fqt2eZvKYlo2CTGBeg6Uq']);
echo $charge;*/