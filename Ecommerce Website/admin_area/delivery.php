<?php
include '../includes/connect.php';

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $update_query = "UPDATE order_details SET `status`= 'For Delivery' WHERE `order_id`='$id'";
  $result = mysqli_query($conn,$update_query);
  header("location: index.php?view_orders");    
}
?>