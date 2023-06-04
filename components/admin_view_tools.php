<?php session_start();
// Connect to database
$conn = mysqli_connect("localhost", "root", "", "gogreen");

// Check if user is logged in and is admin
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] !== "admin"){
    header("location: login.php");
    exit;
}

// Retrieve all tools from database
$sql = "SELECT * FROM tools";
$results = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>GoGreen&Hire - Admin View Tools </title>
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

    <h2 class="m-4">Tools</h2>
    <table class="w3-table-all w3-card-4 w3-margin" style="width:90%">
        <tr class="w3-light-blue" >
            <td width="10%" align="center"><big><b>ID </b></big></td>
            <td width="10%" align="center"><big><b>Name</b></big></td>
            <td width="30%" align="center"><big><b>Brand</b></big></td>
            <td width="10%" align="center"><big><b>Description</b></big></td>
            <td width="10%" align="center"><big><b>Availability</b></big></td>
            <td width="5%" align="center"><big><b>Created at</b></big></td>
            <td width="5%" align="center"><big><b>Available date</b></big></td>
            <td width="15%" align="center"><big><b>Action</b></big></td>

        </tr>
        <?php while($row = mysqli_fetch_assoc($results)): ?>
            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["brand"]; ?></td>
                <td><?php echo $row["description"]; ?></td>
                <td><?php echo $row["availability"] == 1 ? "Yes" : "No"; ?></td>
                <td><?php echo $row["created_at"]; ?></td>
                <td><?php echo $row["available_dates"]; ?></td>

                <td>
                    <a class="btn btn-success" href="admin_tool_edit.php?id=<?php echo $row["id"]; ?>">Edit</a>
                    <a class="btn btn-danger" href="admin_tool_delete.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
