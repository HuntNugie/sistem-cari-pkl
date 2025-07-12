<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Pemberitahuan PKL Selesai</title>
</head>
<body style="margin:0; padding:0; background:#f4f6fb; font-family: 'Segoe UI', Arial, sans-serif;">
    <table align="center" cellpadding="0" cellspacing="0" width="100%" style="padding: 40px 0;">
        <tr>
            <td align="center">
                <table width="100%" style="max-width: 480px; background: #fff; border-radius: 16px; box-shadow: 0 4px 24px rgba(44,62,80,0.08); padding: 0 0 32px 0;">
                    <tr>
                        <td style="background: #ef6603; border-radius: 16px 16px 0 0; text-align: center; padding: 32px 0 16px 0;">
                            <img src="https://img.icons8.com/ios-filled/50/ffffff/checked-checkbox.png" alt="Selesai" width="48" height="48" style="margin-bottom: 12px;">
                            <h1 style="color: #fff; margin: 0; font-size: 26px; letter-spacing: 1px;">PKL Telah Selesai</h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 24px 32px 0 32px; text-align: center;">
                            <p style="color: #333; font-size: 17px; margin: 0 0 12px 0;">
                                Selamat <b>{{ $nama }}</b>, masa <b>Praktik Kerja Lapangan (PKL)</b> Anda di <b>{{ $perusahaan }}</b> telah <b>SELESAI</b>.<br>
                                Terima kasih atas dedikasi dan kerja keras Anda selama PKL berlangsung.
                            </p>
                            <table style="margin: 16px auto 18px auto; font-size: 15px; color: #444; text-align: left;">
                                <tr><td><b>Nama Siswa</b></td><td>:</td><td>{{ $nama }}</td></tr>
                                <tr><td><b>Asal Sekolah</b></td><td>:</td><td>{{ $sekolah }}</td></tr>
                                <tr><td><b>Judul PKL</b></td><td>:</td><td>{{ $judul }}</td></tr>
                                <tr><td><b>Perusahaan</b></td><td>:</td><td>{{ $perusahaan }}</td></tr>
                                <tr><td><b>Tanggal Selesai</b></td><td>:</td><td>{{ $tgl_selesai }}</td></tr>
                            </table>
                            <p style="color: #388e3c; font-size: 15px; margin: 18px 0 0 0; font-weight: 500;">
                                Silakan unduh sertifikat PKL Anda melalui portal SICAPE.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center; padding: 32px 0 0 0; font-size: 13px; color: #bbb;">
                            &copy; 2025 SICAPE (Sistem Cari PKL SMK) — Semua hak dilindungi.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>

