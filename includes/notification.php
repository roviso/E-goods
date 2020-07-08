<?php

    define('DBINFO', 'mysql:host=localhost;dbname=ongo');
    define('DBUSER','root');
    define('DBPASS','');

    function fetchAll($query){
        $con = new PDO(DBINFO, DBUSER, DBPASS);
        $stmt = $con->query($query);
        return $stmt->fetchAll();
    }
    function performQuery($query){
        $con = new PDO(DBINFO, DBUSER, DBPASS);
        $stmt = $con->prepare($query);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

?>
   <div class="collapse navbar-collapse" id="navbarsExampleDefault">
     <ul class="navbar-nav mr-auto">
       <li class="nav-item dropdown">
         <a  href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Notifications

             <?php
             $query = "SELECT * from `notifications` where `status` = 'unread' AND `owner_id` = ".$user_id." order by `date` DESC";
             if(count(fetchAll($query))>0){
             ?>
             <span class="badge badge-light"><?php echo count(fetchAll($query)); ?></span>
           <?php
             }
                 ?>
           </a>

         <div class="dropdown-menu aria-labelledby="dropdown01">




             <?php
             $query = "SELECT * from `notifications` where `status` = 'unread' AND `owner_id` = ".$user_id." order by `date` DESC";
              if(count(fetchAll($query))>0){
                  foreach(fetchAll($query) as $i){
                    $user_id_fetch = $i['user_id'];
                    $good_id_fetch = $i['good_id'];

                    $query = "SELECT * from users where user_id = '$user_id_fetch'";
                    $info_query = mysqli_query($con,$query);
                    $info_fetch=mysqli_fetch_array($info_query);
                    $u_name = $info_fetch['user_name'];


                    $p_query = "SELECT * from goods where good_id = '$good_id_fetch'";
                    $p_info_query = mysqli_query($con,$p_query);
                    $p_info_fetch=mysqli_fetch_array($p_info_query);
                    $p_name = $p_info_fetch['good_title'];

             ?>
           <a style ="
                      <?php
                         if($i['status']=='unread'){
                             echo "font-weight:bold;";
                         }
                      ?>
                      " class="dropdown-item text-dark" href="view.php?id=<?php echo $i['notification_id'] ?>">
             <small class="badge badge-light"><i><?php echo date('F j, Y, g:i a',strtotime($i['date'])) ?></i></small><br/>
               <?php

             if($i['type']=='comment'){
                 echo "<small class='badge badge-light'> Someone commented on your post.</small>";
             }else if($i['type']=='intrested'){
               echo "<small class='badge badge-light'>
                 $u_name .'Is intrested in your'.

                  $p_name </small>";
             }

               ?>
             </a>
           <div class="dropdown-divider"></div>
             <?php
                  }
              }else{
                  echo "<small class='badge badge-light'> No Records yet.</small>";
              }
                  ?>
         </div>

       </li>
     </ul>



   </div>
