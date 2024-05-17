<?php
include("connection.php");
session_start();
if(!isset($_SESSION["username"])){
    header("location: login.php");
} else {
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
        <!-- Add User Form -->
        <form action="process_adduser.php" method="post" class="p-5 w-50 mx-auto">
        <legend>Add User</legend>
        <div class="form-group mt-5">
            <label>Username:</label></br>
            <input type="text" name="username" class="form-control" placeholder="Enter a username" required/></br></br>
        </div>
        <div class="form-group">
            <label>Email:</label></br>
            <input type="email" name="email" class="form-control" placeholder="Enter a email" required/></br></br>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect2">Role:</label>
            <select class="form-control" name="role" id="exampleFormControlSelect2" required>
                <option value="">Please select a value</option>
                <option value="Doctor">Doctor</option>                       
                <option value="Medic">Medic</option>
                <option value="Pilot">Pilot</option>
                <option value="Teacher">Teacher</option>
            </select>
        </div>
        <button type="submit" name="submit" class="btn btn-primary mx-auto mt-5">Add User</button>
    </form>
    </div>
</body>
</html>
<?php
}
?>