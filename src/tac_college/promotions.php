<?php
    include 'include/header_new.php';
?>

<!-- Javascripts -->
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/jquery.maskedinput.js"></script>

<!--Form css....................................-->
<style>
    body {
        background: #DDDDDD;
    }

    input[type='text']{
        height: 35px;
    }

    hr{
        height:2px; 
        border-width:0; 
        color:gray; 
        background-color:gray;
    }
    
    .card-0 {
        min-height: 110vh;
        background: linear-gradient(-20deg, rgb(255, 255, 255) 50%, #0275d8 50%);
        color: white;
        border: 0px
    }

    .container {
        border-radius: 20px
    }

    .btn {
        letter-spacing: 1px
    }

    select:active {
        box-shadow: none !important;
        outline-width: 0 !important
    }

    select:after {
        box-shadow: none !important;
        outline-width: 0 !important
    }

    input,
    textarea {
        padding: 10px 12px 10px 12px;
        border: 1px solid lightgrey;
        border-radius: 0px !important;
        margin-bottom: 5px;
        margin-top: 2px;
        width: 100%;
        box-sizing: border-box;
        color: #2C3E50;
        font-size: 14px;
        letter-spacing: 1px;
        resize: none
    }

    select:focus,
    input:focus {
        box-shadow: none !important;
        border: 1px solid #2196F3 !important;
        outline-width: 0 !important;
        font-weight: 400
    }

    label {
        margin-bottom: 2px;
        font-weight: bolder;
        font-size: 14px
    }

    input:focus,
    textarea:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: 1px solid #304FFE;
        outline-width: 0
    }

    button:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        outline-width: 0
    }

    .form-control {
        height: calc(2em + .75rem + 3px)
    }

    .card-0 {
        margin-top: 100px;
        margin-bottom: 100px
    }

    .card-1 {
        border-radius: 17px;
        color: black;
        box-shadow: 2px 4px 15px 0px rgb(0, 0, 0, 0.5) !important
    }

    .color input {
        background-color: #f1f1f1
    }

</style>
<!--End------------------------------------------->


<?php
    include 'include/nav_new.php';
?>

<main id="main">

        <div class="info" style="line-height: 15px;">
            <div class="card-body px-sm-4 px-0">
                <div class="row justify-content-center round">
                    <div class="col-lg-10 col-md-12 ">
                        <div class="card shadow-lg card-1">
                            <form action="php/promotions_sub.php" method="POST" name = "promotion_form" id = "promotion_form">
                            <div class="card-body inner-card" style="margin-top: 0%;">
                                <center><h4 style="font-size: 25px; color: #191970; font-family: Times new roman"><b>PROMOTIONS</b></h4></center>
                                <hr>

                                <div class="row justify-content-center" style="width: 70%; margin-left: 15%;">
                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                        <div class="form-group"> <label for="pus_cell">Module (From)</label> 
                                            <select name = "module_from" id="module_from" class="form-control" required style="height: 35px;">
                                              <?php
                                                $qry="SELECT module FROM students_modules";
                                                      $i = 0;
                                                      if ($view_all_query_run = mysqli_query($conn, $qry)){
                                                          while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                                                              $view_module = $view_all_query_row['module'];

                                                              
                                                              
                                                              $i +=1;
                                                          }
                                                          echo'<option>'.$view_module.'</option>';
                                                      }
                                                  ?>
                                            </select></div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                        <div class="form-group"> <label for="red_cell">Year (From)</label> 
                                            <select name="yr_from" class="form-control" style="height: 35px" required>
                                                <?php
                                                    $qry_yr="SELECT DISTINCT year FROM students_modules";
                                                          $i = 0;
                                                          if ($view_all_query_run = mysqli_query($conn, $qry_yr)){
                                                              while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                                                                  $view_year = $view_all_query_row['year'];

                                                                  
                                                                  echo'<option>'.$view_year.'</option>';
                                                                  $i +=1;
                                                              }
                                                          }
                                                      ?>
                                            </select></div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row justify-content-center" style="width: 70%; margin-left: 15%;">
                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                        <div class="form-group"> <label for="pus_cell">Module (To)</label> 
                                            <select name = "module_to" id="module_to" class="form-control" required style="height: 35px;">
                                              <option></option>
                                                <?php
                                                $qry="SELECT modules FROM modules";
                                                      $i = 0;
                                                      if ($view_all_query_run = mysqli_query($conn, $qry)){
                                                          while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                                                              $view_modules = $view_all_query_row['modules'];

                                                              
                                                              echo'<option>'.$view_modules.'</option>';
                                                              $i +=1;
                                                          }
                                                      }
                                                  ?>
                                            </select></div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                        <div class="form-group"> <label for="red_cell">Year (To)</label> 
                                            <select name="yr_to" class="form-control" style="height: 35px" required>
                                                <option><?php echo date('Y');?></option>

                                            </select></div>
                                    </div>
                                </div>
         <!--Buttons..................................................-->
                                <div class="row justify-content-center" style="width: 70%; margin-left: 15%; margin-top: 10px;">
                                    <div class="col-md-12 col-lg-10 col-12">
                                        <div class="row justify-content-end mb-5">
                                            <div class="col-lg-4 col-auto "><button type="submit" class="btn btn-primary btn-block"><small class="font-weight-bold"><i class="icofont-upload-alt"></i> Promote</small></button> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
	

</main><!-- End #main -->

<?php
    include 'include/footer_new.php';
?>