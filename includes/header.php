
<body ng-controller="myController">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Chinese404</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="/">Posts</a></li>
        <?php
          if(isset($_SESSION['username'])){
            print'<li class="welcome">Welcome ' .$_SESSION['username']. '!'.'</li>';
            print '<li><a href="logout.php">Log Out</a></li>';

        }else{
          print '<li><a href="register.php">Register</a></li>';
          print '<li><a href="login.php">Login</a></li>';
        }
        ?>
      </ul>
    </div>
  </nav>
  <div id="title" class="text-center"><h1>Welcome to Chinese404!</h1></div>
  <div id="title-message" class="text-center"><h4> Your resource to connect with other students of Mandarin Chinese.</h4></div>
    <ul class="list-inline text-center">
      <li>Post a question for help!</li>
      <li>Respond to others' questions!</li>
      <li>Share resources!</li>
      <li>Make friends and study together!</li>
    </ul>
    <!-- <a href="follow.php">Follow someone...</a> -->
