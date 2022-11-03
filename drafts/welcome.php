<?php
session_start();
?>
<?php if($_SESSION['usertype'] ==='admin'){
    header("Location:display.php");
} ?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>welcome <?php echo $_SESSION['firstname']; ?></h1>
    <button><a href="logout.php">Log Out</a></button>
</body>
</html> -->