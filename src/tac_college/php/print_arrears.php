<?php
	require '../include/connect.php';
?> 

	<!-- Javascripts -->
        
        <script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>

        <link href="../css/bootstrap.css" rel="stylesheet">

	    <!-- Custom CSS -->
		<link rel="stylesheet" href="../css/main.css">

		<title>Arrears List</title>
        

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
			window.location = '../full_payment.php?';
		}
	</script>

</head>

    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->


   
				<div class="des_space" style="text-align: center; width: 80%; margin-left: 10%;">
				<div id="logo"><img src="../img/tac_college_logo11.png" height="80" width="164"> &nbsp;</div>
				<?php 
							
					
					$result_zer = mysqli_query($conn, "SELECT index_no FROM balance_episode WHERE balance > 0");

            		$num_rows_2 = mysqli_num_rows($result_zer);

            		if ($num_rows_2 > 0) {
            			
            			
            			echo '<h4 style="font-weight: bold;">ARREARS LIST</h4>

            				<table border="0" align="center">
							  <thead>
								<tr style="font-weight: bold; font-size: 17px; text-align: center; border-bottom: 2px solid;">
									<td width="15%">Index No.</td>
									<td width="45%">Name</td>
									<td width="10%">Module/Year</td>
									<td width="10%">Amount to Pay</td>
									<td width="10%">Amount Paid</td>
									<td width="10%">Arrears</td>
								</tr>
							   </thead>
							   <tbody style="text-transform: uppercase; font-size: 12px;">
            			';
            			$qry_zero="SELECT student.index_no AS index_no, title, surname, fname, othername, balance_episode.module_yr, fees, balance, amount_paid FROM student, fees, balance_episode WHERE student.index_no = balance_episode.index_no AND fees.feeID = balance_episode.feeID AND balance_episode.balance > 0";
			                        $i = 1;
			                        if ($view_all_query_run = mysqli_query($conn, $qry_zero)){
			                            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
			                                $index_no_zero = $view_all_query_row['index_no'];
			                                $title_zero = $view_all_query_row['title'];
			                                $surname_zero = $view_all_query_row['surname'];
			                                $fname_zero = $view_all_query_row['fname'];
			                                $othername_zero = $view_all_query_row['othername'];
			                                $module_year = $view_all_query_row['module_yr'];
			                                $fees_zero = $view_all_query_row['fees'];
			                                $balance_zero = $view_all_query_row['balance'];
			                                $amount_paid_zero = $view_all_query_row['amount_paid'];

			                                $full_name = $title_zero." ".$fname_zero." ".$othername_zero." ".$surname_zero;

			                               
			                            
			                                    echo    "<tr style='border-bottom: 1px solid;'>
															<td align = 'center'>".$index_no_zero."</td>
															<td style='text-align: left;'>".$full_name."</td>
															<td>".$module_year."</td>
															<td>".$fees_zero."</td>
															<td>".$amount_paid_zero."</td>
															<td>".$balance_zero."</td>
														</tr>";

			                                $i +=1;
			                                 
			                            }
			                        }

			                       $total_balance = mysqli_query($conn, "SELECT SUM(balance) AS balance FROM balance_episode WHERE balance > 0");

			                       $total = mysqli_fetch_assoc($total_balance);

			                       
            			
            							
			                   echo '
			                   	</tbody>
								   <tfoot  style="border-top: 2px solid;">
								   	<tr>
								   		<td colspan="5" align = "center">TOTAL</td>
								   		<td>'.number_format($total['balance'],2).'</td>
								   	</tr>

								     <tr>
								   		<td colspan="4"><br></td>
								     </tr>
									
								   </tfoot>
								</table>
			                   ';
            		}

            		?>
            		
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