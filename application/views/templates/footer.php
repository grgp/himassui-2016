	<aside class="bg-dark">
    <div class="container text-center" id="bawah">
      <div class="col-lg-8 col-lg-offset-2 text-center">
      <h2 class="section-heading">Sponsored By</h2>
      <hr class="primary">
      <img src="assets/img/bi.png" class="img-responsive" alt="" width = "500px">
      <img src="assets/img/sumsel.png" class="img-responsive" alt="" width = "500px">
      <h2 class="section-heading">Media Partners</h2>
      <hr class="primary">
      <span>
      <img src="assets/img/rri.png" class="img-responsive" alt="" width = "100px">
      <img src="assets/img/bt.jpeg" class="img-responsive" alt="" width = "100px">
      <img src="assets/img/jess.png" class="img-responsive" alt="" width = "100px">
      <img src="assets/img/sono.png" class="img-responsive" alt="" width = "100px">
      </span>
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