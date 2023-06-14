<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><b>Kelola Jadwal Kegiatan</b></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
            <li class="breadcrumb-item active">Kegiatan Pembinaan</li>
            <li class="breadcrumb-item active">Kelola Jadwal Kegiatan</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title"><b>Data Jadwal Kegiatan Pembinaan</b></h3>
              <div class="float-sm-right">
                <a href="<?=site_url('kegiatan/add_data')?>" class="btn btn-primary">
                  <b><i class="fas fa-plus"></i> Add</b>
                </a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body pad table-responsive">
              <table class="table table-bordered table-striped table-head-fixed" id="datatable1">	
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Kategori</th>
                    <th>Nama Kegiatan</th>
                    <th>Tgl Mulai</th>
                    <th>Tgl Berakhir</th>
                    <th>Kuota Peserta</th>
                    <th>Menunggu Konfirmasi</th>
                    <!-- <th>Instruktur 1</th> -->
                    <!-- <th>Instruktur 2</th> -->
                    <!-- <th>Kelas</th> -->
                    <!-- <th>Keterangan</th> -->
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $no = 1;
                    foreach($data as $kegiatan) { 
                      // Show kategori name
                      if($kegiatan->kategori == '1')
                        $kategori = 'Magang';
                      else if($kegiatan->kategori == '2')
                        $kategori = 'Pelatihan';
                      else
                        $kategori = 'Workshop';

                      // Show instruktur name
                      // $instruktur1 = $kegiatan->nama;

                      // if($kegiatan->id_instruktur_2 == null) {
                      //   $instruktur2 = '-';
                      // } else {
                      //   foreach($data_instruktur_2 as $instruktur) {
                      //     if($kegiatan->id_instruktur_2 == $instruktur->id_instruktur)
                      //       $instruktur2 = $instruktur->nama;
                      //   }
                      // }
                      
                      // Show kelas name
                      // if($kegiatan->id_kelas == null) {
                      //   $namaKelas = '-';
                      // } else {
                      //   foreach($data_kelas as $kelas) {
                      //     if($kegiatan->id_kelas == $kelas->id_kelas)
                      //       $namaKelas = $kelas->nama_kelas;
                      //   }
                      // }

                      // Show keterangan value
                      // if($kegiatan->keterangan == null)
                      //   $keterangan = '-';
                      // else
                      //   $keterangan = $kegiatan->keterangan;
                      $acceptedParticipant = 0;
                      $waitingToConfirmation = 0;
                      foreach($detailActivityData as $detailActivity) {
                        $quota = $detailActivity->kuota;
                        $participantStatus = $detailActivity->status;
                        if($participantStatus == '1') {
                          $acceptedParticipant++;
                        } else if($participantStatus == null) {
                          $waitingToConfirmation++;
                        }
                      }
                  ?>
                    <tr>
                      <td style="width: 5%;"><?=$no++?>.</td>
                      <td><?=$kategori?></td>
                      <td><?=$kegiatan->nama_kegiatan?></td>
                      <td><?=$kegiatan->tgl_mulai?></td>
                      <td><?=$kegiatan->tgl_berakhir?></td>
                      <td><?=$acceptedParticipant . ' / ' . $quota?></td>
                      <td><?=$waitingToConfirmation?></td>
                      <!-- <td><?=$instruktur1?></td> -->
                      <!-- <td><?=$instruktur2?></td> -->
                      <!-- <td><?=$namaKelas?></td> -->
                      <!-- <td><?=$keterangan?></td> -->
                      <td class="text-center" width="150px">
                        <a href="<?=site_url('kegiatan/detail_data/' . $kegiatan->id_kegiatan)?>" class="btn btn-secondary btn-xs">
                          <b><i class="fas fa-info"></i> Detail</b>
                        </a>
                        <a href="<?=site_url('kegiatan/edit_data/' . $kegiatan->id_kegiatan)?>" class="btn btn-warning btn-xs" style="color: white;">
                          <b><i class="fas fa-edit"></i> Edit</b>
                        </a>
                        <a href="<?=site_url('kegiatan/delete_data/' . $kegiatan->id_kegiatan)?>" class="btn btn-danger btn-xs">
                          <b><i class="fas fa-trash"></i> Delete</b>
                        </a>
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
