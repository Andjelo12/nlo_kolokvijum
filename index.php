<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>php 73</title>
</head>
<body>
<form method="get" name="upload" action="checkLogin.php">

    <label for="username">Username:</label><input type="text" name="username" id="username"> <br>
    <label for="password">Password:</label><input type="password" name="password" id="password"><br><br>


    <input type="submit" name="sb" id="sb" value="upload">
    <input type="reset" name="rb" id="rb" value="cancel">

</form>
<?php
require 'config.php';

$error = (int)($_GET['e'] ?? 0);

if(array_key_exists($error, $messages)) {
    echo "<p>{$messages["$error"]}</p>";
}
?>
</body>
</html>