<?php
if(isset($_GET['admin_profile'])){

  $admin_id = $_GET['admin_profile'];

  $get_admin = "select * from admins where admin_id='$admin_id'";

  $run_admin = mysqli_query($con,$get_admin);

  $row_admin = mysqli_fetch_array($run_admin);

  $admin_id = $row_admin['admin_id'];

  $admin_name = $row_admin['admin_name'];

  $admin_email = $row_admin['admin_email'];

  $admin_image = $row_admin['admin_image'];

  $admin_address = $row_admin['admin_address'];

  $admin_contact = $row_admin['admin_phno'];
}


  ?>

<div class="panel panel-default sidebar-menu"> <!-- panel panel-default sidebar-menu begins -->
  <div class="panel-heading"> <!-- panel-heading begins -->

    <center>
      <img src="admin_images/<?php echo $admin_image; ?>" alt="prof-pic">
    </center>

    <br/>
    <h3 class="panel-title" align="center">
      Name: <?php echo $admin_name; ?>
    </h3>

    <br/>
    <h3 class="panel-title" align="center">
      Email: <?php echo $admin_email; ?>
    </h3>

    <br/>
    <h3 class="panel-title" align="center">
      Address: <?php echo $admin_address; ?>
    </h3>

    <br/>
    <h3 class="panel-title" align="center">
      Phone no: <?php echo $admin_contact; ?>
    </h3>

  </div> <!-- panel-heading ends -->

  <div class="panel-body"><!-- panel-body begins -->
    <ul class="nav nav-pills nav-stacked " align = "center">

      <li class="<?php if(isset($_GET['my_favorites'])) {echo "active";}?>">
        <a href="index.php?my_favorites">
          <i class="fa fa-list"></i>
          My Favorite Items
        </a>
        </li>

      <li class="<?php if(isset($_GET['edit_account'])) {echo "active";}?>">
        <a href="index.php?edit_profile=<?php echo $admin_id; ?>">
          <i class="fa fa-pencil"></i>
          Edit Account Info
        </a>
        </li>

        <li class="<?php if(isset($_GET['change_password'])) {echo "active";}?>">
          <a href="index.php?change_password">
            <i class="fa fa-user"></i>
            change_password
          </a>
          </li>



      <li> <a href="logout.php">
        <i class="fa fa-sign-out"></i>Log Out
      </a></li>




    </ul>
  </div><!-- panel-body ends -->

</div> <!-- panel panel-default sidebar-menu ends -->
