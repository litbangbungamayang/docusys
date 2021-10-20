<script>
  // variable declarations

  var tbl_monitoring = $("#tbl_monitoring");

  //=======================


  function refreshTabel(){
    tbl_monitoring.DataTable().clear();
    tbl_monitoring.DataTable().draw();
  }

  function initData(){

  }

  function initCombo(){

  }

  function initTable(){
    tbl_monitoring.DataTable({
      bFilter: false,
      bPaginate: true,
      bSort: false,
      bInfo: false,
      ajax:{
        url: js_base_url + "C_monitoring/getDataMonitoring?unit=buma",
        dataSrc: ""
      },
      columns : [
        {
          data: "no",
          render: function(data, type, row, meta){
            return meta.row + meta.settings._iDisplayStart + 1;
          }
        },
        {data: "nomor_rekening"},
        {data: "unit"},
        {data: "jenis"},
        {data: "nomor_dokumen"},
        {
          data: "total",
          render: function(data, type, row, meta){
            return "<div style='text-align:right'>" +
              parseInt(data).toLocaleString(undefined, {maximumFractionDigits:0}) +
              "</div>";
          }
        },
        {data: "status"},
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
