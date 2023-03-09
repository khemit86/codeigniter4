<?php 
namespace App\Models\Admin;
use CodeIgniter\Model;
class CategoryManagerModel extends Model
   {
      protected $table = 'ja_Cart_ProductsCategory';

        //-----------------------------------------add------------------------------------------------			 
        function services_cat_add($data)
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
        //------------------------------------view-----------------------------------------------------		
        
        function services_cat_view($limit,$offset)
        {
            // Updateing in Table(ja_Cart_ProductsCategory) of Database(HEM)
            $this->db->order_by('CategoryName', 'ASC');
            $query = $this->db->get('ja_Cart_ProductsCategory',$limit,$offset);
            return $query->result_array();
            $this->db->close();
        
        } 
        
        //------------------------------------Get toatal record in table for paging-----------------------------------------------------		
        
        function get_tatal()
        {
            $query = $this->db->get('ja_Cart_ProductsCategory');
            return $query->num_rows();
            $this->db->close();
        }  
			 
        //------------------------------------Delete-----------------------------------------------------
        function services_cat_delete($id)
        {
            $builder = $this->db->table($this->table);
            $builder->delete(['CategoryID' => $id]);
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
        function services_cat_edit($id)
        {
        	$q = $this->db->table($this->table)->where(["CategoryID" => $id])->get();
        	return $q->getResultArray();
        } 		 
	   
        //------------------------------------edit date-----------------------------------------------------		
        
        function services_cat_edit_data($data,$id)
        {
            $this->db->table($this->table)->where(["CategoryID" => $id])->update($data);
        }
		
        // ----------------------------------------- deleting multiple  recoderd -------------------------------		  
        function admin_delete_bulk($id)
        {
            $builder = $this->db->table($this->table);
            $builder->delete(['CategoryID' => $id]);
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
            $this->db->table($this->table)->where(["CategoryID" => $id1])->update($data);
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
            // Deleteing in Table(ja_Cart_ProductsCategory) of Database(HEM)
        	$this->db->table($this->table)->where(["CategoryID" => $id1])->update($data);
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