<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "nama-database";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(mysqli_connect_error()){
    echo "Database connection error";
  } 
?>