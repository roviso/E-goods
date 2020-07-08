<div class="box"><!-- box Begin -->

  <div class="box-header"><!-- box-header Begin -->

      <center><!-- center Begin -->

          <h1> Login </h1>


      </center><!-- center Finish -->

  </div><!-- box-header Finish -->

  <form method="post" action="login.php"><!-- form Begin -->

      <div class="form-group"><!-- form-group Begin -->

          <label> Email </label>

          <input name="user_email" type="text" class="form-control" required>

      </div><!-- form-group Finish -->

       <div class="form-group"><!-- form-group Begin -->

          <label> Password </label>

          <input name="user_password" type="password" class="form-control" required>

      </div><!-- form-group Finish -->

      <div class="text-center"><!-- text-center Begin -->

          <button name="login" value="Login" class="btn btn-primary">

              <i class="fa fa-sign-in"></i> Login

          </button>

      </div><!-- text-center Finish -->

  </form><!-- form Finish -->

  <center><!-- center Begin -->

     <a href="customer_register.php">

         <h3> Dont have account..? Register here </h3>

     </a>

  </center><!-- center Finish -->

</div><!-- box Finish -->


<?php

if(isset($_POST['login'])){

    $user_email = $_POST['user_email'];

    $user_password = $_POST['user_password'];

    $select_user = "select * from users where user_email='$user_email' AND user_password='$user_password'";

    $run_user = mysqli_query($con,$select_user);

    $check_user = mysqli_num_rows($run_user);

    if($check_user==0){

        echo "<script>alert('Your email or password is wrong')</script>";

        exit();

    }

    else{

        $_SESSION['user_email']=$user_email;

       echo "<script>alert('You are Logged in')</script>";

       echo "<script>window.open('customer/my_account.php?my_post','_self')</script>";

    }

}

?>
