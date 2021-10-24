<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Dokumen extends Model{

  protected $table = "tbl_bgt_dokumen";
  protected $primaryKey = "id";
  protected $allowedFields = [
    "jenis", "kategori", "unit", "bagian", "tahun", "nomor_dokumen",
    "tgl_dokumen", "user", "status"
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

  function getPermintaan($args){
    $builder = $this->db->table($this->table)->select("*");
    $builder->where("jenis", $args["jenis"]);
    $builder->where("kategori", $args["kategori"]);
    $builder->where("unit", $args["unit"]);
    $builder->where("bagian", $args["bagian"]);
    $builder->where("tahun", $args["tahun"]);
    return json_encode($builder->get()->getResult());
  }
}
