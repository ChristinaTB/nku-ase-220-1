
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