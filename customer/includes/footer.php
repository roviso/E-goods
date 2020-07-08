<div id="footer"><!-- #footer begins-->
  <div class="container"><!-- container begins-->
    <div class="row"><!-- row begins-->
      <div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 begins-->
        <h4>
          Pages
        </h4>
        <ul>
          <li><a href="../favourites.php">Favourites</a></li>
          <li><?php

                          if(!isset($_SESSION['user_email'])){

                            echo "<a href = '../login.php'>My Account</a>";
                          }else{
                            echo "<a href = 'my_account.php?my_post'>My Account</a>";
                          }


                           ?></li>
          <li><a href="../shop.php">Browse</a></li>

        </ul>

        <hr class="hidden-md hidden-lg hidden-sm">
      </div><!-- col-sm-6 col-md-3 ends-->

      <div class="col-sm-6 col-md-3">

        <h4>User section</h4>

        <ul>
          <?php

                         if(!isset($_SESSION['user_email'])){

                           echo "<a href = '../login.php'>Login</a>";
                         }else{
                           echo "<a href = 'my_account.php?my_post'>My Account</a>";
                         }


                          ?>
          <li><?php

                         if(!isset($_SESSION['user_email'])){

                           echo "<a href = '../login.php'>Login</a>";
                         }else{
                           echo "<a href = 'my_account.php?edit_account'>Edit Account</a>";
                         }
                          ?></li>
        </ul>
        <hr class="hidden-md hidden-lg hidden-sm">
      </div>

      <div class="com-sm-6 col-md-3"><!-- col-sm-6 col-md-3 begins-->

        <h4>Top Products Categories</h4>

        <ul>
          <?php

          $get_g_cats = "select * from good_categories";
          $run_g_cats = mysqli_query($con,$get_g_cats);

          while($row_g_cats = mysqli_fetch_array($run_g_cats)){
            $g_cat_id = $row_g_cats['g_cat_id'];
            $g_cat_title = $row_g_cats['g_cat_title'];
            $g_cat_desc = $row_g_cats['g_cat_desc'];

            echo"
            <li>
              <a href='../shop.php?g_cat=$g_cat_id'>
                $g_cat_title
              </a>
            </li>

            ";


          }

           ?>

        </ul>

        <hr class="hidden-md hidden-lg hidden-sm">

      </div><!-- col-sm-6 col-md-3 ends-->

      <div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 begins-->

        <h4>Find US:</h4>

        <p>

          <strong>E_goods.ku.edu.np</strong>
          <br>Kathmandu University
          <br>977-9808080808

        </p>

        <a href="contact.php">For more Info</a>

        <p class="social">
          <a href="../#" class="fa fa-facebook">
          </a>
          <a href="../#" class="fa fa-twitter">
          </a>
          <a href="../#" class="fa fa-instagram">
          </a>
          <a href="../#" class="fa fa-google-plus">
          </a>
          <a href="../#" class="fa fa-envelope">
          </a>
        </p>

        <hr class="hidden-md hidden-lg hidden-sm">


      </div><!-- col-sm-6 col-md-3 ends-->


    </div><!-- row ends-->
  </div><!-- container ends-->
</div><!-- footer ends-->


<div id="copyright">
  <div class="container">
    <div class="col-md-6">

      <p class="pull-left">&copy; 2019 E-Goods KU All Rights Reserve</p>
    </div>

    <div class="col-md-6">

      <p class="pull-right">Theme by; <a href="#">E-good.co</a></p>
    </div>
  </div>
</div>
