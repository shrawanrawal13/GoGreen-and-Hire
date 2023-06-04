<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "gogreen");
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] !== "admin"){
    header("location: login.php");
    exit;
}
$sql="SELECT bookings.id, bookings.booking_date, tools.name,bookings.tools_id, members.first_name, members.last_name,tools.availability
FROM ((Bookings
INNER JOIN tools ON bookings.tools_id = tools.id)
INNER JOIN members ON bookings.member_id = members.member_id)
WHERE bookings.status ='pending'";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>GoGreen&Hire - Admin Booking Request </title>
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

    <h2 class="m-4">Booking Requests</h2>
    <table class="w3-table-all w3-card-4 w3-margin" style="width:90%">
        <tr class="w3-light-blue" >
            <td width="10%" align="center"><big><b>ID </b></big></td>
            <td width="10%" align="center"><big><b>Tool ID </b></big></td>
            <td width="20%" align="center"><big><b>Tool Name</b></big></td>
            <td width="20%" align="center"><big><b>Member Name</b></big></td>
            <td width="20%" align="center"><big><b>Booking Date</b></big></td>
            <td width="20%" align="center"><big><b>Status</b></big></td>

        </tr>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["tools_id"]; ?></td>
                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["first_name"]; ?>    <?php echo $row["last_name"]; ?></td>
                <td><?php echo $row["booking_date"]; ?></td>
                <td>
                    <a class="btn btn-success" href="../handler/accept_booking.php?tool_id=<?php echo $row['id']; ?>&accept">Accept</a>
                    <a class="btn btn-danger" href="../handler/reject_booking.php?tool_id=<?php echo $row['id']; ?>&reject">Reject</a>
                </td>

            </tr>
        <?php endwhile; ?>
    </table>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
