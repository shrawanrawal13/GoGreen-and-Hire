<?php
if(isset($_SESSION['success'])) {
    echo "<div class='alert alert-success alert-dismissible fade show' style='margin:0' role='alert'>" . $_SESSION['success'] . "
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    unset($_SESSION['success']);

}
?>