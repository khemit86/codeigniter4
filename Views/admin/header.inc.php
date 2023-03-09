		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand" style="padding: 0px 1px;">
				<a href="<?php echo base_url('admin/desktop'); ?>"><img style="width: 70%;" src="<?php echo base_url('public/assets/admin/img/logo.png') ?>"  class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
			
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<!-- <img src="<?php echo base_url('public/assets/admin/img/user.png') ?>" class="img-circle" alt="Avatar">  -->
								<span style="font-size:20px;">  Client Maintenance Console </span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url('admin/admin/view'); ?>"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
								<li><a href="<?php echo base_url('admin/login'); ?>"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>