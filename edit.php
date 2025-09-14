<?php
require_once "./app/controller/students/student.php";
require_once "./app/utils/constants.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Admin Dashboard | Edit</title>
    <link rel="icon" type="image/svg" href="./public/icons/favicon.svg" />
    <link rel="stylesheet" href="./styles/form.css" />
    <script src="/admin-dashboard/js/script.js" defer></script>
  </head>
<body>
  <?php include_once "./components/header.php"; ?>

  <main>  
    <div id="#wrapper">
      <div id="form-header">
        <h2>Edit Student Record</h2>
      </div>
      
      <form action="./app/controller/students/edit-student.php" method="post">
        <input name="studentID" value="<?php echo $student["studentID"]; ?>" hidden>

        <div class="field-group">
          <label for="name">Student Name:</label>
          <input type="text" id="name" name="name" placeholder="Enter student's Full name" value="<?php echo $student["name"]; ?>" required> 
        </div>

        <div class="field-group">
          <label for="age">Age:</label>
          <input type="number" id="age" name="age" placeholder="Enter student's age" value="<?php echo $student["age"]; ?>" required>
        </div>

        <div class="field-group">
          <label for="department">Department:</label>

          <select id="department" name="department" required>
            <option value="">-- Select Department --</option>
            <?php
              foreach (DEPARTMENTS as $value){
                echo "<option value='$value'" . ($value === $student['department'] ? " selected" : "") . ">$value</option>";
              };
            ?>
          </select>
        </div>

        <div id="action-buttons">       
          <button type="submit" class="primary-btn">Save Changes</button>
        </div>
      </form>
    </div>
  </main>    
</body>
</html>