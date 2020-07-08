<?php
$active='my_account';
include("includes/header.php");

 ?>


   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->

               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       Register
                   </li>
               </ul><!-- breadcrumb Finish -->

           </div><!-- col-md-12 Finish -->

           <div class="col-md-3"><!-- col-md-3 Begin -->

   <?php

    include("includes/sidebar.php");

    ?>

           </div><!-- col-md-3 Finish -->

           <div class="col-md-9"><!-- col-md-9 Begin -->

               <div class="box"><!-- box Begin -->

                   <div class="box-header"><!-- box-header Begin -->

                       <center><!-- center Begin -->

                           <h2> Registration </h2>

                           <p class="text-muted"><!-- text-muted Begin -->

                               Thank you for buying goods from <strong>ongo.com</strong>

                           </p><!-- text-muted Finish -->

                       </center><!-- center Finish -->

                       <form action="customer_register.php" method="post" enctype="multipart/form-data"><!-- form Begin -->

                           <div class="form-group"><!-- form-group Begin -->

                               <label>Name</label>

                               <input type="text" class="form-control" name="u_name" required>

                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->

                               <label>Email</label>

                               <input type="text" class="form-control" name="u_email" required>

                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->

                               <label>Password</label>

                               <input type="password" class="form-control" name="u_password" required>

                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->

                               <label>Phone no:</label>

                               <input type="number" class="form-control" name="u_phno" required>

                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->

                               <label>Address</label>

                               <input type="text" class="form-control" name="u_address" required>

                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->

                               <label>Profile pic</label>

                               <input type="file" class="form-control" name="u_images" required>

                           </div><!-- form-group Finish -->




                           <div class="text-center"><!-- text-center Begin -->

                               <button type="submit" name="register" class="btn btn-primary">

                               <i class="fa fa-user-md"></i>Register

                               </button>

                           </div><!-- text-center Finish -->

                       </form><!-- form Finish -->

                   </div><!-- box-header Finish -->

               </div><!-- box Finish -->

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
<?php
if(isset($_POST['register'])){
  $imageProcess = 0;
  $user_name = $_POST['u_name'];
  $user_email = $_POST['u_email'];
  $user_password = $_POST['u_password'];
  $user_phno = $_POST['u_phno'];
  $user_address = $_POST['u_address'];
  if(is_array($_FILES)){
    $fileName = $_FILES['u_images']['tmp_name'];
    $sourceProperties = getimagesize($fileName);
    $resizeFileName = time();
    $uploadPath = "./customer/customer_images/";
    $fileExt = pathinfo($_FILES['u_images']['name'], PATHINFO_EXTENSION);
    $uploadImageType = $sourceProperties[2];
    $sourceImageWidth = $sourceProperties[0];
    $sourceImageHeight = $sourceProperties[1];
    switch ($uploadImageType) {
      case IMAGETYPE_JPEG:
        $resourceType = imagecreatefromjpeg($fileName);
        $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
        imagejpeg($imageLayer,$uploadPath."thump_".$resizeFileName.'.'.$fileExt);
        break;

      case IMAGETYPE_GIF:
        $resourceType = imagecreatefromgif($fileName);
        $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
        imagegif($imageLayer,$uploadPath."thump_".$resizeFileName.'.'.$fileExt);
        break;

      case IMAGETYPE_PNG:
        $resourceType = imagecreatefrompng($fileName);
        $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
        imagepng($imageLayer,$uploadPath."thump_".$resizeFileName.'.'.$fileExt);
        break;

      default:
        $imageProcess = 0;
        break;
    }
    $email_check = "select user_email from users where user_email = '$user_email' ";
    $run_check = mysqli_query($con,$email_check);
    $row_check =  mysqli_fetch_array($run_check);
    if(isset($row_check)){
        echo "<script>alert('email has already been taken!')</script>";
        echo "<script>window.open('customer_register.php','_self')</script>";
      }else{
        if(move_uploaded_file($fileName,$uploadPath. $resizeFileName.".".$fileExt)){
      $imageProcess = 1;
    }
  }

  if($imageProcess == 0){
    echo"<<script>
      alert('Please choose another picture')
    </script>";
  }else{
              $insert_user = "INSERT INTO users(user_name, user_email, user_password, user_address, user_phno, user_image)
              VALUES ('$user_name','$user_email','$user_password','$user_address','$user_phno','thump_$resizeFileName.$fileExt')";

              $run_user = mysqli_query($con,$insert_user);

              $_SESSION['user_email'] = $user_email;
              echo "<script>alert('Registration Successful!')</script>";
              echo "<script>window.open('index.php','_self')</script>";
            }
        }
      }
  ?>
