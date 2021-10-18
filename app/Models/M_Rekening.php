<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Rekening extends Model{

  function getDataRekening(){
    $query = "select *,concat(kode_rekening, ' - ', deskripsi_rekening) as label from tbl_bgt_rekening";
    return json_encode($this->db->query($query)->getResult());
  }
  
  function getDataRekeningByKategori($arg){
    $query = "select *,concat(kode_rekening, ' - ', deskripsi_rekening) as label from tbl_bgt_rekening
      where kategori=?";
    return json_encode($this->db->query($query, array($arg))->getResult());
  }
}
