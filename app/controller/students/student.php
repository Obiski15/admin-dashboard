<?php
require_once  __DIR__ . "/../../utils/helpers.php";
require_once  __DIR__ . "/../../config/db.php";

session_start();

$studentID = clean_input($_GET['studentID']);

if(empty($studentID)) {
  $_SESSION["error"] = "No student ID provided.";
  header("Location: /admin-dashboard/");
}

$stmt = $con->prepare("SELECT * from students WHERE studentID = ?");
$stmt->bind_param("s", $studentID);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();


if(!$student) {
  echo "Student record not found";
  header("Location: /admin-dashboard/");
}

$stmt->close();
?>