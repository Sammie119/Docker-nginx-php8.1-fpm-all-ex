<?php
include '../include/connect.php';
ob_start();
session_start();
?>

<?php

$func = $_GET['func'];

switch ($func) {
	case 'paid':
		$index_no = $_POST['index_no'];

        $module = 'TAC0000/00';
        $view_amount = '0.00';

     /*   $qry="SELECT module, year FROM students_modules WHERE index_no = '$index_no'";
        $i = 0;
        if ($view_all_query_run = mysqli_query($conn, $qry)){
            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                $view_module = $view_all_query_row['module'];
                $view_year = $view_all_query_row['year'];
                
                $i +=1;  

                $module =  $view_module."/". $view_year;
            }

            
        }

		*/

    	$qry1="SELECT SUM(amount) AS amount FROM fees_episode WHERE index_no = '$index_no'";
        $i = 0;

        

        if ($view_all_query_run = mysqli_query($conn, $qry1)){
            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                $view_amount = $view_all_query_row['amount'];
                
                $i +=1;
                
            }

                if ($view_amount != '') {
                    echo $view_amount;
                } 
                 else{
                    echo "0.00";
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