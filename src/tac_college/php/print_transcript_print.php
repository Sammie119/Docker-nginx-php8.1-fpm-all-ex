 <!DOCTYPE html>
 <html>
 <?php 

 ob_start();
 session_start();


 	require '../include/connect.php';

 	$index_no = $_SESSION['index_no'];
	$program = $_SESSION['program'];

  	$v_date = date('d/m/Y');

  	$userID = $_SESSION['SESS_MEMBER_ID'];
 ?>


<head>
	<link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
	<link rel="stylesheet" href="../css/main.css">
    
	<style type="text/css">

		#logo{
			text-align: center;
		}

		header{
			border-bottom: 2px solid;
			text-align: center;
			font-weight: bold;
		}

		tbody{
			border-bottom: 2px solid;
		}
		button {
			text-align: right;
			float: right;
			padding-top: 10px;
			padding-bottom: 10px;
			padding-right: 20px;
			padding-left: 20px;
			font-weight: bolder;
			border: solid 1px;
			border-radius: 20px;
			margin-top: 10px;
		}

		@media print {
			.noprint{
				visibility: hidden;
			}
		}

		#watermark{
			background-image: url("../img/tac_watermark.png");
			background-repeat: no-repeat;
			background-position: center;
		}

	</style>

	<script type="text/javascript">
		function print_1(){
			window.print();
			window.close();
		}
	</script>

	<title>Transcript</title>

	<?php
		$qry="SELECT CONCAT(student.title, ' ',student.fname,  ' ', student.surname,  ' ', student.othername ) AS student_name, date_of_adm FROM student, students_modules WHERE student.index_no = students_modules.index_no AND student.index_no = '$index_no'";
			                        $i = 1;
			                        if ($view_all_query_run = mysqli_query($conn, $qry)){
			                            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
			                                $student_name = $view_all_query_row['student_name'];
			                                
			                                $date_of_adm = $view_all_query_row['date_of_adm'];
			                                

			                                $i +=1;
			                              
			                              mysqli_query($conn, "INSERT INTO transcript_received VALUES (NULL,'$index_no','$v_date','$userID')");
			                            }
			        
			                        }

			              					   		
					          
		
	?>

</head>
	<div style="page-break-after: always;">
    <body style="width: 90%; margin-left: 5%; font-size: 12px;" > 
        <header id="header">
				<div id="logo"><img src="../img/tac_college_logo11.png" height="80" width="164"> &nbsp;
				<div>EMAIL: <u>apostoliccollege@theapostolicchurch.org.gh</u></div>
				<div style="font-size: 20px; padding-bottom: 10px; padding-top: 10px;">THE APOSTOLIC COLLEGE (TAC) ACADEMIC RECORD</div>
				<div style="clear: both;"></div>
		</header>

		<div style="border-bottom: 2px solid;">
			<div style="padding-top: 10px; text-transform: uppercase;"><b>STUDENT NAME:</b> <?php echo $student_name; ?></div>
			<div style="padding-top: 10px;"><b>INDEX NUMBER:</b> <?php echo $index_no; ?></div>
			<div style="padding-top: 10px; text-transform: uppercase;"><b>PROGRAM:</b> <?php echo $program; ?></div>
			<div style="padding-top: 10px; padding-bottom: 10px; text-transform: uppercase;"><b>DATE OF ADMISSION:</b> <?php echo $date_of_adm;?></div>
		</div>
