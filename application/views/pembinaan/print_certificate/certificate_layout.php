<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sertifikat Peserta</title>
  <style>
    html, body, div {
      margin: 0;
      padding: 0;
    }

    .text-container {
      position: absolute;
      top: 250px;
      width: 100%;
      text-align: center;
    }

    h1 {
      font-family: sans-serif;
      font-size: 52px;
      margin-bottom: 10px;
    }
     
    p {
      font-family: sans-serif;
      font-size: 24px;
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
    <img src="<?=base_url()?>assets/dist/img/certificate-layout.png" class="img-full">
  </div>
  <div class="text-container">
    <h1><?= $detailParticipant->nama ?></h1>
    <p>
      Atas partisipasinya dalam kegiatan <?= $detailParticipant->nama_kegiatan ?> <br>
      yang dilaksanakan mulai <?= date('d F Y', strtotime($detailParticipant->tgl_mulai)) ?> hingga <?= date('d F Y', strtotime($detailParticipant->tgl_mulai)) ?>
    </p>
  </div>
</body>
</html>
