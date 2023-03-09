<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\CategoryManagerModel;

class Category extends BaseController { 
    
    // ------------------------------- View funnctin load listing page while clicking on management ------------------------------
    public function view()
    {
        
        $category_manager_model = new CategoryManagerModel();
        
        $data = [
            'services_categeory' => $category_manager_model->paginate(20),
            'pager' => $category_manager_model->pager,
        ];
        return view('admin/category_view',$data); 
    }
    // ------------------------------- Add funnctin add record  ------------------------------	
    public function add()
    {
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();
        $session = \Config\Services::session();
        
        if($request->getPost('flag')=='yes') 
        {
        
            // -------------------------- form vaildation ---------------------------------------
            $validation->setRule('CategoryName', 'category name', 'required');
            if($validation->withRequest($this->request)->run()) 
            {
                $category_manager_model = new CategoryManagerModel();
                $data=$_POST;
                //------------------------------------ check file select or not and upload ------------
                
                if($this->request->getFile('smaller_picture')->isValid())
                {
                    $file = $this->request->getFile('smaller_picture');
                    $newName = $file->getRandomName();
                    
                    if ($file->move('./uploads/products/', $newName))
                    {
                        $data['Image'] = $newName;
                    }
                }
                //------------------------------------ END Upload ---------------------------------------------------		
                unset($data['flag']);
                unset($data['smt_enter']);
                $insert=$category_manager_model->services_cat_add($data);
                if($insert==1)
                {
                    $session->setFlashdata('categeory', 'Records added successfully');
                    return redirect()->to('admin/category/view');
                }
            
            }
            else
            {
            
            return view('admin/category_add');
            }  			
        
        }
        else
        {
            return view('admin/category_add');
        }	
    
    }
    // ------------------------------- Edit  funnctin edit record  ------------------------------		  
    public function edit()
    {
        $category_manager_model = new CategoryManagerModel();
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();
        $session = \Config\Services::session();
        
        $id=$request->getPost('id');
        if($request->getPost('flag')=='yes') 
        {
            
            $validation->setRule('CategoryName', 'category name', 'required');
            if($validation->withRequest($this->request)->run()) 
            {
                $data=$_POST;
                //------------------------------------ check file select or not and upload ------------
                if($this->request->getFile('smaller_picture')->isValid() && !$this->request->getFile('smaller_picture')->hasMoved())
                {
                    $file = $this->request->getFile('smaller_picture');
                    $newName = $file->getRandomName();
                    $file->move('./uploads/products/', $newName);
                    $uploadfile1 = $newName;
                    $data['Image'] = $uploadfile1;
                }
                
                //------------------------------------ END Upload ---------------------------------------------------
                unset($data['flag']);
                unset($data['smt_enter']);
                unset($data['id']);
                $category_manager_model->services_cat_edit_data($data,$id);
                $session->setFlashdata('category', 'Records updated successfully');
                return redirect()->to('admin/category/view');
            }
            else
            {
                $data['services_category']=$category_manager_model->services_cat_edit($id);
                return view('admin/category_modify',$data);
            } 	  
        
        }
        else
        {
            $id=$this->request->uri->getSegment(4);
            $data['services_category']=$category_manager_model->services_cat_edit($id);
            
            return view('admin/category_modify',$data);
        }	
    }  
    // ------------------------------- Delete  funnctin to Delete record  ------------------------------		 
    public function delete()
    {
        $category_manager_model = new CategoryManagerModel();
        $session = \Config\Services::session();
        $id= $this->request->uri->getSegment(4);
        $delete_sussess=$category_manager_model->services_cat_delete($id)  ; 
        
        if($delete_sussess==1)	
        {			
            $session->setFlashdata('categeory', 'Records deleted successfully');
            return redirect()->to('admin/category/view');
        }	
    
    }  
    
    
    // ------------------------------- Bulk Action activate, deactivate and delete  ------------------------------		  
    
    public function bulk_action()
    {
        $category_manager_model = new CategoryManagerModel();
        $request = \Config\Services::request();
        $session = \Config\Services::session();	 
        // ------------------------------- Bulk Action  delete  ------------------------------		  	 
        if($request->getPost('Delete')=='Delete')
        {
            //----------------------------------------------   
            $delete_id=$request->getPost('bb');
            if(count($delete_id)>0)
            {
                $id_str=implode(",",$delete_id);
                $delete_sussess=$category_manager_model->admin_delete_bulk($id_str);
                if($delete_sussess==1)	
                {			
                    $session->setFlashdata('category', 'Records deleted successfully');
                    return redirect()->to('admin/category/view');
                }	
            }
            else
            {
                $session->setFlashdata('category', 'Nothing to delete');
                return redirect()->to('admin/category/view');
            }			 
        
        }
        // ------------------------------- Bulk Action  deactivate   ------------------------------	 
        if($request->getPost('Deactivate')=='Deactivate')
        {
            //-------------------------------------------------------------------------------
            $id=$request->getPost('bb');
            if(count($id)>0)
            {
                $id_str=implode(",",$id);
                
                $data['Active']='N';
                $delete_sussess=$category_manager_model->admin_deactivate_bulk($id_str,$data);
                
                $session->setFlashdata('category', 'Records deactivate successfully');
                return redirect()->to('admin/category/view');
                
            }
            else
            {
                $session->setFlashdata('category', 'Nothing to activate');
                return redirect()->to('admin/category/view');
            }			 
        }
        // ------------------------------- Bulk Action activate  ------------------------------			
        if($request->getPost('Activate')=='Activate')
        {
            //-------------------------------------------------------------------------------
            $id=$request->getPost('bb');
            if(count($id)>0)
            {
                $id_str=implode(",",$id);
                $data['Active']='Y';
                $delete_sussess=$category_manager_model->admin_activate_bulk($id_str,$data);
                
                $session->setFlashdata('category', 'Records activated successfully');
                return redirect()->to('admin/category/view');
                
                
            }
            else
            {
                $session->setFlashdata('category', 'Nothing to activate');
                return redirect()->to('admin/category/view');
            }			 
        }
    }
}
?>
