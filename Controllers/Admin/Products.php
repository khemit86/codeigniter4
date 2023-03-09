<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\ProductsManagerModel;

class Products extends BaseController {  

// ------------------------------- View funnctin load listing page while clicking on management ------------------------------
	public function view()
	  {
		$products_manager_model = new ProductsManagerModel();
		
		$data = [
            'services_products' => $products_manager_model->paginate(20),
            'pager' => $products_manager_model->pager,
        ];
		
		return view('admin/products_view',$data);
	  }
// ------------------------------- Add funnctin add record  ------------------------------	
    public function add()
    {
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();
        $session = \Config\Services::session();	 
        $products_manager_model = new ProductsManagerModel(); 
        if($request->getPost('flag')=='yes'){
            // -------------------------- form vaildation ---------------------------------------
            $validation->setRule('ProductName', 'product name', 'required');
            if($validation->withRequest($this->request)->run()) 
            {
                $data=$_POST;
                //------------------------------------ check file select or not and upload ------------
                if($this->request->getFile('smaller_picture'))
                {
                    $file = $this->request->getFile('smaller_picture');
                    $file->move('./uploads/products/');
                    $data['Photo'] = $file->getName();
                    // store the file information in the database or use it for further processing
                }
                //------------------------------------ END Upload ---------------------------------------------------		
                unset($data['flag']);
                unset($data['smt_enter']);
                $insert=$products_manager_model->products_add($data);
                if($insert==1)
                {
                    $session->setFlashdata('products', 'Records added successfully');
                    return redirect()->to('admin/products/view');
                }
            }
            else
            {
                $data['catid']=$products_manager_model->category_drop();
                return view('admin/products_add',$data);
            }
        }
        else
        {
            $data['catid']=$products_manager_model->category_drop();
            return view('admin/products_add',$data);
        }
    }
// ------------------------------- Edit  funnctin edit record  ------------------------------		  
    public function edit()
    {
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();
        $session = \Config\Services::session();
        $products_manager_model = new ProductsManagerModel();
        $id=$request->getPost('id');
        if($request->getPost('flag')=='yes') 
        {
            $validation->setRule('ProductName', 'product name', 'required');
            if($validation->withRequest($this->request)->run()) 
            {
                $data=$_POST;
                
                //------------------------------------ check file select or not and upload ------------
                if($this->request->getFile('smaller_picture')->isValid())
                {
                    $smallerPicture = $this->request->getFile('smaller_picture');
                    $smallerPicture->move('./uploads/products/', $smallerPicture->getName());
                    $uploadfile1 = $smallerPicture->getName();
                    $data['Photo'] = $uploadfile1;
                }
                
                //------------------------------------ END Upload ---------------------------------------------------
                unset($data['flag']);
                unset($data['smt_enter']);
                unset($data['id']);
                $products_manager_model->products_edit_data($data,$id);
                $session->setFlashdata('products', 'Records updated successfully');
                return redirect()->to('admin/products/view');
            }
            else
            {
                $data['productsegory']=$products_manager_model->products_edit($id);
                $data['catid']=$products_manager_model->category_drop();
                return view('admin/products_modify',$data);
            }
        }
        else
        {
            $id= $this->request->uri->getSegment(4);
            $data['catid']=$products_manager_model->category_drop();
            $data['productsegory']=$products_manager_model->products_edit($id);
            return view('admin/products_modify',$data);
        }	
    } 
    // ------------------------------- Delete  funnctin to Delete record  ------------------------------		 
    public function delete()
    {
        $products_manager_model = new ProductsManagerModel();
        $session = \Config\Services::session();
        $id= $this->request->uri->getSegment(4);
        $delete_sussess=$products_manager_model->products_delete($id)  ; 
        
        if($delete_sussess==1)	
        {			
            $session->setFlashdata('products', 'Records deleted successfully');
            return redirect()->to('admin/products/view');
        }	
    
    }  
	  
	  
    // ------------------------------- Bulk Action activate, deactivate and delete  ------------------------------		  
    
    public function bulk_action()
    {
        $request = \Config\Services::request();
        $session = \Config\Services::session();	
        $products_manager_model = new ProductsManagerModel();
        // ------------------------------- Bulk Action  delete  ------------------------------		  	 
        if($request->getPost('Delete')=='Delete')
        {
            //----------------------------------------------   
            $delete_id=$request->getPost('bb');
            if(count($delete_id)>0)
            {
                $id_str=implode(",",$delete_id);
                
                $delete_sussess=$products_manager_model->admin_delete_bulk($id_str);
                if($delete_sussess==1)	
                {			
                    $session->setFlashdata('products', 'Records deleted successfully');
                    return redirect()->to('admin/products/view');
                }	
            }
            else
            {
                $session->setFlashdata('products', 'Nothing to delete');
                return redirect()->to('admin/products/view');
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
                $delete_sussess=$products_manager_model->admin_deactivate_bulk($id_str,$data);
                
                $session->setFlashdata('products', 'Records deactivate successfully');
                return redirect()->to('admin/products/view');
                
            }
            else
            {
                $session->setFlashdata('products', 'Nothing to activate');
                return redirect()->to('admin/products/view');
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
                $delete_sussess=$products_manager_model->admin_activate_bulk($id_str,$data);
                
                $session->setFlashdata('products', 'Records activated successfully');
                return redirect()->to('admin/products/view');
            }
            else
            {
                $session->setFlashdata('products', 'Nothing to activate');
                return redirect()->to('admin/products/view');
            }			 
        }
    }
}

?>
