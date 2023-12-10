<?php
require_once 'config.php';
require_once 'db_config.php';
require_once 'functions.php';
$i=9;
//$array=[];
do{
    $temp=(createDevelopersArray($names, $positions, $roles));
}while ($temp['role']!='admin');
$array[]=$temp;
while($i){
    $temp=(createDevelopersArray($names, $positions, $roles));
    while ($temp['role']=='admin')
        $temp=(createDevelopersArray($names, $positions, $roles));
    $array[]=$temp;
    $i--;
}
foreach ($array as $arr)
    insertIntoDevelopers($arr);