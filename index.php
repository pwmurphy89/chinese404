<?php
	session_start();
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	require_once 'includes/head.php';
	require_once 'includes/header.php';
	date_default_timezone_set('America/New_York');

	$replies = DB::query("SELECT replies.*, COALESCE(SUM(votes.vote_direction),0) as aggregateVotes
        FROM replies
        LEFT JOIN votes ON replies.id = votes.p_id 
        GROUP BY replies.id ORDER BY aggregateVotes DESC");

	$posts = DB::query("SELECT * FROM posts ORDER BY timestamp DESC; ");
?>


	<a href="follow.php"><h1>Follow</h1></a>
  <div class="text-center"><h3>POSTS</h3></div>
	<?php if (isset($_SESSION['username'])): ?>
		<div class="container">
			<div id="init-post" class="row">
				<div class="form-group col-sm-10 col-sm-offset-1">
					<form action="post_process.php" method="post">
						<label for="post">POST</label>
					    <textarea id="post-text" name ="post_text"></textarea>
						<button type="submit" class="btn btn-default">Post</button>
					</form>
				</div>
			</div>
		</div>
	<?php else: ?>
		<div class="text-center">Please <a href="login.php">login</a> to post</div>
	<?php endif; ?>

	<?php foreach($posts as $post): ?>
		<div class="container">
			<div class="post-messages col-sm-10 col-sm-offset-1">
				<div class="user">
					<?php print $post['username']. " posted:"; ?>
				</div>
				<div class="text">
					<?php print $post['postText']; ?>
				</div>
				<div class="date">on
					<?php
						$timestamp_as_unix = strtotime($post['timestamp']);
						print date("D F j, Y, h:ia", $timestamp_as_unix);
					?>
				</div>
			</div>

			<?php foreach($replies as $reply): ?>
				<?php if($reply['randomID'] == $post['randomID']): ?>
					<div class="col-sm-10 col-sm-offset-1 reply-info">
						<div class="reply-messages col-sm-8">
							<div class="user-reply"><?php print $reply['username']." replied:"; ?></div>
							<div class="text-reply"><?php print $reply['reply_text']; ?></div>
							<div class="date-reply">on
								<?php
									$timestamp_as_unix = strtotime($reply['timestamp']);
									print date("D F j, Y", $timestamp_as_unix);
								?>
							</div>
						</div>
						<div class="vote-info col-sm-4">

							<div id="<?php print $reply['id'];?>">
								<div class="message">   </div>
								<div class="arrow-up" ng-click="vote($event, 1);">UP</div>
								<div class="vote-count">TOTAL: <?php print $reply['aggregateVotes'];?>
								</div>
								<div class="arrow-down" ng-click="vote($event, -1)";>DOWN</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
			<div class="col-sm-10 col-sm-offset-1 reply-submit">
				<form action="reply_process.php?randomID=<?php print $post['randomID']; ?>" method="post">
		   			<textarea class="reply-text" name ="reply_text"></textarea>
					<button type="submit" class="btn btn-default">Reply</button>
				</form>
			</div>
		</div>
	<?php endforeach; ?>
</body>
</html>