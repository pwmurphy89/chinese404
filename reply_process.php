<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	session_start();
	if(!isset($_SESSION['username'])){
		header("Location: login.php");
		exit;
	}
	require_once 'includes/meekrodb.2.3.class.php';
	require_once 'includes/db_connect.php';

	DB::insert('replies', array(

		'username' =>$_SESSION['username'],
		'reply_text' =>$_POST['reply_text'],
		'randomID' => $_GET['randomID']
		));
	header('Location: index.php?reply=success');
?>