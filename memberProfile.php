<?php 

	include_once('core/init.php'); 
?>

	<!DOCTYPE HTML>
		<html>
			<head>
				<title><?php echo $page['title']. '|'.$site_title ?> | ></title>
				<meta name="viewport" content="width=device-width, initial-scale=1">
				
				<?php include('settings/css.php'); ?>
				<?php include('settings/js.php'); ?>
			</head>
			
			<body>
				<div id="wrap">
					<?php include(D_TEMPLATE.'/navigation.php'); ?>
						
						<div class="container">
							
							<i class=" fa fa-fax fax 5x"></i>
							<i class="fa fa-university"></i>
						
							<h1><?php echo $page['header']; ?></h1>
							
							<?php echo $page['body_formatted']; ?>
							
							
						</div><!-- End container -->
						
				</div><!--- End wrap -->
					
				<?php include(D_TEMPLATE.'/footer.php'); ?>
				
				<?php if($debug == 1) { include('widget/debug.php'); }	?>
				
			</body>
		</html>