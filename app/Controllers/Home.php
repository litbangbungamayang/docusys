<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		//return view('welcome_message');
		//return view('main_page');
		//$data['pageTitle'] = 'Dashboard BCN';
		//echo view('Templates/main_layout', $data);
		//echo view('Templates/footer');
		//$this->load->view('Templates/upper_navbar', $data);
		//return view('Templates/app_layout', $data);
		return view('dashboard');
	}

	public function kinerja(){
		var_dump('OK');
		//return view('kinerja');
	}
}
