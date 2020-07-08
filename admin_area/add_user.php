<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Insert Post </title>
</head>
<body>

  <div class="row"><!-- row Begin -->

      <div class="col-lg-12"><!-- col-lg-12 Begin -->

          <div class="panel panel-default"><!-- panel panel-default Begin -->

             <div class="panel-heading"><!-- panel panel-default Begin -->

                 <h3 class="panel-title"><!-- panel-title Begin -->

                     <i class="fa fa-plus-circle"></i> Add Users

                 </h3><!-- panel-title Finish -->

             </div> <!-- canel panel-default Finish -->

             <div class="panel-body"><!-- panel-body Begin -->

                 <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->

                     <div class="form-group"><!-- form-group Begin -->

                        <label class="col-md-3 control-label"> User Name </label>

                        <div class="col-md-6"><!-- col-md-6 Begin -->

                            <input name="user_name" type="text" class="form-control" required>

                        </div><!-- col-md-6 Finish -->

                     </div><!-- form-group Finish -->

                     <div class="form-group"><!-- form-group Begin -->
                       <label class="col-md-3 control-label"> User Emaiil </label>

                       <div class="col-md-6"><!-- col-md-6 Begin -->

                           <input name="user_email" type="text" class="form-control" required>

                       </div><!-- col-md-6 Finish -->


                     </div><!-- form-group Finish -->


                     <div class="form-group"><!-- form-group Begin -->

                          <label class="col-md-3 control-label">Password</label>
                          <div class="col-md-6"><!-- col-md-6 Begin -->
                         <input type="password" class="form-control" name="user_password" required>
                         </div><!-- col-md-6 Finish -->
                     </div><!-- form-group Finish -->





                     <div class="form-group"><!-- form-group Begin -->

                        <label class="col-md-3 control-label"> User Image </label>

                        <div class="col-md-6"><!-- col-md-6 Begin -->

                            <input name="user_images" type="file" class="form-control" required>

                        </div><!-- col-md-6 Finish -->

                     </div><!-- form-group Finish -->



                     <div class="form-group"><!-- form-group Begin -->

                        <label class="col-md-3 control-label"> User Address </label>

                        <div class="col-md-6"><!-- col-md-6 Begin -->

                            <input name="user_address" type="text" class="form-control" required>

                        </div><!-- col-md-6 Finish -->

                     </div><!-- form-group Finish -->

                     <div class="form-group"><!-- form-group Begin -->

                        <label class="col-md-3 control-label"> user Phone No: </label>

                        <div class="col-md-6"><!-- col-md-6 Begin -->

                            <input name="user_phno" type="text" class="form-control" required>

                        </div><!-- col-md-6 Finish -->

                     </div><!-- form-group Finish -->



                     <div class="form-group"><!-- form-group Begin -->

                        <label class="col-md-3 control-label"></label>

                        <div class="col-md-6"><!-- col-md-6 Begin -->

                            <input name="submit" value="Add User" type="submit" class="btn btn-primary form-control">

                        </div><!-- col-md-6 Finish -->

                     </div><!-- form-group Finish -->

                 </form><!-- form-horizontal Finish -->

             </div><!-- panel-body Finish -->

          </div><!-- canel panel-default Finish -->

      </div><!-- col-lg-12 Finish -->

  </div><!-- row Finish -->

      <script src="js/jquery-331.min.js"></script>
      <script src="js/bootstrap-337.min.js"></script>
      <script src="js/tinymce/tinymce.min.js"></script>
      <script>tinymce.init({ selector:'textarea'});</script>
  </body>
  </html>



  <?php

  function resizeImage($resourceType,$image_width,$image_height){
    $resizeWidth = 200;
    $resizeHeight = 200;

    $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
    imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight,$image_width,$image_height);
    return $imageLayer;
  }

  if(isset($_POST['submit'])){
    $imageProcess = 0;
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_phno = $_POST['user_phno'];
    $user_address = $_POST['user_address'];
    if(is_array($_FILES)){
      $fileName = $_FILES['user_images']['tmp_name'];
      $sourceProperties = getimagesize($fileName);
      $resizeFileName = time();
      $uploadPath = "../customer/customer_images/";
      $fileExt = pathinfo($_FILES['u_image']['name'], PATHINFO_EXTENSION);
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
          echo "<script>window.open('index.php?view_user','_self')</script>";
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
                echo "<script>alert('User Successfully Added!')</script>";
                echo "<script>window.open('index.php?view_user','_self')</script>";
              }
          }
        }
    ?>



<?php } ?>
