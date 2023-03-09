<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\ChangePasswordModel;

class Password extends BaseController {

	// ------------------------------------ check valid users -------------------------------------------------------------------
    public function index() {
		$session = \Config\Services::session();
		$id = $session->get('user_id');
		$changePass = new ChangePasswordModel();
		$data['username']= $changePass->password_get($id);	
		return view('admin/password_change',$data);
    }

    //---------------------------------------------------------------------------------------------------------
	public function action()
	 {
		$validation = \Config\Services::validation();
		$session = \Config\Services::session();
		$request = \Config\Services::request();
        // -------------------------- form vaildation ---------------------------------------
		$validation->setRule('username_admin', 'username', 'required');
		$validation->setRule('password_admin', 'password', 'required');
	
		// -------------------- check validation is pass ------------------------------------	
		if($validation->withRequest($this->request)->run())
         {
			$username_admin = $request->getPost('username_admin');
			$password_admin = $request->getPost('password_admin');
			$adminlogin_model = new AdminLoginModel();
			
			 $login_id=$adminlogin_model->auth($username_admin,$password_admin); 
			  if($login_id > 0)
				{
				 
				  $session->set('user_id', $login_id);
				  return redirect()->to('admin/desktop');
				}
			  else
			    {							  
				   $session->setFlashData('login_failed', 'Invalid login-id / password');   
				  
				   return redirect()->to('admin/login');
			    }	
          }
		else
		 {
			 return view('admin/login_view');
		 }
    }

	public function change()
	{
		$validation = \Config\Services::validation();
		$session = \Config\Services::session();
		$request = \Config\Services::request();
		
		if($request->getPost('flag')=='yes') 
		 {
			// -------------------------- form vaildation ---------------------------------------
			$validation->setRule('adm_login_id', 'username', 'required');
			$validation->setRule('adm_password', 'password', 'required');
			$validation->setRule('adm_password_new', 'new password', 'required');
			$validation->setRule('adm_conpwd_new', 'confirm new password', 'required');
			
			if($validation->withRequest($this->request)->run()) {
				$username = $request->getPost('adm_login_id');
				$password = $request->getPost('adm_password');
				$newpassword = $request->getPost('adm_password_new');
				$new_conf_password = $request->getPost('adm_conpwd_new');
				$changePass = new ChangePasswordModel();
				
				$changed=$changePass->pasword_edit_data($username,$password,$newpassword,$new_conf_password);
				if($changed==1)
					{
						$session->setFlashData('change', 'Password changed successfully');
						return redirect()->to('admin/password');
					}
				  else
					 {
						$session->setFlashData('change', 'Please enter correct old password.');
						return redirect()->to('admin/password');
					 }	
			}
			else
			{
				$id = $session->get('user_id');
				$changePass = new ChangePasswordModel();
				$data['username']= $changePass->password_get($id);
				return view('admin/password_change',$data);
			} 
		}		 
	}
}

?>