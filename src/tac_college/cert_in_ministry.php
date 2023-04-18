<?php
    include 'include/header_new.php';
?>

 <script src="js/jquery.min.js"></script>

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

    p {
        font-size: 15px;
        line-height: 0px !important;
        font-weight: 500
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

    #cert {
            border: 1px solid; 
            font-size: 30px; 
            padding: 10px;
            border-top-right-radius: 20px;
            border-top-left-radius: 20px;
            border-color: #191970;
            background-color: #191970;
            color: #fff;
            text-align: center;
            font-weight: bolder;
        }

    #menu{
            font-size: 20px;
            color: #191970;
            padding-top: 15px;
            text-align: center;
        }


</style>
<!--End------------------------------------------->

<?php
    include 'include/nav_new.php';
?>

<main id="main">
	<div class="info">
        <div class="card-body px-sm-4 px-0">
            <div class="row justify-content-center round">
                    <div class="col-lg-10 col-md-12 ">
                        <div id="logo" style="text-align: center;"><img src="img/tac_college_logo122.png"> &nbsp;</div>

						<div style="clear: both;"></div>

                        <div  id = "cert">CERTIFICATE IN MINISTRY</div>
                        <div id="menu"><a href="ffdfdfdf">Students</a> | <a href="ffdfdfdf">Fees</a> | <a href="ffdfdfdf">Payments</a> | <a href="ffdfdfdf">List</a></div>

                        
                        </div>
                    </div>
            </div>

        </div>
    </div>

</main><!-- End #main -->

<?php
    include 'include/footer_new.php';
?>