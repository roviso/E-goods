

    <div class="box"><!-- box Begin -->

        <form action="favourites.php" method="post" enctype="multipart/form-data"><!-- form Begin -->

            <h1>My Favourite Items</h1>

            <?php

            $select_fav = "select * from favourites where user_id in (select admin_id from admins where admin_email = '$admin_email')";

            $run_fav = mysqli_query($con,$select_fav);

            $count = mysqli_num_rows($run_fav);

            ?>

            <p class="text-muted">You currently have <?php echo $count; ?> item(s) in your Favourite List</p>

            <div class="table-responsive"><!-- table-responsive Begin -->

                <table class="table"><!-- table Begin -->

                    <thead><!-- thead Begin -->

                        <tr><!-- tr Begin -->

                            <th colspan="2">Item Name</th>
                            <th>Unit Price</th>
                            <th colspan="1">Delete</th>
                            <th colspan="2">Sub-Total</th>

                        </tr><!-- tr Finish -->

                    </thead><!-- thead Finish -->

                    <tbody><!-- tbody Begin -->

                       <?php

                        $total = 0;

                        while($row_fav = mysqli_fetch_array($run_fav)){

                          $good_id = $row_fav['good_id'];


                            $get_goods = "select * from goods where good_id='$good_id'";

                            $run_goods = mysqli_query($con,$get_goods);

                            while($row_goods = mysqli_fetch_array($run_goods)){

                                $good_title = $row_goods['good_title'];

                                $good_img1 = $row_goods['good_img1'];

                                $price = $row_goods['good_price'];

                                $total += $price;

                        ?>

                        <tr><!-- tr Begin -->

                            <td>
                              <div class='col-md-3 col-sm-6 center-responsive'>

                                <img class="img-responsive" src="../admin_area/product_images/<?php echo $good_img1; ?>" alt="Product 3a">

                              </div>

                            </td>

                            <td>

                                <a href="../details.php?pro_id=<?php echo $good_id; ?>"> <?php echo $good_title; ?> </a>

                            </td>

                            <td>

                                <?php echo $price; ?>

                            </td>

                            <td>

                                <input type="checkbox" name="remove[]" value="<?php echo $good_id; ?>">

                            </td>

                            <td>

                                $<?php echo $price; ?>

                            </td>

                        </tr><!-- tr Finish -->

                        <?php } } ?>

                    </tbody><!-- tbody Finish -->

                    <tfoot><!-- tfoot Begin -->

                        <tr><!-- tr Begin -->

                            <th colspan="5">Total</th>
                            <th colspan="2">Rs.<?php echo $total; ?></th>

                        </tr><!-- tr Finish -->

                    </tfoot><!-- tfoot Finish -->

                </table><!-- table Finish -->

            </div><!-- table-responsive Finish -->

            <div class="box-footer"><!-- box-footer Begin -->

                <div class="pull-left"><!-- pull-left Begin -->

                    <a href="index.php?admin_profile=<?php echo $admin_id; ?> class="btn btn-default"><!-- btn btn-default Begin -->

                        <i class="fa fa-chevron-left"></i> Go back

                    </a><!-- btn btn-default Finish -->

                </div><!-- pull-left Finish -->

                <div class="pull-right"><!-- pull-right Begin -->

                    <button type="submit" name="update" value="Update List" class="btn btn-default"><!-- btn btn-default Begin -->

                        <i class="fa fa-refresh"></i> Update favourites

                    </button><!-- btn btn-default Finish -->


                </div><!-- pull-right Finish -->

            </div><!-- box-footer Finish -->

        </form><!-- form Finish -->

    </div><!-- box Finish -->

    <?php

     function update_favourites(){

         global $con;

         if(isset($_POST['update'])){

             foreach($_POST['remove'] as $remove_id){

                 $delete_good = "delete from favourites where good_id='$remove_id'";

                 $run_delete = mysqli_query($con,$delete_good);

                 if($run_delete){

                     echo "<script>window.open('favourites.php','_self')</script>";

                 }

             }

         }

     }

    echo @$up_favourites = update_favourites();

    ?>
