<?php
include("connection.php");

if(isset($_POST["userID"]) && isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["role"])) {
    $userID = trim($_POST["userID"]);
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $role = trim($_POST["role"]);

    $sql = "UPDATE users SET username = ?, email = ?, role = ? WHERE userID = ?";

    $stmt = $conn -> prepare($sql);
    $stmt -> bind_param("sssi", $username, $email, $role, $userID);

    if($stmt -> execute()) {
        header("location: success_updateuser.php");
    }
    else {
        echo "Error occurred while updating user. " .$stmt -> error();
    }
    $conn -> close();
    $stmt -> close();
}
?>