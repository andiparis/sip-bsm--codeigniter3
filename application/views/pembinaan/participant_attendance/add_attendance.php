<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><b>Presensi</b> Peserta</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
            <li class="breadcrumb-item active">Presensi Peserta</li>
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
              <h3 class="card-title"><b>Presensi Peserta Pembinaan</b></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body pad table-responsive">
            <form action="<?=site_url('presensi/addAttendance/' . $activityId)?>" method="post">
              <div class="form-group">
                <label for="tglmulai">Tgl Presensi *</label>
                <div class="input-group date" id="tglmulai" data-target-input="nearest">
                  <input type="text" name="attendance_date" class="form-control datetimepicker-input" data-target="#tglmulai" required/>
                  <div class="input-group-append" data-target="#tglmulai" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-success">
                    <b><i class="fas fa-paper-plane"> Save</i></b>
                  </button>
                </div>
                <div class="float-sm-right">
                  <a href="<?=site_url('presensi')?>" class="btn btn-warning">
                    <b style="color: white"><i class="fas fa-undo"></i> Back</b>
                  </a>
                </div>
              </div>
              <table class="table table-bordered table-striped table-head-fixed">	
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Kehadiran</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $no = 1;
                    foreach($activityParticipant as $participant) {
                      $activityId = 
                      $participantId = $participant->id_peserta_pembinaan;
                      $participantName = $participant->nama;
                  ?>
                    <tr>
                      <td style="width: 5%;"><?=$no++?>.</td>
                      <td><?=$participantName?></td>
                      <td class="text-center" width="100px">
                        <input type="checkbox" name="participant_id[]" value="<?=$participantId?>">
                        <!-- <a href="<?=site_url('presensi/selectActivity/' . $activityId)?>" class="btn btn-success btn-xs">
                          <b><i class="fas fa-edit"></i> Presensi</b>
                        </a> -->
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </form>
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
