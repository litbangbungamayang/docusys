<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class C_trendline extends BaseController
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
		return view('trendline');
	}

  function tes(){
    var_dump(json_decode($this->request->getVar('payload')));
  }

  function getDataGrafik1(){
    $this->model_dashboard = model("M_Dashboard");
    //var_dump(($this->request->getPost()));
    echo $this->model_dashboard->getDataGrafik1($this->request->getPost());
  }

}
