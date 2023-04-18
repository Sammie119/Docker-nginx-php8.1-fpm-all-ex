<?php
//Start session
  ob_start();
  session_start();
 
  //Include database connection details
  require '../include/connect.php';


  $item = $_POST['item'];
  $name = $_POST['name'];
  $amount = $_POST['amount'];
  

  $user = $_SESSION['SESS_MEMBER_ID'];

  $in_date = date("d/m/Y");
  
  $takbak = '../item_receipt.php';

  $receipt_no = 0000000;

  $qry1="SELECT itemID FROM items WHERE item = '$item'";
              $i = 0;
              if ($view_all_query_run = mysqli_query($conn, $qry1)){
                  while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                      $itemID = $view_all_query_row['itemID'];
                      
                      $i +=1;
                      
                  }

                  
              }

    $qry1="SELECT receipt_no FROM inventory";
              $i = 0;
              if ($view_all_query_run = mysqli_query($conn, $qry1)){
                  while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                      $receipt_no = $view_all_query_row['receipt_no'];
                      
                      $i +=1;
                      
                  }

                 $receipt_no = $receipt_no + 1; 
                  
              }

 
  $insert = "INSERT INTO inventory VALUES (NULL,'$itemID','$receipt_no','$name','$amount', '$in_date','$user')";

    if( $insert_query_run = mysqli_query($conn, $insert)){
      
              echo "<meta http-equiv='refresh' content='0;URL=$takbak'>";
             
              mysqli_query($conn, "UPDATE tac_college.items SET  stock =  stock - 1 WHERE  item = '$item' AND itemID <> 001");
                
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
      background-image: url("../img/tac_watermark_2.png");
      background-repeat: no-repeat;
      background-position: center;
    }

    label {
      float: right;
    }
    
  </style>

</head>

    <body style="width: 80%; margin-left: 10%; text-transform: uppercase;" >
          <?php
              $qry1="SELECT receipt_no FROM inventory";
                      $i = 0;
                      if ($view_all_query_run = mysqli_query($conn, $qry1)){
                          while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                              $receipt = $view_all_query_row['receipt_no'];
                              
                              $i +=1;
                              
                          }

                         
                          
                      }
            ?>
        <header id="header">
        <div id="logo"><img src="../img/tac_college_logo11.png" height="80" width="164"> &nbsp;
        <div style="font-weight: bold; float: right; margin-top: 14%;">RECEIPT No.: <?php echo $receipt; ?></div>
        </div>


        <div style="clear: both;"></div>
    </header>
<div id="watermark">
  <div class = "data">
    <div class="receiptNo">NAME: <label><?php echo $name; ?></label></div>
    <div class="receiptNo">DATE: <label><?php echo $in_date; ?></label></div>
  </div>

  <div class = "data">
    <div class="receipt">ITEM: <label><?php echo $item; ?></label></div>
    <div class="receipt" id="amt">AMOUNT PAID: <label><?php echo number_format((float)$amount,2,'.',''); ?></label></div>
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
