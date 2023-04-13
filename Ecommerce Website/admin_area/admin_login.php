<?php 

session_start();
$_SESSION['username'] = "";
$username = $_SESSION['username'];

include '../includes/connect.php';

if(isset($_POST['submit-btn'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $usernamequery = "SELECT * FROM admin_table WHERE `admin_username` = '$username'";
    $result_username = mysqli_query($conn, $usernamequery);
    $row_count = mysqli_num_rows($result_username);
    $row = mysqli_fetch_assoc($result_username);
    $passworddb = $row['admin_password'];

    if($row_count>0)
        
        if(password_verify($password, $passworddb)){
            $_SESSION["username"] = $_POST["username"];
            $username= $_SESSION["username"];
            header('Location: index.php');
        }
        else{
            echo "<script> alert ('Password is wrong. Try again.') </script>";
          
        }


    else{
        echo "<script> alert ('Username not found. Please register') </script>";
    }
}
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="login.css">

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">


</head>

<body>


    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <form method="POST" class="box">
                        <h1>Login</h1>
                        <p class="text-muted"> Please enter your username and password!</p> 
                        <input type="text" name="username" placeholder="Username"> 
                        <input type="password" name="password" placeholder="Password">
                        <!-- <a class="forgot text-muted" href="#">Forgot password?</a>  -->
                        <input type="submit" name="submit-btn" value="Login" href="#">
                        <p class="mt-3 fw-bold text-light"> Don't have an account yet? <a href="admin_registration.php">Register.</a></p>
                        <!-- <div class="col-md-12"
                            <ul class="social-network social-circle">
                                <li><a href="#" class="icoFacebook" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" class="icoTwitter" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" class="icoGoogle" title="Google +"><i class="fab fa-google-plus"></i></a></li>
                            </ul>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<!-- Bootstrap Script-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

</html>