<?php 
	require_once 'core/init.php';
	
	if(Input::exists()) {
		if(Token::check(Input::get('token'))) {
			
			$validate = new Validate();
			$validation = $validate->check($_POST, array(
					'username' => array(
						'required' => true,
						'min' => 2,
						'max' => 20,
						'unique' => 'members'
					),
					'password' => array(
						'required' => true,
						'min' => 6
					),
					'password_again' => array(
						'required' => true,
						'matches' => 'password'
					),
					'name' => array(
						'required' => true,
						'min' => 2,
						'max' => 50
					)
			));
			
			if($validation->passed()) {
				$member = new Member();
				
				$salt = Hash::salt(32);
	
				try {
					 $member->create(array(
					 	'username' => Input::get('username'),
					 	'password' => Hash::make(Input::get('password'), $salt),
					 	'salt' => $salt,
					 	'name' => Input::get('name'),
					 	'datejoined' => date('Y-m-d H:i:s'),
					 	'groupid' => 1
					 ));
					 
					 Session::flash('home', 'You have been registered and can now log in!');
					 Redirect::to('index.php');
					 
				}catch (Exception $e) {
					die($e->getMessage());
				}
			} else {
				foreach($validation->errors() as $error) {
					echo $error, '<br>';
				}
			}
			}
	}
	?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Register</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">	
		<?php include('settings/css.php'); ?>
		<?php include('settings/js.php'); ?>
	</head>
	<body>
		<div id="wrap">
			<div class="container">
				<div class="row"> 
					<div class="col-md-4 col-md-offset-4"> 
						<div class="panel panel-success">
							<div class="panel-heading">
								<strong>Register</strong>
							</div><!--- End panel heading -->
							<div class="panel-body">	
								<form action="" method="post">
									<div class="form-group">
										<input type="text" class="form-control" name="username" id="username" value="<?php echo escape(Input::get('username')); ?>" autocomplete="off" placeholder="Enter Your Username">
									</div>
									<div class="form-group">
										<input type="password" class="form-control" name="password" id="password" placeholder="Enter Your Password">
									</div>
									<div class="form-group">
										<input type="password" class="form-control" name="password_again" id="password_again" placeholder="Enter Your Password Again">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="name" value="<?php echo escape(Input::get('name')); ?>" id="name" placeholder="Enter Your Full Names">
									</div>
									
									<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
									<input type="submit" class="btn btn-default" value="Register">
								</form>
							</div><!--- End panel body -->	
						</div>	<!--- End panel-->
					</div><!--- End Col-->
				</div><!--- End Row -->
			</div><!--- End container -->
		</div><!--- End wrap -->
	</body>
	<footer>
		<?php include('template/footer.php')?>
	</footer>
</html>