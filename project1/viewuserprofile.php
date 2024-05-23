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
        include("process_viewuserprofile.php");
        ?>
        <table class="table w-50 mx-auto mt-5 m-5">
                <tr">
                    <?php
                    while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <th scope="col">Name</th>
                    <td><?php echo $row["name"];?></td>
                </tr>
                <tr>
                    <th scope="col">Email</th>
                    <td><?php echo $row["email"];?></td>
                <tr>
                <tr>
                    <th scope="col">Phone</th>
                    <td><?php echo $row["phone"];?></td>
                <tr>
                <tr>
                    <th scope="col">Address</th>
                    <td><?php echo $row["address"];?></td>
                <tr>
                <tr>
                    <th scope="col"></th>
                    <td>
                        <form action="process_edituser.php" method="post">
                        <input type="hidden" name="userID" value="<?= $row["userID"];?>">
                            <button class="btn btn-primary px-5">Edit</button>
                        </form>
                    </td>
                </tr>
                <?php
                } 
                ?>
        </table>
    </div>
</body>
</html>