<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><b>Laporan Peserta</b></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
            <li class="breadcrumb-item active">Kegiatan Pembinaan</li>
            <li class="breadcrumb-item active">Laporan Peserta</li>
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
              <h3 class="card-title"><b>Data Peserta Pembinaan</b></h3>
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
                    <th>Kegiatan</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $no = 1;
                    foreach($data as $peserta) { 
                      if($peserta->jk == 'l')
                        $jk = 'Laki-laki';
                      else
                        $jk = 'Perempuan';

                      if($peserta->email == null)
                        $email = '-';
                      else
                        $email = $peserta->email;
                      
                      if($peserta->status == '1')
                        $status = 'Disetujui';
                      else if($peserta->status == '0')
                        $status = 'Ditolak';
                      else
                        $status = 'Menunggu';
                      
                      foreach($data_kegiatan as $kegiatan) {
                        if($peserta->id_peserta == $kegiatan->id_peserta)
                          $jenis_kegiatan = $kegiatan->nama_kegiatan;
                      }
                  ?>
                    <tr>
                      <td style="width: 5%;"><?=$no++?>.</td>
                      <td><?=$peserta->tgl_daftar?></td>
                      <td><?=$peserta->nama?></td>
                      <td><?=$jk?></td>
                      <td><?=$peserta->telp?></td>
                      <td><?=$peserta->alamat?></td>
                      <td><?=$email?></td>
                      <td><?=$jenis_kegiatan?></td>
                      <td><?=$status?></td>
                      <td class="text-center" width="150px">
                        <a href="<?=site_url('peserta/setujui_pendaftaran/' . $kegiatan->id_peserta)?>" class="btn btn-success btn-xs">
                          <b>Setujui</b>
                        </a>
                        <a href="<?=site_url('peserta/tolak_pendaftaran/' . $kegiatan->id_peserta)?>" class="btn btn-danger btn-xs">
                          <b>Tolak</b>
                        </a>
                      </td>
                    </tr>
                  <?php 
                    } 
                  ?>
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
