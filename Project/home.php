<?php
require(__DIR__ . "/../partials/nav.php");
?>
<h1>Home</h1>
<?php

if (is_logged_in(true)) {
    //comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}
?>

<div class="list-group">
  <a href="<?php echo get_url('my_accounts.php'); ?>" class="list-group-item list-group-item-action active" aria-current="true">
    View My Accounts
  </a>
  <a href="<?php echo get_url('create_account.php'); ?>" class="list-group-item list-group-item-action">Create an Account</a>
  <a href="<?php echo get_url('deposit.php'); ?>" class="list-group-item list-group-item-action">Deposit</a>
  <a href="<?php echo get_url('withdraw.php'); ?>" class="list-group-item list-group-item-action">Withdraw</a>
  <a href="<?php echo get_url('transfer.php'); ?>" class="list-group-item list-group-item-action">Transfer</a>
</div>

<?php
require(__DIR__ . "/../partials/flash.php");
?>