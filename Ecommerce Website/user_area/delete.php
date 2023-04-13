<?php 
include '../includes/connect.php';

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $delete_query = "DELETE FROM user_details WHERE `user_id`='$id'";
    $result_delete= mysqli_query ($conn, $delete_query);

    if($result_delete){
        header("Location: ../logout.php");
    }
}

?>