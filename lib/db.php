<?php
/*
 * 9/29/2022 - added additional errors to check if the php.ini exists
 */
//for this we'll turn on error output so we can try to see any problems on the screen
//this will be active for any script that includes/requires this one
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function getDB(){
    global $db;
    //this function returns an existing connection or creates a new one if needed
    //and assigns it to the $db variable
    if(!isset($db)) {
        try{
            //__DIR__ helps get the correct path regardless of where the file is being called from
            //it gets the absolute path to this file, then we append the relative url (so up a directory and inside lib)
            require_once(__DIR__. "/config.php");//pull in our credentials
            //use the variables from config to populate our connection
            $connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";
            //using the PDO connector create a new connect to the DB
            //if no error occurs we're connected
            $db = new PDO($connection_string, $dbuser, $dbpass);
	    //the default fetch mode is FETCH_BOTH which returns the data as both an indexed array and associative array
	    //we'll override the default here so it's always fetched as an associative array
 	    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	}
   	catch(Exception $e){
            if($_SERVER['SERVER_NAME'] == "localhost") {
		        $whichMsg = shell_exec("which php 2>&1");
		        $whichMsg = substr_replace($whichMsg, ".ini", strlen($whichMsg)-1);
		        $whichMsg = substr($whichMsg, 2, strlen($whichMsg));
		        if (!file_exists($whichMsg))
		            echo "Setup Error: Missing php.ini file.<br>";
		        else
                    echo("Did you connect to NJIT's VPN?<br>");
	        }
            error_log("getDB() error: " . var_export($e, true));
            $db = null;
        }
    }
    return $db;
}
?>