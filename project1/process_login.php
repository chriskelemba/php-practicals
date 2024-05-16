<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    $stmt = $conn -> prepare("SELECT * FROM accounts WHERE username = ? AND email = ?");
    $stmt -> bind_param("ss", $username, $email);
    $stmt -> execute();
    $result = $stmt -> get_result();

    if ($result -> num_rows == 1) {
        $row = $result -> fetch_assoc();
        if (password_verify($password, $row["password"])) {
            header("location: dashboard.php");
            exit;
        } else {
            header('Location: error_login.php');
        }
    } else {
        header('location: error_user.php');
    }
}

$conn -> close();
?>