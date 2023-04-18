<?php
include '../include/connect.php';
ob_start();
session_start();
?>

<?php
	$dat = date('Y');
	$sem = $_POST['sem'];

	header('content-type: application/vnd.ms-excel');

	$filename = 'List_of_Semester_'.$sem.'_'.$dat.'.txt';

	header('Content-Disposition: attachment; filename='.$filename);
	header('Pragma: no-cache');
	header('Expires: 0');

	
	$qry= mysqli_query($conn, "SELECT UPPER(CONCAT(student.title, ' ',student.fname,  ' ', student.surname,  ' ', student.othername )) AS Student_Name, tel AS Mobile_Number FROM student, students_modules WHERE student.index_no = students_modules.index_no AND student.active = 'Yes' AND students_modules.sem = '$sem'");

	$flag = false;

	while ($row = mysqli_fetch_assoc($qry)){
		if(!$flag){
			echo implode("\t", array_keys($row)). "\r\n";
			$flag = true;
		}
		echo implode("\t", array_values($row)). "\r\n";
	}

		?>
	
	