<?php
    include 'include/header_new.php';
?>

 <script src="js/jquery.min.js"></script>

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

    p {
        font-size: 15px;
        line-height: 0px !important;
        font-weight: 500
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
	 <div class="info">
            <div class="card-body px-sm-4 px-0">
                <div class="row justify-content-center round">
                    <div class="col-lg-10 col-md-12 ">
                        <div id="logo" style="text-align: center;"><img src="img/tac_college_logo122.png"> &nbsp;</div>

						<div style="clear: both;"></div>
                        <div class="card shadow-lg card-1" style="margin-top: 10px; width: 45%; float: left; margin-left: 4%; height: 60%; margin-bottom: 0px; border-radius: 20px">
                            <div class="card-body inner-card" style="margin-top: 0%;">
                                <center><h4 style="font-size: 25px; color: #191970; font-family: Times new roman"><b>SEMESTER'S CALANDER</b></h4></center>
                                <hr>

                                <?php
					                $qry="SELECT module FROM students_modules";
					                      $i = 0;
					                      if ($view_all_query_run = mysqli_query($conn, $qry)){
					                          while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
					                              $view_module = $view_all_query_row['module'];

					                              
					                              
					                              $i +=1;
					                          }
					                          $current_module = $view_module;
					                      }
					                  ?>
	        						<table style="margin-left: 10%; color: #191970;">
		        						<tr>
		        							<td style="padding-left: 5px;">Current Module:</td>
		        							<td style="padding-left: 20px; text-align: left;"><?php echo $current_module;?></td>
		        						</tr>
		        						
		        						<tr>
		        							<td style="padding-left: 5px;">Module Start:</td>
		        							<td style="padding-left: 20px; text-align: left;">6th September, 2021</td>
		        						</tr>
		        						<tr>
		        							<td style="padding-left: 5px;">Module End:</td>
		        							<td style="padding-left: 20px; text-align: left;">15th November, 2021</td>
		        						</tr>
		        						<tr>
		        							<td style="padding-left: 5px;">Exams:</td>
		        							<td style="padding-left: 20px; text-align: left;">19th - 23rd July, 2021</td>
		        						</tr>
		        						<tr>
		        							<td style="padding-left: 5px;">Re-opening:</td>
		        							<td style="padding-left: 20px; text-align: left;">6th September, 2021</td>
		        						</tr>
		        						
		        					</table>
		        					<hr>
                                <marquee behavior="scroll" direction="left"><h3 style="color: red; font-size: 25px; font-weight: bolder;"><?php echo date("l jS F, Y");?></h3>
                                </marquee>                            
                                        
                                    
                            </div>
                        </div>

                        <div class="card shadow-lg card-1" style="margin-top: 10px; width: 45%; float: right; margin-right: 4%; height: 60%; margin-bottom: 0px; border-radius: 20px">
                            <div class="card-body inner-card" style="margin-top: 0%;">
                                <center><h4 style="font-size: 25px; color: #191970; font-family: Times new roman"><b>STUDENTS ENROLLMENT</b></h4></center>
                                <hr>

                                <?php
	        						$result_total = mysqli_query($conn, "SELECT index_no FROM student WHERE active = 'Yes'");

            						$num_rows_total = mysqli_num_rows($result_total);

            						
            						$result_m1 = mysqli_query($conn, "SELECT student.index_no FROM student, students_modules WHERE student.index_no = students_modules.index_no AND student.active = 'Yes' AND students_modules.sem = 1");

            						$num_rows_m1 = mysqli_num_rows($result_m1);

            						$result_m2 = mysqli_query($conn, "SELECT student.index_no FROM student, students_modules WHERE student.index_no = students_modules.index_no AND student.active = 'Yes' AND students_modules.sem = 2");

            						$num_rows_m2 = mysqli_num_rows($result_m2);

            						$result_m3 = mysqli_query($conn, "SELECT student.index_no FROM student, students_modules WHERE student.index_no = students_modules.index_no AND student.active = 'Yes' AND students_modules.sem = 3");

            						$num_rows_m3 = mysqli_num_rows($result_m3);

            						$result_m4 = mysqli_query($conn, "SELECT student.index_no FROM student, students_modules WHERE student.index_no = students_modules.index_no AND student.active = 'Yes' AND students_modules.sem = 4");

            						$num_rows_m4 = mysqli_num_rows($result_m4);
	        					?>
		        					<table style="margin-left: 10%; color: #191970;">
		        						<tr>
		        							<td style="padding-left: 10px; font-weight: bolder;">Total Student Population:</td>
		        							<td style="padding-left: 10px; font-weight: bolder; text-align: right;"><?php echo $num_rows_total;?></td>
		        						</tr>
		        						<tr>
		        							<td colspan="2"><br></td>
		        						</tr>
		        						<tr>
		        							<td style="padding-left: 20px;">Module One Students:</td>
		        							<td style="padding-left: 20px; text-align: right;"><?php echo $num_rows_m1;?></td>
		        						</tr>
		        						<tr>
		        							<td style="padding-left: 20px;">Module Two Students:</td>
		        							<td style="padding-left: 20px; text-align: right;"><?php echo $num_rows_m2;?></td>
		        						</tr>
		        						<tr>
		        							<td style="padding-left: 20px;">Module Three Students:</td>
		        							<td style="padding-left: 20px; text-align: right;"><?php echo $num_rows_m3;?></td>
		        						</tr>
		        						<tr>
		        							<td style="padding-left: 20px;">Module Four Students:</td>
		        							<td style="padding-left: 20px; text-align: right;"><?php echo $num_rows_m4;?></td>
		        						</tr>
		        						<tr>
		        							<td style="padding-left: 20px;">Cert. In Ministry Students:</td>
		        							<td style="padding-left: 20px; text-align: right;">.....</td>
		        						</tr>
		        						<tr>
		        							<td colspan="2"> <br></td>
		        						</tr>
		        					</table>
                                    
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

</main><!-- End #main -->

<?php
    include 'include/footer_new.php';
?>