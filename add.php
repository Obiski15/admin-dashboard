
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Admin Dashboard | Add</title>
    <link rel="icon" type="image/svg" href="./public/icons/favicon.svg" />
    <link rel="stylesheet" href="./styles/form.css" />
    <script src="/admin-dashboard/js/script.js" defer></script>
  </head>
<body>
  <?php include_once "./components/header.php" ?>

  <main>
    <div id="#wrapper">
      <div id="form-header">
        <h2>Add New Student</h2>
      </div>

      <form action="./app/controller/students/add-student.php" method="post">
        <div class="field-group">

          <label for="name">Student Name:</label>
            
            <input type="text" id="name" name="name" placeholder="Enter student's Full name" required> 
        </div>

        <div class="field-group">
          <label for="age">Age:</label>
          <input type="number" id="age" name="age" placeholder="Enter student's age" required>
        </div>

        <div class="field-group">
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
        </div>

        <div id="action-buttons">       
          <button type="submit" class="primary-btn">Add Student</button>
        </div>
      </form>
    </div>
  </main>    
</body>
</html>