<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Monitoring extends Model{

  function getDataMonitoring($arg){
    $query = "
      select
        dok.id,
        rq.id as id_permintaan,
        dok.unit, dok.jenis,
        dok.nomor_dokumen,
        dok.tahun,
        rq.nomor_rekening,
        rq.deskripsi,
        dok.status,
        dok.kategori,
        rq.bahan,
        rq.upah,
        rq.lainnya,
        (rq.bahan+rq.upah+rq.lainnya) as total
      from tbl_bgt_dokumen dok
        join tbl_bgt_permintaan rq on dok.id = rq.id_dokumen
      where dok.unit like ?
      order by dok.tahun, dok.unit
    ";
    return json_encode(($this->db->query($query, ["%".$arg."%"])->getResult()));
  }

  function getDataMonitoringMulti($arg){
    $obj = (object) $arg;
    $query = "
      select
        dok.id,
        rq.id as id_permintaan,
        dok.unit, dok.jenis,
        dok.nomor_dokumen,
        dok.tahun,
        rq.nomor_rekening,
        rq.deskripsi,
        SUBSTRING(rq.deskripsi,1,50) as desk_pendek,
        dok.status,
        dok.kategori,
        dok.bagian,
        rq.bahan,
        rq.upah,
        rq.lainnya,
        (rq.bahan+rq.upah+rq.lainnya) as total
      from tbl_bgt_dokumen dok
        join tbl_bgt_permintaan rq on dok.id = rq.id_dokumen
      where dok.unit = ? and dok.jenis = ? and dok.tahun = ? and dok.kategori = ? and dok.bagian = ? and dok.status = 3
      order by dok.tahun, dok.unit
    ";
    return json_encode(($this->db->query($query, [$obj->unit, $obj->jenis, $obj->tahun, $obj->kategori, $obj->bagian])->getResult()));
  }

}
