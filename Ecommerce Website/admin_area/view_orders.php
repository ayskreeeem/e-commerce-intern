<h1 class="text-center" id="reqsHeading" style="margin-bottom: 12px;padding-bottom: 8px;padding-top: 12px;">List of Orders</h1>
<table class="table">
    <thead>
        <tr>
            <th> User ID </th>
            <th> Order ID </th>
            <th> Invoice Number</th>
            <th colspan ="2"> Total Products </th>
            <th> Amount </th>
            <th> Order Date </th>  
            <th> Status </th>
            <th colspan="3"> Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php
  
                    $category_query="SELECT * FROM order_details";
                    $result_category= mysqli_query($conn,$category_query);
                    while($row = mysqli_fetch_assoc($result_category)) {
                      $user_id = $row['user_id'];
                      $order_id = $row['order_id'];
                      $invoice = $row['invoice'];
                      $date = $row['date'];
                      $items = $row['items'];
                      $status = $row['status'];
                      $total = $row['amount'];

                      echo'
                    <tr>
                        <td>'. $user_id .'</td>
                        <td>'.$order_id.'</td>
                        <td>'.$invoice .'</td>
                        <td>'. $items.'</td>
                        <td><i class="fa fa-eye" data-toggle="modal" data-target="#myModal"></i></td>
                        <td>'. $total.'</td>
                        <td>'.  $date.'</td>
                        <td>'. $status.'</td>
                        <td> 
                        <button class="btn btn-success">
                        <a href="approved.php?id='.$order_id.'" class="text-light">Approved</a></button>
                        </td>
                        <td> 
                        <button class="btn btn-success">
                        <a href="delivery.php?id='.$order_id.'" class="text-light">Delivery</a></button>
                        </td>
                      
                       
                        
                    ';}?>
    </tbody>
        </table>
   
      
  
  <!-- Button to Open the Modal
  <button type="button" class="btn btn-primary btn-block btn-lg" data-toggle="modal" data-target="#myModal">
  Open modal
</button> -->

        <!-- The Modal -->
   
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Items</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
          <table class="table table-striped">
    <thead>
      <tr>
        <th>Product Title</th>
        <th>Quantity</th>
      </tr>
    </thead>
    
    <tbody>
    <?php
    $see_query= "SELECT * FROM items JOIN products WHERE items.product_id = products.product_id AND `user_id`=$user_id AND items.status ='Ordered'";
    $result = mysqli_query($conn,$see_query);
    while($row = mysqli_fetch_array($result)){   
        
        $product_title = $row['product_title'];
        $product_quantity = $row['quantity'];
        ?>
 
      <tr>
        <td><?php echo $product_title?></td>
        <td><?php echo $product_quantity?></td>
   <?php } ?>
              </tr>
              
    </tbody>
  </table>
  </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</div>