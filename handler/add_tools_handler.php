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

// Get form data
$name = $_POST["name"];
$brand = $_POST["brand"];
$hire_rates = $_POST["hire_rates"];
$description = $_POST["description"];
$availability = $_POST["availability"];
$additional_parts = $_POST["additional_parts"];
$created_at = date('Y-m-d');
$available_dates = $_POST["available_dates"];

// Handle image upload
$image = "";
if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0){
    $target_dir = "../images/uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $allowedTypes = array("jpg", "jpeg", "png", "gif");
    if(in_array($imageFileType, $allowedTypes)){
        if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
            $image = basename($_FILES["image"]["name"]);
        }
    }
}

// Insert tool data into database
$sql = "INSERT INTO tools (name, brand, hire_rates, description, availability, additional_parts, image,available_dates,created_at) VALUES ('$name', '$brand', '$hire_rates', '$description', '$availability', '$additional_parts', '$image','$available_dates','$created_at')";
if(mysqli_query($conn, $sql)){
    header("location: ../components/admin_add_tools.php");
    $_SESSION['success'] = 'you have added tools successfully';
    exit;
} else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>