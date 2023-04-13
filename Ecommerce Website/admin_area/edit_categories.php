<?php include ('../includes/connect.php'); 
$category = $_GET['edit_categories'];
$category_title ='';

$category_query="SELECT * FROM categories WHERE category_id = $category ";
$result_category= mysqli_query($conn,$category_query);
$row = mysqli_fetch_assoc($result_category);

$category_title= $row["category_title"];


        if(isset($_POST['update-btn'])){

            $category_title =$_POST['category_title'];

            $update = "UPDATE categories SET
            category_title = '$category_title'
            WHERE category_id = $category";
            $result_update = mysqli_query($conn, $update);

        
        if($result_update){
            echo "<script> alert ('Category was successfully updated!') </script>";
        }}
?>



<h2 class = "text-center"> Update Categories </h2>
<form method="post" class="mb-2">
<div class="input-group w-90 mb-2">
    <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input name="category_title" id="category_title" type="text" class="form-control" value="<?php echo $category_title ?>" autocomplete="Off" required>
</div>

<div class="input-group w-90 mb-2 m-auto pt-3">
<button type="submit" name="update-btn" class="btn btn-primary">Update Category</button>
</div>

</form>