
<?php include ('../includes/connect.php'); ?>

<h1 class="text-center" id="reqsHeading" style="margin-bottom: 12px;padding-bottom: 8px;padding-top: 12px;">List of Products</h1>
<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Image </th>
            <th>Price </th>
            <th> Edit </th>
            <th> Delete </th>
        </tr>
    </thead>
    <tbody>

    <?php
                    $category_query="SELECT * FROM products ORDER BY date";
                    $result_category= mysqli_query($conn,$category_query);
                    while($row = mysqli_fetch_assoc($result_category)) {

                        //get grant info
                        $product_id = $row["product_id"];
                        $product_title = $row["product_title"];
                        $product_image = $row["product_image"];
                        $product_price = $row["product_price"];
                        
                        echo "
            <tr>
     
            <td> $product_title</td>
            <td> <img src = './product_images/$product_image' width='80px;' height='80px;'> </td>
            <td> $product_price</td>

            <td> 
           <a href = 'index.php?edit_products=$product_id' class='text-warning'><i class='fa-solid fa-pen-to-square'></i></a>
           </td>

           <td>
           <a href = 'index.php?delete_products=$product_id' class='text-danger'  data-toggle='modal' data-target='#exampleModal'><i class='fa-solid fa-trash'></i></a>
            </td>

            ";
            
            }?>  
            
        
    </tbody>
    <table>

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">    Are you sure you want to delete this item? </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success"><a class="text-light text-decoration-none" href="./index.php?delete_products=<?php echo $product_id?>">YES</a></button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><a href="./index.php?view_products" class="text-light text-decoration-none">NO</a></button>
       
      </div>
    </div>
  </div>
</div>