<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Anggaran extends Model{

  protected $table = "tbl_bgt_anggaran";
  protected $primaryKey = "id";
  protected $allowedFields = [
    "id",
    "kode_rekening",
    "unit",
    "nilai",
    "tahun_anggaran"
  ];

  function addPermintaan($arg){
    return json_encode($this->db->table($this->table)->insertBatch($arg));
  }

  function getSisaAnggaran($arg){
    $query = "
    select ang.kode_rekening, ang.nilai, (req.bahan+req.upah+req.lainnya) as terpakai,
      (ang.nilai - (req.bahan+req.upah+req.lainnya)) as sisa
    from tbl_bgt_anggaran ang
      join tbl_bgt_permintaan req on req.nomor_rekening = ang.kode_rekening
    where ang.kode_rekening = ?
    group by ang.kode_rekening;
    ";
    return json_encode($this->db->query($query, array($arg))->getRow());
  }

}
