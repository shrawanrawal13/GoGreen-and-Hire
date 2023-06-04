
<?php
// Start session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to login page with success message
$_SESSION['success'] = "Successfully logged out.";
header("location: ../components/login.php");
exit;
?>
