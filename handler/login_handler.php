<?php
// Start session
session_start();

// Connect to database
$conn = mysqli_connect("localhost", "root", "", "gogreen");

// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get user input
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check if the email is valid
    $query = "SELECT * FROM members WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    // If the email is valid, check if the password is correct
    if($count == 1) {
        if (password_verify($password, $row['password'])) {
            // Password is correct, log the user in
            $_SESSION['email'] = $email;
            $_SESSION['success'] = "Successfully logged in to your account.";
            $_SESSION['last_name'] = $row['last_name'];
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['loggedin'] = true;
            $_SESSION['member_id']=$row['member_id'];

            if($row['role'] == 'admin'){
                $_SESSION['role'] = 'admin';
            }
            else{
                $_SESSION['role'] = 'member';
            }

            header("location: ../components/index.php");
            exit;
        } else {
            // Password is incorrect, display an error message
            $error = "Invalid Password";
            header("location: ../components/login.php");

        }
    } else {
        // Email is invalid, display an error message
        $error = "Invalid Email";
        header("location: ../components/login.php");

    }
}

mysqli_close($conn);
?>
