<?php
include '../include/connect.php';
?>


<?php    
    $module = $_POST['module'];

    $qry="SELECT moduleID FROM modules WHERE modules = '$module'";
 
      $i = 0;
      if ($view_all_query_run = mysqli_query($conn, $qry)){
        while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
            $moduleID = $view_all_query_row['moduleID'];

            $i +=1;
          
           }
      }

    echo "<option></option>"; 
    $qry="SELECT course FROM courses WHERE moduleID = '$moduleID'";
        $i = 0;
        if ($view_all_query_run = mysqli_query($conn, $qry)){
            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                $course = $view_all_query_row['course'];

                $i +=1;
                echo'<option>'.$course.'</option>';
            }
        }

?>