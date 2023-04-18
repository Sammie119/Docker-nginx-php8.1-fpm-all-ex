<?php
include '../include/connect.php';
ob_start();
session_start();
?>

<?php

$func = $_GET['func'];

switch ($func) {
	case 'module':
		$index_no = $_POST['index_no'];

		

    	$qry="SELECT module, year FROM students_modules WHERE index_no = '$index_no'";
        $i = 0;
        if ($view_all_query_run = mysqli_query($conn, $qry)){
            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                $view_module = $view_all_query_row['module'];
                $view_year = $view_all_query_row['year'];
                
                $i +=1;
                echo $view_module."/". $view_year;
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