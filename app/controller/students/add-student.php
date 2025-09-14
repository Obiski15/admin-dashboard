<?php
session_start();

require_once "../../utils/helpers.php";
require_once "../../config/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $department = clean_input($_POST["department"]);
    $name = clean_input($_POST["name"]);
    $age = clean_input($_POST["age"]);


    // Validate required fields
    if ($name === '' || $age === '' || $department === '') {
      $_SESSION['error'] = 'Please fill all required fields';
      header("Location: /admin-dashboard/add.php");
      exit;
    }
    
    // insert student
    $stmt = $con->prepare("INSERT INTO students (name, age, department) VALUES (?, ?, ?)");
    $stmt->bind_param('sis', $name, $age, $department);
    $last_id; 
  
    if($stmt->execute()){
      $last_id = $con->insert_id;
      $stmt->close();
    }else{
      $_SESSION['error'] = 'An error occurred. Please try again';
      header("Location: /admin-dashboard/add.php");
      exit;
    }

    // generate student id based on the last incremented key
    $studentID = genStudentId($department, $last_id);

    // update student id
    $update = $con->prepare("UPDATE students SET studentID = ? WHERE id = ?");
    $update->bind_param("si",$studentID, $last_id);

    if ($update->execute()) {
      $_SESSION['success'] = 'Student added successfully';
      $update->close();
      header("Location: /admin-dashboard/index.php");
    } else {
      $_SESSION['error'] = 'An error occurred. Please try again';
      header("Location: /admin-dashboard/add.php");
      exit;
    }
    
} else {
  $_SESSION["error"] = "Invalid request";
  header("Location: /admin-dashboard/");
  }

$con->close();
?>
