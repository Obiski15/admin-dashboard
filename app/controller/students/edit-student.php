<?php

require_once __DIR__ . '/../../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_student'])) {

    $id = isset($_POST['student_id']) ? intval($_POST['student_id']) : 0;
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $age = isset($_POST['age']) ? intval($_POST['age']) : 0;
    $department = isset($_POST['department']) ? trim($_POST['department']) : '';

    if ($id <= 0 || empty($name) || $age <= 0 || empty($department)) {
        $_SESSION['error'] = "Invalid data provided. Please fill out all fields.";
        header("Location: /admin-dashboard/");
        exit();
    }

    $stmt = $conn->prepare("UPDATE students SET name = ?, age = ?, department = ? WHERE id = ?");
    
    $stmt->bind_param("sisi", $name, $age, $department, $id);

    if ($stmt->execute()) {
        $_SESSION['SUCCESS'] = "Student record updated successfully.";
    } else {
        $_SESSION['error'] = "Failed to update student record: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    header("Location: /admin-dashboard/");
    exit();

} else {
    // close and redirect back to main dashboard
    $_SESSION['error'] = "Invalid request.";
    header("Location: /admin-dashboard/");
    exit();
}
?>