<?php
namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\RawSql;

class TransactionPageModel extends Model
{
	
    //----------------------------------------------------------------------------------------------		  
    public function trasaction_option_text()
    {
        $query = $this->db->query('SELECT * FROM ja_static_pages where page_id="2" LIMIT 1;');
        return $row = $query->getRowArray();
    }	
    //---------------------------------------------------------------------------------------------------------------  
    public function country_name($id)
    {
        $query = $this->db->query('SELECT * FROM ja_Cart_proCountry where CountryId = "'.$id.'" ');
        return $results =  $query->getResultArray();
    }	
    //---------------------------------------------------------------------------------------------------------------
    public function state_name($id)
    {
        $query = $this->db->query('SELECT * FROM ja_Cart_proState where StatesId = "'.$id.'" ');
        return $results =  $query->getResultArray();
    }
    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------
    public function check_cart_item($session_id)
    {
        $query = $this->db->query('SELECT * FROM ja_Cart_Cart where   SessionID = "'.$session_id.'" ');
        return $results =  $query->getResultArray();
    }
    
    //---------------------------------------------------------------------------------------------------------------
    function customers_info_add($data)
    {
        $this->db = \Config\Database::connect();
        if($this->db->table('ja_Cart_CustomersInformation')->insert($data))
        
        {
         return $this->db->insertID();
        }
        else
        {
         return 0;
        } 
    }
    //---------------------------------------------------------------------------------------------------------------
    function customers_item_add($data)
    {
        $this->db = \Config\Database::connect();
        
        if($this->db->table('ja_Cart_CustomerOrderItem')->insert($data))
        {
            return 1;
        }
        else
        {
            return 0;
        } 
    } 			
    
    //------------------------------------------------- deleet item from cart -------------------------------------------
    function cart_delete($sessionid)
    {
        // Deleteing in Table(ja_Cart_Products) of Database(HEM)	
        $this->db = \Config\Database::connect();
        $this->db->query('delete from ja_Cart_Cart where  SessionID = "'.$sessionid.'" ');
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
    
    /////////////////////////////////////////////////////////// select success page data ///////////////////////////////////////////////////
    
    public function trasaction_success_text()
    {
        $query = $this->db->query('SELECT * FROM ja_static_pages where page_id="4" LIMIT 1;');
        return $row = $query->getRowArray();
    }	
    
    public function customer_order_item($id)
    {
        $query = $this->db->query('SELECT * FROM ja_Cart_CustomerOrderItem where   RegistrantId = "'.$id.'" ');
        return $results =  $query->getResultArray();
    }
    
    //--------------------------------------------------------------------------------------------------------------------------------
    
    public function customer_details($id)
    {
        $query = $this->db->query('SELECT * FROM ja_Cart_CustomersInformation where   RegistrantId = "'.$id.'" ');
        return $results =  $query->getResultArray();
    }
    
    //--------------------------------------------------------- get company name -----------------------------------------------------------		
    
    public function company_details($id)
    {
        $query = $this->db->query('SELECT * FROM ja_Company where   CompanyID = "'.$id.'" ');
        return $results =  $query->getResultArray();
    }
}