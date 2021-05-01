<?php
//tells php to use a file 
require('lib_db.php');
require('lib_session.php');

// //A simple query but is subject to sql injection
// $stmt = $pdo->query('SELECT ID, title, date FROM posts WHERE ID=' .$_GET['id']);

// $post= $stmt->fetch();


// echo $post['title'];


//before delelting select the post
$stmt = $pdo->prepare('SELECT * FROM posts WHERE ID=?');
$stmt->execute([$_GET['id']]);
//could be $stmt ->execute([]);
$post= $stmt->fetch();





//if the user is not the owner of the post or not log in it cant allow it to display edit feature
if(isset($_SESSION['user/ID']) || $post['user_ID']!= $_SESSION['user/ID'])
{
    header('location:index.php');
    return;

}




//Prepared statemeent are to protect against sql injections from the url and in post 

$stmt = $pdo->prepare('DELETE FROM posts WHERE ID=?');
$stmt->execute([$_GET['id']]);
//could be $stmt ->execute([]);
// $post= $stmt->fetch();

header('location: index.php');
?>

