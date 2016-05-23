
<body ng-controller="myController">
  <nav class="navbar navbar-default">
    <div id="header" class="container-fluid">
      <div class="navbar-header col-sm-7">
        <a class="navbar-brand" href="index.php">Chinese404</a>
      </div>
      <ul class="nav navbar-nav col-sm-5 list-inline">
        <?php
          if(isset($_SESSION['username'])){
            print'<li class="nav-options welcome">Welcome ' .$_SESSION['username']. '!'.'</li>';
            print'<li class="nav-options"><a href="index.php">Posts</a></li>';
            print '<li class="nav-options"><a href="follow.php">Follow</a></li>'; 
            print '<li class="nav-options"><a href="logout.php">Log Out</a></li>';

          }else{
            print'<li class="nav-options"><a href="index.php">Posts</a></li>';
            print '<li class="nav-options"><a href="register.php">Register</a></li>';
            print '<li class="nav-options"><a href="login.php">Login</a></li>';
          }
        ?>
      </ul>
    </div>
  </nav>
  <div id="title" class="text-center"><h1>Welcome to Chinese404!</h1>
  <div id="title-message" class="text-center"><h4> Your resource to connect with other students of Mandarin Chinese.</h4></div>
    <ul class="list-inline text-center">
      <li>Post a question for help</li>
      <li>Respond to others' questions</li>
      <li>Share resources</li>
      <li>Make friends and study together</li>
    </ul>
  </div>


