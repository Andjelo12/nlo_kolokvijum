<?php
require_once 'config.php';
require_once 'db_config.php';
require_once 'functions.php';
session_start();
$data=showData($_SESSION['id_developer']);
echo "You are loged in as {$data['username']}<br>";
echo '<a href="positions.php">positions</a><br>';
echo '<a href="new_project.php">new_projects</a><br>';
echo '<a href="logout.php">logout</a><br>';