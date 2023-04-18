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

<style type="text/css">
    tr:hover, tr:nth-child(even):hover{
       background-color: #A4A4A4;
    }

    tr:nth-child(even) {
        background-color: #f3f3f3;
    }
</style>

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

    .btn-danger {
        border-radius: 10px;
        margin-bottom: 15px;
    }

    .btn-primary {
        padding-top: 5px;
        padding-bottom: 5px;
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
                    <h4 style="font-size: 25px; color: #191970; font-family: Times new roman; font-weight: bold;">PAYMENTS LIST</h4>
                    <hr>

                    <table border="0" align="center" width="100%" id="example" class="display">
                      <thead>
                        <tr>
                            <th></th>
                            <th width="10%">Index No.</th>
                            <th width="35%">Name</th>
                            <th width="10%">Module</th>
                            <th width="10%">Amount</th>
                            <th width="10%" nowrap>Receipt No.</th>
                            <th width="10%">Mode</th>
                            <th width="10%">Date</th>
                            <th width="5%">RP</th>
                        </tr>
                       </thead>
                       <tbody style="text-transform: uppercase;">
                       <?php
                            $qry="SELECT student.index_no AS index_no, title, surname, fname, othername, module_yr, amount, receipt_no, mode, TIMESTAMP FROM student, fees_episode WHERE student.index_no = fees_episode.index_no ORDER BY receipt_no DESC";
                                    $i = 1;
                                    if ($view_all_query_run = mysqli_query($conn, $qry)){
                                        while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                                            $index_no = $view_all_query_row['index_no'];
                                            $title = $view_all_query_row['title'];
                                            $surname = $view_all_query_row['surname'];
                                            $fname = $view_all_query_row['fname'];
                                            $othername = $view_all_query_row['othername'];
                                            $module_yr = $view_all_query_row['module_yr'];
                                            $amount = $view_all_query_row['amount'];
                                            $receipt_no = $view_all_query_row['receipt_no'];
                                            $mode = $view_all_query_row['mode'];
                                            $TIMESTAMP = $view_all_query_row['TIMESTAMP'];

                                            $full_name = $title." ".$fname." ".$othername." ".$surname;

                                                echo    "<tr style='border-bottom: 1px solid;'>
                                                            <td></td>
                                                            <td align = 'left'>".$index_no."</td>
                                                            <td style='text-align: left; padding-left: 30px;'>".$full_name."</td>
                                                            <td>".$module_yr."</td>
                                                            <td>".number_format($amount,2)."</td>
                                                            <td>".$receipt_no."</td>
                                                            <td>".$mode."</td>
                                                            <td>".$TIMESTAMP."</td>
                                                            <td><a href='php/receipt.php?receipt_no=$receipt_no&index_no=$index_no&module_yr=$module_yr' class='btn btn-primary btn-block' title='Reprint Receipt'><i class='icofont-print'></i></a></td>
                                                        </tr>";

                                            $i +=1;

                                        }

                                    }
                       ?>

                     </tbody>
                       <tfoot  style="border-top: 2px solid;">
                         <tr>
                            <td colspan="9"></td>
                         </tr>
                       </tfoot>
                    </table>
                    <br>
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