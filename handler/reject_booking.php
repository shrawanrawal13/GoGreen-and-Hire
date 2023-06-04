<?php
// Start session
session_start();

// Connect to database
$conn = mysqli_connect("localhost", "root", "", "gogreen");

// Check if user is logged in and is admin
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true ){
    header("location: login.php");
    exit;
}
// Include database connection
require_once 'db_connect.php';

// Get form data
$id = $_GET['tool_id'];


// Update booking data into database
$sql = "UPDATE bookings SET status = 'rejected' WHERE id = '$id'";
if(mysqli_query($conn, $sql)){
    header("location: ../components/admin_bookings_request.php");
    $_SESSION['success'] = "You have Successfully Declined.";


    exit;
} else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>