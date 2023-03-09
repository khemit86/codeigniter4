<?php
	namespace App\Models\Admin;
	use CodeIgniter\Model;
	class PaymentManagerModel extends Model
	{
	    protected $table = 'ja_Cart_CustomersInformation';
	 
    	 //------------------------------------view-----------------------------------------------------		
       
	    public function payment_view($limit, $offset)
        {
            $builder = $this->db->table('ja_Cart_CustomersInformation cust');
            $builder->select('*')
                    ->join('ja_Cart_CustomerOrderItem order', 'cust.RegistrantId = order.RegistrantId', 'INNER')
                    ->where('cust.PayStatus', 'P')
                    ->orderBy('cust.RegistrantId', 'DESC')
                    ->limit($limit, $offset);
            $query = $builder->get();
            return $query->getResultArray();
        }

		 
        //------------------------------------Get toatal record in table for paging-----------------------------------------------------
		public function get_tatal()
		{
			$query = $this->db->get('ja_Cart_CustomersInformation');
			$result = $query->num_rows();
			$this->db->close();
			return $result;
		}

		public function get_total()
        {
            $builder = $this->db->table('ja_Cart_CustomersInformation');
            $builder->select('COUNT(*) as total');
            $builder->where('PayStatus', 'P');
            $query = $builder->get();
            $row = $query->getRow();
            return $row->total;
        }
        
        
	    //------------------------------------edit view-----------------------------------------------------		
       
	    public function payment_edit($id)
		{
			$query = $this->db->query('SELECT * FROM ja_Cart_CustomersInformation where RegistrantId = "'.$id.'" ');
			return $results =  $query->getResultArray(); 
		}
		 
	    //---------------------------------------- select order items ----------------------------------------------------------	 
		
		public function item_view($id)
		{
			
			$query = $this->db->query('SELECT * FROM ja_Cart_CustomerOrderItem where RegistrantId = "'.$id.'" ');
			return $results =  $query->getResultArray(); 
		}
       //-----------------------------------------------------------------------------------------------------------------		
	   
	   //------------------------------------ Edit Date --------------------------------------------------------------------
	    public function payment_edit_data($data, $id)
		{
			$db = \Config\Database::connect();
			$builder = $db->table('ja_Cart_CustomersInformation');
			$builder->where('RegistrantId', $id);
			$builder->update($data);
			$db->close();
		}

		  
        //------------------------------------------------------------------------------------------
		public function country_dropd()
		{
			$query = $this->db->table('ja_Cart_proCountry')
							  ->where('Status', 'Y')
							  ->orderBy('Country', 'asc')
							  ->get();

			return $query->getResultArray();
		}


		   
		//------------------------------------------------------------------------------------------
		public function state_dropd()
		{
			$query = $this->db->table('ja_Cart_proState')
							  ->where('Status', 'Y')
							  ->orderBy('StateName', 'asc')
							  ->get();

			return $query->getResultArray();
		}
			
	}
?>
