<?php

	require_once 'core/init.php';
	
	$member = new Member();
	$member->logout();
	
	Redirect::to('index.php');
	
	
?>