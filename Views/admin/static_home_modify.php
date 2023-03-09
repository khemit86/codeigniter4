<!doctype html>
<html lang="en">
  <head>
	<title>Pages Modify</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<?php echo $this->include("admin/top.inc.php"); ?>
         
<script type="text/javascript" src="<?php echo base_url('public/assets/tinymce/tinymce.min.js') ?>"></script>
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
    external_filemanager_path:"<?php echo base_url('public/assets/filemanager/'); ?>",
    external_plugins: { "filemanager" : "<?php echo base_url('public/assets/filemanager/plugin.min.js') ?>"},
    codemirror: {
    indentOnInit: true, // Whether or not to indent code on init.   codemirror qrcode flickr picasa easyColorPicker
    path: '<?php echo base_url()  ?>/public/assets/tinymce'
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
		   $session = \Config\Services::session(); 
		   $validation = \Config\Services::validation(); 
		  ?>
     
       <div class="main">
		<div class="main-content">
			<div class="container-fluid">
			   <div class="col-md-12">

		      <div class="panel-heading col-md-12 col-xs-12 padding_opx panel-heading_1">
					<div class="col-md-12 col-xs-12 padding_opx">

						<div class="col-md-6 padding_opx">
							<h3 class="panel-title title_h3"><b> <i class="lnr lnr-arrow-right-circle" aria-hidden="true"></i> Static Page Modify</b></h3>
						</div>

						     <div class="col-md-6 padding_opx">
								  <a href="<?php echo base_url('admin/statichome/view'); ?>" class="btn btn-primary btn-primary1 pull-right margin_bottom">Return Back </a>
						</div>
					</div>
				</div>

			<div class="panel">
		
				<div class="panel-body">

<!-- Html ##################################################### -->

                   <div class="col-md-12 col-xs-12 margin_top">
								<?php if($error = $session->get('static')){ ?>
								  <div class="alert alert-danger alert-dismissable">
									<?= $error ?>
								  </div>
								<?php } 
							          // ------------------------------ admin form open FId ---------------------------------
										 $attributes = array('class' => 'form-auth-small form-inline', 'name'=>'form1', 'id' => 'form1');
										 echo form_open_multipart('admin/statichome/edit', $attributes);
							     ?>

		                

		                		<div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">
		                				<span> Page Name *</span></label>
		                			   <div class="col-md-5 form-group padding_opx">
                                        <span style="text-align:left; color:#FF0000; font-size:12px;";><?php echo $validation->showError('page_name'); ?></span>
                                       <?php
									      // ------------------------------ Login Id form open ---------------------------------
                                            $data = array('name'  => 'page_name', 'id' => 'page_name', 'value'=>$edit_static_home[0]['page_name'] , 'placeholder' => 'Page Name', 'class'=>"form-control margin_bottom");
                                            echo form_input($data);
                                        ?>
                                      </div>
		                		</div>
                                
                                	<div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">
		                				<span> Page Title *</span></label>
		                			   <div class="col-md-5 form-group padding_opx">
                                        <span style="text-align:left; color:#FF0000; font-size:12px;";><?php echo $validation->showError('PageTitle'); ?></span>
                                       <?php
									      // ------------------------------ Login Id form open ---------------------------------
                                            $data = array('name'  => 'PageTitle', 'id' => 'PageTitle', 'value'=>$edit_static_home[0]['PageTitle'] , 'placeholder' => 'Page Title', 'class'=>"form-control margin_bottom");
                                            echo form_input($data);
                                        ?>
                                      </div>
		                		</div>
                                

                               
                               
                                 <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">Description *</label>
		                			<div class="col-md-8 form-group padding_opx">
                                     <span style="text-align:left; color:#FF0000; font-size:12px;";><?php echo $validation->showError('page_description'); ?></span>
                                    <?php
								     // ------------------------------ adm address no Password form open ---------------------------------
                                        $data = array('name'  => 'page_description', 'id' => 'page_description', 'value'=>$edit_static_home[0]['page_description'] ,  'placeholder' => 'Description ', 'class'=>"form-control margin_bottom");
                                         echo form_textarea($data,"rows='10' cols='80'");
                                    ?>
                                    <p>&nbsp;</p>
		                		  </div>
                               </div>   
                               
                               
                                <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">
		                				<span> Header Image </span></label>
		                			    <div class="col-md-5 form-group padding_opx">
                                          <?php
									      // ------------------------------ Login Id form open ---------------------------------
                                            $data = array('name'  => 'header_image',  'class'=>"form-control margin_bottom");
                                            echo form_upload($data);
                                          ?>
                                      </div>
		                		</div>
                                
                                
                                 
                                <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">
		                				<span> Current Image  </span></label>
		                			    <div class="col-md-5 form-group padding_opx">
                                      <?php
											  if($edit_static_home[0]['header_image']!='') { ?>
                                               <img src="<?php echo base_url('uploads/menu/'.$edit_static_home[0]['header_image']) ?>" width="200px"> <br>
											  <?php } else { ?>
                                               Image does not exist
                                              <?php } ?>
                                      </div>
		                		</div>

                                
                                
                                  <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">
		                				<span> Meta Ttle </span></label>
		                			   <div class="col-md-5 form-group padding_opx">
                                      
                                       <?php
									      // ------------------------------ Login Id form open ---------------------------------
                                            $data = array('name'  => 'meta_title', 'id' => 'meta_title', 'value'=>$edit_static_home[0]['meta_title']  , 'placeholder' => '', 'class'=>"form-control margin_bottom");
                                            echo form_input($data);
                                        ?>
                                      </div>
		                		</div>
                                
                                
                                  <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">Meta Description: </label>
		                			<div class="col-md-5 form-group padding_opx">
                 
                                    <?php
								     // ------------------------------ adm address no Password form open ---------------------------------
                                        $data = array('name'  => 'meta_description', 'id' => 'meta_description', 'value'=>$edit_static_home[0]['meta_description']  ,  'placeholder' => ' ', 'class'=>"form-control margin_bottom");
                                         echo form_textarea($data);
                                    ?>
		                		  </div>
                               </div>   
                               
                               
                                 <div class="col-md-12 padding_opx">
		                			<label class="col-md-2 text-left padding_opx">Meta Keyword: </label>
		                			<div class="col-md-5 form-group padding_opx">
                          
                                    <?php
								     // ------------------------------ adm address no Password form open ---------------------------------
                                        $data = array('name'  => 'meta_keyword', 'id' => 'meta_keyword', 'value'=>$edit_static_home[0]['meta_keyword']  ,  'placeholder' => '', 'class'=>"form-control margin_bottom");
                                         echo form_textarea($data);
                                    ?>
		                		  </div>
                               </div>   
                             
                           
                             
                    
                               <div class="col-md-12 padding_opx">
                                 <label class="col-md-2 text-left padding_opx"></label>
                                  <div class="col-md-5 form-group padding_opx">

									<?php
                                            
                                          $data = array('flag'  => 'yes');
                                          echo form_hidden($data);
										
										    $data = array('id'  => $edit_static_home[0]['page_id'] );
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