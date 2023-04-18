<?php
	ob_start();
?>
<?php
	session_start();
	session_destroy();
?>
<?php
	echo "<script type='text/javascript'>
        window.location = '../index.html';
   </script>";
?>