<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><b>Detail</b> Kegiatan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= site_url('kegiatan') ?>">Kelola Jadwal Kegiatan</a></li>
            <li class="breadcrumb-item active">Detail Kegiatan</li>
          </ol>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="callout callout-info">
            <table>
              <tr>
                <td>Nama Kegiatan</td>
                <td> : </td>
                <?php foreach ($activityData as $activity) { $activityName = $activity->nama_kegiatan; } ?>
                  <td><?= $activityName ?></td>
              </tr>
              <tr>
                <td>Instruktur 1</td>
                <td> : </td>
                <?php foreach ($activityData as $activity) { $instructor1 = $activity->nama; } ?>
                  <td><?= $instructor1 ?></td>
              </tr>
              <tr>
                <td>Instruktur 2</td>
                <td> : </td>
                <?php 
                  foreach ($activityData as $activity) {
                    $instructor2 = $activity->id_instruktur_2;
                    if ($instructor2 == null) {
                      $instructor2 = '-';  
                    } else {
                      foreach ($instructor2Data as $instructor) { 
                        $instructor2 = $instructor->nama;
                      }
                    }
                  }
                ?>
                  <td><?= $instructor2 ?></td>
              </tr>
              <tr>
                <td>Kelas</td>
                <td> : </td>
                <?php 
                  foreach ($activityData as $activity) {
                    $className = $activity->id_kelas;
                    if ($className == null) {
                      $className = '-';  
                    } else {
                      foreach ($classData as $class) { 
                        $className = $class->nama_kelas;
                      }
                    }
                  }
                ?>
                  <td><?= $className ?></td>
              </tr>
              <tr>
                <td>Keterangan</td>
                <td> : </td>
                <?php 
                  foreach ($activityData as $activity) {
                    $note = $activity->keterangan;
                    if ($note == null) {
                      $note = '-';
                    }
                  } 
                ?>
                  <td><?= $note ?></td>
              </tr>
            </table>
          </div>
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title"><b>Data Peserta Pembinaan</b></h3>
              <div class="float-sm-right">
                <a href="<?= site_url('kegiatan') ?>" class="btn btn-warning">
                  <b style="color: white"><i class="fas fa-chevron-left"></i> Back</b>
                </a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body pad table-responsive">
              <table class="table table-bordered table-striped table-head-fixed" id="datatable1">	
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Tgl Daftar</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>No. Telp</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
                    $no = 1;
                    foreach ($data as $detailKegiatan) { 
                      if ($detailKegiatan->jk == 'l') {
                        $jk = 'Laki-laki';
                      } else {
                        $jk = 'Perempuan';
                      }

                      if ($detailKegiatan->email == null) {
                        $email = '-';
                      } else {
                        $email = $detailKegiatan->email;
                      }
                      
                      if ($detailKegiatan->status == '0') {
                        $status = 'Menunggu';
                        $style = 'warning';
                      } else if ($detailKegiatan->status == '1') {
                        $status = 'Disetujui';
                        $style = 'success';
                      } else if ($detailKegiatan->status == '2') {
                        $status = 'Ditolak';
                        $style = 'danger';
                      }
                  ?>

                    <tr>
                      <td style="width: 5%;"><?= $no++ ?>.</td>
                      <td><?= $detailKegiatan->tgl_daftar ?></td>
                      <td><?= $detailKegiatan->nama ?></td>
                      <td><?= $jk ?></td>
                      <td><?= $detailKegiatan->telp ?></td>
                      <td><?= $detailKegiatan->alamat ?></td>
                      <td><?= $email ?></td>
                      <td class="text-center"><span class="btn btn-sm btn-outline-<?= $style ?> disabled"><?= $status ?></span></td>
                      <td class="text-center" width="150px">
                        <?php if ($detailKegiatan->status == '0') { ?>
                          <a href="<?= site_url('kegiatan/setujui_pendaftaran/' . $detailKegiatan->id_kegiatan . '/' . $detailKegiatan->id_peserta) ?>" class="btn btn-success btn-sm" style="margin-bottom: 3px;" onclick="return confirm('Apakah Anda yakin ingin menyetujui pendaftaran peserta ini?');">
                            <b>Setujui</b>
                          </a>
                          <a href="<?= site_url('kegiatan/tolak_pendaftaran/' . $detailKegiatan->id_kegiatan . '/' . $detailKegiatan->id_peserta) ?>" class="btn btn-danger btn-sm" style="margin-bottom: 3px;" onclick="return confirm('Apakah Anda yakin ingin menolak pendaftaran peserta ini?');">
                            <b>Tolak</b>
                          </a>
                        <?php } ?>
                      </td>
                    </tr>

                  <?php } ?>

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
