<?php
include("connection.php");

$email = trim($_POST['email']);
$password = trim($_POST['password']);

$stmt = $conn -> prepare("SELECT * FROM accounts WHERE email = ? AND password = ?");
$stmt -> bind_param("ss", $email, $password);
$stmt -> execute();
$result = $stmt -> get_result();

if ($result -> num_rows > 0) {
    $row = $result -> fetch_assoc();
    $role = $row["role"];

    session_start();
    $_SESSION["email"] = $email;
    $_SESSION["role"] = $role;

    header('Location: dashboard.php');
} else {
    header('Location: error_login.php');
}

$conn -> close();
?>