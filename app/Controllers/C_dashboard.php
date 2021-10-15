<?php

namespace App\Controllers;

class C_dashboard extends BaseController
{
	public function getMonitoringIntegrasiPerPg(){
		$this->model_dashboard = model("M_Dashboard");
		$pg = $this->request->getGet('pg');
		date_default_timezone_set('Asia/Jakarta');
		$jam_skrg = date("G");
		$tglTimbang = date("Y-m-d");
		if ($jam_skrg < 6){
			$tglTimbang = date("Y-m-d", strtotime($tglTimbang. '- 1 day'));
		}
		$result = (json_decode($this->model_dashboard->serverRequest($pg,"getMonitoringIntegrasi?tglTimbang=".$tglTimbang)));
		$array_jam = [];
		$array_tebu = [];
		$array_digiling = [];
		$array_gabungan = [];
		for ($i = 0; $i < sizeof($result); $i++){
			$array_jam[$i] = $result[$i]->jam;
			$array_tebu[$i] = $result[$i]->timbangan;
			$array_digiling[$i] = $result[$i]->digiling;
		}
		$array_gabungan = array(
			'jam' => $array_jam,
			'tebu_masuk' => $array_tebu,
			'tebu_digiling' => $array_digiling
		);
		echo json_encode($array_gabungan);
	}

	public function getDataDashboard(){
		$this->model_dashboard = model("M_Dashboard");
		$pg = $this->request->getGet('pg');
		echo $this->model_dashboard->serverRequest($pg, "getDataDashboard");
	}

	public function getTglTimbang(){
		date_default_timezone_set('Asia/Jakarta');
		$jam_skrg = date("G");
		$tglTimbang = date("Y-m-d");
		if ($jam_skrg < 6){
			$tglTimbang = date("Y-m-d", strtotime($tglTimbang. '- 1 day'));
		}
		echo json_encode($tglTimbang);
	}

	public function getLastLhp(){
		$this->model_dashboard = model("M_Dashboard");
		$pg = $this->request->getGet('pg');
		$result = (json_decode($this->model_dashboard->serverRequest($pg,"getLastLhp")));
		echo json_encode($result);
	}

	public function getDataLastLhp(){
		$this->model_dashboard = model("M_Dashboard");
		$pg = $this->request->getGet("pg");
		//$result = (json_encode($this->model_dashboard->getDataLastLhp($pg)));
		$result = (json_decode($this->model_dashboard->serverRequest($pg,"getDataLastLhp")));
		echo json_encode($result);
	}

	public function tesDb(){
		$this->model_dashboard = model("M_Dashboard");
		echo (($this->model_dashboard->tesDb()));
	}

	public function getTbSetting(){
		$this->model_dashboard = model("M_Dashboard");
		$pg = $this->request->getGet("pg");
		$result = (json_decode($this->model_dashboard->serverRequest($pg,"getTbSetting")));
		echo json_encode($result);
	}

}
