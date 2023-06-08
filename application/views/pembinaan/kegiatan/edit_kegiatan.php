<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><b>Kelola Kegiatan</b></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
            <li class="breadcrumb-item active">Kegiatan Pembinaan</li>
            <li class="breadcrumb-item active">Kelola Kegiatan</li>
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
              <h3 class="card-title"><b>Edit Kegiatan Pembinaan</b></h3>
              <div class="float-sm-right">
                <a href="<?=site_url('kegiatan')?>" class="btn btn-warning">
                  <b style="color: white"><i class="fas fa-undo"></i> Back</b>
                </a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body pad table-responsive">
              <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <form action="<?=site_url('kegiatan/edit_data/' . $kegiatan->kode_kegiatan)?>" method="post">
                    <div class="form-group">
                      <label for="kode">Kode Kegiatan *</label>
                      <input type="text" name="kode_kegiatan" id="kode" value="<?=$kegiatan->kode_kegiatan?>" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama Kegiatan *</label>
                      <input type="text" name="nama_kegiatan" id="nama" value="<?=$kegiatan->nama_kegiatan?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="kategori">Kategori Kegiatan *</label>
                      <select name="kategori_kegiatan" id="kategori" class="custom-select" required>
                        <option value=""> - Pilih - </option>
                        <option value="pelatihan" <?=$kegiatan->kategori == "pelatihan" ? "selected" : null?>>Pelatihan</option>
                        <option value="magang" <?=$kegiatan->kategori == "magang" ? "selected" : null?>>Magang</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="keterangan">Keterangan</label>
                      <textarea name="keterangan" id="keterangan" rows="3" class="form-control"><?=$kegiatan->keterangan?></textarea>
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
