<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Trendline extends Model{

  private $buma_env = "http://simpgbuma.ptpn7.com/index.php/api_bcn/";
  private $cima_env = "http://simpgcima.ptpn7.com/index.php/api_bcn/";
  private $lokal = "http://localhost/simpgbuma/api_bcn/";

  public function getDataDashboard($pg){
    $server_pg = null;
    switch($pg){
      case "buma":
        $server_pg = $this->buma_env;
        break;
      case "cima":
        $server_pg = $this->cima_env;
        break;
      case "lokal":
        $server_pg = $this->lokal;
        break;
    }
    $request = array("db_server"=>$server_pg, "url"=>"getDataDashboard");
    return ($this->getCurl($request));
  }

  function getCurl($request){
    $db_server = $request["db_server"];
    $url = str_replace(" ", "", $request["url"]);
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $db_server.$url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache"
      ),
    ));
    $response = curl_exec($curl);
    $error = curl_error($curl);
    curl_close($curl);
    return $response; // output as json encoded
  }

  function serverRequest($pg,$req){
    $server_pg = null;
    switch($pg){
      case "buma":
        $server_pg = $this->buma_env;
        break;
      case "cima":
        $server_pg = $this->cima_env;
        break;
      case "lokal":
        $server_pg = $this->lokal;
        break;
    }
    $request = array("db_server"=>$server_pg, "url"=>$req);
    return ($this->getCurl($request));
  }

  function tesDb(){
    return json_encode($this->db->query("select * from tbl_mon_target")->getResult());
  }

  function getTargetKinerja($kategori, $pg){
    $query = "select * from tbl_mon_target where kategori = ? and pg = ? and status = ?";
    $argument = [$kategori, $pg, 1];
    return json_encode($this->db->query($query, $argument)->getResult());
  }

}
