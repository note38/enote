
<?php 
session_start();
include("classes/connect.php");
include("classes/login.php");
include("classes/user.php");
include("classes/post.php");

if(isset($_SESSION['userid']) && is_numeric($_SESSION['userid']))
{
  $id = $_SESSION['userid'];
  $login = new Login();
  $result = $login->check_login($id);

  if($result)
  {
    $user = new User();
    $user_data = $user->get_data($id);

      if(!$user_data)
      {
        header("location: login.php"); 
        die;
      }
  } 
  else
    {
      header("location: login.php");
      die;
    }
}
else
  {
    header("location: login.php");
    die;
  }
  

if ($_SERVER['REQUEST_METHOD'] == "POST"){

  $post = new Post ();
  $id = $_SESSION['userid'];
  $result = $post->create_post($id, $_POST);
 
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ebook - home page</title>
    <link rel="stylesheet" href="homepage.css">
    <link rel="shortcut icon" href="/image/en-icon.png" type="image/x-icon">
  </head>
  <body>

  <!-- <?php echo $_SESSION['firstname']; ?> <?php echo $_SESSION['lastname']; ?> -->
   <nav>
    <div class="navLeft">
      <div class="logo"> 
        <img src="image/en-icon.png" alt="">
      <h1>Enote</h1>
      </div>
    </div>
    <div class="navCenter">
      <ul>
        <li><a href=""><img src="image/home.png"></a></li>
        <li><a href=""><img src="image/friends.png"></a></li>
        <li><a href=""><img src="image/bell.png"></a></li>
      </ul>
    </div>
    <div class="navRight">
      <section>
        <div class="searchBox">
          <img src="image/search.png" alt="" >
          <input type="text" placeholder="Search">
        </div>
        <div class="user">
         <img src="image/profile-user.png" onclick="toggleMenu()">
        </div>
      </section>
      <div class="subMenuWrap" id="subMenu">
        <div class="userMenu">
          <div class="userInfo">
            <img src="image/profile-user.png" alt="">
            <h3><?php echo $user_data['firstname'] . " " . $user_data['lastname']; ?></h3>
          </div>
          <hr>
          <div class="logout">
            <a href="logout.php"><img src="image/logout.png" alt="">Log out</a>
          </div>
        </div>
      </div>
      </div>
    </div>
   </nav>
    <div class="sectionContainer">
    <div class="leftSection">dfgvbhjnkml,;./</div>
    <div class="mainSection">
      <section>
        <div class="container">
          <form action="" method="post">
          <textarea placeholder="Whats on your mind?" name="post" ></textarea>
          <input type="submit" value="post">
          </form>
          <br>
        </div>
      </section>
    </div>
    <div class="rightSection">
      sxasd,dasdl,sa
    </div>
    </div>
    <script>
      let subMenu = document.getElementById ("subMenu");
      function toggleMenu(){
        subMenu.classList.toggle("open-menu");
      }
    </script>
  </body>
</html>
