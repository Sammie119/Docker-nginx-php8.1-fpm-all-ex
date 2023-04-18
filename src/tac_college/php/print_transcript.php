 <?php 

 ob_start();
 session_start();


 	require '../include/connect.php';

 	$index_no = $_POST['index_no'];
  	$program = $_POST['program'];

 ?>

 <?php
		//Creating Sessions to print receipt

		$_SESSION['index_no'] = $index_no;
		$_SESSION['program'] = $program;
		
 ?>

<script>
	window.open('print_transcript_print.php','','left=0,top=0,width=800,height=500,toolbar=0,scrollbars=0,status=0');
	window.location = '../transcript.php?';
</script>