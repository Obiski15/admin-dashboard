<?php

require_once "../../config/db.php";
require_once "../../utils/helpers.php";

session_start();

$_SESSION["test"] = "test session";

$studentID = clean_input($_POST["studentID"]);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($studentID)) {
    
    
    $nameErr = $ageError = $departmentErr = "";

    $department = clean_input($_POST["department"]);
    $age = intval(clean_input($_POST["age"]));
    $name = clean_input($_POST["name"]);
    
    if (!$name || !$age || !$department) {
        $_SESSION['error'] = 'Please fill all required fields';
        header("Location: /admin-dashboard/edit.php");
        exit;
    }

    $stmt = $con->prepare("UPDATE students SET department = ?, age = ?, name = ? WHERE studentID = ? ");
    $stmt->bind_param("siss", $department, $age, $name, $studentID);
    
    if($stmt->execute()){
        $_SESSION["success"] = "Student record updated successfully!";
        $stmt->close();
    }else{
        $_SESSION["error"] = "Unable to update record. Please try again!";
    }
    header("Location: /admin-dashboard/edit.php?studentID=$studentID");
    
} else  {
    $_SESSION["error"] = "Invalid request";
    header("Location: /admin-dashboard/");
}

$con->close();
?>