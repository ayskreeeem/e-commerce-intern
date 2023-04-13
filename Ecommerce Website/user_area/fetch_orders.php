<?php
include '../includes/connect.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../style.css">

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">


</head>
<body>

<h1 class="text-center" id="reqsHeading" style="margin-bottom: 12px;padding-bottom: 8px;padding-top: 12px;">List of Items</h1>
<table class="table">
    <thead>
        <tr>
            <th> Product</th>
            <th> Quantity </th>
            
            
        </tr>
    </thead>
    <tbody>

  <?php
  if(isset($_GET['order_id'])){
  $order_id = $_GET['order_id'];
//  echo $date;
  $user_id = $_SESSION['user_id'];
  $see_query= "SELECT * FROM items JOIN products 
  WHERE items.product_id = products.product_id 
  AND `user_id`=$user_id AND `order_id` = $order_id";

  $result = mysqli_query($conn,$see_query);
  while($row = mysqli_fetch_array($result)){   
      
    $product_title = $row['product_title'];
    $product_quantity = $row['quantity'];

                      echo'
                    <tr>
                        <td>'.  $product_title .'</td>
                        <td>'. $product_quantity.'</td>      
                        
                    ';} }?>
    </tbody>
        </table>
    <tbody>

 
