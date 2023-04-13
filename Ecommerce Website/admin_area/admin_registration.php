<?php 
include '../includes/connect.php';


if(isset($_POST['submit-btn'])){
    $username= $_POST['username'];
    $password = $_POST ['password'];
    $confirmpassword = $_POST ['confirmpassword'];

    

    $usernamequery = "SELECT * FROM admin_table WHERE `admin_username` = '$username'";
    $result_username = mysqli_query($conn, $usernamequery);
    $count = mysqli_num_rows($result_username);

    if($count > 0){

        echo "<script> alert('Username is already in use. Please try another one.')</script> ";
    }
    else{
        if ($password != $confirmpassword){
            echo "<script> alert('Passwords do not match.')</script> ";
        }
        
        else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $insert_query = "INSERT INTO admin_table (`admin_username`,`admin_password`) VALUES ('$username','$hash') ";

        $result = mysqli_query ($conn, $insert_query);

        if($result){
        echo "<script> alert('Successfully registered.')</script> ";
        header ('Location: admin_login.php');
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
    <title>Admin Dashboard</title>
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
                        <h1>Register</h1>
                        <p class="text-muted"> Please enter username and password!</p> 
                        <input type="text" name="username" placeholder="Username"> 
                        <input type="password" name="password" placeholder="Password">
                        <input type="password" name="confirmpassword" placeholder="Re-enter Password"> 
                        <input type="submit" name="submit-btn" value="Login" href="#">
                        <p class="mt-3 fw-bold text-light"> Already have an account? <a href="admin_login.php">Login.</a></p>
                       
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