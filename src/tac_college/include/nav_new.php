<body style="background: #DDDDDD">

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <ul>
          <li><i class="icofont-envelope"></i><a href="mailto:taccollege@tacmail.org">taccollege@tacmail.org</a></li>
          <li><i class="icofont-phone"></i>0244639401</li>
          <li><i class="icofont-clock-time icofont-flip-horizontal"></i> Tues - Fri 6am - 6pm</li>
        </ul>

      </div>
      <div class="cta">
        <a href="dashboard.php" class="scrollto">The Apostolic College</a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container d-flex">

      <div class="logo mr-auto">
        <!--<h1 class="text-light"><a href="index.html"><span>Sammav</span></a></h1>-->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href=""><img src="img/tac_college_logo11.png" alt="" class="img-fluid"></a>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li></li>
          <li><a href="dashboard.php">Dashboard</a></li>

        <?php //if(($_SESSION['ROLE'] === 'IT Officer') || ($_SESSION['ROLE'] === 'Accountant')): ?>
          <li class="drop-down"><a href="">Fees</a>
            <ul>
              <li><a href="enter_fees.php">Enter Fees</a></li>
              <li><a href="payments.php">Payments</a></li>
              <li><a href="set_fees.php">Set Fees</a></li>
            </ul>
          </li>
        <?php //endif; ?>

        <?php if(($_SESSION['ROLE'] === 'IT Officer') || ($_SESSION['ROLE'] === 'Admin')): ?>
          <li class="drop-down"><a href="">Students</a>
            <ul>
              <li><a href="new_student.php">New Student</a></li>
              <li><a href="registration.php">Registration</a></li>
              <li><a href="students_list.php">Students List</a></li>
              <li><a href="alumni_list.php">Alumni List</a></li>
            </ul>
          </li>
        <?php endif; ?> 


        <?php if(($_SESSION['ROLE'] === 'IT Officer') || ($_SESSION['ROLE'] === 'Accountant')): ?>
          <li class="drop-down"><a href="">Accounts</a>
            <ul>
              <li><a href="daily_payments.php">Payments Received</a></li>
              <li><a href="full_payment.php">Debtors List</a></li>
              <li><a href="acccounts.php">Module's Account</a></li>
            </ul>
          </li>
        <?php endif; ?>

        <?php if(($_SESSION['ROLE'] === 'IT Officer') || ($_SESSION['ROLE'] === 'Admin')): ?>
          <li class="drop-down"><a href="">Academia</a>
            <ul>
              <li><a href="result_select.php">Enter Exams Results</a></li>
              <li><a href="view_results.php">View Exams Results</a></li>
              <li><a href="transcript.php">Transcript</a></li>

              <?php
                if ($_SESSION['ROLE'] === 'IT Officer') {

                    echo '<li><a href="approve_results.php">Approve Exams Results</a></li></li>';
                    echo '<li><a href="reg_courses.php">Registered Courses</a></li></li>';
                    echo '<li><a href="promotions.php">Promotion</a></li>';
                  }
                                
              ?>
              <li><a href="registered_students.php">Registered Students</a></li>
              <li><a href="file-upload-download/index.php">Upload Handouts</a></li>
            </ul>
          </li>
        <?php endif; ?>

        <?php if(($_SESSION['ROLE'] === 'IT Officer') || ($_SESSION['ROLE'] === 'Accountant')): ?>
          <li class="drop-down"><a href="">Inventories</a>
            <ul>
              <li><a href="item_receipt.php">Get Receipt</a></li>
              <li><a href="inventory_stock.php">Stock</a></li>
            </ul>
          </li>

        <?php endif; ?>
          <!--<li class="drop-down"><a href="">Drop Down</a>
              <ul>
                <li><a href="#">Drop Down 1</a></li>
                <li class="drop-down"><a href="#">Drop Down 2</a>
                  <ul>
                    <li><a href="#">Deep Drop Down 1</a></li>
                    <li><a href="#">Deep Drop Down 2</a></li>
                    <li><a href="#">Deep Drop Down 3</a></li>
                    <li><a href="#">Deep Drop Down 4</a></li>
                    <li><a href="#">Deep Drop Down 5</a></li>
                  </ul>
                </li>
                <li><a href="#">Drop Down 3</a></li>
                <li><a href="#">Drop Down 4</a></li>
                <li><a href="#">Drop Down 5</a></li>
              </ul>
            </li> -->
          <li><a href="cert_in_ministry.php">Cert. In Ministry</a></li>
          <li class="drop-down"><a href=""><?php echo $_SESSION['SESS_USERNAME']; ?></a>
            <ul>

            <?php if(($_SESSION['ROLE'] === 'IT Officer') || ($_SESSION['ROLE'] === 'Admin')): ?>
              <li><a href="edit_student_details.php">Student Details</a></li>
            <?php endif; ?>

              <li><a href="user_profile.php">Profile</a></li>
              <li><a href="php/logout.php" title="Logout" class="hov">Logout</a></li>
            </ul>
          </li>

        </ul>
      </nav><!-- .nav-menu -->

    </div>

    <script type="text/javascript">
        
       history.pushState(null, null, location.href);
        window.onpopstate = function(){
            history.go(1);
          }
        
    </script>
  </header><!-- End Header -->