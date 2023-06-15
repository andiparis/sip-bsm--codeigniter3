<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><b>Presensi</b> Peserta</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
            <li class="breadcrumb-item active">Presensi Peserta</li>
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
              <h3 class="card-title"><b>Presensi Peserta Pembinaan</b></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body pad table-responsive">
              <table class="table table-bordered table-striped table-head-fixed" id="datatable1">	
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Kegiatan</th>
                    <th>Tgl Mulai</th>
                    <th>Tgl Berakhir</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $no = 1;
                    foreach($activityData as $activity) {
                      $activityId = $activity->id_kegiatan;
                      $activityName = $activity->nama_kegiatan;
                      $startDate = $activity->tgl_mulai;
                      $endDate = $activity->tgl_berakhir;
                    // $presensiPesertaMap = array();
                    // foreach($data as $presensiPeserta) { 
                    //   $idPesertaPembinaan = $presensiPeserta->id_peserta_pembinaan;
                    //   // 
                    //   $test = $presensiPeserta->status_kehadiran;
                    //   echo $test;

                    //   if(!array_key_exists($idPesertaPembinaan, $presensiPesertaMap)) {
                    //     $presensiPesertaMap[$idPesertaPembinaan] = array(
                    //       'duplicateCount' => 0,
                    //       'status0Count' => 0,
                    //       'status1Count' => 0,
                    //       'startDate' => $presensiPeserta->tgl_mulai,
                    //       'endDate' => $presensiPeserta->tgl_berakhir,
                    //       'activityName' => $presensiPeserta->nama_kegiatan,
                    //       'participantName' => $presensiPeserta->nama
                    //     );
                    //   }
                    //   $presensiPesertaMap[$idPesertaPembinaan]['duplicateCount']++;
                    //   if($presensiPeserta->status_kehadiran == '0') {
                    //     $presensiPesertaMap[$idPesertaPembinaan]['status0Count']++;
                    //   } else if($presensiPeserta->status_kehadiran == '1') {
                    //     $presensiPesertaMap[$idPesertaPembinaan]['status1Count']++;
                    //   }
                    // }

                    // foreach($presensiPesertaMap as $idPesertaPembinaan => $presensi) {
                    //   $activityName = $presensi['activityName'];
                    //   $participantName = $presensi['participantName'];
                    //   $status0Count = $presensi['status0Count'];
                    //   $status1Count = $presensi['status1Count'];
                    //   $duplicateCount = $presensi['duplicateCount'];
                  ?>
                    <tr>
                      <td style="width: 5%;"><?=$no++?>.</td>
                      <td><?=$activityName?></td>
                      <td><?=$startDate?></td>
                      <td><?=$endDate?></td>
                      <td class="text-center" width="150px">
                        <a href="<?=site_url('presensi/addAttendance/' . $activityId)?>" class="btn btn-success btn-xs">
                          <b><i class="fas fa-edit"></i> Presensi</b>
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
