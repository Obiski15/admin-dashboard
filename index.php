<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Admin Dashboard</title>
  <link rel="stylesheet" href="./styles/index.css?v=2" />
  <link rel="icon" type="image/svg" href="./public/icons/favicon.svg" />
  <script src="/admin-dashboard/js/script.js" defer></script>
</head>
<style>
body { overflow-y: scroll !important; }
html, body { height: auto !important; }
</style>
<body>
  <?php include_once "./components/header.php" ?>
        <?php
      session_start();
      if (isset($_SESSION['SUCCESS'])) {
        echo '<div class="flash-success">'.htmlspecialchars($_SESSION['SUCCESS']).'</div>';
        unset($_SESSION['SUCCESS']);
      }
      if (isset($_SESSION['error'])) {
        echo '<div class="flash-error">'.htmlspecialchars($_SESSION['error']).'</div>';
        unset($_SESSION['error']);
      }
      ?>

  <?php
  require_once "./app/controller/students/students.php";

  echo "<script>console.log(".json_encode($students).")</script>";
  ?>

  <!-- desktop records -->
  <div id="records">
    <div id="records-heading">
      <h2>Student Records</h2>
      <p>Manage students information efficiently</p>
    </div>


  <?php if(mysqli_num_rows($students) > 0): ?>
      <div id="search-records">
        <div id="search">
          <img src="public/icons/search.svg" alt="search"/>
          <input placeholder="Search by name or department" />
        </div>
      </div>

  <div id="table-wrapper">
    <div id="table">
      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Department</th>
            <th>Student ID</th>
            <th>Actions</th>
          </tr>
        </thead>

        <tbody>
          <?php while ($row = mysqli_fetch_assoc($students)): ?>
            <tr>
              <td><?php echo htmlspecialchars($row['name']); ?></td>
              <td><?php echo htmlspecialchars($row['age']); ?></td>
              <td><?php echo htmlspecialchars($row['department']); ?></td>
              <td><?php echo htmlspecialchars(string: $row['studentID']); ?></td>
              <td>
                <a href="edit.php?studentID=<?php echo urlencode($row['studentID']); ?>">edit</a> |
                <a href="delete.php?studentID=<?php echo urlencode($row['studentID']); ?>">delete</a>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>

  <div id="records-mobile">
    <?php mysqli_data_seek($students, 0);?>
    <?php while ($row = mysqli_fetch_assoc($students)): ?>
      <div class="record-row">
        <div class="record-row-info">
          <h3><?php echo htmlspecialchars($row['name']); ?></h3>
          <p>Age: <span><?php echo htmlspecialchars($row['age']); ?></span></p>
          <p>Department: <span><?php echo htmlspecialchars($row['department']); ?></span></p>
        </div>

        <div class="action-icons-wrapper">
          <a href="edit.php?studentID=<?php echo urlencode($row['studentID']); ?>">
            <img src="public/icons/edit.svg" alt="edit"/>
          </a>
          <a href="delete.php?studentID=<?php echo urlencode($row['studentID']); ?>">
            <img src="public/icons/trash.svg" alt="delete"/>
          </a>
        </div>
      </div>
    <?php endwhile; ?>
  </div>

      <div id="add-student">
        <a href="add.php">
          <img src="/admin-dashboard/public/icons/plus.svg" alt="add"/>
        </a>
      </div>
    <?php else: ?>
      <div>
        No student records found
      </div>
    <?php endif; ?>
  </div>

  </div>


</body>
</html>