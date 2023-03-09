<?php 
   class Admin extends CI_Model
   {
		function check_duplicate($username_admin)
		 {
			$q = $this->db->where(['adm_login_id' => $username_admin])
					->get('cen_admin');
								
			if ($q->num_rows()) 
			  {
				return 0;
			  } 
			else
			 {
				 return 1;
			 }
		 }
   }
?>