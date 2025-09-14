<?php 
  if(isset($_SESSION["success"])){
    echo "<div class='flash-message flash-message-success'><p>" . $_SESSION["success"] . "</p></div>";
    unset($_SESSION["success"]);
  }

  if(isset($_SESSION["error"])){
    echo "<div class='flash-message flash-message-error'><p>" . $_SESSION["error"] . "</p></div>";
    unset($_SESSION["error"]);
  }
?>