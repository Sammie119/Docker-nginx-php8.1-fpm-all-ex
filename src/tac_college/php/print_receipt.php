 <!DOCTYPE html>
 <html>
 <?php
 	ob_start();
  	session_start();

  		$receipt_no = $_SESSION['receipt_no'];
		$full_name = $_SESSION['full_name'];
		$index_no = $_SESSION['index_no'];
		$module_yr = $_SESSION['module_yr'];
		$TIMESTAMP = $_SESSION['timestamp'];
		$view_fees = $_SESSION['view_fees'];
		$view_amount = $_SESSION['view_amount'];
		$amount = $_SESSION['amount'];
		$amount_balance = $_SESSION['amount_balance'];
		$view_sem = $_SESSION['sem'];
		$mode = $_SESSION['mode'];

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

		#watermark{
			background-image: url("../img/tac_watermark_1.png");
			background-repeat: no-repeat;
			background-position: center;
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
		button {
			float: right;
			padding-top: 10px;
			padding-bottom: 10px;
			padding-right: 20px;
			padding-left: 20px;
			font-weight: bolder;
			border: solid 1px;
			border-radius: 20px;
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
			window.close();
		}
	</script>

</head>

    <body style="width: 80%; margin-left: 10%;" >

        <header id="header">
				<div id="logo"><img src="../img/tac_college_logo11.png" height="80" width="164"> &nbsp;
				<div style="font-weight: bold; float: right; margin-top: 14%;">RECEIPT No.: <?php echo $receipt_no;?></div>
				</div>


				<div style="clear: both;"></div>
		</header>

<div id="watermark">
	<div class = "data">
		<div class="receiptNo">NAME: <label><?php echo $full_name; ?></label></div>
		<div class="receiptNo">INDEX No.: <label><?php echo $index_no; ?></label></div>
		<div class="receiptNo">MODULE/YEAR: <label><?php echo $module_yr; ?></label></div>
		<div class="receiptNo">DATE: <label><?php echo $TIMESTAMP; ?></label></div>
	</div>

	<div class = "data">
		<div class="receipt">MODULE'S FEE: <label><?php echo number_format($view_fees * $view_sem,2); ?></label></div>
		<div class="receipt">PREVIOUS PAYMENT: <label><?php echo number_format($view_amount,2); ?></label></div>
		<div class="receipt" id="amt">AMOUNT PAID (<?php echo strtoupper($mode);?>): <label><?php echo number_format($amount,2); ?></label></div>
		<div class="receipt">FEE BALANCE: <label><?php echo number_format($amount_balance,2); ?></label></div>
	</div>
</div>

	<div class = "sign">
		<div class="receipt" id="sig">SIGNATURE:..........................................</div>
	</div>



        <!-- Javascripts -->
        <script>window.jQuery || document.write('<script src="../js/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="../js/bootstrap.min.js"></script>

		<!-- Scrolling Nav JavaScript -->
		<script src="../js/jquery.easing.min.js"></script>
		<script src="../js/scrolling-nav.js"></script>

		<button class="noprint" onclick="print_1()">Print</button>

    </body>
    <?php
    	unset($_SESSION['receipt_no']);
		unset($_SESSION['full_name']);
		unset($_SESSION['index_no']);
		unset($_SESSION['module_yr']);
		unset($_SESSION['timestamp']);
		unset($_SESSION['view_fees']);
		unset($_SESSION['view_amount']);
		unset($_SESSION['amount']);
		unset($_SESSION['amount_balance']);

		ob_end_flush();
    ?>
</html>
