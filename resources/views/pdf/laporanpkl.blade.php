<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Siswa PKL</title>
    <style>
        @page {
            size: A4;
            margin: 1.5cm;
        }
        body {
            font-family: DejaVu Sans, Arial, Helvetica, sans-serif;
            font-size: 12px;
            color: #222;
        }
        .kop {
            text-align: center;
            margin-bottom: 16px;
        }
        .kop h2 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
        }
        .kop p {
            margin: 0;
            font-size: 12px;
        }
        .line {
            border-bottom: 2.5px solid #222;
            margin: 8px 0 20px 0;
        }
        .judul {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 20px;
            text-transform: uppercase;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 24px;
        }
        th, td {
            border: 1px solid #222;
            padding: 6px 8px;
            font-size: 12px;
        }
        th {
            background: #f3f3f3;
            text-align: center;
        }
        .ttd {
            margin-top: 44px;
            width: 100%;
            display: flex;
            justify-content: flex-end;
        }
        .ttd-block {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="kop">
        <h2>{{ $perusahaan->perusahaanProfile->nama_perusahaan ?? '-' }}</h2>
        <p>{{ $perusahaan->perusahaanProfile->alamat ?? '-' }}</p>
        <p>Telp: {{ $perusahaan->perusahaanProfile->telepon ?? '-' }} | Email: {{ $perusahaan->email ?? '-' }}</p>
        <div class="line"></div>
    </div>
    <div class="judul">Laporan Siswa Praktik Kerja Lapangan (PKL)</div>
    <p>Berikut adalah daftar siswa yang sedang melaksanakan Praktik Kerja Lapangan (PKL) di {{ $perusahaan->perusahaanProfile->nama_perusahaan ?? '-' }}:</p>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIS</th>
                <th>Sekolah</th>
                <th>Jurusan</th>
                <th>Judul jurusan PKL</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($siswas as $i => $siswa)
            <tr>
                <td style="text-align:center">{{ $i+1 }}</td>
                <td>{{ $siswa->siswa->name }}</td>
                <td>{{ $siswa->siswa->user_profile->nis ?? '-' }}</td>
                <td>{{ $siswa->siswa->user_profile->sekolah->nama_sekolah ?? '-' }}</td>
                <td>{{ $siswa->siswa->user_profile->jurusan->nama_jurusan ?? '-' }}</td>
                <td>{{ $siswa->lowongan->judul_lowongan ?? '-' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="8" style="text-align:center">Tidak ada siswa PKL saat ini.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <p>Demikian laporan ini dibuat untuk digunakan sebagaimana mestinya. Atas perhatian dan kerjasamanya, kami ucapkan terima kasih.</p>
    <div class="ttd">
        <div class="ttd-block">
            <p>{{ $perusahaan->perusahaanProfile->kota ?? '-' }}, {{ now()->format("d F Y") }}</p>
            <p style="margin-bottom:60px;">Pimpinan Perusahaan</p>
            <p style="font-weight:bold; text-decoration:underline;">{{ $perusahaan->perusahaanProfile->nama_pimpinan ?? '-' }}</p>
        </div>
    </div>
</body>
</html>

