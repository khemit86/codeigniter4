<?php
namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
	
    public function home_welcome_text()
	{
		$query = $this->db->query('SELECT * FROM ja_static_pages where page_id="1" LIMIT 1;');
		$row = $query->getRowArray();
		return $row;
	
	}
}