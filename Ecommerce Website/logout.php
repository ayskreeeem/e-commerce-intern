<?php

session_start();
echo "Logging you out. Please wait...";

unset($_SESSION["email"]);
unset($_SESSION["user_id"]);

// session_unset();
// session_destroy();

header("location: index.php?product");
?>