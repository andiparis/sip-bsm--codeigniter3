<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title"><b>Pendaftaran Peserta Program Pembinaan</b></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body pad table-responsive">
            <div class="row">
              <div class="col-md-6 offset-md-3">
                <form action="<?= site_url('program/addRegistration/' . $activity->id_kegiatan) ?>" method="post">
                  <div class="form-group">
                    <label for="kegiatan">Kegiatan *</label>
                    <input type="text" name="kegiatan" id="kegiatan" value="<?= $activity->nama_kegiatan ?>" class="form-control" disabled>
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama Lengkap *</label>
                    <input type="text" name="nama" id="nama" class="form-control <?= form_error('nama') ? 'is-invalid' : ''; ?>" autofocus>
                    <div class="invalid-feedback"><?= form_error('nama'); ?></div>
                  </div>
                  <div class="form-group">
                    <label>Jenis Kelamin *</label><br>
                    <div class="form-check">
                      <input type="radio" name="jenis_kelamin" id="jk-l" value="l" class="form-check-input" checked>
                      <label for="jk-l" class="form-check-label">Laki-laki</label>
                    </div>
                    <div class="form-check">
                      <input type="radio" name="jenis_kelamin" id="jk-p" value="p" class="form-check-input">
                      <label for="jk-p" class="form-check-label">Perempuan</label>
                    </div>
                    <div class="invalid-feedback"><?= form_error('jenis_kelamin'); ?></div>
                  </div>
                  <div class="form-group">
                    <label for="telp">No. Telp *</label>
                    <input type="text" name="telp" id="telp" class="form-control <?= form_error('telp') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback"><?= form_error('telp'); ?></div>
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat *</label>
                    <textarea name="alamat" id="alamat" rows="3" class="form-control <?= form_error('alamat') ? 'is-invalid' : ''; ?>"></textarea>
                    <div class="invalid-feedback"><?= form_error('alamat'); ?></div>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback"><?= form_error('email'); ?></div>
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
