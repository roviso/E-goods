<div id="row same-heigh-row"><!-- #row same-heigh-row Begin -->
  <div class="col-md-12"><!-- col-md-12 begins-->

    <h3>Goods you may like:</h3>

    </ul>
  </div><!-- col-md-12 ends-->

    <?php

    $get_goods = "select * from goods order by rand() LIMIT 0,3";

    $run_goods = mysqli_query($con,$get_goods);

    while($row_goods=mysqli_fetch_array($run_goods)){

        $good_id = $row_goods['good_id'];
        $goods_id = $row_goods['good_id'];
        $g_owner = $row_goods['owner_id'];

        $good_title = $row_goods['good_title'];

        $good_price = $row_goods['good_price'];

        $good_img1 = $row_goods['good_img1'];

        echo "

     <div class='col-md-3 col-sm-6 center-responsive'><!-- col-md-3 col-sm-6 center-responsive Begin -->
        <div class='product same-height'><!-- product same-height Begin -->
            <a href='details.php?pro_id=$good_id'>
                <img class='img-responsive' src='admin_area/product_images/$good_img1' alt='Product 6'>
             </a>

             <div class='text'><!-- text Begin -->
                 <h3><a href='details.php?pro_id=$good_id'> $good_title </a></h3>

                 <p class='price'>Rs.$good_price</p>
                 ";


                 include("includes/fav_button.php");



                 echo"

             </div><!-- text Finish -->

         </div><!-- product same-height Finish -->
    </div><!-- col-md-3 col-sm-6 center-responsive Finish -->

        ";

    }

    ?>

</div><!-- #row same-heigh-row Finish -->
