<?php

if(isset($_POST['submit-btn'])){
  

    $email = $_POST['email'];
    $password = $_POST ['password'];

    $select_query = "SELECT * FROM user_details WHERE email = '".$_POST["email"]."'";
    $result = mysqli_query($conn, $select_query);
    $row_count = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $passworddb = $row['password'];
   

    if($row_count>0)
        
        if(password_verify($password, $passworddb)){
            $_SESSION["email"] = $_POST["email"];
            $email = $_SESSION["email"];
            // echo $email;
            header('Location: index.php');
        }
        else{
            echo "<script> alert ('Password is wrong. Try again.') </script>";
          
        }


    else{
        echo "<script> alert ('Email not found. Please register') </script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
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
</style>

</head>
<body>

    <div class="container-fluid my-3">
        <h2 class="text-center"> Login</h2>

    <form action="" method="POST">
        <div class="form-outline">


        <div class="form-outline mb-4 w-50 m-auto pt-3">

        </div>

            <!-- EMAIL-->
            <div class="form-outline mb-4 w-50 m-auto pt-3">
            <label for="email" class="form-label">
            Email
            </label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" autocomplete="Off" required>
             </div>

           

         <!-- PASSWORD-->
            <div class="form-outline mb-4 w-50 m-auto pt-3">
                <label for="password" class="form-label">
                Password
                </label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" autocomplete="Off" required>
            </div>
         
        <!-- SUBMIT -->
           <div class="form-outline mb-4 w-50 m-auto pt-3 mx-3"> 
                <button type="submit" name="submit-btn" class="btn btn-primary">Login</button>
                <p class="mt-3"> Don't have an account? <a href="index.php?register">Register.</a></p>
                </div>
               
        </form>

        </div>
        </div>
    </div>


</body>

<!-- Bootstrap Script-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</html>