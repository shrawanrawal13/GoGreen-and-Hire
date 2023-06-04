<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>GoGreen&Hire - Admin Add Tools  </title>
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

    <div class="container mt-4 mb-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Add Tools</h1>
                <form method="POST" action="../handler/add_tools_handler.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="brand" class="form-label">Brand</label>
                        <input type="text" class="form-control" id="brand" name="brand" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="additional_parts" class="form-label">Additional Parts</label>
                        <input type="text" class="form-control" id="additional_parts" name="additional_parts">
                    </div>
                    <div class="mb-3">
                        <label for="available_dates" class="form-label">Available Dates</label>
                        <input type="text" class="form-control" id="available_dates" name="available_dates" required>
                    </div>
                    <div class="mb-3">
                        <label for="hire_rates" class="form-label">Hire Rates</label>
                        <input type="text" class="form-control" id="hire_rates" name="hire_rates" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="availability">Availability:</label>
                        <select class="form-control col-md-8" name="availability">
                            <option value="1">Available</option>
                            <option value="0">Not Available</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>

                    <button type="submit" class="btn btn-success">Add Tool</button>
                </form>
            </div>
        </div>
    </div>


    <?php include('footer.php') ?>


</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
