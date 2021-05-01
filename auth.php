<?php
require('lib_session.php');


//to allow the user to signout
if(isset($_GET['action']) && $_GET['action']=='signout' && isset($_SESSION['user/ID']))
{
    session_destroy();
    header('location:public.php');
}
else
//checks to see if the user is already log in and will direct them to the private page without having to re log in.

if(isset($_SESSION['user/ID']))
{
    header('location:private.php');

}


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Authentication Page</title>
  </head>
  <body>

<?php
if(count($_POST)>0)
{
    switch($_POST['action'])
    {
        case 'signin':
            signin($_POST['email'], $_POST['password']);
            break;
        case 'signup':
        signup($_POST['email'], $_POST['password']);
        break;
    }
}


    function signin($email, $password)
    {
        require('db.php');
        //check if the user is in the database and check is the user is an admin 
        $query= $pdo->prepare('SELECT ID,password, is_admin FROM users WHERE email =?');
        $query->execute([$email]);

        if($query->rowCount()==0)
        {
            echo "The user does not exist, please sign up";
            return;
        }

        //check if the password is correct

        $user= $query->fetch();
        if(password_verify($password, $user['password']))
        {
            echo 'Welcome to the website';
            $_SESSION['user/ID'] = $user['ID'];
            //checks if the user is an admin
            $_SESSION['user/is_admin']=$user['is_admin'];
            header('location:private.php');
        }
        else{
            echo "email and password are incorrect";
        }
        //log them in
        // $_SESSION['user/ID']

    }

    function signup($email, $password)
    {
        require('db.php');
        //check if already have an account
        //check if the user is in the database
        $query= $pdo->prepare('SELECT ID FROM users WHERE email =?');
        $query->execute([$email]);

        if($query->rowCount()>0)
        {
            echo "The user already exisit please sign in";
            return;
        }

        //add the user to the database

        $query= $pdo->prepare('INSERT INTO users(email, password) VALUES (?,?)');
        //Hash the password
        $query->execute([$email,password_hash($password, PASSWORD_DEFAULT)]);
        //show a message
        echo "Your account has been create: please sign in";
    }

?>




    <div class = "container">
    <div class = "row">
        <div class = "col-lg-6">
        <h1>Access your account</h1>
            <form method = "POST">
            <input type = "hidden" name = "action" value = "signin" />
            <div class = "form-group">
                <label>Email</label>
                <input type = "email" name = "email" class = "form-control" />
            </div>
            <div class = "form-group">
                <label>Password</label>
                <input type = "password" name = "password" class = "form-control" />
            </div>
            <div class = "form-group mt-3">
                <button class = "btn btn-primary" type = "submit" >Access your Account </button>
            </div>


            </form>
        </div>

        <div class = "col-lg-6">
        <h1>Register your account</h1>
            <form method = "POST">
            <input type ="hidden" name = "action" value = "signup" />
            <div class = "form-group">
                <label>Email</label>
                <input type = "email" name = "email" class = "form-control" />
            </div>
            <div class = "form-group">
                <label>Password</label>
                <input type = "password" name = "password" class = "form-control" />
            </div>
            <div class = "form-group mt-3">
                <button class = "btn btn-primary" type = "submit" >Register your Account </button>
            </div>


            </form>
        </div>
    </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>