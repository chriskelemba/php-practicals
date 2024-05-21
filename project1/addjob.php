<?php
include("connection.php");
session_start();
if(!isset($_SESSION["email"]) || $_SESSION["role"] != "Admin") {
    header("location: error_noaccess.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" integrity="sha256-2TnSHycBDAm2wpZmgdi0z81kykGPJAkiUY+Wf97RbvY=" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body>
    <div>
        <?php
        include("navbar.php");
        ?>
        <!-- Add Job Form -->
        <form action="process_addjob.php" method="post" class="p-5 w-50 mx-auto">
        <legend>Add Job</legend>
        <div class="form-group mt-5">
            <label>Title:</label></br>
            <input type="text" name="title" class="form-control" placeholder="Enter a title" required/></br></br>
        </div>
        <div class="form-group">
            <label>Description:</label></br>
            <textarea name="description" class="form-control" rows="4" cols="50" placeholder="Enter a description" required></textarea></br></br>
        </div>
        <input type="hidden" value=""/>
        <button type="submit" name="submit" class="btn btn-primary mx-auto mt-5">Add Job</button>
    </form>
    </div>
</body>
</html>