<?php
require_once '../config.php';
require_once '../classes/Admin.php';

$database = new Database();
$db = $database->getConnection();

$admin = new Admin($db);
$viewAlumni = $admin -> viewAlumni($db);
$viewJobs = $admin -> viewJobs($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_alumni'])) {
        try {
            $admin->addAlumni($_POST);
            echo "Alumni added successfully.";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    } elseif (isset($_POST['post_job'])) {
        $admin->postJob($_POST);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" integrity="sha256-2TnSHycBDAm2wpZmgdi0z81kykGPJAkiUY+Wf97RbvY=" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form method="post" class="p-5 w-50 mx-auto">
        <h2>Add Alumni</h2>
            <div class="form-group mt-5">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="form-group mt-5">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group mt-5">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary mt-5" name="add_alumni">Add Alumni</button>
        </form>
        <hr>
        <form method="post" class="p-5 w-50 mx-auto">
        <h2>Post Job</h2>
            <div class="form-group mt-5">
                <label for="job_title">Job Title</label>
                <input type="text" class="form-control" id="job_title" name="job_title" placeholder="Job Title" required>
            </div>
            <div class="form-group mt-5">
                <label for="job_description">Job Description</label>
                <textarea class="form-control" id="job_description" name="job_description" placeholder="Job Description" required></textarea>
            </div>
            <div class="form-group mt-5">
                <label for="job_location">Job Location</label>
                <input type="text" class="form-control" id="job_location" name="job_location" placeholder="Job Location" required>
            </div>
            <button type="submit" class="btn btn-primary mt-5" name="post_job">Post Job</button>
        </form>
    </div>
    <hr class="w-75 mx-auto">
    <?php
    if (!empty($viewAlumni)) {
        ?>
        <div class="table-responsive w-50 mx-auto my-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($viewAlumni as $alumni) { ?>
                        <tr>
                            <td><?php echo $alumni['username']; ?></td>
                            <td><?php echo $alumni['email']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php
    } else {
        echo '<p class="text-muted">No alumni found.</p>';
    }
    ?>
    <form action="view_jobs.php" method="get" class="text-center m-5">
        <button class="btn btn-primary p-3" type="submit">View Jobs</button>
    </form>
</body>

</html>