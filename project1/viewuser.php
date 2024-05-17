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
        include("process_viewusers.php");
        ?>
        <div class="w-25 my-5 mx-auto">
            <form class="form-inline my-2 my-lg-0" action="process_searchuser.php" method="POST">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control mr-sm-2" name="search" placeholder="Search Username" aria-label="Search">
                        </div>
                        <div class="col">
                            <button class="btn btn-outline-success my-2 my-sm-0 text-center" type="submit">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <table class="table w-75 mx-auto mt-5">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">User ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <td><?php echo $row["userID"];?></td>
                    <td><?php echo $row["username"];?></td>
                    <td><?php echo $row["email"];?></td>
                    <td><?php echo $row["role"];?></td>
                    <td>
                        <form action="process_edituser.php" method="post">
                        <input type="hidden" name="userID" value="<?= $row["userID"];?>">
                            <button class="btn btn-primary">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form action="confirm_deleteuser.php" method="post">
                        <input type="hidden" name="userID" value="<?= $row["userID"];?>">
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php
}
?>