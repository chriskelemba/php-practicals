<?php
require_once '../config.php';
require_once '../classes/Admin.php';

$database = new Database();
$db = $database->getConnection();

$admin = new Admin($db);

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
    <h1>Admin Dashboard</h1>
    <form method="post">
        <h2>Add Alumni</h2>
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="add_alumni">Add Alumni</button>
    </form>
    <form method="post">
        <h2>Post Job</h2>
        <input type="text" name="job_title" placeholder="Job Title" required>
        <input type="text" name="job_description" placeholder="Job Description" required>
        <button type="submit" name="post_job">Post Job</button>
    </form>
</body>

</html>