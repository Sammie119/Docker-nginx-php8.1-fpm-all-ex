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

    .btn {
        letter-spacing: 1px
        color: #fff;
    }

    a {
        color: #fff;
    }

    a:hover {
        color: #fff;
    }

    button:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        outline-width: 0
    }

    .bott {
        margin-top: 15px;
        margin-bottom: 15px;
        border-radius: 10px;
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
                    <h4 style="font-size: 25px; color: #191970; font-family: Times new roman; font-weight: bold;">STUDENTS LIST</h4>
                    <hr>

                    <table border="0" align="center" width="100%" id="example" class="display">
                      <thead>
                        <tr style="font-weight: bold; font-size: 17px; text-align: center; border-bottom: 2px solid;">
                            <td width="2%">#</td>
                            <td width="8%">Index No.</td>
                            <td width="25%">Name</td>
                            <td width="5%">Gender</td>
                            <td width="10%" nowrap>Date of Birth</td>
                            <td width="20%">Address</td>
                            <td width="8%">Tel No.</td>
                            <td width="8%">Home Town</td>
                            <td width="5%">Marital Status</td>
                            <td width="5%">Sem</td>
                            <td width="4%">DT</td>
                        </tr>
                       </thead>
                       <tbody style="text-transform: uppercase; font-size: 14px;">
                        <?php
                            $qry="SELECT student.index_no AS index_no, title, surname, fname, othername, gender, address, tel, home_town, dob, m_status, sem FROM student, students_modules WHERE student.index_no = students_modules.index_no AND student.active = 'Yes'";
                                    $i = 1;
                                    if ($view_all_query_run = mysqli_query($conn, $qry)){
                                        while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                                            $index_no = $view_all_query_row['index_no'];
                                            $title = $view_all_query_row['title'];
                                            $surname = $view_all_query_row['surname'];
                                            $fname = $view_all_query_row['fname'];
                                            $othername = $view_all_query_row['othername'];
                                            $gender = $view_all_query_row['gender'];
                                            $address = $view_all_query_row['address'];
                                            $tel = $view_all_query_row['tel'];
                                            $home_town = $view_all_query_row['home_town'];
                                            $dob = $view_all_query_row['dob'];
                                            $m_status = $view_all_query_row['m_status'];
                                            $sem = $view_all_query_row['sem'];
                                            

                                            $full_name = $title." ".$fname." ".$othername." ".$surname;
                                        
                                                echo    "<tr style='border-bottom: 1px solid;'>
                                                            <td align = 'center'>".$i."</td>
                                                            <td align = 'center'>".$index_no."</td>
                                                            <td style='text-align: left; padding-left: 10px;'>".$full_name."</td>
                                                            <td>".$gender."</td>
                                                            <td>".$dob."</td>
                                                            <td>".$address."</td>
                                                            <td>".$tel."</td>
                                                            <td>".$home_town."</td>
                                                            <td>".$m_status."</td>
                                                            <td>".$sem."</td>
                                                            <td><a href='php/print_student_detail.php?index_no=$index_no&sem=$sem' class='btn btn-primary btn-block' title='Student Details'><i class='icofont-print'></i></a></td>
                                                        </tr>";

                                            $i +=1;
                                             
                                        }
                                        
                                    }
                        ?>
                        
                     </tbody>
                    </table>
                    <button class="btn btn-primary bott"><a href='php/print_students_list.php'><i class="icofont-print"></i> ...Print View......</a></button> 
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
                    'copy', 'excel', 'print'
                ]
            } );
        } );
    </script>

<?php
    include 'include/footer_new.php';
?>