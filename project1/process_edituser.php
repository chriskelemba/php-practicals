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
    <form action="process_updateuser.php" method="post" class="p-5 w-50 mx-auto">
        <legend>Edit User</legend>
        <input type="hidden" name="userID" value="<?= $userID;?>">
        <div class="form-group mt-5">
            <label>Username:</label>
            <input type="text" name="username" class="form-control" value="<?= $user["username"];?>" required>
        </div>
        <div class="form-group mt-5">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value="<?= $user["email"];?>" required>
        </div>
        <div class="form-group my-5">
            <label for="exampleFormControlSelect2">Role:</label>
            <select class="form-control" name="role" id="exampleFormControlSelect2" required>
                <option value="">Please select a value</option>
                <option value="Doctor">Doctor</option>                       
                <option value="Medic">Medic</option>
                <option value="Pilot">Pilot</option>
                <option value="Teacher">Teacher</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <?php
} else {
    echo "Error: User ID not found";
}