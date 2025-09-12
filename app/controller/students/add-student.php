  <?php
  //start session early so we can send flash/quick messages
  session_start();
  //load db connection
    require_once "../../config/db.php";

    function clean_input($data) {
      return htmlspecialchars(stripslashes(trim($data)));
    }

    if($_SERVER["REQUEST_METHOD"] === "POST"){
      $department = clean_input($_POST["department"]);
      $name = clean_input($_POST["name"]);
      $age = clean_input($_POST["age"]);

      // validate fields to be required
      //save old input so that add.php can repopulate them
      $_SESSION['old'] = ['name' => $name, 'age' => $age, 'department' => $department];

      //confirm if those field are filled or empty
      if($name === '' || $age === '' || $department === ''){
        $_SESSION['error']='please fill all required fields';
        header("Location: /admin-dashboard/add.php");
        exit;

        //prevent further processing
        //if they are empty they redirect to the add.php and logs the message below the form

      } 

      // make database call here

        $stmt = $con->prepare('INSERT INTO students(name, age, department) VALUES(?,?,?)');
        //above is a prepared statement/structure to prevent sql injection

        $stmt->bind_param('sis', $name, $age, $department);
        //s means string i means integer
        //notice the sis it tells the database the type of data to expect
        // the first is a string the second is an integer and the third is a string

        if($stmt->execute()){
          $stmt->close();
          //above closes the statement

          $con->close();
          //above closes the connection after successful execution
          //clear old inputs and set success message
          unset($_SESSION['old']);
          $_SESSION['SUCCESS']='Student added successfully';
          header("Location: /admin-dashboard/index.php");
          //the header function redirects to the index.php
          exit;
          //prevent further processing

        }else{
          //assuming the database failed to execute
          error_log("Database insert failed: " . $stmt->error);
          $stmt->close();
          $con->close();
          
          $_SESSION['error']='Server error, could not save Error';
          //we need to redirect the user to the Add.php page
          header("Location: /admin-dashboard/add.php");
          exit();
        }

      }

      
  
  ?>