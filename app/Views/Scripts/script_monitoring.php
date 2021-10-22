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
      bFilter: true,
      bPaginate: true,
      bSort: false,
      bInfo: false,
      ajax:{
        url: js_base_url + "C_monitoring/getDataMonitoring?unit=",
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
        {
          data: "kategori",
          render: function(data, type, row, meta){
            let label = "";
            switch(data){
              case "1": label = "INVESTASI"
              break;
              case "2": label = "EKSPLOITASI"
              break;
            }
            return label;
          },
        },
        {data: "nomor_dokumen"},
        {data: "deskripsi"},
        {
          data: "total",
          render: function(data, type, row, meta){
            return "<div style='text-align:right'>" +
              parseInt(data).toLocaleString(undefined, {maximumFractionDigits:0}) +
              "</div>";
          }
        },
        {
          data: "status",
          render: function(data, type, row, meta){
            let label = "";
            switch(data){
              case "1": label = "<span class='badge bg-blue ms-auto'>submit</span>"
              break;
              case "2": label = "<span class='badge bg-green ms-auto'>valid</span>"
              break;
              case "3": label = "<span class='badge bg-red ms-auto'>reject</span>"
              break;
            }
            return label;
          },
          className: "text-left"
        }
      ]
    });
    tbl_monitoring.on("click", "tbody tr", function(){
      console.log("API row values = ", tbl_monitoring.DataTable().row(this).data().id);
    })
  }

  function defaultLoad(){
    initCombo();
    initData();
    initTable();
  }
</script>
