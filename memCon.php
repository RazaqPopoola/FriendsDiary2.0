
<!DOCTYPE HTML>
<html>
	<head>
		<title>Member Connect</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">	
		<?php include('settings/css.php'); ?>
		<?php include('settings/js.php'); ?>
	</head>	
	<body>
		<div id="wrap">
			<?php include('template/navigation.php') ?>;
			<div class="container">
				<div class="row">
				  <div class="col-sm-9">
				    Level 1: .col-sm-9
				    <div class="row">
				      <div class="col-xs-8 col-sm-6">
				        Level 2: .col-xs-8 .col-sm-6
				      </div><!--- End row col -->
				      <div class="col-xs-4 col-sm-6">
				        Level 2: .col-xs-4 .col-sm-6
				      </div><!--- End row col -->
				    </div><!--- End row -->
				  </div><!--- End row col -->
				</div><!--- End row -->
			</div><!--- End container -->	
		</div><!--- End wrap -->
	</body>
	<footer>
		<?php include('template/footer.php')?>
	</footer>
</html>