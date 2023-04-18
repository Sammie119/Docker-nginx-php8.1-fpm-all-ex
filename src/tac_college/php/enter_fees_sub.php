<?php
//Start session
  ob_start();
  session_start();

  //Include database connection details
  require '../include/connect.php';

  $index_no = $_POST['index_no'];
  $module = $_POST['module'];
  $amount = floatval($_POST['amount']);
  $module_fee = floatval($_POST['module_fee']);
  $paid = floatval($_POST['paid']);
  $mode = $_POST['mode'];


  $balance = $module_fee - ($paid + $amount);

  $user = $_SESSION['SESS_MEMBER_ID'];

  $times = date("d/m/Y");

  $dtime = date("Y-m-d");

  $takbak = '../enter_fees.php';


      $qry="SELECT receipt_no FROM receipt_no";
                        $i = 0;
                          if ($view_all_query_run = mysqli_query($conn, $qry)){
                          while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){

                            $view_receipt_no = $view_all_query_row['receipt_no'];

                            $i +=1;

                          }

                          $receipt = $view_receipt_no;

                        }

      $qry_fees="SELECT feeID, fees FROM fees WHERE module_yr = '$module'";
                        $i = 0;
                          if ($view_all_query_run = mysqli_query($conn, $qry_fees)){
                          while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){

                            $view_feeID = $view_all_query_row['feeID'];
                            $view_fees = $view_all_query_row['fees'];

                            $i +=1;

                          }

                        }


  $insert = "INSERT INTO fees_episode VALUES (NULL,'$view_feeID','$index_no','$module','$amount', '$balance','$receipt', '$mode', '$user','$times', 'P', '$dtime')";

    if( $insert_query_run = mysqli_query($conn, $insert)){

      $amount_balance = $module_fee - ($paid + $amount);

      $qry_paid="SELECT amount_paid FROM balance_episode WHERE index_no = '$index_no' AND module_yr = '$module'";
                        $i = 0;
                          if ($view_all_query_run = mysqli_query($conn, $qry_paid)){
                          while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){

                            $view_amount_paid = $view_all_query_row['amount_paid'];

                            $i +=1;

                          }
                          $paid_sem = $view_amount_paid;
                        }

              $amount_paid = $paid_sem + $amount;


              mysqli_query($conn, "UPDATE  tac_college.balance_episode SET  amount_paid =  '$amount_paid', balance = '$amount_balance' WHERE index_no =  '$index_no' AND module_yr = '$module'");

              echo "<meta http-equiv='refresh' content='0;URL=$takbak'>";
              mysqli_query($conn, "INSERT INTO receipt_no VALUES (NULL)");

                if (($module_fee - ($paid + $amount)) == 0) {
                 mysqli_query($conn, "UPDATE  tac_college.fees_episode SET  status =  'F' WHERE index_no =  '$index_no'");
                }

              echo "<script type='text/javascript'>
                    alert('FEES FOR $index_no ENTERED SUCCESSFULLY');
                    </script>";
            }


    else{echo 'There is a mistake in adding this member';
        echo mysqli_error($conn);
            }
?>

<!DOCTYPE html>
 <html>

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

    #watermark{
      background-image: url("../img/tac_watermark_1.png");
      background-repeat: no-repeat;
      background-position: center;
    }

    label {
      float: right;
    }

  </style>

</head>

    <body style="width: 80%; margin-left: 10%; text-transform: uppercase;" >

        <header id="header">
        <div id="logo"><img src="../img/tac_college_logo11.png" height="80" width="164"> &nbsp;
        <div style="font-weight: bold; float: right; margin-top: 14%;">RECEIPT No.: <?php echo $receipt; ?></div>
        </div>


        <div style="clear: both;"></div>
    </header>

    <?php
      $qry="SELECT title, surname, fname, othername FROM student WHERE index_no = '$index_no'";
        $i = 0;
        if ($view_all_query_run = mysqli_query($conn, $qry)){
            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                $view_title = $view_all_query_row['title'];
                $view_surname = $view_all_query_row['surname'];
                $view_fname = $view_all_query_row['fname'];
                $view_othername = $view_all_query_row['othername'];
                $i +=1;

            }
        }
    ?>
<div id="watermark">
  <div class = "data">
    <div class="receiptNo">NAME: <label><?php echo $view_title." ". $view_fname." ".$view_surname." ".$view_othername; ?></label></div>
    <div class="receiptNo">INDEX No.: <label><?php echo $index_no; ?></label></div>
    <div class="receiptNo">MODULE/YEAR: <label><?php echo $module; ?></label></div>
    <div class="receiptNo">DATE: <label><?php echo $times; ?></label></div>
  </div>

  <div class = "data">
    <div class="receipt">MODULE'S FEE: <label><?php echo number_format($module_fee,2); ?></label></div>
    <div class="receipt">PREVIOUS PAYMENT: <label><?php echo number_format($paid,2); ?></label></div>
    <div class="receipt" id="amt">AMOUNT PAID (<?php echo strtoupper($mode);?>): <label><?php echo number_format($amount,2); ?></label></div>
    <div class="receipt">FEE BALANCE: <label><?php echo number_format($balance,2); ?></label></div>
  </div>
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

    </body>
    <script>
     window.print();
    </script>
</html>
