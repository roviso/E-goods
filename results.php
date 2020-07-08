<?php
$active='Shop';
include("includes/header.php");

 ?>

 <?php
 if(isset($_SESSION['user_email'])){
 $get_info = "select * from users where user_email = '{$_SESSION['user_email']}'";
 $info_query = mysqli_query($con,$get_info);
 $info_fetch=mysqli_fetch_array($info_query);
 $user_id = $info_fetch['user_id'];
}
 ?>


  <div id="content"><!-- content begins-->
    <div class="container"><!-- container begins-->
        <div class="box"><!-- col-md-9 Begin -->
                      <?php
                         if(isset($_GET['user_query'])){
                           $user_query = $_GET['user_query'];
                          $search_word = preg_replace("#[^0-9a-z]#i","",$user_query);
                               echo "
                                <div class='box'><!-- box Begin -->
                                    <h1>$user_query</h1>
                                </div><!-- box Finish -->

                                ";



                            }

                        ?>


            <div class="row"><!-- row Begin -->

              <?php

              if(isset($_GET['user_query'])){
                $per_page = 6;



                  if(isset($_GET['page'])){

                      $page = $_GET['page'];

                  }else{

                      $page=1;

                    }
                    $item = array();


                  $start_from = ($page-1) * $per_page;

                  $get_goods = "select * from goods where good_title like '%$search_word%' or good_keywords like '%$search_word%'";

                  $run_goods = mysqli_query($con,$get_goods);

              if(isset($_SESSION['user_email'])){
              $get_info = "select * from users where user_email = '{$_SESSION['user_email']}'";
              $info_query = mysqli_query($con,$get_info);
              $info_fetch=mysqli_fetch_array($info_query);
              $user_name = $info_fetch['user_name'];
              $user_id = $info_fetch['user_id'];
              }

              while($row_goods=mysqli_fetch_array($run_goods)){

                  $goods_id = $row_goods['good_id'];

                  $g_owner = $row_goods['owner_id'];

                  $g_title = $row_goods['good_title'];

                  $g_price = $row_goods['good_price'];

                  $g_img1 = $row_goods['good_img1'];

                  echo "

                  <div class='col-md-4 col-sm-6 center-responsive'>

                      <div class='product'>

                          <a href='details.php?pro_id=$goods_id'>

                              <img class='img-responsive' src='admin_area/product_images/$g_img1'>

                          </a>

                          <div class='text'>

                              <h3>

                                  <a href='details.php?pro_id=$goods_id'>

                                      $g_title

                                  </a>

                              </h3>

                              <p class='price'>

                                  Rs: $g_price

                              </p>

                              <p class='button'>

                                  <a class='btn btn-default' href='details.php?pro_id=$goods_id'>

                                      View Details

                                  </a>
                                  <br/>
                                  ";


                                  include ("includes/fav_button.php");

                                  echo"


                                  </a>

                              </p>

                          </div>

                      </div>

                  </div>

                  ";
                }



              echo"</div><!-- row Finish -->";
}


                             ?>










          </div><!-- col-md-9 Finish -->

      </div><!-- container Finish -->
  </div><!-- #content Finish -->

  <?php

   include("includes/footer.php");

   ?>

   <script src="js/jquery-331.min.js"></script>
   <script src="js/bootstrap-337.min.js"></script>


</body>
</html>
