<?php 

include '../includes/connect.php';

if (isset($_GET['delete_categories'])){
    $category = $_GET['delete_categories'];

    $delete_query = "DELETE FROM categories WHERE category_id=$category";
    $result = mysqli_query ($conn, $delete_query);

    if($result){
        echo "<script> alert ('Category is deleted!') </script>";
        header("Location: index.php?view_categories ");
    }

}
?>