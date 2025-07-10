<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Surat Penolakan Lamaran PKL</title>
  <style>
    body {
      font-family: "Times New Roman", Times, serif;
      line-height: 1.6;
      color: #000;
      padding: 2rem;
    }
    .kop {
      text-align: center;
      margin-bottom: 2rem;
    }
    .kop h2 {
      margin: 0;
      font-size: 1.5rem;
    }
    .kop p {
      margin: 0;
      font-size: 1rem;
    }
    .content {
      margin-top: 1rem;
    }
    .ttd {
      margin-top: 3rem;
      text-align: right;
    }
  </style>
</head>
<body>

  <div class="kop">
    <h2>{{ $perusahaan->nama_perusahaan }}</h2>
    <p>{{ $perusahaan->alamat }}</p>
    <hr>
  </div>

  <div class="content">
    <p>Nomor: {{ $nomor_surat ?? '---/PKL/---' }}</p>
    <p>Lampiran: -</p>
    <p>Perihal: Penolakan Lamaran PKL</p>

    <br>

    <p>Kepada Yth,</p>
    <p><strong>{{ $siswa->nama }}</strong></p>
    <p>di</p>
    <p>{{ $siswa->asal_sekolah }}</p>

    <br>

    <p>Dengan hormat,</p>

    <p>Terima kasih atas minat dan lamaran yang Anda kirimkan untuk melaksanakan Praktik Kerja Lapangan (PKL) di perusahaan kami. Setelah mempertimbangkan beberapa aspek, dengan ini kami menyampaikan bahwa lamaran Anda <strong>belum dapat kami terima</strong> untuk periode PKL saat ini.</p>

    <p>Adapun alasan penolakan: <br>
    <em>"{{ $alasan_penolakan }}"</em></p>

    <p>Walaupun demikian, kami mengapresiasi semangat Anda dan berharap Anda dapat menemukan tempat PKL yang sesuai. Kami juga membuka kesempatan untuk pengajuan kembali pada periode berikutnya apabila tersedia.</p>

    <p>Demikian surat ini kami sampaikan. Atas perhatian dan pengertian Anda, kami ucapkan terima kasih.</p>
  </div>

  <div class="ttd">
    <p>Hormat kami,</p>
    <p><strong>{{ $perusahaan->nama_perusahaan }}</strong></p>
    <br><br>
    <p>{{ $penanggung_jawab ?? 'Nama Penanggung Jawab' }}</p>
  </div>

</body>
</html>
