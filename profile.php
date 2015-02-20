<?php 

	include_once('core/init.php'); 
	
	if(!$username = Input::get('member')){
		
		Redirect::to('index.php');
	}else{
		
		$member = new Member($username);
		if(!$member->exists()){
			Redirect::to(404);
		}else{
			
			$data = $member->data();
		}	
	}
	
?>

	<!DOCTYPE HTML>
		<html>
			<head>
				<title>Member Profile</title>
				<meta name="viewport" content="width=device-width, initial-scale=1">
				
				<?php include('settings/css.php'); ?>
				<?php include('settings/js.php'); ?>
			</head>
			
			<body>
				<div id="wrap">
					<?php include('template/navigation.php'); ?>
						
						<div class="container">
							
							<i class=" fa fa-fax fax 5x"></i>
							<i class="fa fa-university"></i>
						
							
							
						</div><!-- End container -->
						
				</div><!--- End wrap -->
				
				<?php include('template/footer.php'); ?>
			</body>
			
			
		
		</html>