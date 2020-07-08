<?php
 if(isset($_SESSION['user_email'])){

$get_info = "select * from users where user_email = '{$_SESSION['user_email']}'";
$info_query = mysqli_query($con,$get_info);
$info_fetch=mysqli_fetch_array($info_query);
$user_email = $info_fetch['user_email'];
$user_id = $info_fetch['user_id'];
}

?>

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->

                   <i class="fa fa-tags"></i>  My Posts

               </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->

            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->

                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                              <th> SN: </th>
                                <th> post Title: </th>
                                <th> post Image: </th>
                                <th> post Price: </th>
                                <th> post Keywords: </th>
                                <th> Added Date: </th>
                                <th> post Delete: </th>
                                <th> post Edit: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->

                        <tbody><!-- tbody begin -->

                            <?php




                                  $item = array();


                                $i=0;

                                $get_good = "select * from goods  where owner_id = '$user_id' order by date DESC";

                                $run_good = mysqli_query($con,$get_good);

                                while($row_good=mysqli_fetch_array($run_good)){
                                  $good_id = $row_good['good_id'];

                                    $good_title = $row_good['good_title'];

                                    $good_img1 = $row_good['good_img1'];

                                    $good_price = $row_good['good_price'];

                                    $good_keywords = $row_good['good_keywords'];

                                    $good_date = $row_good['date'];

                                    $i++;

                            ?>

                            <tr><!-- tr begin -->
                              <td> <?php echo $i; ?> </td>

                                <td> <?php echo $good_title; ?> </td>
                                <td> <img src="../admin_area/product_images/<?php echo $good_img1; ?>" width="60" height="60"></td>

                                <td> $ <?php echo $good_price; ?> </td>
                                <td> <?php echo $good_keywords; ?> </td>
                                <td> <?php echo $good_date ?> </td>
                                <td>

                                     <a href="my_account.php?delete_post=<?php echo $good_id; ?>">

                                        <i class="fa fa-trash-o"></i> Delete

                                     </a>

                                </td>
                                <td>

                                     <a href="my_account.php?edit_post=<?php echo $good_id; ?>">

                                        <i class="fa fa-pencil"></i> Edit

                                     </a>

                                </td>
                            </tr><!-- tr finish -->
<?php } ?>





                        </tbody><!-- tbody finish -->

                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->

        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->
