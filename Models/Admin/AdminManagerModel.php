<?php 
namespace App\Models\Admin;
use CodeIgniter\Model;
   class AdminManagerModel extends Model
   {
       protected $table = 'ja_admin';
	  //------------------------------------check duplicate  add--------------------------------------
        function check_duplicate($username_admin)
        {
            $q = $this->db->table($this->table)->where(["adm_login_id" => $username_admin])->get();	
            if ($q->getNumRows()) 
            {
                return 0;
            } 
            else
            {
                return 1;
            }
        }
        
        //------------------------------------check duplicate edit ------------------------------------
        function check_duplicate_edit($username_admin,$id)
        {
            $q = $this->db->table($this->table)->where(["adm_login_id" => $username_admin,'adm_id!=' => $id])->get();			
            
            if ($q->getNumRows()) 
            {
                return 0;
            } 
            else
            {
                return 1;
            }
        }		 
        //-----------------------------------------add------------------------------------------------			 
        function admin_add($data)
        {
            $builder = $this->db->table($this->table);
            if($builder->insert($data)){
                return 1;
            }
            else
            {
                return 1;
            } 
        }
			 
        //------------------------------------Delete-----------------------------------------------------
        function admin_delete($id)
        {
            $builder = $this->db->table($this->table);
            $builder->delete(['adm_id' => $id]);
            if($this->db->affectedRows())	
            {
                return 1;
            }
            else
            {
                return 0;
            }
        } 		 
			 
        //------------------------------------edit view-----------------------------------------------------		
        function admin_edit($id)
        {
            $q = $this->db->table($this->table)->where(["adm_id" => $id])->get();
            return $q->getResultArray();				
        } 		 
	   
        //------------------------------------edit date-----------------------------------------------------		
        function admin_edit_data($data,$id)
        {
            $q = $this->db->table($this->table)->where(["adm_id" => $id])->update($data);	
        } 
			  
        // ----------------------------------------- deleting multiple  recoderd -------------------------------		  
        function admin_delete_bulk($id)
        {
            $builder = $this->db->table($this->table);
            $builder->delete(['adm_id' => $id]);
            if($this->db->affectedRows())	
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
            $this->db->table($this->table)->where(["adm_id" => $id1])->update($data);
            if($this->db->affectedRows())	
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
            $this->db->table($this->table)->where(["adm_id" => $id1])->update($data);
            if($this->db->affectedRows())	
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