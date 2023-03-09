<!doctype html>
<html lang="en">
<head>
<title>Bill Modify</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<?php echo $this->include("admin/top.inc.php"); ?>
<style>
table {
border-collapse: collapse;
border-spacing: 0;
width: 100%;
border: 1px solid #ddd;
}

th, td {
text-align: left;
padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
<script type="text/javascript" src="<?php echo base_url('Public/assets/tinymce/tinymce.min.js') ?>"></script>
<script type="text/javascript">
tinymce.init({
    selector: "#page_description",
	  formats: {
    alignleft: {selector : 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes : 'left'},
    aligncenter: {selector : 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes : 'center'},
    alignright: {selector : 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes : 'right'},
    alignjustify: {selector : 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes : 'full'},
    bold: {inline : 'span', 'classes' : 'bold'},
    italic: {inline : 'span', 'classes' : 'italic'},
    underline: {inline : 'span', 'classes' : 'underline', exact : true},
    strikethrough: {inline : 'del'},
    forecolor: {inline : 'span', classes : 'forecolor', styles : {color : '%value'}},
    hilitecolor: {inline : 'span', classes : 'hilitecolor', styles : {backgroundColor : '%value'}},
    custom_format: {block : 'h1', attributes : {title : 'Header'}, styles : {color : 'red'}}
  },

	
    theme: "modern",
    width: 680,
    height: 300,
    link_list: [
        {title: 'My page 1', value: 'http://www.tinymce.com'},
        {title: 'My page 2', value: 'http://www.tecrail.com'}
    ],
	
	
    plugins: [
         "code advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking spellchecker",
         "table contextmenu directionality emoticons paste textcolor responsivefilemanager "
   ],
   
    relative_urls: false,
	convert_urls: false,
	remove_script_host : false,
    browser_spellcheck : true ,
    filemanager_title:"Responsive Filemanager",
    external_filemanager_path:"<?php echo base_url('Public/assets/filemanager/'); ?>",
    external_plugins: { "filemanager" : "<?php echo base_url('Public/assets/filemanager/plugin.min.js') ?>"},
    codemirror: {
    indentOnInit: true, // Whether or not to indent code on init.   codemirror qrcode flickr picasa easyColorPicker
    path: '<?php echo base_url()  ?>Public/assets/tinymce'
  },
  
   image_advtab: false,
   toolbar1: "code | undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
   toolbar2: "| responsivefilemanager | image | media | link unlink anchor | print preview code  | youtube | qrcode | flickr | picasa | forecolor backcolor | easyColorPicker"
 });





jQuery(document).ready(function ($) {
      $('.iframe-btn').fancybox({
			  'width'	: 880,
			  'height'	: 570,
			  'type'	: 'iframe',
			  'autoScale'   : false
      });
      
 
			//
			// Handles message from ResponsiveFilemanager
			//
			function OnMessage(e){
			  var event = e.originalEvent;
			   // Make sure the sender of the event is trusted
			   if(event.data.sender === 'responsivefilemanager'){
			      if(event.data.field_id){
			      	var fieldID=event.data.field_id;
			      	var url=event.data.url;
							$('#'+fieldID).val(url).trigger('change');
							$.fancybox.close();

							// Delete handler of the message from ResponsiveFilemanager
							$(window).off('message', OnMessage);
			      }
			   }
			}

		  // Handler for a message from ResponsiveFilemanager
			$('.iframe-btn').on('click',function(){
			  $(window).on('message', OnMessage);
			});


      
      $('#download-button').on('click', function() {
	    ga('send', 'event', 'button', 'click', 'download-buttons');      
      });
      $('.toggle').click(function(){
	    var _this=$(this);
	    $('#'+_this.data('ref')).toggle(200);
	    var i=_this.find('i');
	    if (i.hasClass('icon-plus')) {
		  i.removeClass('icon-plus');
		  i.addClass('icon-minus');
	    }else{
		  i.removeClass('icon-minus');
		  i.addClass('icon-plus');
	    }
      });
});



function open_popup(url)
  {
        alert(url);
        var w = 880;
        var h = 570;
        var l = Math.floor((screen.width-w)/2);
        var t = Math.floor((screen.height-h)/2);
        var win = window.open(url, 'ResponsiveFilemanager', "scrollbars=1,width=" + w + ",height=" + h + ",top=" + t + ",left=" + l);
}

</script>






</head>
<body>
	<div id="wrapper">
            <?php echo $this->include("admin/header.inc.php"); ?>
		  <?php echo $this->include("admin/left.inc.php"); 
			$validation = \Config\Services::validation();
			$session = \Config\Services::session(); 
		  ?>
       <div class="main">
		<div class="main-content">
			<div class="container-fluid">
			   <div class="col-md-12">

		      <div class="panel-heading col-md-12 col-xs-12 padding_opx panel-heading_1">
					<div class="col-md-12 col-xs-12 padding_opx">

						<div class="col-md-6 padding_opx">
							<h3 class="panel-title title_h3"><b> <i class="lnr lnr-arrow-right-circle" aria-hidden="true"></i> Bill Modify</b></h3>
						</div>

						     <div class="col-md-6 padding_opx">
								  <a href="<?php echo base_url('admin/payment/view'); ?>" class="btn btn-primary btn-primary1 pull-right margin_bottom">Return Back </a>
						</div>
					</div>
				</div>

			<div class="panel">
		
				<div class="panel-body">

<!-- Html ##################################################### -->

                   <div class="col-md-12 col-xs-12 margin_top">
                   
                                  <?php if($error = $session->setFlashData('static')){ ?>
                                    
                                      <div class="alert alert-danger alert-dismissable">
                                          <?= $error ?>
                                      </div>
                                    
                                    <?php        
                                      }
                          
							  
							           //  echo"<pre>";
							             //  print_r($edit_payment_home);
							    	  //   echo"</pre>";
							      
							
							          // ------------------------------ admin form open FId ---------------------------------
										 $attributes = array('class' => 'form-auth-small form-inline', 'name'=>'form1', 'id' => 'form1');
										 echo form_open_multipart('admin/payment/edit', $attributes);
							     ?>
                                 
                                 
                                 
                                 
                                                 <div  style="overflow-x:auto;">
                                                  <table  class="table table-bordered table_margin_top;">
                                                    <tr style="background:#444b55; color:white;">
                                                      <th>Product Name</th>
                                                      <th>Price</th>
                                                      <th>Quantity</th>
                                                      <th>Total Price</th>
                                                    
                                                
                                                    </tr>
                                            <?php  foreach($item_view as $val) {?>     
                                                    <tr>
                                                      <td><?php echo $val['ProductName']; ?></td>
                                                      <td>$ <?php echo number_format($val['Price'],2); ?></td>
                                                      <td><?php echo $val['Qty']; ?></td>
                                                      <td>$ <?php echo $total=number_format($val['Price']*$val['Qty'],2); ?></td>
                                                     
                                                   </tr>
                                              <?php } ?>     
                                                
                                                  </table>
                                                </div>
                                 
                                 
                                 

		                

		                		<div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">
		                				<span> First Name *</span></label>
		                			   <div class="col-md-5 form-group padding_opx">
                                        <span style="text-align:left; color:#FF0000; font-size:12px;";><?php echo $validation->showError('FirstName'); ?></span>
                                       <?php
									      // ------------------------------ Login Id form open ---------------------------------
                                            $data = array('name'  => 'FirstName', 'id' => 'FirstName', 'value'=>$edit_payment_home[0]['FirstName'] , 'placeholder' => 'Page Name', 'class'=>"form-control margin_bottom");
                                            echo form_input($data);
                                        ?>
                                      </div>
		                		</div>
                                
                                
                                
		                		<div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">
		                				<span> Last Name *</span></label>
		                			   <div class="col-md-5 form-group padding_opx">
                                        <span style="text-align:left; color:#FF0000; font-size:12px;";><?php echo $validation->showError('LastName'); ?></span>
                                       <?php
									      // ------------------------------ Login Id form open ---------------------------------
                   $data = array('name'  => 'LastName', 'id' => 'LastName', 'value'=>$edit_payment_home[0]['LastName'] , 'placeholder' => 'Page Name', 'class'=>"form-control margin_bottom");
                                            echo form_input($data);
                                        ?>
                                      </div>
		                		</div>
                                
                                
                                
                                <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">
		                				<span> Address 1 *</span></label>
		                			   <div class="col-md-5 form-group padding_opx">
                                        <span style="text-align:left; color:#FF0000; font-size:12px;";><?php echo $validation->showError('Address'); ?></span>
                                       <?php
									      // ------------------------------ Login Id form open ---------------------------------
                                            $data = array('name'  => 'Address', 'id' => 'Address', 'value'=>$edit_payment_home[0]['Address'] , 'placeholder' => 'Address-1', 'class'=>"form-control margin_bottom");
                                            echo form_input($data);
                                        ?>
                                      </div>
		                		</div>
                                
                                 <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">
		                				<span> Address 2 </span></label>
		                			   <div class="col-md-5 form-group padding_opx">
                                     
                                       <?php
									      // ------------------------------ Login Id form open ---------------------------------
                                            $data = array('name'  => 'Address2', 'id' => 'Address2', 'value'=>$edit_payment_home[0]['Address2'] , 'placeholder' => 'Address-2', 'class'=>"form-control margin_bottom");
                                            echo form_input($data);
                                        ?>
                                      </div>
		                		</div>
                                
                                
                                
                                  <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">
		                				<span> Country </span></label>
		                			   <div class="col-md-3 form-group padding_opx">
                                        <span style="text-align:left; color:#FF0000; font-size:12px;";><?php echo $validation->showError('FirstName'); ?></span>
                                         <?php
								     // ------------------------------ adm_status form  ---------------------------------  country state	 
										
											   $options['']='Select Country';
											   foreach($country as $val)
											    {
												  $options[$val['CountryId']] = $val['Country'];
												}
											$selected=$edit_payment_home[0]['CountryID'];
																		
											echo form_dropdown('CountryID', $options, $selected,'class="form-control margin_bottom"');
                                    ?>
                                      </div>
		                		</div>
                                
                                
                                  <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">
		                				<span> State </span></label>
		                			   <div class="col-md-3 form-group padding_opx">
                                        <span style="text-align:left; color:#FF0000; font-size:12px;";><?php echo $validation->showError('FirstName'); ?></span>
                                         <?php
								     // ------------------------------ adm_status form  ---------------------------------
									       $options['']='Select State';
											   foreach($state as $val)
											    {
												  $options[$val['StatesId']] = $val['StateName'];
												}
											
											$selected=$edit_payment_home[0]['State'];							
											echo form_dropdown('State', $options, $selected,'class="form-control margin_bottom"');
                                    ?>
                                      </div>
		                		</div>
                                
                                
                                <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">
		                				<span> City </span></label>
		                			   <div class="col-md-5 form-group padding_opx">
                                     
                                       <?php
									      // ------------------------------ Login Id form open ---------------------------------
                                            $data = array('name'  => 'City', 'id' => 'City', 'value'=>$edit_payment_home[0]['City'] , 'placeholder' => 'City', 'class'=>"form-control margin_bottom");
                                            echo form_input($data);
                                        ?>
                                      </div>
		                		</div>
                                
                                 <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">
		                				<span> Zip </span></label>
		                			   <div class="col-md-5 form-group padding_opx">
                                     
                                       <?php
									      // ------------------------------ Login Id form open ---------------------------------
                        $data = array('name'  => 'Zip', 'id' => 'Zip', 'value'=>$edit_payment_home[0]['Zip'] , 'placeholder' => 'Zip', 'class'=>"form-control margin_bottom");
                                            echo form_input($data);
                                        ?>
                                      </div>
		                		</div>
                                
                                 <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">
		                				<span> Phone </span></label>
		                			   <div class="col-md-5 form-group padding_opx">
                                     
                                       <?php
									      // ------------------------------ Login Id form open ---------------------------------
                        $data = array('name'  => 'Phone', 'id' => 'Zip', 'value'=>$edit_payment_home[0]['Phone'] , 'placeholder' => 'Phone', 'class'=>"form-control margin_bottom");
                                            echo form_input($data);
                                        ?>
                                      </div>
		                		</div>
                                
                                 <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">
		                				<span> Phone2 </span></label>
		                			   <div class="col-md-5 form-group padding_opx">
                                     
                                       <?php
									      // ------------------------------ Login Id form open ---------------------------------
                        $data = array('name'  => 'Phone2', 'id' => 'Phone2', 'value'=>$edit_payment_home[0]['Phone2'] , 'placeholder' => 'Phone2', 'class'=>"form-control margin_bottom");
                                            echo form_input($data);
                                        ?>
                                      </div>
		                		</div>
                                
                                
                                  <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">
		                				<span> Email </span></label>
		                			   <div class="col-md-5 form-group padding_opx">
                                     
                                       <?php
									      // ------------------------------ Login Id form open ---------------------------------
                        $data = array('name'  => 'Email', 'id' => 'Email', 'value'=>$edit_payment_home[0]['Email'] , 'placeholder' => 'Email', 'class'=>"form-control margin_bottom");
                                            echo form_input($data);
                                        ?>
                                      </div>
		                		</div>
                                
                                
                                 <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">
		                				<span> Additional Notes </span></label>
		                			   <div class="col-md-5 form-group padding_opx">
                                     
                                       <?php
									      // ------------------------------ Login Id form open ---------------------------------
                        $data = array('name'  => 'AdditionalNotes', 'id' => 'AdditionalNotes', 'value'=>$edit_payment_home[0]['AdditionalNotes'] , 'placeholder' => 'Additional Notes', 'class'=>"form-control margin_bottom");
                                            echo form_input($data);
                                        ?>
                                      </div>
		                		</div>
                                 
                                 
                             
                             
                                

                               
                  
                             
                    
                               <div class="col-md-12 padding_opx">
                                 <label class="col-md-2 text-left padding_opx"></label>
                                  <div class="col-md-5 form-group padding_opx">

									<?php
                                          $data = array('flag'  => 'yes');
                                          echo form_hidden($data);
										
										    $data = array('id'  => $edit_payment_home[0]['RegistrantId'] );
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
		<?php include('footer.inc.php') ?>	
	</div>
	

</body>
</html>