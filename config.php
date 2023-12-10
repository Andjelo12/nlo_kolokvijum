<?php
const PARAMS = [
    "HOST" => 'localhost',
    "USER" => 'root',
    "PASSWORD" => '',
    "DB" => 'it',
    "CHARSET" => 'utf8mb4'
];

$dsn = "mysql:host=" . PARAMS['HOST'] . ";dbname=" . PARAMS['DB'] . ";charset=" . PARAMS['CHARSET'];

$pdoOptions = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
];

$messages = [
    1 => 'User doesn\'t exist!',
    2 => 'You can\'t access this page as admin'
];
$names=[
    ['firstname'=>'Jovan','lastname'=>'Ducic'],
    ['firstname'=>'Milunka','lastname'=>'Savic'],
    ['firstname'=>'Jova','lastname'=>'Zmaj'],
    ['firstname'=>'Petar','lastname'=>'Petrovic'],
    ['firstname'=>'Marko','lastname'=>'Milosevic'],
    ['firstname'=>'Zivojin','lastname'=>'Misic'],
    ['firstname'=>'Petar','lastname'=>'Drapsin'],
    ['firstname'=>'Sinisa','lastname'=>'Pavlovic'],
    ['firstname'=>'Milica','lastname'=>'Todorovic'],
    ['firstname'=>'Petar','lastname'=>'Kralj']
];
$positions=[
    ['name'=>'senior','salary'=>2300],
    ['name'=>'junior','salary'=>1200],
    ['name'=>'medior','salary'=>1800]
];
$roles=['admin','frontend developer','backend developer','full stack developer','boss'];

