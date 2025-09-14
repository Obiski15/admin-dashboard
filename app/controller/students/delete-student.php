<?php

require_once "../../config/db.php"; 
session_start();

$studentID = $_POST['studentID']; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($studentID) ) {

    $stmt = $con->prepare("DELETE FROM students WHERE studentID = ?");
    $stmt->bind_param("s", $studentID);

    if ($stmt->execute()) {
        $_SESSION["success"] = "Student with ID $studentID has been deleted.";
        $stmt->close();
    } else {
        $_SESSION["success"] = "Failed to delete student: $studentID";
    }
    header("Location: /admin-dashboard/index.php");

} else {
    $_SESSION["error"] = "Invalid request";
}

$con->close();
?>
