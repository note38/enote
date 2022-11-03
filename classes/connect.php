<?php

 class Database
 {
// IMPORTANT--->
  private $servername = "localhost";
  private $username = "root";
  private $password = "";
  private $dbname = "crud";

// Create connection
function connect()
{
  $connection = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
  return $connection;
}

// READ AND RETURN DATA ---->
function read($query)
{
  $conn = $this->connect();
  $result = mysqli_query($conn,$query);
  
  if (!$result)
  {
    return false;
  }
  else
  {
    $data = false;
    while($row= mysqli_fetch_assoc($result)){
      $data[] = $row;
    }
    return $data;
  }
}
// TO SAVE MY QUERY---->
function save($query)
{
  $conn = $this->connect();
  $result = mysqli_query($conn,$query);

  if(!$result){
    return false;
  }else{
    return true;
  }
}
 }

//  $DB = new Database();

//  $query = "select * from account";
//  $data = $DB->save($query);

//  echo "<pre>";
//  print_r($data);
//  echo "</pre>";
?>