<?php
// Start the session
session_start();

if (!isset($_SESSION['loggedin'])) {
    // Redirect to login page
    header("Location: login.php");
    exit();
}

// Include database connection
include('../handler/db_connect.php');
$conn = mysqli_connect("localhost", "root", "", "gogreen");

// Fetch all tools from database
$sql = "SELECT * FROM tools";
$result = mysqli_query($conn, $sql);

// Check if tools exist
if(mysqli_num_rows($result) > 0) {
} else {
    echo '<div class="alert alert-danger" role="alert">No tools available</div>';
}
mysqli_close($conn);
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

    <div class="row" style="padding:20px;">
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="../images/uploads/<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>" width="50" height="200">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['name']; ?></h5>
                        <p class="card-text"><?php echo $row['description']; ?></p>
                        <p class="card-text"><?php echo $row['hire_rates']; ?></p>
                        <a href="tools_details.php?tool_id=<?php echo $row['id']; ?>" class="btn btn-success">View Tool</a>
                    </div>
                </div>
            </div>
        <?php } ?>

</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
