<?php
namespace App\Controllers;
use App\Models\HomeModel;

class Home extends BaseController
{
    public function index()
    {
		$home_model = new HomeModel();
		$welcome_text = $home_model->home_welcome_text();
		$data['welcome_text']  = $welcome_text;
		return view('index',$data);
    }
}
