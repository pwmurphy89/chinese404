
<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Chinese404</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="/">Posts</a></li>
        <?php
          if(isset($_SESSION['username'])){
            print'<li>Welcome' .$_SESSION['username'].'</li>';
            print '<li><a href="logout.php">Log Out</a></li>';

        }else{
          print '<li><a href="register.php">Register</a></li>';
          print '<li><a href="login.php">Login</a></li>';
        }
        ?>
      </ul>
    </div>
  </nav>
  <div id="title"><h1>Welcome to Chinese404!</h1></div>
  <div><h4> Your resource to connect with other students of Mandarin Chinese.</h4></div>
  <div>Post a question for help!</div>
  <div>Respond to others' questions!</div>
  <div>Share resources!</div>
  <div>Make friends and study together!</div>
