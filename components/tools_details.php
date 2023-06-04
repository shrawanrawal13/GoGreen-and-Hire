<?php
session_start();
$tool_id = $_GET['tool_id'];
$conn = mysqli_connect("localhost", "root", "", "gogreen");
$query = "SELECT * FROM tools WHERE id = $tool_id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>GoGreen&Hire - Tools Details </title>
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
            <div class="col-md-6">
                <img src="./../images/uploads/<?php echo $row['image']; ?>" class="img-fluid rounded" alt="<?php echo $row['name']; ?>">
            </div>
            <div class="col-md-6">
                <h1><?php echo $row['name']; ?></h1>
                <p class="lead">Brand: <strong><?php echo $row['brand']; ?></strong></p>
                <p>Description:</p>
                <p><?php echo $row['description']; ?></p>
                <p>Additional Parts:</p>
                <ul>
                    <li><?php echo $row['additional_parts'] ?> </li>
                </ul>
                <p>Available Dates:</p>
                <ul>
                    <li><?php echo $row['available_dates'] ?></li>
                </ul>
                <p class="lead">Hire Rate: <strong><?php echo $row['hire_rates']; ?></strong></p>
                <p class="lead">Availability: <strong><?php echo $row['availability'] ==1 ? 'AVAILABLE' : 'NOT AVAILABLE' ?></strong></p>
                <p class="text-muted">Created on <?php echo $row['created_at'] ?></p>
                <a href="../handler/booking_handler.php?tool_id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to hire this item?')" class="btn btn-success w-25">Hire</a>
            </div>
        </div>
    </div>



</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
