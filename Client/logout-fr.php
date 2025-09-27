<?php
session_start();
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session

// Redirect user to login page after logging out
header("Location: loginpage-fr.php");
exit();
?>
