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
              Monitoring Dokumen Pengadaan
            </h2>
          </div>
        </div>
      </div>
      <!-- ==================== -->
      <div class="row row-cards">
        <div class="col-lg-12">
          <div class="card card-body">
            <div class="row">
              <div class="col-lg-12">
                <table id="tbl_monitoring" class="table card-table table-vcenter text-nowrap datatable table-sm">
                  <thead>
                    <tr>
                      <th class="w-1">No.</th>
                      <th style="text-align:left;">Unit</th>
                      <th style="text-align:left;">Jenis</th>
                      <th style="text-align:left;">No. Dokumen</th>
                      <th style="text-align:right;">Total Nilai</th>
                      <th style="text-align:left;">Status</th>
                      <th style="text-align:center;"></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- MODAL SCREEN -->
</div>

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>

<?= $this->include('Scripts/script_monitoring'); ?>

<?= $this->endSection(); ?>
