<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        @page {
            size: A4 landscape;
            margin: 0;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: "Times New Roman", serif;
        }

        .certificate {
            width: 100%;
            height: 100%;
            padding: 24px 36px;
            box-sizing: border-box;
            border: 8px solid #ef6603;
            position: relative;
        }

        .inner-border {
            border: 5px double #2a2c39;
            height: 100%;
            width: 100%;
            padding: 20px 30px;
            box-sizing: border-box;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 140px;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        .title {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            color: #ef6603;
            margin-bottom: 10px;
            letter-spacing: 1px;
        }

        .subtitle {
            text-align: center;
            font-size: 16px;
            margin-bottom: 16px;
        }

        .name {
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 6px;
            color: #2a2c39;
        }

        .position {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            color: #ef6603;
            margin-bottom: 6px;
        }

        .school {
            text-align: center;
            font-size: 15px;
            margin-bottom: 18px;
            color: #0a3d62;
        }

        .body-text {
            text-align: center;
            font-size: 15px;
            line-height: 1.6;
            margin-bottom: 26px;
        }

        .footer {
            border-top: 1px solid #2a2c39;
            padding-top: 10px;
            font-size: 14px;
            display: flex;
            justify-content: space-between;
        }

        .footer-left {
            color: #ef6603;
            font-style: italic;
            font-weight: bold;
        }

        .footer-right {
            text-align: right;
        }

        .footer-right b {
            display: block;
            margin-bottom: 4px;
        }

        .issued {
            text-align: center;
            font-size: 13px;
            margin-top: 26px;
            color: #b88f00;
            font-weight: bold;
        }

        .issued span {
            color: #0a3d62;
        }
    </style>
</head>
<!DOCTYPE html>
<html>
<head>
    <style>
        @page { size: A4 landscape; margin: 0cm; }
        body { margin:0; padding:0; width: 100%; height: 100%; }
        table { border-collapse: collapse; }
    </style>
</head>
<body>
    <div style="border: 10px solid #ef6603; padding: 10px;">
    <div style="border: 3px solid #2a2c39; padding: 42px 50px; text-align: center;">
        <div>
            <img src="{{ public_path('Logo hitam.png') }}" alt="Logo Sicape" width="240" style="margin-bottom: 10px;">
            <div style="font-size:2.3em;font-weight:bold;color:#ef6603;margin-bottom:25px;letter-spacing:1px;">SERTIFIKAT PENGHARGAAN</div>
            <div style="font-size:1.2em;margin-bottom:25px;">Diberikan kepada</div>
            <div style="font-size:1.6em;font-weight:bold;margin-bottom:8px;color:#2a2c39;text-transform:uppercase;">
                {{ strtoupper($siswa->name) }}
            </div>
            <div style="font-size:1.3em;font-weight:bold;color:#ef6603;margin-bottom:8px;">
                {{ ucwords($lamaran->lowongan->judul_lowongan) }}
            </div>
            <div style="font-size:1.1em;color:#0a3d62;margin-bottom:30px;">
                Asal Sekolah: <b>{{ $siswa->user_profile->sekolah->nama_sekolah }}</b>
            </div>
            <div style="font-size:1.1em;line-height:1.6;margin: 0 auto 90px; max-width: 85%; color:#222;">
                Sebagai bentuk apresiasi atas partisipasi aktif dan dedikasi yang luar biasa
                dalam menyelesaikan <b>Praktik Kerja Lapangan (PKL)</b> di
                <b>{{ Str::upper($lamaran->lowongan->perusahaan->perusahaanProfile->nama_perusahaan) }}</b>.
            </div>
        </div>

        <div style="width: 250px; margin: 0 auto 20px; text-align: center; color: #2a2c39;">
            <div style="padding-bottom: 5px; border-bottom: 1px solid #555; margin-bottom: 5px;">
                <b>{{ $lamaran->lowongan->perusahaan->perusahaanProfile->pemilik }}</b>
            </div>
            <div>Pemilik Perusahaan</div>
        </div>

        <div style="text-align: center; color: #ef6603; font-style: italic; font-weight: bold; margin-bottom: 25px;">
            {{ $lamaran->updated_at->format('d F Y') }}
        </div>

        <div style="text-align:center;font-size:1.1em;color:#b88f00;font-weight:bold;">
            Diterbitkan oleh <span style="color:#0a3d62">sicape</span> (sistem cari pkl)
        </div>
    </div>
</div>
</body>
</html>

</html>
