	<aside class="bg-dark">
    <div class="container text-center">
      <div class="col-lg-8 col-lg-offset-2 text-center">
      <h2 class="section-heading">Placed Reserved For Sponsors and Media Partners</h2>
      <hr class="primary">
      </div>
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