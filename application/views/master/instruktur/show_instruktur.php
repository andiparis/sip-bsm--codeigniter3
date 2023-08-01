<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><b>Kelola Instruktur</b></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active">Kelola Instruktur</li>
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
              <h3 class="card-title"><b>Data Instruktur</b></h3>
              <div class="float-sm-right">
                <a href="<?= site_url('instruktur/add_data') ?>" class="btn btn-primary">
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
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>No. Telp</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Keahlian</th>
                    <th>Status Akun</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
                    $no = 1;
                    foreach ($data as $instruktur) { 
                      $accountStatus = $instruktur->id_user;

                      if ($instruktur->jk == 'l') {
                        $jk = 'Laki-laki';
                      } else {
                        $jk = 'Perempuan';
                      }

                      if ($accountStatus != null) {
                        $accountStatus = 'Terhubung';
                        $style = "success";
                      } else {
                        $accountStatus = 'Tidak Terhubung';
                        $style = "warning";
                      }
                  ?>

                    <tr>
                      <td style="width: 5%;"><?= $no++ ?>.</td>
                      <td><?= $instruktur->nama ?></td>
                      <td><?= $jk ?></td>
                      <td><?= $instruktur->telp ?></td>
                      <td><?= $instruktur->email ?></td>
                      <td><?= $instruktur->alamat ?></td>
                      <td><?= $instruktur->keahlian ?></td>
                      <td><span class="btn btn-sm btn-outline-<?= $style ?> disabled"><?= $accountStatus ?></span></td>
                      <td class="text-center" width="150px">
                        <a href="<?= site_url('instruktur/edit_data/' . $instruktur->id_instruktur) ?>" class="btn btn-warning btn-sm" style="color: white;">
                          <b><i class="fas fa-edit"></i> Edit</b>
                        </a>
                        <a href="<?= site_url('instruktur/delete_data/' . $instruktur->id_instruktur) ?>" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-default">
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

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Konfirmasi Hapus Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah Anda yakin ingin menghapus data ini?</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <button type="button" class="btn btn-danger" onclick="deleteData()">Ya</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
  function deleteData() {
    $.ajax({
      url: '<?= site_url('instruktur/delete_data/' . $instruktur->id_instruktur) ?>',
      type: 'GET',
      success: function(response) {
        window.location.href = '<?= site_url('instruktur') ?>';
      },
      error: function(error) {
        toastr.error('Terjadi kesalahan saat menghapus data.');
      }
    });
  }
</script>
