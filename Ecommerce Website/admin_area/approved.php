<?php
include '../includes/connect.php';

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $user_id = $_SESSION['user_id'];
  $update_query = "UPDATE order_details SET `status`= 'Approved' WHERE `order_id`='$id'";
  $update_items = "UPDATE items SET `status`= 'Done' WHERE `user_id`=$user_id AND `status` = 'Ordered' ";
  $result = mysqli_query($conn,$update_query);
  $result = mysqli_query($conn,$update_items);
  header("location: index.php?view_orders");    
}
?>