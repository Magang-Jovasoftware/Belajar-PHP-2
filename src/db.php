<?php 

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'magang';

// Create Connection
$conn = new mysqli($host, $username, $password, $dbname);

//Check Connection
if($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error);
}
?>