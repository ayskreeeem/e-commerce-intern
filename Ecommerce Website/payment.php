<?php
$email = $_SESSION['email'];
$select_query = "SELECT * FROM cart_details JOIN user_details WHERE cart_details.user_id = user_details.user_id AND `email`='$email'";
$result_query = mysqli_query($conn, $select_query);
$count_cart_items = mysqli_num_rows($result_query);

if ($count_cart_items >= 1) {
?>


<?php 
  // $order_id = array($_POST['order']);
  // $serialize_order = serialize($order_id);
  // print ( $serialize_order);
?>

<?php
  if (isset($_POST['submit-btn'])) {

    $user_id = $_SESSION['user_id'];

    $order_id = array($_POST['order']);
    $product = array($_POST['product']);
    $quantity = array($_POST['quantity']);


    $serialize_order = serialize($order_id);
    $serialize_product = serialize($product);
    $serialize_quantity = serialize($quantity);


    $invoice =  mt_rand(10000, 99999);
    $total = 0;



    // CART ITEMS
    $items_query = "SELECT * FROM cart_details JOIN user_details 
    WHERE cart_details.user_id = user_details.user_id AND cart_details.user_id= $user_id";
    $result_items = mysqli_query($conn, $items_query);
    $count_cart_items = mysqli_num_rows($result_items);


    // INSERT ORDER
    $order_query = "INSERT INTO order_details(`user_id`,`invoice`,`date`,`status`, `items`,`amount`) 
    VALUES ('$user_id','$invoice',now(), 'Pending', ' $count_cart_items','$total')";
    $result_query = mysqli_query($conn, $order_query);


    // INSERT ITEMS
    if ($result_query) {
      $order_update = "INSERT into items (`user_id`, `order_id`, `product_id`, `quantity`) 
        VALUES ('$user_id', '$serialize_order','$serialize_product','$serialize_quantity')";
      $result_order = mysqli_query($conn, $order_update);

      if ($result_order) {
        $delete_query = "DELETE FROM cart_details WHERE `user_id`=$user_id";
        $result_delete = mysqli_query($conn, $delete_query);
        $url = "index.php";
        echo "<script> alert('Order Confirmed!'); window.location = '$url'; </script>";
      } else {
        echo "<script> alert ('ERROR') </script>";
      }
    }
  }

  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="../style.css">

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">


  </head>

  <body class="bg-light">



    <div class="container mt-3">
      <h2 class="text-center"> Check Out </h2>
      <p class="text-center">Select one of payment methods:</p>
      <div class="text-center">

        <a href="index.php?checkout=cod" class="btn btn-info btn-lg"> Cash on Delivery</a>
        <input type="button" value="Gcash" class="btn btn-outline-info btn-lg" data-toggle='modal' data-target='#exampleModal'>
      </div>
    </div>
    <?php
    if (isset($_GET['checkout'])) {
      $cod = $_GET['checkout'];
      if ($cod == "cod") {
        $user_query = "SELECT * FROM user_details WHERE `user_id` = $user_id";
        $result = mysqli_query($conn, $user_query);
        $rows = mysqli_fetch_assoc($result);

        $fname = $rows["fname"];
        $lname = $rows["lname"];
        $email = $rows["email"];
        $mobile = $rows["user_mobile"];
        $address = $rows["user_address"];
        $province = $rows["user_province"];
        $city = $rows["user_city"];
        $zip = $rows["user_zip"];

        echo '
        <div class="container text-center">
        <br><br>
        <h2>Personal Information:</h2>

        <table class="table">
          <tr>
            <th>Name:</th>
            <td>' . $fname . ' &nbsp' . $lname . '</td>
          </tr>

          <tr>
            <th>Telephone:</th>
            <td>' . $mobile . '</td>
          </tr>

          <tr>
            <th>Address:</th>
            <td>' . $address . ' <br>' . $province . ' ' . $city . ' ' . $zip . '</td>
          </tr>
        </table> '; ?>

        <h2>Cart details:</h2>

        <table class="table">
          <tr>
            <th>Product Title</th>
            <th>Price</th>
            <th>Quantity</th>
            <th> </th>

          </tr>
          <tr>

            <?php
            $cart_query = "SELECT * FROM cart_details WHERE `user_id`=$user_id";
            $result = mysqli_query($conn, $cart_query);
            while ($row = mysqli_fetch_array($result)) {

              $product_id = $row['product_id'];
              $select_products = "SELECT * FROM products JOIN cart_details WHERE products.product_id=$product_id AND cart_details.product_id=$product_id AND `user_id` = $user_id";
              $result_products = mysqli_query($conn, $select_products);


              while ($row = mysqli_fetch_array($result_products)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_price = $row['product_price'];
                $product_quantity = $row['quantity'];

                //ID
                $insert_id = "SELECT * FROM order_details ORDER BY `order_details`.`order_id` DESC LIMIT 1";
                $result_id = mysqli_query($conn, $insert_id);
                $row = mysqli_fetch_assoc($result_id);
                $order =  $row['order_id'];
                $order_id = $order + 1;

                echo '
      
      <form method="POST">
      
        <td> <input hidden name="product" value='.$product_id.'>'.$product_title.'</td>
        <td>' . $product_price . '</td>
        <td><input hidden name="quantity" value='.$product_quantity.'>'.$product_quantity.'</td>
        <td><input hidden name="order" value='.$order_id.'></td>

        </tr>
        ';


        $order_id = array($_POST['order']);
        $product = array($_POST['product']);
        $quantity = array($_POST['quantity']);


        $serialize_order = serialize($order_id);
        $serialize_product = serialize($product);
        $serialize_quantity = serialize($quantity);
    
        echo       $serialize_order ,        $serialize_product,         $serialize_quantity ;
              }
            }
            ?>

        </table>



        <br>
        <h2>Product Total:</h2>

        <table class="table">
          <tr>
            <th>Total:</th>
            <td><strong><?php total_cart_price() ?></strong></td>
            <td> <input type="button" value="CONFIRM PAYMENT" class="btn btn-info" data-toggle='modal' data-target='#confirm'></td>

          </tr>

          </table>


<?php
      }
    }

?>
</body>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Sorry! This payment method has not yet been utilized. </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success"><a class="text-light text-decoration-none" href="./index.php?checkout=">BACK</a></button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="confirm" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Confirm your order! Upon confirming, please wait for us to contact you for verification purposes.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="submit" name="submit-btn" class="btn btn-success">YES</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><a href="./index.php?cart" class="text-light text-decoration-none">NO</a></button>

      </div>
    </div>
  </div>
</div>
</form>




<?php } else {
  header("Location:index.php");
}
?>

<!-- Bootstrap Script-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

</html>