<?php
//Start session
  ob_start();
  session_start();
 
  //Include database connection details
  require '../include/connect.php';


  $index_no = $_POST['index_no'];
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

  $takbak = '../edit_student_details.php';

  $userID = $_SESSION['SESS_MEMBER_ID'];

  $qry_pro="SELECT programID FROM programs WHERE program = '$program'";
                    $i = 0;
                      if ($view_all_query_run = mysqli_query($conn, $qry_pro)){
                      while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
        
                        $programID = $view_all_query_row['programID'];                           

                        $i +=1;
                                    
                      }
                                  
                    }


                      $yr = date('Y');

                      $module_yr = $module."/".$yr;

                     
                                  
                    
                       
 
  $insert = "UPDATE tac_college.student SET title =  '$title', surname =  '$surname', fname =  '$firstname', othername =  '$other_name', gender = '$gender', address = '$address', email = '$email', tel = '$tel', nationality = '$nationality', home_town = '$home_town', dob = '$dob', pob = '$pob', m_status = '$status', profession = '$profession', employer = '$employer', position = '$position', b_address = '$b_address' WHERE index_no = '$index_no'";



    if( $insert_query_run = mysqli_query($conn, $insert)){
      
              echo "<meta http-equiv='refresh' content='0;URL=$takbak'>";
                   
              mysqli_query($conn, "UPDATE tac_college.students_modules SET module =  '$module', year = '$yr', module_year = '$module_yr', programID = '$programID' WHERE index_no = '$index_no'");


              echo "<script type='text/javascript'>
                    alert('YOU HAVE SUCCESSFULLY UPDATE THE RECORD OF: $index_no');
                    </script>";
            }
              
                  
    else{echo 'There is a mistake in adding this Student';
        echo mysqli_error($conn);
            }
?>