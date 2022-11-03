<?php 
include 'connect.php';
   if(isset($_POST['submit'])){
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $email=$_POST['email'];
        $password=$_POST['password'];

        $sql="insert into `account` (firstname,lastname,email,password)
        values('$firstname','$lastname','$email','$password')";
        $result=mysqli_query($conn,$sql);
        if($result){    
            echo '<script type = "text/javascript">';
            echo 'alert("Data inserted successfully");';
            echo 'window.location.href ="user.php"';
            echo '</script>';
        } else{ 
            die("Connection failed: " . mysqli_connect_error());
        }
    }
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="user.css">
    <title>Sign up</title>
</head>
<body>
<div class="container">
      <h2>Create a new account</h2>
      <h4>It's quick and easy.</h4>
      <form method="POST" action="">
        <div class="formControl">
          <div class="userName">
            <div class="firstName">
              <input type="text" placeholder="First Name"  name= "firstname" required />
            </div>
            <div class="lastName">
              <input type="text"  placeholder="Last Name" name="lastname" required />
            </div>
          </div>
          <div class="email">
            <input type="email"  placeholder="Email" name="email" required />
          </div>
          <div class="password">
            <input type="password"  placeholder="password" name="password" required />
          </div>
        </div>
        <p>
          People who use our service may have uploaded your contact information
          to Enote. <a href="">Learn more.</a>
        </p>
        <div class="submit">
          <input type="submit" name="submit" value="Sign Up" />
        </div>
        <div class="haveAcc">
          <a href="login.php"
            >Already have an accout?</a
          >
        </div>
      </form>
    </div>
</body>
</html>



echo "<pre>";
print_r($_POST);
echo "</pre>";