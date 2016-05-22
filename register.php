
<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	require_once 'includes/head.php';
	require_once 'includes/header.php';
?>
<form action="register_process.php" method="post">
<div class="col-sm-6 col-sm-offset-3">
	<div class="form-group">
	    <label for="real-name">Real Name</label>
	    <input type="text" class="form-control" id="real-name" placeholder="Your real name" name="realName">
	</div>

	<div class="form-group">
	    <label for="username">Username</label>
	    <input type="text" class="form-control" id="username" placeholder="Username" name="username">
	</div>

	<div class="form-group">
	    <label for="exampleInputEmail1">Email address</label>
	    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
	</div>
	<div class="form-group">
	    <label for="exampleInputPassword1">Password</label>
	    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
	</div>
	<div class="form-group">
	    <label for="exampleInputPassword1">Confirm Password</label>
	    <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" name="password2">
	</div>
</div>
<div class="col-sm-12 text-center">
	  	  <button type="submit" class="btn btn-default">Register</button>
</div>
</form>
<script>
  $.backstretch("images/back2.jpg");
</script>