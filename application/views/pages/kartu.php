	<?php 
	if(!isset($_SESSION["userlogin"])){
         // header('Location: http://www.himassui.com/UIGTB2016/index.html');
        header('Location: home');
      }
     function connectDB() {
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "himassui_to2016";
          $conn = mysqli_connect($servername, $username, $password, $dbname);
          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          }
          return $conn;
  }
		$username = $_SESSION["userlogin"];  
		$conn = connectDB();
		$sql = "SELECT * FROM peserta WHERE username='$username'";
		$idpeserta = "";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['status'] === '0') {
          header("Location: home");
        }
      }   
	?>
	<body>

		<div class="container">
			<div class="panel panel-default logpanel center">
	  		<div class="panel-body">
				
					<form class="form-signin" action="imggen" method="post" enctype="multipart/form-data">
						<h2 class="form-signin-heading">Upload Foto Anda</h2>
						<label>Gambar Pas Foto</label>
						<input type="file" name="selectedFile">
            <br>
		    		<p>(photo must be in JPEG or PNG format and under 5 MB)</p>
            <br>
						<input class="btn btn-lg btn-primary btn-block" name="submit" type="submit" value="Submit">

					</form>
				</div>
			</div>
		</div>
