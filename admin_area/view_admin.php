<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->

                <i class="fa fa-dashboard"></i> Dashboard / View Admin

            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->

                   <i class="fa fa-tags"></i>  View admins

               </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->

            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->

                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                              <th> SN: </th>
                                <th> admin Id: </th>

                                <th> admin name: </th>
                                <th> admin image: </th>
                                <th> admin email: </th>
                                <th> admin address: </th>
                                <th> admin phno: </th>


                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->

                        <tbody><!-- tbody begin -->

                            <?php
                                $per_page = 10;

                                if(isset($_GET['a_page'])){

                                    $page = $_GET['a_page'];

                                }else{

                                    $page=1;

                                  }
                                  $item = array();


                                $start_from = ($page-1) * $per_page;

                                $i=0;

                                $get_admin = "select * from admins order by 1 DESC LIMIT $start_from,$per_page";

                                $run_admin = mysqli_query($con,$get_admin);

                                while($row_admin=mysqli_fetch_array($run_admin)){

                                    $admin_id = $row_admin['admin_id'];

                                    $admin_name = $row_admin['admin_name'];




                                    $admin_img1 = $row_admin['admin_image'];



                                    $admin_email = $row_admin['admin_email'];

                                    $admin_address = $row_admin['admin_address'];
                                    $admin_phno = $row_admin['admin_phno'];

                                    $i++;

                            ?>

                            <tr><!-- tr begin -->
                              <td> <?php echo $i; ?> </td>
                                <td> <?php echo $admin_id; ?> </td>
                                <td> <?php echo $admin_name; ?> </td>
                                <td> <img src="./admin_images/<?php echo $admin_img1; ?>" width="60" height="60"></td>
                                <td> <?php echo $admin_email; ?> </td>

                                <td>  <?php echo $admin_address; ?> </td>
                                <td> <?php echo $admin_phno; ?> </td>



                            </tr><!-- tr finish -->
<?php } ?>





                        </tbody><!-- tbody finish -->

                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            <center>
                    <ul class="pagination"><!-- pagination Begin -->
                <?php

                     $query = "select * from admins";

                     $result = mysqli_query($con,$query);

                     $total_records = mysqli_num_rows($result);

                     $total_pages = ceil($total_records / $per_page);

                         echo "

                             <li>

                                 <a href='index.php?a_page=1'> ".'First Page'." </a>

                             </li>

                         ";

                         for($i=1; $i<=$total_pages; $i++){

                               echo "

                             <li>

                                 <a href='index.php?a_page=".$i."'> ".$i." </a>

                             </li>

                         ";

                         };

                         echo "

                             <li>

                                 <a href='index.php?a_page=$total_pages'> ".'Last Page'." </a>

                             </li>

                         ";




                ?>

                    </ul><!-- pagination Finish -->
                </center>
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php } ?>
