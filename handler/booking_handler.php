<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "gogreen");
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true ){
    header("location: login.php");
    exit;
}
require_once 'db_connect.php';
$tool_id = $_GET['tool_id'];
$sql = "SELECT * FROM tools WHERE id = $tool_id AND availability = 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Get form data
$member_id = $_SESSION['member_id'];
$booking_date = date('Y-m-d');
$tools_id = $_GET['tool_id'];
$end_date = $row["available_dates"];
$total_cost = $row['hire_rates'];
$status = "pending";


// Insert booking data into database
$sql = "INSERT INTO bookings (member_id, tools_id, booking_date, end_date, total_cost, status) VALUES ('$member_id', '$tools_id', '$booking_date','$end_date', '$total_cost','$status')";

if(mysqli_query($conn, $sql)){
    header("location: ../components/tools.php");
    $_SESSION['success'] = "You have Successfully booked.";


    exit;
} else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>