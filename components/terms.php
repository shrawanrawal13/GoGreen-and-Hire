<?php session_start() ?>

<!DOCTYPE html>
<html>
<head>
    <title>GoGreen&Hire - Terms and Condition </title>
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

    <div class="container my-5">
        <h1 class="text-center mb-4">Terms of Use</h1>
        <p>Welcome to GoGreen&Hire, a web-based application for managing the booking and hiring of tools. By accessing or using our services, you agree to be bound by the following terms and conditions:</p>
        <ol>
            <li>Only registered members are allowed to book and borrow tools. Casual visitors can only read the information from the application or fill in a contact form to ask any questions.</li>
            <li>Members can hire any tools they want by booking through the application. All the tools are available for hire for one full day. Members should be able to view all the tools available and check the dates when each tool is available to prevent double bookings.</li>
            <li>The admin staff can add new tools for hire to the application, update or delete any existing tools from the list, and respond to the contact forms. They can view all the booking reports to see the popularity of the tools.</li>
            <li>Members will be able to view all the tools they have booked and give reviews for the tools they hired.</li>
            <li>It is also possible to hire tools by walking into the shop and if the required tool is available, the admin staff will be able to complete the hiring process for the members via the application. When members come to collect their booked tools, the admin staff will be able to find their specific booking, issue the tool, and mark the booking as collected.</li>
            <li>When members do not return the hired tools on time, the admin staff will make a note on their booking  and charge fines accordingly.</li>
            <li>By using our services, you agree to use the tools responsibly and return them in the same condition as received. Any damage caused to the tools during hire will be charged to the member who hired it.</li>
            <li>We reserve the right to cancel or refuse any booking without any explanation. We also reserve the right to modify or terminate our services at any time without prior notice.</li>
            <li>All content included on this application, such as text, graphics, logos, images, and software, is the property of GoGreen&Hire or its content suppliers and protected by international copyright laws. Unauthorized use, reproduction, modification, distribution, or republication of any content on this application is strictly prohibited.</li>
            <li>We may update these terms and conditions at any time without prior notice. By continuing to use our services after any modifications, you agree to be bound by the updated terms and conditions.</li>
        </ol>
    </div>

    <?php include('footer.php') ?>

</div>

</body>
</html>
