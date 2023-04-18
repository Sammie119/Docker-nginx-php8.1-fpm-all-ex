<?php
include '../include/connect.php';
ob_start();
session_start();
?>

<?php

$func = $_GET['func'];

switch ($func) {
	case 'name':
		$index_no = $_POST['index_no'];

		

    	$qry="SELECT title, surname, fname, othername FROM student WHERE index_no = '$index_no'";
        $i = 0;
        if ($view_all_query_run = mysqli_query($conn, $qry)){
            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                $view_title = $view_all_query_row['title'];
                $view_surname = $view_all_query_row['surname'];
                $view_fname = $view_all_query_row['fname'];
                $view_othername = $view_all_query_row['othername'];
                $i +=1;
                echo $view_title." ". $view_fname." ".$view_othername." ".$view_surname;
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