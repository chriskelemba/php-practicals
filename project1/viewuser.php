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
        <table class="table w-75 mx-auto mt-5">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">User ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
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
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>