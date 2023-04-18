<?php
//Start session
  ob_start();
  session_start();
 
  //Include database connection details
  require '../include/connect.php';

  $index_no = $_POST['index_no'];
  $quiz_1 = $_POST['quiz_1'];
  $quiz_2 = $_POST['quiz_2'];
  $exams = $_POST['exams'];
  $course = $_POST['course'];
  $program = $_POST['program'];
  $module_year = $_POST['module_year'];
  $row_num = $_POST['row_num'];



    $takbak = '../result_select.php';
  

  $userID = $_SESSION['SESS_MEMBER_ID'];

    $i = 0;

    while ($i < $row_num) {

      $total = $quiz_1[$i] + $quiz_2[$i] + $exams[$i];

      mysqli_query($conn, "UPDATE tac_college.results_episode SET quiz_1 =  '{$quiz_1[$i]}', quiz_2 =  '{$quiz_2[$i]}', exams =  '{$exams[$i]}', total =  '$total', userID = '$userID', entered = 'Yes' WHERE index_no = '{$index_no[$i]}' AND programID = '$program' AND courseID = '$course' AND module_yr = '$module_year'");

        $i +=1;
    }

        echo "<meta http-equiv='refresh' content='0;URL=$takbak'>";
        echo "<script type='text/javascript'>
                alert('RUSULTS FOR $module_year SUCCESSFULLY ENTERED');
              </script>";

  ?>