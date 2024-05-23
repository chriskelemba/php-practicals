<?php
include("connection.php");

$sql = "SELECT * FROM profile";
$result = mysqli_query($conn, $sql);
$number_of_result = mysqli_num_rows($result);

?>