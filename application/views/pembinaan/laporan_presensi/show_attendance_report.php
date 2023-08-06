<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><b>Rekapitulasi</b> Presensi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= site_url('laporan_presensi') ?>">Rekapitulasi Presensi</a></li>
            <li class="breadcrumb-item active">Detail Presensi</li>
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
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title"><b>Laporan Presensi Peserta Pembinaan</b></h3>
              <div class="float-sm-right">
                <a href="<?= site_url('laporan_presensi') ?>" class="btn btn-warning">
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
                    <th>Nama</th>
                    <th>Hadir</th>
                    <th>Tidak Hadir</th>
                    <th>Prosentase Kehadiran</th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
                    $no = 1;
                    $participantAttendanceMap = array();
                    foreach ($attendanceReport as $participant) {
                      $participantId = $participant->id_peserta_pembinaan;
                      $attendanceStatus = $participant->status_kehadiran;

                      if (!array_key_exists($participantId, $participantAttendanceMap)) {
                        $participantAttendanceMap[$participantId] = array(
                          'attendanceDates' => array(),
                          'participantAttendance' => 0,
                          'participantName' => $participant->nama,
                        );
                      }

                      if ($attendanceStatus == '1') {
                        $participantAttendanceMap[$participantId]['participantAttendance']++;
                      }

                      $attendanceDate = $participant->tgl;
                      if ($attendanceDate !== null) {
                        $participantAttendanceMap[$participantId]['attendanceDates'][] = $attendanceDate;
                      }
                    }

                    foreach ($participantAttendanceMap as $participantAttendance) {
                      $participantName = $participantAttendance['participantName'];
                      $participantAttendanceCount = $participantAttendance['participantAttendance'];
                      $attendanceDates = $participantAttendance['attendanceDates'];

                      $attendanceDateCount = count(array_unique($attendanceDates));
                      $participantNotPresent = $attendanceDateCount - $participantAttendanceCount;

                      if ($participantAttendanceCount != 0) {
                        $attendanceParticipantPercentage = ($participantAttendanceCount / $attendanceDateCount) * 100;
                        $attendanceParticipantPercentage = number_format($attendanceParticipantPercentage, 1);
                      } else {
                        $attendanceParticipantPercentage = 0;
                      }
                  ?>

                    <tr>
                      <td style="width: 5%;"><?= $no++ ?>.</td>
                      <td><?= $participantName ?></td>
                      <td style="width: 10%;"><?= $participantAttendanceCount ?></td>
                      <td style="width: 10%;"><?= $participantNotPresent ?></td>
                      <td style="width: 10%;"><?= $attendanceParticipantPercentage . '%' ?></td>
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
