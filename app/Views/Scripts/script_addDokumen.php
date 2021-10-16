<script>
  // variable declarations
  var cbx_jenisDokumen = $("#cbx_jenisDokumen");
  var cbx_kategori = $("#cbx_kategori");
  var cbx_bagian = $("#cbx_bagian");
  var cbx_tahun = $("#cbx_tahun");
  var cbx_rekening = $("#cbx_rekening");
  var d_addItem = $("#d_addItem");
  var txt_nilaiBahan = $("#txt_nilaiBahan");
  var txt_nilaiJasa = $("#txt_nilaiJasa");
  var txt_nilaiLain = $("#txt_nilaiLain");
  var dtp_tglDokumen = $("#dtp_tglDokumen"); //get value = new Date(dtp_tglDokumen.val());
  //=======================
  function addItem(){
      d_addItem.modal("toggle");
  }

  txt_nilaiBahan.blur(function(){
    koreksiDesimal(txt_nilaiBahan);
  })

  txt_nilaiJasa.blur(function(){
    koreksiDesimal(txt_nilaiJasa);
  })

  txt_nilaiLain.blur(function(){
    koreksiDesimal(txt_nilaiLain);
  })

  function koreksiDesimal(textBox){
    var val_textbox = textBox.val();
    val_textbox = parseInt(val_textbox.replace(/[^0-9.]/,""));
    (isNaN(val_textbox) ? val_textbox = 0 : val_textbox = val_textbox);
    textBox.val(val_textbox.toLocaleString());
  }

  function initData(){
    $.getJSON(
      "C_addDokumen/getDataRekening",
      function(response){
        cbx_rekening[0].selectize.addOption(response);
    })
  }

  function initCombo(){
    cbx_jenisDokumen.selectize({
      create: false,
      sortField: "text"
    });
    cbx_kategori.selectize({
      create: false,
      sortField: "text"
    });
    cbx_bagian.selectize({
      create: false,
      sortField: "text"
    });
    cbx_tahun.selectize({
      create: false,
      sortField: "text"
    });
    cbx_rekening.selectize({
      valueField: "kode_rekening",
      labelField: "label",
      sortField: "label",
      searchField: "label",
      maxItems: 1,
      placeholder: "Pilih rekening"
    });
    cbx_jenisDokumen[0].selectize.addOption({value: 'au31', text: 'AU31'});
    cbx_jenisDokumen[0].selectize.addOption({value: 'pb74', text: 'PB74'});
    cbx_kategori[0].selectize.addOption({value: 'investasi', text: 'INVESTASI'});
    cbx_kategori[0].selectize.addOption({value: 'eksploitasi', text: 'EKSPLOITASI'});
    cbx_bagian[0].selectize.addOption({value: 'tan', text: 'TANAMAN'});
    cbx_bagian[0].selectize.addOption({value: 'msi', text: 'TEKNIK'});
    cbx_bagian[0].selectize.addOption({value: 'plh', text: 'PENGOLAHAN'});
    cbx_bagian[0].selectize.addOption({value: 'plt', text: 'PELTEK'});
    cbx_bagian[0].selectize.addOption({value: 'ltb', text: 'LITBANG'});
    cbx_bagian[0].selectize.addOption({value: 'sdu', text: 'SDM & UMUM'});
    cbx_bagian[0].selectize.addOption({value: 'aku', text: 'AKU'});
    cbx_tahun[0].selectize.addOption({value: '2022', text: '2022'});
    cbx_tahun[0].selectize.addOption({value: '2023', text: '2023'});
  }

  function defaultLoad(){
    initCombo();
    initData();
  }
</script>
