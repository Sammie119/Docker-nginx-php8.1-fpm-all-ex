<?php
  ob_start();
  session_start();
?>

<?php
    require 'include/connect.php';
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html lang="en">

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TAC-Database System</title>

    <link rel="shortcut icon" href="img/tac_short_cut_icon.ico">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
	<link rel="stylesheet" href="css/main.css">
    <link href="css/custom.css" rel="stylesheet">
	

    <!-- Custom Fonts & Icons -->
	<link rel="stylesheet" href="css/icomoon-social.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	
	<script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>


    <style type="text/css">
        body {
            background-image: url("img/tac_logo_background.png");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: 600px 500px;
        }
        

        #logo2{
            margin-top: 2px;
            float: left;
        }

        a{
            color: red;
            text-decoration:none;
            outline: 0;
        }
        a:hover {
          color: blue;
          text-decoration:none;
          outline: 0;
        }
    </style>


<?php 
  $req = $_SESSION['SESS_USERNAME'];

  if (empty($req)) {
    header('location:index.html');
  }

?>

    