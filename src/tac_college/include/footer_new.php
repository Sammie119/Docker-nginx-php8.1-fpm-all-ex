<!-- Vendor JS Files -->
<!--  <script src="assets/vendor/jquery/jquery.min.js"></script>-->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- Automatically logout after 5mins of inactiveness..............................-->
  
        <script>
              $(function () {
                  $("body").on('click keypress', function () {
                      ResetThisSession();
                  });
              });

            var timeInSecondsAfterSessionOut = 120; // change this to change session time out (in seconds).
                  var secondTick = 0;

                  function ResetThisSession() {
                      secondTick = 0;
                  }

              function StartThisSessionTimer() {
                  secondTick++;
                  var timeLeft = ((timeInSecondsAfterSessionOut - secondTick) / 60).toFixed(0); // in minutes
              timeLeft = timeInSecondsAfterSessionOut - secondTick; // override, we have 30 secs only 

                  $("#spanTimeLeft").html(timeLeft);

                  if (secondTick > timeInSecondsAfterSessionOut) {
                      clearTimeout(tick);
                      window.location = "php/logout.php";
                      return;
                  }
                  tick = setTimeout("StartThisSessionTimer()", 1000);
              }

              StartThisSessionTimer();
      </script>
  

</body>

</html>