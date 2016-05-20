<?php
		if(!isset($_SESSION['username'])){
		header("Location: login.php?error=login");
		exit;
	}
	session_start();
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	require_once 'includes/meekrodb.2.3.class.php';
	require_once 'includes/db_connect.php';
	require_once 'includes/head.php';
	require_once 'includes/header.php';


	$following_array = DB::queryOneColumn('poster', "SELECT poster FROM following WHERE follower = %s", $_SESSION['username']);

	$following_array_as_string = implode ("', '", $following_array);

	$not_following_array = DB::queryOneColumn('username', "SELECT username FROM users WHERE username !=%s AND username NOT IN ('" .$following_array_as_string. "')", $_SESSION['username']);
?>

<div class="container">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<h1>Following</h1>
			<?php foreach($following_array as $user): ?>
				<div class="col-sm-8"><?php print $user;?></div>
				<div class="col-sm-4"><button ng-click="follow('<?php print $user;?>', 'unfollow')" class="btn btn-primary">UnFollow</button>
				</div>
			<?php endforeach; ?>
			<h1>Not following</h1>
			<?php foreach($not_following_array as $user): ?>
				<div class="col-sm-8"><?php print $user;?></div>
				<div class="col-sm-3"><button ng-click="follow('<?php print $user;?>', 'follow')" class="btn btn-primary">Follow</button>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>