<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Surat Pemberitahuan PKL</title>
  <style>
    body {
      font-family: DejaVu Sans, sans-serif;
      line-height: 1.6;
      font-size: 12pt;
    }
    .kop {
      text-align: center;
      border-bottom: 2px solid #000;
      padding-bottom: 10px;
      margin-bottom: 20px;
    }
    .kop h2, .kop p {
      margin: 0;
    }
    .content {
      padding: 0 20px;
    }
    .footer {
      margin-top: 40px;
      text-align: right;
    }
    .ttd {
      margin-top: 80px;
      text-align: right;
    }
  </style>
</head>
<body>

  <div class="kop">
    <h2>{{ $perusahaan->perusahaanProfile->nama_perusahaan }}</h2>
    <p>{{ $perusahaan->perusahaanProfile->alamat }}</p>
    <p>Telp: {{ $perusahaan->perusahaanProfile->telepon }} | Website: {{ $perusahaan->perusahaanProfile->website }}</p>
  </div>

  <div class="content">
    <p><strong>Nomor:</strong>1</p>
    <p><strong>Lampiran:</strong> -</p>
    <p><strong>Perihal:</strong> Pemberitahuan Penerimaan PKL</p>


    <p>Yth. {{ $siswa->name }}<br>
    Siswa {{ $siswa->user_profile->sekolah->nama_sekolah }}<br>
    Di Tempat</p>


    <p>Dengan hormat,</p>

    <p>Bersama surat ini, kami dari <strong>{{ $perusahaan->perusahaanProfile->nama_perusahaan }}</strong> menyampaikan bahwa saudara/i telah <strong>diterima</strong> untuk melaksanakan kegiatan Praktek Kerja Lapangan (PKL) di perusahaan kami melalui lowongan:</p>

    <p>
      <strong>Judul Lowongan:</strong> {{ $lowongan->judul_lowongan }}<br>
      <strong>Alamat PKL:</strong> {{ $perusahaan->perusahaanProfile->alamat }}<br>
      <strong>Jadwal Datang:</strong> {{ Carbon\Carbon::parse($surat->jadwal_kedatangan)->format("d F Y") }}
    </p>

    <p><strong>Catatan Tambahan:</strong><br>
    {{ $surat->catatan ?? '-' }}</p>

    <p>Diharapkan agar saudara/i dapat hadir sesuai jadwal dan membawa kelengkapan yang diperlukan, serta menjaga sikap profesional selama kegiatan berlangsung.</p>

    <p>Demikian surat pemberitahuan ini kami sampaikan. Atas perhatian dan kerjasamanya, kami ucapkan terima kasih.</p>
  </div>

  <div class="footer">
    <p>{{ $perusahaan->perusahaanProfile->nama_perusahaan }}, {{ $surat->created_at->translatedFormat('d F Y') }}</p>
  </div>

  <div class="ttd">
    <p><strong>Pimpinan Perusahaan</strong></p>
    <br><br><br>
    <p><strong><u>{{ $perusahaan->perusahaanProfile->pemilik }}</u></strong></p>
  </div>

</body>
</html>
