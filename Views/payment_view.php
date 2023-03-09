<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $payment_option['meta_title']; ?></title>
<meta name="Title" content="<?php echo $payment_option['meta_title']; ?>" />
<meta name="Description" content="<?php echo $payment_option['meta_description']; ?>" />
<meta name="Keywords" content="<?php echo $payment_option['meta_keyword']; ?>" />
<meta name="robots" content="index, follow" />
<meta name="googlebot" content="index, follow" />
<?php echo $this->include("includes/css"); ?>
</head>
<body>
<?php echo $this->include("includes/header"); //pay_company ?>
<?php echo $this->include("includes/menu"); ?>
 <section id="container-fluid">
<?php
 // ------------------------------  FORM OPEN ---------------------------------
	$attributes = ['class' => 'form-auth-small form-inline', 'name'=>'form1', 'id' => 'form1'];
	//echo form_open_multipart(base_url('payment/view'), $attributes);
	echo form_open_multipart('payment/view',$attributes);
	$validation = \Config\Services::validation();
 ?>
<div class="container" style="padding-right:15%; padding-left:15%;"> 
   <h2 style="text-transform:uppercase; text-align:center; color:#0C6AB1;"> <?php echo $payment_option['PageTitle']; ?></h2>
      <label style="text-transform:uppercase;">Select Company to Pay*</label>
        <span style="text-align:left; color:#FF0000;font-size:12px;";><?php echo $validation->showError('CompanyName')  //form_error('CompanyName'); ?></span>
          <div class="radio-toolbar">
		  <?php
           $i=1;
           foreach($paycompany as $RowsCompany) { ?>
                <input type="radio" id="radio<?php echo $i ?>"  value="<?php echo $RowsCompany['CompanyID']; ?>" name="CompanyName">
                <label for="radio<?php echo $i ?>"><?php echo $RowsCompany['CompanyName']; ?></label>
                &nbsp;
           <?php $i++; } ?>
        </div>
        
    <div style="margin-top:20px; margin-bottom:20px;">
       <label style="text-transform:uppercase;">Enter Payment Amount</label> <br>
        <span style="text-align:left; color:#FF0000;font-size:12px;";><?php echo $validation->showError('Amount') //echo form_error('Amount'); ?></span>
       
              <?php
					 // ------------------------------ amount text field ---------------------------------
                        $data = array('name'  => 'Amount', 'id' => 'Amount', 'value'=>set_value('Amount') , 'placeholder' => 'Enter Amount', 'class' => "form-control cash");
                        echo form_input($data);
				 
						$data = array('add'  => 'yes');
						echo form_hidden($data);
						
						$data = array('ProductID'  => $product[0]['ProductID'] );
						echo form_hidden($data);
						 
                ?>
         </div> 
        
        <button type="submit" class="btn btn-success">Make a Payment</button>
            <?php 
			   // ------------------------------  FORM CLOSE ---------------------------------
				   echo form_close(); 
		   ?>
         <p>&nbsp;</p>
          <p>&nbsp;</p>
        <hr />
          <?php echo $payment_option['page_description']; ?>
        <h2>&nbsp;</h2>	
        </div>
    </section>       

<?php echo $this->include('includes/footer.php'); ?>