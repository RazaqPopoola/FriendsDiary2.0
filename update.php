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
				'name' => array(
				'required' => true,
				'min' => 2,
				'max' => 50
 				)
			));
			
			if($validation->passed()){
				
				try{
					$member->update(array(
						'name' => Input::get('name')
					));
					
					Session::flash('home', 'Your details have been updated.');
					Redirect::to('profile.php');
					
				}catch(Exception $e){
					die($e->getMessage());
				}
			}else{
				
				foreach ($validation->errors() as $error) {
					
					echo $error, '<br>';
				}
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
										<lable for="name">Full Names:</lable>
										<input type="text" name="name" class="form-control" value="<?php echo escape($member->data()->name); ?> " placeholder="Enter Your Full Names">
									</div>
										<input type="submit" class="btn btn-success" value="Update">
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

