<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "gogreen");
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true ){
    header("location: login.php");
    exit;
}
require_once 'db_connect.php';
$id = $_GET['tool_id'];
$returned_date = date('Y-m-d');
$sql = "UPDATE bookings SET status = 'done', returned_date = '$returned_date' WHERE id = '$id'";
if(mysqli_query($conn, $sql)){
    header("location: ../components/admin_booked_tools.php");
    $_SESSION['success'] = "Thanks for your service.";
    exit;
} else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>