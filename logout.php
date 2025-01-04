<?php
session_start();
session_unset();
session_destroy();

// Clear cookies
setcookie('username', '', time() - 3600, "/");
setcookie('user_id', '', time() - 3600, "/");

// Redirect to the home page
header("Location: login.php");
exit();
?>