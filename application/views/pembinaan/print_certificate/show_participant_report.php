<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><b>Cetak</b> Sertifikat</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= site_url('cetak_sertifikat') ?>">Cetak Sertifikat</a></li>
            <li class="breadcrumb-item active">Laporan Peserta</li>
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
              <h3 class="card-title"><b>Laporan Peserta</b></h3>
              <div class="float-sm-right">
                <a href="<?= site_url('cetak_sertifikat') ?>" class="btn btn-warning">
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
                    <th>No. Telp</th>
                    <th>Email</th>
                    <th>Prosentase Kehadiran</th>
                    <th>Sertifikat</th>
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
                          'participantId' => $participantId,
                          'participantName' => $participant->nama,
                          'phoneNumber' => $participant->telp,
                          'email' => $participant->email,
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
                      $participantId = $participantAttendance['participantId'];
                      $participantName = $participantAttendance['participantName'];
                      $phoneNumber = $participantAttendance['phoneNumber'];
                      $email = $participantAttendance['email'];
                      $participantAttendanceCount = $participantAttendance['participantAttendance'];
                      $attendanceDates = $participantAttendance['attendanceDates'];

                      $attendanceDateCount = count(array_unique($attendanceDates));

                      if ($participantAttendanceCount != 0) {
                        $attendanceParticipantPercentage = ($participantAttendanceCount / $attendanceDateCount) * 100;
                        $attendanceParticipantPercentage = number_format($attendanceParticipantPercentage, 1);
                      } else {
                        $attendanceParticipantPercentage = 0;
                      }

                      if ($email == null) {
                        $email = '-';
                      }
                  ?>

                    <tr>
                      <td style="width: 5%;"><?= $no++ ?>.</td>
                      <td><?= $participantName ?></td>
                      <td><?= $phoneNumber ?></td>
                      <td><?= $email ?></td>
                      <td style="width: 10%;"><?= $attendanceParticipantPercentage . '%' ?></td>
                      <td class="text-center" width="150px">
                        <?php if ($attendanceParticipantPercentage >= 75) { ?>
                          <a href="<?=site_url('cetak_sertifikat/printCertificate/' . $participantId)?>" target="_blank" class="btn btn-primary btn-sm" style="margin-bottom: 3px;">
                            <b><i class="fas fa-download"></i> Download</b>
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
