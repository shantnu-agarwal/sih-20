<?php
error_reporting(E_ERROR | E_PARSE);

$connected_successfully = false; // Flag for successfull connection.
$database_name = 'sih';        // Name of the database.
$hostname = 'localhost';         // IP Adddress of server in our case just localhost as the server is hosted on a local machine.
$username = 'root';              // username for the database user.
$password = '';// password for the user.
$currency = 'Rs: ';


// Connect to the database and bind the connection to a aribale called 'mysqli'.
$mysqli = new mysqli($hostname, $username, $password, $database_name);

// Error Handelling.
if(!$mysqli->connect_error)
{
  $connected_successfully = true; // Set the connection flag to True.
}
?>