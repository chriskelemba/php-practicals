<?php
$colors = array("red", "blue", "yellow");

echo $colors[0];

echo "</br></br>";

foreach ($colors as $color) {
    echo $color. ", ";
}

$products = array('productName' => 'Macbook', 'productQuantity' => 3);

echo $products['productQuantity'];

echo "</br></br>";

foreach ($products as $product) {
    echo $product. ", ";
}
?>