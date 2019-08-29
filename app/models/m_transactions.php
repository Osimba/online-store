<?php

/*
    Transactions Class
    Handle all tasks related to Transactions

    Empties cart

    $_SESSION['cart']['product_id'] = num of specified item in cart

    ex: $_SESSION['cart'][1] = 1 -if adding beach toys who's id is 1
*/

class Transactions
{
    private $Database;
    private $db_table = 'transactions';

    function __construct()
    {
        global $Database;
        $this->Database = $Database;
    }

    /*
        Getters and Setters
    */

    /**
     * Return an array of all transactions
     * 
     * @access public
     * @param 
     * @return array, null
     */
    public function get($id = NULL) {
        $data = array();

        if($id != NULL) {

            //get one transaction
            if($stmt = $this->Database->prepare("SELECT
                $this->db_table.id,
                $this->db_table.product,
                $this->db_table.amount,
                $this->db_table.currency,
                $this->db_table.status,
                $this->db_table.created_at,
                customers.first_name AS customer_name
                FROM $this->db_table, customers
                WHERE $this->db_table.id = ? AND $this->db_table.customer_id = customers.id")) {

                $stmt->bind_param("i", $id);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($trans_id, $trans_product, $trans_amount, $trans_currency, $trans_status, $trans_created_at, $cust_name);
                $stmt->fetch();

                if ($stmt->num_rows > 0) {
                    $data = array('id' => $trans_id, 'product' => $trans_product, 'amount' => $trans_amount, 'currency' => $trans_currency, 'status' => $trans_status, 'created_at' => $trans_created_at, 'customer_name' => $cust_name);
                }
                $stmt->close();

            }
        } else {

            // get all transactions
            if($result = $this->Database->query("SELECT * FROM " . $this->db_table . "
                ORDER BY last_name")) {
                
                if ($result->num_rows > 0) {
                    
                    while ($row = $result->fetch_array()) {
                        $data[] = array(
                            'id' =>$row['id'],
                            'product' =>$row['product'],
                            'amount' =>$row['amount'],
                            'currency' =>$row['currency'],
                            'status' =>$row['status'],
                            'created_at' =>$row['created_at']
                        );
                    }
                }
            }

        }

        return $data;

    } //get()


    public function add_transaction($id, $product, $amount, $currency, $status, $created_at) {

        if($stmt = $this->Database->prepare("INSERT INTO transactions (id, product, amount, currency, status, created_at) VALUES (?, ?, ?, ?, ?, ?)")) {

            $stmt->bind_param("ssdsss", $product, $amount, $currency, $status, $created_at);
            $stmt->execute();

            return $id;
        }
    }
    

     

}