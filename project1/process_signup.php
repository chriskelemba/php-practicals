<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $confirmPassword = trim($_POST["confirmPassword"]);
    $role = $_POST["role"];

    if ($password !== $confirmPassword) {
        header('Location: error_signup.php');
        exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO accounts (username, email, password, role) VALUES ('$username', '$email', '$password', $role)";
    
    if (mysqli_query($conn, $sql)) {
        header('Location: login.php');
        exit;
    } else {
        echo "An error has occured: " .mysqli_error($conn);
    }
}

$conn -> close();
?>