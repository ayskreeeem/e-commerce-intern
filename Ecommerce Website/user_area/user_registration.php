<?php 

if(isset($_POST['submit-btn'])){
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile_number'];
    $address = $_POST['address'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $IP = getIPAddress();
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirm_password'];


    $emailquery = "SELECT * FROM user_details WHERE email = '$email'";
    $result_email = mysqli_query($conn, $emailquery);
    $count = mysqli_num_rows($result_email);

    if($count > 0){

        echo "<script> alert('Email is already in use. Please try another one.')</script> ";
    }
    else{
        if ($password != $confirmpassword){

            echo "<script> alert('Passwords do not match.')</script> ";
        }

        else{
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $insert_user = "INSERT INTO `user_details`(`fname`, `lname`, `email`, `password`, `user_ip`, `user_address`, `user_province`, `user_city`, `user_zip`, `user_mobile`) VALUES ('$firstName', '$lastName', '$email', '$hash', '$IP', '$address', '$province', '$city', '$zip', '$mobile')";

            $result = mysqli_query ($conn, $insert_user);

            if($result){
            echo "<script> alert('Successfully registered.')</script> ";
            header("Location: index.php?login");      
        }
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
<body class="bg-light">
    <div class="container-fluid mt-3">
        <h2 class="text-center"> New User Registraion</h2>

    <form action="" method="POST" entype="multipart/form-data">
        <div class="form-outline">
            <!-- FIRST NAME-->
            <div class="form-outline mb-4 w-50 m-auto pt-3">
                <label for="fname" class="form-label">
                First Name
                </label>
                <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter your first name" autocomplete="Off" required>
            </div>

             <!-- LAST NAME-->
             <div class="form-outline mb-4 w-50 m-auto pt-3">
                <label for="lname" class="form-label">
                Last Name
                </label>
                <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter your last name" autocomplete="Off" required>
            </div>


            <!-- EMAIL-->
            <div class="form-outline mb-4 w-50 m-auto pt-3">
                <label for="email" class="form-label">
                Email
                </label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" autocomplete="Off" required>
             </div>

            <!-- MOBILE-->
            <div class="form-outline mb-4 w-50 m-auto pt-3">
                <label for="mobile_number" class="form-label">
                Mobile Number
                </label>
                <input type="number" name="mobile_number" id="mobile_number" class="form-control" placeholder="Enter your mobile number" autocomplete="Off" required>
             </div>

                       
        <!-- PICTURE -->
            <!-- <div class="form-outline mb-4 w-50 m-auto pt-3">
                <label for="image" class="form-label">User Picture</label>    
                <input type="file" accept=".jpg,.png" name="image[]" id="image[]" class="form-control" required>
            </div> -->

         <!-- PASSWORD-->
            <div class="form-outline mb-4 w-50 m-auto pt-3">
                <label for="password" class="form-label">
                Password
                </label>
                <input data-toggle="tooltip" data-placement="right" title=" Password must contain at least 8 characters, including upper and lower case, and numbers." type="password" name="password" id="password" class="form-control" placeholder="Enter your password" autocomplete="Off" required>
            </div>

         <!-- CONFIRM PASSWORD-->
            <div class="form-outline mb-4 w-50 m-auto pt-3">
                <label for="confirm_password" class="form-label">
                Confirm Password
                </label>
                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Re-enter your password" autocomplete="Off" required>
            </div>

        <!-- ADDRESS-->
            <div class="form-outline mb-4 w-50 m-auto pt-3">
                <label for="address" class="form-label">
                Complete Address
                </label>
                <input type="text" name="address" id="address" class="form-control" placeholder="Unit Floor, Bldg., Street" autocomplete="Off" required>
            </div>
      
            <div class="form-outline mb-4 w-50 m-auto pt-3  d-flex">
        <!-- CITY -->
                <input type="text" name="city" id="city" class="form-control" placeholder="City" autocomplete="Off" required>
        <!-- PROVINCE -->
                <input type="text" name="province" id="province" class="form-control" placeholder="Province" autocomplete="Off" required>  
        <!-- ZIP CODE -->
                <input type="number" name="zip" id="zip" class="form-control" placeholder="Zip Code" autocomplete="Off" required>
            </div>
            
             
        <!-- SUBMIT -->
           <div class="form-outline mb-4 w-50 m-auto pt-3"> 
                <input type="submit" value ="Register" name="submit-btn" class="btn btn-primary">
         </div>

        <!--REDIRECTON -->
            <div class="form-outline mb-4 w-50 m-auto text-center"> 
                <p class="mt-3 fw-bold"> Already have an account? <a href="user_login.php">Login.</a></p>
            </div>
           
          
        </form>

        </div>
    </div>

</body>


<script>
        $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
    </script>
<!-- Bootstrap Script-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</html>