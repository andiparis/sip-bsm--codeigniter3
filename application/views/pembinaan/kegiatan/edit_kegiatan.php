<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><b>Kelola Jadwal Kegiatan</b></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
            <li class="breadcrumb-item active">Kegiatan Pembinaan</li>
            <li class="breadcrumb-item active">Kelola Jadwal Kegiatan</li>
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
              <h3 class="card-title"><b>Edit Jadwal Kegiatan Pembinaan</b></h3>
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
                  <form action="<?=site_url('kegiatan/edit_data/' . $kegiatan->id_kegiatan)?>" method="post">
                    <div class="form-group">
                      <label for="permohonan">Permohonan Workshop</label>
                      <select name="id_permohonan" id="permohonan" class="custom-select">
                        <option value=""> - Pilih - </option>
                        <?php foreach($data_permohonan as $permohonan) { ?>
                          <option value="<?=$permohonan->id_permohonan?>" <?=$permohonan->id_permohonan == $kegiatan->id_permohonan ? "selected" : null?>><?=$permohonan->nama_kegiatan?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama Kegiatan *</label>
                      <input type="text" name="nama_kegiatan" id="nama" value="<?=$kegiatan->nama_kegiatan?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="kategori">Kategori Kegiatan *</label>
                      <select name="kategori_kegiatan" id="kategori" class="custom-select" required>
                        <option value=""> - Pilih - </option>
                        <option value="1" <?=$kegiatan->kategori == "1" ? "selected" : null?>>Magang</option>
                        <option value="2" <?=$kegiatan->kategori == "2" ? "selected" : null?>>Pelatihan</option>
                        <option value="3" <?=$kegiatan->kategori == "3" ? "selected" : null?>>Workshop</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="tglmulai">Tgl Mulai *</label>
                      <div class="input-group date" id="tglmulai" data-target-input="nearest">
                        <input type="text" name="tgl_mulai" value="<?=$kegiatan->tgl_mulai?>" class="form-control datetimepicker-input" data-target="#tglmulai" required/>
                        <div class="input-group-append" data-target="#tglmulai" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="tglberakhir">Tgl Berakhir *</label>
                      <div class="input-group date" id="tglberakhir" data-target-input="nearest">
                        <input type="text" name="tgl_berakhir" value="<?=$kegiatan->tgl_berakhir?>" class="form-control datetimepicker-input" data-target="#tglberakhir" required/>
                        <div class="input-group-append" data-target="#tglberakhir" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="instruktur1">Instruktur 1 *</label>
                      <select name="id_instruktur_1" id="instruktur1" class="custom-select" required>
                        <option value=""> - Pilih - </option>
                        <?php foreach($data_instruktur as $instruktur) { ?>
                          <option value="<?=$instruktur->id_instruktur?>" <?=$instruktur->id_instruktur == $kegiatan->id_instruktur_1 ? "selected" : null?>><?=$instruktur->nama?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="instruktur2">Instruktur 2</label>
                      <select name="id_instruktur_2" id="instruktur2" class="custom-select">
                        <option value=""> - Pilih - </option>
                        <?php foreach($data_instruktur as $instruktur) { ?>
                          <option value="<?=$instruktur->id_instruktur?>" <?=$instruktur->id_instruktur == $kegiatan->id_instruktur_2 ? "selected" : null?>><?=$instruktur->nama?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="kelas">Kelas</label>
                      <select name="id_kelas" id="kelas" class="custom-select">
                        <option value=""> - Pilih - </option>                        
                        <?php foreach($data_kelas as $kelas) { ?>
                          <option value="<?=$kelas->id_kelas?>" <?=$kelas->id_kelas == $kegiatan->id_kelas ? "selected" : null?>><?=$kelas->nama_kelas?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="kuota">Kuota Peserta</label>
                      <input type="text" name="kuota_peserta" id="kuota" value="<?=$kegiatan->kuota?>" class="form-control">
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
