<?php
//Start session
  session_start();
 
  //Include database connection details
  require '../include/connect.php';


  //Sanitize the POST values
  $username = $_POST['username'];
  $password = $_POST['password'];
 
  //Input Validations
  if($username == "") {
    $message = "Please Enter Your Username";
    echo "<script type='text/javascript'>
          alert('$message');
          window.location = '../index.html';
    </script>";

  }
  if($password == "") {
    $message = "Please Enter Your Password";
    echo "<script type='text/javascript'>
          alert('$message');
          window.location = '../index.html';
    </script>";
  }
 
   
  //Create query
  $qry="SELECT * FROM user WHERE username='$username' AND password=PASSWORD('$password') AND active = 'Yes'";
  $result=mysqli_query($conn, $qry);
 
  //Check whether the query was successful or not
  if($result) {
    if(mysqli_num_rows($result) > 0) {
     
      //Login Successful
      session_regenerate_id();
      $member = mysqli_fetch_assoc($result);
      $_SESSION['SESS_MEMBER_ID'] = $member['user_Id'];
      $_SESSION['SESS_USERNAME'] = $member['username'];
      $_SESSION['ROLE'] = $member['user_position'];

      session_write_close();

      header("location: ../dashboard.php");
      
      exit();
    }else {
      
      //Login failed
    echo "<script type='text/javascript'>
          alert('Wrong Username or Password');
          window.location = '../index.html';
    </script>";
    }
  }else {
    die("Query failed");
  }
?>