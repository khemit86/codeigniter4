<!doctype html>
<html lang="en">
 <head>
	<title>Bill Payments View</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
     <?php echo $this->include("admin/top.inc.php"); ?>
 </head>
<body>
	<div id="wrapper">
	<?php echo $this->include("admin/header.inc.php"); ?>
	<?php echo $this->include("admin/left.inc.php"); 
			$validation = \Config\Services::validation();
			$session = \Config\Services::session(); 
			$pager = \Config\Services::pager();
	?>
         
     <div class="main">
			<div class="main-content">
				<div class="container-fluid">
				<div class="col-md-12">
                
               	<div class="panel-heading col-md-12 col-xs-12 padding_opx panel-heading_1">
					<div class="col-md-12 col-xs-12 padding_opx">

						<div class="col-md-6 padding_opx">
							<h3 class="panel-title title_h3"><strong>  <i class="lnr lnr-arrow-right-circle" aria-hidden="true"></i> Bill Payment List</strong></h3>
							<p></p>
						</div>
						 <div class="col-md-6 padding_opx">
						 </div>
					</div>
				</div>


			<div class="panel">
		
                  
				<div class="panel-body">
           
						<div class="col-md-12 col-xs-12 margin_top">  
						<?php if($error = $session->get('payment')){ ?>
						  <div class="alert alert-danger alert-dismissable">
							<?= $error ?>
						  </div>
						<?php } ?>									
						</div>
						
                
                
					<table class="table table-bordered table_margin_top ">
						<thead>
							<tr>
                                <th>SN.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Price</th>
                                 <th>Order Date</th>
                                 <th>Payment Status</th>
                                 <th>Products Orders</th>
                                  
                                
                                <th>&nbsp;</th>
							</tr>
						</thead>
                        
						<tbody> 
                      
                 <?php 
					foreach($paymentlist as $val) 
					   {
					  		@$css = ($css=='trOdd')?'success':'trOdd';
					       ?>   
							    <tr class="<?php echo $css; ?>">
                            
                            	<td><?php echo $val['RegistrantId'] ?></td>
								<td><?php echo $val['FirstName'] ?> <?php echo $val['LastName'] ?></td>
                                <td><?php echo $val['Email'] ?></td>
                                <td>$ <?php echo number_format($val['Price'],2) ?></td>
                                <td><?php   
								
								  $predate=explode("-",$val['RegistrationDate']);
				                  echo	$predate[1]."-".$fidate=$predate[2]."-".$predate[0];
								
								?></td>
                                 <td align="center">
                                 
							   <?php 
                                 if($val['PayStatus']=='P')
                                   {
                                     echo"<font color=\"#FF0000\"><b>Paid</b></font>";
                                   }
                                  else
                                   {
                                     echo"UnPaid";
                                   } 
                            ?>
                                 </td>
                                  <td>
								  <?php //echo $val['ProductName'];
										if(isset($val['ProductName'])) {
											echo $val['ProductName'];
										} else {
											echo "Product name not available.";
										}

								  ?>
								  </td>
                               
                  
                                
								  <td> 
									<i class="fa fa-search" data-toggle="modal" data-target="#myModal<?php echo $val['RegistrantId']; ?>" style="font-size:18px; color:#0065b0; cursor:pointer;"></i> &nbsp;|&nbsp;  
                                  
									<a href="<?php echo base_url('admin/payment/edit')."/".$val['RegistrantId'];  ?>"><img src="<?php echo base_url('public/assets/admin/images/icon-edit.gif') ?>" alt="Edit"></a>                           
                          
                                    <div class="modal fade" id="myModal<?php echo $val['RegistrantId']; ?>" role="dialog">
                                    <div class="modal-dialog" style="width:100%; padding-left:20%; padding-right:20%;">
                                    
                                      <!-- Modal content-->
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title">Payment Details - <?php echo $val['RegistrantId']; ?></h4>
                                        </div>
                                        <div  class="modal-body">
                                            
                                           <table  class="table table-bordered table_margin_top;">
                                            <tr style="background:#444b55; color:white;">
                                              <th>Product Name</th>
                                              <th>Price</th>
                                              <th>Quantity</th>
                                              <th>Total Price</th>
                                           </tr>
                                            
                                            
                                            <tr>
                                              <td><?php //echo $val['ProductName'];
													if(isset($val['ProductName'])) {
														echo $val['ProductName'];
													} else {
														echo "Product name not available.";
													}
											  ?></td>
                                              <td>$ <?php echo number_format($val['Price'],2); ?></td>
                                              <td><?php //echo $val['Qty']; 
														if(isset($val['Qty'])) {
															echo $val['Qty'];
														} else {
															echo "Quantity not available.";
														}

											  ?></td>
                                              <td>$ <?php //echo $total=number_format($val['Price']*$val['Qty'],2); 
											  
														if(isset($val['Qty']) && isset($val['Price'])) {
															echo $total = number_format($val['Price']*$val['Qty'],2);
														} else {
															echo "Product price or quantity not available.";
														}

													  
													  ?>
											  </td>
                                           </tr>
                                
                                          </table>
                                          
                                       <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">
		                				<span> </span></label>
		                			   <div class="col-md-5 form-group padding_opx">
                                         &nbsp;
                                      
                                      </div>
		                		</div>   
                                          
                                
                                	<div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">
		                				<span><b>First Name : </b></span></label>
		                			   <div class="col-md-5 form-group padding_opx">
                                        
                                       <?php
									      // ------------------------------ Login Id form open ---------------------------------
                                                 echo $val['FirstName'];
                                        ?>
                                      </div>
		                		</div>
                                
                                
                                
		                		<div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">
		                				<span> <b>Last Name :</b> </span></label>
		                			   <div class="col-md-5 form-group padding_opx">
                                        
                                       <?php
									      // ------------------------------ Login Id form open ---------------------------------
                                                 echo $val['LastName'];
                                        ?>
                                      </div>
		                		</div>
                                
                                
                                
                                <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">
		                				<span> <b>Address 1 :</b></span></label>
		                			   <div class="col-md-5 form-group padding_opx">
                                        <span style="text-align:left; color:#FF0000; font-size:12px;";><?php echo $validation->showError('Address'); ?></span>
                                       <?php
									      // ------------------------------ Login Id form open ---------------------------------
                                              echo $val['Address'];
                                        ?>
                                      </div>
		                		</div>
                                
                                 <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">
		                				<span>  <b>Address 2 :</b></span></label>
		                			   <div class="col-md-5 form-group padding_opx">
                                     
                                       <?php
									      // ------------------------------ Login Id form open ---------------------------------
                                            echo $val['Address2'] 
                                        ?>
                                      </div>
		                		</div>
                                
                                
                                
                                  <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">
		                				<span> <b>Country :</b></span></label>
		                			   <div class="col-md-3 form-group padding_opx">
                                       
                                         <?php
								     // ------------------------------ adm_status form  ---------------------------------  country state	 
										
										
											echo $selected=$val['CountryID'];
																		
											
                                    ?>
                                      </div>
		                		</div>
                                
                                
                                  <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">
		                				<span> <b>State :</b></span></label>
		                			   <div class="col-md-3 form-group padding_opx">
                                       
                                         <?php
								     // ------------------------------ adm_status form  ---------------------------------
									     
											echo $selected=$val['State'];							
											
                                    ?>
                                      </div>
		                		</div>
                                
                                
                                <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">
		                				<span><b> City: </b></span></label>
		                			   <div class="col-md-5 form-group padding_opx">
                                     
                                       <?php
									      // ------------------------------ Login Id form open ---------------------------------
                                           echo $val['City']
                                        ?>
                                      </div>
		                		</div>
                                
                                 <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">
		                				<span> <b>Zipcode :</b></span></label>
		                			   <div class="col-md-5 form-group padding_opx">
                                     
                                       <?php
									      // ------------------------------ Login Id form open ---------------------------------
                                                      echo $val['Zip']
                                        ?>
                                      </div>
		                		</div>
                                
                                 <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">
		                				<span> <b>Phone : </b></span></label>
		                			   <div class="col-md-5 form-group padding_opx">
                                     
                                       <?php
									      // ------------------------------ Login Id form open ---------------------------------
                                                   echo $val['Phone'];
                                        ?>
                                      </div>
		                		</div>
                                
                                 <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">
		                				<span> <b>Phone2 : </b></span></label>
		                			   <div class="col-md-5 form-group padding_opx">
                                     
                                       <?php
									      // ------------------------------ Login Id form open ---------------------------------
                                             echo $val['Phone2']
                                        ?>
                                      </div>
		                		</div>
                                
                                
                                  <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">
		                				<span> <b>Email :</b> </span></label>
		                			   <div class="col-md-5 form-group padding_opx">
                                     
                                       <?php
									      // ------------------------------ Login Id form open ---------------------------------
                                             echo $val['Email']                         
                                        ?>
                                      </div>
		                		</div>
                                
                                
                                 <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">
		                				<span> <b>Additional Notes :</b> </span></label>
		                			   <div class="col-md-5 form-group padding_opx">
                                     
                                       <?php
									      // ------------------------------ Login Id form open ---------------------------------
                                             echo $val['AdditionalNotes'];
                                        ?>
                                      </div>
		                		</div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                      
                                    </div>
                                  </div>
                                  </td>
							</tr> 
                            
					<?php } ?>		
                            
							
                            
						</tbody>
					</table>
                    
                    
			            	<?= $pager_links; ?>

               
                          
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