<!-- side menu -->
<aside class="navbar navbar-vertical navbar-expand-lg navbar-dark hide" id="navbar-to-hide">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <h1 class="navbar-brand navbar-brand-autodark">
      <a href=".">
        <img src="<?php echo base_url('public/assets/logo-white.png');?>" width="220" height="64" alt="Tabler" class="navbar-brand-image">
      </a>
    </h1>
    <h4>PT Buma Cima Nusantara</h4>
    <div class="collapse navbar-collapse" id="navbar-menu">
      <ul class="navbar-nav pt-lg-3">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url(''); ?>" >
            <i class="bi bi-house" style="margin-right:10px"></i>
            <span class="nav-link-title">
              Home
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('/addDokumen');?>" >
            <i class="bi bi-pencil-square" style="margin-right:10px"></i>
            <span class="nav-link-title">
              Input Data Dokumen
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('/addPpab');?>" >
            <i class="bi bi-pencil-square" style="margin-right:10px"></i>
            <span class="nav-link-title">
              Buat PPAB
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('/monitoring');?>" >
            <i class="bi bi-folder" style="margin-right:10px"></i>
            <span class="nav-link-title">
              Monitoring Dokumen
            </span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</aside>
