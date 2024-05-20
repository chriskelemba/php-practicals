<?php
include("connection.php");

$sql = "SELECT * FROM accounts";
$result = $conn -> query($sql);

?>