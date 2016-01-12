<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home">HIMASSUI 2016</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="about">Petunjuk</a></li>
        <li><a href="kartu">Kartu</a></li>
        <?php
          if(!isset($_SESSION["userlogin"])) {
            echo '<li><a href="registration">Register</a></li>';
            echo '<li><a href="login">Login</a></li>';
          } else {
            echo '<li><a href="editprofile">Edit Profile</a></li>';
            echo '<li><a href="logout">Logout</a></li>';
          }
        ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>