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
        <div class="p-5 text-center bg-dark" style="height: 1000px;">
            <div class="mt-10 text-light">
                <h1 class="m-5">Welcome to the dashboard</h1>
                <p>This dashboard handles users. It can add, edit and delete users, all in a nice and simple design.</p>
                <form action="viewuser.php">
                    <button type="submit" class="btn btn-secondary m-3 p-2 px-5">Enter Dashboard</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
}
?>