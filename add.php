<?php
session_start();
$error = $_SESSION['error'] ?? '';
$old = $_SESSION['old'] ?? ['name'=>'','age'=>'','department'=>''];
unset($_SESSION['error'], $_SESSION['old']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Admin Dashboard | Add</title>
  <link rel="stylesheet" href="./styles/add.css?v=2" />
  <link rel="icon" type="image/svg" href="./public/icons/favicon.svg" />
  <script src="/admin-dashboard/js/script.js" defer></script>
</head>
<body>
  <?php include_once "./components/header.php" ?>
  <h1>Add New Student</h1>
  <br><br>
    <form action="add.php" method="post">
        <!-- Student Name -->
        <label for="name">Student Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter student's Full name" required>
        <br><br>

        <!-- Age -->
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" placeholder="Enter student's age" required>
        <br><br>

        <!-- Department Dropdown -->
        <label for="department">Department:</label>
        <select id="department" name="department" required>
            <option value="">-- Select Department --</option>
            <option value="Computer Science">Computer Science</option>
            <option value="Cyber Security Science">Cyber Security Science</option>
            <option value="Software Engineering">Software Engineering</option>
            <option value="Information Science and Media Studies">Information Science and Media Studies</option>
            <option value="Information Technology">Information Technology</option>
            <option value="Data Science">Data Science</option>
        </select>
        <br><br>

        <!-- Buttons -->
        <button type="button" onclick="window.location.href='index.php'">Cancel</button>
        <button type="submit">Add Student</button>
    </form>

</body>
</html>