<!doctype html>
<html lang="en">
  <head>
	<title>Admin View</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <?php echo $this->include("admin/top.inc.php"); ?>
     
<script language="JavaScript">
// Function to Select / DeSelect all the CheckBoxes........
// Function to Select / DeSelect all the CheckBoxes........
function checkall(objForm){
	len = objForm.elements.length;
	var i=0;
	for( i=0 ; i<len ; i++) {
		if (objForm.elements[i].type=='checkbox') {
			objForm.elements[i].checked=objForm.check_all.checked;
		}
	}
}

/////////////////////////////////////////////////
// Javascript Function Check that atlease one Checkbox is checked to delete..If no then alert with (Nothing to Delete) and If yes then (Are you sure you want to Delete) and then return true / false........
function confdel()
  {
			var fl = 0;
			for(i = 0; i < (document.form1.elements.length); i++)
			{
				if((document.form1.elements[i].type=="checkbox") && (document.form1.elements[i].checked==true))
				{
					fl = 1;
					break;
				}
			}
			if(fl == 1)
			{
				if(confirm("Are you sure you want to delete?"))
				{
					fl = 1;
				}
				else
				{
					fl = 0;
				}
			}
			else
			{
				alert("Nothing to delete.");
				fl = 0;
			}
			if(fl == 1)
			{
				return true;
			}
			else
			{
				return false;
			}
  }


</script>
  </head>
<body>
<?php
$session = \Config\Services::session();
$pager = \Config\Services::pager();
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
							<h3 class="panel-title title_h3"><strong> <i class="lnr lnr-arrow-right-circle" aria-hidden="true"></i> Admin View </strong></h3>
						</div>
						 <div class="col-md-6 padding_opx">
                            <a href="<?php echo base_url('admin/admin/add'); ?>" class="btn btn-primary btn-primary1 pull-right margin_bottom"> Add Admin </a>
                            
						 </div>
					</div>
				</div>
			<div class="panel" style="overflow-x: scroll;">
				
                  
				<div class="panel-body">
                
                      <div class="col-md-12 col-xs-12 margin_top">  <?php
                                    if($error = $session->get('admin_added')){  ?>
                                    
                                      <div class="alert alert-danger alert-dismissable">
                                          <?= $error ?>
                                      </div>
                                    
                                    <?php        
                                      }
									//  echo md5('admin@fiitjee');
									 
									 // echo"<pre>"; 
									  //  print_r($admin);
									 // echo"</pre>"; 
                                    ?>
                                    </div>    
                  <?php                         
						$attributes = array('class' => 'form-auth-small form-inline', 'name'=>'form1', 'id' => 'form1');
						echo form_open_multipart('admin/admin/bulk_action', $attributes); 
					?>                    
                
					<table class="table table-bordered table_margin_top">
						<thead>
							<tr>
								<th>SN.<?php /*<br><a href="<?php echo base_url('admin/admin/view/asc/adm_id') ?>">
								<small>Asc</small></a> &nbsp; <a href="<?php echo base_url('admin/admin/view/desc/adm_id') ?>"><small>Desc</small></a> */?></th>
								<th>Name<?php /* <br><a href="<?php echo base_url('admin/admin/view/asc/adm_name') ?>"><small>Asc</small></a> &nbsp; <a href="<?php echo base_url('admin/admin/view/desc/adm_name') ?>"><small>Desc</small></a> */ ?></th>
								<th>Login id <?php /*<br><a href="<?php echo base_url('admin/admin/view/asc/adm_login_id') ?>"><small>Asc</small></a> &nbsp; <a href="<?php echo base_url('admin/admin/view/desc/adm_login_id') ?>"><small>Desc</small></a>*/ ?></th>
								<th>Email<?php /* <br><a href="<?php echo base_url('admin/admin/view/asc/adm_email') ?>"><small>Asc</small></a> &nbsp; <a href="<?php echo base_url('admin/admin/view/desc/adm_email') ?>"><small>Desc</small></a>*/ ?></th>
								<th>Status <?php /*<br><a href="<?php echo base_url('admin/admin/view/asc/adm_status') ?>"><small>Asc</small></a> &nbsp; <a href="<?php echo base_url('admin/admin/view/desc/adm_status') ?>"><small>Desc</small></a>*/ ?></th>
								<th></th>
                                <th><?php	$js = 'onClick="checkall(this.form)"'; echo form_checkbox('check_all', '1', false, $js); ?></th>
							</tr>
						</thead>
                        
						<tbody> 
                      
                 <?php 
					 foreach($admin as $val) 
					   {
					   // var $css;
						@$css = ($css=='trOdd')?'success':'trOdd';
					       ?>   
							<tr class="<?php echo $css; ?>">
                                <td><?php echo $val['adm_id'] ?></td>
                                <td><?php echo $val['adm_name'] ?></td>
                                <td><?php echo $val['adm_login_id'] ?></td>
                                <td><?php echo $val['adm_email'] ?></td>
                                <td><?php echo $val['adm_status'] ?></td>
                                <td nowrap> 
                                  
                                  
                                  
            <a  href="<?php echo base_url('admin/admin/edit')."/".$val['adm_id'];  ?>"><img src="<?php echo base_url('public/assets/admin/images/icon-edit.gif') ?>" alt="Edit"></a> | 
            <a onClick="return confirm('Are you sure you want to delete?');" href="<?php echo base_url('admin/admin/delete')."/".$val['adm_id'] ?>"><img src="<?php echo base_url('public/assets/admin/images/icon-delete.gif') ?>"  alt="Delete"></a>
                                       
                                     
                                  </td>
                                 <td> 
                                  <?php
									      // ------------------------------ Login Id form open ---------------------------------
                                            $data = array('name'  => 'bb[]', 'id' => 'bb[]',   'value' =>$val['adm_id'],  'checked'=> false, 'class'=>" margin_bottom" );
                                            echo form_checkbox($data);
                                          ?></td>
							</tr>
                            
					<?php } ?>		
                            
							
                            
						</tbody>
					</table>
                    
                      
 <div class="col-lg-12 col-xs-12" style="padding:0px;">      
                    
       <?php 
					
			$data = array('name'  => 'Activate', 'value' => 'Activate',  'style' => 'padding:1px 17px !important;', 'class'=>"btn btn-primary btn-primary1 pull-right margin_bottom");
			echo form_submit($data);
			
			$data = array('name'  => 'Deactivate', 'value' => 'Deactivate', 'style' => 'padding:1px 17px !important;' ,   'class'=>"btn btn-primary btn-primary1 pull-right margin_bottom");
			echo form_submit($data);
			
			$js = 'onClick="return confdel()"'; 
			
			$data = array('name'  => 'Delete', 'value' => 'Delete', 'style' => 'padding:1px 17px !important;',   'class'=>"btn btn-primary btn-primary1 pull-right margin_bottom");
			echo form_submit($data,'',$js);
			// ------------------------------ admin form open     confdel() ---------------------------------
			echo form_close(); 
		 ?>
   </div> 
                                   
                    <div class="col-lg-12 col-xs-12" style="padding:0px;">  
                      <?php     echo $pager->links();   ?>  
                      </div>
				</div>
			</div>
			<!-- END BASIC TABLE  sliders_view-->

		</div>
					<!-- END OVERVIEW -->



				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		
        
		<div class="clearfix"></div>
		
         <?php echo $this->include("admin/footer.inc.php"); ?>   
	</div>
	

</body>
</html>