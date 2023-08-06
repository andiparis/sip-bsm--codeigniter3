<div class="container">
  <h4 style="margin-top: 100px; margin-left: 20px">Daftar Kegiatan</h4>
  <div class="card-body pad table-responsive">
    <table class="table table-bordered table-striped table-head-fixed" id="datatable1">  
      <thead>
        <tr>
          <th>No.</th>
          <th>Nama Kegiatan</th>
          <th>Kategori</th>
          <th>Tgl Mulai</th>
          <th>Tgl Berakhir</th>
          <th>Keterangan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>

        <?php 
          $no = 1;
          $activityDetailMap = array();
          foreach ($activities as $activity) { 
            $activityId = $activity->id_kegiatan;
            $activityStatus = $activity->status;
            if (!array_key_exists($activityId, $activityDetailMap)) {
              $activityDetailMap[$activityId] = array(
                'acceptedParticipant' => 0,
                'activityId' => $activity->id_kegiatan,
                'activityName' => $activity->nama_kegiatan,
                'activityCategory' => $activity->kategori,
                'startDate' => $activity->tgl_mulai,
                'endDate' => $activity->tgl_berakhir,
                'note' => $activity->keterangan,
                'participantQuota' => $activity->kuota,
              );
            }

            if ($activityStatus == '1') {
              $activityDetailMap[$activityId]['acceptedParticipant']++;
            } else if ($activityStatus == null) {
              $activityDetailMap[$activityId]['acceptedParticipant'] = null;
            }
          }

          foreach ($activityDetailMap as $activityId => $activity) {
            $participantQuota = $activity['participantQuota'];
            $acceptedParticipant = $activity['acceptedParticipant'];
            if ($acceptedParticipant < $participantQuota || $acceptedParticipant == null) {
              $activityId = $activity['activityId'];
              $activityName = $activity['activityName'];
              $activityCategory = $activity['activityCategory'];
              $startDate = $activity['startDate'];
              $endDate = $activity['endDate'];
              $note = $activity['note'];

              if ($activityCategory == '1') {
                $activityCategory = 'Magang';
              } else {
                $activityCategory = 'Pelatihan';
              }

              if ($note == '') {
                $note = '-';
              }
        ?>

          <tr>
            <td style="width: 5%;"><?= $no++ ?>.</td>
            <td><?= $activityName ?></td>
            <td><?= $activityCategory ?></td>
            <td><?= $startDate ?></td>
            <td><?= $endDate ?></td>
            <td><?= $note ?></td>
            <td class="text-center" width="150px">
              <a href="<?= site_url('program/addRegistration/' . $activityId) ?>" class="btn btn-success btn-sm">
                <b>Daftar</b>
              </a>
            </td>
          </tr>
          
        <?php 
            }
          }
        ?>

      </tbody>
    </table>
  </div>
</div>

<!-- Bootstrap 4.6 -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- DataTables & Plugins -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url() ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<script>
  $(function() {
    $("#datatable1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      // additional settings
      "paging": true,
      "ordering": true,
      "info": true,
    });
  });
</script>

</body>
</html>