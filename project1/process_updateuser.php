<?php
require_once 'db.php'; // assume this file has the database connection

if (isset($_POST['userID']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['role'])) {
    $userID = $_POST['userID'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $stmt = $conn->prepare("UPDATE users SET username=?, email=?, role=? WHERE userID=?");
    $stmt->bind_param("sssi", $username, $email, $role, $userID);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    header("Location: manage_users.php"); // redirect back to the manage users page
} else {
    echo "Error: Invalid input";
}