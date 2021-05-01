
<?php
//tells php to use a file 
require('lib_db.php');
require('lib_session.php');
//php would then load db.php and create a new connection called pdo. 
//run a function -> 
//query to send a sql statement to the database
//if use query dont have to use prepare
$stmt = $pdo->prepare('SELECT ID, title, date FROM posts');
$stmt->execute([]);

//Count of number of post
echo $stmt->rowCount() .'</br>';
 
//loop through the list of records 
//while fetch one record and store into variable called row
//and keep looping through the list and display the name
while ($row = $stmt->fetch())
{
    echo $row['title'] . '<br />';
    //create a link to detail and a get parameter for the link
    echo '<p><a href="post_detail.php?id='.$row['ID'].'">'.$row['title'] . '</a></p>';

}




?>


<!-- <php -->


<!-- //set the parameters for the database
//$host = 'us-cdbr-east-03.cleardb.com';
//$db= 'heroku_0fee3eb8a2e4d23';
//$user = 'bfbe1afa9693fa';
//$pass = '5753194e';
//$charset = 'utf8';
//$dsn= "mysql:host=$host;dbname=$db;charset=$charset";

//$opt = [
//    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
 //   PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
 //   PDO::ATTR_EMULATE_PREPARES => false,
//];

//Creates a new connection
//$pdo= new PDO($dsn, $user, $pass, $opt);


//  $pdo->query("CREATE TABLE users (
//     ID int(11) NOT NULL,
//     is_admin tinyint(4) NOT NULL DEFAULT 0,
//     email varchar(64) DEFAULT NULL,
//     password varchar(96) DEFAULT NULL,
//     firstname varchar(48) DEFAULT NULL,
//     lastname varchar(48) DEFAULT NULL
//   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;"
//   );
  
//   $pdo->query("ALTER TABLE users
//   ADD PRIMARY KEY (`ID`);"
//   );

//   $pdo->query("ALTER TABLE users
//   MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;");

  
// $pdo->query("INSERT INTO `users` (`ID`, `is_admin`, `email`, `password`, `firstname`, `lastname`) VALUES
// (1, 1, 'burchfieldchristina@gmail.com', 'password', NULL, NULL),
// (2, 0, 'johndoe@gmail.com', 'password', 'John', 'Doe');");


//$stmt =$pdo->query("ALTER TABLE `posts`
//ADD PRIMARY KEY (`ID`);");

//$stmt =$pdo->query("ALTER TABLE `posts`
//MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;");





//$options = ['rock', 'paper', 'scissor'];
//$result = $options[rand(0, count($options)-1)];
?> --> 

<!-- <!doctype html>
<html lang="en">
  <head>
    -- Required meta tags --
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    -- Bootstrap CSS --
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Rock, paper, or scissor</title>
  </head>
  <body>
  <div class ="container">

<php

// while ($row = $stmt->fetch())
// {
    
//     //create a link to detail and a get parameter for the link
//     echo '<h2>'.$row['ID'].'. '.$row['email'] . '</h2>';

// }



?>
  </div>
    

    -- Optional JavaScript; choose one of the two! --

    -- Option 1: Bootstrap Bundle with Popper --
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    -- Option 2: Separate Popper and Bootstrap JS --
    --
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    
  </body>
</html> -->