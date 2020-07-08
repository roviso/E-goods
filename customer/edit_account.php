<?php
$get_info = "select * from users where user_email = '{$_SESSION['user_email']}'";
$info_query = mysqli_query($con,$get_info);
$info_fetch=mysqli_fetch_array($info_query);
$user_email = $info_fetch['user_email'];
$user_password = $info_fetch['user_password'];
?>


<h1 align="center">Edit My Account</h1>

<form action="my_account.php?edit_account" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Name:</label>
    <input type="text" name="u_name" class="form-control" required>
  </div>

  <div class="form-group">
    <label>Address:</label>
    <input type="text" name="u_address" class="form-control" required>
  </div>

  <div class="form-group">
    <label>Contact No:</label>
    <input type="text" name="u_phno" class="form-control" required>
  </div>

  <div class="form-group">
    <label>Profile Picture:</label>
    <input type="file" name="u_images" class="form-control" required>
  </div>

  <div class="text-center">
    <button type="submit" name="update" class="btn btn-primary">
      <i class="fa fa-user-md"></i> Update Profile

    </button>
  </div>


</form>

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
  $user_name = $_POST['u_name'];
  $user_phno = $_POST['u_phno'];
  $user_address = $_POST['u_address'];
  if(is_array($_FILES)){
    $fileName = $_FILES['u_images']['tmp_name'];
    $sourceProperties = getimagesize($fileName);
    $resizeFileName = time();
    $uploadPath = "./customer_images/";
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
      set user_name = '$user_name',
      user_password = '$user_password',
      user_address = '$user_address',
      user_phno = '$user_phno',
      user_image = 'thump_$resizeFileName.$fileExt'
      WHERE user_email = '$user_email' ";

      $run_update = mysqli_query($con,$update_user);

      if($run_update){
        echo"<<script>
          alert('Your information has been updated.')
        </script>";
        echo"<<script>
          window.open('my_account.php','_self')
        </script>";


    }
  }
  $imageProcess = 0;
}

?>
