<?php 
require_once "./app/config/db.php";

$sql = "SELECT * from student";

$students = mysqli_query($con, $sql);

mysqli_close($con);
?>