<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
    <title>GoGreen&Hire - Become a Member </title>
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
        <h1>Become a Member</h1>
        <form method="post" action="../handler/signup_handler.php">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                </div>
                <div class="col-md-6">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="col-md-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="col-md-3">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                </div>
                <div class="col-12">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <div class="col-md-6">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" name="city" required>
                </div>
                <div class="col-md-4">
                    <label for="state" class="form-label">State</label>
                    <input type="text" class="form-control" id="state" name="state" required>
                </div>
                <div class="col-md-2">
                    <label for="zip_code" class="form-label">Zip Code</label>
                    <input type="text" class="form-control" id="zip_code" name="zip_code" required>
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="col-md-6">
                    <label for="role" class="form-label">Account Type</label>
                    <select class="form-select" id="role" name="role" required>
                        <option value="">Choose...</option>
                        <option value="member">Member</option>
                        <?php if(isset($_SESSION['loggedin']) && $_SESSION["loggedin"] == true && $_SESSION["role"] == "admin") { ?>
                            <option value="admin">Admin</option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success">Create Account</button>
                </div>
            </div>
        </form>

    </div>
    <?php include('footer.php') ?>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
