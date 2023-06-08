<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title"><b>Permohonan Workshop</b></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body pad table-responsive">
              <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <form action="<?=site_url('permohonan/add_data')?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="kode">Kode Permohonan *</label>
                      <input type="text" name="kode_permohonan" id="kode" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama Pemohon *</label>
                      <input type="text" name="nama_pemohon" id="nama" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                      <label for="telp">No. Telp *</label>
                      <input type="text" name="telp" id="telp" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="kegiatan">Nama Kegiatan *</label>
                      <input type="text" name="nama_kegiatan" id="kegiatan" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="alamat">Alamat Kegiatan *</label>
                      <textarea name="alamat_kegiatan" id="alamat" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="surat">Surat Kegiatan *</label>
                      <input type="file" name="surat_kegiatan" id="surat" accept="file/pdf, image/png, image/jpeg, image/jpg">
                    </div>
                    <?php if (isset($error)) : ?>
                      <div class="invalid-feedback"><?= $error ?></div>
                    <?php endif; ?>
                    <div class="form-group">
                      <label for="keterangan">Keterangan</label>
                      <textarea name="keterangan" id="keterangan" rows="3" class="form-control"></textarea>
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
