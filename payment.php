<?php

include('app/init.php');

$Template->set_data('page_class', 'paymentpage');


//get category nav
$category_nav = $Categories->create_category_nav('');
$Template->set_Data('page_nav', $category_nav);

$Template->load('app/views/v_public_payment.php', 'Payment Page');