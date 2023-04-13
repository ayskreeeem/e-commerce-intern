<!-- FOURTH CHILD -->
    <div class ="row">
    <div class="col-md-2 bg-secondary p-1 mb-3">
            <ul class="navbar-nav-bg-secondary text-center" style="height:100vh; list-style:none;">
             <li class="nav-item bg-info">
                 <a class="nav-link text-light" href="#"><h4>Your Profile</h4></a>
             </li>
             <li class="nav-item bg-secondary">
        <a class="nav-link text-light" href="index?profile=edit">Edit Account</a>
      </li>
      <li class="nav-item bg-secondary">
      <a class="nav-link text-light" href="index?profile=pending">Pending Orders</a>
      </li>

      <li class="nav-item bg-secondary">
      <a class="nav-link text-light" href="index?profile=orders">My Orders</a>
      </li>

      <li class="nav-item bg-secondary">
      <a class="nav-link text-light"  data-toggle='modal' data-target='#exampleModal'>Delete Account</a>
      </li>
     
            </ul>

        </div>
        <div class="class col-md-10">
                <?php 
                if (isset($_GET['edit_account'])){
                    include ('edit_account.php');
                }
                ?>

        </div>

    </div>
    
    <!-- DISPLAY ALL PRODUCTS -->
        
    <!-- DISPLAY ALL PRODUCTS-->


    
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">  Would you like to delete your account?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success"><a class="text-light text-decoration-none" href="profile.php?=<?php echo $user_id?>">YES</a></button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><a href="profile.php" class="text-light text-decoration-none">NO</a></button>
       
      </div>
    </div>
  </div>
</div>
