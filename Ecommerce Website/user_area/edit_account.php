<?php

$email = $_SESSION['email'];
$user_details = "SELECT * FROM user_details WHERE email ='.$email.'";
$result_category= mysqli_query($conn,$user_details);

    if (mysqli_num_rows($result_category) == 0){
    
    }
    
    else { 
        
    $row = mysqli_fetch_assoc($result_category); 
    }


    $fname = $row['fname'];
    $lname = $row['lname'];
    $email = $row['email'];
    $mobile = $row['user_mobile'];
    $address = $row['user_address'];
    $province = $row['user_province'];
    $city = $row['user_city'];
    $zip = $row['user_zip'];


    if(isset($_POST['submit-btn'])){

        $fName = $_POST['fname'];
        $lName = $_POST['lname'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile_number'];
        $address = $_POST['address'];
        $province = $_POST['province'];
        $city = $_POST['city'];
        $zip = $_POST['zip'];


        $update_account ="UPDATE `user_details` SET
        fname = '$fName',
        lname = '$lName',
        email = '$email',
        user_mobile = '$mobile',
        user_address = '$address',
        user_province = '$province',
        user_city = '$city',
        user_zip = '$zip'
        WHERE `email` = '$email'";

        $result = mysqli_query($conn, $update_account);

            if($result){
                echo "<script> alert('Credentials updated.')</script> ";          
        }
            else {
                echo "<script> alert('Error.')</script> ";        
            }
 
    }


    if(isset($_POST['delete-btn'])){

        $delete_query = "DELETE FROM user_details WHERE `user_id`= '$email'";
        $result = mysqli_query ($conn, $delete_query);
    
    }
?>


<h2 class="text-center mt-3"> Edit Account </h2>

<form action="" method="POST" entype="multipart/form-data">
    <div class=" bg-secondary form-outline">
        <!-- FIRST NAME-->
        <div class="form-outline mb-4 w-50 m-auto pt-3">
            <label for="fname" class="form-label">
            First Name
            </label>
            <input type="text" name="fname" id="fname" class="form-control" value ="<?php echo $fname ?>" autocomplete="Off">
        </div>

         <!-- LAST NAME-->
         <div class="form-outline mb-4 w-50 m-auto pt-3">
            <label for="lname" class="form-label">
            Last Name
            </label>
            <input type="text" name="lname" id="lname" class="form-control" value ="<?php echo $lname ?>" autocomplete="Off">
        </div>


        <!-- EMAIL-->
        <div class="form-outline mb-4 w-50 m-auto pt-3">
            <label for="email" class="form-label">
            Email
            </label>
        <input type="email" name="email" id="email" class="form-control" value ="<?php echo $email ?>"  autocomplete="Off">
         </div>

        <!-- MOBILE-->
        <div class="form-outline mb-4 w-50 m-auto pt-3">
            <label for="mobile_number" class="form-label">
            Mobile Number
            </label>
            <input type="number" name="mobile_number" id="mobile_number" class="form-control" value ="<?php echo $mobile ?>"  autocomplete="Off">
         </div>


    <!-- ADDRESS-->
        <div class="form-outline mb-4 w-50 m-auto pt-3">
            <label for="address" class="form-label">
            Complete Address
            </label>
            <input type="text" name="address" id="address" class="form-control" value ="<?php echo $address ?>" autocomplete="Off">
        </div>
  
        <div class="form-outline mb-4 w-50 m-auto pt-3 mx-1 d-flex">
    <!-- CITY -->
            <input type="text" name="city" id="city" class="form-control" value ="<?php echo $city ?>"  autocomplete="Off">
    <!-- PROVINCE -->
            <input type="text" name="province" id="province" class="form-control" value ="<?php echo $province ?>" autocomplete="Off">  
    <!-- ZIP CODE -->
            <input type="number" name="zip" id="zip" class="form-control" value ="<?php echo $zip ?>" autocomplete="Off">
        </div>
        
    <!-- SUBMIT -->
    <div class="form-outline text-center mb-4 w-50 m-auto pt-3"> 
                <input type="submit" value ="Update" name="submit-btn" class="btn btn-primary">
                <button class="btn btn-danger">

                <?php
                    echo'
                <a href="./user_area/delete.php?id='.$user_id.'"class="text-light">Delete Account</a></button>
                ';?>
         </div>