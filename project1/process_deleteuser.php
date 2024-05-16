<?php
include("connection.php");

if (isset($_POST["userID"])) {
    $userID = $_POST["userID"];

    $stmt = $conn -> prepare("DELETE FROM users WHERE userID = ?");
    $stmt -> bind_param("i", $userID);
    $stmt -> execute();

    header("location: success_deleteuser.php");

    $conn -> close();
} else {
    echo "Error: User ID not found";
}
?>