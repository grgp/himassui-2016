<?php
    session_start();
    if(isset($_SESSION["userlogin"])){
        header("Location: home");
      }
      $errormsg = "";    
      if(isset($_POST['username'])) {  
        if (cekuser($_POST['username'])) {
            $errormsg = "username telah digunakan";
        }
        else if (!preg_match("/^[a-z]+$/", $_POST["username"])) {
            $errormsg = "username harus huruf kecil";
        }
        else if (!((preg_match("/^[a-z]+[0-9]+$/", $_POST["password"])) || (preg_match("/^[0-9]+[a-z]+$/", $_POST["password"]))) ){
            $errormsg = "password harus merupakan kombinasi huruf kecil dan angka";
        }
        else {
          insertuser($_POST['username'], $_POST['password']);
          session_start();
          $_SESSION['userlogin'] = $_POST['username'];
           header("Location: home");
        }
      }
      function insertuser($username, $password) {
        $conn = connectDB();
        $sql = "INSERT into peserta (username, password) VALUES('$username','$password')";
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
          <h2 class="form-signin-heading">Please insert your username and password</h2>
          <input name="username" class="form-control" placeholder="Username" required>
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
    </form>
     <span><?php echo $errormsg; ?> </span><br>
  </div>
</body>
<script src = "script/jquery-2.1.4.min.js"> </script>
<script src = "bootstrap/js/bootstrap.min.js"> </script>
<script src = "script/jsminimum.js"> </script>
</html>
