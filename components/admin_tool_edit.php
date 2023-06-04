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

// Check if form is submitted
if(isset($_POST["submit"])){
    // Retrieve form data
    $id = $_POST["id"];
    $name = $_POST["name"];
    $brand = $_POST["brand"];
    $description = $_POST["description"];
    $availability = isset($_POST["availability"]) ? 1 : 0;

    $available_dates = $_POST["available_dates"];
    // Update tool in database
    $sql = "UPDATE tools SET name='$name', brand='$brand', description='$description', availability=$availability, available_dates='$available_dates' WHERE id=$id";
    mysqli_query($conn, $sql);

    // Redirect to admin dashboard
    header("location: admin_view_tools.php");
    exit;
}

// Retrieve tool from database
$id = $_GET["id"];
$sql = "SELECT * FROM tools WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>GoGreen&Hire - Admin Contacts </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../styles-book.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../images/logo.png">

</head>

<body>

<?php include('sidebar.php') ?>
<div class="w3-main" style="margin-left:150px">
    <?php include('navbar.php') ?>
    <?php include('success.php') ?>

    <div class="mt-4" style="width: 700px;margin: auto;">
        <h2>Edit Tool</h2>
        <form method="post">
            <div class="form-group mb-3">
                <label for="id">ID:</label>
                <input type="text" class="form-control" id="id" name="id" value="<?php echo $row["id"]; ?>" readonly>
            </div>
            <div class="form-group mb-3">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $row["name"]; ?>">
            </div>
            <div class="form-group mb-3">
                <label for="brand">Brand:</label>
                <input type="text" class="form-control" id="brand" name="brand" value="<?php echo $row["brand"]; ?>">
            </div>
            <div class="form-group mb-3">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description"><?php echo $row["description"]; ?></textarea>
            </div>
            <div class="form-group form-check mb-3">
                <input type="checkbox" class="form-check-input" id="availability" name="availability" <?php echo $row["availability"] == 1 ? "checked" : ""; ?>>
                <label class="form-check-label" for="availability">Available</label>
            </div>
            <div class="form-group mb-3">

                <div class="form-group">
                    <label for="start">Available date:</label>
                    <input type="date" class="form-control-file col-md-8" name="available_dates"><?php echo $row["available_dates"]; ?>
                </div>
                <button type="submit" class="btn btn-success mt-4" name="submit">Submit</button>
        </form>
    </div>

</div>


</body>
</html>
