<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Surat Penolakan PKL</title>
  <style>
    @page {
      size: A4;
      margin: 1.1cm;
    }
    body {
      font-family: DejaVu Sans, Arial, Helvetica, sans-serif;
      line-height: 1.3;
      font-size: 13px;
      margin: 0;
      padding: 0;
      background: #fff;
    }
    .kop {
      text-align: center;
      margin-bottom: 10px;
    }
    .kop h2, .kop p {
      margin: 0;
      padding: 0;
    }
    .content {
      padding: 0 10px;
      margin-bottom: 0;
    }
    .ttd {
      margin-top: 40px;
      text-align: right;
    }
    .ttd p {
      margin: 0;
      padding: 0;
    }
    p {
      margin-bottom: 16px;
    }
  </style>
</head>
<body>

  <div class="kop" style="text-align: center; margin-bottom: 16px;">
    <span style="font-size:20px; font-weight:bold; letter-spacing:1px; text-transform:uppercase;">{{ $perusahaan->perusahaanProfile->nama_perusahaan }}</span><br>
    <span style="font-size:12px;">{{ $perusahaan->perusahaanProfile->alamat }}</span><br>
    <span style="font-size:12px;">
      Telp: {{ $perusahaan->perusahaanProfile->telepon ?? '-' }} | Email: {{ $perusahaan->email ?? '-' }} | Website: {{ $perusahaan->perusahaanProfile->website ?? '-' }}
    </span>
    <hr style="border:2px solid #000; margin-top:8px;">
  </div>

  <div class="content">
    <p>Nomor:1</p>
    <p>Lampiran: -</p>
    <p>Perihal: Penolakan Lamaran PKL</p>

    <p style="margin-top: 8px; margin-bottom: 2px;">Kepada Yth,</p>
    <p style="margin: 0 0 2px 0;"><strong>{{ $siswa->name }}</strong></p>
    <p style="margin: 0 0 2px 0;">di Sekolah</p>
    <p style="margin: 0 0 8px 0;">{{ $siswa->user_profile->sekolah->nama_sekolah }}</p>

    <p style="margin: 0 0 8px 0;">Dengan hormat,</p>
    <p style="margin: 0 0 8px 0;">Terima kasih atas minat dan lamaran yang Anda kirimkan untuk melaksanakan Praktik Kerja Lapangan (PKL) di perusahaan kami. Setelah mempertimbangkan beberapa aspek, dengan ini kami menyampaikan bahwa lamaran Anda <strong>belum dapat kami terima</strong> untuk periode PKL saat ini.</p>
    <p style="margin: 0 0 8px 0;">Adapun alasan penolakan:
      <em>"{{ $alasan ?? '-' }}"</em>
    </p>
    <p style="margin: 0 0 8px 0;">Walaupun demikian, kami mengapresiasi semangat Anda dan berharap Anda dapat menemukan tempat PKL yang sesuai. Kami juga membuka kesempatan untuk pengajuan kembali pada periode berikutnya apabila tersedia.</p>
    <p style="margin: 0 0 8px 0;">Demikian surat ini kami sampaikan. Atas perhatian dan pengertian Anda, kami ucapkan terima kasih.</p>
  </div>
  <div class="ttd">
    <p>Hormat kami,</p>
    <p><strong>{{ $perusahaan->perusahaanProfile->nama_perusahaan }}</strong></p>
    <p style="margin-top:32px;">{{ $penanggung_jawab ?? 'Nama Penanggung Jawab' }}</p>
  </div>

</body>
</html>
