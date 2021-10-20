<?php

namespace App\Controllers;

class C_monitoring extends BaseController
{
	public function index()
	{
		return view('monitoring');
	}

	public function getDataMonitoring(){
		$this->model_monitoring = Model("M_Monitoring");
		$unit = $this->request->getVar("unit");
		return $this->model_monitoring->getDataMonitoring($unit);
	}

}
