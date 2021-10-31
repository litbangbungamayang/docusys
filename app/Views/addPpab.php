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
              Buat Permintaan Pemakaian Anggaran Belanja
            </h2>
          </div>
        </div>
      </div>
      <!-- ==================== -->
      <form>
        <div class="row row-cards">
          <div class="col-lg-12">
            <div class="card card-body">
              <div class="row mb-2">
                <div class="card card-body">
                  <div class="row mb-2">
                    <div class="col-lg-2">
                      <div class="col-lg-12">
                        <div class="form-label">Jenis</div>
                        <select class="custom-control custom-select" id="cbx_jenisDokumen" name="jenis_dokumen"></select>
                        <div class="invalid-feedback">Harus diisi!</div>
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="col-lg-12">
                        <div class="form-label">Unit</div>
                        <select class="custom-control custom-select" id="cbx_unit" name="unit"></select>
                        <div class="invalid-feedback">Harus diisi!</div>
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="col-lg-12">
                        <div class="form-label">Tahun</div>
                        <select class="custom-control custom-select" id="cbx_tahun" name="tahun"></select>
                        <div class="invalid-feedback">Harus diisi!</div>
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="col-lg-12">
                        <div class="form-label">Kategori</div>
                        <select class="custom-control custom-select" id="cbx_kategori" name="kategori"></select>
                        <div class="invalid-feedback">Harus diisi!</div>
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="col-lg-12">
                        <div class="form-label">Bagian</div>
                        <select class="custom-control custom-select" id="cbx_bagian" name="bagian"></select>
                        <div class="invalid-feedback">Harus diisi!</div>
                      </div>
                    </div>

                  </div>
                  <div class="row mb-2">
                    <div class="col-lg-12">
                      <div class="">
                        <a href="#" id="btn_add" onClick="searchDok();" class="btn btn-white w-70">
                          <i class="bi bi-search" style="margin-right:5px"></i>Cari Dokumen
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mb-2">
                <div class="card card-body">
                  <div class="row mb-2">
                    <div class="card">
                      <div class="card-header">
                        <div clas="card-title">Pilih dokumen pengadaan</div>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-lg-12">
                            <table id="tbl_permintaan" class="table card-table table-vcenter datatable table-sm table-hover">
                              <thead>
                                <tr>
                                  <th class="w-1">No.</th>
                                  <th style="text-align:left;">Rekening</th>
                                  <th style="text-align:left; text-overflow:ellipsis;">Deskripsi Barang/Jasa</th>
                                  <th style="text-align:left;">Nomor Dokumen</th>
                                  <th style="text-align:right;">Jumlah</th>
                                </tr>
                              </thead>
                              <tbody style="font-size:13px; text-overflow:ellipsis;">
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="card">
                      <div class="card-header">
                        <div clas="card-title">Daftar dokumen untuk PPAB</div>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-lg-12">
                            <table id="tbl_dipilih" class="table card-table table-vcenter datatable table-sm table-hover">
                              <thead>
                                <tr>
                                  <th class="w-1">No.</th>
                                  <th style="text-align:left;">Rekening</th>
                                  <th style="text-align:left;">Deskripsi Barang/Jasa</th>
                                  <th style="text-align:left;">Nomor Dokumen</th>
                                  <th style="text-align:right;">Jumlah</th>
                                </tr>
                              </thead>
                              <tbody style="font-size:13px">
                              </tbody>
                              <tfoot class="bg-gray">
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th style="text-align:right;"></th>
                              </tfoot>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="card">
                      <div class="col-lg-2">
                        <div class="form-group mb-2 mt-2">
                          <div class="form-label">Tanggal PPAB</div>
                          <input type="date" style="text-transform: uppercase;" class="form-control" id="dtp_tglDokumen" name="tgl_dokumen">
                          <div class="invalid-feedback">Harus diisi!</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-lg-12">
                      <div class="">
                        <a href="#" id="btn_save" onClick="save()" class="btn btn-blue w-70">
                          <i class="bi bi-save" style="margin-right:5px"></i>Simpan Data
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- MODAL SCREEN -->
</div>

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>

<?= $this->include('Scripts/script_addPpab'); ?>

<?= $this->endSection(); ?>
