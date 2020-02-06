 <?php

	include('app/init.php');
	$Template->set_data('page_class', 'success');

	$purchaseInfo = $Template->get_data('cart_rows');

	$Cart->empty_cart();
	$Template->set_data('cart_total_items', 0);
	$Template->set_data('cart_total_cost', '0.00');

	//get category nav
	$category_nav = $Categories->create_category_nav('');
	$Template->set_Data('page_nav', $category_nav);


	$Template->load('app/views/v_public_success.php', 'Thank you!');

	
?>
