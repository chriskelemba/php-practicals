<?php
include("connection.php");

if (isset($_POST["userID"])) {
    $userID = $_POST["userID"];

    $stmt = $conn -> prepare("DELETE FROM users WHERE userID = ?");
    $stmt -> bind_param("i", $userID);
    $stmt -> execute();

    $result = $stmt -> get_result();
    $user = $result -> fetch_assoc();

    header("location: success_deleteuser.php");
} else {
    echo "Error: User ID not found";
}

$conn -> close();
?>