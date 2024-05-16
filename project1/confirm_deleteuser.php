<?php
include("connection.php");

if (isset($_POST["userID"])) {
    $userID = $_POST["userID"];

    $stmt = $conn -> prepare("SELECT * FROM users WHERE userID = ?");
    $stmt -> bind_param("i", $userID);
    $stmt -> execute();

    $result = $stmt -> get_result();
    $user = $result -> fetch_assoc();

    include("navbar.php");
    ?>
    <div class="bg-light p-4 m-5 rounded text-center">
        <h3>Are you sure you want to delete user?</h3>
        <form action="process_deleteuser.php" method="post">
            <input type="hidden" name="userID" value="<?= $userID;?>">
            <button type="submit" class="btn btn-danger m-3 p-2 px-5">Delete User</button>
        </form>
    </div>
    <?php
} else {
    echo "Error: User ID not found";
}