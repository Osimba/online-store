<?php

/*
    INIT
    Basic configuration settings
*/

// connect to database
$server = 'localhost';
$user = 'root';
$pass = 'root';
$db = 'online_store';
$Database = new mysqli($server, $user, $pass, $db);

// error reporting
mysqli_report(MYSQLI_REPORT_ERROR); //allows me to see any errors/mistakes I make in mysqli
ini_set('display_errors', 1); //I see any errors/warnings php can show me

// set up constants
define('SITE_NAME', 'My Online Store');
define('SITE_PATH', 'http://localhost/online-store/');
define('IMAGE_PATH', 'http://localhost/online-store/resources/images/');
define('SHOP_TAX', '0.0875');

define('STRIPE_MODE', 'sandbox');
define('STRIPE_CURRENCY', 'USD');
define('STRIPE_DEVAPI', 'sk_test_9djIyU6PL02OsKkEj79SLmAG00vy3Eqn1K');
define('STRIPE_LIVEAPI', '');


// include objects
include('app/models/m_template.php');
include('app/models/m_categories.php');
include('app/models/m_products.php');
include('app/models/m_cart.php');
include('app/models/m_transactions.php');

// creates objects
$Template = new Template();
$Categories = new Categories();
$Products = new Products();
$Transactions = new Transactions();
$Cart = new Cart();


session_start();

// global
$Template->set_data('cart_total_items', $Cart->get_total_items());
$Template->set_data('cart_total_cost', $Cart->get_total_cost());