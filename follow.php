<?php
	require_once 'includes/meekrodb.2.3.class.php';
	require_once 'includes/db_connect.php';
	require_once 'includes/head.php';
	require_once 'includes/header.php';


	$following_array = DB::query("SELECT * FROM poster WHERE follower = %s", $_SESSION['username']);
	$not_following_array = DB::query("SELECT username FROM users WHERE username !=%s AND username NOT IN ($following_array)", $_SESSION['username']);

	?>

<div class="container">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<?php foreach($all_users_array as $user): ?>
				<div class="col-sm-8"><?php print $user['username'];?></div>
				<div class="col-sm-4"><button ng-click="follow('<?php print $user['username'];?>')" class="btn btn-primary">Follow</button>
				</div>
			<?php endforeach; ?>

	