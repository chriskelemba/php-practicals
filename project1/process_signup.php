<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $confirmPassword = trim($_POST["confirmPassword"]);


    // Checks whether email already exists in the database
    $emailSql = "SELECT * FROM accounts WHERE email = '$email'";
    $result = mysqli_query($conn, $emailSql);
    if (mysqli_num_rows($result) > 0) {
        header('Location: error_emailexists.php');
        exit;
    }

    // Checks whether the password matches
    if ($password !== $confirmPassword) {
        header('Location: error_signup.php');
        exit;
    }

    // Hashes the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO accounts (username, email, password, role) VALUES ('$username', '$email', '$password', 'User')";
    
    if (mysqli_query($conn, $sql)) {
        header('Location: login.php');
        exit;
    } else {
        echo "An error has occured: " .mysqli_error($conn);
    }
}

$conn -> close();
?>