<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Dokumen extends Model{

  protected $table = "tbl_bgt_dokumen";
  protected $primaryKey = "id";
  protected $allowedFields = [
    "jenis", "kategori", "unit", "bagian", "tahun", "nomor_dokumen",
    "tgl_dokumen", "user"
  ];

  function addDokumen($arg){
    $this->insert($arg);
    return json_encode($this->insertID);
  }

  function cekDokumen($arg){
    $builder = $this->db->table($this->table)->select("*");
    $builder->where("nomor_dokumen", $arg);
    $builder->where("status <> 3");
    return json_encode($builder->get()->getRow());
  }
}
