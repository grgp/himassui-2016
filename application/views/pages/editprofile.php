<?php
      if(!isset($_SESSION["userlogin"])){
        header("Location: home");
      }
      $newnama = "";
      $newasal = "";
      $newjurusan = "";
      $newemail = "";
      $newhp = "";
      $username = $_SESSION["userlogin"];

      getattribute($username);

         
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

      function getattribute($username){
          $conn = connectDB();
          $sql = "SELECT * FROM peserta WHERE username='$username'";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
          $newnama = $row['nama'];
          $newasal = $row['asal'];
          $newjurusan = $row['jurusan'];
          $newemail = $row['email'];
          $newhp = $row['nama'];
          $flag = false;
          
          if(isset($_POST['nama'])) {
            if ($_POST['nama'] !== '') {
              $newnama = $_POST['nama'];
              $flag = true;
             } 
          }

          if(isset($_POST['asal'])) {
            if ($_POST['asal'] !== '') {
                $newasal = $_POST['asal'];
                $flag = true;
             }              
          }

          if(isset($_POST['jurusan'])) {  
            if ($_POST['jurusan'] !== '') {
                $newjurusan = $_POST['jurusan'];
                $flag = true;
             }  
          }

          if(isset($_POST['email'])) {  
            if ($_POST['email'] !== '') {
              $newemail = $_POST['email'];
              $flag = true; 
            }       
          }

          if(isset($_POST['hp'])) {
            if ($_POST['hp'] !== '') {
              $newhp = $_POST['hp'];
              $flag = true;
            }       
          }

          if ($flag) {
           
            $conn = connectDB();
           
            $sql = "UPDATE peserta SET nama = '$newnama', asal = '$newasal', jurusan = '$newjurusan', email = '$newemail', hp = '$newhp' WHERE username = '$username'";
            mysqli_query($conn, $sql);
          }
        }
      }

  ?>

  <div class = "container">
  	<div class="panel panel-default profpanel center"> 
      <div class="panel-body">
      	<ul class="nav nav-tabs">
          <li role="presentation"><a href="profile">Profile</a></li>
          <li role="presentation" class="active"><a href="editprofile">Edit Profile</a></li>
          <li role="presentation"><a href="changepassword">Ganti Password</a></li>
          <li role="presentation"><a href="buktipembayaran">Upload Foto Pembayaran</a></li>
        </ul>
    		<form class="form-signin" action = "" method = "POST">
          <h2 class="form-signin-heading">Edit Profile</h2>
          <input name="nama" class="form-control" placeholder="Nama">          
          <input name="asal" class="form-control" placeholder="Asal Sekolah">
          <label for="jurusan">Pilihan Kelompok Ujian:</label>
          <select name="jurusan" class="form-control" required>
            <option value="Saintek" > Saintek </option>
            <option value="Soshum"> Soshum </option>
          </select>
          <input type = "email" name="email" class="form-control" placeholder="Email">
          <input name="hp" class="form-control" placeholder="Nomor HP">
          <button class="btn btn-lg btn-primary btn-block" type="submit">Edit</button>
    		</form>
    	</div>
    </div>
  </div>