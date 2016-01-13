<?php
    
    session_start();
      
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

<!DOCTYPE html>
<html lang="en">
<head>
  <title>The Power Of Bootstrap</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type = "text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type = "text/css" href="css/csssignin.css">
</head>
<body> 
  <div class = "container">
    <form class="form-signin" action = "" method = "POST">
          <h2 class="form-signin-heading">Your Profile</h2>
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
          echo "<h2> Nama :".$nama."</h2>";
          echo "<h2> Asal :".$asal."</h2>";
          echo "<h2>".$jurusan."</h2>";
          echo "<h2>".$email."</h2>";
          echo "<h2>".$hp."</h2>";
          echo "<h2>".$status."</h2>";
          echo "<h2>".$nomorujian."</h2>";
          ?>
    </form>
     
  </div>
</body>
<script src = "script/jquery-2.1.4.min.js"> </script>
<script src = "bootstrap/js/bootstrap.min.js"> </script>
<script src = "script/jsminimum.js"> </script>
</html>
