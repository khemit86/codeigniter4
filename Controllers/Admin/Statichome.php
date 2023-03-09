<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\StaticManageModel;

class Statichome extends BaseController {

	// ------------------------------------ check valid users -------------------------------------------------------------------
    public function view()
	{
		$staticManageModel = new StaticManageModel();
		
		$data = [
            'staticlist' => $staticManageModel->paginate(20),
            'pager' => $staticManageModel->pager,
        ];
	   
		return view('admin/static_home_view', $data); // Load the view
	}
	
	// ------------------------------- Edit  funnctin edit record  ------------------------------	 header_image      
    public function edit()
    {
        $staticManageModel = new StaticManageModel();
        
        $validation = \Config\Services::validation();
        $session = \Config\Services::session();
        $request = \Config\Services::request();
        
        if($request->getPost('flag')=='yes') 
        {	
            $validation->setRule('page_name', 'page name', 'required');
            $validation->setRule('PageTitle', 'page title', 'required');
            $validation->setRule('page_description', 'page description', 'required');
            
            $id=$request->getPost('id');
            if($validation->withRequest($this->request)->run()) 
            {				  
                $data = $this->request->getPost();						 
                //---------------------- check file select or not and upload ------------
                if($this->request->getFile('header_image')->isValid() && !$this->request->getFile('header_image')->hasMoved())
                {
                    $file = $this->request->getFile('header_image');
                    $fileName = $file->getRandomName();
                    $file->move('./uploads/menu/', $fileName);
                    $data['header_image'] = $fileName;
                }					 
                unset($data['flag']);
                unset($data['smt_enter']);
                unset($data['id']);
                $staticManageModel->static_edit_data($data, $id);
                $session->setFlashData('static', 'Static page content updated successfully');
                return redirect()->to('admin/statichome/view');
            }
            else
            {
                $data['edit_static_home']=$staticManageModel->static_edit($id);
                return view('admin/static_home_modify',$data);
            }
        }
        else
        {
            $id=$this->request->uri->getSegment(4);
            $data['edit_static_home']=$staticManageModel->static_edit($id);
            return view('admin/static_home_modify',$data);
        }	
    }    

	
}
?>
