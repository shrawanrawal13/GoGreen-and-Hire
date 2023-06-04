<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "gogreen");
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true ){
    header("location: login.php");
    exit;
}
require_once 'db_connect.php';
$id = $_GET['tool_id'];
echo $id;
$sql = "UPDATE bookings SET status = 'accepted' WHERE id = '$id'";
if(mysqli_query($conn, $sql)){
    header("location: ../components/admin_bookings_request.php");
    $_SESSION['success'] = "You have Successfully approved bookings";
    exit;
} else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
