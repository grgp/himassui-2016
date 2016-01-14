	<aside class="bg-dark">
    <div class="container text-center" id="bawah">
      <div class="col-lg-10 col-lg-offset-1 text-center">
        <div class="sponsor col-lg-6">
          <h3 class="section-heading">Sponsored By</h3>
          <hr class="primary">
          <img src="assets/img/bi.png" class="img-responsive" alt="" width = "500px">
          <img src="assets/img/sumsel.png" class="img-responsive" alt="" width = "500px">
        </div>
        <div class="medpar col-lg-6">
          <h3 class="section-heading">Media Partners</h3>
          <hr class="primary">
          <span>
          <img src="assets/img/rri.png" class="img-responsive" alt="" width = "100px">
          <img src="assets/img/bt.jpeg" class="img-responsive" alt="" width = "100px">
          <img src="assets/img/jess.png" class="img-responsive" alt="" width = "100px">
          <img src="assets/img/sono.png" class="img-responsive" alt="" width = "100px">
          </span>
        </div>
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