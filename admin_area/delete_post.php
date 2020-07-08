<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{

?>

<?php

    if(isset($_GET['delete_post'])){

        $delete_id = $_GET['delete_post'];

        $delete_post = "delete from goods where good_id='$delete_id'";

        $run_delete = mysqli_query($con,$delete_post);

        if($run_delete){

            echo "<script>alert('Post has been Deleted')</script>";

            echo "<script>window.open('index.php?view_post','_self')</script>";

        }

    }

?>

<?php } ?>
