<?php 

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "clippeditloginsystem";


// Connection string that connects to the database in the local server.
$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);



// If connection fails then a message will show up stating 'connection failed'.
if (!$conn){
	die ("connection failed:".mysqli_connect_error());
}