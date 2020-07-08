<?php

    $active='Favourites';
    include("includes/header.php");

?>
<?php
if(!isset($_SESSION['user_email'])){
  echo "<script>window.open('login.php','_self')</script>";
}
else{

$get_info = "select * from users where user_email = '{$_SESSION['user_email']}'";
$info_query = mysqli_query($con,$get_info);
$info_fetch=mysqli_fetch_array($info_query);
$user_id = $info_fetch['user_id'];

}


?>

   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->

               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       Favourites
                   </li>
               </ul><!-- breadcrumb Finish -->

           </div><!-- col-md-12 Finish -->

           <div id="favourites" class="col-md-9"><!-- col-md-9 Begin -->

               <div class="box"><!-- box Begin -->

                   <form action="favourites.php" method="post" enctype="multipart/form-data"><!-- form Begin -->

                       <h1>My Favourite Items</h1>

                       <?php

                       $select_fav = "select * from favourites where user_id='$user_id'";

                       $run_fav = mysqli_query($con,$select_fav);

                       $count = mysqli_num_rows($run_fav);

                       ?>

                       <p class="text-muted">You currently have <?php echo $count; ?> item(s) in your Favourite List</p>

                       <div class="table-responsive"><!-- table-responsive Begin -->

                           <table class="table"><!-- table Begin -->

                               <thead><!-- thead Begin -->

                                   <tr><!-- tr Begin -->

                                       <th colspan="2">Item Name</th>


                                       <th colspan="1">Price</th>
                                       <th colspan="1">Delete</th>
                                       <th colspan="2">Total</th>

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

                                           <img class="img-responsive" src="admin_area/product_images/<?php echo $good_img1; ?>" alt="Product 3a">

                                       </div>


                                       </td>

                                       <td>

                                           <a href="details.php?pro_id=<?php echo $good_id; ?>"> <?php echo $good_title; ?> </a>

                                       </td>

                                       <td>

                                           <?php echo $price; ?>

                                       </td>

                                       <td>

                                           <input type="checkbox" name="remove[]" value="<?php echo $good_id; ?>">

                                       </td>

                                       <td>

                                           Rs.<?php echo $price; ?>

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

                               <a href="shop.php" class="btn btn-default"><!-- btn btn-default Begin -->

                                   <i class="fa fa-chevron-left"></i> Go back

                               </a><!-- btn btn-default Finish -->

                           </div><!-- pull-left Finish -->

                           <div class="pull-right"><!-- pull-right Begin -->

                               <button type="submit" name="update" value="Update List" class="btn btn-default"><!-- btn btn-default Begin -->

                                   <i class="fa fa-trash"></i> Remove Item

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


                include("includes/recomendation.php");

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
