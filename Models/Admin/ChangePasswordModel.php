<?php
	namespace App\Models\Admin;
	use CodeIgniter\Model;
	class ChangePasswordModel extends Model
	{
		//------------------------------------Get Password---------------------------------------------	       
		function password_get($id) {
			$query = $this->db->query('SELECT * FROM ja_admin where adm_id = "'.$id.'" ');
			return $results =  $query->getResultArray();
		} 		 

		//------------------------------------edit date--------------------------------------------------		       
		public function pasword_edit_data($username, $password, $newpassword, $new_conf_password)
		{
			$builder = $this->db->table('ja_admin');
			$query = $builder->where('adm_login_id', $username)
							 ->where('adm_password', base64_encode(base64_encode(base64_encode(base64_encode($password)))))
							 ->get();

			$result = $query->getRow();

			if ($result) {
				$data = [
					'adm_password' => base64_encode(base64_encode(base64_encode(base64_encode($newpassword)))),
					'adm_conpwd' => base64_encode(base64_encode(base64_encode(base64_encode($new_conf_password)))),
				];

				$builder->where('adm_id', $result->adm_id);
				$builder->update($data);

				if ($this->db->affectedRows() > 0) {
					return 1;
				}
			}

			return 0;
		}
	}
?>