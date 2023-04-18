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

<script type="text/javascript">
        window.onload = function(){
            document.getElementById("index_no").focus();
            
            jQuery(function($){
                   $("#tel").mask("233999999999");
                   $("#index_no").mask("TAC9999/99");
                });

            
//Fetch of Student's details....................................//

        $('#index_no').bind('keyup',function(){   
                var index_no = 'index_no=' +$(this).val();
                $.post('php/get_student_details.php?func=title', index_no, processResponsetitle);
            });

            function processResponsetitle(data) {
               
               $("#title").empty();
               $("#title").html(data);
            };

        $('#index_no').bind('keyup',function(){   
                var index_no = 'index_no=' +$(this).val();
                $.post('php/get_student_details.php?func=surname', index_no, processResponsesurname);
            });

            function processResponsesurname(data) {
               document.getElementById("surname").value = (data);
               
            };

        $('#index_no').bind('keyup',function(){   
                var index_no = 'index_no=' +$(this).val();
                $.post('php/get_student_details.php?func=firstname', index_no, processResponsefirstname);
            });

            function processResponsefirstname(data) {
               document.getElementById("firstname").value = (data);
               
            };

        $('#index_no').bind('keyup',function(){   
                var index_no = 'index_no=' +$(this).val();
                $.post('php/get_student_details.php?func=other_name', index_no, processResponseother_name);
            });

            function processResponseother_name(data) {
               document.getElementById("other_name").value = (data);
               
            };

        $('#index_no').bind('keyup',function(){   
                var index_no = 'index_no=' +$(this).val();
                $.post('php/get_student_details.php?func=gender', index_no, processResponsegender);
            });

            function processResponsegender(data) {
               
               $("#gender").empty();
               $("#gender").html(data);
            };

        $('#index_no').bind('keyup',function(){   
                var index_no = 'index_no=' +$(this).val();
                $.post('php/get_student_details.php?func=address', index_no, processResponseaddress);
            });

            function processResponseaddress(data) {
               document.getElementById("address").value = (data);
               
            };

        $('#index_no').bind('keyup',function(){   
                var index_no = 'index_no=' +$(this).val();
                $.post('php/get_student_details.php?func=email', index_no, processResponseemail);
            });

            function processResponseemail(data) {
               document.getElementById("email").value = (data);
               
            };

        $('#index_no').bind('keyup',function(){   
                var index_no = 'index_no=' +$(this).val();
                $.post('php/get_student_details.php?func=tel', index_no, processResponsetel);
            });

            function processResponsetel(data) {
               document.getElementById("tel").value = (data);
               
            };

        $('#index_no').bind('keyup',function(){   
                var index_no = 'index_no=' +$(this).val();
                $.post('php/get_student_details.php?func=nationality', index_no, processResponsenationality);
            });

            function processResponsenationality(data) {
               document.getElementById("nationality").value = (data);
               
            };

        $('#index_no').bind('keyup',function(){   
                var index_no = 'index_no=' +$(this).val();
                $.post('php/get_student_details.php?func=home_town', index_no, processResponsehome_town);
            });

            function processResponsehome_town(data) {
               document.getElementById("home_town").value = (data);
               
            };

        $('#index_no').bind('keyup',function(){   
                var index_no = 'index_no=' +$(this).val();
                $.post('php/get_student_details.php?func=dob', index_no, processResponsedob);
            });

            function processResponsedob(data) {
               document.querySelector("#dob").valueAsDate = new Date(data);
               
            };

        $('#index_no').bind('keyup',function(){   
                var index_no = 'index_no=' +$(this).val();
                $.post('php/get_student_details.php?func=pob', index_no, processResponsepob);
            });

            function processResponsepob(data) {
               document.getElementById("pob").value = (data);
               
            };

        $('#index_no').bind('keyup',function(){   
                var index_no = 'index_no=' +$(this).val();
                $.post('php/get_student_details.php?func=m_status', index_no, processResponsem_status);
            });

            function processResponsem_status(data) {
               $("#m_status").empty();
               $("#m_status").html(data);
               
            };

        $('#index_no').bind('keyup',function(){   
                var index_no = 'index_no=' +$(this).val();
                $.post('php/get_student_details.php?func=profession', index_no, processResponseprofession);
            });

            function processResponseprofession(data) {
               document.getElementById("profession").value = (data);
               
            };

        $('#index_no').bind('keyup',function(){   
                var index_no = 'index_no=' +$(this).val();
                $.post('php/get_student_details.php?func=employer', index_no, processResponseemployer);
            });

            function processResponseemployer(data) {
               document.getElementById("employer").value = (data);
               
            };

        $('#index_no').bind('keyup',function(){   
                var index_no = 'index_no=' +$(this).val();
                $.post('php/get_student_details.php?func=position', index_no, processResponseposition);
            });

            function processResponseposition(data) {
               document.getElementById("position").value = (data);
               
            };

        $('#index_no').bind('keyup',function(){   
                var index_no = 'index_no=' +$(this).val();
                $.post('php/get_student_details.php?func=b_address', index_no, processResponseb_address);
            });

            function processResponseb_address(data) {
               document.getElementById("b_address").value = (data);
               
            };

        $('#index_no').bind('keyup',function(){   
                var index_no = 'index_no=' +$(this).val();
                $.post('php/get_student_details.php?func=module', index_no, processResponsemodule);
            });

            function processResponsemodule(data) {
               $("#module").empty();
               $("#module").html(data);
               
            };

        $('#index_no').bind('keyup',function(){   
                var index_no = 'index_no=' +$(this).val();
                $.post('php/get_student_details.php?func=program', index_no, processResponseprogram);
            });

            function processResponseprogram(data) {
               $("#program").empty();
               $("#program").html(data);
               
            };

//Restrictions .................................................

            $('#surname').on("input", function(){
                var regexp = /[^a-zA-Z -]/g;

                if ($(this).val().match(regexp)){
                    $(this).val($(this).val().replace(regexp, ''));
                }
               });


            $('#firstname').on("input", function(){
                var regexp = /[^a-zA-Z]/g;

                if ($(this).val().match(regexp)){
                    $(this).val($(this).val().replace(regexp, ''));
                }
               });
            

            $('#other_name').on("input", function(){
                var regexp = /[^a-zA-Z -]/g;

                if ($(this).val().match(regexp)){
                    $(this).val($(this).val().replace(regexp, ''));
                }
               });


            $('#nationality').on("input", function(){
                var regexp = /[^a-zA-Z]/g;

                if ($(this).val().match(regexp)){
                    $(this).val($(this).val().replace(regexp, ''));
                }
               });
            
        };

