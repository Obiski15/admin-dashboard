<?php
  $host = "localhost";
  $user = "root";
  $pass = "root";
  $dbname = "school";

  $con = new mysqli($host, $user, $pass, $dbname);

  if($con->connect_error){
    die("Database connection failed" . $con->connect_error);
  }
?>