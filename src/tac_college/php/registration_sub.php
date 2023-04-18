<?php
//Start session
  ob_start();
  session_start();
 
  //Include database connection details
  require '../include/connect.php';


  $index_no = $_POST['index_no'];
  $program = $_POST['program'];
  $module = $_POST['module'];

  $module_year = $module."/".date('Y');
  
 
  $takbak = '../registration.php';
  

  $userID = $_SESSION['SESS_MEMBER_ID'];

  $qry_pro="SELECT programID FROM programs WHERE program = '$program'";
                    $i = 0;
                      if ($view_all_query_run = mysqli_query($conn, $qry_pro)){
                      while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
        
                        $programID = $view_all_query_row['programID'];                           

                        $i +=1;
                                    
                      }
                                  
                    }

      $qry_modules="SELECT moduleID FROM modules WHERE modules = '$module'";
                    $i = 0;
                      if ($view_all_query_run = mysqli_query($conn, $qry_modules)){
                      while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
        
                        $moduleID = $view_all_query_row['moduleID'];                           

                        $i +=1;
                                    
                      }
                                  
                    }

      $qry_fee="SELECT feeID, fees FROM fees WHERE module_yr = '$module_year'";
                    $i = 0;
                      if ($view_all_query_run = mysqli_query($conn, $qry_fee)){
                      while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
        
                        $feeID = $view_all_query_row['feeID'];
                        $fees = $view_all_query_row['fees'];                           

                        $i +=1;
                                    
                      }
                                  
                    }

             $qry_results="SELECT courseID FROM courses WHERE programID = '$programID' AND moduleID = '$moduleID'";
                                $i = 0;
                                  if ($view_all_query_run = mysqli_query($conn, $qry_results)){
                                  while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                    
                                    $view_courseID = $view_all_query_row['courseID'];  

                                    mysqli_query($conn, "INSERT INTO results_episode VALUES (NULL,'$index_no','$programID','$view_courseID', '$module_year', '0', '0', '0', '0', '$userID', 'No','No')");                          

                                    $i +=1;
                                                 
                                  }

                                  mysqli_query($conn, "INSERT INTO balance_episode VALUES (NULL,'$index_no', '$module_year', '$feeID', '0', '$fees','Yes')");

                                   echo "<meta http-equiv='refresh' content='0;URL=$takbak'>"; 

                                    echo "<script type='text/javascript'>
                                          alert('YOU HAVE SUCCESSFULLY REGISTERED STUDENT WITH INDEX NO: $index_no');
                                          </script>";          
                                }
 
      
              
                  
                      else{echo 'There is a mistake in adding this Student';
                          echo mysqli_error($conn);
                              }
  ?>