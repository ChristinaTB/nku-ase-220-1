<?php
//tells php to use a file 
 require('lib_db.php');
 require('lib_session.php');


if(count($_POST)> 0)
{
   
    
    $stmt = $pdo->prepare('UPDATE posts SET title= ?, content = ?, date = ?, img = ?, user_ID =? WHERE posts.ID = ?');
    $stmt->execute([$_POST['title'],$_POST['content'],str_replace('T', ' ' , $_POST['date']),$_POST['img'],$_POST['user_ID'],$_POST['ID']]);
 //dont need to fetch due to already having data  $post= $stmt->fetch();

    echo 'Your post has been saved'; 

}


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


?>

<html>
    <head>
    </head>

    <body>
    <form method= "POST"  >
    <input type = "hidden" name ="ID"  value="<?= $post['ID'] ?>" />
        <label>Title</label><br />
        <input type = "text" name = "title" value="<?= $post['title'] ?>" /><br /><br />

        <label>Content</label><br />
        <textarea type = "text" name = "content"><?= $post['content'] ?></textarea><br /><br />


        <label>Date</label><br />
        <input type = "datetime-local" name = "date"  value="<?= str_replace(' ', 'T', $post['date']) ?>" /><br /><br />

        <label>Image</label><br />
        <input type = "url" name = "img"  value="<?= $post['img'] ?>" /><br /><br />

        
        <label>Author ID</label><br />
        <input type = "number" name = "user_ID"  value="<?= $post['user_ID'] ?>"/><br /><br />

        <button type ="submit">Edit Post</button>
    </form>
    </body>

</html>