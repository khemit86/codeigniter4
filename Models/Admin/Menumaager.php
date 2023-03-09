<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
  /**
     code developed  by Johnson & Associates, Inc.
  */
 class Menumaager extends CI_Model
     {
        //-----------------------------------------add------------------------------------------------			 
			function menu_add($data)
			 {
			  // Inserting in Table(cen_menu) of Database(cen)
			  
				 if($this->db->insert('cen_menu', $data))
					 {
					   return  $insert_id = $this->db->insert_id();
					 }
					else
					 {
					   return 0;
					 } 
			 } 	 
        //------------------------------------view-----------------------------------------------------		
	       
		 function menu_view($limit,$offset)
			  {
			  
			       $data=array();
			       $this->db->where('ParentID','0');
				   $this->db->order_by("Ordering ", "asc");
				   $query = $this->db->get('cen_menu',$limit,$offset);
				  
				    $i=0;
				   foreach($query->result_array() as $mval)
				     {
								$data[$i]['MenuID']=$mval['MenuID'];
								$data[$i]['MenuName']=$mval['MenuName'];
								$data[$i]['view']=$mval['view'];
								$data[$i]['AssociatedId']=$mval['AssociatedId'];
								$data[$i]['IsInFooter']=$mval['IsInFooter'];
								$data[$i]['Ordering']=$mval['Ordering'];
								$data[$i]['IsActive']=$mval['IsActive'];
								
						 
							$this->db->where('ParentID',$mval['MenuID']);
							$this->db->order_by("Ordering ", "asc");
							$query_sub = $this->db->get('cen_menu');
						 	$submenu=$query_sub->result_array();
							  for($j=0;$j<count($submenu);$j++)
							    {
									$data[$i]['sub'][$j]['MenuID']=$submenu[$j]['MenuID'];
									$data[$i]['sub'][$j]['MenuName']=$submenu[$j]['MenuName'];
									$data[$i]['sub'][$j]['view']=$submenu[$j]['view'];
									$data[$i]['sub'][$j]['AssociatedId']=$submenu[$j]['AssociatedId'];
									$data[$i]['sub'][$j]['IsInFooter']=$submenu[$j]['IsInFooter'];
									$data[$i]['sub'][$j]['Ordering']=$submenu[$j]['Ordering'];
									$data[$i]['sub'][$j]['IsActive']=$submenu[$j]['IsActive'];
								}
								
							$i++; 
						 
						 
					 }
				    
					return $data;
				   
                  $this->db->close();
				
			  } 
			 
	 //------------------------------------Get totalreacord to paging -----------------------------------------------------		
	       
		    function get_tatal()
			 {
			  
			        $this->db->where('ParentID','0');
				    $query = $this->db->get('cen_menu');
				    return $query->num_rows();
                    $this->db->close();
				
			 }
	      //------------------------------------Delete-----------------------------------------------------		
	       
		    function menu_delete($id)
			 {
			   // Deleteing in Table(cen_menu) of Database(cen)
			    			  
					$this->db->where('MenuID', $id);
					$this->db->delete('cen_menu');
					 if($this->db->affected_rows())	
						  {
							 return 1;
						  }
						else
						 {
							  return 0;
						 }  
						
			 } 		 
			 
		  //------------------------------------edit view-----------------------------------------------------		
	       
		    function menu_edit($id)
			   {
			      // Deleteing in Table(cen_menu) of Database(cen)
			    			  
						$this->db->where('MenuID', $id);
						$query = $this->db->get('cen_menu');
						return $query->result_array();
						$this->db->close();
					
						
			  } 		 
	   
	     //------------------------------------edit date-----------------------------------------------------		
	       
		    function menu_edit_data($data,$id)
			  {
			     // Deleteing in Table(cen_menu) of Database(cen)
			    			  
						$this->db->where('MenuID', $id);
						$query = $this->db->update('cen_menu',$data);
						$this->db->close();
			  } 
		
		// ---------------------------------- get main menu to view in drop down -------------------------------------------   

     function menu_dropdown_data()
			  {
			     // select menu to view in dropdown in Table(cen_menu) of Database(cen)
			    	    
						$this->db->select('MenuID,MenuName');		  
						$this->db->where('ParentID', '0');
						$this->db->order_by("MenuName", "asc");
						$query = $this->db->get('cen_menu');
						return $query->result_array();
						$this->db->close();
			  } 			  
			  		
	  		// ---------------------------------- get main menu to view in drop down -------------------------------------------    cen_menu

     function menu_pages_data()
			  {
			     // select menu to view in dropdown in Table(cen_menu) of Database(cen)
			    	    
						$this->db->select('PageName');		  
						$this->db->order_by("PageName", "asc");
						$query = $this->db->get('cen_page_association');
						return $query->result_array();
						$this->db->close();
			  } 	
			  
	
	// ----------------------------------------- deleting multiple  recoderd -------------------------------		  
		 function admin_delete_bulk($id)
			 {
			   // Deleteing in Table(cen_menu) of Database(cen)
			    			  
					$this->db->where('MenuID', $id);
					$this->db->delete('cen_menu');
				    if($this->db->affected_rows())	
						  {
							 return 1;
						  }
						else
						 {
							  return 0;
						 }
						
			 } 		
			 
			
		// ----------------------------------------- activate multiple  recoderd -------------------------------		  
		 function admin_activate_bulk($id1,$data)
			 {
			   // Deleteing in Table(cen_menu) of Database(cen)
			    			  
					$this->db->where('MenuID', $id1);
					$query = $this->db->update('cen_menu',$data);
					
					
					
				    if($this->db->affected_rows())	
						  {
							 return 1;
						  }
						else
						 {
							  return 0;
						 }
						
			 } 		 
			 
	// ----------------------------------------- deactivate multiple  recoderd -------------------------------		  
		 function admin_deactivate_bulk($id1,$data)
			 {
			   // Deleteing in Table(cen_menu) of Database(cen)
			    			  
					$this->db->where('MenuID', $id1);
					$query = $this->db->update('cen_menu',$data);
					
					
					
				    if($this->db->affected_rows())	
						  {
							 return 1;
						  }
						else
						 {
							  return 0;
						 }
						
			 } 		 				 
			 		  			  			 	
	   		 	 
			 
   }
   
 
   

?>

