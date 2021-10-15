<?= $this->extend('Templates/app_layout'); ?>

<?= $this->section('header'); ?>

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<script>
  var pg = "<? echo $pg;?>";
</script>
<div class="wrapper">
  <?= $this->include('Templates/sidemenu') ?>
  <div class="page-wrapper">
    <div class="container-xl">
      <!-- Page title -->
      <div class="page-header d-print-none">
        <div class="row align-items-center">
          <div class="col">
            <h2 class="page-title">
              Detail On Farm <? echo ($pg == 'buma')? 'Bungamayang':'Cinta Manis'; ?>
            </h2>
          </div>
        </div>
      </div>
      <div class="col-lg-12" style="display:none">
        <div class="card card-body">
          <div class="card-title">Produksi per Wilayah</div>
          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
              <thead>
                <tr>
                  <th class="w-1">No.</th>
                  <th>Wilayah</th>
                  <th>Tebu (ton)</th>
                  <th>Protas</th>
                  <th>Takmar (ton)</th>
                  <th>Takmar (protas)</th>
                  <th>RKAP (ton)</th>
                  <th>RKAP (protas)</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="card card-body">
          <div class="card-title" style="margin-bottom:50px">Target pasok berdasarkan sisa tebu</div>
          <div class="row row-deck row-cards">
            <div class="row">
              <div class="col-lg-3">
                  <div class="row"><div>Awal giling</div></div>
                  <div class="row"><div id="lbl_mulai_giling"></div></div>
              </div>
              <div class="col-lg-3">
                  <div class="row"><div>Rencana akhir giling</div></div>
                  <div class="row"><div><input type="date" class="form-control" id="dtp_akhir_giling" onchange="fetchData();"></input></div></div>
              </div>
            </div>
          </div>
          <div class="row row-cards" style="margin-top:20px">
            <div class="col-12">
              <div class="row">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                      <thead>
                        <tr>
                          <th class="w-1"></th>
                          <th></th>
                          <th></th>
                          <th colspan = "5" style="text-align:center;">Target pasok per hari thd</th>
                        </tr>
                        <tr>
                          <th class="w-1">No.</th>
                          <th style="text-align:left;">Kepemilikan</th>
                          <th style="text-align:right;">Realisasi s.d.</th>
                          <th style="text-align:right;">RKAP</th>
                          <th style="text-align:right;">Takmar</th>
                          <th style="text-align:right;">RKAPP</th>
                          <th style="text-align:right;">Prognosa</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody id="dataText">
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>

<?= $this->include('Scripts/script_detail'); ?>

<?= $this->endSection(); ?>
