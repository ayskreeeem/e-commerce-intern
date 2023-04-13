<?php 
session_start ();
$username = $_SESSION['username'];

if(!isset($_SESSION['username'])){
    header("Location: admin_login.php");
}

include '../includes/connect.php'; 

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


    
<style>
    input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
        display: none;
      }
      
      
.footer {
    position: relative;
    margin-top: 5rem;
    bottom: 0;
    width: 100%;
    height: 2.5rem;  
}

</style>
</head>
<body>

<!-- Navbar -->
<div class="class container-fluid p-0">

<!-- First Child-->
    <!-- <nav class="navbar navbar-expand-lg navbar-light"  style="background-color: rgb(56,155, 157);">
    <div class="container-fluid">
        <img src="../images/Logo.jpg" class="logo">
        <nav class="navbar navbar-expand-lg">
        <ul class="navbar-nav">
            <li class="nav-item"> 
                <a href="" class="nav-link">Welcome <?php echo $username;?></a>
            </li>
        </ul>
        </nav>
    </div>
    </nav> -->
<!--Second Child -->
<!-- <div class="bg-light">
    <h3 class="text-center p-2"> Manage Details</h3>
</div> -->

<!-- Third Child -->
 <div class="row"> 
    <div class="col-md-12 bg-secondary p-1 d-flex align-items-center"> 
        <div class="px-5">
            <a href="#"><img src ="../images/Logo.jpg" class="admin_image"></a>
            <p class="text-light text-center"><?php echo $username;?></p>
        </div>

        <div class="button text-center">
            <button class="my-3"><a href="index.php?insert_products" class="nav-link text-light my-1 bg-info">Insert Products</a></button>
            <button class="my-3"><a href="index.php?view_products" class="nav-link text-light my-1 bg-info">View Products</a></button>
            <button class="my-3"><a href="index.php?insert_categories" class="nav-link text-light my-1 bg-info">Insert Categories</a></button>
            <button class="my-3"><a href="index.php?view_categories" class="nav-link text-light my-1 bg-info">View Categories</a></button>
            <button class="my-3"><a href="index.php?view_orders" class="nav-link text-light my-1 bg-info">All orders</a></button>
            <button class="my-3"><a href="index.php?view_users" class="nav-link text-light my-1 bg-info">List Users</a></button>
            <button class="my-3"><a href="index.php?admin_contact" class="nav-link text-light my-1 bg-info">Inquiries</a></button>
            <button class="my-3"><a href="admin_logout.php" class="nav-link text-light my-1 bg-info">Logout</a></button>
        </div>
    </div>
 </div>

<!-- Fourth Child -->
<div class="container my-5">
    <?php 
    if (isset($_GET['insert_categories'])){
        include ('insert_categories.php');
    }
    ?>
</div>


<!-- Fourth Child -->
<div class="container my-5">
    <?php 
    if (isset($_GET['insert_products'])){
        include ('insert_products.php');
    }
    ?>
</div>

<!-- Fifth Child -->
<div class="container my-5">
    <?php 
    if (isset($_GET['view_products'])){
        include ('view_products.php');
    }
    ?>
</div>

<!-- Sixth Child -->
<div class="container my-5">
    <?php 
    if (isset($_GET['view_categories'])){
        include ('view_categories.php');
    }
    ?>
</div>

<!-- Seventh Child -->
<div class="container my-5">
    <?php 
    if (isset($_GET['edit_products'])){
        include ('edit_products.php');
    }
    ?>
</div>

<!-- Eight Child -->
<div class="container my-5">
    <?php 
    if (isset($_GET['delete_products'])){
        include ('delete_products.php');
    }
    ?>
</div>

<!-- Ninth Child -->
<div class="container my-5">
    <?php 
    if (isset($_GET['edit_categories'])){
        include ('edit_categories.php');
    }
    ?>
</div>

<!-- Tenth Child -->
<div class="container my-5">
    <?php 
    if (isset($_GET['delete_categories'])){
        include ('delete_categories.php');
    }
    ?>
</div>

<!-- Eleventh Child -->
<div class="container my-5">
    <?php 
    if (isset($_GET['view_orders'])){
        include ('view_orders.php');
    }
    ?>
</div>


<!-- Twelve Child -->
<div class="container my-5">
    <?php 
    if (isset($_GET['view_users'])){
        include ('view_users.php');
    }
    ?>
</div>


<!-- Twelve Child -->
<div class="container my-5">
    <?php 
    if (isset($_GET['admin_contact'])){
        include ('admin_contact.php');
    }
    ?>
</div>






</div>
<!-- Last Child -->
<footer>
    <div class="bg-info p-2 mt-5 text-center footer">
        <p>All rights reserved 2023</p>
    </div>
</footer>
</body>


<!-- Bootstrap Script-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</html>