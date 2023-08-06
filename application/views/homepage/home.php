<!-- Background image -->
<div id="intro-example" class="py-5 text-center bg-image" style="background-image: url('<?= base_url() ?>assets/dist/img/home1.jpg'); height: 300px;">
  <div class="mask d-flex justify-content-center align-items-center h-100">
    <div class="text-white">
      <h1 class="text-center display-4">Setorkan sampahmu ke BSM dan jadikan rupiah</h1>
    </div>
  </div>
</div>

<!-- Page content -->
<div class="container my-5">
  <!-- About Section -->
  <div class="row py-5 justify-content-center align-items-center" id="about">
    <div class="col-lg-6 order-2 order-lg-1">
      <img src="<?= base_url() ?>assets/dist/img/bsm-logo.png" class="rounded img-fluid d-block mx-auto">
    </div>
    <div class="col-lg-6 order-1 order-lg-2">
      <h2 class="text-center">Tentang Bank Sampah Malang</h2><br>
      <p class="lead text-muted d-md-block">Bank Sampah Malang (BSM) merupakan suatu lembaga yang berbadan hukum
        koperasi yang pendirinya difasilitasi oleh Pemerintahan Kota Malang melalui Dinas Kebersihan dan Pertamanan
        untuk membantu dalam hal pemberdayaan masyarakat untuk ikut serta aktif dalam pengelolaan sampah dari sumbernya
        (rumah tangga). Seiiring perjalanan waktu gerakan BSM yang menggunakan pendekatan ekonomi saat ini sudah dapat
        merubah pola pikir tentang sampah yang dulunya sumber masalah sekarang telah berubah menjadi sampah adalah rupiah
        (berkah), merupakan perilaku yang dulunya masyarakat membuang sampah di tong sampah ataupun disungai sudah
        berubah menjadi sampah disetorkan ke BSM untuk dijadikan rupiah.</p>
    </div>
  </div>
  <hr>

  <!-- Program Section -->
  <div class="row py-5 justify-content-center align-items-center" id="program">
    <div class="col-lg-6">
      <h1 class="text-center">Yang BSM Lakukan</h1><br>
      <h4>1. Pengumpulan Sampah</h4>
      <p class="text-muted">Bank Sampah Malang menyediakan tempat pengumpulan sampah di berbagai titik di kota Malang.
        Masyarakat dapat membawa sampah yang telah dipilah sesuai jenisnya dan menukarkannya dengan nilai tukar.</p><br>
      <h4>2. Daur Ulang Sampah</h4>
      <p class="text-muted">Sampah-sampah yang dikumpulkan kemudian diolah dan dipilah sesuai jenisnya. Sampah yang
        masih dapat diolah akan dijadikan bahan daur ulang untuk produk-produk kerajinan.</p><br>
      <h4>3. Edukasi Lingkungan</h4>
      <p class="text-muted">Bank Sampah Malang juga aktif dalam memberikan edukasi dan sosialisasi tentang pentingnya
        pengelolaan sampah yang baik bagi lingkungan.</p><br>
    </div>
    <div class="col-lg-6">
      <img src="<?= base_url() ?>assets/dist/img/home2.jpg" class="rounded img-fluid" alt="Program">
    </div>
  </div>
  <hr>
  
  <!-- Gallery Section -->
  <div class="row py-5 justify-content-center align-items-center" id="program">
    <div class="col-lg-12">
      <h1 class="text-center">Gabung Bersama BSM</h1><br>
    </div>
    <div class="col-lg-4 mb-5">
      <img src="<?= base_url() ?>assets/dist/img/home3.jpg" class="rounded img-fluid" alt="Gallery">
    </div>
    <div class="col-lg-4 mb-5">
      <img src="<?= base_url() ?>assets/dist/img/home4.jpg" class="rounded img-fluid" alt="Gallery">
    </div>
    <div class="col-lg-4 mb-5">
      <img src="<?= base_url() ?>assets/dist/img/home5.jpg" class="rounded img-fluid" alt="Gallery">
    </div>
  </div>
  <hr>

  <!-- Activity Section -->
  <div class="row py-5 justify-content-center align-items-center" id="program">
    <div class="col-lg-12">
      <h3 class="text-center">Kegiatan yang Akan Berlangsung</h3><br>
    </div>
    <div class="container">
      <div class="card-body pad table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Kegiatan</th>
              <th>Kategori</th>
              <th>Tgl Mulai</th>
              <th>Tgl Berakhir</th>
            </tr>
          </thead>
          <tbody>

            <?php 
              $no = 1;
              $activityDetailMap = array();
              foreach ($activities as $activity) { 
                $activityId = $activity->id_kegiatan;
                $activityStatus = $activity->status;
                if (!array_key_exists($activityId, $activityDetailMap)) {
                  $activityDetailMap[$activityId] = array(
                    'acceptedParticipant' => 0,
                    'activityId' => $activity->id_kegiatan,
                    'activityName' => $activity->nama_kegiatan,
                    'activityCategory' => $activity->kategori,
                    'startDate' => $activity->tgl_mulai,
                    'endDate' => $activity->tgl_berakhir,
                    'participantQuota' => $activity->kuota,
                  );
                }

                if ($activityStatus == '1') {
                  $activityDetailMap[$activityId]['acceptedParticipant']++;
                } else if ($activityStatus == null) {
                  $activityDetailMap[$activityId]['acceptedParticipant'] = null;
                }
              }

              foreach ($activityDetailMap as $activityId => $activity) {
                $participantQuota = $activity['participantQuota'];
                $acceptedParticipant = $activity['acceptedParticipant'];
                if ($acceptedParticipant < $participantQuota || $acceptedParticipant == null) {
                  $activityId = $activity['activityId'];
                  $activityName = $activity['activityName'];
                  $activityCategory = $activity['activityCategory'];
                  $startDate = $activity['startDate'];
                  $endDate = $activity['endDate'];

                  if ($activityCategory == '1') {
                    $activityCategory = 'Magang';
                  } else {
                    $activityCategory = 'Pelatihan';
                  }
            ?>

              <tr>
                <td style="width: 5%;"><?= $no++ ?>.</td>
                <td><?= $activityName ?></td>
                <td><?= $activityCategory ?></td>
                <td><?= $startDate ?></td>
                <td><?= $endDate ?></td>
              </tr>
              
            <?php 
                }
              }
            ?>

          </tbody>
        </table>
      </div>
    </div>
    <div class="col-md-12">
      <h6 class="text-center"><a href="<?php echo site_url('program/pendaftaran') ?>">Klik link berikut, untuk melakukan pendaftaran</a></h6>
    </div>
  </div>
</div>
<hr>
