<?php

	require_once 'core/init.php';
	
	if(Session::exists('home')) {
		echo '<p>' . Session::flash('home') . '</p>';
	}
	
	$member = new Member();
	if($member->isLoggedIn()) {
	?>
		<p>Hello <a href="#"><?php echo escape($member->data()->username); ?></a>!</p>
		
		<ul>
			<li><a href="logout.php">Log out</a></li>
			<li><a href="update.php">Update</a></li>
			<li><a href="changepassword.php">Change Password</a></li>
	<?php 
	}else {
		echo '<p>You need to <a href="login.php">log in</a> or <a href="register.php">register</a></p>';
	}