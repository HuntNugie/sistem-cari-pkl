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
<body style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; margin:0; padding:0; background: #fff;">
  <style>
    @page {
      size: A4;
      margin: 1.5cm;
    }
    body, html {
      font-size: 14px;
      margin: 0;
      padding: 0;
    }
    .no-break {
      page-break-inside: avoid;
    }
    .tight {
      margin: 0;
      padding: 0;
    }
    .kop, .content, .footer, .ttd {
      margin-bottom: 0.7em;
    }
    .kop h2, .kop p {
      margin: 0;
      padding: 0;
    }
    .kop-judul {
      font-size: 22px;
      font-weight: bold;
      letter-spacing: 1px;
      text-transform: uppercase;
    }
    .kop-info {
      font-size: 14px;
    }
    .kop-info-kecil {
      font-size: 13px;
    }
    table, td, th {
      font-size: 14px;
    }
  </style>
  <div class="no-break" style="width:100%; max-width: 700px; margin: 0 auto;">
    <!-- KOP SURAT -->
    <table style="width: 100%; text-align: center; margin-bottom: 4px;">
      <tr>
        <td>
          <span style="font-size:20px; font-weight:bold; letter-spacing:1px; text-transform:uppercase;">{{ $perusahaan->perusahaanProfile->nama_perusahaan }}</span><br>
          <span style="font-size:12px;">{{ $perusahaan->perusahaanProfile->alamat }}</span><br>
          <span style="font-size:12px;">Telp: {{ $perusahaan->perusahaanProfile->telepon }} | Website: {{ $perusahaan->perusahaanProfile->website }}</span>
        </td>
      </tr>
    </table>
    <hr style="border: 2px solid #000; margin-bottom: 18px; margin-top: 2px;">

    <!-- INFORMASI SURAT -->
    <table style="font-size:12px; margin-bottom: 10px;">
      <tr>
        <td style="width: 90px;">Nomor</td><td style="width: 10px;">:</td><td>1</td>
      </tr>
      <tr>
        <td>Lampiran</td><td>:</td><td>-</td>
      </tr>
      <tr>
        <td>Perihal</td><td>:</td><td><b>Pemberitahuan Penerimaan PKL</b></td>
      </tr>
    </table>

    <!-- TUJUAN SURAT -->
    <div style="margin-bottom: 12px; font-size: 12px;">
      Yth. <b>{{ $siswa->name }}</b><br>
      Siswa {{ $siswa->user_profile->sekolah->nama_sekolah }}<br>
      Di Tempat
    </div>

    <!-- ISI SURAT -->
    <div style="font-size: 12px; line-height: 1.7; margin-bottom: 12px; text-align: justify;">
      <p>Dengan hormat,</p>
      <p style="margin-bottom: 8px;">
        Bersama surat ini, kami dari <b>{{ $perusahaan->perusahaanProfile->nama_perusahaan }}</b> menyampaikan bahwa saudara/i telah <b>diterima</b> untuk melaksanakan kegiatan Praktek Kerja Lapangan (PKL) di perusahaan kami melalui lowongan berikut:
      </p>
      <table style="margin-left: 10px; font-size: 12px; margin-bottom: 8px;">
        <tr>
          <td style="width: 110px;">Judul Lowongan</td><td style="width: 10px;">:</td><td>{{ $lowongan->judul_lowongan }}</td>
        </tr>
        <tr>
          <td>Alamat PKL</td><td>:</td><td>{{ $perusahaan->perusahaanProfile->alamat }}</td>
        </tr>
        <tr>
          <td>Jadwal Datang</td><td>:</td><td>{{ Carbon\Carbon::parse($surat->jadwal_kedatangan)->format('d F Y') }}</td>
        </tr>
      </table>
      <p style="margin-bottom: 8px;"><b>Catatan Tambahan:</b><br>{{ $surat->catatan ?? '-' }}</p>
      <p style="margin-bottom: 8px;">
        Diharapkan agar saudara/i dapat hadir sesuai jadwal dan membawa kelengkapan yang diperlukan, serta menjaga sikap profesional selama kegiatan berlangsung.
      </p>
      <p style="margin-bottom: 8px;">
        Demikian surat pemberitahuan ini kami sampaikan. Atas perhatian dan kerjasamanya, kami ucapkan terima kasih.
      </p>
    </div>

    <!-- TANDA TANGAN -->
    <table style="width: 100%; font-size: 12px; margin-top: 24px;">
      <tr>
        <td style="width: 60%;"></td>
        <td style="text-align: left;">
          {{ $perusahaan->perusahaanProfile->nama_perusahaan }}, {{ $surat->created_at->translatedFormat('d F Y') }}<br>
          <span>Hormat Kami,</span>
          <br><br><br>
          <span style="font-weight: bold; text-decoration: underline;">{{ $perusahaan->perusahaanProfile->pemilik }}</span>
        </td>
      </tr>
    </table>
  </div>
</body>
</html>
