
<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	require_once 'includes/head.php';
	require_once 'includes/header.php';
?>
<form action="login_process.php" method="post">
	<div class="col-sm-8 col-sm-offset-2 text-center">
		<div class="form-group col-sm-6 col-sm-offset-3 text-center">
	    	<label for="username">Username</label>
	    	<input type="text" class="form-control" id="username" placeholder="Username" name="username">
	    </div>

	    <div class="form-group col-sm-6 col-sm-offset-3 text-center">
	    	<label for="exampleInputPassword1">Password</label>
	    	<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
	    </div>
	</div>
	<div class="col-sm-12 text-center">
	  	<button type="submit" class="btn btn-default">Login</button>
	</div>
</form>
<script>
  $.backstretch("images/back2.jpg");
</script>