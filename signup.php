<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>
<body>
    <!-- Signup Form -->
    <form action="process_signup.php" method="post">
        <label>Username:</label></br>
        <input type="text" name="username" placeholder="Enter your username" required/></br></br>
        <label>Email:</label></br>
        <input type="email" name="email" placeholder="Enter your email" required/></br></br>
        <label>Password:</label></br>
        <input type="password" name="password" placeholder="Enter your password" required/></br></br>
        <input type="submit" name="submit" value="Sign Up"/>
    </form>
</body>
</html>