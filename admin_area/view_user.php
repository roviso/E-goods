<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->

                <i class="fa fa-dashboard"></i> Dashboard / View users

            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->

                   <i class="fa fa-tags"></i>  View Users

               </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->

            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->

                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                              <th> SN: </th>
                                <th> User Id: </th>

                                <th> User name: </th>
                                <th> User image: </th>
                                <th> User email: </th>
                                <th> User address: </th>
                                <th> User phno: </th>


                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->

                        <tbody><!-- tbody begin -->

                            <?php
                                $per_page = 10;

                                if(isset($_GET['u_page'])){

                                    $page = $_GET['u_page'];

                                }else{

                                    $page=1;

                                  }
                                  $item = array();


                                $start_from = ($page-1) * $per_page;

                                $i=0;

                                $get_user = "select * from users order by 1 DESC LIMIT $start_from,$per_page";

                                $run_user = mysqli_query($con,$get_user);

                                while($row_user=mysqli_fetch_array($run_user)){

                                    $user_id = $row_user['user_id'];

                                    $user_name = $row_user['user_name'];




                                    $user_img1 = $row_user['user_image'];



                                    $user_email = $row_user['user_email'];

                                    $user_address = $row_user['user_address'];
                                    $user_phno = $row_user['user_phno'];

                                    $i++;

                            ?>

                            <tr><!-- tr begin -->
                              <td> <?php echo $i; ?> </td>
                                <td> <?php echo $user_id; ?> </td>
                                <td> <?php echo $user_name; ?> </td>
                                <td> <img src="../customer/customer_images/<?php echo $user_img1; ?>" width="60" height="60"></td>
                                <td> <?php echo $user_email; ?> </td>

                                <td>  <?php echo $user_address; ?> </td>
                                <td> <?php echo $user_phno; ?> </td>

                                <td>

                                     <a href="index.php?delete_user=<?php echo $user_id; ?>">

                                        <i class="fa fa-trash-o"></i> Delete

                                     </a>

                                </td>
                                <td>

                                     <a href="index.php?edit_user=<?php echo $user_id; ?>">

                                        <i class="fa fa-pencil"></i> Edit

                                     </a>

                                </td>
                            </tr><!-- tr finish -->
<?php } ?>





                        </tbody><!-- tbody finish -->

                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            <center>
                    <ul class="pagination"><!-- pagination Begin -->
                <?php

                     $query = "select * from users";

                     $result = mysqli_query($con,$query);

                     $total_records = mysqli_num_rows($result);

                     $total_pages = ceil($total_records / $per_page);

                         echo "

                             <li>

                                 <a href='index.php?u_page=1'> ".'First Page'." </a>

                             </li>

                         ";

                         for($i=1; $i<=$total_pages; $i++){

                               echo "

                             <li>

                                 <a href='index.php?u_page=".$i."'> ".$i." </a>

                             </li>

                         ";

                         };

                         echo "

                             <li>

                                 <a href='index.php?u_page=$total_pages'> ".'Last Page'." </a>

                             </li>

                         ";




                ?>

                    </ul><!-- pagination Finish -->
                </center>
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php } ?>
