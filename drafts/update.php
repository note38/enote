<?php
include 'connect.php';
$id=$_GET['editid'];
$sql="SELECT * FROM `account` where id=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$firstname=$row['firstname'];
$lastname=$row['lastname'];

if(isset($_POST['submit'])){
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    

    $sql="update `account` set id=$id, firstname='$firstname'
    , lastname='$lastname' where id='$id'";
    $result=mysqli_query($conn,$sql);
    if($result){    
        echo '<script type = "text/javascript">';
        echo 'alert("Update successfull");';
        echo 'window.location.href ="display.php"';
        echo '</script>';
    } else{ 
        die("Update failed: " . mysqli_connect_error());
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
    <title>update</title>
</head>
<body>
<div class="container">
      <h2>Update account</h2>
      <h4></h4>
      <form method="POST" action="">
        <div class="formControl">
          <div class="userName">
            <div class="firstName">
              <input type="text" placeholder="First Name"  name= "firstname" value="<?php echo $firstname; ?>" required />
            </div>
            <div class="lastName">
              <input type="text"  placeholder="Last Name" name="lastname" value="<?php echo $lastname; ?>" required />
            </div>
          </div>
          <div class="submit">
          <input type="submit" name="submit" value="Update" />
        </div>
      </form>
    </div>
</body>
</html>