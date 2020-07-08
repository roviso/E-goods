<?php

    if(!isset($_SESSION['user_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{

?>

<?php

    if(isset($_GET['edit_post'])){

        $edit_id = $_GET['edit_post'];

        $get_g = "select * from goods where good_id = '$edit_id'";

        $run_edit = mysqli_query($con,$get_g);

        $row_edit = mysqli_fetch_array($run_edit);

        $p_id = $row_edit['good_id'];

        $owner_id = $row_edit['owner_id'];

        $p_title = $row_edit['good_title'];

        $p_cat = $row_edit['good_cat'];

        $p_image1 = $row_edit['good_img1'];

        $p_image2 = $row_edit['good_img2'];

        $p_image3 = $row_edit['good_img3'];

        $p_price = $row_edit['good_price'];

        $p_keywords = $row_edit['good_keywords'];

        $p_desc = $row_edit['good_desc'];


        $get_p_cat = "select * from good_categories where g_cat_id ='$p_cat'";

        $run_p_cat = mysqli_query($con,$get_p_cat);

        $row_p_cat = mysqli_fetch_array($run_p_cat);

        $p_cat_title = $row_p_cat['g_cat_title'];
}


?>

<div class="col-sm-6"><!-- col-sm-6 Begin -->
    <div id="mainImage"><!-- #mainImage Begin -->
        <div id="myCarousel" class="carousel slide" data-ride="carousel"><!-- carousel slide Begin -->
            <ol class="carousel-indicators"><!-- carousel-indicators Begin -->
                <li data-target="#myCarousel" data-slide-to="0" class="active" ></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol><!-- carousel-indicators Finish -->
<div class='product same-height'>
            <div class="carousel-inner">

                <div class="item active">
                    <center><img class="img-responsive" src="../admin_area/product_images/<?php echo $p_image1; ?>" alt="good 3-a" width="400" height="400"></center>
                </div>

                <div class="item">
                    <center><img class="img-responsive" src="../admin_area/product_images/<?php echo $p_image2; ?>" alt="good 3-b" width="400" height="400"></center>
                </div>
                <div class="item">
                    <center><img class="img-responsive" src="../admin_area/product_images/<?php echo $p_image3; ?>" alt="good 3-c" width="400" height="400"></center>
                </div>

            </div>

</div>
            <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Begin -->
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a><!-- left carousel-control Finish -->

            <a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- right carousel-control Begin -->
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Previous</span>
            </a><!-- right carousel-control Finish -->

        </div><!-- carousel slide Finish -->
    </div><!-- mainImage Finish -->
</div><!-- col-sm-6 Finish -->

<div class="row" ><!-- row Begin -->


    <div class="col-lg-12"><!-- col-lg-12 Begin -->

        <div class="panel panel-default"><!-- panel panel-default Begin -->


           <div class="panel-body"><!-- panel-body Begin -->

               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> good Title </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="good_title" type="text" class="form-control" required value="<?php echo $p_title; ?>">

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> good Category </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <select name="good_cat" class="form-control"><!-- form-control Begin -->

                              <option value="<?php echo $p_cat; ?>"> <?php echo $p_cat_title; ?> </option>

                              <?php

                              $get_p_cats = "select * from good_categories";
                              $run_p_cats = mysqli_query($con,$get_p_cats);

                              while ($row_p_cats=mysqli_fetch_array($run_p_cats)){

                                  $p_cat_id = $row_p_cats['g_cat_id'];
                                  $p_cat_title = $row_p_cats['g_cat_title'];

                                  echo "

                                  <option value='$p_cat_id'> $p_cat_title </option>

                                  ";

                              }

                              ?>

                          </select><!-- form-control Finish -->

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->


                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> good Image 1 </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="good_img1" type="file" class="form-control" required>

                          <br>

                          <img width="70" height="70" src="../admin_area/product_images/<?php echo $p_image1; ?>" alt="<?php echo $p_image1; ?>">

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> good Image 2 </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="good_img2" type="file" class="form-control">

                          <br>

                          <img width="70" height="70" src="../admin_area/product_images/<?php echo $p_image2; ?>" alt="<?php echo $p_image2; ?>">

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> good Image 3 </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="good_img3" type="file" class="form-control form-height-custom">

                          <br>

                          <img width="70" height="70" src="../admin_area/product_images/<?php echo $p_image3; ?>" alt="<?php echo $p_image3; ?>">

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> good Price </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="good_price" type="text" class="form-control" required value="<?php echo $p_price; ?>">

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> good Keywords </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="good_keywords" type="text" class="form-control" required value="<?php echo $p_keywords; ?>">

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> good Desc </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <textarea name="good_desc" cols="19" rows="6" class="form-control">

                              <?php echo $p_desc; ?>

                          </textarea>

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

    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>
</body>
</html>


<?php

function resizeImage($resourceType,$image_width,$image_height){
  $resizeWidth = 480;
  $resizeHeight = 508;

  $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
  imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight,$image_width,$image_height);
  return $imageLayer;
}



if(isset($_POST['update'])){
  $imageProcess = 0;
  $good_title = $_POST['good_title'];
  $good_cat = $_POST['good_cat'];
  $good_price = $_POST['good_price'];
  $good_keywords = $_POST['good_keywords'];
  $good_desc = $_POST['good_desc'];


  if(is_array($_FILES)){

    $uploadPath = "../admin_area/product_images/";

    $fileName1 = $_FILES['good_img1']['tmp_name'];
    $sourceProperties1 = getimagesize($fileName1);
    $resizeFileName1 = time() + 0 ;
    $fileExt1 = pathinfo($_FILES['good_img1']['name'], PATHINFO_EXTENSION);

    $sourceImageWidth1 = $sourceProperties1[0];
    $sourceImageHeight1 = $sourceProperties1[1];
    $uploadImageType1 = $sourceProperties1[2];

    switch ($uploadImageType1) {
      case IMAGETYPE_JPEG:
        $resourceType1 = imagecreatefromjpeg($fileName1);
        $imageLayer1 = resizeImage($resourceType1,$sourceImageWidth1,$sourceImageHeight1);
        imagejpeg($imageLayer1,$uploadPath."domi_".$resizeFileName1.'.'.$fileExt1);
        break;

      case IMAGETYPE_GIF:
      $resourceType1 = imagecreatefromgif($fileName1);
      $imageLayer1 = resizeImage($resourceType1,$sourceImageWidth1,$sourceImageHeight1);
      imagegif($imageLayer1,$uploadPath."domi_".$resizeFileName1.'.'.$fileExt1);
      break;

      case IMAGETYPE_PNG:
      $resourceType1 = imagecreatefrompng($fileName1);
      $imageLayer1 = resizeImage($resourceType1,$sourceImageWidth1,$sourceImageHeight1);
      imagepng($imageLayer1,$uploadPath."domi_".$resizeFileName1.'.'.$fileExt1);
      break;

      default:
        $imageProcess = 0;
        break;
    }
    $fileName2 = $_FILES['good_img2']['tmp_name'];
    $sourceProperties2 = getimagesize($fileName2);
    $resizeFileName2 = time() + 1 ;
    $fileExt2 = pathinfo($_FILES['good_img2']['name'], PATHINFO_EXTENSION);



    $fileName3 = $_FILES['good_img3']['tmp_name'];
    $sourceProperties3 = getimagesize($fileName3);
    $resizeFileName3 = time() + 2 ;
    $fileExt3 = pathinfo($_FILES['good_img3']['name'], PATHINFO_EXTENSION);



    $sourceImageWidth2 = $sourceProperties2[0];
    $sourceImageHeight2 = $sourceProperties2[1];
    $uploadImageType2 = $sourceProperties2[2];

    $sourceImageWidth3 = $sourceProperties3[0];
    $sourceImageHeight3 = $sourceProperties3[1];
    $uploadImageType3 = $sourceProperties3[2];


    switch ($uploadImageType2) {
      case IMAGETYPE_JPEG:
        $resourceType2 = imagecreatefromjpeg($fileName2);
        $imageLayer2 = resizeImage($resourceType2,$sourceImageWidth2,$sourceImageHeight2);
        imagejpeg($imageLayer2,$uploadPath."domi_".$resizeFileName2.'.'.$fileExt2);
        break;

      case IMAGETYPE_GIF:
      $resourceType2 = imagecreatefromgif($fileName2);
      $imageLayer2 = resizeImage($resourceType2,$sourceImageWidth2,$sourceImageHeight2);
      imagegif($imageLayer2,$uploadPath."domi_".$resizeFileName2.'.'.$fileExt2);

      break;

      case IMAGETYPE_PNG:
      $resourceType2 = imagecreatefrompng($fileName2);
      $imageLayer2 = resizeImage($resourceType2,$sourceImageWidth2,$sourceImageHeight2);
      imagepng($imageLayer2,$uploadPath."domi_".$resizeFileName2.'.'.$fileExt2);
      break;

      default:
        $imageProcess = 0;
        break;
    }

    switch ($uploadImageType3) {
      case IMAGETYPE_JPEG:
        $resourceType3 = imagecreatefromjpeg($fileName3);
        $imageLayer3 = resizeImage($resourceType3,$sourceImageWidth3,$sourceImageHeight3);
        imagejpeg($imageLayer3,$uploadPath."domi_".$resizeFileName3.'.'.$fileExt3);
        break;

      case IMAGETYPE_GIF:
      $resourceType3 = imagecreatefromgif($fileName3);
      $imageLayer3 = resizeImage($resourceType3,$sourceImageWidth3,$sourceImageHeight3);
      imagegif($imageLayer3,$uploadPath."domi_".$resizeFileName3.'.'.$fileExt3);

      break;

      case IMAGETYPE_PNG:
      $resourceType3 = imagecreatefrompng($fileName3);
      $imageLayer3 = resizeImage($resourceType3,$sourceImageWidth3,$sourceImageHeight3);
      imagepng($imageLayer3,$uploadPath."domi_".$resizeFileName3.'.'.$fileExt3);
      break;

      default:
        $imageProcess = 0;
        break;
    }
    if(move_uploaded_file($fileName1,$uploadPath. $resizeFileName1.".".$fileExt1) == 'TRUE' &&
        move_uploaded_file($fileName2,$uploadPath. $resizeFileName2.".".$fileExt2) == 'TRUE' &&
        move_uploaded_file($fileName3,$uploadPath. $resizeFileName3.".".$fileExt3) == 'TRUE'){
      $imageProcess = 1;
    }
  }

  if($imageProcess == 0){
    echo"<<script>
      alert('Please choose another picture')
    </script>";
  }else{
      $update_post = "update goods set
      owner_id='$owner_id',
      good_cat='$good_cat',
      date=NOW(),
      good_title='$good_title',
      good_img1='domi_$resizeFileName1.$fileExt1',
      good_img2='domi_$resizeFileName2.$fileExt2',
      good_img3='domi_$resizeFileName3.$fileExt3',
      good_keywords='$good_keywords',
      good_desc='$good_desc',
      good_price='$good_price'
      where good_id='$p_id'";
      $run_good = mysqli_query($con,$update_post);
      if($run_good){
        echo"<<script>
          alert('Post Successfuly updated!')
        </script>";
        echo"<<script>
          window.open('my_account.php?my_post','_self')
        </script>";


    }
  }
  $imageProcess = 0;
}



?>

<?php } ?>
