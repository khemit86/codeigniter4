<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\AdminLoginModel;

class Login extends BaseController {

    public function index() {
        return view('admin/login_view');
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
                $session->set('login_failed', 'Invalid login-id / password');
                return redirect()->to('admin/login');
            }	
        }
        else
        {
        return view('admin/login_view');
        }  
    
    }	 	 
    
    
    public function logout()
    {
        $session = \Config\Services::session();
        $session = session();
        $session->destroy();
        return redirect()->to('admin/login');
    }
}

?>
