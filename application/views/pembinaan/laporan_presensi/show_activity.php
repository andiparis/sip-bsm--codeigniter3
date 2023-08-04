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
            <li class="breadcrumb-item active">Kegiatan Pembinaan</li>
            <li class="breadcrumb-item active">Rekapitulasi Presensi</li>
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
              <h3 class="card-title"><b>Daftar Kegiatan Pembinaan</b></h3>
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
                    <th>Terselenggara</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
                    $no = 1;
                    $attendanceMap = array();
                    foreach ($attendanceData as $attendance) {
                      $activityId = $attendance->id_kegiatan;
                      $date = $attendance->tgl;
                      if (!array_key_exists($activityId, $attendanceMap)) {
                        $attendanceMap[$activityId] = array();
                      }

                      if ($date != null) {
                        $attendanceMap[$activityId][] = $date;
                      }
                    }

                    foreach ($attendanceMap as $activityId => $dates) {
                      $uniqueDates = array_unique($dates);
                      $attendanceDateCount = count($uniqueDates);
                    }

                    foreach ($activityData as $activity) {
                      $activityId = $activity->id_kegiatan;
                      $activityName = $activity->nama_kegiatan;
                      $startDate = $activity->tgl_mulai;
                      $endDate = $activity->tgl_berakhir;

                      $startDateObj = new DateTime($startDate);
                      $endDateObj = new DateTime($endDate);
                      $endDateObj->modify('+1 day');
                      $diff = $startDateObj->diff($endDateObj);
                      $dateRange = $diff->days;

                      // Mengambil nilai $attendanceDateCount untuk $activityId yang sama
                      $attendanceDateCount = isset($attendanceMap[$activityId]) ? count(array_unique($attendanceMap[$activityId])) : 0;
                  ?>

                    <tr>
                      <td style="width: 5%;"><?= $no++ ?>.</td>
                      <td><?= $activityName ?></td>
                      <td><?= $startDate ?></td>
                      <td><?= $endDate ?></td>
                      <td><?= $attendanceDateCount ?> / <b><?= $dateRange ?></b></td>
                      <td class="text-center" width="150px">
                        <a href="<?= site_url('laporan_presensi/attendanceReport/' . $activityId) ?>" class="btn btn-secondary btn-sm" style="margin-bottom: 3px;">
                          <b><i class="fas fa-info"></i> Detail</b>
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
