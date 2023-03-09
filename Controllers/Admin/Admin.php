<?php
    namespace App\Controllers\Admin;
    use App\Controllers\BaseController;
    use App\Models\Admin\AdminManagerModel;

    class Admin extends BaseController {
        // ------------------------------- View funnctin load listing page while clicking on management ------------------------------
        public function view()
        {
            $admin_manager_model = new AdminManagerModel();
            $data = [
                'admin' => $admin_manager_model->paginate(20),
                'pager' => $admin_manager_model->pager,
            ];
            return view('admin/admin_view',$data);
        }
        // ------------------------------- Add funnctin add record  -----------------------------------------------------------------	
        public function add()
        {
            $validation = \Config\Services::validation();
            $request = \Config\Services::request();
            $session = \Config\Services::session();
            if($request->getPost('flag')=='yes') 
            {
                // -------------------------- form vaildation ---------------------------------------
                $validation->setRule('adm_name', 'admin name', 'required');
                $validation->setRule('adm_login_id', 'login-id', 'required');
                $validation->setRule('adm_password', 'password', 'required|min_length[6]|max_length[11]');
                $validation->setRule('adm_conpwd', 'Confirm password', 'required');
                $validation->setRule('adm_conpwd', 'Confirm Password', 'trim|matches[adm_password]');
                $validation->setRule('adm_email', 'Email', 'trim|required');
                $validation->setRule('adm_phone', 'contact no', 'required');
                
                if($validation->withRequest($this->request)->run()) 
                {
                    $data=$request->getPost();
                    $adm_login_id=$request->getPost('adm_login_id');
                    $admin_manager_model = new AdminManagerModel();
                    $DuplicateError=$admin_manager_model->check_duplicate($adm_login_id);
                    
                    if($DuplicateError==1)
                    {
                        unset($data['flag']);
                        unset($data['smt_enter']);
                        
                        $adm_password = base64_encode(base64_encode(base64_encode(base64_encode($data['adm_password']))));
						$data['adm_password'] = $adm_password;
									
						$adm_conpwd = base64_encode(base64_encode(base64_encode(base64_encode($data['adm_conpwd']))));
						$data['adm_conpwd'] = $adm_conpwd;
                        
                        
                        $insert=$admin_manager_model->admin_add($data);
                        if($insert==1)
                        {
                            $session->setFlashdata('admin_added', 'Records added successfully');
                            return redirect()->to('admin/admin/view');
                        }
                    }
                    else
                    {
                        $session->setFlashdata('admin_add_failed', 'Username allready exists.Please choose another username');
                        return view('admin/admin_add');
                    }	
                }	
                else
                {
                    return view('admin/admin_add');
                }
            }
            else
            {
            return view('admin/admin_add');
            }
        }
        // ------------------------------- Edit  funnctin edit record  ------------------------------		  
        public function edit()
        {
            $validation = \Config\Services::validation();
            $request = \Config\Services::request();
            $session = \Config\Services::session();		
            // load model to edit record  
            $admin_manager_model = new AdminManagerModel();
            if($request->getPost('flag')=='yes')  // this code execute when submit button press
            {
                // -------------------------- form vaildation ---------------------------------------
                
                $validation->setRule('adm_name', 'admin name', 'required');
                $validation->setRule('adm_login_id', 'login-id', 'required');
                $validation->setRule('adm_password', 'password', 'required');
                $validation->setRule('adm_conpwd', 'Confirm password', 'required|min_length[6]|max_length[11]');
                $validation->setRule('adm_conpwd', 'Confirm Password', 'trim|matches[adm_password]');
                $validation->setRule('adm_email', 'Email', 'trim|required');
                $validation->setRule('adm_phone', 'contact no', 'required');
                $username_admin=$request->getPost('adm_login_id');
                $id=$request->getPost('id');
                if($validation->withRequest($this->request)->run() && $admin_manager_model->check_duplicate_edit($username_admin,$id)) 
                {
                    $data=$request->getPost();
                    unset($data['flag']);
                    unset($data['smt_enter']);
                    unset($data['id']);
                    
                    $adm_password =  base64_encode(base64_encode(base64_encode(base64_encode($data['adm_password']))));
					$data['adm_password'] = $adm_password;
					
					$adm_conpwd = base64_encode(base64_encode(base64_encode(base64_encode($data['adm_conpwd']))));
					$data['adm_conpwd'] = $adm_conpwd;
                    
                    
                    $admin_manager_model->admin_edit_data($data,$id);
                    $session->setFlashdata('admin_added', 'Records updated successfully');
                    return redirect()->to('admin/admin/view');
                }
                else
                {  
                    if($admin_manager_model->check_duplicate_edit($username_admin,$id)==0)
                    {
                        $session->setFlashdata('admin_add_failed', 'Username allready exists.Please choose another username');
                    }
                    $data['edit_admin']=$admin_manager_model->admin_edit($id);
                    return view('admin/admin_modify',$data);					 
                }		
                
            }
            else // this code execute when click edit button 
            {
                $id= $this->request->uri->getSegment(4);
                $data['edit_admin']=$admin_manager_model->admin_edit($id);
                return view('admin/admin_modify',$data);
            }	
        }  
        // ------------------------------- Delete  funnctin to Delete record  ------------------------------		 
        public function delete()
        {
            $admin_manager_model = new AdminManagerModel();
            $session = \Config\Services::session();
            $id= $this->request->uri->getSegment(4);
            $delete_sussess=$admin_manager_model->admin_delete($id)  ; 
            
            if($delete_sussess==1)	
            {			
                $session->setFlashdata('admin_added', 'Records deleted successfully');
                return redirect()->to('admin/admin/view');
            }
        }  
        
        // ------------------------------- Bulk Action activate, deactivate and delete  ------------------------------		  
        
        public function bulk_action()
        {
            $request = \Config\Services::request();
            $session = \Config\Services::session();	
            $admin_manager_model = new AdminManagerModel();			
            // ------------------------------- Bulk Action  delete  ------------------------------		  	 
            if($request->getPost('Delete')=='Delete')
            {
                //----------------------------------------------   
                $id_arr=$request->getPost('bb');
                
                if(count($id_arr)>0)
                {
                    foreach($id_arr as $id_str)
                    {
                        $delete_sussess=$admin_manager_model->admin_delete_bulk($id_str);
                    }
                    
                    if($delete_sussess==1)	
                    {			
                        $session->setFlashdata('admin_added', 'Records deleted successfully');
                        return redirect()->to('admin/admin/view');
                    }	
                }
                else
                {
                    $session->setFlashdata('admin_added', 'Nothing to delete');
                    return redirect()->to('admin/admin/view');
                }
            }
            // ------------------------------- Bulk Action  deactivate   ------------------------------	 
            if($request->getPost('Deactivate')=='Deactivate')
            {
                //-------------------------------------------------------------------------------
                $id_arr=$request->getPost('bb');
                
                if(count($id_arr)>0)
                {
                
                    $data['adm_status']='Inactive';
                    foreach($id_arr as $id_str)
                    {
                        $delete_sussess=$admin_manager_model->admin_deactivate_bulk($id_str,$data);
                    }
                    $session->setFlashdata('admin_added', 'Records deactivated successfully');
                    return redirect()->to('admin/admin/view');
                    
                }
                else
                {
                    $session->setFlashdata('admin_added', 'Nothing to deactivate');
                    return redirect()->to('admin/admin/view');
                }			 
            }
            // ------------------------------- Bulk Action activate  ------------------------------			
            if($request->getPost('Activate')=='Activate')
            {
                //-------------------------------------------------------------------------------
                $id_arr=$request->getPost('bb');
                if(count($id_arr)>0)
                {
                
                    $data['adm_status']='Active';
                    foreach($id_arr as $id_str)
                    {
                        $delete_sussess=$admin_manager_model->admin_activate_bulk($id_str,$data);
                    }	
                    $session->setFlashdata('admin_added', 'Records activated successfully');
                    return redirect()->to('admin/admin/view');
                    
                    
                }
                else
                {
                    $session->setFlashdata('admin_added', 'Nothing to activate');
                    return redirect()->to('admin/admin/view');
                }			 
            }
        }
    	  
    }

?>
