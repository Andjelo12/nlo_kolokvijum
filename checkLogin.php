<?php
require_once 'config.php';
require_once 'db_config.php';
require_once 'functions.php';
session_start();
$user=$_GET['username'];
$pass=$_GET['password'];
$array=checkUser($user,$pass);
if (empty($array)){
    insertFalseLogin($user,$pass);
    header("Location: index.php?e=1");
}else{
    $_SESSION['id_developer']=$array['id_developer'];
    $_SESSION['role']=$array['role'];
}
if ($_SESSION['role']!='admin')
    header("Location:my_data.php");
else
    header("Location:admins.php");