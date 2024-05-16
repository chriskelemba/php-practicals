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
        <form class="p-5 w-50 mx-auto bg-light rounded mt-5">
            <h1>Contact Us</h1>
            <div class="form-group py-3">
                <label for="exampleFormControlInput1">Name:</label>
                <input type="email" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="form-group py-3">
                <label for="exampleFormControlInput1">Email:</label>
                <input type="email" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="form-group py-3">
                <label for="exampleFormControlTextarea1">Message:</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary my-3">Send Message</button>
        </form>
    </div>
</body>
</html>