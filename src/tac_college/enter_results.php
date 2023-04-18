<?php
    include 'include/header_new.php';
?>

<!-- Javascripts -->
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/jquery.maskedinput.js"></script>

<!--Form css....................................-->
<style type="text/css">
    tr:hover, tr:nth-child(even):hover{
       background-color: #A4A4A4;
    }

    tr:nth-child(even) {
        background-color: #f3f3f3;
    }

    td{
        /*padding-top: 5px;
        padding-bottom: 5px;*/
    }
</style>
<style>
    body {
        background: #DDDDDD;
    }

    input[type='text']{
        height: 35px;
    }

    hr{
        height:2px; 
        border-width:0; 
        color:gray; 
        background-color:gray;
    }
    
    .card-0 {
        
        background: linear-gradient(-20deg, rgb(255, 255, 255) 50%, #0275d8 50%);
        color: white;
        border: 0px
    }

    .container {
        border-radius: 20px
    }

    .btn {
        letter-spacing: 1px
    }

    select:active {
        box-shadow: none !important;
        outline-width: 0 !important
    }

    select:after {
        box-shadow: none !important;
        outline-width: 0 !important
    }

    input,
    textarea {
        padding: 10px 12px 10px 12px;
        border: 1px solid lightgrey;
        border-radius: 0px !important;
        margin-bottom: 5px;
        margin-top: 2px;
        width: 100%;
        box-sizing: border-box;
        color: #2C3E50;
        font-size: 14px;
        letter-spacing: 1px;
        resize: none
    }

    select:focus,
    input:focus {
        box-shadow: none !important;
        border: 1px solid #2196F3 !important;
        outline-width: 0 !important;
        font-weight: 400
    }

    label {
        margin-bottom: 2px;
        font-weight: bolder;
        font-size: 14px
    }

    input:focus,
    textarea:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: 1px solid #304FFE;
        outline-width: 0
    }

    button:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        outline-width: 0
    }

    .form-control {
        height: calc(2em + .75rem + 3px)
    }

    .card-0 {
        margin-top: 100px;
        margin-bottom: 100px
    }

    .card-1 {
        border-radius: 17px;
        color: black;
        box-shadow: 2px 4px 15px 0px rgb(0, 0, 0, 0.5) !important
    }

    .color input {
        background-color: #f1f1f1
    }

</style>
<!--End------------------------------------------->


<?php
    include 'include/nav_new.php';
?>

<?php 
          $program = $_POST['program'];
          $course = $_POST['course'];
          $module = $_POST['module'];
          $yr = $_POST['yr'];


          $module_year = $module."/".$yr;

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

          $qry_course="SELECT courseID FROM courses WHERE programID = '$programID' AND moduleID = '$moduleID' AND course = '$course'";
                                $i = 0;
                                  if ($view_all_query_run = mysqli_query($conn, $qry_course)){
                                  while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                    
                                    $courseID = $view_all_query_row['courseID'];  

                                    $i +=1;
                                                 
                                  }
         
                                }       
          
        ?>

<main id="main">

        <div class="info" style="line-height: 15px;">
            <div class="card-body px-sm-4 px-0">
                <div class="row justify-content-center round">
                    <div class="col-lg-10 col-md-12 ">
                        <div class="card shadow-lg card-1">
                            <form action="php/enter_results_sub.php" method="POST">
                            <div class="card-body inner-card" style="margin-top: 0%;">
                                <center><h4 style="font-size: 25px; color: #191970; font-family: Times new roman; text-transform: uppercase;"><b>ENTER STUDENTS RESULTS FOR <?php echo $course." ".$module."/".$yr;?></b></h4></center>
                                <hr>
                                <table border="0" align="center" style="text-align: center; width: 80%; margin-left: 10%; margin-top: 0px">
                                  <thead>
                                    <tr style="font-weight: bold; font-size: 17px; text-align: center; border-bottom: 2px solid;">
                                        <td width="5%">#</td>
                                        <td width="15%">Index No.</td>
                                        <td width="50%">Name</td>
                                        <td width="10%" nowrap style="padding-right: 5px;">Quiz 1</td>
                                        <td width="10%" nowrap style="padding-right: 5px;">Quiz 2</td>
                                        <td width="10%" nowrap>Exams</td>
                                    </tr>
                                   </thead>
                                   <tbody style="text-transform: uppercase; font-size: 12px;">

                                   <?php

                                        $qry="SELECT student.index_no AS index_no, title, surname, fname, othername, quiz_1, quiz_2, exams FROM student, results_episode WHERE student.index_no = results_episode.index_no AND programID = '$programID' AND courseID = '$courseID' AND module_yr = '$module_year' AND student.active = 'Yes' AND results_episode.aproved = 'No' ORDER BY student.studentID ASC";
                                                $i = 1;
                                                if ($view_all_query_run = mysqli_query($conn, $qry)){
                                                    while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                                                        $index_no = $view_all_query_row['index_no'];
                                                        $title = $view_all_query_row['title'];
                                                        $surname = $view_all_query_row['surname'];
                                                        $fname = $view_all_query_row['fname'];
                                                        $othername = $view_all_query_row['othername'];
                                                        $quiz_1 = $view_all_query_row['quiz_1'];
                                                        $quiz_2 = $view_all_query_row['quiz_2'];
                                                        $exams = $view_all_query_row['exams'];
                                                        

                                                        $full_name = $title." ".$fname." ".$surname." ".$othername;

                                                    
                                                            echo    '<tr style="border-bottom: 1px solid;">
                                                                        <td align = "center">'.$i.'</td>
                                                                        <td align = "center">'.$index_no.'</td>
                                                                        <td style="text-align: left;">'.$full_name.'</td>
                                                                        <td><input type="number" name= "quiz_1[]" value = '.$quiz_1.' style="width: 100%; text-align: center;"></td>
                                                                        <td><input type="number" name= "quiz_2[]" value = '.$quiz_2.' style="width: 100%; text-align: center;"></td>
                                                                        <td><input type="number" name= "exams[]" value = '.$exams.' style="width: 100%; text-align: center;"></td>
                                                                    </tr>';
                                                                    
                                                            echo '<input type="text" name= "index_no[]" value = '.$index_no.' style="display: none;">';
                                                                    $row_num = $i;
                                                        $i +=1;
                                                         
                                                    }
                                
                                                }

                                                                
                                          
                                   ?>
                                
                                 </tbody>
                                </table>
                                <input type="text" name="course" style="display: none;" value="<?php echo $courseID;?>">
                                <input type="text" name="program" style="display: none;" value="<?php echo $programID;?>">
                                <input type="text" name="module_year" style="display: none;" value="<?php echo $module_year;?>">
                                <input type="text" name="row_num" style="display: none;" value="<?php echo $row_num;?>">
        
         <!--Buttons..................................................-->
                                <div class="row justify-content-center" style="width: 90%; margin-left: 9%; margin-top: 10px;">
                                    <div class="col-md-12 col-lg-10 col-12">
                                        <div class="row justify-content-end mb-5">
                                            <div class="col-lg-4 col-auto "><button type="reset" class="btn btn-primary btn-block"><small class="font-weight-bold"><i class="icofont-refresh"></i> Clear</small></button> </div>
                                            <div class="col-lg-4 col-auto "><button type="submit" class="btn btn-primary btn-block"><small class="font-weight-bold"><i class="icofont-save"></i> Save</small></button> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
	

</main><!-- End #main -->

<?php
    include 'include/footer_new.php';
?>