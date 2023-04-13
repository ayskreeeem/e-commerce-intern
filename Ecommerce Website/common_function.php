<?php

function cart_items()
{
    global $conn;
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $select_query = "SELECT * FROM cart_details JOIN user_details WHERE cart_details.user_id = user_details.user_id AND `email`='$email'";
        $result_query = mysqli_query($conn, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);

        if ($count_cart_items == 0) {
            $count_cart_items = 0;
            echo $count_cart_items;
        } else {
            echo $count_cart_items;
        }
    }
}

function getproducts()
{
    global $conn;

    if (!isset($_GET['category'])) {
        $products_query = "SELECT * FROM products ORDER BY date";
        $result_products = mysqli_query($conn, $products_query);
        $num_of_rows = mysqli_num_rows($result_products);

        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>No stock for this category.</h2>";
        } else {
            // 

            while ($row = mysqli_fetch_assoc($result_products)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_price = $row['product_price'];
                $product_image = $row['product_image'];


                echo "
      <div class='col-md-4 mb-2'>
        <div class='card'>
                  <img src='./admin_area/product_images/$product_image' class='card-img-top'>
                <div class='card-body'>
                  <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'>$product_description</p>
                  <p class='card-text'><strong>Price:&nbsp$product_price</strong></p>";


                if (!isset($_SESSION['email'])) {
                    echo "
                  <a href='index.php?login'  class='btn btn-info'>Add to Cart</a>      
      </div> 
      </div>
      </div>";
                } elseif (isset($_SESSION['email'])) {
                    echo "
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>      
            </div> 
            </div>
            </div>";
                }
            }
        }
    }
}


function getcategories()
{

    global $conn;
    $category_query = "SELECT * FROM categories ORDER BY category_title";
    $result_category = mysqli_query($conn, $category_query);
    while ($row = mysqli_fetch_assoc($result_category)) {

        //get grant info
        $category_id = $row["category_id"];
        $category_title = $row["category_title"];

        echo "
        <li class='nav-item bg-secondary'>
        <a href='index.php?category=$category_id' class='nav-link text-light' style='text-align:center;'> $category_title</a>
    </li>";
    }
}



function get_unique_categories()
{
    global $conn;

    if (isset($_GET['category'])) {
        global $conn;
        $category_id = $_GET['category'];
        $products_query = "SELECT * FROM products WHERE category_id=$category_id";
        $result_products = mysqli_query($conn, $products_query);
        $rows = mysqli_num_rows($result_products);

        if ($rows == 0) {
            echo "<h2 class='text-center text-danger'>No identified product.</h2>";
        }

        while ($row = mysqli_fetch_assoc($result_products)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_price = $row['product_price'];
            $product_image = $row['product_image'];
            echo "
      <div class='col-md-4 mb-2'>
        <div class='card'>
                  <img src='./admin_area/product_images/$product_image' class='card-img-top'>
                <div class='card-body'>
                  <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'>$product_description</p>
                  <p class='card-text'><strong>Price:&nbsp$product_price</strong></p>";


       
                  if (!isset($_SESSION['email'])) {
                    echo "
                  <a href='index.php?login'  class='btn btn-info'>Add to Cart</a>      
      </div> 
      </div>
      </div>";
                } elseif (isset($_SESSION['email'])) {
                    echo "
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>      
            </div> 
            </div>
            </div>";
                }
            }
        }
    }


function search_products()
{

    global $conn;
    if (isset($_GET['search_data_product'])) {
        $search_data = $_GET['search_data'];
        $products_query = "SELECT * FROM products WHERE product_title LIKE '%$search_data%'";
        $result_products = mysqli_query($conn, $products_query);
        $rows = mysqli_num_rows($result_products);

        if ($rows == 0) {
            echo "<h2 class='text-center text-danger'>No identified product.</h2>";
        }

        while ($row = mysqli_fetch_assoc($result_products)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_price = $row['product_price'];
            $product_image = $row['product_image'];


            echo "
      <div class='col-md-4 mb-2'>
        <div class='card'>
                  <img src='./admin_area/product_images/$product_image' class='card-img-top'>
                <div class='card-body'>
                  <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'>$product_description</p>
                  <p class='card-text'><strong>Price:&nbsp$product_price</strong></p>";

          
                  if (!isset($_SESSION['email'])) {
                    echo "
                  <a href='index.php?login'  class='btn btn-info'>Add to Cart</a>      
      </div> 
      </div>
      </div>";
                } elseif (isset($_SESSION['email'])) {
                    echo "
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>      
            </div> 
            </div>
            </div>";
                }
            }
        }
    }



function getIPAddress()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $IP = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $IP = $_SERVER['HTTP_X_FROWARDED_FOR'];
    } else {
        $IP = $_SERVER['REMOTE_ADDR'];
    }

    return $IP;
}



//CART FUNCTION
function cart()
{
    global $conn;
    if (isset($_GET['add_to_cart'])) {
        $user_id = $_SESSION['user_id'];
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "SELECT * FROM cart_details WHERE  `user_id`= $user_id AND product_id=$get_product_id";
        $result_query = mysqli_query($conn, $select_query);
        $rows = mysqli_num_rows($result_query);

        if ($rows == 0) {
            $insert_query = "INSERT INTO cart_details (product_id, quantity, `user_id`) VALUES ('$get_product_id','1', '$user_id')";
            $insert_items = "INSERT INTO items (product_id, quantity, `user_id`) VALUES ('$get_product_id','1', '$user_id')";
            $result_query = mysqli_query($conn, $insert_query);
            $result_items = mysqli_query($conn, $insert_items);
            echo "<script> alert ('Item is added to cart.') </script>";
            echo "<script>windows.open('index.php','_self')</script>";
        } else {
            echo "<script> alert('Item is already in your cart.')</script> ";
            echo "<script>windows.open('index.php','_self')</script>";
        }
    }
}


function total_cart_price()
{
    global $conn;

    $user_id = $_SESSION['user_id'];
    $total = 0;
    $select_cart = "SELECT * FROM cart_details WHERE `user_id`= $user_id";
    $result_cart = mysqli_query($conn, $select_cart);
    while ($row = mysqli_fetch_array($result_cart)) {
        $quantity = $row['quantity'];
        $product_id = $row['product_id'];
        $select_products = "SELECT * FROM products WHERE `product_id` = $product_id";
        $result_products = mysqli_query($conn, $select_products);
        while ($row_product = mysqli_fetch_array($result_products)) {
            $product_price = $row_product['product_price'];
            $product_price_array = array($product_price * $quantity);
            $product_value = array_sum($product_price_array);
            $total += $product_value;
        }
    }
    echo $total;
}
