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
            <li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
            <li class="breadcrumb-item active">Kelola Instruktur</li>
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
              <h3 class="card-title"><b>Add Instruktur</b></h3>
              <div class="float-sm-right">
                <a href="<?=site_url('instruktur')?>" class="btn btn-warning">
                  <b style="color: white"><i class="fas fa-undo"></i> Back</b>
                </a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body pad table-responsive">
              <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <form action="<?=site_url('instruktur/add_data')?>" method="post">
                    <div class="form-group">
                      <label for="id">ID Instruktur *</label>
                      <input type="text" name="id_instruktur" id="id" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama *</label>
                      <input type="text" name="nama" id="nama" class="form-control" required>
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
                      <label for="email">Email *</label>
                      <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="alamat">Alamat *</label>
                      <textarea name="alamat" id="alamat" rows="3" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                      <label for="keahlian">Keahlian *</label>
                      <input type="text" name="keahlian" id="keahlian" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="account">Akun User</label>
                      <select name="user_account" id="account" class="custom-select">
                        <option value=""> - Pilih - </option>
                        <?php foreach($userAccount as $account) { ?>
                          <option value="<?=$account->id_user?>"><?=$account->nama?></option>
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
