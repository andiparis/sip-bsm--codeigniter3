<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><b>Kelola</b> Jadwal Kegiatan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active">Kegiatan Pembinaan</li>
            <li class="breadcrumb-item active">Kelola Jadwal Kegiatan</li>
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
              <h3 class="card-title"><b>Add Jadwal Kegiatan Pembinaan</b></h3>
              <div class="float-sm-right">
                <a href="<?= site_url('kegiatan') ?>" class="btn btn-warning">
                  <b style="color: white"><i class="fas fa-chevron-left"></i> Back</b>
                </a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body pad table-responsive">
              <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <form action="<?= site_url('kegiatan/add_data') ?>" method="post">
                    <div class="form-group">
                      <label for="permohonan">Permohonan Workshop</label>
                      <select name="id_permohonan" id="permohonan" class="custom-select">
                        <option value=""> - Pilih - </option>
                        <?php foreach ($data_permohonan as $permohonan) { ?>
                          <option value="<?= $permohonan->id_permohonan ?>" data-note="<?= $permohonan->keterangan ?>"><?= $permohonan->nama_kegiatan ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama Kegiatan *</label>
                      <input type="text" name="nama_kegiatan" id="nama" class="form-control <?= form_error('nama_kegiatan') ? 'is-invalid' : ''; ?>">
                      <div class="invalid-feedback"><?= form_error('nama_kegiatan'); ?></div>
                    </div>
                    <div class="form-group">
                      <label for="kategori">Kategori Kegiatan *</label>
                      <select name="kategori_kegiatan" id="kategori" class="custom-select <?= form_error('kategori_kegiatan') ? 'is-invalid' : ''; ?>">
                        <option value=""> - Pilih - </option>
                        <option value="1">Magang</option>
                        <option value="2">Pelatihan</option>
                        <option value="3">Workshop</option>
                      </select>
                      <div class="invalid-feedback"><?= form_error('kategori_kegiatan'); ?></div>
                    </div>
                    <div class="form-group">
                      <label for="tglmulai">Tgl Mulai *</label>
                      <div class="input-group date" id="tglmulai" data-target-input="nearest">
                        <input type="text" name="tgl_mulai" class="form-control datetimepicker-input <?= form_error('tgl_mulai') ? 'is-invalid' : ''; ?>" data-target="#tglmulai"/>
                        <div class="input-group-append" data-target="#tglmulai" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                        <div class="invalid-feedback"><?= form_error('tgl_mulai'); ?></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="tglberakhir">Tgl Berakhir *</label>
                      <div class="input-group date" id="tglberakhir" data-target-input="nearest">
                        <input type="text" name="tgl_berakhir" class="form-control datetimepicker-input <?= form_error('tgl_berakhir') ? 'is-invalid' : ''; ?>" data-target="#tglberakhir"/>
                        <div class="input-group-append" data-target="#tglberakhir" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                        <div class="invalid-feedback"><?= form_error('tgl_berakhir'); ?></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="kuota">Kuota Peserta</label>
                      <input type="text" name="kuota_peserta" id="kuota" class="form-control <?= form_error('kuota_peserta') ? 'is-invalid' : ''; ?>">
                      <div class="invalid-feedback"><?= form_error('kuota_peserta'); ?></div>
                    </div>
                    <div class="form-group">
                      <label for="instruktur1">Instruktur 1 *</label>
                      <select name="id_instruktur_1" id="instruktur1" class="custom-select <?= form_error('id_instruktur_1') ? 'is-invalid' : ''; ?>">
                        <option value=""> - Pilih - </option>
                        <?php foreach ($data_instruktur as $instruktur) { ?>
                          <option value="<?= $instruktur->id_instruktur ?>"><?= $instruktur->nama ?></option>
                        <?php } ?>
                      </select>
                      <div class="invalid-feedback"><?= form_error('id_instruktur_1'); ?></div>
                    </div>
                    <div class="form-group">
                      <label for="instruktur2">Instruktur 2</label>
                      <select name="id_instruktur_2" id="instruktur2" class="custom-select">
                        <option value=""> - Pilih - </option>
                        <?php foreach ($data_instruktur as $instruktur) { ?>
                          <option value="<?= $instruktur->id_instruktur ?>"><?= $instruktur->nama ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="kelas">Kelas</label>
                      <select name="id_kelas" id="kelas" class="custom-select">
                        <option value=""> - Pilih - </option>
                        <?php foreach ($data_kelas as $kelas) { ?>
                          <option value="<?= $kelas->id_kelas ?>"><?= $kelas->nama_kelas ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="keterangan">Keterangan</label>
                      <textarea name="keterangan" id="keterangan" rows="3" class="form-control <?= form_error('keterangan') ? 'is-invalid' : ''; ?>"></textarea>
                      <div class="invalid-feedback"><?= form_error('keterangan'); ?></div>
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

<script>
document.getElementById('permohonan').addEventListener('change', function() {
  var selectedOption = this.options[this.selectedIndex];
  var activityNameInput = document.getElementById('nama');
  var activityCategorySelect = document.getElementById('kategori');
  var activityNote = document.getElementById('keterangan');
  
  if (selectedOption.value == '') {
    activityNameInput.value = '';
    activityCategorySelect.selectedIndex = 0;
    activityNote = '';
  } else {
    activityNameInput.value = selectedOption.text;
    activityCategorySelect.selectedIndex = 3;
    activityNote.value = selectedOption.getAttribute('data-note');
  }
});
</script>