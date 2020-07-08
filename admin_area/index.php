<?php

    session_start();
    include("includes/db.php");

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{

      $admin_session = $_SESSION['admin_email'];

      $get_admin = "select * from admins where admin_email='$admin_session'";

      $run_admin = mysqli_query($con,$get_admin);

      $row_admin = mysqli_fetch_array($run_admin);

      $admin_id = $row_admin['admin_id'];

      $admin_name = $row_admin['admin_name'];

      $admin_email = $row_admin['admin_email'];

      $admin_image = $row_admin['admin_image'];

      $admin_address = $row_admin['admin_address'];

      $admin_contact = $row_admin['admin_phno'];


      $get_goods = "select * from goods";

      $run_goods = mysqli_query($con,$get_goods);

      $count_goods = mysqli_num_rows($run_goods);

      $get_p_categories = "select * from good_categories";

      $run_p_categories = mysqli_query($con,$get_p_categories);

      $count_p_categories = mysqli_num_rows($run_p_categories);

      $get_customers = "select * from admins";

      $run_customers = mysqli_query($con,$get_customers);

      $count_customers = mysqli_num_rows($run_customers);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ONGO Admin Area</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div id="wrapper"><!-- #wrapper begin -->

       <?php include("includes/sidebar.php"); ?>

        <div id="page-wrapper"><!-- #page-wrapper begin -->
            <div class="container-fluid"><!-- container-fluid begin -->

                <?php

                    if(isset($_GET['dashboard'])){

                        include("dashboard.php");

                }

                if(isset($_GET['add_post'])){

                    include("add_post.php");

            }
            if(isset($_GET['view_post'])){

                include("view_post.php");
              }

              if(isset($_GET['p_page'])){
                    include("view_post.php");
              }

              if(isset($_GET['edit_post'])){

                  include("edit_post.php");
                }

            if(isset($_GET['delete_post'])){
                  include("delete_post.php");
            }

            if(isset($_GET['insert_cat'])){
                  include("insert_cat.php");
            }
            if(isset($_GET['view_cat'])){
                  include("view_cat.php");
            }
            if(isset($_GET['edit_cat'])){
                  include("edit_cat.php");
            }
            if(isset($_GET['delete_cat'])){
                  include("delete_cat.php");
            }
            if(isset($_GET['add_user'])){
                  include("add_user.php");
            }
            if(isset($_GET['view_user'])){
                  include("view_user.php");
            }
            if(isset($_GET['u_page'])){
                  include("view_user.php");
            }
            if(isset($_GET['delete_user'])){
                  include("delete_user.php");
            }
            if(isset($_GET['edit_user'])){
              include("edit_user.php");
            }

            if(isset($_GET['view_admin'])){
                  include("view_admin.php");
            }

            if(isset($_GET['a_page'])){
                  include("view_admin.php");
            }

            if(isset($_GET['insert_admin'])){

                include("insert_admin.php");
              }

            if(isset($_GET['admin_profile'])){
                  include("admin_profile.php");
            }

            if(isset($_GET['my_favorites'])){

                include("my_favorites.php");
              }

              if(isset($_GET['edit_profile'])){

                  include("edit_profile.php");
                }

                ?>

            </div><!-- container-fluid finish -->
        </div><!-- #page-wrapper finish -->
    </div><!-- wrapper finish -->

<script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap-337.min.js"></script>
</body>
</html>


<?php } ?>
