<?php
// phpinfo();
$servername = "localhost";
$username = "root";
$password = "123456789";
$dbname = "project";

// Create connection
$connect = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";