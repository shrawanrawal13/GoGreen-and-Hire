<?php
// Start session
session_start();

// Connect to database
$conn = mysqli_connect("localhost", "root", "", "gogreen");

// Check if user is logged in and is admin
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] !== "admin"){
    header("location: login.php");
    exit;
}

// Check if id parameter is present in URL and is a valid integer
if(!isset($_GET["id"]) || !is_numeric($_GET["id"])){
    header("location: tools.php");
    exit;
}

// Build and execute SQL query to delete tool from database
$id = $_GET["id"];
$sql = "DELETE FROM tools WHERE id = $id";
if(mysqli_query($conn, $sql)){
    $_SESSION["success"] = "Tool deleted successfully.";
}else{
    $_SESSION["error"] = "Error deleting tool.";
}

// Redirect to tools page
header("location: admin_view_tools.php");
exit;
?>