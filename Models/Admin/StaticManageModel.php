<?php
	namespace App\Models\Admin;
	use CodeIgniter\Model;
	class StaticManageModel extends Model
	{
        protected $table = 'ja_static_pages';
        //------------------------------------view-----------------------------------------------------		
        
        function static_view($limit,$offset)
        {
            $query = $this->db->query('SELECT * FROM ja_static_pages');
            return $results =  $query->getResultArray(); 
        }
        
        
        //------------------------------------Get toatal record in table for paging---------------------------
        public function get_tatal()
        {
            $query = $this->db->get('ja_static_pages');
            $result = $query->num_rows();
            $this->db->close();
            return $result;
        }
        
        //------------------------------------edit view-----------------------------------------------------	
        
        function static_edit($id)
        {
            $query = $this->db->query('SELECT * FROM ja_static_pages where page_id = "'.$id.'" ');
            return $results =  $query->getResultArray(); 
        } 		 
        
        //------------------------------------edit date-----------------------------------------------------		
        
        function static_edit_data($data,$id)
        {
            $db = \Config\Database::connect();
            $builder = $db->table('ja_static_pages');
            $builder->where('page_id', $id);
            $builder->update($data);
            $db->close();
        } 	
	}
?>
