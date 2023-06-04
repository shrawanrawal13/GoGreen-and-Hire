<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "gogreen");
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] !== "admin"){
    header("location: login.php");
    exit;
}
$sql = "SELECT * FROM contact";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>GoGreen&Hire - Admin Contacts </title>
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

    <h2 class="m-4">View Contacts</h2>
    <table class="w3-table-all w3-card-4 w3-margin" style="width:90%">
        <tr class="w3-light-blue" >
            <td width="20%" align="center"><big><b>ID </b></big></td>
            <td width="20%" align="center"><big><b>Name </b></big></td>
            <td width="20%" align="center"><big><b>Email</b></big></td>
            <td width="40%" align="center"><big><b>Message</b></big></td>

        </tr>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["message"]; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
