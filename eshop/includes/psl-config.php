<?php
/**
 * These are the database login details
 */  
define("HOST", "localhost");     // The host you want to connect to.
/*
define("USER", "sec_user");    // The database username. 
define("PASSWORD", "4Fa98xkHVd2XmnfK");    // The database password. 
*/

define("USER", "root");    // The database username. 
define("PASSWORD", "");    // The database password. 

define("DATABASE", "secure_login");    // The database name.
 
define("CAN_REGISTER", "any");
define("DEFAULT_ROLE", "member");
 
define("SECURE", FALSE);    // FOR DEVELOPMENT ONLY!!!!

$currency = '$';
$mysqli2 = new mysqli(HOST, USER, PASSWORD,DATABASE);



?>