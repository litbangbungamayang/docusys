<?= $this->extend('Templates/app_layout'); ?>

<?= $this->section('header'); ?>

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="wrapper">
  <?= $this->include('Templates/sidemenu') ?>
  <div class="page-wrapper">
    <div class="container-xl">
      <!-- Page title -->
      <div class="page-header d-print-none">
        <div class="row align-items-center">
          <div class="col">
            <h2 class="page-title">
              Data Time Series
            </h2>
          </div>
        </div>
      </div>
      <div class="row row-deck row-cards">
        <div class="col-sm-12 col-lg-12">
          <div class="row row-cards">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="">Pabrik gula: <select id="sel_pg"></select></div>
                    </div>
                  </div>
                  <div class="row" style="display:none">
                    <div class="col-lg-6">
                      <div class="">Pilihan data grafik 1: <input type="text" class="custom-control custom-select" id="sel_jenis_data"></input></div>
                    </div>
                  </div>
                  <div class="row" style="display:none">
                    <div class="col-lg-6">
                      <div class="">Pilihan data grafik 2: <input type="text" class="custom-control custom-select" id="sel_jenis_data_2"></input></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="">Rentang waktu:
                        <div class="col-lg-6 input-group">
                          <input type="date" class="form-control" id="dtp_tgl_awal"></input>
                          <input type="date" class="form-control" id="dtp_tgl_akhir"></input>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin-top: 15px">
                    <div class="col-lg-3">
                      <div class=""><a href="#" id="btn_tes" class="btn btn-primary w-50">Tampilkan</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-lg-12">
          <div class="row row-cards">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <div id="grafik_1" class="chart-lg"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-lg-12">
          <div class="row row-cards">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <div id="grafik_2" class="chart-lg"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-lg-12">
          <div class="row row-cards">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <div id="grafik_3" class="chart-lg"></div>
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

<?= $this->include('Scripts/script_trendline'); ?>

<?= $this->endSection(); ?>
