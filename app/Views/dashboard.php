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
              Electronic Budgeting System and Administration (EBuSeT)
            </h2>
            <div class="page-pretitle" id="tgl_aktual"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="page-body">
      <div class="container-xl">
        <!-- Baris data utama -->
        <div class="row row-deck row-cards">
          <!-- Kolom Bungamayang -->
          <div class="col-lg-6">
            <div class="row row-cards">

            </div>
          </div>
          <!-- Kolom Cinta Manis -->
          <div class="col-lg-6">
            <div class="row row-cards">

            </div>
          </div>
        </div>
      </div>
  </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>

<?= $this->include('Scripts/script_dashboard'); ?>

<?= $this->endSection(); ?>
