 <!DOCTYPE html>
 <html>
 <?php
 	ob_start();
  	session_start();

 	require '../include/connect.php';
 	$receipt_no = $_GET["receipt_no"];
 	$index_no = $_GET["index_no"];
 	$module_yr = $_GET["module_yr"];
 ?>

	<style type="text/css">

		#logo{
			text-align: left;
			margin-left: 10%;
			margin-right: 10%;
			border-bottom: 2px solid;
		}

		.receiptNo{
			margin-left: 7%;
			padding: 5px;
			margin-top: 10px;
			font-weight: bold;
		}
		.receipt{
			margin-left: 7%;
			padding: 5px;
			margin-top: 10px;
		}
		.data{
			border-bottom: 2px solid;
			margin-left: 10%;
			margin-right: 10%;
		}

		.sign{
			text-align: right;
			margin-left: 10%;
			margin-right: 10%;
			margin-top: 3%;
		}
		#amt{
			font-weight: bolder;
		}

		label {
			text-transform: uppercase;
			float: right;
		}

	</style>

</head>
	<?php

					   		$qry="SELECT title, surname, fname, othername, amount_balance, amount, mode, TIMESTAMP, dtime FROM student, fees_episode WHERE student.index_no = fees_episode.index_no AND student.index_no =  '$index_no' AND receipt_no =  '$receipt_no'";
			                        $i = 1;
			                        if ($view_all_query_run = mysqli_query($conn, $qry)){
			                            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){

			                                $title = $view_all_query_row['title'];
			                                $surname = $view_all_query_row['surname'];
			                                $fname = $view_all_query_row['fname'];
			                                $othername = $view_all_query_row['othername'];
			                                $amount_balance = $view_all_query_row['amount_balance'];
			                                $amount = $view_all_query_row['amount'];
			                                $mode = $view_all_query_row['mode'];

			                                $TIMESTAMP = $view_all_query_row['TIMESTAMP'];
			                                $dtime = $view_all_query_row['dtime'];

			                                $full_name = $title." ".$fname." ".$surname." ".$othername;


			                                $i +=1;

			                            }

			                        }

			    $qry1="SELECT fees FROM fees WHERE module_yr = '$module_yr'";
			        $i = 0;
			        if ($view_all_query_run = mysqli_query($conn, $qry1)){
			            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
			                $view_fees = $view_all_query_row['fees'];

			                $i +=1;

			            }


			        }


			        $qry2="SELECT SUM( amount ) AS amount FROM fees_episode WHERE index_no =  '$index_no' AND dtime < '$dtime'";
				        $i = 0;



				        if ($view_all_query_run = mysqli_query($conn, $qry2)){
				            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
				                $view_amount = $view_all_query_row['amount'];

				                $i +=1;

				            }
				       		if ($view_amount == '') {
				       			$view_amount = '0.00';
				       		}


				        }
	?>
    <body style="width: 80%; margin-left: 10%;" >
    	<?php
			$qry_sem="SELECT sem FROM students_modules WHERE index_no = '$index_no'";
	        $i = 0;

	            if ($view_all_query_sem = mysqli_query($conn, $qry_sem)){

	            while ($view_all_query_seme = mysqli_fetch_assoc($view_all_query_sem)){
	                $view_sem = $view_all_query_seme['sem'];

	                $i +=1;

	            }
	        }

		?>

        <header id="header">
				<div id="logo"><img src="../img/tac_college_logo11.png" height="80" width="164"> &nbsp;
				<div style="font-weight: bold; float: right; margin-top: 14%;">RECEIPT No.: <?php echo $receipt_no;?></div>
				</div>


				<div style="clear: both;"></div>
		</header>
	<div class = "data">
		<div class="receiptNo">NAME: <label><?php echo $full_name; ?></label></div>
		<div class="receiptNo">INDEX No.: <label><?php echo $index_no; ?></label></div>
		<div class="receiptNo">MODULE/YEAR: <label><?php echo $module_yr; ?></label></div>
		<div class="receiptNo">DATE: <label><?php echo $TIMESTAMP; ?></label></div>
	</div>

	<div class = "data">
		<div class="receipt">MODULE'S FEE: <label><?php echo number_format($view_fees,2); ?></label></div>
		<div class="receipt">PREVIOUS PAYMENT: <label><?php echo number_format($view_amount,2); ?></label></div>
		<div class="receipt" id="amt">AMOUNT PAID (<?php echo strtoupper($mode);?>): <label><?php echo number_format($amount,2); ?></label></div>
		<div class="receipt">FEE BALANCE: <label><?php echo number_format($amount_balance,2); ?></label></div>
	</div>

	<div class = "sign">
		<div class="receipt">SIGNATURE:..........................................</div>
	</div>



        <!-- Javascripts -->
        <script>window.jQuery || document.write('<script src="../js/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="../js/bootstrap.min.js"></script>

		<!-- Scrolling Nav JavaScript -->
		<script src="../js/jquery.easing.min.js"></script>
		<script src="../js/scrolling-nav.js"></script>

		<?php
		//Creating Sessions to print receipt

		$_SESSION['receipt_no'] = $receipt_no;
		$_SESSION['full_name'] = $full_name;
		$_SESSION['index_no'] = $index_no;
		$_SESSION['module_yr'] = $module_yr;
		$_SESSION['timestamp'] = $TIMESTAMP;
		$_SESSION['view_fees'] = $view_fees;
		$_SESSION['view_amount'] = $view_amount;
		$_SESSION['amount'] = $amount;
		$_SESSION['amount_balance'] = $amount_balance;
		$_SESSION['sem'] = $view_sem;
		$_SESSION['mode'] = $mode;
		?>

    </body>
    <script>
	window.open('print_receipt.php','','left=0,top=0,width=800,height=500,toolbar=0,scrollbars=0,status=0');
	window.location = '../payments.php?';
    </script>
</html>
