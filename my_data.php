<?php
require_once 'config.php';
require_once 'db_config.php';
require_once 'functions.php';
session_start();
$data=showData($_SESSION['id_developer']);
if ($data['role']=='admin')
    header("Location:index.php?e=2");
foreach ($data as $k=>$v)
    echo "$k = $v<br>";
echo "<br><a href='logout.php'>logout</a>";