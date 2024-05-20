<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $role = trim($_POST["role"]);

    $sql = "INSERT INTO accounts (username, email, role) VALUES ('$username', '$email', '$role')";
    
    if (mysqli_query($conn, $sql)) {
        header('Location: success_adduser.php');
        exit;
    } else {
        echo "An error has occured: " .mysqli_error($conn);
    }
}

$conn -> close();
?>