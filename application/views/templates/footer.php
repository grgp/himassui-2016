	<aside class="bg-dark">
    <div class="container text-center">
          <p>Copyright 2016<br>made by Akbar Septriyan and George Pitoy</p>
    </div>
  </aside>

  <!-- jQuery -->
  <script src="assets/js/jquery.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="assets/js/bootstrap.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="assets/js/jquery.easing.min.js"></script>
  <script src="assets/js/jquery.fittext.js"></script>
  <script src="assets/js/wow.min.js"></script>

  <!-- Custom Theme JavaScript -->
  <?php
  if ( basename($_SERVER['PHP_SELF']) == "index.php" ) {
  	echo '<script src="assets/js/creative.js"></script>';
  } else {
  	echo '<script src="assets/js/creative.off.js"></script>';
  }
  ?>

</body>
</html>