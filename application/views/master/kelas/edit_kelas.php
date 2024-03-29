<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><b>Kelola</b> Kelas</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active">Kelola Kelas</li>
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
              <h3 class="card-title"><b>Edit Kelas</b></h3>
              <div class="float-sm-right">
                <a href="<?= site_url('kelas') ?>" class="btn btn-warning">
                  <b style="color: white"><i class="fas fa-chevron-left"></i> Back</b>
                </a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body pad table-responsive">
              <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <form action="<?= site_url('kelas/edit_data/' . $kelas->id_kelas) ?>" method="post">
                    <div class="form-group">
                      <label for="nama">Nama Kelas *</label>
                      <input type="text" name="nama_kelas" id="nama" value="<?= $kelas->nama_kelas ?>" class="form-control <?= form_error('nama_kelas') ? 'is-invalid' : ''; ?>">
                      <div class="invalid-feedback"><?= form_error('nama_kelas'); ?></div>
                    </div>
                    <div class="form-group">
                      <label for="kapasitas">Kapasitas *</label>
                      <input type="text" name="kapasitas" id="kapasitas" value="<?= $kelas->kapasitas ?>" class="form-control <?= form_error('kapasitas') ? 'is-invalid' : ''; ?>">
                      <div class="invalid-feedback"><?= form_error('kapasitas'); ?></div>
                    </div>
                    <div class="form-group">
                      <button type="reset" class="btn btn-secondary" style="margin-right: 5px;">
                        <b><i class="fas fa-undo"> Reset</i></b>
                      </button>
                      <button type="submit" class="btn btn-success">
                        <b><i class="fas fa-paper-plane"> Save</i></b>
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
