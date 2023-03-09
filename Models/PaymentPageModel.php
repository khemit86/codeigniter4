<?php
namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\RawSql;

class PaymentPageModel extends Model
{
	
    //---------------------------------------- get home welcome ------------------------------------------------------			  
	public function payment_option_text()
	{
		$query = $this->db->query('SELECT * FROM ja_static_pages where page_id="2" LIMIT 1;');
		return $row = $query->getRowArray();

	}	
	//---------------------------------------------------------------------------------------------------------------
	public function product()
	{
		$query = $this->db->query('SELECT * FROM ja_Cart_Products where ProductCategory="46"');
		return $results = $query->getResultArray();
	}	
	//---------------------------------------------------------------------------------------------------------------
	public function pay_company()
	{
		
		$query = $this->db->query('SELECT * FROM ja_Company order by CompanyName asc');
		return $results =  $query->getResultArray();

	}

	//---------------------------------------------------- delete item from cart -------------------------------------------------------------------------	   	 	  		 	   
	   
	function delete_cart_item($SessionID,$ProductID)
	{		
		$this->db = \Config\Database::connect();
		$this->db->query('delete from ja_Cart_Cart where ProductID = "'.$ProductID.'" and SessionID = "'.$SessionID.'" ');
		// number of affected rows
		$affected_rows = $this->db->affectedRows();
		if($affected_rows)	
		{
			return 1;
		}
		else
		{
			return 0;
		}	
	} 

	//------------------------------------------------- display cart ---------------------------------------------------------------------------------	
	   public function get_cart_details($session_id)
	   {
			$query = $this->db->query('SELECT * FROM ja_Cart_Cart as cart where SessionID = "'.$session_id.'" ');
			return $results =  $query->getResultArray();
		  
	   }
		   
	//--------------------------------  count total no of product carrent session --------------------------------------------  		

	public function check_cart_item($product_id, $session_id)
	{
		$query = $this->db->query('SELECT * FROM ja_Cart_Cart where ProductID = "'.$product_id.'" and  SessionID = "'.$session_id.'" ');
		$results =  $query->getResultArray();
		if(count($results ) > 0)
		  {
			 return $results ; 
		  }
		 else
		  {
			 return count($results );
			
		  } 
	
	}

	public function product_details($product_id)
	{
		
		$query = $this->db->query('SELECT * FROM ja_Cart_Products where ProductID="'.$product_id.'"');
		return $results = $query->getResultArray();
	}	 

	public function payment_cart_text()
	{
	
		$query = $this->db->query('SELECT * FROM ja_static_pages where page_id="3" LIMIT 1;');
		return $row = $query->getRowArray();
	
	}	
	//------------------------------------------------ add cart to the product ---------------------------------------------------------------
 
	public function cart_add($data)
	{
		$this->db = \Config\Database::connect();
		
		if($this->db->table('ja_Cart_Cart')->insert($data)){
			return 1;
		}else{
			return 0;
		}	
	} 	
	
	//------------------------------------------------ Update cart quatntity product ---------------------------------------------------------------	
	function cart_quantity_update($session_id,$product_id, $data)
	{
		
		$this->db->where('ProductID', $product_id);	  
		$this->db->where('SessionID', $session_id);
		$query = $this->db->update('ja_Cart_Cart',$data);
		if($this->db->affected_rows())	
		  {
			 return 1;
		  }
		else
		 {
			  return 0;
		 }
			
	} 


	//------------------------------------------------------------drop down -----------------------------------------------------------------------------------------
		   
		   	  		
	function state_dropdown()
	 {
				
		$query = $this->db->query('SELECT * FROM ja_Cart_proState where Status="Y"  order by StateName asc');
		return $results = $query->getResultArray();
	
	} 	  

	function country_dropdown()
	 {
		$query = $this->db->query("SELECT * FROM ja_Cart_proCountry where Status='Y' and CountryId='223' ");
		return $results = $query->getResultArray();		
	  
	} 	

	//--------------------------------- select a particular company ---------------------------------------------

			
	function company_name($id)
	 {		
		$query = $this->db->query('SELECT * FROM ja_Company where CompanyID="'.$id.'" ');
		return $row = $query->getRowArray();
	
	} 	  

	
}