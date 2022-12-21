<?php

// Define a class for bank accounts
class BankAccount {
  // Initialize the balance to 0
  protected $balance = 0;

  // Function to deposit money into the account
  public function deposit($amount) {
    $this->balance += $amount;
  }

  // Function to withdraw money from the account
  public function withdraw($amount) {
    if ($amount > $this->balance) {
      echo "Insufficient funds.";
    } else {
      $this->balance -= $amount;
    }
  }

  // Function to get the current balance
  public function getBalance() {
    return $this->balance;
  }
}

// Create a new instance of the BankAccount class
$account = new BankAccount();

// Deposit some money into the account
$account->deposit(100);

// Withdraw some money from the account
$account->withdraw(50);

// Print the current balance
echo "Current balance: " . $account->getBalance();