<div id="watermark">
	<table style="width: 100%">
	
		<tbody style="text-align: left;">
			<tr>
			<td colspan="3" style="font-weight: bolder; padding-top: 10px; padding-bottom: 10px;">MODULE ONE</td>
			</tr>
			<tr>
				<th width="50">COURSE</th>
				<th width="10">GRADE</th>
				<th width="40">INTERPRETATION</th>
			</tr>
			<?php 
				$qry_m1="SELECT course, total FROM courses, results_episode WHERE courses.courseID = results_episode.courseID AND results_episode.index_no = '$index_no' AND module_yr LIKE 'M1%'";
			                        $i = 1;
			                        if ($view_all_query_run = mysqli_query($conn, $qry_m1)){
			                            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
			                                $course = $view_all_query_row['course'];
			                                $total = $view_all_query_row['total'];
			                                

			                                if($total >= 80){
			                                	$grade = "A";
			                                	$int = "EXCELLENT";
			                                }
			                                elseif ($total >= 60) {
			                                	$grade = "B";
			                                	$int = "GOOD";
			                                }
			                                elseif ($total >= 50) {
			                                	$grade = "C";
			                                	$int = "PASS";
			                                }
			                                elseif ($total >= 40) {
			                                	$grade = "D";
			                                	$int = "POOR";
			                                }
			                                else{
			                                	$grade = "F";
			                                	$int = "FAIL";
			                                }

			                            
			                                    echo    '<tr>
															<td style="text-align: left;">'.$course.'</td>
															<td style="text-align: left;"> '.$grade.'</td>
															<td style="text-align: left;">'.$int.'</td>
														</tr>';
														
			                                $i +=1;
			                                 
			                            }
			        
			                        }

			              					   		
					          
			?>
			
			<tr style="border-bottom: 2px solid;">
				<td colspan="3"><br></td>
			</tr>

			<tr>
			<td colspan="3" style="font-weight: bolder; padding-top: 10px; padding-bottom: 10px;">MODULE TWO</td>
			</tr>
			<tr>
				<th width="50">COURSE</th>
				<th width="10">GRADE</th>
				<th width="40">INTERPRETATION</th>
			</tr>
			<?php 
				$qry_m2="SELECT course, total FROM courses, results_episode WHERE courses.courseID = results_episode.courseID AND results_episode.index_no = '$index_no' AND module_yr LIKE 'M2%'";
			                        $i = 1;
			                        if ($view_all_query_run = mysqli_query($conn, $qry_m2)){
			                            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
			                                $course = $view_all_query_row['course'];
			                                $total = $view_all_query_row['total'];
			                                

			                                if($total >= 80){
			                                	$grade = "A";
			                                	$int = "EXCELLENT";
			                                }
			                                elseif ($total >= 60) {
			                                	$grade = "B";
			                                	$int = "GOOD";
			                                }
			                                elseif ($total >= 50) {
			                                	$grade = "C";
			                                	$int = "PASS";
			                                }
			                                elseif ($total >= 40) {
			                                	$grade = "D";
			                                	$int = "POOR";
			                                }
			                                else{
			                                	$grade = "F";
			                                	$int = "FAIL";
			                                }

			                            
			                                    echo    '<tr>
															<td style="text-align: left;">'.$course.'</td>
															<td style="text-align: left;"> '.$grade.'</td>
															<td style="text-align: left;">'.$int.'</td>
														</tr>';
														
			                                $i +=1;
			                                 
			                            }
			        
			                        }

			              					   		
					          
			?>
			<tr style="border-bottom: 2px solid;">
				<td colspan="3"><br></td>
			</tr>

			<tr>
			<td colspan="3" style="font-weight: bolder; padding-top: 10px; padding-bottom: 10px;">MODULE THREE</td>
			</tr>
			<tr>
				<th width="50">COURSE</th>
				<th width="10">GRADE</th>
				<th width="40">INTERPRETATION</th>
			</tr>
			<?php 
				$qry_m3="SELECT course, total FROM courses, results_episode WHERE courses.courseID = results_episode.courseID AND results_episode.index_no = '$index_no' AND module_yr LIKE 'M3%'";
			                        $i = 1;
			                        if ($view_all_query_run = mysqli_query($conn, $qry_m3)){
			                            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
			                                $course = $view_all_query_row['course'];
			                                $total = $view_all_query_row['total'];
			                                

			                                if($total >= 80){
			                                	$grade = "A";
			                                	$int = "EXCELLENT";
			                                }
			                                elseif ($total >= 60) {
			                                	$grade = "B";
			                                	$int = "GOOD";
			                                }
			                                elseif ($total >= 50) {
			                                	$grade = "C";
			                                	$int = "PASS";
			                                }
			                                elseif ($total >= 40) {
			                                	$grade = "D";
			                                	$int = "POOR";
			                                }
			                                else{
			                                	$grade = "F";
			                                	$int = "FAIL";
			                                }

			                            
			                                    echo    '<tr>
															<td style="text-align: left;">'.$course.'</td>
															<td style="text-align: left;"> '.$grade.'</td>
															<td style="text-align: left;">'.$int.'</td>
														</tr>';
														
			                                $i +=1;
			                                 
			                            }
			        
			                        }

			              					   		
					          
			?>
			<tr style="border-bottom: 2px solid;">
				<td colspan="3"><br></td>
			</tr>

			<tr>
			<td colspan="3" style="font-weight: bolder; padding-top: 10px; padding-bottom: 10px;">MODULE FOUR</td>
			</tr>
			<tr>
				<th width="50">COURSE</th>
				<th width="10">GRADE</th>
				<th width="40">INTERPRETATION</th>
			</tr>
			<?php 
				$qry_m4="SELECT course, total FROM courses, results_episode WHERE courses.courseID = results_episode.courseID AND results_episode.index_no = '$index_no' AND module_yr LIKE 'M4%'";
			                        $i = 1;
			                        if ($view_all_query_run = mysqli_query($conn, $qry_m4)){
			                            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
			                                $course = $view_all_query_row['course'];
			                                $total = $view_all_query_row['total'];
			                                

			                                if($total >= 80){
			                                	$grade = "A";
			                                	$int = "EXCELLENT";
			                                }
			                                elseif ($total >= 60) {
			                                	$grade = "B";
			                                	$int = "GOOD";
			                                }
			                                elseif ($total >= 50) {
			                                	$grade = "C";
			                                	$int = "PASS";
			                                }
			                                elseif ($total >= 40) {
			                                	$grade = "D";
			                                	$int = "POOR";
			                                }
			                                else{
			                                	$grade = "F";
			                                	$int = "FAIL";
			                                }

			                            
			                                    echo    '<tr class = "watermark">
															<td style="text-align: left;">'.$course.'</td>
															<td style="text-align: left;"> '.$grade.'</td>
															<td style="text-align: left;">'.$int.'</td>
														</tr>';
														
			                                $i +=1;
			                                 
			                            }
			        
			                        }

			              					   		
					          
			?>
			<tr style="border-bottom: 2px solid;">
				<td colspan="3"><br></td>
			</tr>

		</tbody>
	</table>
