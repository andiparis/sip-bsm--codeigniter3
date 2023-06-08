<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><b>Kelola Kelas</b></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
            <li class="breadcrumb-item active">Kelola Kelas</li>
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
              <h3 class="card-title"><b>Edit Kelas</b></h3>
              <div class="float-sm-right">
                <a href="<?=site_url('kelas')?>" class="btn btn-warning">
                  <b style="color: white"><i class="fas fa-undo"></i> Back</b>
                </a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body pad table-responsive">
              <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <form action="<?=site_url('kelas/edit_data/' . $kelas->kode_kelas)?>" method="post">
                    <div class="form-group">
                      <label for="kode">Kode Kelas *</label>
                      <input type="text" name="kode_kelas" id="kode" value="<?=$kelas->kode_kelas?>" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama Kelas *</label>
                      <input type="text" name="nama_kelas" id="nama" value="<?=$kelas->nama?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="fungsi">Fungsi Kelas *</label>
                      <input type="text" name="fungsi_kelas" id="fungsi" value="<?=$kelas->fungsi?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="kapasitas">Kapasitas *</label>
                      <input type="text" name="kapasitas" id="kapasitas" value="<?=$kelas->kapasitas?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-success">
                        <b><i class="fas fa-paper-plane"> Save</i></b>
                      </button>
                      <button type="reset" class="btn btn-secondary">
                        <b>Reset</b>
                      </button>
                    </div>
                  </form>
                </div>
              </div>
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
