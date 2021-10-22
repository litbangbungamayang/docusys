<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Monitoring extends Model{

  function getDataMonitoring($arg){
    $query = "
      select
        dok.id,
        dok.unit, dok.jenis,
        dok.nomor_dokumen,
        dok.tahun,
        rq.nomor_rekening,
        rq.deskripsi,
        dok.status,
        dok.kategori,
        (rq.bahan+rq.upah+rq.lainnya) as total
      from tbl_bgt_dokumen dok
        join tbl_bgt_permintaan rq on dok.id = rq.id_dokumen
      where dok.unit like ?
      order by dok.tahun, dok.unit
    ";
    return json_encode(($this->db->query($query, ["%".$arg."%"])->getResult()));
  }

}
