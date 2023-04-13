<?php
include ('../includes/connect.php');


if(isset($_POST['submit-btn'])){
  $category_title = $_POST['category_title'];

  $select_query="SELECT * FROM `categories` WHERE category_title='$category_title'";
  $result_select = mysqli_query($conn,$select_query);
  $number = mysqli_num_rows($result_select);
  if($number>0){
    echo "<script> alert ('This category is already added.') </script>";
  }
  else{
  $insert_category = "INSERT INTO `categories` (`category_title`) VALUES ('$category_title')";
  $result = mysqli_query($conn,$insert_category);

  if($result){
    echo "<script> alert ('Category has been inserted successfully!') </script>";
  }
}
}
?>
<h2 class = "text-center"> Insert Categories </h2>
<form method="post" class="mb-2">
<div class="input-group w-90 mb-2">
    <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input name="category_title" id="category_title" type="text" class="form-control" value="" placeholder="Enter category title" autocomplete="Off" required>
</div>

<div class="input-group w-90 mb-2 m-auto">
<button type="submit" name="submit-btn" class="btn btn-primary">Insert Category</button>
</div>

</form>