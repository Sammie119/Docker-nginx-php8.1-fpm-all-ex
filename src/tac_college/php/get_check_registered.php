<?php
include '../include/connect.php';
ob_start();
session_start();
?>

<?php

$func = $_GET['func'];

switch ($func) {
	case 'paid':
		$module_yr = $_POST['module_yr'];

        $index_no = $_GET['index_no'];

    	$qry1="SELECT COUNT(balID) AS reg FROM balance_episode WHERE index_no = '$index_no' AND module_yr = '$module_yr'";
        $i = 0;

        

        if ($view_all_query_run = mysqli_query($conn, $qry1)){
            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                $reg = $view_all_query_row['reg'];
                
                $i +=1;
                
            }

                if ($reg < 1) {
                    echo '<script type="text/javascript">
                        alert("Student is not registered for selected Module!!!");
                        document.getElementById("index_no").value = "";
                        document.getElementById("index_no").focus();
                        document.location.reload(true);
                     </script>
                     '; 
                } else {
                    return false;
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