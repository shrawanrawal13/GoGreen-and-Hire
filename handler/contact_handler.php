<?php
// Start session
session_start();

$conn = mysqli_connect("localhost", "root", "", "gogreen");

require_once 'db_connect.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Validate form data
    if (empty($name) || empty($email) || empty($message)) {
        $error = 'Please fill in all the fields.';
    } else {
        // Save message to database
        $stmt = $conn->prepare('INSERT INTO contact (name, email, message) VALUES (?, ?, ?)');
        $stmt->bind_param('sss',$name, $email, $message);
        $_SESSION['success'] = "Successfully sent message to the admin!";

        $stmt->execute();

        // Redirect to thank you page
        header('Location: ../components/contact.php');
        exit();
    }
}

?>