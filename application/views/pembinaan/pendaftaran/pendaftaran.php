<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
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
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <form action="<?=site_url('pendaftaran/add_data')?>" method="post">
                    <div class="form-group">
                      <label for="id">ID Peserta *</label>
                      <input type="text" name="id_peserta" id="id" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama Lengkap *</label>
                      <input type="text" name="nama" id="nama" class="form-control" required autofocus>
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
                    </div>
                    <div class="form-group">
                      <label for="telp">No. Telp *</label>
                      <input type="text" name="telp" id="telp" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="alamat">Alamat *</label>
                      <textarea name="alamat" id="alamat" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="kegiatan">Jenis Kegiatan *</label>
                      <select name="kegiatan" id="kegiatan" class="custom-select" required>
                        <option value=""> - Pilih - </option>
                        <?php 
                          foreach($data as $kegiatan) { 
                        ?>
                          <option value="<?=$kegiatan->kode_kegiatan?>"><?=$kegiatan->nama_kegiatan?></option>
                        <?php } ?>
                      </select>
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
