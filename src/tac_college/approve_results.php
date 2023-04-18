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
        /*padding-top: 5px;
        padding-bottom: 5px;*/
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
    include 'include/nav_new.php';
?>

<main id="main">

    <div class="info" style="line-height: 15px;">
        <div class="card shadow-lg card-1" style="width: 98%; margin: 1% 1% 1% 1%;">
            
<!--Start----->
            <div class="des_space" style="text-align: center; width: 98%; margin-left: 1%; margin-right: 1%;">
                <br>
                    <h4 style="font-size: 25px; color: #191970; font-family: Times new roman; font-weight: bold;">RESULTS AWAITING APPROVAL</h4>
                    <hr>

                   <table border="0" align="center">
                      <thead>
                        <tr style="font-weight: bold; font-size: 17px; text-align: center; border-bottom: 2px solid;">
                            <td width="20%">No.</td>
                            <td width="50%">Course</td>
                            <td width="20%">Module/Year</td>
                            <td width="10%">View Results</td>
                        </tr>
                       </thead>
                       <tbody style="text-transform: uppercase; font-size: 15px;">
                        <?php
                            $qry="SELECT DISTINCT course, module_yr FROM courses, results_episode WHERE courses.courseID = results_episode.courseID AND results_episode.aproved = 'No' AND results_episode.entered = 'Yes' ORDER BY results_episode.module_yr ASC";
                                    $i = 1;
                                    if ($view_all_query_run = mysqli_query($conn, $qry)){
                                        while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                                            $course = $view_all_query_row['course'];
                                            $module_yr = $view_all_query_row['module_yr'];
                                        
                                                echo    "<tr style='border-bottom: 1px solid;'>
                                                            <td align = 'center'>".$i."</td>
                                                            <td style='text-align: left;'>".$course."</td>
                                                            <td>".$module_yr."</td>
                                                            <td><a href='results_approve.php?course=$course&module_yr=$module_yr' class='btn btn-primary btn-block'><i style='font-size: 30px;' class='icofont-eye'></i></a></td>
                                                        </tr>";

                                            $i +=1;
                                             
                                        }
                                        
                                    }
                        ?>

                        
                     </tbody>
                       <tfoot  style="border-top: 2px solid;">
                         <tr>
                            <td colspan="11"><br></td>
                         </tr>
                        
                       </tfoot>
                    </table>
            </div>
<!--End----->            
                            
        </div>
</main><!-- End #main -->

<?php
    include 'include/footer_new.php';
?>