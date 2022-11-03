<?php
session_start(); 
include("classes/connect.php");
include("classes/login.php");

$email = "";
$password = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $login = new login();
    $result = $login->evaluate($_POST);
    
   
    $email = $_POST['email'];
    $password = $_POST ['password'];


    if ($result != "") {
      // error empty
      echo "<div  style= 'position: absolute;  font-size:12px;color:white;'>";
      echo "<br> The following errors occured:<br><br>";
      echo $result;
      echo "</div>";
    }else{
     
      header("location: homepage.php");
      die;
    }

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="login.css">
    <link rel="shortcut icon" href="/image/en-icon.png" type="image/x-icon">
    <title>Enote - log in or sign up</title>
  </head>
  <body>
    <div class="container">
      <h2>Login</h2>
      <form method="POST" action="" class="form" id="form">
        <div class="formControl">
          <div class="email">
            <label>Username</label>
            <input value="<?php echo $email ?>" name="email" type="email" placeholder="Email" id="email" required />
          </div>
         <div class="password">
          <label>Password</label>
          <input value="<?php echo $password ?>" name="password" type="password" placeholder="Password" id="password" required>
         </div>
          <div class="login">
            <input type="submit" value="Login">
          <a href="signup.php">Create new account</a>
          </div>
        </div>
    </div>
    </form>
  </body>
</html>