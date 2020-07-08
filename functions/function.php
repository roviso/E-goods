<?php

$db = mysqli_connect("localhost","root","","ongo");

/// getRealIpUser function starts///

function getRealIpUser(){

    switch (true) {
        case(!empty($_SERVER['HTTP_X_REAL_IP'])):
            return $_SERVER['HTTP_X_REAL_IP'];

        case(!empty($_SERVER['HTTP_CLIENT_IP'])):
            return $_SERVER['HTTP_CLIENT_IP'];

        case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])):
            return $_SERVER['HTTP_X_FORWARDED_FOR'];

        default: return $_SERVER['REMOTE_ADDER'];
    }
}

/// getRealIpUser function ends///




/// getgoods() funtion starts///
function getgoods(){
  $con = mysqli_connect("localhost","root","","ongo");

    global $db;

    $get_goods = "select * from goods order by 1 DESC LIMIT 0,4";

    $run_goods = mysqli_query($db,$get_goods);

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

        <div class='col-md-4 col-sm-6 single'>

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
/// getgoods() funtion ends///





/// getcloths() funtion starts///
function getcloths(){
  $con = mysqli_connect("localhost","root","","ongo");

    global $db;

    $get_goods = "select * from goods where good_cat = '1'  order by 1 DESC LIMIT 0,4";

    $run_goods = mysqli_query($db,$get_goods);

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

        <div class='col-md-4 col-sm-6 single'>

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
/// getcloths() funtion ends///



/// getaccessories() funtion starts///

function getaccessories(){
  $con = mysqli_connect("localhost","root","","ongo");

    global $db;

    $get_goods = "select * from goods where good_cat = '2'  order by 1 DESC LIMIT 0,4";

    $run_goods = mysqli_query($db,$get_goods);

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

        <div class='col-md-4 col-sm-6 single'>

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
/// getaccessories() funtion ends///




/// getGCats() funtion starts///
function getGCats(){

  global $db;

  $get_g_cats = "select * from good_categories";

  $run_g_cats = mysqli_query($db,$get_g_cats);

  while($row_g_cats=mysqli_fetch_array($run_g_cats)){
    $g_cat_id = $row_g_cats['g_cat_id'];

    $g_cat_title = $row_g_cats['g_cat_title'];

    echo"
    <li>
        <a href = 'shop.php?g_cat=$g_cat_id'> $g_cat_title </a>
    </li>

    ";
  }
}
/// getGCats() funtion ends///




/// getGCats() funtion ends///
function getgcatgoods(){

  global $db;

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

              $g_title = $row_goods['good_title'];

              $g_price = $row_goods['good_price'];

              $g_img1 = $row_goods['good_img1'];

              echo "

              <div class='col-md-4 col-sm-6 single'>

                  <div class='product'>

                      <a href='details.php?pro_id=$g_id'>

                          <img class='img-responsive' src='admin_area/product_images/$g_img1'>

                      </a>

                      <div class='text'>

                          <h3>

                              <a href='details.php?pro_id=$g_id'>

                                  $g_title

                              </a>

                          </h3>

                          <p class='price'>

                              $ $g_price

                          </p>

                          <p class='button'>

                              <a class='btn btn-default' href='details.php?pro_id=$g_id'>

                                  View Details

                              </a>

                              <a class='btn btn-primary' href='details.php?pro_id=$g_id'>

                                  <i class='fa fa-shopping-cart'></i> Add to Favorits

                              </a>

                          </p>

                      </div>

                  </div>

              </div>

              ";


    }

  }


}
/// getGCats() funtion ends///


/// getGCats() resizeImage ends///
function resizeImage($resourceType,$image_width,$image_height){
  $resizeWidth = 200;
  $resizeHeight = 200;

  $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
  imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight,$image_width,$image_height);
  return $imageLayer;
}
/// getGCats() resizeImage ends///
