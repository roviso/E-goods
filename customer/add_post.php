
<div class="row"><!-- row Begin -->

    <div class="col-lg-12"><!-- col-lg-12 Begin -->

        <div class="panel panel-default"><!-- panel panel-default Begin -->

           <div class="panel-heading"><!-- panel panel-default Begin -->

               <h3 class="panel-title"><!-- panel-title Begin -->

                   <i class="fa fa-plus-circle"></i> Insert goods

               </h3><!-- panel-title Finish -->

           </div> <!-- canel panel-default Finish -->

           <div class="panel-body"><!-- panel-body Begin -->

               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> good's Title </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="good_title" type="text" class="form-control" required>

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->


                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> good's Category </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <select name="good_cat" class="form-control"><!-- form-control Begin -->

                              <option> Select a good's Category  </option>

                              <?php

                              $get_g_cats = "select * from good_categories";
                              $run_g_cats = mysqli_query($con,$get_g_cats);

                              while ($row_g_cats=mysqli_fetch_array($run_g_cats)){

                                  $g_cat_id = $row_g_cats['g_cat_id'];
                                  $g_cat_title = $row_g_cats['g_cat_title'];

                                  echo "

                                  <option value='$g_cat_id'> $g_cat_title </option>

                                  ";

                              }

                              ?>

                          </select><!-- form-control Finish -->

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->



                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> good's Image 1 </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="good_img1" type="file" class="form-control" required>

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> good's Image 2 </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="good_img2" type="file" class="form-control" required>

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> good's Image 3 </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="good_img3" type="file" class="form-control form-height-custom" required>

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> good's Price </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="good_price" type="text" class="form-control" required>

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> good's Keywords </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="good_keywords" type="text" class="form-control" required>

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Description </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <textarea name="good_desc" cols="19" rows="6" class="form-control"></textarea>

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"></label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="submit" value="Insert good" type="submit" class="btn btn-primary form-control">

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
  $resizeWidth = 480;
  $resizeHeight = 508;

  $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
  imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight,$image_width,$image_height);
  return $imageLayer;
}



if(isset($_POST['submit'])){
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


      $insert_good = "insert into goods
      (owner_id,good_cat,date,good_title,good_img1,good_img2,good_img3,good_price,good_keywords,good_desc)
      values ('$user_id','$good_cat',NOW(),'$good_title','domi_$resizeFileName1.$fileExt1','domi_$resizeFileName2.$fileExt2','domi_$resizeFileName3.$fileExt3','$good_price','$good_keywords','$good_desc')";

      $run_good = mysqli_query($con,$insert_good);
      if($run_good){
        echo"<<script>
          alert('good has been inserted')
        </script>";
        echo"<<script>
          window.open('my_account.php','_self')
        </script>";


    }
  }
  $imageProcess = 0;
}



?>
