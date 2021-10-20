<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Monitoring extends Model{

  function getDataMonitoring($arg){
    $query = "
      select
        dok.unit, dok.jenis, dok.nomor_dokumen, dok.tahun, (rq.bahan+rq.upah+rq.lainnya) as total
      from tbl_bgt_dokumen dok
        join tbl_bgt_permintaan rq on dok.id = rq.id_dokumen
      where dok.unit like ?
      order by dok.tahun, dok.unit
    ";
    var_dump(($this->db->query($query, ["%".buma"%"])->getResult()));
  }

}
