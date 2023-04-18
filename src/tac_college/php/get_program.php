<?php
include '../include/connect.php';
ob_start();
session_start();
?>

<?php

$func = $_GET['func'];

switch ($func) {
	case 'program':
		$index_no = $_POST['index_no'];

        
        $qry="SELECT program FROM programs, students_modules WHERE index_no = '$index_no' AND programs.programID = students_modules.programID";
        $i = 0;
        if ($view_all_query_run = mysqli_query($conn, $qry)){
            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                $view_program = $view_all_query_row['program'];
                
                
                $i +=1;  

                echo $view_program;
               
            }

            
        }

        break;

        default:
		echo '<script type="text/javascript">
            alert("Wrong Index Number");

         </script>
         ';
		break;
    }
?>  