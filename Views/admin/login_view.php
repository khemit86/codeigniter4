<!doctype html>
<html lang="en" class="fullscreen-bg">
<head>
	<title>Welcome to Missoula Bone & Joint</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="<?php echo base_url('public/assets/admin/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('public/assets/admin/vendor/font-awesome/css/font-awesome.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('public/assets/admin/vendor/linearicons/style.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('public/assets/admin/css/main.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('public/assets/admin/css/demo.css') ?>">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<link rel="icon" type="<?php echo base_url('public/assets/admin/img/logo.png') ?>" sizes="96x96" href="<?php echo base_url('assets/admin/img/logo.png') ?>">

</head>
<body>
	<?php 
		$validation = \Config\Services::validation(); 
		$session = \Config\Services::session();
	?>
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="<?php echo base_url('public/assets/admin/img/logo.png') ?>"></div>
								<p class="lead">Administrator Login</p>
							</div>
                            
									<?php if($error = $session->get('login_failed')){ ?>
									  <div class="alert alert-danger alert-dismissable">
										<?= $error ?>
									  </div>
									<?php } ?>			
							
                            
									<?php
									  // ------------------------------ admin form open ---------------------------------
									  $attributes = ['class' => 'form-auth-small', 'name' => 'login', 'id' => 'login'];
									  echo form_open('admin/login/action', $attributes);
									?>					
								
								<div class="form-group">
								  <label for="signin-email" class="control-label sr-only">User Name</label>
								  <span style="text-align:left; color:#FF0000; font-size:12px;"><?php echo $validation->showError('username_admin'); ?></span>
								  <?php
									$data = [
									  'name' => 'username_admin',
									  'id' => 'username',
									  'placeholder' => 'Login Id',
									  'class' => 'form-control',
									  'maxlength' => '25'
									];
									echo form_input($data);
								  ?>
								</div>
                                
								<div class="form-group">
								  <label for="signin-password" class="control-label sr-only">Password</label>
								  <span style="text-align:left; color:#FF0000; font-size:12px;"><?php echo $validation->showError('password_admin'); ?></span>
								  <?php
									$data = [
									  'name' => 'password_admin',
									  'id' => 'password',
									  'class' => 'form-control',
									  'maxlength' => '25'
									];
									echo form_password($data);
								  ?>
								</div>


                                <?php
								  $data = [
									'name' => 'smt_enter',
									'value' => 'LOGIN',
									'class' => 'btn btn-primary btn-lg btn-block'
								  ];
								  echo form_submit($data);
								?>

                                
								<div class="bottom">
								
								</div>
							      <?php 
									  // ------------------------------ admin form open ---------------------------------
									  echo form_close(); 
									?>

						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading"><!--Centron Services INC-->&nbsp;</h1>
						
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
 </body>
</html>