<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?=site_url('dashboard')?>" class="brand-link">
    <img src="<?=base_url()?>assets/dist/img/logo.png" alt="SIP-BSM Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">SIP-BSM</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->

        <?php if ($this->session->userdata('userLevel') == '0') { ?>

          <li class="nav-item">
            <a href="<?=site_url('dashboard')?>" class="nav-link <?=$this->uri->segment(1) == 'dashboard' ? 'active' : null?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=site_url('instruktur')?>" class="nav-link <?=$this->uri->segment(1) == 'instruktur' ? 'active' : null?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Kelola Instruktur
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=site_url('kelas')?>" class="nav-link <?=$this->uri->segment(1) == 'kelas' ? 'active' : null?>">
              <i class="nav-icon far fa-building"></i>
              <p>
                Kelola Kelas
              </p>
            </a>
          </li>
          <li class="nav-item <?=$this->uri->segment(1) == 'kegiatan' || $this->uri->segment(1) == 'laporan_presensi' ? 'menu-open' : null?>">
            <a href="#" class="nav-link <?=$this->uri->segment(1) == 'kegiatan' || $this->uri->segment(1) == 'laporan_presensi' ? 'active' : null?>">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Kegiatan Pembinaan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=site_url('kegiatan')?>" class="nav-link <?=$this->uri->segment(1) == 'kegiatan' ? 'active' : null?>">
                  <i class="nav-icon far fa-circle"></i>
                  <p>
                    Kelola Jadwal Kegiatan
                  </p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="<?=site_url('laporan_peserta')?>" class="nav-link <?=$this->uri->segment(1) == 'laporan_peserta' ? 'active' : null?>">
                  <i class="nav-icon far fa-circle"></i>
                  <p>
                    Laporan Peserta
                  </p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="<?=site_url('laporan_presensi')?>" class="nav-link <?=$this->uri->segment(1) == 'laporan_presensi' ? 'active' : null?>">
                  <i class="nav-icon far fa-circle"></i>
                  <p>
                    Rekapitulasi Presensi
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?=$this->uri->segment(1) == 'permohonan' || $this->uri->segment(1) == 'jadwal' ? 'menu-open' : null?>">
            <a href="#" class="nav-link <?=$this->uri->segment(1) == 'permohonan' || $this->uri->segment(1) == 'jadwal' ? 'active' : null?>">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Permohonan Workshop
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=site_url('laporan_permohonan')?>" class="nav-link <?=$this->uri->segment(1) == 'laporan_permohonan' ? 'active' : null?>">
                  <i class="nav-icon far fa-circle"></i>
                  <p>
                    Laporan Permohonan
                  </p>
                </a>
              </li>
            </ul>
          </li>

        <?php } else { ?>

          <li class="nav-item">
            <a href="<?=site_url('presensi')?>" class="nav-link <?=$this->uri->segment(1) == 'presensi' ? 'active' : null?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Presensi
              </p>
            </a>
          </li>

        <?php } ?>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>