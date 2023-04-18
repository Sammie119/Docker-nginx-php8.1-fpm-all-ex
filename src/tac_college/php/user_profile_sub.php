<?php
//Start session
  ob_start();
  session_start();
 
  //Include database connection details
  require '../include/connect.php';

  $f_name = $_POST['f_name'];
  $s_name = $_POST['s_name'];
  $position = $_POST['position'];
  $mobile = $_POST['mobile'];
  $username = $_POST['username'];
  $old_pass = $_POST['old_pass'];
  $new_pass = $_POST['new_pass'];
  
  

  $userID = $_SESSION['SESS_MEMBER_ID'];

  $qry="SELECT * FROM user WHERE user_Id = '$userID' AND password=PASSWORD('$old_pass')";
  $result=mysqli_query($conn, $qry);
 
  //Check whether the query was successful or not
  if($result) {
    if(mysqli_num_rows($result) > 0) {          
     
      mysqli_query($conn, "UPDATE tac_college.user SET user_fname =  '$f_name', user_sname =  '$s_name', user_telno =  '$mobile', user_position =  '$position', username = '$username', password = PASSWORD('$new_pass') WHERE user_Id = '$userID'");

      echo "<script type='text/javascript'>
          alert('User Profile Update Successful');
          window.location = '../user_profile.php';
    </script>";
      
      exit();
    }else {
      
      //Login failed
    echo "<script type='text/javascript'>
          alert('Old Password is Wrong');
          window.location = '../user_profile.php';
    </script>";
    }
  }

        
  ?>