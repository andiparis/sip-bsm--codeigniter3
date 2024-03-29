<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><b>Kelola</b> Instruktur</h1>
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
              <h3 class="card-title"><b>Edit Instruktur</b></h3>
              <div class="float-sm-right">
                <a href="<?= site_url('instruktur') ?>" class="btn btn-warning">
                  <b style="color: white"><i class="fas fa-chevron-left"></i> Back</b>
                </a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body pad table-responsive">
              <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <form action="<?= site_url('instruktur/edit_data/' . $instruktur->id_instruktur) ?>" method="post">
                    <div class="form-group">
                      <label for="nama">Nama *</label>
                      <input type="text" name="nama" id="nama" value="<?= $instruktur->nama ?>" class="form-control <?= form_error('nama') ? 'is-invalid' : ''; ?>">
                      <div class="invalid-feedback"><?= form_error('nama'); ?></div>
                    </div>
                    <div class="form-group">
                      <label>Jenis Kelamin *</label><br>
                      <div class="form-check">
                        <input type="radio" name="jenis_kelamin" id="jk-l" value="l" class="form-check-input" <?= $instruktur->jk == "l" ? "checked" : null ?>>
                        <label for="jk-l" class="form-check-label">Laki-laki</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" name="jenis_kelamin" id="jk-p" value="p" class="form-check-input" <?= $instruktur->jk == "p" ? "checked" : null ?>>
                        <label for="jk-p" class="form-check-label">Perempuan</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="telp">No. Telp *</label>
                      <input type="text" name="telp" id="telp" value="<?= $instruktur->telp ?>" class="form-control <?= form_error('telp') ? 'is-invalid' : ''; ?>">
                      <div class="invalid-feedback"><?= form_error('telp'); ?></div>
                    </div>
                    <div class="form-group">
                      <label for="email">Email *</label>
                      <input type="email" name="email" id="email" value="<?= $instruktur->email ?>" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>">
                      <div class="invalid-feedback"><?= form_error('email'); ?></div>
                    </div>
                    <div class="form-group">
                      <label for="alamat">Alamat *</label>
                      <textarea name="alamat" id="alamat" rows="3" class="form-control <?= form_error('alamat') ? 'is-invalid' : ''; ?>"><?= $instruktur->alamat ?></textarea>
                      <div class="invalid-feedback"><?= form_error('alamat'); ?></div>
                    </div>
                    <div class="form-group">
                      <label for="keahlian">Keahlian *</label>
                      <input type="text" name="keahlian" id="keahlian" value="<?= $instruktur->keahlian ?>" class="form-control <?= form_error('keahlian') ? 'is-invalid' : ''; ?>">
                      <div class="invalid-feedback"><?= form_error('keahlian'); ?></div>
                    </div>
                    <div class="form-group">
                      <label for="account">Akun User</label>
                      <select name="user_account" id="account" class="custom-select">
                        <option value=""> - Pilih - </option>

                        <?php if (empty($userAccount) && $instruktur->id_user != null) {  ?>
                          <option value="<?= $instruktur->id_user ?>" selected><?= $instruktur->nama ?></option>
                        <?php } else { foreach ($userAccount as $account) {  ?>
                          <option value="<?= $account->id_user ?>" <?= $instruktur->id_user == $account->id_user ? "selected" : null ?>><?= $account->nama ?></option>
                        <?php } } ?>

                      </select>
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
