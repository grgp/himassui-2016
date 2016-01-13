<?php
      if(!isset($_SESSION["masterlogin"])){
        header("Location: master");
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

     if(isset($_POST['username'])) {
          $username = $_POST['username'];
          $kode = "";
          $jurusan = "";
          $nomor = "";
          $conn = connectDB();
          $sql = "SELECT * FROM peserta WHERE username='$username'";
          $result = mysqli_query($conn, $sql);
          $sqldua = "SELECT * FROM peserta ORDER BY nomorujian DESC";
          $resultdua = mysqli_query($conn, $sqldua);
          echo "<br> <br><br><br><br><br><br> haiii";
          if(mysqli_num_rows($result) > 0) {
            echo "<br> <br><br><br><br><br><br> haiii kedua ";
             $row = mysqli_fetch_assoc($result);
             $jurusan = $row['jurusan'];
             $rowdua = mysqli_fetch_assoc($resultdua);
             $nomor = ($rowdua['nomorujian']+1);
             $sqltiga = "SELECT * FROM peserta WHERE jurusan = '$jurusan' ORDER BY nomorujian DESC";
             $resulttiga = mysqli_query($conn, $sqltiga);
             $rowtiga = mysqli_fetch_assoc($resulttiga);           
             $kode = $rowtiga['tipesoal'];
             if ($kode === '1') {
               $kode = '2';
             }
             else{
              $kode = '1';
             }
             $sqlempat = "UPDATE peserta SET status = '1', nomorujian = '$nomor', tipesoal = '$kode' WHERE username = '$username'";
             $resultempat = mysqli_query($conn, $sqlempat);
             echo "sukses gan"; 
             mysqli_close($conn);
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
          <h2 class="form-signin-heading">Generator nomor Ujian</h2>
          <input name="username" class="form-control" placeholder="username">          
          <button class="btn btn-lg btn-primary btn-block" type="submit">Generate</button>
    </form>
     
  </div>
</body>
<script src = "script/jquery-2.1.4.min.js"> </script>
<script src = "bootstrap/js/bootstrap.min.js"> </script>
<script src = "script/jsminimum.js"> </script>
</html>
