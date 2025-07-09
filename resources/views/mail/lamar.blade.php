<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Lamaran PKL Baru</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f5f6fa;
      margin: 0;
      padding: 0;
    }

    .email-wrapper {
      max-width: 600px;
      margin: 30px auto;
      background-color: #ffffff;
      border-radius: 8px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.05);
      overflow: hidden;
    }

    .email-header {
      background-color: #1f2937;
      padding: 20px 30px;
      color: #ffffff;
      text-align: center;
    }

    .email-header h2 {
      margin: 0;
      font-size: 20px;
    }

    .email-body {
      padding: 30px;
      color: #374151;
    }

    .email-body p {
      font-size: 16px;
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 15px;
    }

    th, td {
      padding: 12px 15px;
      text-align: left;
      border-bottom: 1px solid #e5e7eb;
    }

    th {
      background-color: #f3f4f6;
      color: #111827;
    }

    .email-footer {
      background-color: #f9fafb;
      padding: 20px;
      text-align: center;
      font-size: 12px;
      color: #6b7280;
    }
  </style>
</head>
<body>

  <div class="email-wrapper">
    <div class="email-header">
      <h2>📩 Lamaran PKL Baru</h2>
    </div>

    <div class="email-body">
      <p>Halo,</p>
      <p>Berikut ini adalah detail siswa yang baru saja melamar untuk posisi PKL di perusahaan Anda:</p>

      <table>
        <tr>
          <th>Nama Siswa</th>
          <td>{{ $namaSiswa }}</td>
        </tr>
        <tr>
          <th>Jenis Kelamin</th>
          <td>{{ $jk }}</td>
        </tr>
        <tr>
          <th>Asal Sekolah</th>
          <td>{{ $asalSekolah}} </td>
        </tr>
        <tr>
          <th>Lowongan Dilamar</th>
          <td>{{ $judul }}</td>
        </tr>
      </table>

      <p>Silakan login ke dashboard Anda untuk meninjau dan memproses lamaran tersebut.</p>
    </div>

    <div class="email-footer">
      &copy; {{ date('Y') }} Sistem PKL SMK. Semua hak dilindungi.
    </div>
  </div>

</body>
</html>
