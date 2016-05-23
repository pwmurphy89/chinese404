<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	session_start();
	require_once 'includes/meekrodb.2.3.class.php';
	require_once 'includes/db_connect.php';

	DB::$error_handler = false; // since we're catching errors, don't need error handler
	DB::$throw_exception_on_error = true;

	$result = DB::query("SELECT * FROM users WHERE username = %s", $_POST['username']);
	if(!$result){
		$can_register = true;
	}else{
		$can_register = false;
	}

	if($can_register && ($_POST['password'] == $_POST['password2'])){

		$hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		try{
			DB::insert('users', array(
					'username' => $_POST['username'],
					'password' => $hashed_password,
					'email' => $_POST['email'],
					'realName' => $_POST['realName'] 
				));
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['email'] = $_POST['email'];
			header('Location: index.php?register=success');
		}catch(MeekroDBException $e){
			header("Location: register.php?error=yes");
			exit;
		}
	}else{
		header('Location: register.php?error=usernameexists');
	}
?>