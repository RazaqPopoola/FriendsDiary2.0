


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
					<div class="row"> 
						<div class="col-md-3"> 
							<div class="panel panel-success">
								<div class="panel-heading">
									<strong>Admin Profile</strong>
								</div><!--- End panel heading -->
								<div class="panel-body">
									<div class="img-thumbnail">
      	                 				<img src="..." alt="..."  width="171" height="180">
      	                 			 <div class="caption">
        								<h5>Profile Picture</h5>
        									<p>...</p>
        								<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      								</div>
      	                 		</div>
							</div><!--- End panel body -->	
						</div><!--- End Col-->
					</div><!--- End Row -->	
					<div class="col-md-5"> 
							<div class="panel panel-success">
								<div class="panel-heading">
								<strong>Members List</strong>
							</div><!--- End panel heading -->
							
								
						</div><!--- End Col-->
					</div><!--- End Row -->	
					<div class="col-md-4"> 
							<div class="panel panel-success">
								<div class="panel-heading">
								<strong>Members List</strong>
							</div><!--- End panel heading -->
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table">
								        <thead>
								          <tr>
								            <th>Member Names</th>
								            <th>Email Address</th>
								          </tr>
								        </thead>
								        <tbody>
								          <tr>
								            <td>John Murphy</td>
								            <td>johnmurphy@gmail.com</td>
								          </tr>
								          <tr>
								            <td>Debbie Porter</td>
								            <td>debbieporter@yahoo.com</td>
								          </tr>
								          <tr>
								            <td>Glory Popoola</td>
								            <td>glorypopoola@hotmail.com</td>
								          </tr>
								        </tbody>
							      </table>
								</div>
							</div><!--- End panel body -->		
						</div><!--- End Col-->
					</div><!--- End Row -->	
				</div><!-- End container -->		
		</div><!--- End wrap -->
	</body>	
	<footer>
		<?php include('template/footer.php'); ?>
	</footer>
</html>