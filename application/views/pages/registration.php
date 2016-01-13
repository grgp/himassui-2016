<?php
    if(isset($_SESSION["userlogin"])){
        header("Location: home");
      }
      $conn = connectDB();
      $sql = "SELECT * FROM peserta ORDER BY nomorujian DESC";
      $result = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['nomorujian'] >= '1500') {
          header("Location: home");
        }
      }    
      if(isset($_POST['username'])) {  
        
          insertuser($_POST['username'], $_POST['password'], $_POST['nama'], $_POST['asal'], $_POST['email'], $_POST['hp'], $_POST['jurusan']);
          $_SESSION['userlogin'] = $_POST['username'];
          header("Location: home");
       }
      function insertuser($username, $password, $nama, $asal, $email, $hp, $jurusan) {
        $conn = connectDB();
        $sql = "INSERT into peserta (username, password, nama, asal, email, hp, jurusan) VALUES('$username','$password', '$nama', '$asal', '$email', '$hp', '$jurusan')";
        mysqli_query($conn, $sql);
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

      function cekuser($username){
          $conn = connectDB();
          $sql = "SELECT username FROM peserta WHERE username='$username'";
          $result = mysqli_query($conn, $sql);
          if(mysqli_num_rows($result) > 0) {
             mysqli_close($conn);
             return true;
          }
          return false;
      }

?>

<body> 
  <div class="container">
    <div class="panel panel-default logpanel center">
      <div class="panel-body">
        <form class="form-signin" action = "" method = "POST">
          <h2 class="form-signin-heading">Daftar Akun</h2>
          <input name="username" class="form-control" placeholder="Username" required>
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <input name="nama" class="form-control" placeholder="Nama" required>          
          <input name="asal" class="form-control" placeholder="Asal Sekolah" required>
           <label for="jurusan">Pilihan Kelompok Ujian:</label>
          <select name="jurusan" class="form-control" required>
            <option value="Saintek" > Saintek </option>
            <option value="Soshum"> Soshum </option>
          </select>
          <input type = "email" name="email" class="form-control" placeholder="Email" required>
          <input name="hp" class="form-control" placeholder="Nomor HP" required>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        </form>
      </div>
    </div>
  </div>
</body>
<script src = "script/jquery-2.1.4.min.js"> </script>
<script src = "bootstrap/js/bootstrap.min.js"> </script>
<script src = "script/jsminimum.js"> </script>
</html>
