<?php

namespace App\Controllers;

class C_addDokumen extends BaseController
{
	public function index()
	{
		return view('addDokumen');
	}

	public function getDataRekening(){
		$this->model_rekening = Model("M_Rekening");
		echo ($this->model_rekening->getDataRekening());
	}
}
