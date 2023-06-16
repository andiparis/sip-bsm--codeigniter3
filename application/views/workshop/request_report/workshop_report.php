<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><b>Laporan Permohonan</b> Workshop</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
            <li class="breadcrumb-item active">Permohonan Workshop</li>
            <li class="breadcrumb-item active">Laporan Permohonan</li>
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
              <h3 class="card-title"><b>Data Permohonan Workshop</b></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body pad table-responsive">
              <table class="table table-bordered table-striped table-head-fixed" id="datatable1">	
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Tgl Permohonan</th>
                    <th>Nama Pemohon</th>
                    <th>No. Telp</th>
                    <th>Nama Kegiatan</th>
                    <th>Alamat Kegiatan</th>
                    <th>Surat Kegiatan</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $no = 1;
                    foreach($workshopRequest as $request) { 
                      $requestId = $request->id_permohonan;
                      $requestDate = $request->tgl_permohonan;
                      $nameOfRequester = $request->nama_pemohon;
                      $phone = $request->telp;
                      $activityName = $request->nama_kegiatan;
                      $locationWorkshop = $request->alamat_kegiatan;
                      $activityLetter = $request->surat_kegiatan;
                      $note = $request->keterangan;
                      $status = $request->status_permohonan;

                      if ($note == '') {
                        $note = '-';
                      } else {
                        $note = $note;
                      }

                      if ($status == '0')
                        $requestStatus = 'Menunggu';
                      else if ($status == '1')
                        $requestStatus = 'Disetujui';
                      else
                        $requestStatus = 'Ditolak';
                  ?>
                    <tr>
                      <td style="width: 5%;"><?= $no++ ?>.</td>
                      <td><?= $requestDate ?></td>
                      <td><?= $nameOfRequester ?></td>
                      <td><?= $phone ?></td>
                      <td><?= $activityName ?></td>
                      <td><?= $locationWorkshop ?></td>
                      <td>
                        <a href="<?= base_url('uploads/activity_letter/') . $activityLetter ?>" target="_blank"><?= $activityLetter ?></a>
                      </td>
                      <td><?= $note ?></td>
                      <td><?= $requestStatus ?></td>
                      <td class="text-center" width="150px">
                        <?php if ($status == '0') { ?>
                          <a href="<?=site_url('laporan_permohonan/approveRequest/' . $requestId) ?>" class="btn btn-success btn-xs">
                            <b>Setujui</b>
                          </a>
                          <a href="<?=site_url('laporan_permohonan/rejectRequest/' . $requestId) ?>" class="btn btn-danger btn-xs">
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
