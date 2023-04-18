<?php
include '../include/connect.php';
?>
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

<div style="width: 90%; margin-left: 5%;">
<?php    
    $sem = $_POST['sem'];

    echo '
        <table border="0" align="center" width="100%" id="example" class="display">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th width="10%">Index No.</th>
                            <th width="40%">Name</th>
                            <th width="10%">Module</th>
                            <th width="10%">Amount</th>
                            <th width="10%" nowrap>Receipt No.</th>
                            <th width="10%">Mode</th>
                            <th width="10%">Date</th>
                        </tr>
                       </thead>
                       <tbody style="text-transform: uppercase;">';

    $qry="SELECT student.index_no AS index_no, title, surname, fname, othername, module_yr, amount, receipt_no, mode, TIMESTAMP FROM student, fees_episode WHERE student.index_no = fees_episode.index_no AND dtime = '$sem' ORDER BY receipt_no DESC";
                                    $i = 1;
                                    $total_amount = 0;
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

                                            $total_amount += $amount;

                                                echo    "<tr style='border-bottom: 1px solid;'>
                                                            <td>$i</td>
                                                            <td align = 'left'>".$index_no."</td>
                                                            <td style='text-align: left; padding-left: 30px;'>".$full_name."</td>
                                                            <td>".$module_yr."</td>
                                                            <td>".number_format($amount,2)."</td>
                                                            <td>".$receipt_no."</td>
                                                            <td>".$mode."</td>
                                                            <td>".$TIMESTAMP."</td>
                                                        </tr>";

                                            $i +=1;

                                        }

                                    }

        echo '</tbody>
                       <tfoot style="border-top: 2px solid;">
                         <tr>
                            <th colspan="4" align="center">TOTAL</th>
                            <th colspan="5">'.number_format($total_amount,2).'</th>
                         </tr>
                       </tfoot>
                    </table>';

?>
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
</div>