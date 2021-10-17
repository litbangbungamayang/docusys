<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Permintaan extends Model{

  protected $table = "tbl_bgt_permintaan";
  protected $primaryKey = "id";
  protected $allowedFields = [
    "id_dokumen",
    "deskripsi",
    "bahan",
    "upah",
    "lainnya",
    "nomor_rekening"
  ];

  function addPermintaan($arg){
    return json_encode($this->db->table($this->table)->insertBatch($arg));
  }
}
