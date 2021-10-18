<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Anggaran extends Model{

  protected $table = "tbl_bgt_anggaran";

  function getSisaAnggaran($arg){
    $query = "
      select
        bgt.*,
        IFNULL(sub.pemakaian,0) as pemakaian,
        bgt.nilai-IFNULL(sub.pemakaian,0) as sisa
      from tbl_bgt_anggaran bgt
      	left join (
      		select
      			req.nomor_rekening,
      			(sum(req.bahan) + sum(req.upah) + sum(req.lainnya)) as pemakaian
      		from tbl_bgt_dokumen dok
      			join tbl_bgt_permintaan req on dok.id = req.id_dokumen
      		where req.nomor_rekening = ? and dok.unit = ? and dok.tahun = ?
          ) sub on sub.nomor_rekening = bgt.kode_rekening
      where bgt.kode_rekening = ? and bgt.unit = ? and bgt.tahun_anggaran = ?
    ";

    return json_encode($this->db->query($query, [
        $arg['kode_rekening'],
        $arg['unit'],
        $arg['tahun'],
        $arg['kode_rekening'],
        $arg['unit'],
        $arg['tahun']
      ])->getRow());
  }

}
