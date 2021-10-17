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
		return ($this->model_rekening->getDataRekening());
	}

	public function getDataRekeningByKategori(){
		$this->model_rekening = Model("M_Rekening");
		$kategori = $this->request->getVar("kategori");
		echo $this->model_rekening->getDataRekeningByKategori($kategori);
	}

	public function submitPermintaan(){
		$data_submit = json_decode($this->request->getVar("permintaan"));
		$data_dokumen = $data_submit->data_dokumen;
		$data_permintaan = $data_submit->data_permintaan;
		$this->model_dokumen = Model("M_Dokumen");
		$this->model_permintaan = Model("M_Permintaan");
		$id_dokumen = $this->model_dokumen->addDokumen($data_dokumen);
		$data_permintaan_submit = [];
		foreach ($data_permintaan as $value) {
			$newValue = array(
				"id_dokumen" => $id_dokumen,
				"nomor_rekening" => $value->nomor_rekening,
				"deskripsi" => $value->deskripsi,
				"bahan" => $value->bahan,
				"upah" => $value->upah,
				"lainnya" => $value->lainnya
			);
			array_push($data_permintaan_submit, $newValue);
		}
		return $this->model_permintaan->addPermintaan($data_permintaan_submit);
	}


}
