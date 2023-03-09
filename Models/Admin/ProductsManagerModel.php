<?php 
namespace App\Models\Admin;
use CodeIgniter\Model;
  /**     code developed  by Johnson & Associates, Inc.
   */
   class ProductsManagerModel extends Model
   {
      
        protected $table = 'ja_Cart_Products';
        //-----------------------------------------add------------------------------------------------			 
        function products_add($data)
        {
            // Inserting in Table(ja_Cart_Products) of Database(HEM)
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
        
        function products_view($limit,$offset)
        {
            // Updateing in Table(ja_Cart_Products) of Database(HEM)
            $this->db->order_by('ProductName', 'ASC');
            $query = $this->db->get('ja_Cart_Products',$limit,$offset);
            return $query->result_array();
            $this->db->close();
        
        }
        
        //------------------------------------Delete-----------------------------------------------------
        function products_delete($id)
        {
            // Deleteing in Table(ja_Cart_Products) of Database(HEM)
            $builder = $this->db->table($this->table);
            $builder->delete(['ProductID' => $id]);
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
        function products_edit($id)
        {
            // Deleteing in Table(ja_Cart_Products) of Database(HEM)
            $q = $this->db->table($this->table)->where(["ProductID" => $id])->get();
            return $q->getResultArray();
        } 		 
        
        //------------------------------------edit date-----------------------------------------------------		
        
        function products_edit_data($data,$id)
        {
            // Deleteing in Table(ja_Cart_Products) of Database(HEM)
            $this->db->table($this->table)->where(["ProductID" => $id])->update($data);
        } 
        
        // ----------------------------------------- deleting multiple  recoderd -------------------------------		  
        function admin_delete_bulk($id)
        {
            // Deleteing in Table(ja_Cart_Products) of Database(HEM)
            $builder = $this->db->table($this->table);
            $builder->delete(['ProductID' => $id]);
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
            // Deleteing in Table(ja_Cart_Products) of Database(HEM)
            $this->db->table($this->table)->where(["ProductID" => $id1])->update($data);
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
            // Deleteing in Table(ja_Cart_Products) of Database(HEM)
            $this->db->table($this->table)->where(["ProductID" => $id1])->update($data);
            if($this->db->affectedRows())	
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }	
        
        
        //----------------------------------------------- cate dropdown ---------------------------------	 	 				 	 	
        
        function category_drop()
        {
            $q = $this->db->table('ja_Cart_ProductsCategory')->where(["Active" => "Y"])->get();
            return $q->getResultArray();
        }	 
   }
   

?>