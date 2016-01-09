<?php 
   session_start();
   
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
   
   function login($username, $password){
          $conn = connectDB();
          $sql = "SELECT username, password FROM peserta WHERE username='$username' AND password='$password'";
          $result = mysqli_query($conn, $sql);
          if(mysqli_num_rows($result) > 0) {
             mysqli_close($conn);
             return true;
          }
          return false;
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
      
      if(isset($_SESSION["userlogin"])){
         // header('Location: http://www.himassui.com/UIGTB2016/index.html');
        header('Location: home');
      }
      $errormsg = "";    
      if(isset($_POST['username'])) {  
      if (cekuser($_POST['username'])) {
        if(login($_POST['username'], $_POST['password'])) {
          $_SESSION["userlogin"] = $_POST["username"];
          header('Location: home');
          }
          else {
          $errormsg = "password tidak valid";
          }
        }
        else {
          $errormsg = "username tidak valid";
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
          <h2 class="form-signin-heading">Please sign in</h2>
          <input name="username" class="form-control" placeholder="Username" required>
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button><br>
          <a href = "registration.php"><button class="btn btn-lg btn-primary btn-block" type="button">Register</button></a>
    </form>
    
  </div>
</body>
<script src = "script/jquery-2.1.4.min.js"> </script>
<script src = "bootstrap/js/bootstrap.min.js"> </script>
<script src = "script/jsminimum.js"> </script>
</html>
