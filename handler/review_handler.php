<?php
session_start();
require "db_connect.php";

$conn = mysqli_connect("localhost", "root", "", "gogreen");

// Retrieve review data from form submission
$member_id = $_SESSION['member_id'];
$tool_id = $_POST['tool_id'];
$rating = $_POST['rating'];
$comments = $_POST['review'];
$review_date = date('Y-m-d H:i:s');

// Sanitize and validate input data
$member_id = mysqli_real_escape_string($conn, $member_id);
$tool_id = mysqli_real_escape_string($conn, $tool_id);
$rating = mysqli_real_escape_string($conn, $rating);
$comments = mysqli_real_escape_string($conn, $comments);

// Construct and execute INSERT statement
$sql = "INSERT INTO reviews (member_id, tool_id, rating, comments, review_date)
        VALUES ('$member_id', '$tool_id', '$rating', '$comments', '$review_date')";

if (mysqli_query($conn, $sql)) {
    // Review inserted successfully
    header("location: ../components/my_booking.php");
    $_SESSION['success'] = 'Review submitted successfully';
} else {
    // Review insertion failed
}
?>
