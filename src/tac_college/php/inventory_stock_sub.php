<?php
//Start session
  ob_start();
  session_start();
 
  //Include database connection details
  require '../include/connect.php';

 
  //Sanitize the POST values
  $item = $_POST['item'];
  $re_stock = $_POST['re_stock'];
  
  
  $takbak = '../inventory_stock.php';

 
  $insert = "UPDATE tac_college.items SET  stock =  stock + '$re_stock' WHERE  item = '$item'";

    if( $insert_query_run = mysqli_query($conn, $insert)){
      
              echo "<meta http-equiv='refresh' content='0;URL=$takbak'>";
             
              echo "<script type='text/javascript'>
                    alert('STOCK OF $item UPDATED SUCCESSFULLY');
                    </script>";
            }
              
                  
    else{echo 'There is a mistake in adding this member';
        echo mysqli_error($conn);
            }
?>