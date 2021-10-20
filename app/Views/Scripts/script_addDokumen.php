<script>
  // variable declarations
  var cbx_jenisDokumen = $("#cbx_jenisDokumen");
  var cbx_kategori = $("#cbx_kategori");
  var cbx_bagian = $("#cbx_bagian");
  var cbx_tahun = $("#cbx_tahun");
  var cbx_rekening = $("#cbx_rekening");
  var cbx_unit = $("#cbx_unit");
  var d_addItem = $("#d_addItem");
  var txt_nilaiBahan = $("#txt_nilaiBahan");
  var txt_nilaiJasa = $("#txt_nilaiJasa");
  var txt_nilaiLain = $("#txt_nilaiLain");
  var txt_deskripsi = $("#txt_deskripsi");
  var lbl_anggaranTersedia = $("#lbl_anggaranTersedia");
  var txt_nomorDokumen = $("#txt_nomorDokumen");
  var dtp_tglDokumen = $("#dtp_tglDokumen"); //get value = new Date(dtp_tglDokumen.val());
  var arr_permintaan = [];
  var tbl_permintaan = $("#tbl_permintaan");
  var sisa_anggaran = 0;
  var total_permintaan = 0;
  //=======================
  function addItem(){
      //d_addItem.modal("toggle");
      let bahan = parseInt(txt_nilaiBahan.val().replace(/[^0-9. ]/g,""));
      let jasa = parseInt(txt_nilaiJasa.val().replace(/[^0-9. ]/g,""));
      let lainnya = parseInt(txt_nilaiLain.val().replace(/[^0-9. ]/g,""));
      let jumlah = bahan + jasa + lainnya;
      total_permintaan = total_permintaan + jumlah;
      if(cbx_rekening.val() !== "" && txt_deskripsi.val() !== "" && jumlah > 0){
        let data_permintaan = {
          "nomor_rekening" : cbx_rekening.val(),
          "deskripsi" : txt_deskripsi.val().toUpperCase(),
          "bahan" : bahan,
          "upah" : jasa,
          "lainnya" : lainnya
        }
        arr_permintaan.push(data_permintaan);
        resetForm();
        refreshTblPermintaan();
      } else {
        (cbx_rekening.val() === "") ? cbx_rekening.addClass("is-invalid"):cbx_rekening.removeClass("is-invalid");
        (txt_deskripsi.val() === "") ? txt_deskripsi.addClass("is-invalid"):txt_deskripsi.removeClass("is-invalid");
        (jumlah == 0) ? alert("Nilai permintaan harus ada!") : "";
      }
  }

  function hapusItem(index){
    arr_permintaan.splice(index,1);
    refreshTblPermintaan();
  }

  function save(){
    if(arr_permintaan.length > 0){
      if(cbx_jenisDokumen.val() != "" && cbx_kategori.val() != "" &&
          cbx_unit.val() != "" && cbx_bagian.val() != "" && cbx_tahun.val() != "" &&
          txt_nomorDokumen.val() != "" && dtp_tglDokumen.val() != ""){
        if(sisa_anggaran >= total_permintaan){
          let data_dokumen = {
            "jenis" : cbx_jenisDokumen.val().toUpperCase(),
            "kategori" : cbx_kategori.val(),
            "unit" : cbx_unit.val().toUpperCase(),
            "bagian" : cbx_bagian.val().toUpperCase(),
            "tahun" : cbx_tahun.val(),
            "nomor_dokumen" : txt_nomorDokumen.val().toUpperCase(),
            "tgl_dokumen" : dtp_tglDokumen.val()
          }
          let data_submit = {
            "data_dokumen" : data_dokumen,
            "data_permintaan" : arr_permintaan
          }
          $.ajax({
            url: js_base_url + "C_addDokumen/submitPermintaan",
            type: "post",
            data: {
              permintaan: JSON.stringify(data_submit)
            },
            dataType: "json",
            success: function(response){
              if (response == arr_permintaan.length){
                alert("Data berhasil disimpan!");
                resetFormHeader();
                resetForm();
              }
            }
          })
        } else {
          alert("Sisa anggaran tidak mencukupi untuk permintaan ini!");
        }
      } else {
        (cbx_jenisDokumen.val() === "") ? cbx_jenisDokumen.addClass("is-invalid") : "";
        (cbx_kategori.val() === "") ? cbx_kategori.addClass("is-invalid") : "";
        (cbx_unit.val() === "") ? cbx_unit.addClass("is-invalid") : "";
        (cbx_bagian.val() === "") ? cbx_bagian.addClass("is-invalid") : "";
        (cbx_tahun.val() === "") ? cbx_tahun.addClass("is-invalid") : "";
        (txt_nomorDokumen.val() === "") ? txt_nomorDokumen.addClass("is-invalid") : "";
        (dtp_tglDokumen.val() === "") ? dtp_tglDokumen.addClass("is-invalid") : "";
      }
    } else {
      alert("Permintaan belum diinput!");
    }
  }

  function resetForm(){
    cbx_rekening[0].selectize.clear();
    txt_deskripsi.val("");
    txt_nilaiBahan.val("");
    txt_nilaiJasa.val("");
    txt_nilaiLain.val("");
    cbx_rekening.removeClass("is-invalid");
    txt_deskripsi.removeClass("is-invalid");
  }

  function resetFormHeader(){
    cbx_jenisDokumen[0].selectize.clear();
    cbx_kategori[0].selectize.clear();
    cbx_unit[0].selectize.clear();
    cbx_bagian[0].selectize.clear();
    cbx_tahun[0].selectize.clear();
    txt_nomorDokumen.val("");
    dtp_tglDokumen.val("");
    cbx_jenisDokumen.removeClass("is-invalid");
    cbx_kategori.removeClass("is-invalid");
    cbx_unit.removeClass("is-invalid");
    cbx_bagian.removeClass("is-invalid");
    cbx_tahun.removeClass("is-invalid");
    arr_permintaan = [];
    refreshTblPermintaan();
    cbx_kategori[0].selectize.disable();
    cbx_rekening[0].selectize.disable();
    cbx_tahun[0].selectize.disable();
    lbl_anggaranTersedia.val("");
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

  function refreshTblPermintaan(){
    tbl_permintaan.DataTable().clear();
    tbl_permintaan.DataTable().rows.add(arr_permintaan);
    tbl_permintaan.DataTable().draw();
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
      sortField: "text",
      onChange: function(value){
        $.ajax({
          dataType: "json",
          type: "get",
          data: {
            kategori: value
          },
          url: "C_addDokumen/getDataRekeningByKategori",
          success: function(response){
            if(cbx_unit.val() !== ""){
              cbx_rekening[0].selectize.clear();
              cbx_rekening[0].selectize.clearOptions();
              cbx_rekening[0].selectize.addOption(response);
              cbx_rekening[0].selectize.enable();
              lbl_anggaranTersedia.val("");
            }
          }
        })
      }
    });
    cbx_bagian.selectize({
      create: false,
      sortField: "text"
    });
    cbx_tahun.selectize({
      create: false,
      sortField: "text",
      onChange: function(value){
        cbx_kategori[0].selectize.enable();
      }
    });
    cbx_rekening.selectize({
      valueField: "kode_rekening",
      labelField: "label",
      sortField: "label",
      searchField: "label",
      maxItems: 1,
      placeholder: "Pilih rekening",
      onChange: function(value){
        lbl_anggaranTersedia.val("");
        $.ajax({
          dataType: "json",
          type: "post",
          data: {
            kode_rekening: value,
            tahun: cbx_tahun.val(),
            unit: cbx_unit.val()
          },
          url: js_base_url + "C_addDokumen/getSisaAnggaran",
          success: function(res){
            if(res !== null){
              sisa_anggaran = parseFloat(res.sisa) || 0;
              lbl_anggaranTersedia.val("Rp" + sisa_anggaran.toLocaleString({}));
            }
          }
        })
      }
    });
    cbx_unit.selectize({
      create: false,
      sortField: "text",
      onChange: function(value){
        cbx_rekening[0].selectize.clear();
        cbx_tahun[0].selectize.enable();
        lbl_anggaranTersedia.val("");
      }
    })
    cbx_jenisDokumen[0].selectize.addOption({value: 'au31', text: 'AU31'});
    cbx_jenisDokumen[0].selectize.addOption({value: 'pb74', text: 'PB74'});
    cbx_kategori[0].selectize.addOption({value: '1', text: 'INVESTASI'});
    cbx_kategori[0].selectize.addOption({value: '2', text: 'EKSPLOITASI'});
    cbx_bagian[0].selectize.addOption({value: 'tan', text: 'TANAMAN'});
    cbx_bagian[0].selectize.addOption({value: 'msi', text: 'TEKNIK'});
    cbx_bagian[0].selectize.addOption({value: 'plh', text: 'PENGOLAHAN'});
    cbx_bagian[0].selectize.addOption({value: 'plt', text: 'PELTEK'});
    cbx_bagian[0].selectize.addOption({value: 'ltb', text: 'LITBANG'});
    cbx_bagian[0].selectize.addOption({value: 'sdu', text: 'SDM & UMUM'});
    cbx_bagian[0].selectize.addOption({value: 'aku', text: 'AKU'});
    cbx_tahun[0].selectize.addOption({value: '2022', text: '2022'});
    cbx_tahun[0].selectize.addOption({value: '2023', text: '2023'});
    cbx_unit[0].selectize.addOption({value: 'buma', text: 'BUMA'});
    cbx_unit[0].selectize.addOption({value: 'cima', text: 'CIMA'});
    cbx_rekening[0].selectize.disable();
    cbx_kategori[0].selectize.disable();
    cbx_tahun[0].selectize.disable();
  }

  function initTable(){
    tbl_permintaan.DataTable({
      bFilter: false,
      bPaginate: true,
      bSort: false,
      bInfo: false,
      data: arr_permintaan,
      columns : [
        {
          data: "no",
          render: function(data, type, row, meta){
            return meta.row + meta.settings._iDisplayStart + 1;
          }
        },
        {data: "nomor_rekening"},
        {data: "deskripsi"},
        {
          data: "bahan",
          render: function(data, type, row, meta){
            return "<div style='text-align:right'>" +
              parseInt(data).toLocaleString(undefined, {maximumFractionDigits:0}) +
              "</div>";
          }
        },
        {
          data: "upah",
          render: function(data, type, row, meta){
            return "<div style='text-align:right'>" +
              parseInt(data).toLocaleString(undefined, {maximumFractionDigits:0}) +
              "</div>";
          }
        },
        {
          data: "lainnya",
          render: function(data, type, row, meta){
            return "<div style='text-align:right'>" +
              parseInt(data).toLocaleString(undefined, {maximumFractionDigits:0}) +
              "</div>";
          }
        },
        {
          render: function(data, type, row, meta){
            return "<div style='text-align:right'>" +
              (parseInt(row.bahan) + parseInt(row.upah) + parseInt(row.lainnya)).toLocaleString(undefined, {maximumFractionDigits:0}) +
              "</div>";
          }
        },
        {
          data: "button",
          render: function(data, type, row, meta){
            return '<a class="btn btn-outline-primary btn-icon" onClick="hapusItem('+ meta.row + ')" id="" href="#"><i class="bi bi-trash"></i></a>'
          },
          className: "text-center"
        }
      ]
    });
  }

  function defaultLoad(){
    initCombo();
    initData();
    initTable();
  }
</script>
