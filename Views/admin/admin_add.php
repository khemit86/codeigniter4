<!doctype html>
<html lang="en">
  <head>
	<title>Admin Add</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
     <?php echo $this->include("admin/top.inc.php"); ?>
  </head>
<body>
<?php
$session = \Config\Services::session();
$validation = \Config\Services::validation();
?>
	<div id="wrapper">
        <?php echo $this->include("admin/header.inc.php"); ?>
		<?php echo $this->include("admin/left.inc.php"); ?> 	
      <div class="main">
		   <div class="main-content">
				<div class="container-fluid">
			    	<div class="col-md-12">

		<div class="panel-heading col-md-12 col-xs-12 panel-heading_1">
					<div class="col-md-12 col-xs-12 padding_opx">

						<div class="col-md-6 padding_opx">
							<h3 class="panel-title title_h3"><b> <i class="lnr lnr-arrow-right-circle" aria-hidden="true"></i> Admin Add</b></h3>
						</div>

						     <div class="col-md-6 padding_opx">
								  <a href="<?php echo base_url('admin/admin/view'); ?>" class="btn btn-primary btn-primary1 pull-right margin_bottom">Return Back</a>
								<br>
						</div>
					</div>
				</div>

			<div class="panel">
		
				<div class="panel-body">
                
                      

