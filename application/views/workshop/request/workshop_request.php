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
                <form action="<?=site_url('permohonan/addRequest')?>" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="name">Nama Pemohon *</label>
                    <input type="text" name="name_of_requester" id="name" class="form-control" required autofocus>
                  </div>
                  <div class="form-group">
                    <label for="phone">No. Telp *</label>
                    <input type="text" name="phone" id="phone" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="activity">Nama Kegiatan *</label>
                    <input type="text" name="activity_name" id="activity" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="location">Alamat Kegiatan *</label>
                    <textarea name="activity_location" id="location" rows="3" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="letter">Surat Kegiatan *</label>
                    <input type="file" name="activity_letter" id="letter" accept="file/pdf, image/png, image/jpeg, image/jpg">
                  </div>
                  <div class="form-group">
                    <label for="note">Keterangan</label>
                    <textarea name="note" id="note" rows="3" class="form-control"></textarea>
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
