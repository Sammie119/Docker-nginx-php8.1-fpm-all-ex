<?php
    include 'include/header_new.php';
?>

<!-- Javascripts -->
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/jquery.maskedinput.js"></script>

        <!-- Javascripts -->

        <script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>

        <!-- Scrolling Nav JavaScript -->
        <script src="js/jquery.filtertable.min.js"></script>
        <script>
        $(document).ready(function() {
            $('table').filterTable(); // apply filterTable to all tables on this page
        });
        </script>

<style type="text/css">
    tr:hover, tr:nth-child(even):hover{
       background-color: #A4A4A4;
    }

    tr:nth-child(even) {
        background-color: #f3f3f3;
    }

    td{
        padding-top: 10px;
        padding-bottom: 10px;
    }
</style>

<!--Form css....................................-->
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
        min-height: 110vh;
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

      $module_yr = $_GET["module_yr"];
      $course = $_GET["course"];
      
  ?>

<?php
    include 'include/nav_new.php';
?>

<main id="main">

    <div class="info" style="line-height: 15px;">
        <div class="card shadow-lg card-1" style="width: 98%; margin: 1% 1% 1% 1%;">
            
<!--Start----->
            <div class="des_space" style="text-align: center; width: 98%; margin-left: 1%; margin-right: 1%;">
                <br>
                    <h4 style="font-size: 25px; color: #191970; font-family: Times new roman; font-weight: bold; text-transform: uppercase;">RESULTS FOR <?php echo $course." " .$module_yr;?></h4>
                    <hr>

                    <table border="0" align="center" width="100%">
                      <thead>
                        <tr style="border-bottom: 2px solid; font-weight: bolder; text-align: center;">
                          <td width="10%">Index No</td>
                          <td width="40%">Name</td>
                          <td width="10%">Quiz 1<br>(15%)</td>
                          <td width="10%">Quiz 2<br>(15%)</td>
                          <td width="10%">Exams<br>(70%)</td>
                          <td width="10%">Total Mark<br>(100%)</td>
                          <td width="10%">Grade</td>
                        </tr>
                      </thead>
                      <tbody style="text-transform: uppercase;">
                      <?php

                                        $qry="SELECT student.index_no AS index_no, title, surname, fname, othername, quiz_1, quiz_2, exams, total FROM student, results_episode,  courses WHERE student.index_no = results_episode.index_no AND results_episode.courseID = courses.courseID AND course = '$course' AND module_yr = '$module_yr' AND student.active = 'Yes' ORDER BY student.index_no ASC";
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
                                                        $total = $view_all_query_row['total'];
                                                        

                                                        $full_name = $title." ".$fname." ".$surname." ".$othername;

                                                        if($total >= 80){
                                                            $grade = "A";
                                                        }
                                                        elseif ($total >= 60) {
                                                            $grade = "B";
                                                        }
                                                        elseif ($total >= 50) {
                                                            $grade = "C";
                                                        }
                                                        elseif ($total >= 40) {
                                                            $grade = "D";
                                                        }
                                                        else{
                                                            $grade = "F";
                                                        }

                                                    
                                                            echo    '<tr style="border-bottom: 1px solid;">
                                                                        <td style="text-align: left; padding-left: 5px; padding-right: 5px;">'.$index_no.'</td>
                                                                        <td style="text-align: left; padding-left: 5px;">'.$full_name.'</td>
                                                                        <td align = "center"> '.$quiz_1.'</td>
                                                                        <td align = "center"> '.$quiz_2.'</td>
                                                                        <td align = "center"> '.$exams.'</td>
                                                                        <td align = "center"> '.$total.'</td>
                                                                        <td align = "center"> '.$grade.'</td>
                                                                    </tr>';
                                                                    
                                                        $i +=1;
                                                         
                                                    }
                                
                                                }

                                                                
                                          
                                   ?>

                      </tbody>
                      </table>
                      <div style="text-align: center; width: 100%; padding-top: 20px;"><?php echo "<a href='php/approved_results_sub.php?course=$course&module_yr=$module_yr' class='btn btn-primary btn-block'><i class='icofont-thumbs-up'></i> Approve</a>";?></div>
            </div>
<!--End----->            
                            
        </div>
</main><!-- End #main -->

<?php
    include 'include/footer_new.php';
?>