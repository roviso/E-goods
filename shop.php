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
      <div class="col-md-12"><!-- col-md-12 begins-->
        <ul class="breadcrumb">
          <li>
            <a href="index.php">Home</a>
          </li>
          <li>Shop</li>
        </ul>
      </div><!-- col-md-12 ends-->

      <div class="col-md-3"><!-- col-md-3 ends-->

        <?php
        include("includes/sidebar.php");
        ?>

      </div><!-- col-md-3 Finish -->

        <div class="col-md-9"><!-- col-md-9 Begin -->


                      <?php

                         if(!isset($_GET['g_cat'])){

                               echo "

                                <div class='box'><!-- box Begin -->
                                    <h1>Shop</h1>
                                    <p>
                                    Welcome to Online Goods.
                                      </p>
                                </div><!-- box Finish -->

                                ";



                            }

                        ?>


            <div class="row"><!-- row Begin -->

              <?php

              if(!isset($_GET['g_cat'])){
                $per_page = 6;



                  if(isset($_GET['page'])){

                      $page = $_GET['page'];

                  }else{

                      $page=1;

                    }
                    $item = array();


                  $start_from = ($page-1) * $per_page;

                  $get_goods = "select * from goods order by 1 DESC LIMIT $start_from,$per_page";

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


                             ?>




              <center>
                  <ul class="pagination"><!-- pagination Begin -->
          <?php

                   $query = "select * from goods";

                   $result = mysqli_query($con,$query);

                   $total_records = mysqli_num_rows($result);

                   $total_pages = ceil($total_records / $per_page);

                       echo "

                           <li>

                               <a href='shop.php?page=1'> ".'First Page'." </a>

                           </li>

                       ";

                       for($i=1; $i<=$total_pages; $i++){

                             echo "

                           <li>

                               <a href='shop.php?page=".$i."'> ".$i." </a>

                           </li>

                       ";

                       };

                       echo "

                           <li>

                               <a href='shop.php?page=$total_pages'> ".'Last Page'." </a>

                           </li>

                       ";



}
          ?>

                  </ul><!-- pagination Finish -->
              </center>
              <?php
                if(isset($_GET['g_cat'])){



                                  $g_cat_id = $_GET['g_cat'];

                                  $get_g_cat = "select * from good_categories where g_cat_id = '$g_cat_id' ";

                                  $run_g_cat = mysqli_query($db,$get_g_cat);

                                  $row_g_cat = mysqli_fetch_array($run_g_cat);

                                  $g_cat_title = $row_g_cat['g_cat_title'];

                                  $g_cat_desc = $row_g_cat['g_cat_desc'];

                                  $get_goods = "select * from goods where good_cat = '$g_cat_id'";

                                  $run_goods= mysqli_query($db,$get_goods);

                                  $count = mysqli_num_rows($run_goods);

                                  if($count == 0){

                                    echo "

                                      <div class = 'box'>
                                        <h1> No goods found in this category </h1>

                                      </div>

                                    ";
                                  }
                                  else{
                                    echo"

                                    <div class = 'box'>

                                      <h1> $g_cat_title </h1>

                                      <p> $g_cat_desc </p>

                                    </div>

                                    ";
                                  }

                                  while($row_goods =mysqli_fetch_array($run_goods)){

                                            $g_id = $row_goods['good_id'];
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
