<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{

        $admin_session = $_SESSION['admin_email'];

        $get_admin = "select * from admins where admin_email='$admin_session'";

        $run_admin = mysqli_query($con,$get_admin);

        $row_admin = mysqli_fetch_array($run_admin);

        $admin_id = $row_admin['admin_id'];

?>

<div class="row"><!-- row no: 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <h1 class="page-header"> Admin Area </h1>

        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->

                <i class="fa fa-dashboard"></i> DASHBOARD

            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->

    </div><!-- col-lg-12 finish -->
</div><!-- row no: 1 finish -->

<div class="row"><!-- row no: 2 begin -->


    <div class="col-md-4"><!-- col-md-4 begin -->
        <div class="panel"><!-- panel begin -->
            <div class="panel-body"><!-- panel-body begin -->
                <div class="mb-md thumb-info"><!-- mb-md thumb-info begin -->
                  <?php

                   echo"
                  <a href='index.php?admin_profile=$admin_id '>
                  ";
                  ?>

                    <img src="admin_images/<?php echo $admin_image; ?>" alt="<?php echo $admin_image; ?>" class="rounded img-responsive">
                  </a>

                    <div class="thumb-info-title"><!-- thumb-info-title begin -->

                        <span class="thumb-info-inner"> <?php echo $admin_name; ?> </span>


                    </div><!-- thumb-info-title finish -->

                </div><!-- mb-md thumb-info finish -->

                <div class="mb-md"><!-- mb-md begin -->
                    <div class="widget-content-expanded"><!-- widget-content-expanded begin -->
                        <i class="fa fa-admin"></i> <span> Email: </span> <?php echo $admin_email; ?> <br/>
                        <i class="fa fa-flag"></i> <span> Address: </span> <?php echo $admin_address; ?> <br/>
                        <i class="fa fa-envelope"></i> <span> Contact: </span> <?php echo $admin_contact; ?> <br/>
                    </div><!-- widget-content-expanded finish -->

                    <hr class="dotted short">



                </div><!-- mb-md finish -->

            </div><!-- panel-body finish -->
        </div><!-- panel finish -->
    </div><!-- col-md-4 finish -->

    <div class="col-lg-8"><!-- col-lg-8 begin -->
        <div class="panel panel-primary"><!-- panel panel-primary begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->

                    <i class="fa fa-money fa-fw"></i>New Users

                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->

            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-hover table-striped table-busered"><!-- table table-hover table-striped table-busered begin -->

                        <thead><!-- thead begin -->

                            <tr><!-- th begin -->

                                <th> User id: </th>
                                <th> User Name: </th>
                                <th> User Email: </th>
                                <th> User address: </th>
                                <th> User Phone NO: </th>

                            </tr><!-- th finish -->

                        </thead><!-- thead finish -->

                        <tbody><!-- tbody begin -->

                            <?php

                                $i=0;

                                $get_user = "select * from users order by 1 DESC LIMIT 0,5";

                                $run_user = mysqli_query($con,$get_user);

                                while($row_user=mysqli_fetch_array($run_user)){

                                    $user_id = $row_user['user_id'];
                                    $user_name = $row_user['user_name'];
                                    $user_email = $row_user['user_email'];
                                    $user_address = $row_user['user_address'];
                                    $user_phno = $row_user['user_phno'];

                                    $i++;

                            ?>

                            <tr><!-- tr begin -->

                                <td> <?php echo $user_id; ?> </td>
                                <td>

                                    <?php

                                        echo $user_name;

                                    ?>

                                </td>
                                <td> <?php echo   $user_email; ?> </td>
                                <td> <?php echo $user_address; ?> </td>
                                <td> <?php echo $user_phno; ?> </td>


                            </tr><!-- tr finish -->

                            <?php } ?>

                        </tbody><!-- tbody finish -->

                    </table><!-- table table-hover table-striped table-busered finish -->
                </div><!-- table-responsive finish -->

                <div class="text-right"><!-- text-right begin -->

                    <a href="index.php?view_user"><!-- a href begin -->

                        View All users <i class="fa fa-arrow-circle-right"></i>

                    </a><!-- a href finish -->

                </div><!-- text-right finish -->

            </div><!-- panel-body finish -->

        </div><!-- panel panel-primary finish -->
    </div><!-- col-lg-8 finish -->



</div><!-- row no: 2 finish -->

<div class="row"><!-- row no: 3 begin -->

  <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 begin -->
      <div class="panel panel-primary"><!-- panel panel-primary begin -->

          <div class="panel-heading"><!-- panel-heading begin -->
              <div class="row"><!-- panel-heading row begin -->
                  <div class="col-xs-3"><!-- col-xs-3 begin -->

                      <i class="fa fa-tasks fa-5x"></i>

                  </div><!-- col-xs-3 finish -->

                  <div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
                      <div class="huge"> <?php echo $count_goods; ?> </div>

                      <div> Products </div>

                  </div><!-- col-xs-9 text-right finish -->

              </div><!-- panel-heading row finish -->
          </div><!-- panel-heading finish -->

          <a href="index.php?view_post"><!-- a href begin -->
              <div class="panel-footer"><!-- panel-footer begin -->

                  <span class="pull-left"><!-- pull-left begin -->
                      View Details
                  </span><!-- pull-left finish -->

                  <span class="pull-right"><!-- pull-right begin -->
                      <i class="fa fa-arrow-circle-right"></i>
                  </span><!-- pull-right finish -->

                  <div class="clearfix"></div>

              </div><!-- panel-footer finish -->
          </a><!-- a href finish -->

      </div><!-- panel panel-primary finish -->
  </div><!-- col-lg-3 col-md-6 finish -->


  <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 begin -->
      <div class="panel panel-orange"><!-- panel panel-yellow begin -->

          <div class="panel-heading"><!-- panel-heading begin -->
              <div class="row"><!-- panel-heading row begin -->
                  <div class="col-xs-3"><!-- col-xs-3 begin -->

                      <i class="fa fa-tags fa-5x"></i>

                  </div><!-- col-xs-3 finish -->

                  <div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
                      <div class="huge"> <?php echo $count_p_categories; ?> </div>

                      <div> Product Categories </div>

                  </div><!-- col-xs-9 text-right finish -->

              </div><!-- panel-heading row finish -->
          </div><!-- panel-heading finish -->

          <a href="index.php?view_cat"><!-- a href begin -->
              <div class="panel-footer"><!-- panel-footer begin -->

                  <span class="pull-left"><!-- pull-left begin -->
                      View Details
                  </span><!-- pull-left finish -->

                  <span class="pull-right"><!-- pull-right begin -->
                      <i class="fa fa-arrow-circle-right"></i>
                  </span><!-- pull-right finish -->

                  <div class="clearfix"></div>

              </div><!-- panel-footer finish -->
          </a><!-- a href finish -->

      </div><!-- panel panel-yellow finish -->
  </div><!-- col-lg-3 col-md-6 finish -->




</div><!-- row no: 3 finish -->


<?php } ?>
