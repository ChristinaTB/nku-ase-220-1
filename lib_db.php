<?php
//set the parameters for the database
// $host = 'localhost:3308';
// $db= 'blogwebsite';
// $user = 'root';
// $pass = '';
// $charset = 'utf8';
// $dsn= "mysql:host=$host;dbname=$db;charset=$charset";

$host = 'us-cdbr-east-03.cleardb.com';
$db= 'heroku_0fee3eb8a2e4d23';
$user = 'bfbe1afa9693fa';
$pass = '5753194e';
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