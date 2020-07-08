<?php
 if(isset($_SESSION['user_email'])){

$get_img = "select * from users where user_email = '{$_SESSION['user_email']}'";
$img_query = mysqli_query($con,$get_img);
$img_fetch=mysqli_fetch_array($img_query);
$user_id = $img_fetch['user_id'];
$user_phno = $img_fetch['user_phno'];
$user_address = $img_fetch['user_address'];
$user_email = $img_fetch['user_email'];
$user_img = $img_fetch['user_image'];
$user_name = $img_fetch['user_name'];
$user_password = $img_fetch['user_password'];
}
?>

<div class="panel panel-default sidebar-menu"> <!-- panel panel-default sidebar-menu begins -->
  <div class="panel-heading"> <!-- panel-heading begins -->

    <center>
      <img src="customer_images/<?php echo $user_img; ?>" alt="prof-pic">
    </center>

    <br/>
    <h3 class="panel-title" align="center">
      Name: <?php echo $user_name; ?>
    </h3>

    <br/>
    <h3 class="panel-title" align="center">
      Email: <?php echo $user_email; ?>
    </h3>

    <br/>
    <h3 class="panel-title" align="center">
      Address: <?php echo $user_address; ?>
    </h3>

    <br/>
    <h3 class="panel-title" align="center">
      Phone no: <?php echo $user_phno; ?>
    </h3>

  </div> <!-- panel-heading ends -->

  <div class="panel-body"><!-- panel-body begins -->
    <ul class="nav nav-pills nav-stacked ">

      <li class="<?php if(isset($_GET['my_favorites'])) {echo "active";}?>">
        <a href="my_account.php?my_post">
          <i class="fa fa-list"></i>
          My Posts
        </a>
        </li>

      <li class="<?php if(isset($_GET['edit_account'])) {echo "active";}?>">
        <a href="my_account.php?edit_account">
          <i class="fa fa-pencil"></i>
          Edit Account Info
        </a>
        </li>

        <li class="<?php if(isset($_GET['change_password'])) {echo "active";}?>">
          <a href="my_account.php?change_password">
            <i class="fa fa-user"></i>
            change_password
          </a>
          </li>

          <li class="<?php if(isset($_GET['add_post'])) {echo "active";}?>">
            <a href="my_account.php?add_post">
              <i class="fa fa-plus-circle"></i>
              Add Post
            </a>
            </li>


      <li> <a href="logout.php">
        <i class="fa fa-sign-out"></i>Log Out
      </a></li>




    </ul>
  </div><!-- panel-body ends -->

</div> <!-- panel panel-default sidebar-menu ends -->
