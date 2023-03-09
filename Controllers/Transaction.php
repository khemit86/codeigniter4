<?php
namespace App\Controllers;
use App\Models\TransactionPageModel;
use App\Models\PaymentPageModel;
use App\Libraries\Gwapi; // Import library


class Transaction extends BaseController
{
    public function index()
	{
		$validation = \Config\Services::validation();
		$request = \Config\Services::request();
		$validation->setRule('PatientAccountNumber', 'patient account number', 'required');
		$validation->setRule('FirstName', 'first name', 'required');
		$validation->setRule('LastName', 'last name', 'required');
		$validation->setRule('DateOfBirth', 'date of birth', 'required');
		$validation->setRule('Address', 'address', 'required');
		$validation->setRule('City', 'city', 'required');
		$validation->setRule('State', 'state', 'required');
		$validation->setRule('Zip', 'zipcode', 'required');
		$validation->setRule('Phone', 'phone', 'required');
		$validation->setRule('CardType', 'card type', 'required');
		$validation->setRule('membercard_num', 'card number', 'required');
		$validation->setRule('CardCode', 'cvs code', 'required');
		$validation->setRule('expdate', 'exp date', 'required');
		$validation->setRule('expmonthyear', 'exp year', 'required');
		$validation->setRule('CardHolderName', 'card holder name', 'required');
		$validation->setRule('C_billingAddress', 'billing address', 'required');
		$validation->setRule('C_billingCity', 'billing city', 'required');
		$validation->setRule('C_billingState', 'billing state', 'required');
		$validation->setRule('C_billingPostalCode', 'billing zipcode', 'required');
		$validation->setRule('Email', 'email', 'required');
											
		if($validation->withRequest($this->request)->run()) 
		{
		
			$transaction_page_model = new TransactionPageModel();
			$session = \Config\Services::session();
			$session_id=$session->session_id;
			$product_arr=$transaction_page_model->check_cart_item($session_id);	
			
		
			//---------------------------------------------------------------------------------------------------										
			$FirstName=$request->getPost('FirstName');                         
			$data_1['FirstName']=$FirstName;
			$LastName=$request->getPost('LastName');      
			$data_1['LastName']=$LastName; 
			$Address1=$request->getPost('Address');   
			$data_1['Address1']=$Address1;
			$Address2=$request->getPost('Address2');  
			$data_1['Address2']=$Address2;
			$City=$request->getPost('City');      
			$data_1['City']=$City;
			$State=$request->getPost('State');    
			$data_1['State']=$State;
			$PostalCode=$request->getPost('Zip'); 
			$data_1['PostalCode']=$PostalCode;
			$Phone=$request->getPost('Phone');  
			$data_1['Phone']=$Phone ; 
			$Phone2=$request->getPost('Phone2'); 
			$data_1['Phone2']=$Phone2  ;
			$Email=$request->getPost('Email');  
			$data_1['Email']=$Email;
			$SpecialInstructions=$request->getPost('SpecialInstructions');   
			$data_1['SpecialInstructions']=$SpecialInstructions ;
			$Counrty=$request->getPost('CountryID');       
			$data_1['CountryID']=$Counrty;
			
			if(isset($product_arr[0]['Price'])){
			    $price=$product_arr[0]['Price'];
			}else{
			    $price=0;
			    
			}
			$CompanyName=$request->getPost('CompanyName');   
			$data_1['CompanyName']=$CompanyName;
			$Tprice=$price;                                                              
			$DateOfBirth=$request->getPost('DateOfBirth');   
			$data_1['DateOfBirth']=$DateOfBirth;
			$IsRecuring=$request->getPost('IsRecuring'); 
			if(isset($product_arr[0]['IsProductsOption'])){
			    $PayCompanyName=$product_arr[0]['IsProductsOption']; 
			}else{
			     $PayCompanyName = 2;
			}
			$PatientAccountNumber=$request->getPost('PatientAccountNumber');   
			$data_1['PatientAccountNumber']=$PatientAccountNumber;    
		//---------------------------------------------------------------------------------------------------	
			$StateArr=$transaction_page_model->state_name($State);  
			$data_1['State']=$State;
			$C_billingState=$StateArr[0]['StateName'];
			$CountryArr=$transaction_page_model->country_name($Counrty);        
			$data_1['Counrty']=$Counrty;
			$CountryName=$CountryArr[0]['Country'];
		//---------------------------------------------------------------------------------------------------		
			$CardType=$request->getPost('CardType');             
			$data_1['CardType']=$CardType;
			$membercard_num=$request->getPost('membercard_num');  
			$data_1['membercard_num']=$membercard_num;
			$CardCode=$request->getPost('CardCode');       
			$data_1['CardCode']=$CardCode;
			$expdate=$request->getPost('expdate');    
			$data_1['expdate']=$expdate;
			$expmonthyear=$request->getPost('expmonthyear');  
			$data_1['expmonthyear']=$expmonthyear;
			$C_billingAddress=$request->getPost('C_billingAddress'); 
			$data_1['C_billingAddress']=$C_billingAddress;
			$CardHolderName=$request->getPost('CardHolderName');    
			$data_1['CardHolderName']=$CardHolderName;
			$C_billingCity=$request->getPost('C_billingCity');  
			$data_1['C_billingCity']=$C_billingCity;
			$C_billingState=$request->getPost('C_billingState');   
			$data_1['C_billingState']=$C_billingState ; 
			$C_billingPostalCode=$request->getPost('C_billingPostalCode');	
			$data_1['C_billingPostalCode']=$C_billingPostalCode;	
			$SpecialInstructions=$request->getPost('SpecialInstructions');	
			$data_1['SpecialInstructions']=$SpecialInstructions;
			
			$gw = new Gwapi();
			$orderid=time();;
        //------------------------------------------------------------------------------------------------------------------------------------

		 if($PayCompanyName==1)	 
			   { 
				  $gw->setLogin("xxxxxxx", "xxxxx");     
			   } 
			if($PayCompanyName==2)	 
			   { 
				  $gw->setLogin("xxxxx", "xxxx"); 
			   }
			 //$gw->setLogin("demo", "password");          //NIRAJ TEST INFO     user=JohnsonT|| pw=sajKh4H9lhs!1 /
			 // 1.=Surgery Center (Yellow  Statement)
			 // 2.=Missoula Bone & Joint Clinic (Blue Statement)
			$gw->setBilling("$FirstName","$LastName","","$C_billingAddress","$C_billingAddress", "$C_billingCity",
			"$C_billingState","$C_billingPostalCode","$CountryName","$Phone","","$Email","");
			
		    $gw->setShipping("$FirstName","$LastName","","$C_billingAddress","$C_billingAddress", "$C_billingCity",
			"$C_billingState","$C_billingPostalCode","$CountryName","$Phone","","$Email","");
			
			  // --set credit card information--------------------------------------------------------------------
			$gw->setOrder("$orderid","Bill Order","", "", "$PatientAccountNumber","69.167.186.96");
			  //-set credit card information--------------------------------------------------------------------
			$r = $gw->doSale("$Tprice","$membercard_num","$expdate$expmonthyear"); 
			
		
			$str=$gw->responses['responsetext'];
			$ResponsReturn=$gw->responses['response']; 
			
			if($ResponsReturn==1 &&  $price>0)
			{
						  
				   $datearr=explode('/',$DateOfBirth);
				   if(isset($datearr[2]) && isset($datearr[1]) && isset($datearr[0])){
				     $datestr=$datearr[2]."-".$datearr[0]."-".$datearr[1];
				   }else{
				       
				        $datestr = date('Y-m-d');
				   }
			  
					$data_cust['PatientAccountNumber']=$PatientAccountNumber;   
					$data_cust['SpecialInstructions']=$SpecialInstructions ;
					$data_cust['FirstName']=$FirstName;
					$data_cust['LastName']=$LastName; 
					$data_cust['Address']=$Address1;
					$data_cust['Address2']=$Address2;
					$data_cust['City']=$City;
					$data_cust['State']=$State;
					$data_cust['Zip']=$PostalCode;
					$data_cust['Phone']=$Phone ; 
					$data_cust['Phone2']=$Phone2  ;
					$data_cust['Email']=$Email;
					$data_cust['CountryID']=$Counrty;
					$data_cust['CompanyName']=$CompanyName;
					$data_cust['DateOfBirth']=$datestr;
					$data_cust['Status']='Y';
					$data_cust['RegistrationDate']=date('Y-m-d');
				  //$data_cust['CardType']=$CardType;
					$data_cust['CardHolderName']=$CardHolderName;
					$data_cust['PaymentStatus']=1;
					$data_cust['IsRecuring']='';
					$data_cust['PaymentFor']='';
					$data_cust['AdditionalNotes']=$SpecialInstructions;
					$data_cust['Price']=$Tprice;
					//---------------------------------------------------------------------------------------------------								
					$Registrant_Id=$transaction_page_model->customers_info_add($data_cust);	
					$productarr=$transaction_page_model->check_cart_item($session_id);	
	                //------------------------------------------------------------------------------------------------------				
					$data_cart['ProductID']=$productarr[0]['ProductID'];
					$data_cart['Qty']=$productarr[0]['Quantity'];
					$data_cart['IsProductsOption']=$productarr[0]['IsProductsOption'];
					$data_cart['SpecialInstructions']=$productarr[0]['SpecialInstructions'];
					$data_cart['ProductName']=$productarr[0]['ProductName'];
					$data_cart['Price']=$productarr[0]['Price'];
					$data_cart['RegistrantId']=$Registrant_Id;
					$insert=$transaction_page_model->customers_item_add($data_cart);	
	                //----------------------------delete item from cart -------------------------------------	
					$delete=$transaction_page_model->cart_delete($session_id);	
					//------------------------------------------------------------------------------------------------------------------------------			
					//----------------------------------------------Mail code gose here-------------------------------------------------------------			
					//------------------------------------------------------------------------------------------------------------------------------
					$data['customer_item_details']=$transaction_page_model->customer_order_item($Registrant_Id);
					
					
					$data['customer_finfo']=$transaction_page_model->customer_details($Registrant_Id);
					$company_id=$data['customer_finfo'][0]['CompanyName'];
					$country_id=$data['customer_finfo'][0]['CountryID'];
					$state_id=$data['customer_finfo'][0]['State'];
					$data['company_name']=$transaction_page_model->company_details($company_id);
					$data['country_name']=$transaction_page_model->country_name($country_id);
					$data['state_name']=$transaction_page_model->state_name($state_id);
				
					$email = \Config\Services::email(); // loading for use
					$mail=$data['customer_finfo'][0]['Email']; 
					$fromeamil=SystemEmailUser;

					$email->setTo($mail);
					$email->setMailType('html');
					$email->setFrom($fromeamil, 'Missoula Bone and Joint/Surgery Center');
					$email->setSubject('Missoula Bone and Joint Center/Surgery Center');
					
					// Using a custom template
					$template = view("email_format", $data);
					$email->setMessage($template);

					// Send email
				    if ($email->send()) {
						//echo 'Email successfully sent, please check.';
					} else {
						//$data = $email->printDebugger(['headers']);
						
					}
	
                //------------------------------------------------------------------------------------------------------------------------------
                //----------------------------------------------Mail code gose here-----------------------------------------------------------
                //------------------------------------------------------------------------------------------------------------------------------	
			  
				return redirect()->to('transaction/success/'.$Registrant_Id);
			}
		   else 
			{
				$data_1['str']=$str		;
				$data_page['mydata']=$data_1;
				//----------------------------------------------------------------------------------------------------------------------------
				// if tansaction is deline then re-enter information then re-enter information then re-enter information 
				// then re-enter information  then re-enter information then re-enter information then re-enter information then re-enter    												    
				//  information  re-enter information re-enter information re-enter information re-enter information re-enter information    
				//------------------------------------------------------------------------------------------------------------------------------
				
				return view('transaction_view',$data_page);
			}
		}
		else
		{
		   
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
//----------------------------------------------------------------------------------------------------------------------------------------------------------------	
//----------------------------------------------------------------------------------------------------------------------------------------------------------------					

	public function success()
	{
		$transaction_page_model = new TransactionPageModel();
	
		$order_item = $this->request->uri->getSegment(3);
		$data['success_text']=$transaction_page_model->trasaction_success_text();
		$data['customer_item_details']=$transaction_page_model->customer_order_item($order_item);
		$data['customer_finfo']=$transaction_page_model->customer_details($order_item);
		$company_id=$data['customer_finfo'][0]['CompanyName'];
		$country_id=$data['customer_finfo'][0]['CountryID'];
		$state_id=$data['customer_finfo'][0]['State'];
		$data['company_name']=$transaction_page_model->company_details($company_id);
		$data['country_name']=$transaction_page_model->country_name($country_id);
		$data['state_name']=$transaction_page_model->state_name($state_id);
		error_reporting(0);
		return view('transaction_success_view',$data);
	}

}
