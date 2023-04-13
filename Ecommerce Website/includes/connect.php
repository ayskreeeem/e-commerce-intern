<?php
$conn = mysqli_connect('localhost','root','','online_store');
if (!$conn){
    die("Connection Failed. " . mysqli_connect_error());
}

?>