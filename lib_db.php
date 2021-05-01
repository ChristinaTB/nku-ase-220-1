<?php
//set the parameters for the database
$host = 'localhost:3308';
$db= 'blogwebsite';
$user = 'root';
$pass = '';
$charset = 'utf8';
$dsn= "mysql:host=$host;dbname=$db;charset=$charset";

$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

//Creates a new connection
$pdo= new PDO($dsn, $user, $pass, $opt);


?>