<?php
function add($x,$y) {
    $sum=$x+$y;
    echo "The sum is ".$sum."<br><br>";
}
if (isset($_POST['sumbit'])) {
    add($_POST['first'],$_POST['second']);
}
?>
<form method="post">
    Enter First Number:
    <input type="number" name="first"/><br><br>
    Enter Second Number:
    <input type="number" name="second"/><br><br>
    <input type="submit" name="sumbit" value="Submit"/>
</form> 