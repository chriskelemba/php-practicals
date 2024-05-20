<?php
$email = $_SESSION["email"];
$query = "SELECT username FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
$username = $user["username"];
?>