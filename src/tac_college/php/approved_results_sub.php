<?php
//Start session
  ob_start();
  session_start();
 
  //Include database connection details
  require '../include/connect.php';

  $module_yr = $_GET["module_yr"];
    $course = $_GET["course"];



    $takbak = '../approve_results.php';
  


      mysqli_query($conn, "UPDATE tac_college.results_episode, tac_college.courses SET results_episode.aproved =  'Yes' WHERE module_yr = '$module_yr' AND results_episode.courseID = courses.courseID AND courses.course = '$course'");


        echo "<meta http-equiv='refresh' content='0;URL=$takbak'>";
        echo "<script type='text/javascript'>
                alert('RUSULTS FOR $course $module_yr SUCCESSFULLY APPROVED');
              </script>";

  ?>