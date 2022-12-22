<?php
require(__DIR__ . "/../partials/nav.php");
?>
<div class="container-fluid">
    <h1>Home</h1>
    <div class="lead text-center mb-3">
        Welcome to Simple Bank!
    </div>
    
    <a href="<?php echo get_url('create_account.php'); ?>" class="list-group-item list-group-item-action">Create an Account</a>
  <a href="<?php echo get_url('accounts.php'); ?>" class="list-group-item list-group-item-action active" aria-current="true">
    View My Accounts
  </a>
  <a href="<?php echo get_url('withdraw.php'); ?>" class="list-group-item list-group-item-action">Withdraw</a>
  <a href="<?php echo get_url('deposit.php'); ?>" class="list-group-item list-group-item-action active" aria-current="true">
    Deposit
  </a>
  <a href="<?php echo get_url('externaltransfer.php'); ?>" class="list-group-item list-group-item-action">External Transfer</a>
  <a href="<?php echo get_url('home.php'); ?>" class="list-group-item list-group-item-action">Loan</a>

</div>
    
</div>
<?php
require(__DIR__ . "/../partials/flash.php");
?>