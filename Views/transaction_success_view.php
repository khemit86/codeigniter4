<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $success_text['meta_title']; ?></title>
<meta name="Title" content="<?php echo $success_text['meta_title']; ?>" />
<meta name="Description" content="<?php echo $success_text['meta_description']; ?>" />
<meta name="Keywords" content="<?php echo $success_text['meta_keyword']; ?>" />
<meta name="robots" content="index, follow" />
<meta name="googlebot" content="index, follow" />
<?php echo $this->include("includes/css"); ?>
<style>
@media print {
  body * {
    visibility:hidden;
  }
  #printSection, #printSection * {
    visibility:visible;
  }
  #printSection {
   
  }
}
</style>
</head>
<body>
<p>
<?php echo $this->include("includes/header");  ?>
</p>
<?php echo $this->include("includes/menu"); // print_r($customer_finfo)  success_text ?>
 <section id="container-fluid">
   <div class="container" style="padding-left: 10%; padding-right: 10%; margin-bottom:20px;">
                   <h1><?php echo $success_text['PageTitle']; ?></h1>
                   
                   <p style="padding:5px;"><?php echo $success_text['page_description']; ?></p>
    
    <div style="overflow-x:auto;">                
    <table style="width:100%;">
           
           <?php 
		   $Total=0;
		   foreach($customer_item_details as $cval) { ?>
              <tr>
                <th style="padding:8px;"><?php echo $cval['ProductName'] ?></th>
                <th style="padding:8px;">$ <?php echo number_format($cval['Price'],2); ?></th>
                <th style="padding:8px;">$ <?php  echo $Total=number_format($Total+$cval['Price']*$cval['Qty'],2); ?></th>

             </tr>
            <?php } ?>
            <tr>
            <td colspan="2" style="font-weight:900; padding:8px; text-align:right;">Total Amount</td>
            <td  style="padding:8px; text-align:left;">$ <?php echo number_format($Total,2);  ?></td>
  
            
            </tr>
     </table>
      </div>             
                    
               <h3 style="text-align:center; color:#0065B0; margin-top:40px;">INFORMATION</h3>     
               
               <div style="border:1px solid lightgray; padding:13px;"> 
               	<div class="row" style="margin-top:20px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px; font-weight:600;">Order Date:</h4></div>
                      <div class="col-md-6 col-sm-12 col-xs-12">
                            <h4 style="font-size:16px;"> <?php  echo date('m-d-Y',strtotime($customer_finfo[0]['RegistrationDate']));  ?> </h4>
                      </div>
                </div>	
                   
                 <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px; font-weight:600;">Company Name:</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                      
                   <h4 style="font-size:16px;"> <?php echo $company_name[0]['CompanyName']   ?> </h4>
                     
                    
                    
                    </div>
                </div>  
                
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px; font-weight:600;"> First Name:</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                      <h4 style="font-size:16px;"> <?php echo $customer_finfo[0]['FirstName']   ?></h4>
                    
                    </div>
                </div>
                
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px; font-weight:600;"> Last Name:</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                      <h4 style="font-size:16px;"> <?php echo $customer_finfo[0]['LastName']   ?></h4>
                    
                    </div>
                </div>
                
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px; font-weight:600;"> Date Of Birth:</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                     <h4 style="font-size:16px;">  <?php echo $customer_finfo[0]['DateOfBirth']   ?></h4>
                          
                    
                    </div>
                </div>
                
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px; font-weight:600;">Address 1:</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                   <h4 style="font-size:16px;">   <?php echo $customer_finfo[0]['Address']   ?></h4>
                    </div>
                </div>    
                
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px; font-weight:600;">Address 2:</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                      <h4 style="font-size:16px;">  <?php echo $customer_finfo[0]['Address2']   ?></h4>
                       
                    </div>
                </div> 
                 
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px; font-weight:600;">City:</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                                 
                   <h4 style="font-size:16px;"> <?php echo $customer_finfo[0]['City']   ?></h4>
                          
                    </div>
                </div>   
                
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px; font-weight:600;">State:</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                             <h4 style="font-size:16px;">      <?php echo $state_name[0]['StateName']   ?></h4>
                    
                   <!-- state -->
                    </div>
                </div>
                 
                
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px; font-weight:600;">Postal Code:</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                    <h4 style="font-size:16px;"> <?php echo $customer_finfo[0]['Zip']   ?></h4>
                    
                    </div>
                </div>
                 
                 
                 <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px; font-weight:600;">Country:</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                              <h4 style="font-size:16px;">  <?php echo $country_name[0]['Country']   ?></h4>
                    </div>
                </div>
                 
                 <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px; font-weight:600;">Phone#1:</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <h4 style="font-size:16px;"> <?php echo $customer_finfo[0]['Phone']   ?></h4>
                        
                        
                    </div>
                </div>
                
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px; font-weight:600;">Phone#2:</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                  <h4 style="font-size:16px;">    <?php echo $customer_finfo[0]['Phone2']   ?></h4>
                    
                    </div>
                </div>
                
                 <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px; font-weight:600;">Email:</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                <h4 style="font-size:16px;">  <?php echo $customer_finfo[0]['Email']   ?></h4>
                    
                     </div>
                 </div>
                 
                 
                    <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-12 col-xs-12"><h4 style="font-size:16px; font-weight:600;">Additional Details:</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                     
                       <h4 style="font-size:16px;"> <?php echo $customer_finfo[0]['SpecialInstructions'] ?></h4>
                     </div>
                 </div>
                 
                 </div>
                 
                 <br>
                 
                 <button class="btn btn-info btn-block" data-toggle="modal" data-target="#myModal"> Print </button>
              
                
            
           </div>
           
      
     
      
           
           
            <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" style="width: 100%; padding-left: 10%; padding-right: 10%;">
    
      <!-- Modal content-->
      <div class="modal-content" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Payment Details</h4>
        </div>
        <div class="modal-body" id="printSection">
         
         
         
         <div class="">
                   <h1><?php echo $cart_text[0]['PageTitle']; ?></h1>
                   
                   <p style="padding:5px;"><?php echo $cart_text[0]['page_description']; ?></p>
    
    <div style="overflow-x:auto;">                
    <table style="width:100%;">
           
           <?php 
		   $Total=0;
		   foreach($customer_item_details as $cval) { ?>
              <tr>
                <th style="padding:8px;"><?php echo $cval['ProductName'] ?></th>
                <th style="padding:8px;">$ <?php echo number_format($cval['Price'],2) ?></th>
                <th style="padding:8px;">$ <?php  echo $Total=number_format($Total+$cval['Price']*$cval['Qty'],2) ?></th>

             </tr>
            <?php } ?>
            <tr>
            <td colspan="2" style="font-weight:900; padding:8px; text-align:right;">Total Amount</td>
            <td  style="padding:8px; text-align:left;">$ <?php  echo number_format($Total,2); ?></td>
  
            
            </tr>
     </table>
      </div>             
                    
               <h3 style="text-align:center; color:#0065B0; margin-top:40px;">INFORMATION</h3>     
               
               <div style="border:1px solid lightgray; padding:13px;"> 
               	<div class="row" style="margin-top:20px;">
                     <div class="col-md-6 col-sm-6 col-xs-6"><h4 style="font-size:16px; font-weight:600;">Order Date:</h4></div>
                      <div class="col-md-6 col-sm-6 col-xs-6">
                            <h4 style="font-size:16px;"> <?php  echo date('m-d-Y',strtotime($customer_finfo[0]['RegistrationDate']));  ?> </h4>
                      </div>
                </div>	
                   
                 <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-6 col-xs-6"><h4 style="font-size:16px; font-weight:600;">Company Name:</h4></div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                      
                   <h4 style="font-size:16px;">  <?php echo $company_name[0]['CompanyName']   ?> </h4>
                     
                    
                    
                    </div>
                </div>  
                
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-6 col-xs-6"><h4 style="font-size:16px; font-weight:600;"> First Name:</h4></div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                      <h4 style="font-size:16px;"> <?php echo $customer_finfo[0]['FirstName']   ?></h4>
                    
                    </div>
                </div>
                
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-6 col-xs-6"><h4 style="font-size:16px; font-weight:600;"> Last Name:</h4></div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                      <h4 style="font-size:16px;"> <?php echo $customer_finfo[0]['LastName']   ?></h4>
                    
                    </div>
                </div>
                
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-6 col-xs-6"><h4 style="font-size:16px; font-weight:600;"> Date Of Birth:</h4></div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                     <h4 style="font-size:16px;">  <?php echo $customer_finfo[0]['DateOfBirth']   ?></h4>
                          
                    
                    </div>
                </div>
                
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-6 col-xs-6"><h4 style="font-size:16px; font-weight:600;">Address 1:</h4></div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                   <h4 style="font-size:16px;">   <?php echo $customer_finfo[0]['Address']   ?></h4>
                    </div>
                </div>    
                
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-6 col-xs-6"><h4 style="font-size:16px; font-weight:600;">Address 2:</h4></div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                      <h4 style="font-size:16px;">  <?php echo $customer_finfo[0]['Address2']   ?></h4>
                       
                    </div>
                </div> 
                 
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-6 col-xs-6"><h4 style="font-size:16px; font-weight:600;">City:</h4></div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                                 
                   <h4 style="font-size:16px;"> <?php echo $customer_finfo[0]['City']   ?></h4>
                          
                    </div>
                </div>   
                
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-6 col-xs-6"><h4 style="font-size:16px; font-weight:600;">State:</h4></div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                             <h4 style="font-size:16px;">   <?php echo $state_name[0]['StateName']   ?></h4>
                    
                   <!-- state -->
                    </div>
                </div>
                 
                
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-6 col-xs-6"><h4 style="font-size:16px; font-weight:600;">Postal Code:</h4></div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                    <h4 style="font-size:16px;"> <?php echo $customer_finfo[0]['Zip']   ?></h4>
                    
                    </div>
                </div>
                 
                 
                 <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-6 col-xs-6"><h4 style="font-size:16px; font-weight:600;">Country:</h4></div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                              <h4 style="font-size:16px;">   <?php echo $country_name[0]['Country']   ?></h4>
                    </div>
                </div>
                 
                 <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-6 col-xs-6"><h4 style="font-size:16px; font-weight:600;">Phone#1:</h4></div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <h4 style="font-size:16px;"> <?php echo $customer_finfo[0]['Phone']   ?></h4>
                        
                        
                    </div>
                </div>
                
                <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-6 col-xs-6"><h4 style="font-size:16px; font-weight:600;">Phone#2:</h4></div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                  <h4 style="font-size:16px;">    <?php echo $customer_finfo[0]['Phone2']   ?></h4>
                    
                    </div>
                </div>
                
                 <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-6 col-xs-6"><h4 style="font-size:16px; font-weight:600;">Email:</h4></div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                <h4 style="font-size:16px;">  <?php echo $customer_finfo[0]['Email']   ?></h4>
                    
                     </div>
                 </div>
                 
                 
                    <div class="row" style="margin-top:5px;">
                     <div class="col-md-6 col-sm-6 col-xs-6"><h4 style="font-size:16px; font-weight:600;">Additional Details:</h4></div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                     
                       <h4 style="font-size:16px;">   <?php echo $customer_finfo[0]['SpecialInstructions'] ?></h4>
                     </div>
                 </div>
                 
                 </div>
                 
                 <br>
                 
                 <button onclick="javascripr:window.print();" class="btn btn-info btn-block" > Print </button>
              
                
            
           </div>
         
         
         
         
         
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
           
             
                    
</section>       
<?php echo $this->include('includes/footer'); ?>