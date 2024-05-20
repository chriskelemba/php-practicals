<?php
$email = $_SESSION["email"];
$sql = "SELECT username FROM accounts WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
$username = $user["username"];
?>