<!-- Html ##################################################### -->

                   <div class="col-md-12 col-xs-12 margin_top">
                   
                                  <?php
                                    if($error = $session->get('admin_added')){  ?>
                                    
                                      <div class="alert alert-danger alert-dismissable">
                                          <?= $error ?>
                                      </div>
                                    
                                    <?php        
                                      }
                                    ?>
                   
                               <?php
							
							          // ------------------------------ admin form open ---------------------------------
										$attributes = array('class' => 'form-auth-small form-inline', 'name'=>'form1', 'id' => 'form1');
										echo form_open('admin/admin/add', $attributes);
							     ?>
                                 
                                 
                            <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">
		                				<span> Name * </span></label>
                                        
		                			   <div class="col-md-5 form-group padding_opx">
                                        <span style="text-align:left; color:#FF0000;font-size:12px;";><?php echo $validation->showError('adm_name'); ?></span>
                                       <?php
									      // ------------------------------ Login Id form open ---------------------------------
                                            $data = array('name'  => 'adm_name', 'id' => 'adm_name', 'value' =>set_value('adm_name'), 'placeholder' => 'Admin Name', 'class'=>"form-control margin_bottom");
                                            echo form_input($data);
                                        ?>
                                      </div>
		                		</div>   

		                

		                		<div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">
		                				<span> Login Id * </span></label>
                                  
		                			   <div class="col-md-5 form-group padding_opx">
                                               <span style="text-align:left; color:#FF0000; font-size:12px;";><?php echo $validation->showError('adm_login_id'); ?></span>
                                       <?php
									      // ------------------------------ Login Id form open ---------------------------------
                                            $data = array('name'  => 'adm_login_id', 'id' => 'adm_login_id', 'value' =>set_value('adm_login_id'), 'placeholder' => 'Login Id', 'class'=>"form-control margin_bottom");
                                            echo form_input($data);
                                        ?>
                                      </div>
		                		</div>
                                

		                		<div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">Password *</label>
		                			<div class="col-md-5 form-group padding_opx">
                                     <span style="text-align:left; color:#FF0000; font-size:12px;";><?php echo $validation->showError('adm_password'); ?></span>
                                   <?php
								     // ------------------------------ Password form open ---------------------------------
                                        $password_data = array('name'  => 'adm_password', 'id' => 'adm_password','value' =>set_value('adm_password'),  'placeholder' => 'Password ', 'class'=>"form-control margin_bottom");
                                        echo form_password($password_data);
                                    ?>
		                		  </div>
                               </div>
                               
                               <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">Confirm Password *</label>
		                			<div class="col-md-5 form-group padding_opx">
                                     <span style="text-align:left; color:#FF0000; font-size:12px;";><?php echo $validation->showError('adm_conpwd'); ?></span>
                                   <?php
								     // ------------------------------ Confirm Password form open ---------------------------------
                                      $cpassword_data = array('name'  => 'adm_conpwd', 'id' => 'adm_conpwd','value' =>set_value('adm_conpwd'),  'placeholder' => 'Confirm Password ', 'class'=>"form-control margin_bottom");
                                        echo form_password($cpassword_data);
                                    ?>
		                		  </div>
                               </div>
                               
                                <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">Email *</label>
		                			<div class="col-md-5 form-group padding_opx">
                                     <span style="text-align:left; color:#FF0000; font-size:12px;";><?php echo $validation->showError('adm_email'); ?></span>
                                    
                                   <?php
								     // ------------------------------ Confirm Password form open ---------------------------------
                                      $email_data = array('name'  => 'adm_email', 'id' => 'adm_email','value' =>set_value('adm_email'),  'placeholder' => 'Email  ', 'class'=>"form-control margin_bottom");
                                        echo form_input($email_data);
                                    ?>
		                		  </div>
                               </div>
                               
                               
                              <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">Contact No *</label>
		                			<div class="col-md-5 form-group padding_opx">
                                    <span style="text-align:left; color:#FF0000; font-size:12px;";><?php echo $validation->showError('adm_phone'); ?></span>
                                   <?php
								     // ------------------------------ Contact no Password form open ---------------------------------
                                      $data = array('name'  => 'adm_phone', 'id' => 'adm_phone','value' =>set_value('adm_phone'),  'placeholder' => 'Contact No  ', 'class'=>"form-control margin_bottom");
                                        echo form_input($data);
                                    ?>
		                		  </div>
                               </div>  
                               
                              
                               <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">Address</label>
		                			<div class="col-md-8 form-group padding_opx">
                                   <?php
								     // ------------------------------ adm address no Password form open ---------------------------------
                                      $data = array('name'  => 'adm_address', 'id' => 'adm_address','value' =>set_value('adm_address'),  'placeholder' => 'Address ', 'class'=>"form-control margin_bottom");
                                        echo form_textarea($data);
                                    ?>
		                		  </div>
                               </div>   
                             
                             
                              <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">City </label>
		                			<div class="col-md-5 form-group padding_opx">
                                   <?php
								     // ------------------------------ adm_city no Password form open ---------------------------------
                                      $data = array('name'  => 'adm_city', 'id' => 'adm_city','value' =>set_value('adm_city'),  'placeholder' => 'City  ', 'class'=>"form-control margin_bottom");
                                        echo form_input($data);
                                    ?>
		                		  </div>
                               </div>   
                               
                                 <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">State </label>
		                			<div class="col-md-5 form-group padding_opx">
                                   <?php
								     // ------------------------------ adm_city no Password form open ---------------------------------
                                      $data = array('name'  => 'adm_state', 'id' => 'adm_state','value' =>set_value('adm_state'),  'placeholder' => 'State  ', 'class'=>"form-control margin_bottom");
                                        echo form_input($data);
                                    ?>
		                		  </div>
                               </div>   
                               
                               <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">Zipcode </label>
		                			<div class="col-md-5 form-group padding_opx">
                                   <?php
								     // ------------------------------ adm_zipcode no Password form open ---------------------------------
                                      $data = array('name'  => 'adm_zipcode', 'id' => 'adm_zipcode','value' =>set_value('adm_zipcode'),  'placeholder' => 'Zipcode  ', 'class'=>"form-control margin_bottom");
                                        echo form_input($data);
                                    ?>
		                		  </div>
                               </div>   
                               
                               <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">Status </label>
		                			<div class="col-md-2 form-group padding_opx">
                                   <?php
								     // ------------------------------ adm_status form  ---------------------------------
											$options = array(
											'Active'         => 'Active',
											'Inactive'           => 'Inactive',
											
											);
																		
											echo form_dropdown('adm_status', $options, '','class="form-control margin_bottom"');
                                    ?>
		                		  </div>
                               </div>   
                   
                              	    <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx"></label>
		                			<div class="col-md-5 form-group padding_opx">

		                			
                                    
                                    <?php
													
											$data = array('flag'  => 'yes');
											echo form_hidden($data);
								//-------------------------------------------------------------------------------------------------------------------			
											$data = array('name'  => 'smt_enter', 'value' => 'Submit',   'class'=>"btn btn-primary");
											echo form_submit($data);
                                    ?>
                                    
		                		</div>
		                		</div>
                                
						       <?php 
							           // ------------------------------ admin form open ---------------------------------
							               echo form_close(); 
							       ?>
						</div>

<!--Html ##################################################  -->
				</div>
			</div>
		</div>
	</div>
  </div>
</div>
     
     
		
        
		<div class="clearfix"></div>
		<?php echo $this->include("admin/footer.inc.php"); ?>   	
	</div>
	

</body>
</html>