<!-- Background image -->
<div id="intro-example" class="py-5 text-center bg-image" style="background-image: url('<?= base_url() ?>assets/dist/img/home1.jpg'); height: 300px;">
  <div class="mask d-flex justify-content-center align-items-center h-100">
    <div class="text-white">
      <b><h1 class="text-center display-4">Ikuti kegiatan kami dan terapkan di daerahmu</h1></b>
    </div>
  </div>
</div>

<!-- Page content -->
<div class="container my-5">
  <!-- Pembinaan Section -->
  <div class="row py-5 justify-content-center align-items-center" id="pembinaan">
    <div class="col-lg-5 order-2 order-lg-1">
      <img src="<?= base_url() ?>assets/dist/img/home6.jpg" class="rounded img-fluid d-block mx-auto">
    </div>
    <div class="col-lg-7 order-1 order-lg-2">
      <h2 class="text-center">Kegiatan Edukasi</h2><br>
      <h4>Pelatihan</h4>
      <p class="lead text-muted d-md-block">Kegiatan pelatihan yang dilakukan Bank Sampah Malang terdiri menjadi 2, yakni pelatihan pembuatan kerajinan tangan dan pemilihan jenis sampah sesuai dengan kategori sampah yang telah dimiliki oleh Bank Sampah Malang.</p>
      <h4>Magang</h4>
      <p class="lead text-muted d-md-block">Kegiatan magang yang disediakan ini mencakup pembelajaran seluruh proses kerja yang terjadi pada Bank Sampah Malang. Dengan adanya kegiatan ini diharapkan, peserta magang dapat menerapkan ilmu yang telah didapatkannya pada daerah masing-masing.</p>
      <a href="<?= site_url('program/pendaftaran') ?>" class="btn btn-success">
        <b>Daftar Sekarang</b>
      </a>
    </div>
  </div>
  <hr>
  <!-- Workshop Section -->
  <div class="row py-5 justify-content-center align-items-center" id="workshop">
    <div class="col-lg-6">
      <h2 class="text-center">Workshop</h2><br>
      <h4>Permohonan Workshop</h4>
      <p class="text-muted">Bank Sampah Malang juga dapat menyediakan kegiatan workshop di daerah-daerah melalui permohonan workshop yang dilakukan masyarakat dan telah diterima oleh Bank Sampah Malang.</p>
      <a href="<?= site_url('program/permohonan') ?>" class="btn btn-success">
        <b>Lakukan Permohonan</b>
      </a>
    </div>
    <div class="col-lg-6">
      <img src="<?= base_url() ?>assets/dist/img/home5.jpg" class="rounded img-fluid" alt="Workshop">
    </div>
  </div>
</div>
<hr>
