<?php
    include 'include/header_new.php';
?>

<!-- Javascripts -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

<!--Form css....................................-->
<style>
    body {
        background: #DDDDDD;
    }

    hr{
        height:2px; 
        border-width:0; 
        color:gray; 
        background-color:gray;
    }
    
    .btn {
        letter-spacing: 1px
    }

    .bott {
        margin-top: 15px;
        margin-bottom: 15px;
        border-radius: 10px;
    }

    a {
        color: #fff;
    }

    a:hover {
        color: #fff;
    }

    #bthd {
        visibility: hidden;
        padding-top: 0px;
        padding-bottom: 0px;
    }

</style>
<!--End------------------------------------------->


<?php
    include 'include/nav_new.php';
?>

<main id="main">

    <div class="info" style="line-height: 15px;">
        <div class="card shadow-lg card-1" style="width: 98%; margin: 1% 1% 1% 1%;">
            
<!--Start----->
            <div class="des_space" style="text-align: center; width: 90%; margin-left: 5%; margin-right: 5%;">
                <br>
                    <h4 style="font-size: 25px; color: #191970; font-family: Times new roman; font-weight: bold;">ARREARS LIST </h4>
                    <hr>

                    <?php


                    $result_zer = mysqli_query($conn, "SELECT index_no FROM balance_episode WHERE balance > 0");

                    $num_rows_2 = mysqli_num_rows($result_zer);

                    if ($num_rows_2 > 0) {
                        echo '
                            <table border="0" align="center" width="100%" id = "example" class="display">
                              <thead>
                                <tr style="font-weight: bold; font-size: 17px; text-align: center; border-bottom: 2px solid;">
                                    <th></th>
                                    <th width="15%">Index No.</th>
                                    <th width="30%">Name</th>
                                    <th width="10%">Semesters</th>
                                    <th width="15%">Amount to Pay</th>
                                    <th width="15%">Amount Paid</th>
                                    <th width="15%">Arrears</th>
                                </tr>
                               </thead>
                               <tbody style="text-transform: uppercase;">
                        ';


                        $qry_zero="SELECT student.index_no AS index_no, CONCAT(title,' ',surname,' ',fname,' ',othername) AS Name, students_modules.sem, fees, SUM( balance ) AS balance, SUM( amount_paid ) AS amount_paid
                            FROM student, fees, balance_episode, students_modules
                            WHERE students_modules.index_no = balance_episode.index_no
                            AND student.index_no = balance_episode.index_no
                            AND fees.feeID = balance_episode.feeID
                            AND balance_episode.balance > 0
                            GROUP BY student.index_no
                            ORDER BY studentID";
                                    $i = 1;
                                    if ($view_all_query_run = mysqli_query($conn, $qry_zero)){
                                        while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                                            $index_no_zero = $view_all_query_row['index_no'];
                                            $Name_zero = $view_all_query_row['Name'];
                                            $sem = $view_all_query_row['sem'];
                                            $fees_zero = $view_all_query_row['fees'];
                                            $balance_zero = $view_all_query_row['balance'];
                                            $amount_paid_zero = $view_all_query_row['amount_paid'];

                                            if($sem >= 4){
                                                $sem = 4;
                                            }

                                            $fees_to_pay = $sem * $fees_zero;

                                            $amount_paid_zero = $fees_to_pay - $balance_zero;



                                                echo    "<tr style='border-bottom: 1px solid; padding-bottom: 10px;'>
                                                            <td><button id ='bthd' class='btn btn-danger'><i class='icofont-exit'></i> </button></td>
                                                            <td align = 'center'>".$index_no_zero."</td>
                                                            <td style='text-align: left;'>".$Name_zero."</td>
                                                            <td>".$sem."</td>
                                                            <td align = 'right'>".number_format($fees_to_pay,2)."</td>
                                                            <td align = 'right'>".number_format($amount_paid_zero,2)."</td>
                                                            <td align = 'right'>".number_format($balance_zero,2)."</td>
                                                        </tr>";

                                            $i +=1;

                                        }
                                    }



                                   $total_balance = mysqli_query($conn, "SELECT SUM(balance) AS balance FROM balance_episode WHERE balance > 0");

                                   $total = mysqli_fetch_assoc($total_balance);




                               echo '
                                </tbody>
                                   <tfoot  style="border-top: 2px solid; font-weight:bolder;">
                                    <tr>
                                        <td colspan="6">TOTAL</td>
                                        <td align="right">'.number_format($total['balance'],2).'</td>
                                    </tr>
                                   </tfoot>
                                </table>
                                
                               ';
                    }

                    ?>

                <!--    <h4 style="font-weight: bold;">VIEW FULL PAYMENT LIST</h4>
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
                       <tbody style="text-transform: uppercase; font-size: 12px;">  -->

                       <?php

                    /*      $result = mysqli_query($conn, "SELECT module_year from students_modules");

                        $num_rows = mysqli_num_rows($result);

                        $day = date('y');

                        //$x = 18;


                        for ($x = 19; $x <= $day; $x++) {
                            while ($num_rows > 0) {

                            if ($num_rows < 10) {
                                $index_no = "TAC000".$num_rows."/".$x;
                            }
                            elseif ($num_rows >= 10 && $num_rows < 100) {
                                $index_no = "TAC00".$num_rows."/".$x;
                            }
                            elseif ($num_rows >= 100 && $num_rows < 1000) {
                                $index_no = "TAC0".$num_rows."/".$x;
                            }
                            else {
                                $index_no = "TAC".$num_rows."/".$x;
                            }

                            $qry="SELECT student.index_no AS index_no, title, surname, fname, othername, fees_episode.module_yr AS module, SUM( amount ) AS amount, fees FROM student, fees_episode, fees WHERE student.index_no = fees_episode.index_no AND fees_episode.feesID = fees.feeID AND status = 'F' AND fees_episode.index_no =  '$index_no' GROUP BY fees_episode.module_yr ORDER BY fees_episode.module_yr DESC";
                                    $i = 1;
                                    if ($view_all_query_run = mysqli_query($conn, $qry)){
                                        while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                                            $index_no = $view_all_query_row['index_no'];
                                            $title = $view_all_query_row['title'];
                                            $surname = $view_all_query_row['surname'];
                                            $fname = $view_all_query_row['fname'];
                                            $othername = $view_all_query_row['othername'];
                                            $amount = $view_all_query_row['amount'];
                                            $module = $view_all_query_row['module'];
                                            $fees = $view_all_query_row['fees'];


                                            $full_name = $title." ".$fname." ".$othername." ".$surname;



                                                echo    "<tr style='border-bottom: 1px solid;'>
                                                            <td align = 'center'>".$index_no."</td>
                                                            <td style='text-align: left;'>".$full_name."</td>
                                                            <td>".$module."</td>
                                                            <td>".$fees."</td>
                                                            <td>".$amount."</td>
                                                            <td>".number_format((float)$fees - $amount,2,".","")."</td>
                                                        </tr>";

                                            $i +=1;

                                        }

                                    }

                                 $num_rows -=1;
                            }

                        // $x +=1;
                        }       */

                       ?>


                     </tbody>
                       <tfoot  style="border-top: 2px solid;">
                         <tr>
                            
                         </tr>


                       </tfoot>
                    </table>
                    <button class="btn btn-primary bott"><a href='php/print_arrears.php'><i class="icofont-print"></i> ...Print View......</a></button> 
            </div>
<!--End----->            
                            
        </div>
</main><!-- End #main -->

<!--DataTable and filter-->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'pdf', 'print'
                ]
            } );
        } );
    </script>

<?php
    include 'include/footer_new.php';
?>