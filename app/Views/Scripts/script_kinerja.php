<script>
  window.js_base_url = "<? echo base_url(); ?>" + "/index.php/";
  const bulan = ["JAN", "FEB", "MAR", "APR", "MEI", "JUN", "JUL", "AGT", "SEP", "OKT", "NOV", "DES"];
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


  //------- VARIABLES DECLARATION ---------//

  var cbx_target = $("#sel_target");
  var lbl_keterangan = $("#lbl_keterangan");
  //----------------------------------------
  var lbl_persen_tebu_ditebang_buma = $("#persen_tebu_ditebang_buma");
  var lbl_persen_tebu_ditebang_cima = $("#persen_tebu_ditebang_cima");
  var lbl_persen_tebu_ditebang_bcn = $("#persen_tebu_ditebang_bcn");
  //-----------------------------------------
  var lbl_persen_protas_buma = $("#persen_protas_buma");
  var lbl_persen_protas_cima = $("#persen_protas_cima");
  var lbl_persen_protas_bcn = $("#persen_protas_bcn");
  //-----------------------------------------
  var lbl_persen_gmpg_buma = $("#persen_gmpg_buma");
  var lbl_persen_gmpg_cima = $("#persen_gmpg_cima");
  var lbl_persen_gmpg_bcn = $("#persen_gmpg_bcn");
  //-----------------------------------------
  var lbl_persen_gmt_buma = $("#persen_gmt_buma");
  var lbl_persen_gmt_cima = $("#persen_gmt_cima");
  var lbl_persen_gmt_bcn = $("#persen_gmt_bcn");
  //-----------------------------------------
  var lbl_persen_rend_buma = $("#persen_rend_buma");
  var lbl_persen_rend_cima = $("#persen_rend_cima");
  var lbl_persen_rend_bcn = $("#persen_rend_bcn");
  //-----------------------------------------
  var lbl_ton_tebu_ditebang_buma = $("#ton_tebu_ditebang_buma");
  var lbl_ton_tebu_ditebang_cima = $("#ton_tebu_ditebang_cima");
  var lbl_ton_tebu_ditebang_bcn = $("#ton_tebu_ditebang_bcn");
  //-----------------------------------------
  var lbl_protas_buma = $("#protas_buma");
  var lbl_protas_cima = $("#protas_cima");
  var lbl_protas_bcn = $("#protas_bcn");
  //-----------------------------------------
  var lbl_gmpg_buma = $("#gmpg_buma");
  var lbl_gmpg_cima = $("#gmpg_cima");
  var lbl_gmpg_bcn = $("#gmpg_bcn");
  //-----------------------------------------
  var lbl_gmt_buma = $("#gmt_buma");
  var lbl_gmt_cima = $("#gmt_cima");
  var lbl_gmt_bcn = $("#gmt_bcn");
  //-----------------------------------------
  var lbl_rend_buma = $("#rend_buma");
  var lbl_rend_cima = $("#rend_cima");
  var lbl_rend_bcn = $("#rend_bcn");
  //-----------------------------------------
  var pgb_tebu_ditebang_buma = $("#progress_tebu_ditebang_buma");
  var pgb_tebu_ditebang_cima = $("#progress_tebu_ditebang_cima");
  var pgb_tebu_ditebang_bcn = $("#progress_tebu_ditebang_bcn");
  //-----------------------------------------
  var pgb_protas_buma = $("#progress_protas_buma");
  var pgb_protas_cima = $("#progress_protas_cima");
  var pgb_protas_bcn = $("#progress_protas_bcn");
  //-----------------------------------------
  var pgb_gmpg_buma = $("#progress_gmpg_buma");
  var pgb_gmpg_cima = $("#progress_gmpg_cima");
  var pgb_gmpg_bcn = $("#progress_gmpg_bcn");
  //-----------------------------------------
  var pgb_gmt_buma = $("#progress_gmt_buma");
  var pgb_gmt_cima = $("#progress_gmt_cima");
  var pgb_gmt_bcn = $("#progress_gmt_bcn");
  //-----------------------------------------
  var pgb_rend_buma = $("#progress_rend_buma");
  var pgb_rend_cima = $("#progress_rend_cima");
  var pgb_rend_bcn = $("#progress_rend_bcn");
  //-----------------------------------------
  var arr_data_lhp_buma = [];
  var arr_data_lhp_cima = [];
  var arr_target_buma = [];
  var arr_target_cima = [];
  //---------------------------------------//

  function setColor(value){
    switch (value*100) {
      case value < 25 :
          return "bg-red";
        break;
      case (value >= 25 && value < 50):
        return "bg-";
      default:

    }
  }

  function fetchData(target){
    var url = "C_dashboard/getDataLastLhp?pg=buma";
    $.getJSON(url, function(response){
      arr_data_lhp_buma = response[0];
      refreshData();
    })
    url = "C_dashboard/getDataLastLhp?pg=cima";
    $.getJSON(url, function(response){
      arr_data_lhp_cima = response[0];
      refreshData();
    })
    url = "C_kinerja/getTargetKinerja?kat=" + target + "&pg=buma";
    $.getJSON(url, function(response){
      arr_target_buma = response[0];
      refreshData();
    })
    url = "C_kinerja/getTargetKinerja?kat=" + target + "&pg=cima";
    $.getJSON(url, function(response){
      arr_target_cima = response[0];
      console.log(arr_target_cima);
      refreshData();
    })
  }

  function refreshData(){
    //alert(arr_target_buma.deskripsi);
    //================ UPDATING INDICATORS ====================
    var ton_giling_total_buma = Number(arr_data_lhp_buma.ton_giling_total_sd) || 0;
    var ton_giling_total_cima = Number(arr_data_lhp_cima.ton_giling_total_sd) || 0;
    var ton_giling_total_bcn = ton_giling_total_buma + ton_giling_total_cima;
    var target_tebu_digiling_buma = Number(arr_target_buma.tebu_digiling_total) || 0;
    var target_tebu_digiling_cima = Number(arr_target_cima.tebu_digiling_total) || 0;
    var persen_tebu_digiling_buma = (ton_giling_total_buma)/target_tebu_digiling_buma || 0;
    var persen_tebu_digiling_cima = (ton_giling_total_cima)/target_tebu_digiling_cima || 0;
    var persen_tebu_digiling_bcn = (ton_giling_total_buma + ton_giling_total_cima)/
      (target_tebu_digiling_buma + target_tebu_digiling_cima);

    var protas_buma = (Number(arr_data_lhp_buma.ton_giling_ts_sd)/Number(arr_data_lhp_buma.ha_giling_ts_sd)) || 0;
    var target_protas_buma = Number(arr_target_buma.protas_ts) || 0;
    var persen_protas_buma = protas_buma/target_protas_buma || 0;
    var protas_cima = (Number(arr_data_lhp_cima.ton_giling_ts_sd)/Number(arr_data_lhp_cima.ha_giling_ts_sd)) || 0;
    var target_protas_cima = Number(arr_target_cima.protas_ts) || 0;
    var persen_protas_cima = protas_cima/target_protas_cima || 0;
    var protas_bcn = ((Number(arr_data_lhp_buma.ton_giling_ts_sd) + Number(arr_data_lhp_cima.ton_giling_ts_sd))/
      (Number(arr_data_lhp_buma.ha_giling_ts_sd) + Number(arr_data_lhp_cima.ha_giling_ts_sd))) || 0;
    var target_protas_bcn = (Number(arr_target_buma.tebu_digiling_ts) + Number(arr_target_cima.tebu_digiling_ts))/
      (Number(arr_target_buma.luas_digiling_ts) + Number(arr_target_cima.luas_digiling_ts)) || 0;
    var persen_protas_bcn = protas_bcn/target_protas_bcn || 0;

    var gmpg_buma = Number(arr_data_lhp_buma.gula_pg_total_sd)|| 0;
    var target_gmpg_buma = Number(arr_target_buma.gula_ts) + Number(arr_target_buma.gula_ts_eks_tr) || 0;
    var persen_gmpg_buma = gmpg_buma/target_gmpg_buma || 0;
    var gmpg_cima = Number(arr_data_lhp_cima.gula_pg_total_sd)|| 0;
    var target_gmpg_cima = Number(arr_target_cima.gula_ts) + Number(arr_target_cima.gula_ts_eks_tr) || 0;
    var persen_gmpg_cima = gmpg_cima/target_gmpg_cima || 0;
    var gmpg_bcn = gmpg_buma + gmpg_cima || 0;
    var target_gmpg_bcn = target_gmpg_buma + target_gmpg_cima || 0;
    var persen_gmpg_bcn = gmpg_bcn/target_gmpg_bcn || 0;

    var gmt_buma = Number(arr_data_lhp_buma.gula_produksi_sd) || 0;
    var target_gmt_buma = Number(arr_target_buma.gula_total) || 0;
    var persen_gmt_buma = gmt_buma/target_gmt_buma || 0;
    var gmt_cima = Number(arr_data_lhp_cima.gula_produksi_sd) || 0;
    var target_gmt_cima = Number(arr_target_cima.gula_total) || 0;
    var persen_gmt_cima = gmt_cima/target_gmt_cima || 0;
    var gmt_bcn = gmt_buma + gmt_cima || 0;
    var target_gmt_bcn = target_gmt_buma + target_gmt_cima || 0;
    var persen_gmt_bcn = gmt_bcn/target_gmt_bcn || 0;

    var rend_buma = Number(arr_data_lhp_buma.rend_total_sd) || 0;
    var target_rend_buma = Number(arr_target_buma.rend_rataan) || 0;
    var persen_rend_buma = rend_buma/target_rend_buma || 0;
    var rend_cima = Number(arr_data_lhp_cima.rend_total_sd) || 0;
    var target_rend_cima = Number(arr_target_cima.rend_rataan) || 0;
    var persen_rend_cima = rend_cima/target_rend_cima || 0;
    var hablur_buma = Number(arr_data_lhp_buma.kristal_total_sd) || 0;
    var hablur_cima = Number(arr_data_lhp_cima.kristal_total_sd) || 0;
    var rend_bcn = ((hablur_buma + hablur_cima)/ton_giling_total_bcn)*100 || 0;
    var target_hablur_buma = Number(arr_target_buma.hablur_total) || 0;
    var target_hablur_cima = Number(arr_target_cima.hablur_total) || 0;
    var target_rend_bcn = ((target_hablur_buma + target_hablur_cima)/(target_tebu_digiling_buma + target_tebu_digiling_cima))*100 || 0;
    var persen_rend_bcn = rend_bcn/target_rend_bcn || 0;

    lbl_keterangan.text(arr_target_buma.deskripsi);

    //====== BUMA ===============
    lbl_persen_tebu_ditebang_buma.text(formatting.format(
      persen_tebu_digiling_buma * 100) + '%');
    lbl_ton_tebu_ditebang_buma.text(formatting.format(ton_giling_total_buma) + ' ton / ' +
      formatting.format(target_tebu_digiling_buma) + ' ton');
    pgb_tebu_ditebang_buma.css('width', persen_tebu_digiling_buma*100 + '%').attr('aria-valuenow', persen_tebu_digiling_buma*100);
    pgb_tebu_ditebang_buma.css('background-color', "hsl(" + (persen_tebu_digiling_buma*150) + ",50%,50%)");

    lbl_persen_protas_buma.text(formatting.format(persen_protas_buma * 100) + '%');
    lbl_protas_buma.text(formatting.format(protas_buma) + ' ton/ha dari ' + formatting.format(target_protas_buma) + ' ton/ha');
    pgb_protas_buma.css('width', persen_protas_buma*100 + '%').attr('aria_valuenow', persen_protas_buma*100);
    pgb_protas_buma.css('background-color', "hsl(" + (persen_protas_buma*150) + ",50%,50%)");

    lbl_persen_gmpg_buma.text(formatting.format(persen_gmpg_buma * 100) + '%');
    lbl_gmpg_buma.text(formatting.format(gmpg_buma) + ' ton dari ' + formatting.format(target_gmpg_buma) + ' ton');
    pgb_gmpg_buma.css('width', persen_gmpg_buma*100 + '%').attr('aria_valuenow', persen_gmpg_buma*100);
    pgb_gmpg_buma.css('background-color', "hsl(" + (persen_gmpg_buma*150) + ",50%,50%)");

    lbl_persen_gmt_buma.text(formatting.format(persen_gmt_buma * 100) + '%');
    lbl_gmt_buma.text(formatting.format(gmt_buma) + ' ton dari ' + formatting.format(target_gmt_buma) + ' ton');
    pgb_gmt_buma.css('width', persen_gmt_buma*100 + '%').attr('aria_valuenow', persen_gmt_buma*100);
    pgb_gmt_buma.css('background-color', "hsl(" + (persen_gmt_buma*150) + ",50%,50%)");

    lbl_persen_rend_buma.text(formatting.format(persen_rend_buma * 100) + '%');
    lbl_rend_buma.text(formatting.format(rend_buma) + ' dari ' + formatting.format(target_rend_buma) + '');
    pgb_rend_buma.css('width', persen_rend_buma*100 + '%').attr('aria_valuenow', persen_rend_buma*100);
    pgb_rend_buma.css('background-color', "hsl(" + (persen_rend_buma*150) + ",50%,50%)");
    //===========================
    //====== CIMA ===============
    lbl_persen_tebu_ditebang_cima.text(formatting.format(
      persen_tebu_digiling_cima * 100) + '%');
    lbl_ton_tebu_ditebang_cima.text(formatting.format(ton_giling_total_cima) + ' ton / ' +
      formatting.format(target_tebu_digiling_cima) + ' ton');
    pgb_tebu_ditebang_cima.css('width', persen_tebu_digiling_cima*100 + '%').attr('aria-valuenow', persen_tebu_digiling_cima*100);
    pgb_tebu_ditebang_cima.css('background-color', "hsl(" + (persen_tebu_digiling_cima*150) + ",50%,50%)");
    lbl_persen_protas_cima.text(formatting.format(persen_protas_cima * 100) + '%');
    lbl_protas_cima.text(formatting.format(protas_cima) + ' ton/ha dari ' + formatting.format(target_protas_cima) + ' ton/ha');
    pgb_protas_cima.css('width', persen_protas_cima*100 + '%').attr('aria_valuenow', persen_protas_cima*100);
    pgb_protas_cima.css('background-color', "hsl(" + (persen_protas_cima*150) + ",50%,50%)");

    lbl_persen_gmpg_cima.text(formatting.format(persen_gmpg_cima * 100) + '%');
    lbl_gmpg_cima.text(formatting.format(gmpg_cima) + ' ton dari ' + formatting.format(target_gmpg_cima) + ' ton');
    pgb_gmpg_cima.css('width', persen_gmpg_cima*100 + '%').attr('aria_valuenow', persen_gmpg_cima*100);
    pgb_gmpg_cima.css('background-color', "hsl(" + (persen_gmpg_cima*150) + ",50%,50%)");

    lbl_persen_gmt_cima.text(formatting.format(persen_gmt_cima * 100) + '%');
    lbl_gmt_cima.text(formatting.format(gmt_cima) + ' % dari ' + formatting.format(target_gmt_cima) + ' %');
    pgb_gmt_cima.css('width', persen_gmt_cima*100 + '%').attr('aria_valuenow', persen_gmt_cima*100);
    pgb_gmt_cima.css('background-color', "hsl(" + (persen_gmt_cima*150) + ",50%,50%)");

    lbl_persen_rend_cima.text(formatting.format(persen_rend_cima * 100) + '%');
    lbl_rend_cima.text(formatting.format(rend_cima) + ' dari ' + formatting.format(target_rend_cima) + '');
    pgb_rend_cima.css('width', persen_rend_cima*100 + '%').attr('aria_valuenow', persen_rend_cima*100);
    pgb_rend_cima.css('background-color', "hsl(" + (persen_rend_cima*150) + ",50%,50%)");
    //===========================
    //====== BCN ================
    lbl_persen_tebu_ditebang_bcn.text(formatting.format(
      (persen_tebu_digiling_bcn * 100) || 0) + '%');
    lbl_ton_tebu_ditebang_bcn.text(formatting.format(ton_giling_total_bcn) + ' ton / ' +
      formatting.format(target_tebu_digiling_buma + target_tebu_digiling_cima) + ' ton');
    pgb_tebu_ditebang_bcn.css('width', persen_tebu_digiling_bcn*100 + '%').attr('aria-valuenow', persen_tebu_digiling_bcn*100);
    pgb_tebu_ditebang_bcn.css('background-color', "hsl(" + (persen_tebu_digiling_bcn*150) + ",50%,50%)");
    lbl_persen_protas_bcn.text(formatting.format(persen_protas_bcn * 100) + '%');
    lbl_protas_bcn.text(formatting.format(protas_bcn) + ' ton/ha dari ' + formatting.format(target_protas_bcn) + ' ton/ha');
    pgb_protas_bcn.css('width', persen_protas_bcn*100 + '%').attr('aria_valuenow', persen_protas_bcn*100);
    pgb_protas_bcn.css('background-color', "hsl(" + (persen_protas_bcn*150) + ",50%,50%)");
    lbl_persen_gmpg_bcn.text(formatting.format(persen_gmpg_bcn * 100) + '%');
    lbl_gmpg_bcn.text(formatting.format(gmpg_bcn) + ' ton dari ' + formatting.format(target_gmpg_bcn) + ' ton');
    pgb_gmpg_bcn.css('width', persen_gmpg_bcn*100 + '%').attr('aria_valuenow', persen_gmpg_bcn*100);
    pgb_gmpg_bcn.css('background-color', "hsl(" + (persen_gmpg_bcn*150) + ",50%,50%)");
    lbl_persen_gmt_bcn.text(formatting.format(persen_gmt_bcn * 100) + '%');
    lbl_gmt_bcn.text(formatting.format(gmt_bcn) + ' ton dari ' + formatting.format(target_gmt_bcn) + ' ton');
    pgb_gmt_bcn.css('width', persen_gmt_bcn*100 + '%').attr('aria_valuenow', persen_gmt_bcn*100);
    pgb_gmt_bcn.css('background-color', "hsl(" + (persen_gmt_bcn*150) + ",50%,50%)");
    lbl_persen_rend_bcn.text(formatting.format(persen_rend_bcn * 100) + '%');
    lbl_rend_bcn.text(formatting.format(rend_bcn) + ' dari ' + formatting.format(target_rend_bcn) + '');
    pgb_rend_bcn.css('width', persen_rend_bcn*100 + '%').attr('aria_valuenow', persen_rend_bcn*100);
    pgb_rend_bcn.css('background-color', "hsl(" + (persen_rend_bcn*150) + ",50%,50%)");
    //===========================
    //=========================================================

  }

  function initializeComboTarget(){
    cbx_target.selectize({
      create: false,
      sortField: "text",
      onChange: function(value){
        fetchData(value);
      }
    });
    cbx_target[0].selectize.addOption({value: 'rkap', text: 'RKAP'});
    cbx_target[0].selectize.addOption({value: 'takmar', text: 'Taksasi Maret'});
    cbx_target[0].selectize.addOption({value: 'prognosa', text: 'Prognosa'});
    cbx_target[0].selectize.setValue('takmar',false);
  }

  function defaultLoad(){
    //setInterval(function(){ refreshData() }, 5000);
    fetchData('takmar');
    initializeComboTarget();
  }
</script>
