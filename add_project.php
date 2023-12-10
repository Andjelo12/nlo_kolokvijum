<?php
require_once 'config.php';
require_once 'db_config.php';
require_once 'functions.php';

$developers=$_GET['developers'];
$name=$_GET['name'];
$description=$_GET['description'];
$start_date=$_GET['start'];
$end_date=$_GET['end'];
$type=$_GET['type'];
if (empty($developers) || empty($name) || empty($description) || empty($start_date) || empty($end_date) || empty($type)){
    header("Location:new_project.php?error=1");
    exit();
}

$id=insertIntoProjects($name,$description,$start_date,$type,$end_date);
foreach ($developers as $developer)
    insertIntoProjectsDevelopers($id,$developer);