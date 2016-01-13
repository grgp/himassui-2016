<?php
if(!isset($_SESSION["userlogin"])){
        header("Location: home");
      }
      $nama = "";
      $asal = "";
      $jurusan = "";
      $email = "";
      $hp = "";
      $status = "";
      $nomorujian = "";
      $username = $_SESSION["userlogin"];
         
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
          $nama = $row['nama'];
          $asal = $row['asal'];
          $jurusan = $row['jurusan'];
          $email = $row['email'];
          $hp = $row['hp'];

            if ($row['status'] === '0') {
              $status = 'belum bayar';
              $nomorujian = '-';
            }
          }
      }

  ?>

  <div class="container">
    <div class="panel panel-default profpanel center"> 
      <div class="panel-body">
        <ul class="nav nav-tabs">
          <li role="presentation" class="active"><a href="profile">Profile</a></li>
          <li role="presentation"><a href="editprofile">Edit Profile</a></li>
          <li role="presentation"><a href="changepassword">Ganti Password</a></li>
          <li role="presentation"><a href="buktipembayaran">Upload Foto Pembayaran</a></li>
        </ul>
        <div class="profdetails">
        <h2 class="form-signin-heading">Profile Anda</h2>
          <?php 
          $conn = connectDB();
          $sql = "SELECT * FROM peserta WHERE username='$username'";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
          $nama = $row['nama'];
          $asal = $row['asal'];
          $jurusan = $row['jurusan'];
          $email = $row['email'];
          $hp = $row['hp'];

            if ($row['status'] === '0') {
              $status = 'belum bayar';
              $nomorujian = '-';
            }
          }
          echo "<h4>Nama: ".$nama."</h4>";
          echo "<h4>Asal: ".$asal."</h4>";
          echo "<h4>Jurusan: ".$jurusan."</h4>";
          echo "<h4>Email: ".$email."</h4>";
          echo "<h4>No. HP: ".$hp."</h4>";
          echo "<h4>Status: ".$status."</h4>";
          echo "<h4>No. Ujian: ".$nomorujian."</h4>";
          ?>
        </div>
      </div>
    </div>
  </div>
