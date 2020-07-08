
<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{

?>



<?php

    if(isset($_GET['edit_user'])){
      $user_id =  $_GET['edit_user'];

$get_info = "select * from users where user_id = '$user_id'";
$info_query = mysqli_query($con,$get_info);
$info_fetch=mysqli_fetch_array($info_query);

$user_email = $info_fetch['user_email'];

$user_password = $info_fetch['user_password'];

$user_name = $info_fetch['user_name'];

$user_img1 = $info_fetch['user_image'];

$user_address = $info_fetch['user_address'];

$user_phno = $info_fetch['user_phno'];
}
?>


<div class="row"><!-- row Begin -->

    <div class="col-lg-12"><!-- col-lg-12 Begin -->

        <ol class="breadcrumb"><!-- breadcrumb Begin -->

            <li class="active"><!-- active Begin -->

                <i class="fa fa-dashboard"></i> Dashboard / Edit User

            </li><!-- active Finish -->

        </ol><!-- breadcrumb Finish -->

    </div><!-- col-lg-12 Finish -->

</div><!-- row Finish -->

<div class="row"><!-- row Begin -->

    <div class="col-lg-12"><!-- col-lg-12 Begin -->

        <div class="panel panel-default"><!-- panel panel-default Begin -->

           <div class="panel-heading"><!-- panel-heading Begin -->

               <h3 class="panel-title"><!-- panel-title Begin -->

                   <i class="fa fa-edit fa-fw"></i> Edit User Info

               </h3><!-- panel-title Finish -->

           </div> <!-- panel-heading Finish -->

           <div class="panel-body"><!-- panel-body Begin -->

               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> User Name </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="u_name" type="text" class="form-control" required value="<?php echo $user_name; ?>">

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->


                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Email </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="u_email" type="text" class="form-control" required value="<?php echo $user_email; ?>">

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->


                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> New Password: </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="u_password" type="text" class="form-control" required value="<?php echo $user_password; ?>">

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->


                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> User Image </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="user_image" type="file" class="form-control" required>

                          <br>

                          <img width="70" height="70" src="../customer/customer_images/<?php echo $user_img1; ?>" alt="<?php echo $user_img1; ?>">

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->





                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> User Address </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="u_address" type="text" class="form-control" required value="<?php echo $user_address; ?>">

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->


                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> User Contact </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="u_phno" type="number" class="form-control" required value="<?php echo $user_phno; ?>">

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->



                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"></label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="update" value="Update Post" type="submit" class="btn btn-primary form-control">

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

               </form><!-- form-horizontal Finish -->

           </div><!-- panel-body Finish -->

        </div><!-- canel panel-default Finish -->

    </div><!-- col-lg-12 Finish -->

</div><!-- row Finish -->

<?php

function resizeImage($resourceType,$image_width,$image_height){
  $resizeWidth = 200;
  $resizeHeight = 200;

  $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
  imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight,$image_width,$image_height);
  return $imageLayer;
}

if(isset($_POST['update'])){
  $imageProcess = 0;
  $user_name_updated = $_POST['u_name'];
  $user_email_updated = $_POST['u_email'];
  $user_password_updated = $_POST['u_password'];
  $user_phno_updated = $_POST['u_phno'];
  $user_address_updated = $_POST['u_address'];
  if(is_array($_FILES)){
    $fileName = $_FILES['user_image']['tmp_name'];
    $sourceProperties = getimagesize($fileName);
    $resizeFileName = time();
    $uploadPath = "../customer/customer_images/";
    $fileExt = pathinfo($_FILES['user_image']['name'], PATHINFO_EXTENSION);
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
    if(move_uploaded_file($fileName,$uploadPath. $resizeFileName.".".$fileExt)){
      $imageProcess = 1;
    }
  }

  if($imageProcess == 0){
    echo"<<script>
      alert('Please choose another picture')
    </script>";
  }else{

      $update_user = "UPDATE users
      set user_name = '$user_name_updated',
      user_email = '$user_email_updated',
      user_password = '$user_password_updated',
      user_address = '$user_address_updated',
      user_phno = '$user_phno_updated',
      user_image = 'thump_$resizeFileName.$fileExt'
      WHERE user_id = '$user_id' ";

      $run_update = mysqli_query($con,$update_user);

      if($run_update){
        echo"<<script>
          alert('User information has been updated.')
        </script>";
        echo"<<script>
          window.open('index.php?view_user','_self')
        </script>";


    }
  }
  $imageProcess = 0;
}

?>
<?php } ?>
