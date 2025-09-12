<?php

require_once "../../config/db.php"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['studentID'])) {
    $studentID = $_POST['studentID']; 

    $stmt = $con->prepare("DELETE FROM students WHERE studentID = ?");
    $stmt->bind_param("s", $studentID);

    if ($stmt->execute()) {
        echo "Student with ID $studentID has been deleted.";
        header("Location: /admin-dashboard/index.php");
    } else {
        echo "Failed to delete student: " . $con->error;
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}

$con->close();
?>
