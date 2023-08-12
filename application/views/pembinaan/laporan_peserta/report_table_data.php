<table class="table table-bordered table-striped table-head-fixed" id="datatable1">	
  <tbody>

    <?php 
      $no = 1;
      $reportMap = array();
      $activityMap = array();
      foreach ($reports as $report) { 
        $activityId = $report->id_kegiatan;
        $activityCategory = $report->kategori;
        if (!array_key_exists($activityCategory, $reportMap)) {
          $reportMap[$activityCategory] = array(
            'activityCategory' => $activityCategory,
            'numberOfActivity' => 0,
            'numberOfParticipant' => 0,
            'numberOfRegistrant' => 0,
          );
        }

        if (!array_key_exists($activityId, $activityMap)) {
          $activityMap[$activityId] = array();
          $reportMap[$activityCategory]['numberOfActivity']++;
        }
        $reportMap[$activityCategory]['numberOfRegistrant']++;

        if ($report->status == '1') {
          $reportMap[$activityCategory]['numberOfParticipant']++;
        }
      }

      foreach ($reportMap as $report) {
        $activityCategory = $report['activityCategory'];
        $numberOfActivity = $report['numberOfActivity'];
        $numberOfParticipant = $report['numberOfParticipant'];
        $numberOfRegistrant = $report['numberOfRegistrant'];

        if ($activityCategory == '1') {
          $activityCategory = 'Magang';
        } else {
          $activityCategory = 'Pelatihan';
        }
    ?>

      <tr>
        <td style="width: 5%;"><?= $no++ ?>.</td>
        <td><?= $activityCategory ?></td>
        <td><?= $numberOfActivity ?></td>
        <td><?= $numberOfParticipant ?></td>
        <td><?= $numberOfRegistrant ?></td>
      </tr>

    <?php } ?>

  </tbody>
</table>
