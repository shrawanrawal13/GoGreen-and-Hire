<div class="w3-sidebar w3-bar-block w3-collapse w3-card" style="width:150px;" id="mySidebar">
    <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Close &times;</button>
    <img src="./../images/logo.png" width=150px; height=150px;>
    <hr>
    <?php if(isset($_SESSION['loggedin']) && $_SESSION["loggedin"] == true && $_SESSION["role"] == "admin") { ?>
        <div>
            <a href="admin_dashboard.php" class="w3-bar-item w3-button">Dashboard</a>
            <a href="admin_view_tools.php" class="w3-bar-item w3-button">View Tools</a>
            <a href="admin_add_tools.php" class="w3-bar-item w3-button">Add Tools</a>
            <a href="admin_bookings_request.php" class="w3-bar-item w3-button">Requests</a>
            <a href="admin_booked_tools.php" class="w3-bar-item w3-button">Booked</a>
            <a href="admin_contacts.php" class="w3-bar-item w3-button">Contacts</a>
            <a href="signup.php" class="w3-bar-item w3-button">Create Member</a>
        </div>
    <?php } ?>
    <?php if(isset($_SESSION['loggedin']) && $_SESSION["role"] != "admin") { ?>
        <a class="w3-bar-item w3-button" href="my_booking.php"><i class="fas fa-igloo"></i> My Booking</a>
        <a href="my_profile.php" class="w3-bar-item w3-button">My Profile</a>
        <a href="terms.php" class="w3-bar-item w3-button">Terms of use</a>
        <a href="privacy.php" class="w3-bar-item w3-button">Privacy Policy</a>

    <?php } ?>
</div>