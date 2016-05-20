<?php 
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	session_start();
	if(!isset($_SESSION['username'])){
		print "notLoggedIn";
		exit;
	}else{
		require_once 'includes/meekrodb.2.3.class.php';
		require_once 'includes/db_connect.php';

		$json_received = file_get_contents('php://input');
		$decoded_json = json_decode($json_received, true);
		$post_id = $decoded_json['idOfPost'];
		$vote_direction = $decoded_json['voteDirection'];

		$did_vote[0] = DB::query("SELECT * FROM votes WHERE username = %s AND p_id = %i", $_SESSION['username'], $post_id);

		if(DB::count() != 0){
			print 'alreadyVoted';
			exit;
		}
		DB:: insert('votes', array(
			'username' => $_SESSION['username'],
			'vote_direction' => $vote_direction,
			'p_id' => $post_id
		));
		
		$vote_total = DB:: query("SELECT SUM(vote_direction) AS voteTotal FROM votes where p_id = ".$post_id);


		print json_encode($vote_total[0]['voteTotal']);
	}