<?php
include '../include/connect.php';
?>


<?php    
    $module = $_POST['module'];

    $qry="SELECT DISTINCT course, module_yr, program FROM programs, courses, results_episode, students_modules WHERE results_episode.courseID = courses.courseID AND results_episode.programID = programs.programID AND results_episode.module_yr = '$module'";
        $i = 1;
        if ($view_all_query_run = mysqli_query($conn, $qry)){
            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                $course = $view_all_query_row['course'];
                $module_yr = $view_all_query_row['module_yr'];
                $program = $view_all_query_row['program'];

                $result = mysqli_query($conn, "SELECT index_no FROM balance_episode WHERE module_yr = '$module'");

                $num_rows = mysqli_num_rows($result);

                
                echo'<tr style="border-bottom: 1px solid;">
                      <td align="center">'.$i.'</td>
                      <td align="center">'.$num_rows.'</td>
                      <td style="padding-left: 15px;">'.$course.'</td>
                      <td>'.$program.'</td>
                      <td align="center">'.$module_yr.'</td>
                    </tr>';

                $i +=1;
            }
        }

?>
