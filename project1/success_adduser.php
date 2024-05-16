<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" integrity="sha256-2TnSHycBDAm2wpZmgdi0z81kykGPJAkiUY+Wf97RbvY=" crossorigin="anonymous">
    <title>Success</title>
</head>
<body>
    <?php
    include("navbar.php");
    ?>
    <div class="bg-light p-4 m-5 rounded text-center">
        <h3>User has been created</h3>
        <form action="adduser.php">
            <button type="submit" class="btn btn-success m-3 p-2 px-5">Add Another User</button>
        </form>
    </div>
</body>
</html>