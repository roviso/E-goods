<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{

?>



<?php

    if(isset($_GET['edit_profile'])){

      $admin_id =  $_GET['edit_profile'];

$get_info = "select * from admins where admin_id = '$admin_id'";
$info_query = mysqli_query($con,$get_info);
$info_fetch=mysqli_fetch_array($info_query);

$admin_email = $info_fetch['admin_email'];

$admin_name = $info_fetch['admin_name'];

$admin_img1 = $info_fetch['admin_image'];

$admin_address = $info_fetch['admin_address'];

$admin_phno = $info_fetch['admin_phno'];
}
if($admin_email == $_SESSION['admin_email']){
?>


<div class="row"><!-- row Begin -->

    <div class="col-lg-12"><!-- col-lg-12 Begin -->

        <ol class="breadcrumb"><!-- breadcrumb Begin -->

            <li class="active"><!-- active Begin -->

                <i class="fa fa-dashboard"></i> Dashboard / Edit admin

            </li><!-- active Finish -->

        </ol><!-- breadcrumb Finish -->

    </div><!-- col-lg-12 Finish -->

</div><!-- row Finish -->

<div class="row"><!-- row Begin -->

    <div class="col-lg-12"><!-- col-lg-12 Begin -->

        <div class="panel panel-default"><!-- panel panel-default Begin -->

           <div class="panel-heading"><!-- panel-heading Begin -->

               <h3 class="panel-title"><!-- panel-title Begin -->

                   <i class="fa fa-edit fa-fw"></i> Edit admin Info

               </h3><!-- panel-title Finish -->

           </div> <!-- panel-heading Finish -->

           <div class="panel-body"><!-- panel-body Begin -->

               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> admin Name </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="u_name" type="text" class="form-control" required value="<?php echo $admin_name; ?>">

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->




                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> admin Image </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="admin_image" type="file" class="form-control" required>

                          <br>

                          <img width="70" height="70" src="./admin_images/<?php echo $admin_img1; ?>" alt="<?php echo $admin_img1; ?>">

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->





                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> admin Address </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="u_address" type="text" class="form-control" required value="<?php echo $admin_address; ?>">

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->


                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> admin Contact </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="u_phno" type="number" class="form-control" required value="<?php echo $admin_phno; ?>">

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
  $admin_name_updated = $_POST['u_name'];
  $admin_phno_updated = $_POST['u_phno'];
  $admin_address_updated = $_POST['u_address'];
  if(is_array($_FILES)){
    $fileName = $_FILES['admin_image']['tmp_name'];
    $sourceProperties = getimagesize($fileName);
    $resizeFileName = time();
    $uploadPath = "./admin_images/";
    $fileExt = pathinfo($_FILES['admin_image']['name'], PATHINFO_EXTENSION);
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

      $update_admin = "UPDATE admins
      set admin_name = '$admin_name_updated',
      admin_address = '$admin_address_updated',
      admin_phno = '$admin_phno_updated',
      admin_image = 'thump_$resizeFileName.$fileExt'
      WHERE admin_id = '$admin_id' ";

      $run_update = mysqli_query($con,$update_admin);

      if($run_update){
        echo"<<script>
          alert('admin information has been updated.')
        </script>";
        echo"<<script>
          window.open('index.php?view_admin','_self')
        </script>";


    }
  }
  $imageProcess = 0;
}
}
else{
  echo "<script>window.open('index.php?dashboard','_self')</script>";

}

?>
<?php } ?>
