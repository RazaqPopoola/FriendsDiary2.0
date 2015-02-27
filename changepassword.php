<?php
	
	require_once 'core/init.php';
	
	$member = new Member();
	
	if(!$member->isLoggedIn()){
		Redirect::to('profile.php');
	}
	
	if(Input::exists()){
		
		if(Token::check(Input::get('token'))){
			
			$validate = new Validate();
			$validation = $validate->check($_POST, array(
				'password_current' => array(
					'required' => true,
					'min' => 6
				),
				'password_new' => array(
					'required' => true,
					'min' => 6
				),
				'password_new_again' => array(
					'required' => true,
					'min' => 6,
					'match' => 'password_new'
				),
			));
			
			if($validation->passed()){
				
				if(Hash::make(Input::get('password_current'), $member->data()->salt) !==$member->data()->password)
				{
					echo 'Your current password is wrong.';
				}else{
					
					$salt = Hash::salt(32);
					$member->update(array(
						'password' => Hash::make(Input::get('password_new'), $salt),
						'salt' => $salt
					));
					
					Session::flash('home', 'Your password has been changed!');
					Redirect::to('profile.php');
				}
			}else{
				foreach($validation->errors() as $error)
					echo $error, '<br>';
			}
		}
	}
	
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Home</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">	
		<?php include('settings/css.php'); ?>
		<?php include('settings/js.php'); ?>
	</head>
	<body>
		<div id="wrap">
			<?php include('template/navigation.php') ?>;
			<div class="container">	
				<div class="row"> 			
					<div class="col-md-4 col-md-offset-4"> 				
						<div class="panel panel-success">
							<div class="panel-heading">
								<strong>Login</strong>
							</div><!--- End panel heading -->	
							<div class="panel-body">
								<form action="" method="post">
									<div class="form-group">
										<label for="password_current">Current password:</label>
										<input type="password" class="form-control" name="password_current" id="password_current" placeholder="Enter Your Current Password">
									</div>
									<div class="form-group">
										<label for="password_new">New password:</label>
										<input type="password" class="form-control" name="password_new" id="password_new" placeholder="Enter Your New Password">
									</div>
									<div class="form-group">
										<label for="password_new_again">Enter your password again:</label>
										<input type="password" class="form-control" name="password_new_again" id="password_new_again" placeholder="Enter Your New Password Again">
									</div>
									<input type="submit" class="btn btn-success" value="Register">
									<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
								</form>
						</div><!--- End panel body -->			
					</div><!--- End Col-->				
				</div><!--- End Row -->					
			</div><!--- End container -->					
		</div><!--- End wrap -->
	</body>
	<footer>
		<?php include('template/footer.php')?>
	</footer>
</html>
