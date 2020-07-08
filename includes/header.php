<?php

session_start();

include("includes/db.php");
include("functions/function.php");

?>

<?php

if(isset($_GET['pro_id'])){

    $good_id = $_GET['pro_id'];

    $get_good = "select * from goods where good_id='$good_id'";

    $run_good = mysqli_query($con,$get_good);

    $row_good = mysqli_fetch_array($run_good);

    $owner_id = $row_good['owner_id'];
    $g_owner = $row_good['owner_id'];

    $g_cat_id = $row_good['good_cat'];

    $good_title = $row_good['good_title'];

    $good_price = $row_good['good_price'];

    $good_desc = $row_good['good_desc'];

    $good_img1 = $row_good['good_img1'];

    $good_img2 = $row_good['good_img2'];

    $good_img3 = $row_good['good_img3'];

    $get_g_cat = "select * from good_categories where g_cat_id='$g_cat_id'";

    $run_g_cat = mysqli_query($con,$get_g_cat);

    $row_g_cat = mysqli_fetch_array($run_g_cat);

    $g_cat_title = $row_g_cat['g_cat_title'];

}

if(isset($_SESSION['user_email'])){

$get_info = "select * from users where user_email = '{$_SESSION['user_email']}'";
$info_query = mysqli_query($con,$get_info);
$info_fetch=mysqli_fetch_array($info_query);
$user_name = $info_fetch['user_name'];
$user_id = $info_fetch['user_id'];
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-goods</title>

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">

  </head>
  <body>

    <div id ="top"> <!-- top begins -->

      <div class="container"><!-- container -->

        <div class="col-md-6 offer"><!-- col-md-6 offer begins -->


              <a href="#" class="btn btn-success btn-sn">

                <?php

                if(!isset($_SESSION['user_email'])){
                  echo "Welcome To ONGO";
                }else{

                  echo "Welcome: $user_name";
                }


                 ?>




              </a>
            </div><!-- col-md-6 offer ends -->

              <div class="col-md-6"><!-- col-md-6 begins -->
                  <ul class="menu"><!-- cmenu begins -->

                    <?php

                    if(!isset($_SESSION['user_email'])){
                      echo "<li>
                        <a href='customer_register.php'>Register</a>
                      </li> ";
                    }else{

                      include "notification.php";

                    }
                     ?>


                    <li>
                      <a href="customer/my_account.php?my_post">My Account</a>
                    </li>

                    <li>

                    </li>



                    <li>
                        <a href="login.php">

                          <?php

                            if(!isset($_SESSION['user_email'])){

                              echo "<a href='login.php'> Login </a>";
                            }else{
                              echo "<a href='logout.php'> Logout </a> ";
                            }
                           ?>

                        </a>
                    </li>

                    <li>

                    </li>


                  </ul><!-- cmenu ends -->

              </div><!-- col-md-6 ends -->
          </div><!-- container ends-->


      </div><!-- top ends-->



  <div id="navbar" class="navbar navbar-default"><!-- navbar begins-->


        <div class="container"><!-- container begins-->

        <div class="navbar-header"><!-- navbar-header begins-->
          <a href="index.php" class="navbar-brand home"><!-- navbar-brand home begins-->

          <img src="images/ecom-store-logo.png" alt="E-goods logo" class="hidden-xs">
          <img src="images/ecom-store-logo-mobile.png" alt="E-goods-mobile logo" class="visible-xs">

          </a><!-- navbar-brand home ends-->

          <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
            <span class="sr-only">Toggle Navigation</span>
            <i class="fa fa-align-justify"></i>
          </button>

          <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
            <span class="sr-only">Toggle Search</span>
            <i class="fa fa-search"></i>
          </button>
        </div><!-- navbar-header ends-->

        <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse begins-->

          <div class="padding-nav"><!-- padding-nav begins-->
            <ul class="nav navbar-nav left">
              <li class="<?php if($active=='Home') echo"active"; ?>">
                <a href="index.php">Home</a>
              </li >
              <li class="<?php if($active=='Shop') echo"active"; ?>">
                <a href="shop.php">Browse</a>
              </li>
              <li class="<?php if($active=='my_account') echo"active"; ?>">
                <?php

                if(!isset($_SESSION['user_email'])){

                  echo "<a href = 'login.php'>My Account</a>";
                }else{
                  echo "<a href = 'customer/my_account.php?my_post'>My Account</a>";
                }
                 ?>
              </li>
              <li class="<?php if($active=='Favourites') echo"active"; ?>">
                <a href="favourites.php">Favourites</a>
              </li>

            </ul>
          </div><!-- padding-nav ends-->


            <div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right begins-->
              <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search">

                <span class="sr-only">Toggle Search</span>

                <i class="fa fa-search"></i>
              </button>


            </div><!-- navbar-collapse collapse right begins-->

              <div class="collapse clearfix" id="search"><!-- collapse clearfix brgins-->

                <form method="get" action="results.php" class="navbar-form">
                  <div class="input-group"><!-- input-group brgins-->
                    <input type="text" class="form-control" placeholder="Search" name="user_query" required>

                    <span class="input-group-btn"><!-- input-group-btn brgins-->

                    <button type="submit" name="search"  value="Search" class="btn btn-primary"><!-- btn btn-primary brgins-->
                      <i class="fa fa-search"></i>


                    </button><!-- btn btn-primary ends-->
                    </span><!-- input-group-btn ends-->
                  </div><!-- input-group ends-->

                </form>
              </div><!-- collapse clearfix ends-->

        </div><!-- navbar-collapse collapse ends-->

        </div><!-- container ends-->


  </div><!-- navbar ends-->
