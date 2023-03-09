<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\PaymentManagerModel;

class Payment extends BaseController {

	// ------------------------------------ check valid users -------------------------------------------------------------------
   	public function view()
    {
        $Paymentmanager = new \App\Models\Admin\PaymentManagerModel();
        $pager = service('pager');
		$page    = (int) ($this->request->getGet('page') ?? 1);
		$perPage = 50;
    	$total   = $Paymentmanager->get_total();
		$offset = ($page - 1) * $perPage;
	
		// Call makeLinks() to make pagination links.
		$pager_links = $pager->makeLinks($page, $perPage, $total);
       
        // Pass the data and pager to the view
        $data = [
        	'paymentlist' =>  $Paymentmanager->payment_view($perPage, $offset),
        	'pager_links' => $pager_links,
        ];
        
        return view('admin/payment_view', $data);
    }
	
	// ------------------------------- Edit  funnctin edit record  ------------------------------	 header_image      
    public function edit()
    {
        $paymentManagerModel = new PaymentManagerModel();
        
        $validation = \Config\Services::validation();
        $session = \Config\Services::session();
        $request = \Config\Services::request();
        
        if($request->getPost('flag')=='yes') 
         {	
        		$validation->setRule('FirstName', 'first name', 'required');
        		$validation->setRule('LastName', 'last name', 'required');
        		$validation->setRule('Address', 'address', 'required');					
        		
        		$id=$request->getPost('id');
        		if($validation->withRequest($this->request)->run()) 
        		  {				  
        			$data = $this->request->getPost();						 
        			
        			unset($data['flag']);
        			unset($data['smt_enter']);
        			unset($data['id']);
        			$paymentManagerModel->payment_edit_data($data,$id);
        			$session->setFlashData('static', 'Record updated successfully');
        			return redirect()->to('admin/payment/view');
        		  }
        		 else
        		  {
        		  
        			$data['edit_static_home']=$paymentManagerModel->static_edit($id);
        			$data['item_view']=$paymentManagerModel->item_view($id);
        			$data['country']=$paymentManagerModel->country_dropd();
        			$data['state']=$paymentManagerModel->state_dropd();
        			return view('admin/static_home_modify',$data);
        			
        		  }
         }
        else
         {
               $id=$this->request->uri->getSegment(4);
        	   $data['edit_payment_home']=$paymentManagerModel->payment_edit($id);
        	   $data['item_view']=$paymentManagerModel->item_view($id);
        	   $data['country']=$paymentManagerModel->country_dropd();
        	   $data['state']=$paymentManagerModel->state_dropd();
        	   return view('admin/payment_modify',$data);
         }	
    }    

	
}
?>