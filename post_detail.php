<?php
//tells php to use a file 
require('lib_db.php');
//using session to insure anyone cant delete a post on the user and the admin
require('lib_session.php');


// //A simple query but is subject to sql injection
// $stmt = $pdo->query('SELECT ID, title, date FROM posts WHERE ID=' .$_GET['id']);

// $post= $stmt->fetch();


// echo $post['title'];

//Prepared statemeent are to protect against sql injections from the url and in post 

$stmt = $pdo->prepare('SELECT ID, title, content, img, user_ID, date FROM posts WHERE ID=?');
$stmt->execute([$_GET['id']]);
//could be $stmt ->execute([]);
$post= $stmt->fetch();

// echo $post['title'];
?>


<h1><?= $post['title'] ?></h1>
<p>
<?= $post['content'] ?>
</p>
<p>
<?= $post['date'] ?>
</p>
<p>
Published by: <?= $post['user_ID'] ?>
</p>

<?php
//to check if user can delete or edit post if logged in and check if admin
if(isset($_SESSION['user/ID']) && ($post['user_ID']== $_SESSION['user/ID'] || $_SESSION['user/is_admin']==1)){ ?>


<br />
<a href ="post_edit.php?id=<?= $_GET['id'] ?>">Edit this post</a>
<br />
<a href ="post_delete.php?id=<?= $_GET['id'] ?>">Delete this post</a>

<?php } ?>