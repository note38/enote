<?php 
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
 crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
    <button class="btn btn-primary my-5">
        <a href="user.php" class="text-light">Add user</a>
    </button>
    <button  class="btn btn-primary my-5"><a href="logout.php" class="text-light">Log Out</a></button>

    <table class="table table-striped table-hover">

  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Operation</th>
      <th scope="col">User Type</th>
    </tr>
  </thead>
  
  <?php

    $sql="SELECT * from `account` where usertype != 'admin' ";
    $result=mysqli_query($conn,$sql);
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $id=$row['id'];
            $firstname=$row['firstname'];
            $lastname=$row['lastname'];
            $email=$row['email'];
            $password=$row['password'];
            $usertype=$row['usertype'];
            echo '<tr>
            <th scope="row">'.$id.'
            <td>'.$firstname.'</td>
            <td>'.$lastname.'</td>
            <td>'.$email.'</td>
            <td>'.$password.'</td>
            <td>'.$usertype.'</td>
            <td>
            <button class="btn btn-primary"><a href="update.php? editid='.$id.'"
             class="text-light">Edit</a></button>
            <button class="btn btn-danger"><a href="delete.php? deleteid='.$id.'"
             class="text-light">Delete</a></button>
            </td>
            </tr>';
            
        }
    }
  ?>
  
</table>
</div>
</body>
</html>