<?php
	require_once 'core/init.php';
	
	if(Input::exists()) {
		if(Token::check(Input::get('token'))) {
			
			$validate = new Validate();
			$validation = $validate->check($_POST, array(
					'username' => array('required' => true),
					'password' => array('required' => true)				
			));
			
			if($validation->passed()) {
				$member = new Member();
				$remember =(Input::get('remember') === 'on')  ? true : false;
				$login = $member->login(Input::get('username'), Input::get('password'), $remember);
				
				if($login && !$member->hasPermission('admin')){
					Redirect::to('profile.php');
				}else if($login && $member->hasPermission('admin')){
					Redirect::to('administrator.php');
				}else {
					echo 'Sorry, logging in failed.';
				}
						
			}else {
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
		<tittle>Login</tittle>
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
								<strong>Login</strong>
							</div><!--- End panel heading -->
							<div class="panel-body">
								<form action="" method="post">
									<div class="form-group">
										<input type="text" class="form-control" name="username" id="username" autocomplete="off" placeholder="Enter username">
									</div>
									<div class="form-group">
										<input type="password" class="form-control" name="password" id="password" autocomplete="off" placeholder="Enter Password">
									</div>
									<div class="checkbox">
										<label for="remember">
										<input type="checkbox" name="remember" id="remember"> Remember Me
										</label>
									</div>
									<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
									<input type="submit"  class="btn btn-default" value="Log in">
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
