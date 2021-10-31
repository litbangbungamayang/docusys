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
  var arr_pilihan = [];
  var tbl_permintaan = $("#tbl_permintaan");
  var tbl_dipilih = $("#tbl_dipilih");
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

  function transferItem(id){
    let arr_filter = arr_permintaan.filter(arr => arr.id === id);
    arr_filter.forEach((item, i) => {
      arr_pilihan.push(item);
    });
    for(let i = 0; i < arr_permintaan.length; i++){
      for(let j = 0; j < arr_pilihan.length; j++){
        if(arr_permintaan[i].id === arr_pilihan[j].id){
          arr_permintaan.splice(i,1);
        }
      }
    }
    refreshTblPermintaan();
    refreshTblPilihan();
  }

  function backTransferItem(id){
    let arr_filter = arr_pilihan.filter(arr => arr.id === id);
    arr_filter.forEach((item, i) => {
      arr_permintaan.push(item);
    });
    for(let i = 0; i < arr_filter.length; i++){
      for(let j = 0; j < arr_pilihan.length; j++){
        if(arr_filter[i].id === arr_pilihan[j].id){
          arr_pilihan.splice(j,1);
        }
      }
    }
    refreshTblPermintaan();
    refreshTblPilihan();
  }

  function save(){
    var walink = 'https://web.whatsapp.com/send';
    var nomorHP = '+6281383913914';
    var teksPesan = "Hai, Mas Azid saya sudah kirim file, berikut detailnya:";
    var kirimFile = walink + '?phone=' + nomorHP + '&text=' + teksPesan;
    window.open(kirimFile,'_blank');
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

  txt_nomorDokumen.blur(function(){
    $.getJSON(
      "C_addDokumen/cekDokumen?nomor_dokumen=" + txt_nomorDokumen.val(),
      function(response){
        if (response !== null){
          alert("Nomor dokumen sudah ada!");
          resetFormHeader();
        }
    })
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

  function refreshTblPilihan(){
    tbl_dipilih.DataTable().clear();
    tbl_dipilih.DataTable().rows.add(arr_pilihan);
    tbl_dipilih.DataTable().draw();
  }

  function searchDok(){
    /*
    tbl_permintaan.DataTable().ajax.url(js_base_url +
      "C_addPpab/getPermintaan?" +
      "unit=" + cbx_unit.val() +
      "&jenis=" + cbx_jenisDokumen.val() +
      "&tahun=" + cbx_tahun.val() +
      "&kategori=" + cbx_kategori.val() +
      "&bagian=" + cbx_bagian.val()
    ).load();
    */
    $.ajax({
      url: js_base_url + "C_addPpab/getPermintaan",
      data: {
        unit: cbx_unit.val(),
        jenis: cbx_jenisDokumen.val(),
        tahun: cbx_tahun.val(),
        kategori: cbx_kategori.val(),
        bagian: cbx_bagian.val()
      },
      dataType: "json",
      type: "get",
      success: function(response){
        arr_permintaan = response;
        refreshTblPermintaan();
      }
    })
  }

  function initData(){

  }

  function initCombo(){
    cbx_jenisDokumen.selectize({
      create: false,
      sortField: "text"
    });
    cbx_kategori.selectize({
      create: false,
      sortField: "text",
    });
    cbx_bagian.selectize({
      create: false,
      sortField: "text",
    });
    cbx_tahun.selectize({
      create: false,
      sortField: "text",
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
    for(let i = -2; i <= 2; i++){
      let tahun = new Date();
      tahun = tahun.getFullYear();
      cbx_tahun[0].selectize.addOption({value: tahun + i, text: tahun + i});
    }
    cbx_unit[0].selectize.addOption({value: 'buma', text: 'BUMA'});
    cbx_unit[0].selectize.addOption({value: 'cima', text: 'CIMA'});
  }

  function initTable(){
    //$("#tblList").DataTable().ajax.url(js_base_url + "Rdkk_list/getKelompokByTahun?tahun_giling=" + tahun_giling).load();
    tbl_permintaan.DataTable({
      bFilter: true,
      bPaginate: true,
      bSort: false,
      bInfo: false,
      data: arr_permintaan,
      columns : [
        {
          data: null,
          defaultContent: ""
        },
        {data: "nomor_rekening"},
        {
          data: "deskripsi",
          /*
          render: function(data, type, row, meta){
            return data.substr(0,10);
          }
          */
        },
        {data: "nomor_dokumen"},
        {
          render: function(data, type, row, meta){
            return "<div style='text-align:right'>" +
              (parseInt(row.bahan) + parseInt(row.upah) + parseInt(row.lainnya)).toLocaleString(undefined, {maximumFractionDigits:0}) +
              "</div>";
          }
        }
      ]
    });
    tbl_dipilih.DataTable({
      bFilter: false,
      bPaginate: true,
      bSort: false,
      bInfo: false,
      data: arr_pilihan,
      columns : [
        {
          data: "no",
          render: function(data, type, row, meta){
            return meta.row + meta.settings._iDisplayStart + 1;
          }
        },
        {data: "nomor_rekening"},
        {data: "deskripsi"},
        {data: "nomor_dokumen"},
        {
          render: function(data, type, row, meta){
            return "<div style='text-align:right'>" +
              (parseInt(row.bahan) + parseInt(row.upah) + parseInt(row.lainnya)).toLocaleString(undefined, {maximumFractionDigits:0}) +
              "</div>";
          }
        }
      ],
      "footerCallback": function( tfoot, data, start, end, display ) {
        var api = this.api(), data;
        let total = 0;
        data.forEach((item, i) => {
          total += +item.total;
        });

        console.log(data);
        $(api.column(4).footer()).html(
          parseInt(total).toLocaleString(undefined, {maximumFractionDigits:0})
        );
      }
    });
    tbl_permintaan.on("click", "tbody tr", function(){
      transferItem(tbl_permintaan.DataTable().row(this).data().id);
    });
    tbl_dipilih.on("click", "tbody tr", function(){
      backTransferItem(tbl_dipilih.DataTable().row(this).data().id);
    });
    tbl_permintaan.on("order.dt search.dt", function(){
      tbl_permintaan.DataTable().column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
      });
    })
    tbl_dipilih.on("order.dt search.dt", function(){
      tbl_dipilih.DataTable().column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
      });
    })
  }

  function defaultLoad(){
    initCombo();
    initData();
    initTable();
  }
</script>
