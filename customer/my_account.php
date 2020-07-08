<?php
$active='my_account';
include("includes/header.php");
if(!isset($_SESSION['user_email'])){
  echo "<script>window.open('../login.php','_self')</script>";
}

 ?>

  <div id="content"><!-- content begins-->
    <div class="container"><!-- container begins-->
      <div class="col-md-12"><!-- col-md-12 begins-->
        <ul class="breadcrumb">
          <li>
            <a href="index.php">Home</a>
          </li>
          <li>My Account</li>
          <?php
          if (isset($_GET['edit_post'])){
            echo" <li>Edit Post</li>";
          }
          if (isset($_GET['my_post'])){
            echo" <li>MY Post</li>";
          }
          if (isset($_GET['edit_account'])){
            echo" <li>Edit Account</li>";
          }
          if (isset($_GET['change_password'])){
            echo" <li>Change Password</li>";
          }
          if (isset($_GET['add_post'])){
            echo" <li>Add Post</li>";
          }
          ?>

        </ul>
      </div><!-- col-md-12 ends-->

      <div class="col-md-3"><!-- col-md-3 ends-->

        <?php
        if (!isset($_GET['edit_post'])){
          include("includes/sidebar.php");
        }
        ?>
      </div><!-- col-md-3 Finish -->

      <?php
              if (!isset($_GET['edit_post'])){
                ?>


        <div class="col-md-9"><!-- col-md-9 ends-->

          <div class="box"><!--box  ends-->
            <?php
            if (isset($_GET['my_post'])){
              include("my_post.php");
            }

            ?>

            <?php
            if (isset($_GET['edit_account'])){
              include("edit_account.php");
            }
            ?>

            <?php
            if (isset($_GET['change_password'])){
              include("change_password.php");
            }
            ?>

            <?php
            if (isset($_GET['add_post'])){
              include("add_post.php");
            }


            ?>

          </div><!-- box ends-->


        </div><!-- col-md-9 ends-->
      <?php }

      else {
        ?>


        <div class="box"><!--box  ends-->

<?php
        include("edit_post.php");

        ?>

        </div>
    <?php

      }

      ?>





    </div><!-- container ends-->
  </div><!-- content ends-->

  <?php

  include("includes/footer.php");

  ?>


  <script src ="js/jquery-331.min.js"></script>
  <script src ="js/bootstrap-337.min.js"></script>


  </body>
</html>
