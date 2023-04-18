<?php
include '../include/connect.php';
ob_start();
session_start();
?>

<?php

$func = $_GET['func'];

switch ($func) {
	case 'module_fee':
		$index_no = $_POST['index_no'];


        $qry="SELECT SUM(fees) AS fees FROM balance_episode, fees 
                WHERE fees.module_yr = balance_episode.module_yr 
                AND index_no = '$index_no'";
        $i = 0;

        $view_sem = 1;
        

        if ($view_all_query_sem = mysqli_query($conn, $qry)){
        
            while ($view_all_query_seme = mysqli_fetch_assoc($view_all_query_sem)){
                //$module_yr = $view_all_query_seme['module_yr'];
                $fees = $view_all_query_seme['fees'];
                
                $i +=1;

                echo $fees;
                
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