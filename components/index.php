<?php session_start() ?>

<!DOCTYPE html>
<html>
<head>
    <title>GoGreen&Hire - AboutUs </title>
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


    <div class="container mt-5">
        <h1>About Us</h1>
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="./../images/landing.jpg" class="img-fluid" alt="about-us-image">
            </div>
            <div class="col-md-6">
                <div class="about-text padding-20">
                    <p><span class="display-4 font-bold text-success">Welcome to GoGreen&Hire</span>, the website that offers a sustainable solution for tool usage.
                        We believe that hiring tools instead of buying them can reduce waste and save you money.
                        Our web-based application is funded by the council and provides a user-friendly platform for tool booking and hiring. Casual visitors can browse our extensive tool list, but to hire any tools, they must first become members of the Go Green movement by registering. As members, they can book any available tools for a full day and view their bookings on our platform. Members can also provide reviews of the tools they hired to help other members make informed decisions. Our admin staff is always available to answer any questions, add or remove tools, and ensure the proper handling of the hiring process. Join us and contribute to a greener future.</p>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php') ?>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
