
<style type="text/css">
    a{
        font-weight: bold;
    }

   ul.dropdown-menu li:hover a{
   	  font-weight: bold;
      color: blue;
	  text-decoration:none;
	  outline: 0;
      text-align: center;
    }

    ul.dropdown-menu li a{
      text-align: center;
    }

    body {
        
      font-size: 14px;
      font-weight: bold;
      font-family: "Helvetica Nueue",Arial,Verdana,sans-serif;
      background-color: #DDDDDD;
    }
       
</style>
<div class="container">
            
            <div class="collapse navbar-collapse">
            <div id="logo2"><img src="img/tac_college_logo2.png"> &nbsp;</div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="dashboard.php">Dashboard</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Fees <i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="enter_fees.php">Enter Fees</a></li>
                            <li><a href="payments.php">Payments</a></li>
                            <li><a href="set_fees.php">Set Fees</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Students <i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                        	<li><a href="new_student.php">New Student</a></li>
                            <li><a href="registration.php">Registration</a></li>
                            <li><a href="students_list.php">Students List</a></li>
                            <li><a href="alumni_list.php">Alumni List</a></li>
                            <li><a href="list_to_export.php">Export List</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Accounts <i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="full_payment.php">Payment List</a></li>
                            <li><a href="acccounts.php">Module's Account</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Academia <i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="result_select.php">Enter Exams Results</a></li>
                            <li><a href="view_results.php">View Exams Results</a></li>
                            <li><a href="transcript.php">Transcript</a></li>

                            <?php
                                if ($_SESSION['SESS_MEMBER_ID'] === '01') {

                                   echo '<li><a href="approve_results.php">Approve Exams Results</a></li></li>';
                                   echo '<li><a href="reg_courses.php">Registered Courses</a></li></li>';
                                }
                                
                            ?>
                            <li><a href="file-upload-download/index.php">Upload Handouts</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Inventories <i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="item_receipt.php">Get Receipt</a></li>
                            <li><a href="inventory_stock.php">Stock</a></li>
                        </ul>
                    </li>
                    <?php
                        if ($_SESSION['SESS_MEMBER_ID'] === '01') {

                           echo '<li><a href="promotions.php">Promotion</a></li>';
                        }
                        
                    ?>
                    <li class="dropdown">
                        <a href="cert_in_ministry.php">Cert. In Ministry</a>
                    </li>
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['SESS_USERNAME']; ?> <i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="edit_student_details.php">Student Details</a></li>
                            <li><a href="user_profile.php">Profile</a></li>
                            <li><a href="php/logout.php" title="Logout" class="hov">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <script type="text/javascript">
        
            history.pushState(null, null, location.href);
            window.onpopstate = function(){
                history.go(1);
            }
        
        </script>