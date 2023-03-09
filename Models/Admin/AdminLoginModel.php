<?php
namespace App\Models\Admin;
use CodeIgniter\Model;

class AdminLoginModel extends Model
{

    protected $table = 'ja_admin';

    public function auth($username_admin, $password_admin)
    {
	
        $query = $this->db->table($this->table)
                          ->where('adm_login_id', $username_admin)
                          ->where('adm_password', base64_encode(base64_encode(base64_encode(base64_encode($password_admin)))))
                          ->get();
        
        if ($query->getNumRows() == 1) {
            return $query->getRow()->adm_id;
        } else {
            return 0;
        }
    }
}
