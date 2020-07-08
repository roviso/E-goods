<?php
$active='Home';
include("includes/header.php");

 ?>
  <div id="hot"><!-- hot begins-->
    <div class="box"><!-- box begins-->
      <div class="container"><!-- container begins-->
        <div class="col-md-12"><!-- col-md-12 begins-->
          <h2>
              New Goods Available
          </h2>
        </div><!-- col-md-12 ends-->
      </div><!-- container ends-->
    </div><!-- box ends-->
  </div><!-- hot ends-->

   <div id="content" class="container"><!-- container Begin -->
     <div class="row"><!-- row begins-->


       <?php
       getgoods();
       ?>


     </div><!-- row ends-->

  </div>



  <div id="hot"><!-- hot begins-->
    <div class="box"><!-- box begins-->
      <div class="container"><!-- container begins-->
        <div class="col-md-12"><!-- col-md-12 begins-->
          <h2>
              New Cloths Available
          </h2>
        </div><!-- col-md-12 ends-->
      </div><!-- container ends-->
    </div><!-- box ends-->
  </div><!-- hot ends-->

   <div id="content" class="container"><!-- container Begin -->
     <div class="row"><!-- row begins-->


       <?php
       getcloths();
       ?>


     </div><!-- row ends-->

  </div>



    <div id="hot"><!-- hot begins-->
      <div class="box"><!-- box begins-->
        <div class="container"><!-- container begins-->
          <div class="col-md-12"><!-- col-md-12 begins-->
            <h2>
                New Accessories Available
            </h2>
          </div><!-- col-md-12 ends-->
        </div><!-- container ends-->
      </div><!-- box ends-->
    </div><!-- hot ends-->

     <div id="content" class="container"><!-- container Begin -->
       <div class="row"><!-- row begins-->


         <?php
         getaccessories();
         ?>


       </div><!-- row ends-->

    </div>



  <?php

  include("includes/footer.php");

  ?>


  <script src ="js/jquery-331.min.js"></script>
  <script src ="js/bootstrap-337.min.js"></script>


  </body>
</html>
