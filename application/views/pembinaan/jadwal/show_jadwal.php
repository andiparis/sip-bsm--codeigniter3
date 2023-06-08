<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><b>Kelola Jadwal Pembinaan</b></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
            <li class="breadcrumb-item active">Kegiatan Pembinaan</li>
            <li class="breadcrumb-item active">Kelola Jadwal Pembinaan</li>
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
              <h3 class="card-title"><b>Data Jadwal Pembinaan</b></h3>
              <div class="float-sm-right">
                <a href="<?=site_url('jadwal_pembinaan/add_data')?>" class="btn btn-primary">
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
                    <th>Jenis Kegiatan</th>
                    <th>Tgl Kegiatan</th>
                    <th>Jam Mulai</th>
                    <th>Jam Berakhir</th>
                    <th>Kelas</th>
                    <th>Instruktur 1</th>
                    <th>Instruktur 2</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $no = 1;
                    foreach($data as $kegiatan) { 
                      if($kegiatan->keterangan == null)
                        $keterangan = '-';
                      else
                        $keterangan = $kegiatan->keterangan;
                  ?>
                    <tr>
                      <td style="width: 5%;"><?=$no++?>.</td>
                      <td><?=$kegiatan->kode_kegiatan?></td>
                      <td><?=$kegiatan->nama_kegiatan?></td>
                      <td><?=$kegiatan->kategori?></td>
                      <td><?=$keterangan?></td>
                      <td class="text-center" width="150px">
                        <a href="<?=site_url('kegiatan/edit_data/' . $kegiatan->kode_kegiatan)?>" class="btn btn-warning btn-xs" style="color: white;">
                          <b><i class="fas fa-edit"></i> Edit</b>
                        </a>
                        <a href="<?=site_url('kegiatan/delete_data/' . $kegiatan->kode_kegiatan)?>" class="btn btn-danger btn-xs">
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
