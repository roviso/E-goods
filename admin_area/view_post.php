<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->

                <i class="fa fa-dashboard"></i> Dashboard / View goods

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
                                <th> good ID: </th>
                                <th> Owner ID: </th>
                                <th> good Title: </th>
                                <th> good Image: </th>
                                <th> good Price: </th>
                                <th> good Keywords: </th>
                                <th> Added Date: </th>
                                <th> good Delete: </th>
                                <th> good Edit: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->

                        <tbody><!-- tbody begin -->

                            <?php
                                $per_page = 10;

                                if(isset($_GET['p_page'])){

                                    $page = $_GET['p_page'];

                                }else{

                                    $page=1;

                                  }
                                  $item = array();


                                $start_from = ($page-1) * $per_page;

                                $i=0;

                                $get_good = "select * from goods order by 1 DESC LIMIT $start_from,$per_page";

                                $run_good = mysqli_query($con,$get_good);

                                while($row_good=mysqli_fetch_array($run_good)){

                                    $good_id = $row_good['good_id'];
                                    $owner_id = $row_good['owner_id'];

                                    $good_title = $row_good['good_title'];




                                    $good_img1 = $row_good['good_img1'];

                                    $good_price = $row_good['good_price'];

                                    $good_keywords = $row_good['good_keywords'];

                                    $good_date = $row_good['date'];

                                    $i++;

                            ?>

                            <tr><!-- tr begin -->
                              <td> <?php echo $i; ?> </td>
                                <td> <?php echo $good_id; ?> </td>
                                <td> <?php echo $owner_id; ?> </td>
                                <td> <img src="product_images/<?php echo $good_img1; ?>" width="60" height="60"></td>
                                <td> <?php echo $good_title; ?> </td>

                                <td> $ <?php echo $good_price; ?> </td>
                                <td> <?php echo $good_keywords; ?> </td>
                                <td> <?php echo $good_date ?> </td>
                                <td>

                                     <a href="index.php?delete_post=<?php echo $good_id; ?>">

                                        <i class="fa fa-trash-o"></i> Delete

                                     </a>

                                </td>
                                <td>

                                     <a href="index.php?edit_post=<?php echo $good_id; ?>">

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

                     $query = "select * from goods";

                     $result = mysqli_query($con,$query);

                     $total_records = mysqli_num_rows($result);

                     $total_pages = ceil($total_records / $per_page);

                         echo "

                             <li>

                                 <a href='index.php?p_page=1'> ".'First Page'." </a>

                             </li>

                         ";

                         for($i=1; $i<=$total_pages; $i++){

                               echo "

                             <li>

                                 <a href='index.php?p_page=".$i."'> ".$i." </a>

                             </li>

                         ";

                         };

                         echo "

                             <li>

                                 <a href='index.php?p_page=$total_pages'> ".'Last Page'." </a>

                             </li>

                         ";




                ?>

                    </ul><!-- pagination Finish -->
                </center>
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php } ?>
