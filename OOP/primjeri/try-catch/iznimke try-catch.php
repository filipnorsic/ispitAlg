<?php

class AccountException extends Exception {}


class Account{
    private float $balance = 0;

    public function __construct(bool $isSavings = false)
    {
        if($isSavings){
            throw new Exception("Savings account not supported");
        }
    }

    public function deposit(float $amount): void {
        if($amount <= 0){
            throw new AccountException("Amount must be greater than 0");
        }
        $this->balance += $amount;
    }
}

try{
    $account = new Account();
    $account->deposit(100);
    var_dump($account);
} catch(AccountException $e){
    echo "Specific exception: " . $e->getMessage();
} catch(Exception $e){
    echo "General exception: " . $e->getMessage();
} 