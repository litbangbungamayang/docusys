<script>
  window.js_base_url = "<? echo base_url(); ?>" + "/index.php/";
  const bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
  const formatOptions = {maximumFractionDigits: 2, minimumFractionDigits: 2};
  const formatting = new Intl.NumberFormat('id-UK', formatOptions);
  function convertArrayToNumber(arrToConvert){
    if (Array.isArray(arrToConvert)){
      var arrResult = [];
      for (var i = 0; i < arrToConvert.length; i++){
        if (arrToConvert[i] !== null){
          arrResult[i] = parseFloat(parseFloat(arrToConvert[i]).toFixed(2));
        } else {
          arrResult[i] = null;
        }
      }
      return arrResult;
    } else {
      return null;
    }
  }

  //VARIABLES DECLARATION
  var lbl_mulai_giling = $("#lbl_mulai_giling");
  var dtp_akhir_giling = $("#dtp_akhir_giling");
  var tbl_data = $("#dataText");

  var tgl_last_lhp;
  var tebu_ts;
  var tebu_tr;
  var tebu_tsi = [];
  var target_rkap;
  var target_takmar;
  var target_rkapp;
  var target_prognosa;
  var v_tgl_giling;
  var tgl_akhir_giling;
  var sisa_hari_giling;
  var table_data;
  //============================================

  function appendLeadingZeroes(n){
    if (n <= 9){
      return "0" + n;
    }
    return n;
  }

  function getLastLhp(){
    var url_4 = js_base_url + "C_dashboard/getDataLastLhp?pg=" + pg;
    $.getJSON(url_4, function(response){
      if (response !== null){
        tebu_ts = Number(response[0].ton_giling_ts_sd) || 0;
        tebu_tr = Number(response[0].ton_giling_tr_sd) || 0;
        tgl_last_lhp = response[0].tgl_giling;

        url_4 = js_base_url + "C_detail/getGilingSeinduk?pg=" + pg + "&tgl_last_lhp=" + tgl_last_lhp;
        $.getJSON(url_4, function(response){
          if (response !== null){
            tebu_tsi = response;
          }
        })
      }
    })
  }

  function getDataRkap(){
    var url = js_base_url + "C_detail/getDataRkap?pg=" + pg;
    $.getJSON(url, function(response){
      target_rkap = response;
    })
  }

  function getDataTakmar(){
    var url = js_base_url + "C_detail/getDataTakmar?pg=" + pg;
    $.getJSON(url, function(response){
      target_takmar = response;
    })
  }

  function getDataRkapp(){
    var url = js_base_url + "C_detail/getDataRkapp?pg=" + pg;
    $.getJSON(url, function(response){
      target_rkapp = response;
    })
  }

  function getDataPrognosa(){
    var url = js_base_url + "C_detail/getDataPrognosa?pg=" + pg;
    $.getJSON(url, function(response){
      target_prognosa = response;
      //console.log(target_prognosa);
    })
  }

  function fetchData(){
    tgl_akhir_giling = new Date(dtp_akhir_giling.val());
    sisa_hari_giling = (Math.floor((tgl_akhir_giling - new Date(tgl_last_lhp)) / (1000*60*60*24)));
    /*
    console.log("prognosa s.d. = " + target_prognosa[0].tebu_digiling_ts);
    console.log("tebu ts s.d. = " + tebu_ts);
    console.log("sisa hari giling = " + sisa_hari_giling);
    */
    let urutan = 1;
    let tebu_tsi_jml = 0;
    table_data = `
    <tr>
      <td>` + urutan + `</td>
      <td>Tebu Sendiri (TS)</td>
      <td style="text-align:right;">` + formatting.format(tebu_ts) + `</td>
      <td style="text-align:right;">` + formatting.format((Number(target_rkap[0].tebu_digiling_ts) - tebu_ts)/sisa_hari_giling) + `</td>
      <td style="text-align:right;">` + formatting.format((Number(target_takmar[0].tebu_digiling_ts) - tebu_ts)/sisa_hari_giling) + `</td>
      <td style="text-align:right;">` + formatting.format((Number(target_rkapp[0].tebu_digiling_ts) - tebu_ts)/sisa_hari_giling) + `</td>
      <td style="text-align:right;">` + formatting.format((Number(target_prognosa[0].tebu_digiling_ts) - tebu_ts)/sisa_hari_giling) + `</td>
      <th></th>
    <tr>
    `;
    urutan++;
    if(target_rkap.length > 1){
      target_rkap.forEach((item, index) => {
        table_data = table_data + `
          <tr>
            <td>` + urutan + `</td>
            <td> Tebu Seinduk Unit ` + tebu_tsi[index].kebun + `</td>
            <td style="text-align:right;">` + formatting.format(tebu_tsi[index].ton) + `</td>
            <td style="text-align:right;">` + formatting.format((Number(target_rkap[index].tebu_digiling) - tebu_tsi[index].ton)/sisa_hari_giling) + `</td>
            <td style="text-align:right;">` + formatting.format((Number(target_takmar[index].tebu_digiling) - tebu_tsi[index].ton)/sisa_hari_giling) + `</td>
            <td style="text-align:right;">` + formatting.format((Number(target_rkapp[index].tebu_digiling) - tebu_tsi[index].ton)/sisa_hari_giling) + `</td>
            <td style="text-align:right;">` + formatting.format((Number(target_prognosa[index].tebu_digiling) - tebu_tsi[index].ton)/sisa_hari_giling) + `</td>
            <th></th>
          <tr>
        `;
        tebu_tsi_jml = tebu_tsi_jml + Number(tebu_tsi[index].ton);
        urutan++;
      })
      table_data = table_data + `
      <tr>
        <td></td>
        <td>Jumlah Tebu Sendiri</td>
        <td style="text-align:right;">` + formatting.format(Number(tebu_ts) + Number(tebu_tsi_jml)) + `</td>
        <td style="text-align:right;">` + formatting.format((Number(target_rkap[0].tebu_digiling_ts) + (Number(target_rkap[0].tebu_digiling_tsi)) - (tebu_ts +tebu_tsi_jml))/sisa_hari_giling) + `</td>
        <td style="text-align:right;">` + formatting.format((Number(target_takmar[0].tebu_digiling_ts) + (Number(target_takmar[0].tebu_digiling_tsi)) - (tebu_ts +tebu_tsi_jml))/sisa_hari_giling) + `</td>
        <td style="text-align:right;">` + formatting.format((Number(target_rkapp[0].tebu_digiling_ts) + (Number(target_rkapp[0].tebu_digiling_tsi)) - (tebu_ts +tebu_tsi_jml))/sisa_hari_giling) + `</td>
        <td style="text-align:right;">` + formatting.format((Number(target_prognosa[0].tebu_digiling_ts) + (Number(target_rkapp[0].tebu_digiling_tsi)) - (tebu_ts +tebu_tsi_jml))/sisa_hari_giling) + `</td>
        <th></th>
      <tr>
      `;
    };

    table_data = table_data + `
    <tr>
      <td>` + urutan + `</td>
      <td>Tebu Rakyat (TR)</td>
      <td style="text-align:right;">` + formatting.format(tebu_tr) + `</td>
      <td style="text-align:right;">` + formatting.format((Number(target_rkap[0].tebu_digiling_tr) - tebu_tr)/sisa_hari_giling) + `</td>
      <td style="text-align:right;">` + formatting.format((Number(target_takmar[0].tebu_digiling_tr) - tebu_tr)/sisa_hari_giling) + `</td>
      <td style="text-align:right;">` + formatting.format((Number(target_rkapp[0].tebu_digiling_tr) - tebu_tr)/sisa_hari_giling) + `</td>
      <td style="text-align:right;">` + formatting.format((Number(target_prognosa[0].tebu_digiling_tr) - tebu_tr)/sisa_hari_giling) + `</td>
      <th></th>
    <tr>
    `;
    table_data = table_data + `
    <tr>
      <td></td>
      <td>Total Tebu</td>
      <td style="text-align:right;">` + formatting.format(tebu_tr + tebu_ts + tebu_tsi_jml) + `</td>
      <td style="text-align:right;">` + formatting.format((Number(target_rkap[0].tebu_digiling_total) - (tebu_tr + tebu_ts + tebu_tsi_jml))/sisa_hari_giling) + `</td>
      <td style="text-align:right;">` + formatting.format((Number(target_takmar[0].tebu_digiling_total) - (tebu_tr + tebu_ts + tebu_tsi_jml))/sisa_hari_giling) + `</td>
      <td style="text-align:right;">` + formatting.format((Number(target_rkapp[0].tebu_digiling_total) - (tebu_tr + tebu_ts + tebu_tsi_jml))/sisa_hari_giling) + `</td>
      <td style="text-align:right;">` + formatting.format((Number(target_prognosa[0].tebu_digiling_total) - (tebu_tr + tebu_ts + tebu_tsi_jml))/sisa_hari_giling) + `</td>
      <th></th>
    <tr>
    `;
    tbl_data.html(table_data);
  }

  function getMulaiGiling(){
    var url = js_base_url + "C_detail/getMulaiGiling?pg=" + pg;
    $.getJSON(url, function(response){
      v_tgl_giling = new Date(response[0].awal_giling);
      var formatted_tgl_giling = appendLeadingZeroes(v_tgl_giling.getDate())
        + " " + bulan[v_tgl_giling.getMonth()] + " " + v_tgl_giling.getFullYear();
      lbl_mulai_giling.text(formatted_tgl_giling);
    })
  }

  function defaultLoad(){
    getMulaiGiling();
    getLastLhp();
    getDataRkap();
    getDataRkapp();
    getDataTakmar();
    getDataPrognosa();
  }
</script>
