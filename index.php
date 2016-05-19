<?php
	session_start();
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	require_once 'includes/head.php';
	require_once 'includes/header.php';
	date_default_timezone_set('America/New_York');

	$posts = DB::query("SELECT * FROM posts");
	$replies = DB::query("SELECT * FROM replies");
?>
<body>
  <div><h1>View messages and make posts below :)</h1></div>
	<?php if($_SESSION['username']): ?>
		<form action="post_process.php" method="post">
			<div class="form-group">
				<label for="post">POST</label>
			    <textarea id="post-text" name ="post_text"></textarea>
			</div>
			<button type="submit" class="btn btn-default">Post</button>
		</form>
	<?php else: ?>
		<h3>You must be <a href="login.php">logged in</a>to post a message.</h3>
	<?php endif; ?>

	<?php foreach($posts as $post): ?>
		<div class="post" style="margin:20px;">
			<div class="user">
				<?php print $post['username']; ?>
			</div>
			<div class="text">
				<?php print $post['postText']; ?>
			</div>
			<div class="date">
				<?php
					$timestamp_as_unix = strtotime($post['timestamp']);
					print date("D F j, Y, h:ia", $timestamp_as_unix);
				?>
			</div>

			<?php foreach($replies as $reply): ?>
				<?php if($reply['randomID'] == $post['randomID']): ?>
					<div class="reply-text" style="margin:20px;">
						<div class="user"><?php print $reply['username']; ?></div>
						<?php print $reply['reply_text']; ?>
						<div class="date">
							<?php
								$timestamp_as_unix = strtotime($reply['timestamp']);
								print date("D F j, Y", $timestamp_as_unix);
							?>
						</div>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>

			<form action="reply_process.php?randomID=<?php print $post['randomID']; ?>" method="post">
				<div class="form-group">
					<label for="reply">Reply</label>
			   		<textarea id="reply_text" name ="reply_text"></textarea>
				</div>
				<button type="submit" class="btn btn-primary">Reply</button>
			</form>
		</div>
	<?php endforeach; ?>

</body>
</html>