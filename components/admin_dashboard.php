<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "gogreen");

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] !== "admin"){
    header("location: login.php");
    exit;
}
$sql = "SELECT * FROM tools";
$result = mysqli_query($conn, $sql);

$sql2 = "SELECT * FROM bookings";
$result2 = mysqli_query($conn, $sql2);

$sql3 = "SELECT * FROM members";
$result3 = mysqli_query($conn, $sql3);

?>
<!DOCTYPE html>
<html>
<head>
    <title>GoGreen&Hire - Tools </title>
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

    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">GoGreen&Hire Page Data</h5>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2 text-muted">Total Tools</h6>
                                <p class="card-text"><?php echo mysqli_num_rows($result); ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2 text-muted">Total Booking</h6>
                                <p class="card-text"><?php echo mysqli_num_rows($result2); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2 text-muted">Total Members</h6>
                                <p class="card-text"><?php echo mysqli_num_rows($result3); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
