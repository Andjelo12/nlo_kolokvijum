<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>php 70</title>
</head>

<body>
<form name="form" method="get" action="add_project.php">
    <?php
    require_once 'config.php';
    require_once 'db_config.php';
    require_once 'functions.php';

    echo "<label for=\"developer\">Developers:</label><br> <select name=\"developers[]\" size=\"4\" id=\"developer\" multiple>\n";
    $data=showAllData();
    foreach ($data as $dt) {
        echo "<option value=\"{$dt['id_developer']}\">{$dt['username']}</option>\n";
    }
    echo "</select>\n ";

    ?>
    <br>
    <label for="name">Name of project:</label><br>
    <input type="text" name="name" id="name"><br>
    <label for="description">Name of project:</label><br>
    <textarea name="description" id="description"></textarea><br>
    <label for="start">Datum pocetka:</label><br>
    <input type="datetime-local" name="start" id="start"><br>
    <label for="end">Datum zavrsetka:</label><br>
    <input type="datetime-local" name="end" id="end"><br>
    <label for="web">web</label>
    <input type="checkbox" name="type[]" value="web" id="web"><br>
    <label for="mobile">mobile</label>
    <input type="checkbox" name="type[]" value="mobile" id="mobile"><br>
    <label for="design">design</label>
    <input type="checkbox" name="type[]" value="design" id="design"><br>
    <label for="integrated">integrated</label>
    <input type="checkbox" name="type[]" value="integrated" id="integrated"><br>
    <input type="submit" name="sb" value="send">
    <input type="reset" name="rb" value="cancel">
</form>
<?php

$error = isset($_GET["error"]) ? (int)$_GET["error"] : 0;

if ($error == 1)
    echo "<b>Please, fill all fields!</b><br><br>";

?>
</body>
</html>