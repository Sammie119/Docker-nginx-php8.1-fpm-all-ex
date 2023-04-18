 <!DOCTYPE html>
 <html>
 <?php 
 	require '../include/connect.php';
 	$programID = $_GET["programID"];
 	$courseID = $_GET["courseID"];
 	$module = $_GET["module"];
 	$program = $_GET["program"];
 	$course = $_GET["course"];
 ?>   
 <head>

 <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
	<link rel="stylesheet" href="../css/main.css">
 <title>Student Results</title>
	<style type="text/css">

		#logo{
			text-align: center;
			border-bottom: 2px solid;
		}

		button {
			float: right;
			padding-top: 10px;
			padding-bottom: 10px;
			padding-right: 20px;
			padding-left: 20px;
			font-weight: bolder;
			border: solid 1px;
			border-radius: 20px;
			margin-top: 5px;
			margin-right: 50%;
		}

		@media print {
			.noprint{
				visibility: hidden;
			}
		}

		
	</style>

	<script type="text/javascript">
		function print_1(){
			window.print();
			window.location = '../view_results.php';
		}
	</script>

</head>
	
    <body style="width: 80%; margin-left: 10%; font-size: 17px;" >
        
        <header id="header">
				<div id="logo"><img src="../img/tac_college_logo122.png" height="80" width="164"> &nbsp;</div>
				<div style="clear: both;"></div>
		</header>

		<div style="text-align: left; padding-top: 10px;"><?php echo "<b>Program: </b>".$program;?></div>
		<div style="text-align: left; padding-top: 10px;"><?php echo "<b>Course: </b>".$course;?></div>
		<div style="text-align: left; padding-top: 10px;"><?php echo "<b>Module/Year: </b>".$module;?></div>

		<h4 style="text-align: center; text-transform: uppercase;"><b>RESULTS</b></h4>

          <table border="1" width="100%" style="font-size: 17;">
          
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

            				$qry="SELECT student.index_no AS index_no, title, surname, fname, othername, quiz_1, quiz_2, exams, total FROM student, results_episode WHERE student.index_no = results_episode.index_no AND programID = '$programID' AND courseID = '$courseID' AND module_yr = '$module' AND student.active = 'Yes' ORDER BY student.index_no ASC";
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
			                                

			                                $full_name = $title." ".$fname." ".$othername." ".$surname;

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
															<td style="text-align: left; padding-left: 5px;"></td>
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



   
	
	
        <!-- Javascripts -->
        <script>window.jQuery || document.write('<script src="../js/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="../js/bootstrap.min.js"></script>
		
		<!-- Scrolling Nav JavaScript -->
		<script src="../js/jquery.easing.min.js"></script>
		<script src="../js/scrolling-nav.js"></script>	

		<button class="noprint" onclick="print_1()">Print</button>		

    </body>
    <script>
     //window.print();
     //window.location = '../view_results.php?';
    </script>
</html>
