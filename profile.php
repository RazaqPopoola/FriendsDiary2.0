<?php 
	
	//include_once('core/init.php'); 
	
	/*
	if(!$username = Input::get('member')){
		
		Redirect::to('index.php');
	}else{
		
		$member = new Member($username);
		if(!$member->exists()){
			Redirect::to(404);
		}else{
			
			$data = $member->data();
		}	
	}*/
	
?>





<!DOCTYPE HTML>
<html>
	<head>
		<title>Profile</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">	
		<?php include('settings/css.php'); ?>
		<?php include('settings/js.php'); ?>
	</head>
	<body>
		<div id="wrap">
			<?php include('template/navigation.php') ?>;
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="panel panel-success">
							<div class="panel-heading">
								<strong>Member Profile</strong>
							</div><!--- End panel heading -->
							<div class="panel-body">
								<div class="container">
      	                 			<img src="..." alt="..." class="img-thumbnail" width="200" height="200">
   							 	</div>
							</div><!--- End panel body -->	
						</div>	<!--- End panel-->
					</div><!--- End Col-->
					<div class="col-md-6">
						<div class="panel panel-success">
							<div class="panel-heading">
								<strong>List of Diary</strong>
							</div><!--- End panel heading -->
							<div class="panel-body">
								
							</div><!--- End panel body -->	
						</div>	<!--- End panel-->
					</div><!--- End Col-->
					<div class="col-md-3">
						<div class="panel panel-success">
							<div class="panel-heading">
								<strong>List of Diary</strong>
							</div><!--- End panel heading -->
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table">
								        <thead>
								          <tr>
								            <th>Date</th>
								            <th>Diary</th>
								          </tr>
								        </thead>
								        <tbody>
								          <tr>
								            <td>1</td>
								            <td>Anna</td>
								          </tr>
								          <tr>
								            <td>2</td>
								            <td>Debbie</td>
								          </tr>
								          <tr>
								            <td>3</td>
								            <td>John</td>
								          </tr>
								        </tbody>
							      </table>
								</div>
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
