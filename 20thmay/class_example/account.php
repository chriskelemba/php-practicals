<?php

// Parent
class Account {
    // Properties
    public $account_no = 4356788765646568;
    public $account_name = "John Doe";
    
    // Methods
    public function get_account_no() {
        echo $this -> account_no; // Object Access Operator
    }
}

// Create an object
$account = new Account();
$account -> get_account_no();
?>