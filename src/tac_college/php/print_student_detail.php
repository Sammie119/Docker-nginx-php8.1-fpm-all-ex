 <!DOCTYPE html>
 <html>
 <?php 
 	require '../include/connect.php';
 	$index_no = $_GET["index_no"];
 	$sem = $_GET["sem"];
 ?>   
 <head>
 <title>Student Details</title>
	<style type="text/css">

		#logo{
			text-align: left;
			margin-left: 10%;
			margin-right: 6%;
			border-bottom: 2px solid;
		}

		
		.receipt{
			margin-left: 7%;
			padding: 5px;
			margin-top: 10px;
		}
		.data{
			
			margin-left: 5%;
			margin-right: 6%;
		}


		label {
			text-transform: uppercase;
			float: right;
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
			window.location = '../students_list.php';
		}
	</script>

</head>
	<?php

					   		$qry="SELECT title, surname, fname, othername, gender, address, email, tel, nationality, home_town, dob, pob, m_status, profession, employer, position, b_address FROM student WHERE index_no =  '$index_no'";
			                        $i = 1;
			                        if ($view_all_query_run = mysqli_query($conn, $qry)){
			                            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
			                                
			                                $title = $view_all_query_row['title'];
			                                $surname = $view_all_query_row['surname'];
			                                $fname = $view_all_query_row['fname'];
			                                $othername = $view_all_query_row['othername'];
			                                $gender = $view_all_query_row['gender'];
			                                $address = $view_all_query_row['address'];
			                                $email = $view_all_query_row['email'];
			                                $tel = $view_all_query_row['tel'];
			                                $nationality = $view_all_query_row['nationality'];
			                                $home_town = $view_all_query_row['home_town'];
			                                $dob = $view_all_query_row['dob'];
			                                $pob = $view_all_query_row['pob'];
			                                $m_status = $view_all_query_row['m_status'];
			                                $profession = $view_all_query_row['profession'];
			                                $employer = $view_all_query_row['employer'];
			                                $position = $view_all_query_row['position'];
			                                $b_address = $view_all_query_row['b_address'];

			                                $full_name = $title." ".$fname." ".$surname." ".$othername;
			                          

			                                $i +=1;
			                                 
			                            }
			                            
			                        }
	?>
    <body style="width: 80%; margin-left: 10%;" >
        
        <header id="header">
				<div id="logo"><img src="../img/tac_college_logo11.png" height="80" width="164"> &nbsp;</div>


				<div style="clear: both;"></div>
		</header>
	<div class = "data">
		<div style="text-align: center;"><h3><b>STUDENT'S DETAILS</b></h3></div>
		<div class="receipt">NAME: <label><?php echo $full_name; ?></label></div>
		<div class="receipt">INDEX No.: <label><?php echo $index_no; ?></label></div>
		<div class="receipt">SEMESTER: <label><?php echo $sem; ?></label></div>
		<div class="receipt">GENDER: <label><?php echo $gender; ?></label></div>
		<div class="receipt">PERMANENT ADDRESS: <label><?php echo $address; ?></label></div>
		<div class="receipt">EMAIL: <label><?php echo $email; ?></label></div>
		<div class="receipt">TEL No.: <label><?php echo $tel; ?></label></div>
		<div class="receipt">NATIONALITY: <label><?php echo $nationality; ?></label></div>
		<div class="receipt">HOME TOWN: <label><?php echo $home_town; ?></label></div>
		<div class="receipt">DATE OF BIRTH: <label><?php echo $dob; ?></label></div>
		<div class="receipt">PLACE OF BIRTH: <label><?php echo $pob; ?></label></div>
		<div class="receipt">MARITAL STATUS: <label><?php echo $m_status; ?></label></div>
		<div class="receipt">PROFESSION: <label><?php echo $profession; ?></label></div>
		<div class="receipt">NAME OF EMPLOYER: <label><?php echo $employer; ?></label></div>
		<div class="receipt">POSITION: <label><?php echo $position; ?></label></div>
		<div class="receipt">BUSINESS ADDRESS: <label><?php echo $b_address; ?></label></div>
	</div>


   
	
	
        <!-- Javascripts -->
        <script>window.jQuery || document.write('<script src="../js/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="../js/bootstrap.min.js"></script>
		
		<!-- Scrolling Nav JavaScript -->
		<script src="../js/jquery.easing.min.js"></script>
		<script src="../js/scrolling-nav.js"></script>	

		<button class="noprint" onclick="print_1()">Print</button>	

    </body>
</html>
