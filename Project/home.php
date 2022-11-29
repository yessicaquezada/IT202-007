<?php
require(__DIR__ . "/../partials/nav.php");
?>
<h1>Home</h1>
<?php
//TODO 1  replace the following 2 lines with the current if (is_logged()) { and flash("Welcome statemen")

if (is_logged_in()) {
    //flash("Welcome, " . get_user_email(");

// if (isset($_SESSION["user"]) && isset($_SESSION["user"]["email"])){
   // flash("Welcome, " . $_SESSION["user"]["email"];")
} else {
    flash("You're not logged in");
}
//shows session info
//TODO 1 flash("<pre>" . var_export($_SESSION, true) . "</pre>");
?>
<?php require_once(__DIR__ . "/../partials/flash.php");
