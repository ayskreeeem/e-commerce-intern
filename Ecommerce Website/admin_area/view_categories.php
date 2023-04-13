
<?php include ('../includes/connect.php'); ?>

<h1 class="text-center" id="reqsHeading" style="margin-bottom: 12px;padding-bottom: 8px;padding-top: 12px;">List of Categories</h1>
<table class="table">
    <thead>
        <tr>
            <th> Category Title</th>
            <th> Edit</th>
            <th> Remove </th>
        </tr>
    </thead>
    <tbody>

    <?php
                    $category_query="SELECT * FROM categories ";
                    $result_category= mysqli_query($conn,$category_query);
                    while($row = mysqli_fetch_assoc($result_category)) {

                        //get grant info
                        $category_id= $row["category_id"];
                        $category_title= $row["category_title"];
                        
                        echo "
            <tr>
            <td> $category_title</td>
            <td> 
           <a href = 'index.php?edit_categories=$category_id' class='text-warning'><i class='fa-solid fa-pen-to-square'></i></a>
           </td>

           <td>
           <a href = 'index.php?delete_categories=$category_id' class='text-danger' data-toggle='modal' data-target='#exampleModal'><i class='fa-solid fa-trash'></i></a>
            </td>
            ";
            }?>    
           
    </tbody>
        </table>

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
        <button type="button" class="btn btn-success"><a class="text-light text-decoration-none" href="./index.php?delete_categories=<?php echo $category_id?>">YES</a></button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><a href="./index.php?view_categories" class="text-light text-decoration-none">NO</a></button>
       
      </div>
    </div>
  </div>
</div>