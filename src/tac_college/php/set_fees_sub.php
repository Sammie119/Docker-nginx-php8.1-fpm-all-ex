<?php
//Start session
  ob_start();
  session_start();
 
  //Include database connection details
  require '../include/connect.php';


  $module = $_POST['module'];
  $yr = $_POST['yr'];
  $amount = $_POST['amount'];

  $module_yr = $module."/".$yr;
  
  $takbak = '../set_fees.php';

 
  $insert = "INSERT INTO fees VALUES (NULL,'$module_yr','$amount')";

    if( $insert_query_run = mysqli_query($conn, $insert)){
      
              echo "<meta http-equiv='refresh' content='0;URL=$takbak'>";
              echo "<script type='text/javascript'>
                    alert('FEES FOR $module $yr SUCCESSFULLY UPDATED');
                    </script>";
            }
              
                  
    else{echo 'There is a mistake in adding this member';
        echo mysqli_error($conn);
            }
?>