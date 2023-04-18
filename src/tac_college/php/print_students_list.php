<?php
	require '../include/connect.php';
?> 

	<!-- Javascripts -->
        
        <script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>

        <link href="../css/bootstrap.css" rel="stylesheet">

	    <!-- Custom CSS -->
		<link rel="stylesheet" href="../css/main.css">

		<title>Students List</title>
        

        <style type="text/css">

		#logo{
			text-align: center;
			margin-left: 2.5%;

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

			@page{
				size: landscape;
			}
		}
		</style>

		<script type="text/javascript">
		function print_1(){
			window.print();
			window.location = '../students_list.php?';
		}
	</script>

</head>

    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->


   
				<div class="des_space" style="text-align: center; width: 98%; margin-left: 1%;">
				<div id="logo"><img src="../img/tac_college_logo11.png" height="80" width="164"> &nbsp;</div>
					<h4 style="font-weight: bold;">STUDENTS LIST</h4>
					<table border="0" align="center" style="border: 1px solid;">
					  <thead>
						<tr style="font-weight: bold; font-size: 17px; text-align: center; border-bottom: 2px solid;">
							<td width="6%">Index No.</td>
							<td width="24%">Name</td>
							<td width="5%">Gender</td>
							<td width="10%">Date of Birth</td>
							<td width="13%">Address</td>
							<td width="13%">Email</td>
							<td width="10%">Tel No.</td>
							<td width="5%">Home Town</td>
							<td width="5%">Marital Status</td>
							<td width="5%">Sem</td>
						</tr>
					   </thead>
					   <tbody style="text-transform: uppercase; font-size: 12px;">
					    <?php
					   		$qry="SELECT student.index_no AS index_no, title, surname, fname, othername, gender, address, email, tel, home_town, dob, m_status, sem FROM student, students_modules WHERE student.index_no = students_modules.index_no AND student.active = 'Yes'";
			                        $i = 1;
			                        if ($view_all_query_run = mysqli_query($conn, $qry)){
			                            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
			                                $index_no = $view_all_query_row['index_no'];
			                                $title = $view_all_query_row['title'];
			                                $surname = $view_all_query_row['surname'];
			                                $fname = $view_all_query_row['fname'];
			                                $othername = $view_all_query_row['othername'];
			                                $gender = $view_all_query_row['gender'];
			                                $address = $view_all_query_row['address'];
			                                $email = $view_all_query_row['email'];
			                                $tel = $view_all_query_row['tel'];
			                                $home_town = $view_all_query_row['home_town'];
			                                $dob = $view_all_query_row['dob'];
			                                $m_status = $view_all_query_row['m_status'];
			                                $sem = $view_all_query_row['sem'];

			                                $full_name = $title." ".$fname." ".$surname." ".$othername;
			                            
			                                    echo    "<tr style='border-bottom: 1px solid;'>
															<td align = 'left'>".$index_no."</td>
															<td style='text-align: left; padding-left: 10px;'>".$full_name."</td>
															<td>".$gender."</td>
															<td>".$dob."</td>
															<td>".$address."</td>
															<td>".$email."</td>
															<td>".$tel."</td>
															<td>".$home_town."</td>
															<td>".$m_status."</td>
															<td align = 'center'>".$sem."</td>
															
														</tr>";

			                                $i +=1;
			                                 
			                            }
			                            
			                        }
					    ?>
						
					 </tbody>
					   <tfoot  style="border-top: 2px solid;">
						
						
					   </tfoot>
					</table>
				</div> 

	
        <!-- Javascripts -->
        <script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
		
		<!-- Scrolling Nav JavaScript -->
		<script src="js/jquery.easing.min.js"></script>
		<script src="js/scrolling-nav.js"></script>	

		<button class="noprint" onclick="print_1()">Print</button>		

    </body>

    <script>
     //window.print();
    // window.location = '../students_list.php?';
    </script>
</html>