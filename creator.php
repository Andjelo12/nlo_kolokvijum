<?php
require_once 'config.php';
require_once 'db_config.php';
require_once 'functions.php';

$temp=createDevelopersArray($names,$positions,$roles);
var_dump($temp);