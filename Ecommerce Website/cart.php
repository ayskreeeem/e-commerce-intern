


<!-- CART TABLE -->
<div class="container">
    <div class="row"> 
        <table class="table table-borderd text-center">
           <?php
             $user_id = $_SESSION['user_id'];
            $total=0;
            $cart_query="SELECT * FROM cart_details WHERE `user_id`=$user_id";
            $result = mysqli_query($conn,$cart_query);
            $result_count = mysqli_num_rows($result);
              if($result_count>0){
                echo "
                <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Price</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total Price </th>
                    <th>Update</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>";



            $result = mysqli_query($conn,$cart_query);
            while($row = mysqli_fetch_array($result)){
              
                $product_id = $row['product_id'];
                $select_products="SELECT * FROM products JOIN cart_details WHERE products.product_id=$product_id AND cart_details.product_id=$product_id AND `user_id` = $user_id";
                $result_products = mysqli_query($conn, $select_products);
                while($row = mysqli_fetch_array($result_products)){

                    $product_id=$row['product_id'];
                    $product_title = $row['product_title'];
                    $product_image = $row['product_image'];
                    $product_price = $row['product_price'];
                    $product_quantity = $row['quantity'];
                    $product_price_array=array($row['product_price']);
                    $product_value=array_sum($product_price_array);
              ?>

                <tr>
                <td><?php echo $product_title?> </td>

                <td><?php echo $product_price?></td>
                
                <?php echo "
                <td><img src='./admin_area/product_images/$product_image' width='50px;' height='50px;'></td>"; ?>
               
                
               <td>
                <form action="" method="POST">
                
                <input type ='number' name='quantity' id='quantity' value="<?php echo $product_quantity?>" class='form-input w-50'>
                
                <input type="hidden" name="product_id" value="<?php echo $product_id?>">
                </td>

                <?php
                  if(isset($_POST['update-btn'])){
                    $user_id = $_SESSION['user_id'];
                    $product_id = $_POST['product_id'];
                    $quantity = $_POST['quantity'];
                    $update_cart = "UPDATE cart_details SET `quantity`='$quantity' WHERE `user_id`=$user_id AND `product_id` =$product_id";
                    $result_update = mysqli_query($conn, $update_cart);

                    $update_items = "UPDATE items SET `quantity`='$quantity' WHERE `user_id`=$user_id AND `product_id` =$product_id";
                    $result_items = mysqli_query($conn, $update_items);
                
                    // if($result_update){
                    //     echo "<script> alert ('Quantity has been updated.') </script>";
                    // }

                    // else{
                    //   echo "<script> alert ('Error!') </script>";
                    // }
                    
                    }
                  }
                ?>

                <?php $total_price=$product_quantity*$product_price?>
                <td><?php echo $total_price?></td>
                <?php echo"
                <td> 
                <input type='submit' name='update-btn' class='btn btn-sm btn-primary'>

                <td>
                <a href = 'index.php?delete_items=$product_id' class='text-danger' data-toggle='modal' data-target='#exampleModal'><i class='fa-solid fa-trash'></i></a>
                </td>
              "; ?>
                
                </form>
               
                  <?php }}
                  
                  else{
                    echo "<h2> Cart is empty </h2>";
                  }
                  
                  ?>
            </tbody>    
        </table>


        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">    Are you sure you want to delete this item? </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success"><a class="text-light text-decoration-none" href="./index.php?cart=<?php echo $product_id?>">YES</a></button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><a href="index.php?cart.php" class="text-light text-decoration-none">NO</a></button>
       
      </div>
    </div>
  </div>
</div>
      
        <!-- SUBTOTAL -->
        <div class="d-flex mb-5">
            <h4 class="px-3"> Subtotal:<strong class="text-info">&nbsp <?php total_cart_price() ?></strong></h4>
            <a href="./index.php" class="text-light text-decoration-none"><button class="bg-info p-2 py-2 border-0 mx-3">Continue Shopping</a></button>


            <a href="index.php?checkout"> <button class="bg-secondary p-2 py-2 border-0">Checkout</button>
        </div>

    </div>
</div>

<?php
if (isset($_GET['cart'])){
    $user_id = $_SESSION['user_id'];
    $product = $_GET['cart'];
    $delete_query = "DELETE FROM cart_details WHERE product_id=$product AND `user_id`=$user_id";
    $delete_items = "DELETE FROM items WHERE product_id=$product AND `user_id`=$user_id";
    $result_delete= mysqli_query ($conn, $delete_query);
    $result_items= mysqli_query ($conn, $delete_items);
}
?>

 </form>
<!-- CART TABLE -->






</body>

<!-- Bootstrap Script-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</html>

