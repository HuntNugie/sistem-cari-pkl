<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Riwayat Siswa PKL</title>
    <style>
        @page {
            size: A4;
            margin: 1.5cm;
        }
        body {
            font-family: 'Helvetica', Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }
        .kop {
            text-align: center;
            margin-bottom: 1rem;
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
            border-bottom: 2.5px solid #333;
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
            border: 1px solid #333;
            padding: 8px;
            font-size: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            text-align: center;
            font-weight: bold;
        }
        .ttd {
            margin-top: 40px;
            width: 100%;
        }
        .ttd-block {
            width: 40%;
            float: right;
            text-align: center;
        }
        .ttd-block p {
            margin-bottom: 60px;
        }
    </style>
</head>
<body>
    <div class="kop">
        <h2>{{ Str::upper($perusahaan->perusahaanProfile->nama_perusahaan ?? 'Nama Perusahaan') }}</h2>
        <p>{{ $perusahaan->perusahaanProfile->alamat ?? 'Alamat Perusahaan' }}</p>
        <p>Telp: {{ $perusahaan->perusahaanProfile->telepon ?? '-' }} | Email: {{ $perusahaan->email ?? '-' }}</p>
        <div class="line"></div>
    </div>

    <div class="judul">Laporan Riwayat Siswa PKL</div>
    
    <p>Berikut adalah daftar riwayat siswa yang telah menyelesaikan program Praktik Kerja Lapangan (PKL) di <strong>{{ $perusahaan->perusahaanProfile->nama_perusahaan ?? 'Nama Perusahaan' }}</strong>.</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Asal Sekolah</th>
                <th>No. Telepon</th>
                <th>Periode PKL</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($riwayats as $index => $riwayat)
            <tr>
                <td style="text-align: center;">{{ $index + 1 }}</td>
                <td>{{ $riwayat->siswa->name ?? '-' }}</td>
                <td>{{ $riwayat->siswa->user_profile->sekolah->nama_sekolah ?? '-' }}</td>
                <td>{{ $riwayat->siswa->user_profile->telepon ?? '-' }}</td>
                <td style="text-align: center;">
                    {{ \Carbon\Carbon::parse($riwayat->suratDiterima->created_at)->format('d M Y') }} - 
                    {{ \Carbon\Carbon::parse($riwayat->updated_at)->format('d M Y') }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center;">Tidak ada data riwayat siswa.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <p>Demikian laporan ini dibuat sebagai arsip dan untuk dipergunakan sebagaimana mestinya. Atas perhatiannya, kami ucapkan terima kasih.</p>

    <div class="ttd">
        <div class="ttd-block">
            <span>Ditempat, {{ now()->translatedFormat('d F Y') }}</span>
            <p>Pimpinan Perusahaan,</p>
            <span style="font-weight:bold; text-decoration:underline;">{{ $perusahaan->perusahaanProfile->pemilik ?? 'Nama Pimpinan' }}</span>
        </div>
    </div>

</body>
</html>
