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
            <div class="des_space" style="text-align: center; width: 98%; margin-left: 1%; margin-right: 1%;">
                <br>
                    <h4 style="font-size: 25px; color: #191970; font-family: Times new roman; font-weight: bold;">ACCOUNTS</h4>
                    <hr>

                    <table border="0" align="center" width="90%" id="example" class="display">
                      <thead>
                        <tr style="font-weight: bold; font-size: 17px; text-align: center; border-bottom: 2px solid;">
                            <td width="10%">Module/Year</td>
                            <td width="10%">No. of Students</td>
                            <td width="25%">Amount Received</td>
                            <td width="25%">Amount in Debt</td>
                            <td width="30%">Expected Amount</td>
                        </tr>
                       </thead>
                       <tbody style="text-transform: uppercase; font-size: 15px;">

                       <?php


                            $qry="SELECT fees.module_yr AS module, fees, SUM(amount_paid) AS amount, COUNT(balance_episode.module_yr) AS num FROM fees, balance_episode WHERE fees.feeID = balance_episode.feeID GROUP BY balance_episode.module_yr ORDER BY balID DESC";
                                    $i = 1;
                                    if ($view_all_query_run = mysqli_query($conn, $qry)){
                                        while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                                            $module = $view_all_query_row['module'];
                                            $fees = $view_all_query_row['fees'];
                                            $amount = $view_all_query_row['amount'];
                                            $num = $view_all_query_row['num'];

                                            //$result = mysqli_query($conn, "SELECT COUNT(module_yr) AS module FROM balance_episode GROUP BY module_yr");

                                            //$num_rows_1 = mysqli_fetch_assoc($result);

                                            //$num_rows = $num_rows_1['module'];


                                                echo    "<tr style='border-bottom: 1px solid;'>
                                                            <td>".$module."</td>
                                                            <td>".$num."</td>
                                                            <td align = 'right' style='padding-right:70px'>".number_format($amount,2)."</td>
                                                            <td align = 'right' style='padding-right:70px'>".number_format(($fees * $num) - $amount,2)."</td>
                                                            <td align = 'right' style='padding-right:70px'>".number_format($fees * $num,2)."</td>

                                                        </tr>";

                                            $i +=1;

                                        }

                                    }
                       ?>

                     </tbody>
                       <tfoot  style="border-top: 2px solid;">
                         <tr>
                            <td colspan="11"><br></td>
                         </tr>


                       </tfoot>
                    </table>
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