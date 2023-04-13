

<i class="fa fa-eye" data-toggle="modal" data-target="#myModal<?php echo $row['date']?>">
       <!-- The Modal -->
   
       <div class="modal" id="myModal<?php echo $date?>">
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
    $see_query= "SELECT * FROM items JOIN products WHERE items.product_id = products.product_id AND `user_id`=$user_id AND items.status ='Ordered' AND items.date = '$date'";
    $result = mysqli_query($conn,$see_query);
    while($row = mysqli_fetch_array($result)){   
        
        $product_title = $row['product_title'];
        $product_quantity = $row['quantity'];
        ?>
 
      <tr>
        <td><?php echo $product_title?></td>
        <td><?php echo $product_quantity?></td>
        <td> <?php echo $date?></td>
   <?php } ?>
              </tr>
              
    </tbody>
  </table>
  </div>
  </div>


      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</div>

