<?php
require_once __DIR__ . "/./constants.php";


function clean_input($value) {
  return htmlspecialchars(stripslashes(trim($value)));
}

function genStudentId($department, $last_id){
  $studentID = DEPT_CODES[$department] . str_pad($last_id, 4, "0", STR_PAD_LEFT);

  return $studentID;
}
?>