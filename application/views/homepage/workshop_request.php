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
              <div class="col-md-6 offset-md-3">
                <form action="<?= site_url('program/addRequest') ?>" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="name">Nama Pemohon *</label>
                    <input type="text" name="name_of_requester" id="name" class="form-control <?= form_error('name_of_requester') ? 'is-invalid' : ''; ?>" autofocus>
                    <div class="invalid-feedback"><?= form_error('name_of_requester'); ?></div>
                  </div>
                  <div class="form-group">
                    <label for="phone">No. Telp *</label>
                    <input type="text" name="phone" id="phone" class="form-control <?= form_error('phone') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback"><?= form_error('phone'); ?></div>
                  </div>
                  <div class="form-group">
                    <label for="activity">Nama Kegiatan *</label>
                    <input type="text" name="activity_name" id="activity" class="form-control <?= form_error('activity_name') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback"><?= form_error('activity_name'); ?></div>
                  </div>
                  <div class="form-group">
                    <label for="location">Alamat Kegiatan *</label>
                    <textarea name="activity_location" id="location" rows="3" class="form-control <?= form_error('activity_location') ? 'is-invalid' : ''; ?>"></textarea>
                    <div class="invalid-feedback"><?= form_error('activity_location'); ?></div>
                  </div>
                  <div class="form-group">
                    <label for="letter">Surat Permohonan Kegiatan *</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="letter" name="activity_letter" accept=".pdf, .jpg, .jpeg, .png" class="form-control is-invalid <?= form_error('activity_letter') ? 'is-invalid' : ''; ?>">
                        <label class="custom-file-label" for="letter">Choose file</label>
                      </div>
                    </div>
                    <?php if ($this->session->flashdata('upload_error')) { ?>
                      <p><?php echo $this->session->flashdata('upload_error'); ?></p>
                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <label for="note">Keterangan</label>
                    <textarea name="note" id="note" rows="3" class="form-control <?= form_error('note') ? 'is-invalid' : ''; ?>"></textarea>
                    <div class="invalid-feedback"><?= form_error('note'); ?></div>
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
