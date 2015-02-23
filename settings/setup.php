<?php

	//Database connection
	include_once('core/init.php'); 
	
	# Constants:
	DEFINE('D_TEMPLATE', 'template');
	
	#functions:
	include('functions/data.php');
	include('functions/template.php');
	
	#site setup
	$debug = data_setting_value($dbc, 'debug-status');
	
	$site_title = 'FriendsDairy WebApps';
	
	if(isset($_GET['page'])){
		$pageid = $_GET['page'];//set the $pageid to equal to the value of the URL
	}else{
		$pageid = 1; //Set $pageid to equal to 1 or home page
	}
	
		//page setup
		$page = data_page($dbc, $pageid);
		
		
	/*//page setup
	$query = "SELECT * FROM pages WHERE id = 1";
	$result = mysql_query($dbc, $query);
	
	$page = mysql_fetch_assoc($result);*/
	
		
?>