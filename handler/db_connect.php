
<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$database = "gogreen";

// Create database connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check if connection was successful
if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>