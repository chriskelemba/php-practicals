<?php
include("connection.php");

$username = trim($_POST['username']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);

$stmt = $conn -> prepare("SELECT * FROM accounts WHERE username = ? AND email = ? AND password = ?");
$stmt -> bind_param("sss", $username, $email, $password);
$stmt -> execute();
$result = $stmt -> get_result();

if ($result -> num_rows > 0) {
    session_start();
    $_SESSION["username"] = $username;
    header('Location: dashboard.php');
} else {
    header('Location: error_login.php');
}

$conn -> close();
?>