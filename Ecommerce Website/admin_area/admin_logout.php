<?php

session_start();
echo "Logging you out. Please wait...";

unset($_SESSION["username"]);

// session_unset();
// session_destroy();

header("location: admin_login.php");
?>