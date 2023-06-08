<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><b>Laporan Permohonan Workshop</b></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
            <li class="breadcrumb-item active">Permohonan Workshop</li>
            <li class="breadcrumb-item active">Laporan Permohonan Workshop</li>
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
                    <th>Tgl Permohonan</th>
                    <th>Nama Pemohon</th>
                    <th>No. Telp</th>
                    <th>Nama Kegiatan</th>
                    <th>Alamat Kegiatan</th>
                    <th>Surat Kegiatan</th>
                    <!-- <th>Status</th> -->
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $no = 1;
                    foreach($data as $permohonan) { 
                      // if($peserta->status == '1')
                      //   $status = 'Selesai';
                      // else if($peserta == '0')
                      //   $status = 'Telah dijadwalkan';
                      // else
                      //   $status = 'Belum dijadwalkan';
                      
                      // foreach($data_kegiatan as $kegiatan) {
                      //   if($peserta->id_peserta == $kegiatan->id_peserta)
                      //     $jenis_kegiatan = $kegiatan->nama_kegiatan;
                      // }
                      if ($permohonan->keterangan == '')
                        $keterangan = '-';
                      else
                        $keterangan = $permohonan->keterangan;
                  ?>
                    <tr>
                      <td style="width: 5%;"><?=$no++?>.</td>
                      <td><?=$permohonan->tgl_permohonan?></td>
                      <td><?=$permohonan->nama_pemohon?></td>
                      <td><?=$permohonan->telp?></td>
                      <td><?=$permohonan->nama_kegiatan?></td>
                      <td><?=$permohonan->alamat_kegiatan?></td>
                      <td><?=$permohonan->surat_kegiatan?></td>
                      <td><?=$keterangan?></td>
                      <!-- <td><?=$status?></td> -->
                      <td class="text-center" width="150px">
                        
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
