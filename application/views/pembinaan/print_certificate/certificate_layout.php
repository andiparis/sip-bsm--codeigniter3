<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sertifikat - <?= $detailParticipant->nama ?></title>
  
  <style>
    html, body, div {
      margin: 0;
      padding: 0;
      font-family: sans-serif;
    }

    .text-container {
      position: absolute;
      top: 250px;
      width: 100%;
      text-align: center;
    }

    h1 {
      font-size: 52px;
      font-weight: 600;
      margin-bottom: 10px;
    }
     
    p {
      font-size: 20px;
      font-weight: 400;
    }

    .img-container {
      position: relative;
      width: 100%;
      height: 100vh;
      overflow: hidden;
    }

    .img-full {
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  </style>
</head>
<body>
  <div class="img-container">
    <img src="<?= base_url() ?>assets/dist/img/certificate-layout.jpg" class="img-full">
  </div>
  <div class="text-container">
    <h1><?= $detailParticipant->nama ?></h1>
    <p>
      Atas partisipasinya dalam kegiatan <?= $detailParticipant->nama_kegiatan ?> <br>
      yang dilaksanakan mulai <?= date('d F Y', strtotime($detailParticipant->tgl_mulai)) ?> hingga <?= date('d F Y', strtotime($detailParticipant->tgl_berakhir)) ?>
    </p>
  </div>
</body>
</html>
