<?php

$con = mysqli_connect("localhost","root","","ongo");

if(isset($_SESSION['user_email'])){

if($user_id != $g_owner){

  $check_intrested = "select * from intrested where user_id = '$user_id'";
  $run_intrested = mysqli_query($con,$check_intrested);
  $x = 0;
  while($row_intrested=mysqli_fetch_array($run_intrested)){

      $intrested_good_id = $row_intrested['good_id'];

   if($goods_id == $intrested_good_id){
     $x++;
     echo "
         <i class='fa fa-check'></i> Added to intrested
     ";

   }
 }
 if($x == 0){
   echo "<a class='btn btn-primary' href='add_intrested.php?pro_id=$goods_id'>
        <i class='fa fa-heart'></i> I'm intrested
    </a>";

 }


}
}

?>
