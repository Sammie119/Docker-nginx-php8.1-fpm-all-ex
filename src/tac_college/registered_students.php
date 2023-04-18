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

<script type="text/javascript">
    window.onload = function(){


      $('#module_yr').on('change',function(){   
            var module_yr = 'module_yr=' +$(this).val();
            $.post('php/get_registered_student.php', module_yr, processResposeviewList);
        });

        function processResposeviewList(data) {
            $("#tbody").empty();
        $("#tbody").html(data);
        };
        
    };

  
  </script>

<?php
    include 'include/nav_new.php';
?>

<main id="main" style="width: 98%; margin-left: 1%; margin-top: 1%;">
    
    <div class="card shadow-lg card-1" style="width: 100%;">
        <form method="POST" name = "set_fees_form" id = "set_fees_form">
        <div class="card-body inner-card" style="margin-top: 0%;">
            <center><h4 style="font-size: 25px; color: #191970; font-family: Times new roman"><b>REGISTERED STUDENTS LIST</b></h4></center>
            <hr>
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="form-group"> <label for="red_cell">Select Module/Date</label> 
                        <select id="module_yr" class="form-control" style="height: 35px;" style="width: 20%;">
                            <option></option>
                            <?php
                                $qry="SELECT module_yr, feeID FROM fees ORDER BY feeID DESC";
                                    $i = 0;
                                    if ($view_all_query_run = mysqli_query($conn, $qry)){
                                        while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
            
                                            $module_yr = $view_all_query_row['module_yr'];                                                     

                                            $i +=1;
                                            echo'<option>'.$module_yr.'</option>';                           
                                        }
                                                                
                                    }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <div id="tbody">
            <hr>

        </div>
    </div>
            
</main><!-- End #main -->

<?php
    include 'include/footer_new.php';
?>