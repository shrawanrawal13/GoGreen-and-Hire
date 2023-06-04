<?php
// Start session
session_start();

// Check if user is logged in
if(!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit;
}
require_once '../handler/db_connect.php';
$conn = mysqli_connect("localhost", "root", "", "gogreen");

// Include database connection
$member_id = $_SESSION['member_id'];
// Retrieve list of available tools
$sql="SELECT bookings.tools_id,bookings.booking_date,bookings.end_date, tools.name,tools.hire_rates,bookings.status
FROM ((Bookings
INNER JOIN tools ON bookings.tools_id = tools.id)
INNER JOIN members ON bookings.member_id = members.member_id)
WHERE bookings.member_id ='$member_id'";
$result = mysqli_query($conn, $sql);

// Check if query was successful
if(!$result) {
    die("Query failed: " . mysqli_error($conn));
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>GoGreen&Hire - My Booking </title>
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

    <h2 class="m-4">My Bookings</h2>
    <table class="w3-table-all w3-card-4 w3-margin" style="width:90%">
        <tr class="w3-light-blue" >
            <td width="10%" align="center"><big><b>Name </b></big></td>
            <td width="10%" align="center"><big><b>Tool ID </b></big></td>
            <td width="20%" align="center"><big><b>Booked Date</b></big></td>
            <td width="20%" align="center"><big><b>Available Upto</b></big></td>
            <td width="20%" align="center"><big><b>Cost</b></big></td>
            <td width="20%" align="center"><big><b>Status</b></big></td>
            <td width="20%" align="center"><big><b>Review</b></big></td>

        </tr>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['tools_id']; ?></td>
                <td><?php echo $row["booking_date"]; ?></td>
                <td><?php echo $row['end_date']; ?></td>
                <td><?php echo $row['hire_rates']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><?php if( $row['status'] == "done") { ?>
                        <a style="cursor: pointer;"
                           class="nav-link text-success"
                           data-bs-toggle="modal"
                           data-bs-target="#reviewModal"
                           data-tool-id="<?php echo $row['tools_id']; ?>"
                        >Review</a>
                    <?php } ?>

                </td>
            </tr>
        <?php endwhile; ?>
    </table>

</div>

!-- Review Modal -->
<div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="reviewModalLabel">Review Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../handler/review_handler.php" method="post">
                <input type="hidden" name="tool_id" value="" id="tool_id_input">

                <div class="modal-body">
                    <label for="message" class="form-label">Write your review</label>
                    <textarea class="form-control" id="review" name="review" rows="5" required></textarea>
                </div>
                <div class="rateyo" id= "rating"
                     data-rateyo-rating="0"
                     data-rateyo-num-stars="5"
                     data-rateyo-score="3">
                </div>
                <span class='result'></span>
                <input type="hidden" name="rating">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
                <script>
                    $(function () {
                        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
                            let rating = data.rating;
                            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
                            $(this).parent().find('.result').text('rating :'+ rating);
                            $(this).parent().find('input[name=rating]').val(rating);
                        });
                    });

                    $(function() {
                        $('a[data-bs-target="#reviewModal"]').click(function() {
                            var tool_id = $(this).data('tool-id');
                            console.log(tool_id);
                            $('#tool_id_input').val(tool_id);
                        });
                    });
                </script>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger text-white">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
