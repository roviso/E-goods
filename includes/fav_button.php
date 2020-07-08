<?php

$con = mysqli_connect("localhost","root","","ongo");

if(!isset($_SESSION['user_email'])){

echo "<a class='btn btn-primary' href='login.php'>

     <i class='fa fa-heart'></i> Add To Favourite

 </a>";


}elseif($user_id == $g_owner){
  echo "<a class='btn btn-primary' href='customer/my_account.php?edit_post=$goods_id'>

       <i class='fa fa-edit'></i> Edit Info

   </a>";


}else{

  $check_fav = "select * from favourites where user_id = '$user_id'";
  $run_fav = mysqli_query($con,$check_fav);
  $x = 0;
  while($row_fav=mysqli_fetch_array($run_fav)){

      $fav_good_id = $row_fav['good_id'];

   if($goods_id == $fav_good_id){
     $x++;
     echo "
         <i class='fa fa-check'></i> Added to Favourite
     ";

   }
 }
 if($x == 0){
   echo "<a class='btn btn-primary' href='add_fav.php?pro_id=$goods_id'>
        <i class='fa fa-heart'></i> Add To Favourite
    </a>";



 }


}

?>
