<?php

/*
    Payment Class
    Handle all tasks related to Payments through Stripe
*/

require('vendor/autoload.php')

class Payment
{
    function __construct() {
    	$this->api_context = $this->get_api_context();
    }

    /*
        Getters and Setters
    */

    /**
     * Return an array of all product infor for items in the cart
     * 
     * @access public
     * @param 
     * @return array, null
     */
    public function get_api_context()
    {
    	if(STRIPE_MODE == 'sandbox') {
    		\Stripe\Stripe::setApiKey(STRIPE_DEVAPI);
    	} else {
    		\Stripe\Stripe::setApiKey(STRIPE_LIVEAPI);
    	}
        
    }

     

}