<?php

require_once "./app/config/db.php";

if (!isset($_GET['studentID'])) {
  echo "No student ID provided.";
  exit();
}

$studentID = $_GET['studentID'];
$stmt = $con->prepare("SELECT * FROM students WHERE studentID = ?");
$stmt->bind_param("s", $studentID);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();
$stmt->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Student</title>
  <link rel="stylesheet" href="./styles/delete.css" />
  <link rel="icon" type="image/svg" href="./public/icons/favicon.svg" />
</head>
<body>
  <?php include_once "./components/header.php" ?>

  <div class="delete-container">
    <h2>Confirm Deletion</h2>
    <p>Are you sure you want to delete the following student?</p>

    <ul>
      <li><strong>Name:</strong> <?= htmlspecialchars($student['name']) ?></li>
      <li><strong>Age:</strong> <?= htmlspecialchars($student['age']) ?></li>
      <li><strong>Department:</strong> <?= htmlspecialchars($student['department']) ?></li>
    </ul>

  <form method="POST" action="./app/controller/students/delete-student.php">
    <input type="hidden" name="studentID" value="<?php echo htmlspecialchars($studentID); ?>" />
    <button type="submit" class="confirm-btn">Yes, Delete</button>
    <a href="index.php" class="cancel-btn">Cancel</a>
  </form>
  </div>
</body>
</html>
