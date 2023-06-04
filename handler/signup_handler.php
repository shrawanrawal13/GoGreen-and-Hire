<?php
$conn = mysqli_connect("localhost", "root", "", "gogreen");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // get the form data
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zip_code = $_POST["zip_code"];
    $phone_number = $_POST["phone"];
    $role = $_POST["role"];
    $registration_date = date('Y-m-d H:i:s');

    // check if the email is already registered
    $sql = "SELECT * FROM members WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        exit;
    }

    if (mysqli_num_rows($result) > 0) {
        echo "Sorry, that email address is already registered. Please use a different email address.";
        exit;
    }

    if ($password != $confirm_password) {
        echo "Sorry, the passwords do not match. Please try again.";
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO members (first_name, last_name, email, password, address, city, state, zip_code, phone, created_at, role) 
	VALUES ('$first_name', '$last_name', '$email', '$hashed_password', '$address', '$city', '$state', '$zip_code', '$phone_number', '$registration_date','$role')";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "Successfully registered as a member";

        header("location: ../components/signup.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // close the database connection
    mysqli_close($conn);
}
?>