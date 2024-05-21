<?php
include("connection.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST["title"]);
    $description = trim($_POST["description"]);
    $posted_by = $_SESSION["username"];

    $sql = "INSERT INTO jobs (title, description, posted_by) VALUES ('$title', '$description', '$posted_by')";
    
    if (mysqli_query($conn, $sql)) {
        header('Location: success_addjob.php');
        exit;
    } else {
        echo "An error has occured: " .mysqli_error($conn);
    }
}

$conn -> close();
?>