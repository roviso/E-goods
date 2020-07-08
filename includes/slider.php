<div class="container" id="slider"><!-- container begins-->
      <div class="col-md-12"><!-- col-md-12 begins-->
      <div class="carousel slide" id="myCarousel" data-ride="carousel"><!-- carousel slide begins-->
        <ol class="carousel-indicators"><!-- carousel-indicators begins-->

          <li class = "active" data-target="#myCarousel" data-slide-to="0"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
          <li data-target="#myCarousel" data-slide-to="3"></li>

        </ol><!-- carousel-indicators ends-->

        <div class="carousel-inner"><!-- carousel-inner begins-->
        <?php

        $get_slides = "select * from slider LIMIT 0,1";
        $run_slides = mysqli_query($con,$get_slides);

        while($row_slides=mysqli_fetch_array($run_slides)){
          $slide_name = $row_slides['slide_name'];
          $slide_image = $row_slides['slide_image'];

          echo"
          <div class = 'item active'>
          <img src = 'admin_area/slides_images/$slide_image'>

          </div>

          ";
        }

        $get_slides = "select * from slider LIMIT 1,3";
        $run_slides = mysqli_query($con,$get_slides);

        while($row_slides=mysqli_fetch_array($run_slides)){
          $slide_name = $row_slides['slide_name'];
          $slide_image = $row_slides['slide_image'];

          echo"
          <div class = 'item'>
          <img src = 'admin_area/slides_images/$slide_image'>
          </div>

          ";
        }
         ?>


        </div><!-- carousel-inner ends-->

        <a href="#myCarousel" class="left carousel-control" data-slide="prev">

          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a href="#myCarousel" class="right carousel-control" data-slide="next">

          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>

      </div><!-- carousel slide ends-->

    </div><!-- col-md-12 ends-->

    </div><!-- container ends-->
