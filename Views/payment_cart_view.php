<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $cart_text['meta_title']; ?></title>
<meta name="Title" content="<?php echo $cart_text['meta_title']; ?>" />
<meta name="Description" content="<?php echo $cart_text['meta_description']; ?>" />
<meta name="Keywords" content="<?php echo $cart_text['meta_keyword']; ?>" />
<meta name="robots" content="index, follow" />
<meta name="googlebot" content="index, follow" />
<?php echo $this->include("includes/css"); ?>
</head>
<body>
<?php echo $this->include("includes/header"); ?>
<?php echo $this->include("includes/menu"); ?>
<p>&nbsp;</p>  
<?php
    // ------------------------------  FORM OPEN ---------------------------------
    $attributes = array('class' => 'form-auth-small form-inline', 'name'=>'form1', 'id' => 'form1');
    //echo form_open_multipart(base_url('trasaction'), $attributes);
	echo form_open_multipart('transaction',$attributes);
	$validation = \Config\Services::validation();
    ?>
           <div class="container" style="padding-left: 10%; padding-right: 10%; margin-bottom:20px;">
                   <h1><?php echo $cart_text['PageTitle']; ?></h1>
                   
                   <p style="padding:5px;"><?php echo $cart_text['page_description']; ?></p>
    
    <div style="overflow-x:auto;">                
    <table style="width:100%;">
           
           <?php 
		   $Total=0;
		   foreach($cart_details as $cval) { ?>
              <tr>
                <th style="padding:8px;"><?php echo $cval['ProductName'] ?></th>
                <th style="padding:8px;">$ <?php echo $cval['Price'] ?></th>
                <th style="padding:8px;">$ <?php   $Total=$Total+$cval['Price']*$cval['Quantity']; echo number_format($Total,2); ?></th>
<!--                <th style="text-align:center;"><button class="btn btn-warning">Delete</button></th>-->
             </tr>
            <?php } ?>
            <tr>
            <td colspan="2" style="font-weight:900; padding:8px; text-align:right;">Total Amount</td>
            <td  style="padding:8px; text-align:left;">$ <?php  echo number_format($Total,2);  ?></td>
   <!--          <td  style="text-align:center; padding:8px;"></td>-->
            
            </tr>
     </table>
      </div>             
                    
               <h3 style="text-align:center; color:#0065B0; margin-top:40px;">PAYMENT INFORMATION</h3>     
               <hr>
               	<div class="row" style="margin-top:20px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px;">Patient ID Number*</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                                 
                          <span style="text-align:left; color:#FF0000;font-size:12px;";><?php echo $validation->showError('PatientAccountNumber'); ?></span>
       
                    <?php
					       
					 // ------------------------------ patient First Name ---------------------------------
                        $data = ['name'  => 'PatientAccountNumber', 'id' => 'it', 'value'=>set_value('PatientAccountNumber') , 'placeholder' => 'Enter Patient ID Number', 'class' => "form-control cash"];
                        echo form_input($data);
		            ?>
                     
                    
                    </div>
                </div>	
                   
                 <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px;">List any special instructions with your payment:</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                      
                    <?php
					 // ------------------------------ patient First Name ---------------------------------
                       $data = array('name'  => 'SpecialInstructions', 'id' => 'iu', 'value'=>set_value('SpecialInstructions') , 'placeholder' => 'Enter any special instructions', 'class' => "form-control cash");
                        echo form_input($data);
		            ?>
                     
                    
                    
                    </div>
                </div>  
                
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px;">Patient First Name*</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                       <span style="text-align:left; color:#FF0000;font-size:12px;";><?php echo $validation->showError('FirstName');?></span>
       
                    <?php
					 // ------------------------------ patient First Name ---------------------------------
                        $data = array('name'  => 'FirstName', 'id' => 'FirstName', 'value'=>set_value('FirstName') , 'placeholder' => 'Enter Patient First Name', 'class' => "form-control cash");
                        echo form_input($data);
		            ?>
                    
                    </div>
                </div>
                
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px;">Patient Last Name*</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                                   
                    <span style="text-align:left; color:#FF0000;font-size:12px;";><?php echo $validation->showError('LastName'); ?></span>
       
						<?php
                         // ----------------------------------------------------- Patient LastName ---------------------------------
                            $data = array('name'  => 'LastName', 'id' => 'LastName', 'value'=>set_value('LastName') , 'placeholder' => 'Enter Patient Last Name', 'class' => "form-control cash");
                            echo form_input($data); 
                        ?>
                    
                    </div>
                </div>
                
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px;">Patient Date Of Birth*</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                                              
                          <span style="text-align:left; color:#FF0000;font-size:12px;";><?php echo $validation->showError('DateOfBirth'); ?></span>
       
						<?php
                         // ----------------------------------------------------- Patient LastName ---------------------------------
                            $data = array('name'  => 'DateOfBirth', 'id' => 'datepicker', 'value'=>set_value('DateOfBirth') , 'placeholder' => 'Enter Date of Birth', 'class' => "form-control cash");
                            echo form_input($data); 
                        ?>
                          
                    
                    </div>
                </div>
                
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px;">Address 1*</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                       <span style="text-align:left; color:#FF0000;font-size:12px;";><?php echo $validation->showError('Address'); ?></span>              
                       <?php
                            // --------------------------------------------------- patient First Name ---------------------------------
                             $data = array('name'  => 'Address', 'id' => 'Address', 'value'=>set_value('Address') , 'placeholder' => 'Enter Your Address', 'class' => "form-control cash");
                            echo form_input($data); 
                        ?>
                    </div>
                </div>    
                
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px;">Address 2</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                           
                       <?php
                            // --------------------------------------------------- patient First Name ---------------------------------
                            $data = array('name'  => 'Address2', 'id' => 'Address2', 'value'=>set_value('Address2') , 'placeholder' => 'Enter Your Address-2', 'class' => "form-control cash");
                            echo form_input($data);
                        ?>
                       
                    </div>
                </div> 
                 
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px;">City*</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                      <span style="text-align:left; color:#FF0000;font-size:12px;";><?php echo $validation->showError('Address2'); ?></span>              
                       <?php
                            // --------------------------------------------------- patient First Name ---------------------------------
                             $data = array('name'  => 'City', 'id' => 'City', 'value'=>set_value('City') , 'placeholder' => 'Enter Your City', 'class' => "form-control cash");
                            echo form_input($data); 
                        ?>
                          
                    </div>
                </div>   
                
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px;">State*</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
					 <?php
		   
						 $js = array('class=>"form-control margin_bottom"');
						// ------------------------------ adm_status form  ---------------------------------
						  unset($options);                  
						  $options['']='Select State';
						  foreach($state as $val)
							   {
								   $options[$val['StatesId']] = $val['StateName'];
							   } 
						 
						 $selected=set_value('State');
						  if($selected=='')
							{ $selected=29; }        
							echo form_dropdown('State', $options, $selected,  'class="form-control"'); 
					   ?>
                    
                   <!-- state -->
                    </div>
                </div>
                 
                
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px;">Postal Code*</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                                       
                       <span style="text-align:left; color:#FF0000;font-size:12px;";><?php echo $validation->showError('Zip'); ?></span>              
                       <?php
                            // --------------------------------------------------- patient First Name ---------------------------------
                            $data = array('name'  => 'Zip', 'id' => 'Zip', 'value'=>set_value('Zip') , 'placeholder' => 'Enter Postal Code', 'class' => "form-control cash");
                            echo form_input($data); 
                        ?>
                    
                    </div>
                </div>
                 
                 
                 <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px;">Country*</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
           
				   <?php
		   
						// ------------------------------ adm_status form  ---------------------------------
						   unset($options);                  
						  $options['']='Select Country';
						  foreach($country as $val)
							   {
								   $options[$val['CountryId']] = $val['Country'];
							   }    
							
							if(set_value('CountryID')=='')
							  {
								$selected=223;
							  }
							 else
							  {
							   $selected=set_value('CountryID');
							  } 
							echo form_dropdown('CountryID', $options, $selected,  'class="form-control"'); 
		 
				 ?>
                    
                    </div>
                </div>
                 
                 <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px;">Phone#1*</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                          <span style="text-align:left; color:#FF0000;font-size:12px;";><?php echo $validation->showError('Phone'); ?></span>  
                           <?php
                            // --------------------------------------------------- patient First Name ---------------------------------
                             $data = array('name'  => 'Phone', 'id' => 'Phone', 'value'=>set_value('Phone') , 'placeholder' => 'Enter Phone Number', 'class' => "form-control cash");
                            echo form_input($data); 
                        ?>
                        
                        
                    </div>
                </div>
                
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px;">Phone#2</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                      
                      
                           <?php
                            // --------------------------------------------------- patient First Name ---------------------------------
                             $data = array('name'  => 'Phone2', 'id' => 'Phone2', 'value'=>set_value('Phone2') , 'placeholder' => 'Enter Phone Number', 'class' => "form-control cash");
                            echo form_input($data);
                        ?>
                    
                    </div>
                </div>
                
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px;">Email *</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                     
                             <span style="text-align:left; color:#FF0000;font-size:12px;";><?php echo $validation->showError('Email'); ?></span>  
                            <?php
                            // --------------------------------------------------- patient First Name ---------------------------------
                            $data = array('name'  => 'Email', 'id' => 'Email', 'value'=>set_value('Email') , 'placeholder' => 'Enter Your Email', 'class' => "form-control cash");
                            echo form_input($data); 
                        ?>
                    </div>
                </div>
                 
                 
                 <h3 style="text-align:center; color:#0065B0; margin-top:40px;">PAYMENT </h3>     
               		<hr>
                    
               	<div class="row" style="margin-top:20px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px;">Select Company to Pay*</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                    	<h4 style="font-size:16px;"><?php echo $company['CompanyName']; ?></h4>
                                 <?php 
										$data = array('CompanyName'  => $company['CompanyID']);
                                       echo form_hidden($data); 
						          ?>
                        
                    </div>
                </div>
                
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px;">Select Card Type*</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                            <span style="text-align:left; color:#FF0000;font-size:12px;";><?php echo $validation->showError('CardType'); ?></span>  
                       <?php
					 				// ------------------------------ adm_status form  ---------------------------------
										     unset($options);                  
											$options['']='Select Card Type';
											$options['AmExCard'] = 'American Express';
											$options['DiscoverCard'] ='Discover';
											$options['MasterCard'] = 'MasterCard';
											$options['VisaCard'] = 'Visa';
										    $selected=set_value('CardType');
											echo form_dropdown('CardType', $options, $selected,  'class="form-control"'); 
						               ?>
                   
                    
                    
                    </div>
                </div>
                
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px;">Card Number*</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        
                       <span style="text-align:left; color:#FF0000;font-size:12px;";><?php echo $validation->showError('membercard_num'); ?></span>              
                       <?php
                            // --------------------------------------------------- patient First Name ---------------------------------
                            $data = array('name'  => 'membercard_num', 'id' => 'membercard_num', 'value'=>set_value('membercard_num') , 'placeholder' => 'Enter Card Number', 'class' => "form-control cash");
                            echo form_input($data); 
                        ?>
                    </div>
                </div>
                
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px;">Card CVS#*</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                     <span style="text-align:left; color:#FF0000;font-size:12px;";><?php echo $validation->showError('CardCode'); ?></span> 
                      <?php
                            // --------------------------------------------------- patient First Name ---------------------------------
                          $data = array('name'  => 'CardCode', 'id' => 'CardCode', 'value'=>set_value('CardCode') , 'placeholder' => 'Enter CVS', 'class' => "form-control");
                            echo form_input($data); 
                        ?>
                    </div>
                </div>
                
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px;">Card Expiration Date*</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                    
                      <span style="text-align:left; color:#FF0000;font-size:12px;";><?php echo $validation->showError('expdate'); ?></span> 
                                                 
                            
                                   <?php
					 				// ------------------------------ adm_status form  ---------------------------------
										     unset($options);                  
											$options['']='Month';
											$options['01'] = '01';
											$options['02'] = '02';
											$options['03'] = '03';
											$options['04'] = '04';
											$options['05'] = '05';
											$options['06'] = '06';
											$options['07'] = '07';
											$options['08'] = '08';
											$options['09'] = '09';
											$options['10'] = '10';
											$options['11'] = '11';
											$options['12'] = '12';
											
										    $selected=set_value('expdate');
											echo form_dropdown('expdate', $options, $selected,  'class="form-control"'); 
						               ?>

                            
                            
                            
                              <span style="text-align:left; color:#FF0000;font-size:12px;";><?php echo $validation->showError('expmonthyear'); ?></span> 
                                                              
                                     
                                     <?php
					 				// ------------------------------ adm_status form  ---------------------------------
										     unset($options);                  
											$options['']='Year';
										
										   $year=date("Y"); 
										   $upto=$year+11;
										   for($i=$year;$i<$upto;$i++)
										    {
											  $options[$i] = $i;
											}  
							
											
										    $selected=set_value('expmonthyear');
											echo form_dropdown('expmonthyear', $options, $selected,  'class="form-control"'); 
						               ?>

                                     
                                        
                    </div>
                </div>
                
                
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px;">Card Holder Name*</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                    	
                           <span style="text-align:left; color:#FF0000;font-size:12px;";><?php echo $validation->showError('CardHolderName'); ?></span>              
                       <?php
                            // --------------------------------------------------- patient First Name ---------------------------------
                             $data = array('name'  => 'CardHolderName', 'id' => 'CardHolderName', 'value'=>set_value('CardHolderName') , 'placeholder' => 'Enter Card Holder Name', 'class' => "form-control cash");
                            echo form_input($data); 
                        ?>
                        
                        
                    </div>
                </div>
                
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px;">Card Billing Address*</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                      <span style="text-align:left; color:#FF0000;font-size:12px;";><?php echo $validation->showError('C_billingAddress'); ?></span>              
                       <?php
                            // --------------------------------------------------- patient First Name ---------------------------------
                             $data = array('name'  => 'C_billingAddress', 'id' => 'C_billingAddress', 'value'=>set_value('C_billingAddress') , 'placeholder' => 'Enter Card Billing Address', 'class' => "form-control cash");
                            echo form_input($data); 
                        ?>
                        
                    </div>
                </div>
                
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px;"> Card Billing City*</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                       <span style="text-align:left; color:#FF0000;font-size:12px;";><?php echo $validation->showError('C_billingCity'); ?></span>              
                       <?php
                            // --------------------------------------------------- patient First Name ---------------------------------
                             $data = array('name'  => 'C_billingCity', 'id' => 'C_billingCity', 'value'=>set_value('C_billingCity') , 'placeholder' => 'Enter Card Billing City', 'class' => "form-control cash");
                            echo form_input($data); 
                        ?>
                        
                        
                    </div>
                </div>
                
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px;"> Card Billing State*</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                 
                        <span style="text-align:left; color:#FF0000;font-size:12px;";><?php echo $validation->showError('C_billingState'); ?></span>              
                       <?php
                            // --------------------------------------------------- patient First Name ---------------------------------
                             $data = array('name'  => 'C_billingState', 'id' => 'C_billingState', 'value'=>set_value('C_billingState') , 'placeholder' => 'Enter Card Billing State', 'class' => "form-control cash");
                            echo form_input($data);
                        ?>
                        
                    </div>
                </div>
                
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px;"> Card Billing Postal Code*</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                   
                        
                        <span style="text-align:left; color:#FF0000;font-size:12px;";><?php echo $validation->showError('C_billingPostalCode'); ?></span>              
                       <?php
                            // --------------------------------------------------- patient First Name ---------------------------------
                            $data = array('name'  => 'C_billingPostalCode', 'id' => 'C_billingPostalCode', 'value'=>set_value('C_billingPostalCode') , 'placeholder' => 'Enter Card Billing Postal Code*', 'class' => "form-control cash");
                            echo form_input($data);
                        ?>
                        
                        
                    </div>
                </div>
                <br>
                
                 <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                    	 <button class="btn btn-success" style="width:100%;">Submit Payment</button>
                    </div>
                </div>
           </div>    
                
            <?php    // ------------------------------  FORM CLOSE ---------------------------------
								  echo form_close(); 
						   ?>
     
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
	$( function() {
		$( "#datepicker" ).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: "-99:+0" // last hundred years
		});
	} );
</script>

<?php echo $this->include('includes/footer'); ?>