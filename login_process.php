<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	session_start();
	require_once 'includes/meekrodb.2.3.class.php';
	DB::$user = 'x';
	DB::$password = 'x';
	DB::$dbName = 'mantaray';
	DB::$host = '127.0.0.1';
	DB::$error_handler = false; // since we're catching errors, don't need error handler
	DB::$throw_exception_on_error = true;

	$result = DB::query("SELECT * FROM users WHERE username = %s", $_POST['username']);

if($result){


	$hashed_password = $result[0]['password'];
	$passwordVerify = password_verify($_POST['password'], $hashed_password);

	if($passwordVerify){
		$_SESSION['username']=$_POST['username'];
		$_SESSION['uid'] = $result[0]['id'];
		header("Location: index.php?login=success");
	}else{
		header("Location: login.php?error=nomatch");
	}
}else{
	header("Location: login.php?error=usernotfound");
}
?>