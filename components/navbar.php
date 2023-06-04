<div class="w3-grey">
    <button class="w3-button w3-grey w3-xlarge w3-hide-large" onclick="w3_open()">&#9776;</button>
    <div class="w3-container">
        <div class="w3-bar w3-padding-16 w3-border w3-light-grey" style="display: flex; justify-content: center;">
            <a href="index.php" class="w3-bar-item w3-button w3-border-right">About Us</a>
            <a href="tools.php" class="w3-bar-item w3-button w3-border-right" >Tools</a>
            <?php if(isset($_SESSION['loggedin'])) { ?>
                <a href="../handler/logout_handler.php" class="w3-bar-item w3-button w3-border-right" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
            <?php } else { ?>
            <a href="login.php" class="w3-bar-item w3-button w3-border-right">Login</a>
            <?php } ?></li>
            <a href="contact.php" class="w3-bar-item w3-button w3-border-right">Contact Us</a>
            <?php if(!isset($_SESSION['loggedin'])) { ?>
                <a href="signup.php" class="w3-bar-item w3-button w3-border-right">Become a Member</a>
            <?php } ?>
            <?php if(isset($_SESSION['loggedin'])) { ?>
                <a class="w3-bar-item w3-button w3-border-right" href="my_booking.php"><i class="fas fa-igloo"></i> My Booking</a>
                <a href="my_profile.php" class="w3-bar-item w3-button w3-border-right">My Profile</a>
            <?php } ?>

        </div>
    </div>
</div>