</div>

	<table style="width: 100%;">
			<tr>
				<td colspan="3"><br></td>
			</tr>
			<tr>
				<th width="20">GRADE</th>
				<th width="40">INTERPRETATION</th>
				<th width="40">RATINGS (%)</th>
			</tr>
			<tr>
				<td>A</td>
				<td>EXCELLENT</td>
				<td>80 - 100</td>
			</tr>
			<tr>
				<td>B</td>
				<td>GOOD</td>
				<td>60 - 79</td>
			</tr>
			<tr>
				<td>C</td>
				<td>PASS</td>
				<td>50 - 59</td>
			</tr>
			<tr>
				<td>D</td>
				<td>POOR</td>
				<td>40 - 49</td>
			</tr>
			<tr>
				<td>F</td>
				<td>FAIL</td>
				<td>0 - 39</td>
			</tr>
			<tr style="border-bottom: 2px solid;">
				<td colspan="3"><br></td>
			</tr>

	</table>

		<div style="padding-top: 100px; padding-bottom: 30px; float: right; text-align: center;">CHRISTOPHER AFFUM-NYARKO (PASTOR) <br> PRINCIPAL <br> (TAC) <br>

		<button class="noprint" onclick="print_1()">Print</button>
		</div>




   
	
	
        <!-- Javascripts -->
        <script>window.jQuery || document.write('<script src="../js/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="../js/bootstrap.min.js"></script>
		
		<!-- Scrolling Nav JavaScript -->
		<script src="../js/jquery.easing.min.js"></script>
		<script src="../js/scrolling-nav.js"></script>	

			

    </body>
    <?php
		unset($_SESSION['index_no']);
		unset($_SESSION['program']);

		ob_end_flush();
    ?>
</html>
