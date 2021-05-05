<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Panel - Login</title>
</head>
<?php
require("connection.php");
?>

<div>
    <form method="POST" action="validate_login.php">

        <div>
            <label for="email">E-mail</label>
            <input type="text" name="email" pattern="[^[^@]+@[^@]+\.[^@]+$]+" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password">
        </div>
        <div>
            <input type="submit" value="Login">
        </div>

    </form>

</div>

</body>

</html>