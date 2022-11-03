<?php

include("classes/utils.php");
include("classes/connect.php");
include("classes/signup.php");

$firstname = "";
$lastname = "";
$email = "";
$password = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $utils = new utils();


  $signup = new Signup();
  $result = $signup->evaluate($_POST);
  $resultUtils = $utils->debug_to_console($result);
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $password = $_POST ['password'];
  
  

  if ($result != "") {
    // error empty
    echo "<div  style= 'position: absolute;  font-size:12px;color:white;'>";
    echo "<br> The following errors occured:<br><br>";
    echo $result;
    echo "</div>";
  }else{
    header("location:homepage.php");
    die;
  }



 
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="signup.css">
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
              <input value="<?php echo $firstname ?>" type="text" placeholder="First Name"  name= "firstname" />
            </div>
            <div class="lastName">
              <input value="<?php echo $lastname ?>" type="text"  placeholder="Last Name" name="lastname" />
            </div>
          </div>
          <div class="email">
            <input  value="<?php echo $email ?>" type="email"  placeholder="Email" name="email"  />
          </div>
          <div class="password">
            <input  value="<?php echo $password ?>" type="password"  placeholder="password" name="password" />
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