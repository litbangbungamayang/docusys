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
              Data Dokumen Pengadaan
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
                    <div class="col-lg-3">
                      <div class="col-lg-12">
                        <div class="form-label">Jenis Dokumen</div>
                        <select class="custom-control custom-select" id="cbx_jenisDokumen" name="jenis_dokumen"></select>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="col-lg-12">
                        <div class="form-label">Kategori</div>
                        <select class="custom-control custom-select" id="cbx_kategori" name="kategori"></select>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="col-lg-12">
                        <div class="form-label">Bagian</div>
                        <select class="custom-control custom-select" id="cbx_bagian" name="bagian"></select>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="col-lg-12">
                        <div class="form-label">Tahun Anggaran</div>
                        <select class="custom-control custom-select" id="cbx_tahun" name="tahun"></select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mb-2">
                <div class="card card-body">
                  <div class="row mb-2">
                    <div class="col-lg-4">
                      <div class="form-group mb-2">
                        <div class="form-label">Rekening</div>
                        <select class="custom-control custom-select" id="cbx_rekening" name="nomor_rekening"></select>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Deskripsi Barang/Jasa</label>
                        <textarea style="resize: none; text-transform: uppercase" class="form-control" rows="5" id="txt_deskripsi" name="deskripsi"></textarea>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group mb-2">
                        <div class="form-label">Nilai bahan</div>
                        <input type="text" style="text-transform: uppercase; text-align: right;" class="form-control" id="txt_nilaiBahan" name="bahan" placeholder="Nilai bahan">
                      </div>
                      <div class="form-group mb-3">
                        <div class="form-label">Nilai jasa</div>
                        <input type="text" style="text-transform: uppercase; text-align: right;" class="form-control" id="txt_nilaiJasa" name="jasa" placeholder="Nilai jasa/upah">
                      </div>
                      <div class="form-group mb-2">
                        <div class="form-label">Nilai lainnya</div>
                        <input type="text" style="text-transform: uppercase; text-align: right;" class="form-control" id="txt_nilaiLain" name="lain" placeholder="Nilai lainnya">
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="form-group mb-2">
                        <div class="form-label">Tanggal dokumen</div>
                        <input type="date" style="text-transform: uppercase;" class="form-control" id="dtp_tglDokumen" name="tgl_dokumen">
                      </div>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-lg-3">
                      <div class=""><a href="#" id="btn_add" onClick="addItem();" class="btn btn-primary w-70">Tambah Data</a></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="table-responsive">
                      <table class="table table-vcenter card-table">
                        <thead>
                          <tr>
                            <th class="w-1">No.</th>
                            <th style="text-align:left;">Rekening</th>
                            <th style="text-align:right;">Deskripsi Barang/Jasa</th>
                            <th style="text-align:right;">Nilai Bahan</th>
                            <th style="text-align:right;">Nilai Upah</th>
                            <th style="text-align:right;">Lainnya</th>
                            <th style="text-align:right;">Jumlah</th>
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
      </form>
    </div>
  </div>

  <!-- MODAL SCREEN -->
  <div class="modal modal-blur fade" id="d_addItem" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Data Permintaan Barang/Jasa</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12 col-lg-6">
              <div class="form-group" id="grNamaKelompok" style="margin-top: 25px;">
                <label class="form-label">Nama Kelompok</label>
                <input type="text" style="text-transform: uppercase;" class="form-control" id="perawatan_namaKelompok" disabled>
              </div>
              <div class="form-group" id="grJenisAktivitas">
                <label class="form-label">Perawatan kebun yang diminta</label>
                <select name="jenis_aktivitas" id="jenis_aktivitas" class="custom-control custom-select" placeholder="Pilih jenis aktivitas">
                  <option value="">Pilih jenis aktivitas</option>
                </select>
                <div class="invalid-feedback">Jenis aktivitas belum dipilih!</div>
              </div>
              <div class="form-group" id="grLuasDiminta">
                <label class="form-label">Luas perawatan yang diminta</label>
                <input type="text" style="text-transform: uppercase;" class="form-control" id="perawatan_luasDiminta">
                <div class="invalid-feedback">Luas perawatan belum diisi!</div>
              </div>
            </div>
            <div class="col-md-12 col-lg-6">
              <div class="form-group" id="grLuas" style="margin-top: 25px;">
                <label class="form-label">Luas Area</label>
                <input type="text" style="text-transform: uppercase;" class="form-control" id="perawatan_luas" disabled>
              </div>
              <div class="form-group" id="grBiayaPerHa"">
                <label class="form-label">Biaya per hektar</label>
                <input type="text" style="" class="form-control" id="perawatan_biaya" disabled>
              </div>
              <div class="form-group" id="grBiayaPerHa"">
                <label class="form-label">Jumlah biaya</label>
                <input type="text" style="" class="form-control" id="perawatan_jmlBiaya" disabled>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>

<?= $this->include('Scripts/script_addDokumen'); ?>

<?= $this->endSection(); ?>
