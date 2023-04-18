<?php
include '../include/connect.php';
ob_start();
session_start();
?>

<?php

$func = $_GET['func'];

switch ($func) {
	case 'stock':
		$item = $_POST['item'];

    	$qry="SELECT stock FROM items WHERE item = '$item'";
        $i = 0;
        if ($view_all_query_run = mysqli_query($conn, $qry)){
            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                $view_stock = $view_all_query_row['stock'];
                
                $i +=1;

                echo $view_stock;
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