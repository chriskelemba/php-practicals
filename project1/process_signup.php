<?php
include("connection.php");

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

if ($password !== $confirmPassword) {
    echo "Password does not match";
    exit;
}

$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";

if (mysqli_query($conn, $sql)) {
    header('Location: login.php');
} else {
    echo "An error has occured: " .mysqli_error($conn);
}

$conn -> close();
?>