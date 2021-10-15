<?php

namespace App\Controllers;

class C_detail extends BaseController
{
	public function index()
	{
		//return view('kinerja');
	}

	public function onfarm($pg){
		$view_data = array(
			'pg' => $pg
		);
    return view('detail',$view_data);
	}

	public function getMulaiGiling(){
		$pg = $this->request->getGet('pg');
		$this->model_dashboard = model("M_Dashboard");
		echo $this->model_dashboard->getMulaiGiling($pg);
	}

	public function getGilingSeinduk(){
		$pg = $this->request->getGet('pg');
		$tgl_last_lhp = $this->request->getGet('tgl_last_lhp');
		$this->model_dashboard = model("M_Dashboard");
		echo $this->model_dashboard->getGilingSeinduk($pg, $tgl_last_lhp);
	}

	public function getDataRkap(){
		$pg = $this->request->getGet('pg');
		$this->model_dashboard = model("M_Dashboard");
		$arg = [$pg, 'rkap', '0', '0']; //PG; Kategori; Revisi; Status
		echo $this->model_dashboard->getDataTarget($arg);
	}

	public function getDataTakmar(){
		$pg = $this->request->getGet('pg');
		$this->model_dashboard = model("M_Dashboard");
		$arg = [$pg, 'takmar', '0', '1'];
		echo $this->model_dashboard->getDataTarget($arg);
	}

	public function getDataRkapp(){
		$pg = $this->request->getGet('pg');
		$this->model_dashboard = model("M_Dashboard");
		$arg = [$pg, 'rkap', '2', '1'];
		echo $this->model_dashboard->getDataTarget($arg);
	}

	public function getDataPrognosa(){
		$pg = $this->request->getGet('pg');
		$this->model_dashboard = model("M_Dashboard");
		$arg = [$pg, 'prognosa', '0', '1'];
		echo $this->model_dashboard->getDataTarget($arg);
	}

}


?>
