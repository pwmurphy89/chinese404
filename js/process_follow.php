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

	$json_received = file_get_contents('php://input');
	$decoded_json = json_decode($json_received, true);
	$poster_username = $decoded_json['username'];

	DB::insert('following', array(
		'follower' => $_SESSION['username'],
		'poster' => $poster_username
		))