<?php
//Start session
  ob_start();
  session_start();
 
  //Include database connection details
  require '../include/connect.php';


  $title = $_POST['title'];
  $surname = $_POST['surname'];
  $firstname = $_POST['firstname'];
  $other_name = $_POST['other_name'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $tel = $_POST['tel'];
  $nationality = $_POST['nationality'];
  $home_town = $_POST['home_town'];
  $dob = $_POST['dob'];
  $pob = $_POST['pob'];
  $status = $_POST['status'];
  $profession = $_POST['profession'];
  $employer = $_POST['employer'];
  $position = $_POST['position'];
  $b_address = $_POST['b_address'];
  $program = $_POST['program'];
  $module = $_POST['module'];
  
  $active = "Yes";
  $takbak = '../new_student.php';
  $date_of_adm = date('M, Y');

  $userID = $_SESSION['SESS_MEMBER_ID'];

  $qry_pro="SELECT programID FROM programs WHERE program = '$program'";
                    $i = 0;
                      if ($view_all_query_run = mysqli_query($conn, $qry_pro)){
                      while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
        
                        $programID = $view_all_query_row['programID'];                           

                        $i +=1;
                                    
                      }
                                  
                    }



            $qry="SELECT index_no FROM index_no";
                    $i = 0;
                      if ($view_all_query_run = mysqli_query($conn, $qry)){
                      while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
        
                        $view_index_no = $view_all_query_row['index_no'];                           

                        $i +=1;
                                     
                      }

                      $year = date('y');

                      $yr = date('Y');

                      $module_yr = $module."/".$yr;

                      $index_no = "TAC".$view_index_no."/".$year;
                                  
                    }

            $qry_fee="SELECT feeID, fees FROM fees WHERE module_yr = '$module_yr'";
                    $i = 0;
                      if ($view_all_query_run = mysqli_query($conn, $qry_fee)){
                      while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
        
                        $feeID = $view_all_query_row['feeID'];
                        $fees = $view_all_query_row['fees'];                           

                        $i +=1;
                                    
                      }
                                  
                    }

 
  $insert = "INSERT INTO student VALUES (NULL,'$index_no','$title','$surname','$firstname','$other_name', '$gender','$address','$email','$tel','$nationality','$home_town','$dob','$pob','$status','$profession','$employer','position','$b_address','$active')";

    if( $insert_query_run = mysqli_query($conn, $insert)){
      
              echo "<meta http-equiv='refresh' content='0;URL=$takbak'>"; 
              mysqli_query($conn, "INSERT INTO index_no VALUES (NULL)");
              mysqli_query($conn, "INSERT INTO students_modules VALUES (NULL,'$index_no','$module','$yr', '$module_yr', '$programID', '$date_of_adm','1')");

              mysqli_query($conn, "INSERT INTO balance_episode VALUES (NULL,'$index_no', '$module_yr', '$feeID', '0', '$fees','Yes')");

              $qry_results="SELECT courseID FROM courses, modules WHERE programID = '$programID' AND courses.moduleID = modules.moduleID AND modules.modules = '$module'";
                    $i = 0;
                      if ($view_all_query_run = mysqli_query($conn, $qry_results)){
                      while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
        
                        $view_courseID = $view_all_query_row['courseID'];  

                        mysqli_query($conn, "INSERT INTO results_episode VALUES (NULL,'$index_no','$programID','$view_courseID', '$module_yr', '0', '0', '0', '0', '$userID','No', 'No')");                         

                        $i +=1;
                                     
                      }
                                  
                    }

              echo "<script type='text/javascript'>
                    alert('YOU HAVE SUCCESSFULLY ADDED A NEW STUDENT WITH INDEX NO: $index_no');
                    </script>";
            }
              
                  
    else{echo 'There is a mistake in adding this Student';
        echo mysqli_error($conn);
            }
?>