<?php
error_reporting(E_ERROR | E_PARSE);

$connected_successfully = false; // Flag for successfull connection.
$database_name = 'world';        // Name of the database.
$hostname = 'kisaan2020.mysql.database.azure.com';         // IP Adddress of server in our case just localhost as the server is hosted on a local machine.
$username = 'astroller27@kisaan2020';              // username for the database user.
$password = 'WeGotThis101';// password for the user.
$currency = 'Rs: ';


// Connect to the database and bind the connection to a aribale called 'mysqli'.
$mysqli = new mysqli($hostname, $username, $password, $database_name);

// Error Handelling.
if(!$mysqli->connect_error)
{
  $connected_successfully = true; // Set the connection flag to True.
}
?>