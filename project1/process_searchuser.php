<?php
include("connection.php");

$username = trim($_POST['search']);

$stmt = $conn -> prepare("SELECT * FROM users WHERE username = ?");
$stmt -> bind_param("s", $username);
$stmt -> execute();
$result = $stmt -> get_result();

if ($result -> num_rows > 0) {
    $rows = $result -> fetch_assoc();
    include("navbar.php");
    echo $rows["userID"]." ".$rows["username"]." ".$rows["email"]." ".$rows["role"]."</br>";
} else {
    header('Location: error_searchuser.php');
}

$conn -> close();
?>