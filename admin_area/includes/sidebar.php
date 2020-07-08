<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{

?>

<nav class="navbar navbar-inverse navbar-fixed-top"><!-- navbar navbar-inverse navbar-fixed-top begin -->
    <div class="navbar-header"><!-- navbar-header begin -->

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><!-- navbar-toggle begin -->

            <span class="sr-only">Toggle Navigation</span>

            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

        </button><!-- navbar-toggle finish -->

        <a href="index.php?dashboard" class="navbar-brand">admin Area</a>

    </div><!-- navbar-header finish -->

    <ul class="nav navbar-right top-nav"><!-- nav navbar-right top-nav begin -->

        <li class="dropdown"><!-- dropdown begin -->

            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><!-- dropdown-toggle begin -->

                <i class="fa fa-admin"></i> <?php echo $admin_name;  ?> <b class="caret"></b>

            </a><!-- dropdown-toggle finish -->

            <ul class="dropdown-menu"><!-- dropdown-menu begin -->
                <li><!-- li begin -->
                    <a href="index.php?admin_profile=<?php echo $admin_id; ?>"><!-- a href begin -->

                        <i class="fa fa-fw fa-admin"></i> Profile

                    </a><!-- a href finish -->
                </li><!-- li finish -->

                <li><!-- li begin -->
                    <a href="index.php?view_post"><!-- a href begin -->

                        <i class="fa fa-fw fa-envelope"></i> goods

                        <span class="badge"><?php echo $count_goods; ?></span>

                    </a><!-- a href finish -->
                </li><!-- li finish -->

                <li><!-- li begin -->
                    <a href="index.php?view_cat"><!-- a href begin -->

                        <i class="fa fa-fw fa-gear"></i> good Categories

                        <span class="badge"><?php echo $count_p_categories; ?></span>

                    </a><!-- a href finish -->
                </li><!-- li finish -->

                <li class="divider"></li>

                <li><!-- li begin -->
                    <a href="logout.php"><!-- a href begin -->

                        <i class="fa fa-fw fa-power-off"></i> Log Out

                    </a><!-- a href finish -->
                </li><!-- li finish -->

            </ul><!-- dropdown-menu finish -->

        </li><!-- dropdown finish -->

    </ul><!-- nav navbar-right top-nav finish -->

    <div class="collapse navbar-collapse navbar-ex1-collapse"><!-- collapse navbar-collapse navbar-ex1-collapse begin -->
        <ul class="nav navbar-nav side-nav"><!-- nav navbar-nav side-nav begin -->
            <li><!-- li begin -->
                <a href="index.php?dashboard"><!-- a href begin -->

                        <i class="fa fa-fw fa-dashboard"></i> Dashboard

                </a><!-- a href finish -->

            </li><!-- li finish -->

            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#goods"><!-- a href begin -->

                        <i class="fa fa-fw fa-tag"></i> Posts
                        <i class="fa fa-fw fa-caret-down"></i>

                </a><!-- a href finish -->

                <ul id="goods" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?add_post"> Insert Post </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_post"> View Posts </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->

            </li><!-- li finish -->


            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#cat"><!-- a href begin -->

                        <i class="fa fa-fw fa-book"></i> Categories
                        <i class="fa fa-fw fa-caret-down"></i>

                </a><!-- a href finish -->

                <ul id="cat" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_cat"> Insert Category </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_cat"> View Categories </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->

            </li><!-- li finish -->

            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#users"><!-- a href begin -->

                        <i class="fa fa-fw fa-users"></i> Users
                        <i class="fa fa-fw fa-caret-down"></i>

                </a><!-- a href finish -->

                <ul id="users" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?add_user"> Insert users </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_user"> View users </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                </li><!-- li finish -->
                <li><!-- li begin -->

                    <a href="#" data-toggle="collapse" data-target="#admins"><!-- a href begin -->

                            <i class="fa fa-fw fa-users"></i> Admins
                            <i class="fa fa-fw fa-caret-down"></i>

                    </a><!-- a href finish -->

                <ul id="admins" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_admin"> Insert admin </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_admin"> View admin </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?edit_profile=<?php echo $admin_id; ?>"> Edit Profile </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                </li><!-- li finish -->


            <li><!-- li begin -->
                <a href="logout.php"><!-- a href begin -->
                    <i class="fa fa-fw fa-power-off"></i> Log Out
                </a><!-- a href finish -->
            </li><!-- li finish -->

        </ul><!-- nav navbar-nav side-nav finish -->
    </div><!-- collapse navbar-collapse navbar-ex1-collapse finish -->

</nav><!-- navbar navbar-inverse navbar-fixed-top finish -->


<?php } ?>
