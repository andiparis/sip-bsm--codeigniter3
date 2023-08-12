<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><b>Laporan</b> Peserta</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active">Kegiatan Pembinaan</li>
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
              <h3 class="card-title"><b>Laporan Peserta Pembinaan</b></h3>
            </div>
            <!-- /.card-header -->
            <div class="col-md-3 offset-md-9 mt-2">
              <label for="periode">Periode</label>
              <select name="periode" id="periode" class="custom-select">
                <option value="1" <?= date('n') == 1 ? 'selected' : '' ?>>Januari</option>
                <option value="2" <?= date('n') == 2 ? 'selected' : '' ?>>Februari</option>
                <option value="3" <?= date('n') == 3 ? 'selected' : '' ?>>Maret</option>
                <option value="4" <?= date('n') == 4 ? 'selected' : '' ?>>April</option>
                <option value="5" <?= date('n') == 5 ? 'selected' : '' ?>>Mei</option>
                <option value="6" <?= date('n') == 6 ? 'selected' : '' ?>>Juni</option>
                <option value="7" <?= date('n') == 7 ? 'selected' : '' ?>>Juli</option>
                <option value="8" <?= date('n') == 8 ? 'selected' : '' ?>>Agustus</option>
                <option value="9" <?= date('n') == 9 ? 'selected' : '' ?>>September</option>
                <option value="10" <?= date('n') == 10 ? 'selected' : '' ?>>Oktober</option>
                <option value="11" <?= date('n') == 11 ? 'selected' : '' ?>>November</option>
                <option value="12" <?= date('n') == 12 ? 'selected' : '' ?>>Desember</option>
              </select>
            </div>

            <div class="card-body pad table-responsive">
              <table class="table table-bordered table-striped table-head-fixed" id="datatable1">	
                <thead>
                  <tr>
                    <th style="width: 5%;">No.</th>
                    <th>Kategori Kegiatan</th>
                    <th>Jumlah Kegiatan</th>
                    <th>Jumlah Peserta</th>
                    <th>Jumlah Pendaftar</th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
                    $no = 1;
                    $reportMap = array();
                    $activityMap = array();
                    foreach ($reports as $report) { 
                      $activityId = $report->id_kegiatan;
                      $activityCategory = $report->kategori;
                      if (!array_key_exists($activityCategory, $reportMap)) {
                        $reportMap[$activityCategory] = array(
                          'activityCategory' => $activityCategory,
                          'numberOfActivity' => 0,
                          'numberOfParticipant' => 0,
                          'numberOfRegistrant' => 0,
                        );
                      }

                      if (!array_key_exists($activityId, $activityMap)) {
                        $activityMap[$activityId] = array();
                        $reportMap[$activityCategory]['numberOfActivity']++;
                      }
                      $reportMap[$activityCategory]['numberOfRegistrant']++;

                      if ($report->status == '1') {
                        $reportMap[$activityCategory]['numberOfParticipant']++;
                      }
                    }

                    foreach ($reportMap as $report) {
                      $activityCategory = $report['activityCategory'];
                      $numberOfActivity = $report['numberOfActivity'];
                      $numberOfParticipant = $report['numberOfParticipant'];
                      $numberOfRegistrant = $report['numberOfRegistrant'];

                      if ($activityCategory == '1') {
                        $activityCategory = 'Magang';
                      } else {
                        $activityCategory = 'Pelatihan';
                      }
                  ?>

                    <tr>
                      <td><?= $no++ ?>.</td>
                      <td><?= $activityCategory ?></td>
                      <td><?= $numberOfActivity ?></td>
                      <td><?= $numberOfParticipant ?></td>
                      <td><?= $numberOfRegistrant ?></td>
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

<script>
  document.getElementById("periode").addEventListener("change", function() {
    var selectedPeriode = this.value;

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var tableBody = document.getElementById("datatable1").getElementsByTagName("tbody")[0];
        tableBody.innerHTML = xhr.responseText;
      }
    };

    xhr.open("GET", "<?= base_url('laporan_peserta/loadReportTable/') ?>" + selectedPeriode, true);
    xhr.send();
  });
</script>
