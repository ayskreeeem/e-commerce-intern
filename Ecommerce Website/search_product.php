<?php
include ('./includes/connect.php');
include ('./admin_area/functions/common_function.php');

?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
     
        <!-- Bootstrap CSS-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
        
    </head>
    <body>
    
    <!-- Navigation Bar -->
    <div class="container-fluid p-0">

<!--First Child -->
    <nav class="navbar navbar-expand-lg navbar-light"  style="background-color: rgb(56,155, 157);">
  
    <img src="images/logo.jpg" class="logo">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

    <li class="nav-item">
        <a class="nav-link" href="index.php?products">Products</a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link" href="#">Register</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>

     <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa fa-shopping-cart" style="font-size:24px"></i></a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link" href="#">Total Price: 100/-</a>
      </li>

    </ul>
    <form class="d-flex">
      <input name="search_data" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <!-- <button href="index.php?search_product" class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button> -->
      <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
    </form>
  </div>
</div>
</nav>

<!-- Navigation Bar -->

<!-- Second Child -->

<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Welcome Guest</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Login</a>
      </li>
    </ul>
</nav>

<!--Third Child -->
<div class="bg-light">
    <h3 class="text-center" style="color: rgb(56,155, 157);" >FROZENHUB</h3>
    <p class="text-center">"We Freeze Time For What Matters"</p>
</div>

<!-- Fourth Child -->
<div class="row px-3">
    <div class="col-md-10">
        <!-- PRODUCTS -->
        <div class="row">

        <!-- FETCH PRODUCTS -->
     <?php
        search_products();
        get_unique_categories();
    ?>    
        <!-- FETCH PRODUCTS -->
    

    </div>
   </div>


    <div class="col-md-2 bg-secondary p-1 mb-3">
        <ul class="navbar-nav me-auto">
            <li class="nav-item bg-info">
                <a href="" class="nav-link text-light" style="text-align:center;"><h5>CATEGORIES</h5></a>
            </li>

        <!-- FETCH CATEGORIES -->
           <?php getcategories() ?>
        <!-- FETCH CATEGORIES -->

        </ul>
        </div>
   
</div>
            

<!-- Last Child -->
<!-- <footer>
    <div class="bg-info p-3 text-center footer">
        <p>All rights reserved 2023</p>
    </div>
</footer>
</body> -->

<!-- Bootstrap Script-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</html>
