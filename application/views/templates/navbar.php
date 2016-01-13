<body id="page-top">

  <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand page-scroll" href="#page-top">UI GOES TO BANGKA</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a class="page-scroll" href="home">HOME</a></li>
          <li><a class="page-scroll" href="#about">ABOUT</a></li>
          <li><a class="page-scroll" href="faq">FAQ</a></li>
          <li><a class="page-scroll" href="#contact">CONTACT</a></li>
          <?php
            if(!isset($_SESSION["userlogin"])) {
              echo '<li><a class="page-scroll" href="registration">Register</a></li>';
              echo '<li><a class="page-scroll" href="login">Login</a></li>';
            } else {
              echo '<li><a class="page-scroll" href="editprofile">Edit Profile</a></li>';
              echo '<li><a class="page-scroll" href="logout">Logout</a></li>';
            }
          ?>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
  </nav>