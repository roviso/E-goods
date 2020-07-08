<?php

$db = mysqli_connect("localhost","root","","ongo");


funtion update_profile_img(){
  if(isset($_POST['update'])){

    $user_name = $_POST['u_name'];
    $user_phno = $_POST['u_phno'];
    $user_address = $_POST['u_address'];
    $user_img = $_FILES['u_images']['name'];
    $user_img_tmp = $_FILES['u_images']['tmp_name'];
    if(!move_uploaded_file($_FILES['u_images']['tmp_name'],"customer_images/$user_img")){
      echo"<<script>
        alert('Please choose another picture')
      </script>";
    }else{

        $update_user = "UPDATE users
        set user_name = '$user_name',
        user_password = '$user_password',
        user_address = '$user_password',
        user_phno = '$user_phno',
        user_image = '$user_img'
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
    }
}
?>
