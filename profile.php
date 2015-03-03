<?php 
	
	include_once('core/init.php'); 
	
		
	$member = new Member();
	if(!$member->exists()){
		
			Redirect::to(404);
	}else{
			
			$data = $member->data();
	}	
	
	
	
	if(Input::exists()) {
		if(Token::check(Input::get('token'))) {
			
			$validate = new Validate();
			$validation = $validate->check($_POST, array(
					'title' => array(
						'required' => true,
						'min' => 2,
						'max' => 200,
						'unique' => 'diary'
					),
					'datecreated' => array(
						'required' => true
						
					),
					'diarynote' => array(
						'required' => true
					)
			));
			
			if($validation->passed()) {
					
				$diary = new DiaryKeeping();
				
				try {
					 $diary->keepDiary(array(
					 	'member_id' => $member->data()->id,
					 	'title' => Input::get('title'),
					 	'datecreated' => Inpute::get(date('Y-m-d H:i:s')),
					 	'diarynote' => Input::get('diarynote')
					 ));
					 
					 Session::flash('home', 'Your diary is created!');
					 print  'title';
					 
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
								<div class="img-thumbnail">
      	                 			<img src="..." alt="..."  width="171" height="180">
      	                 			 <div class="caption">
        								<h5>Profile Picture</h5>
        									<p>...</p>
        									<p><input type="file" id="inputeFile" value="Choose Picture"> <a href="#" class="btn btn-default" role="button">Button</a></p>
      								</div>
      	                 		</div>
							</div><!--- End panel body -->	
						</div>	<!--- End panel-->
					</div><!--- End Col-->
					<div class="col-md-6">
						<div class="panel panel-success">
							<div class="panel-heading">
								<strong>Daily Diary</strong>
							</div><!--- End panel heading -->
							<div class="panel-body">
								<form action="" method="post">
									
									<div class="form-group">
										<input type="title" class="form-control" name="title" id="password" placeholder="Enter Diary Title">
									</div>
									
									<div class="form-group">
										<input type="date" class="form-control" name="date" id="date">
									</div>
									
									<div class="form-group">
										<textarea class="form-control" row="7" name="enterdiary" id="enterdiary" placeholder="Enter Daily Diary Note"></textarea>
									</div>
									
									<div>
										<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
										<input type="submit" class="btn btn-success" value="Save">
										<!---
										<input type="submit" name="delete" class="btn btn-success" value="Delete">
										<input type="submit" name="edit" class="btn btn-success" value="Edit">-->
									</div>
								</form>
							</div><!--- End panel body -->		
						</div>	<!--- End panel-->
					</div><!--- End Col-->
					<div class="col-md-3">
						<div class="panel panel-success">
							<div class="panel-heading">
								<strong>List of Diary</strong>
							</div><!--- End panel heading -->
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
								</div><!--- End table div-->
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
