<?php
include("connection.php");

$results_per_page = 10;

$sql = "SELECT * FROM jobs";
$result = mysqli_query($conn, $sql);
$number_of_result = mysqli_num_rows($result);

$number_of_page = ceil($number_of_result / $results_per_page);  

if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
};

$page_first_result = ($page - 1) * $results_per_page;

$query = "SELECT * FROM jobs LIMIT " . $page_first_result . ',' . $results_per_page;  
$result = mysqli_query($conn, $query);
?>