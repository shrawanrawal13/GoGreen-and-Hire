<?php
session_start();
if (!isset($_SESSION['member_id'])) {
    // Redirect user to login page
    header("Location: login.php");
    exit();
}
$member_id = $_SESSION['member_id'];
$conn = mysqli_connect("localhost", "root", "", "gogreen");

$sql = "SELECT * FROM members WHERE member_id = $member_id";

$result = mysqli_query($conn, $sql);

// Check if query was successful
if (!$result) {
    // Handle error
    die("Database query failed: " . mysqli_error($conn));
}

// Get user details from query result
$row = mysqli_fetch_assoc($result);
$firstName = $row['first_name'];
$lastName = $row['last_name'];
$email = $row['email'];
$address = $row['address'];
$city = $row['city'];
$state = $row['state'];
$zipCode = $row['zip_code'];
$phone = $row['phone'];
$createdAt = $row['created_at'];
$role = $row['role'];

// Close database connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <title>GoGreen&Hire - My Profile </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles-book.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../images/logo.png">

</head>

<body>

<?php include('sidebar.php') ?>
<div class="w3-main" style="margin-left:150px">
    <?php include('navbar.php') ?>
    <?php include('success.php') ?>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">My Profile</h5>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">First Name:</div>
                            <div class="col-md-8"><?php echo $firstName; ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Last Name:</div>
                            <div class="col-md-8"><?php echo $lastName; ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Email:</div>
                            <div class="col-md-8"><?php echo $email; ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Address:</div>
                            <div class="col-md-8"><?php echo $address; ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">City:</div>
                            <div class="col-md-8"><?php echo $city; ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">State:</div>
                            <div class="col-md-8"><?php echo $state; ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Zip Code:</div>
                            <div class="col-md-8"><?php echo $zipCode; ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Phone:</div>
                            <div class="col-md-8"><?php echo $phone; ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Created At:</div>
                            <div class="col-md-8"><?php echo $createdAt; ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Role:</div>
                            <div class="col-md-8"><?php echo $role; ?></div>
                        </div>
                        <hr>
<!--                        <a href="edit_profile.php" class="btn btn-primary">Edit Profile</a>-->
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>

</body>
</html>





