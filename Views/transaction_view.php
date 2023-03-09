<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trasaction</title>
<meta name="Title" content="Trasaction" />
<meta name="Description" content="Trasaction" />
<meta name="Keywords" content="Trasaction" />
<meta name="robots" content="index, follow" />
<meta name="googlebot" content="index, follow" />
<?php echo $this->include("includes/css"); ?>
</head>
<body>
<?php echo $this->include("includes/header");  ?>
<?php echo $this->include("includes/menu");    ?>
 <section id="container-fluid">
<?php
// ------------------------------  FORM OPEN ---------------------------------
$attributes = array('class' => 'form-auth-small form-inline', 'name'=>'form1', 'id' => 'form1');

echo form_open_multipart('payment/payment_details',$attributes);
 ?>
          <div class="container" style="padding-right:15%; padding-left:15%;"> 
             <span class=\"style7\"><b>Payment Declined:</b></span><br>
			  <?php echo $mydata['str'];  ?>
			   <br><br>Details of the transaction are shown below.  
                 <?php  
                      $data = array('PatientAccountNumber'  => $mydata['PatientAccountNumber']);        echo form_hidden($data);
					  $data = array('SpecialInstructions'  => $mydata['SpecialInstructions']);          echo form_hidden($data);
					  $data = array('FirstName'  => $mydata['FirstName']);                              echo form_hidden($data);
					  $data = array('LastName'  => $mydata['LastName']);                                echo form_hidden($data);
					  $data = array('DateOfBirth'  => $mydata['DateOfBirth']);                          echo form_hidden($data);
					  $data = array('Address'  => $mydata['Address1']);                                 echo form_hidden($data);
			          $data = array('Address2'  => $mydata['Address2']);                                echo form_hidden($data);
					  $data = array('City'  => $mydata['City']);                                        echo form_hidden($data);
					  $data = array('State'  => $mydata['State']);                                      echo form_hidden($data);
					  $data = array('Zip'  => $mydata['PostalCode']);                                   echo form_hidden($data); 
					  $data = array('Phone'  => $mydata['Phone']);                                      echo form_hidden($data);  
					  $data = array('Phone2'  => $mydata['Phone2']);                                    echo form_hidden($data);
					  $data = array('Email'  => $mydata['Email']);                                      echo form_hidden($data);  
					  //$data = array('addidetails'  => $mydata['addidetails']);                          echo form_hidden($data);  
					  $data = array('CardType'  => $mydata['CardType']);                                echo form_hidden($data);  
					  $data = array('membercard_num'  => $mydata['membercard_num']);                    echo form_hidden($data);  
					  $data = array('CardCode'  => $mydata['CardCode']);                                echo form_hidden($data); 
					  $data = array('CardHolderName'  => $mydata['CardHolderName']);                    echo form_hidden($data);   
					  $data = array('expdate'  => $mydata['expdate']);                                  echo form_hidden($data);  
					  $data = array('expmonthyear'  => $mydata['expmonthyear']);                        echo form_hidden($data);  
					  $data = array('C_billingAddress'  => $mydata['C_billingAddress']);                echo form_hidden($data);  
					  $data = array('C_billingCity'  => $mydata['C_billingCity']);                      echo form_hidden($data);  
					  $data = array('C_billingState'  => $mydata['C_billingState']);                    echo form_hidden($data); 
					  $data = array('C_billingPostalCode'  => $mydata['C_billingPostalCode']);          echo form_hidden($data);  
					  $data = array('CompanyName'  => $mydata['CompanyName']);                          echo form_hidden($data);  
			       ?>
                <br /> 
            <input type="submit" name="submit" value="Go back to edit this transaction" />
         </div>
     <?php    echo form_close();  ?>         
</section>       
<?php echo $this->include('includes/footer'); ?>