<?php
require_once "./app/controller/students/student.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Student</title>
  <link rel="stylesheet" href="./styles/delete.css" />
  <link rel="icon" type="image/svg" href="./public/icons/favicon.svg" />
  <script src="/admin-dashboard/js/script.js" defer></script>
</head>
<body>
  <?php include_once "./components/header.php" ?>

  <div class="delete-container">
    
    <main>
      <h2>Confirm Deletion</h2>
      <p>Are you sure you want to delete the record for <strong><?php echo $student['name']; ?></strong>?</p>

      <form method="POST" action="./app/controller/students/delete-student.php">
        <input name="studentID" value="<?php echo htmlspecialchars($studentID); ?>" hidden />
        <div id="action-buttons">
          <a href="index.php" class="btn cancel-btn secondary-btn">Cancel</a>
          <button type="submit" class="confirm-btn primary-btn">Confirm</button>
        </div>
      </form>
    </main>
  </div>
</body>
</html>
