<?php
//Start session
  ob_start();
  session_start();
 
  //Include database connection details
  require '../include/connect.php';


  $module_from = $_POST['module_from'];
  $yr_from = $_POST['yr_from'];

  $module_to = $_POST['module_to'];
  $yr_to = $_POST['yr_to'];

  $module_year = $module_to."/".$yr_to;

  $result = mysqli_query($conn, "SELECT module FROM  students_modules WHERE sem < '5'");

            $num_rows = mysqli_num_rows($result);
  
  
  $takbak = '../promotions.php';

 
  $insert = "UPDATE tac_college.students_modules SET module = '$module_to', year = '$yr_to', module_year = '$module_year', sem = sem + 1 WHERE sem <> 6";

    if( $insert_query_run = mysqli_query($conn, $insert)){

      
              echo "<meta http-equiv='refresh' content='0;URL=$takbak'>";
              echo "<script type='text/javascript'>
                    alert('$num_rows STUDENTS PROMOTED SUCCESSFULLY TO $module_to');
                    </script>";

                    mysqli_query($conn, "UPDATE tac_college.student, tac_college.students_modules SET active =  'No' WHERE student.index_no = students_modules.index_no AND students_modules.module =  '$module_to' AND students_modules.year =  '$yr_to' AND students_modules.sem = '5'");

            }
              
                  
    else{echo 'There is a mistake in adding this member';
        echo mysqli_error($conn);
            }
?>