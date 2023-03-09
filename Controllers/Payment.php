<?php
namespace App\Controllers;
use App\Models\PaymentPageModel;

class Payment extends BaseController
{
    public function index()
    {
		error_reporting(0);
		$session = \Config\Services::session();
		$session->set('noRefresh', '');
		$payment_page_model = new PaymentPageModel();
		$data['payment_option']=$payment_page_model->payment_option_text();
		$data['paycompany']=$payment_page_model->pay_company();
		$data['product']=$payment_page_model->product();
		return view('payment_view',$data);
    }
	
	public function view()
	{
		$validation = \Config\Services::validation();
		$session = \Config\Services::session();
		$request = \Config\Services::request();
		// -------------------------- form vaildation -----------------------------------------------------------------------------------
		$validation->setRule('CompanyName', 'company name', 'required');
		$validation->setRule('Amount', 'amount', 'required');
		
		if($validation->withRequest($this->request)->run())
		{	
			$session_id=$session->session_id;
			if($session->get('noRefresh')=='')
			{ 
					
				$payment_page_model = new PaymentPageModel();
				$session->set('noRefresh', 'noRefresh');
				//------------------------------------------------ delete -----------------------------------------------------
				
				$ProductID = $request->getPost('ProductID');
				$check=$payment_page_model->delete_cart_item($session_id,$ProductID);
				$check_array=$payment_page_model->check_cart_item($ProductID, $session_id);
				if($check_array==0)
				{
					$data['product_details']=$payment_page_model->product_details($ProductID);	
					$data_1['SessionID'] = $session_id;
					$data_1['ProductName']=$data['product_details'][0]['ProductName'];
					$data_1['Price']=$request->getPost('Amount');
					$data_1['Quantity']=1;
					$data_1['IsProductsOption']=$request->getPost('CompanyName');
					$data_1['ProductID']=$ProductID;
					
					$data['product_details']=$payment_page_model->cart_add($data_1);
				}
				else
				{
					$Quantity=$check_array[0]['Quantity']+1;
					$data_u['Quantity']=$Quantity;
					$payment_page_model->cart_quantity_update($session_id,$ProductID, $data_u);
				}
				return redirect()->to('payment/payment_details');
			}
		}
		else
		{
			$session->set('noRefresh', '');
			$payment_page_model = new PaymentPageModel();
			$data['payment_option']=$payment_page_model->payment_option_text();
			$data['paycompany']=$payment_page_model->pay_company();
			$data['product']=$payment_page_model->product();
			return view('payment_view',$data);
		} 	
	}
	
	public function payment_details()
	{
		error_reporting(0);
		$session = \Config\Services::session();
		$session_id=$session->session_id;
		$payment_page_model = new PaymentPageModel();
		$data['cart_details']=$payment_page_model->get_cart_details($session_id);
		$data['cart_text']=$payment_page_model->payment_cart_text();
		$data['state']=$payment_page_model->state_dropdown();
		$data['country']=$payment_page_model->country_dropdown();
		$id= $data['cart_details'][0]['IsProductsOption'];
		$data['company']=$payment_page_model->company_name($id);
		return view('payment_cart_view',$data);
	}		
}
