<?php
include("connection.php");
session_start();
if(!isset($_SESSION["email"])) {
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
                    <th scope="col">Job ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Posted By</th>
                    <th scope="col">View</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    include("pagination_job.php");
                    while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <td><?php echo $row["jobID"];?></td>
                    <td><?php echo $row["title"];?></td>
                    <td><?php echo $row["description"];?></td>
                    <td><?php echo $row["posted_by"];?></td>
                    <td>
                        <form action="process_edituser.php" method="post">
                        <input type="hidden" name="jobID" value="<?= $row["jobID"];?>">
                            <button class="btn btn-primary">View</button>
                        </form>
                    </td>
                </tr>
                <?php
                }
                for($page = 1; $page <= $number_of_page; $page++) {  
                    echo '<a class="px-5 text-center" href = "viewuser.php?page=' . $page . '">' . $page . ' </a>';  
                }  
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>