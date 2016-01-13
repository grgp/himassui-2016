<?php
      
      if(!isset($_SESSION["userlogin"])){
        header("Location: home");
      }
      $oldpassword = "";
      $newpassword = "";
      $username = $_SESSION["userlogin"];

      if(isset($_POST['oldpass'])) {
        getpassword($username); 
      }    

      function setpassword($oldpassword) {
        
        if ($oldpassword === $_POST['oldpass']) {
          if ($_POST['newpass'] === $_POST['conpass']) {
            $sql = "UPDATE peserta SET password = '$newpassword' WHERE username = '$username'";
            mysqli_query($conn, $sql);
          }
          else {
            echo "Password don't match";
          }
        }
        else {
          echo "Password lama salah";
        }
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

      function getpassword($username){
          $conn = connectDB();
          $sql = "SELECT * FROM peserta WHERE username='$username'";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            $oldpassword = $row['password'];
            if ($oldpassword === $_POST['oldpass']) {
              if ($_POST['newpass'] === $_POST['conpass']) {
                $newpassword = $_POST['conpass'];
                $sql = "UPDATE peserta SET password = '$newpassword' WHERE username = '$username'";
                mysqli_query($conn, $sql);
              }
              else {
                echo "Password don't match";
              }
            }
            else {
              echo "Password lama salah";
            }    
          }
      }

  ?>

  <div class = "container">
    <div class="panel panel-default profpanel center"> 
      <div class="panel-body">
        <ul class="nav nav-tabs">
          <li role="presentation"><a href="profile">Profile</a></li>
          <li role="presentation"><a href="editprofile">Edit Profile</a></li>
          <li role="presentation" class="active"><a href="changepassword">Ganti Password</a></li>
          <li role="presentation"><a href="buktipembayaran">Upload Foto Pembayaran</a></li>
        </ul>
        <form class="form-signin" action = "" method = "POST">
          <h2 class="form-signin-heading">Ganti Password</h2>
          <input name="oldpass" type="password" class="form-control" placeholder="Pasword Lama" required>          
          <input name="newpass" type="password" class="form-control" placeholder="Password Baru" required>
          <input name = "conpass" type="password" class="form-control" placeholder="Konfirmasi Password Baru" required>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Edit</button>
        </form>
      </div>
    </div>
  </div>