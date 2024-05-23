<?php

// Parent
class Account {
    // Properties
    public $account_no;
    public $account_name;
}

class Savings_account extends Account {
    public $rate;

    public function _construct($account_no, $account_name, $rate);
}

$saving_account = new SavingAccount("1234565434567", "John Doe");
$saving_account -> get