//Age Calculator.............................................................
        
            function myAgeValidation() {
             
                var lre = /^\s*/;
                var datemsg = "";
                
                var inputDate = document.getElementById("dob").value;
                inputDate = inputDate.replace(lre, "");
                document.getElementById("dob").value = inputDate;
                getAge(new Date(inputDate));
             
            }
             
            function getAge(birth) {
             
                var today = new Date();
                var nowyear = today.getFullYear();
                var nowmonth = today.getMonth() + 1;
                var nowday = today.getDate();
             
                var birthyear = birth.getFullYear();
                var birthmonth = birth.getMonth() + 1;
                var birthday = birth.getDate();
             
                var age = nowyear - birthyear;
                var age_month = nowmonth - birthmonth;
                var age_day = nowday - birthday;


                if(age_month < 0 || (age_month == 0 && age_day < 0) ) {
                        age = parseInt(age) -1;
                        //age = age -1;
                    }
                document.getElementById("aged").innerHTML = age;
             
            }

    
    </script>

<?php
    include 'include/nav_new.php';
?>

<main id="main">

        <div class="info" style="line-height: 15px;">
            <div class="card-body px-sm-4 px-0">
                <div class="row justify-content-center round">
                    <div class="col-lg-10 col-md-12 ">
                        <div class="card shadow-lg card-1">
                            <form action="php/edit_student_details_sub.php" method="POST" onsubmit = "return validateForm()" name = "stud_form" id = "stud_form">
                            <div class="card-body inner-card" style="margin-top: 0%;">
                                <center><h4 style="font-size: 25px; color: #191970; font-family: Times new roman"><b>EDIT STUDENT INFOMATION</b></h4></center>
                                <hr>

                                <div class="row justify-content-center" style="width: 70%; margin-left: 15%;">
                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                        <div class="form-group"> <label for="pus_cell">Index Number</label> 
                                            <input type="text" name="index_no" class = "form-control" id="index_no" required></div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                        <div class="form-group"> <label for="red_cell">Title</label> 
                                            <select name="title" class="form-control" required style="height: 35px;">
                                                <option id="title"></option>
                                                <?php
                                                    $qry="SELECT title FROM title";
                                                        $i = 0;
                                                        if ($view_all_query_run = mysqli_query($conn, $qry)){
                                                            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                                
                                                                $view_title = $view_all_query_row['title'];                                                     

                                                                $i +=1;
                                                                echo'<option>'.$view_title.'</option>';                         
                                                            }
                                                                                    
                                                        }
                                                ?>
                                            </select></div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                        <div class="form-group"> <label for="epi_cell">Surname</label> 
                                            <input type="text" name="surname" class = "form-control" id="surname" required></div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                        <div class="form-group"> <label for="epi_cell">First Name</label> 
                                            <input type="text" name="firstname" class = "form-control" id="firstname" required></div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                        <div class="form-group"> <label for="pus_cell">Other Name</label> 
                                            <input type="text" name="other_name" class = "form-control" id="other_name"></div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                        <div class="form-group"> <label for="red_cell">Gender</label> 
                                            <select name="gender" class="form-control" required style="height: 35px">
                                                <option id="gender"></option>
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select></div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-12 col-lg-10 col-12" style="margin-left: 26.5%;">
                                        <div class="form-group"> <label for="lab_no">Permanent Address</label> 
                                            <input type="text" name="address" id="address" class="form-control" style="width: 67%;"></div>
                                    </div>
                                </div>
                                <div class="row justify-content-center" style="width: 70%; margin-left: 15%;">
                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                        <div class="form-group"> <label for="epi_cell">Email</label> 
                                            <input type="email" name="email" id="email" class="form-control" style="height: 35px;"></div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                        <div class="form-group"> <label for="epi_cell">Mobile Number</label> 
                                            <input type="text" name="tel" class="form-control" id="tel" required></div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                        <div class="form-group"> <label for="pus_cell">Nationality</label> 
                                            <input type="text" name="nationality" class="form-control" id="nationality"></div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                        <div class="form-group"> <label for="red_cell">Home Town</label> 
                                            <input type="text" name="home_town" id="home_town" class="form-control"></div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                        <div class="form-group"> <label for="epi_cell">Date of Birth</label> 
                                            <input type="date" name="dob" id="dob" max="<?php echo date('Y-m-d');?>" onchange="Javascript:myAgeValidation()" required style="height: 35px;"> Age: <label id="aged">0</label></div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                        <div class="form-group"> <label for="epi_cell">Place of Birth</label> 
                                            <input type="text" name="pob" id="pob" class="form-control"></div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                        <div class="form-group"> <label for="epi_cell">Marital Status</label> 
                                            <select name="status" class="form-control" required style="height: 35px;">
                                                <option id="m_status"></option>
                                                <option>Married</option>
                                                <option>Single</option>
                                                <option>Divorced</option>
                                                <option>Separated</option>
                                            </select></div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                        <div class="form-group"> <label for="epi_cell">Profession</label> 
                                            <input type="text" name="profession" id="profession" class="form-control"></div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                        <div class="form-group"> <label for="epi_cell">Name of Employer</label> 
                                            <input type="text" name="employer" id="employer" class="form-control"></div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                        <div class="form-group"> <label for="epi_cell">Position</label> 
                                            <input type="text" name="position" id="position" class="form-control"></div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                        <div class="form-group"> <label for="epi_cell">Business Address</label> 
                                            <input type="text" name="b_address" id="b_address" class="form-control"></div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                        <div class="form-group"> <label for="epi_cell">Module</label> 
                                            <select name="module" placeholder="Select Module of Study" class="form-control" required style="height: 35px;">
                                                <option id="module"></option>
                                                <?php
                                                    $qry="SELECT modules FROM modules";
                                                        $i = 0;
                                                        if ($view_all_query_run = mysqli_query($conn, $qry)){
                                                            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                                
                                                                $view_modules = $view_all_query_row['modules'];                                                     

                                                                $i +=1;
                                                                echo'<option>'.$view_modules.'</option>';                           
                                                            }
                                                                                    
                                                        }
                                                ?>
                                            </select></div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-12 col-lg-10 col-12" style="margin-left: 26.5%;">
                                        <div class="form-group"> <label for="lab_no">Program</label> 
                                            <select name="program" placeholder="Select Program of Study" class="form-control" required style="height: 35px; width: 67%;">
                                                <option id="program"></option>
                                                <?php
                                                    $qry="SELECT program FROM programs";
                                                        $i = 0;
                                                        if ($view_all_query_run = mysqli_query($conn, $qry)){
                                                            while ($view_all_query_row = mysqli_fetch_assoc($view_all_query_run)){
                                
                                                                $view_program = $view_all_query_row['program'];                                                     

                                                                $i +=1;
                                                                echo'<option>'.$view_program.'</option>';                           
                                                            }
                                                                                    
                                                        }
                                                ?>
                                            </select></div>
                                    </div>
                                </div>
        
         <!--Buttons..................................................-->
                                <div class="row justify-content-center" style="width: 70%; margin-left: 15%; margin-top: 10px;">
                                    <div class="col-md-12 col-lg-10 col-12">
                                        <div class="row justify-content-end mb-5">
                                            <div class="col-lg-4 col-auto "><button type="reset" class="btn btn-primary btn-block"><small class="font-weight-bold"><i class="icofont-refresh"></i> Clear</small></button> </div>
                                            <div class="col-lg-4 col-auto "><button type="submit" class="btn btn-primary btn-block"><small class="font-weight-bold"><i class="icofont-save"></i> Save</small></button> </div>
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