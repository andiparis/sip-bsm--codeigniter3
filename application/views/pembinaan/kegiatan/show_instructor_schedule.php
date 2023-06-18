<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><b>Jadwal Kegiatan</b></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
            <li class="breadcrumb-item active">Jadwal Kegiatan</li>
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
                    <th>Jumlah Peserta</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $no = 1;
                    $activityDetailMap = array();
                    foreach ($activityDetailData as $activityDetail) { 
                      $idKegiatan = $activityDetail->id_kegiatan;

                      if (!array_key_exists($idKegiatan, $activityDetailMap)) {
                        $activityDetailMap[$idKegiatan] = array(
                          // 'duplicateCount' => 0,
                          // 'waitingParticipant' => 0,
                          'acceptedParticipant' => 0,
                          'activityId' => $activityDetail->id_kegiatan,
                          'activityCategory' => $activityDetail->kategori,
                          'activityName' => $activityDetail->nama_kegiatan,
                          'startDate' => $activityDetail->tgl_mulai,
                          'endDate' => $activityDetail->tgl_berakhir,
                          // 'participantQuota' => $activityDetail->kuota,
                        );
                      }
                      
                      // $activityDetailMap[$idKegiatan]['duplicateCount']++;
                      if ($activityDetail->status == '1') {
                        $activityDetailMap[$idKegiatan]['acceptedParticipant']++;
                      // } else if($activityDetail->status == '1') {
                        // $activityDetailMap[$idKegiatan]['waitingParticipant']++;
                      }
                    }

                    foreach ($activityDetailMap as $idKegiatan => $activityDetail) {
                      $activityId = $activityDetail['activityId'];
                      $activityCategory = $activityDetail['activityCategory'];
                      $activityName = $activityDetail['activityName'];
                      $startDate = $activityDetail['startDate'];
                      $endDate = $activityDetail['endDate'];
                      // $participantQuota = $activityDetail['participantQuota'];
                      // $waitingParticipant = $activityDetail['waitingParticipant'];
                      $acceptedParticipant = $activityDetail['acceptedParticipant'];
                      // $duplicateCount = $activityDetail['duplicateCount'];

                      if ($activityCategory == '1') {
                        $category = 'Magang';
                      } else if($activityCategory == '2') {
                        $category = 'Pelatihan';
                      } else {
                        $category = 'Workshop';
                      }                   
                  ?>
                    <tr>
                      <td style="width: 5%;"><?= $no++ ?>.</td>
                      <td><?= $category ?></td>
                      <td><?= $activityName ?></td>
                      <td><?= $startDate ?></td>
                      <td><?= $endDate ?></td>
                      <?php if ($activityCategory != '3') { ?>
                        <td><?= $acceptedParticipant ?></td>
                        <!-- <td><?= $waitingParticipant ?></td> -->
                      <?php } else { ?>
                        <td> - </td>
                        <!-- <td> - </td> -->
                      <?php } ?>
                      <td class="text-center" width="150px">
                        <a href="<?= site_url('jadwal_instruktur/detail_data/' . $activityId) ?>" class="btn btn-secondary btn-xs">
                          <b><i class="fas fa-info"></i> Detail</b>
                        </a>
                        <!-- <a href="<?= site_url('kegiatan/edit_data/' . $activityId) ?>" class="btn btn-warning btn-xs" style="color: white;">
                          <b><i class="fas fa-edit"></i> Edit</b>
                        </a>
                        <a href="<?= site_url('kegiatan/delete_data/' . $activityId) ?>" class="btn btn-danger btn-xs">
                          <b><i class="fas fa-trash"></i> Delete</b>
                        </a> -->
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
