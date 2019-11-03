<?php
    // start session
    session_start();
    
    // Xóa session name
    unset($_SESSION['us_id']);
  
    // Xóa hết session
    session_destroy();

    // go back home
    header("Location: index.php");

?>