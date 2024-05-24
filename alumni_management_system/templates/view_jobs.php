<?php
require_once '../config.php';
require_once '../classes/Admin.php';

$database = new Database();
$db = $database->getConnection();

$admin = new Admin($db);
$viewJobs = $admin -> viewJobs($db);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" integrity="sha256-2TnSHycBDAm2wpZmgdi0z81kykGPJAkiUY+Wf97RbvY=" crossorigin="anonymous">
    <title>Jobs</title>
</head>
<body>
    <?php
    if (!empty($viewJobs)) {
        ?>
        <div class="table-responsive w-75 mx-auto my-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Job ID</th>
                        <th><input type="checkbox"/></th>
                        <th>Job Title</th>
                        <th class="px-5">Job Description</th>
                        <th>Job Location</th>
                        <th>Job Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($viewJobs as $job) { ?>
                        <tr>
                            <td><?php echo $job['jobID']; ?></td>
                            <td><input type="checkbox"/></td>
                            <td><?php echo $job['job_title']; ?></td>
                            <td class="px-5"><?php echo $job['job_description']; ?></td>
                            <td><?php echo $job['job_location']; ?></td>
                            <td><?php echo $job['job_status']; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <form action="admin_dashboard.php" method="get" class="text-center m-5">
                <button class="btn btn-primary p-3" type="submit">Go Back</button>
            </form>
        </div>
        <?php
    } else {
        echo '<p class="text-muted">No job found.</p>';
    }
    ?>
</body>
</html>