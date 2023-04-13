<?php 


if(!isset($_SESSION['user_id']) && !isset($_SESSION['email'])){
      header("Location:../index.php");
}

?>




<?php
      $user_id = $_SESSION['user_id'];
                    $category_query="SELECT * FROM order_details WHERE`user_id` = $user_id";
                    $result_category= mysqli_query($conn,$category_query);

                    $count = mysqli_num_rows($result_category);
                    if ($count == 0){
                      echo'<h1 class="text-center">No orders yet. Shop now!</h1>';
                    }

                    else { 

echo'
<h1 class="text-center" id="reqsHeading" style="margin-bottom: 12px;padding-bottom: 8px;padding-top: 12px;">Orders</h1>
<table class="table">

    <thead>
        <tr>
          
            <th> Invoice</th>
            <th colspan ="2"> Items </th>
            <th> Date Ordered</th>
            <th> Total </th>
            <th> Status</th>
            <th> Action </th>
          
        </tr>
    </thead>
    <tbody>';


                    while($row = mysqli_fetch_assoc($result_category)) {

                      $order_id = $row['order_id'];
                      $invoice = $row['invoice'];
                      $date = $row['date'];
                      $items = $row['items'];
                      $status = $row['status'];
                      $total = $row['amount'];
            echo'
            <tr>
       
            <td>#'.$invoice.'</td>
            <td>'.$items .'</td>

            <td><a href="user_area/fetch_orders.php?order_id='.$order_id.'" class="text-decoration-none text-info">View items</a></td>
      
            <td>'. $date.'</td>
            <td>'.$total.'</td>

            <td>'.$status.'</td>
            <td> 
            <button class="btn btn-success">
            <a href="received.php?id='.$order_id.'" class="text-light">Received</a></button>
            </td>
            ';
             
            }}?>    

      </tr>  
    </tbody>
        </table>





