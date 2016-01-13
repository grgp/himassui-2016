<?php 
      
      // if(isset($_SESSION["userlogin"])){
      //    // header('Location: http://www.himassui.com/UIGTB2016/index.html');
      //   header('Location: home');
      // }
          
      if(isset($_POST['username'])) {  
        if ($_POST['username'] === 'master' && $_POST['password'] === 's3Rumpun@') {
          $_SESSION["masterlogin"] = 'login';
          header('Location: home');
        }
      }   
?>

<body> 
  <div class="container">
    <div class="panel panel-default logpanel center">
      <div class="panel-body">
        <form class="form-signin" action = "" method = "POST">
              <h2 class="form-signin-heading">Please sign in</h2>
              <input name="username" class="form-control" placeholder="Username" required>
              <input type="password" name="password" class="form-control" placeholder="Password" required>
              <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button><br>
              <a href="registration.php"><button class="btn btn-lg btn-primary btn-block" type="button">Register</button></a>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
