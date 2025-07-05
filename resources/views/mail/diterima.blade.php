<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Pemberitahuan Penerimaan Ajuan Konfirmasi Perusahaan</title>
</head>
<body style="margin:0; padding:0; background:#f4f6fb; font-family: 'Segoe UI', Arial, sans-serif;">
    <table align="center" cellpadding="0" cellspacing="0" width="100%" style="padding: 40px 0;">
        <tr>
            <td align="center">
                <table width="100%" style="max-width: 480px; background: #fff; border-radius: 16px; box-shadow: 0 4px 24px rgba(44,62,80,0.08); padding: 0 0 32px 0;">
                    <tr>
                        <td style="background: #388e3c; border-radius: 16px 16px 0 0; text-align: center; padding: 32px 0 16px 0;">
                            <img src="https://img.icons8.com/ios-filled/50/ffffff/ok.png" alt="Diterima" width="48" height="48" style="margin-bottom: 12px;">
                            <h1 style="color: #fff; margin: 0; font-size: 26px; letter-spacing: 1px;">Ajuan Diterima</h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 24px 32px 0 32px; text-align: center;">
                            <p style="color: #333; font-size: 17px; margin: 0 0 12px 0;">
                                Selamat kepada perusahaan {{ $nama }}, ajuan konfirmasi perusahaan Anda <b>telah kami terima</b> dan disetujui.
                            </p>
                            <p style="color: #666; font-size: 15px; margin: 0 0 18px 0;">
                               Anda sudah dapat bisa membuat lowongan pkl di halaman website anda.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 0 32px;">
                            <div style="background: #e8f5e9; border-left: 4px solid #388e3c; border-radius: 6px; padding: 16px 18px; margin: 0 0 18px 0;">
                                <strong style="color: #388e3c;">Catatan:</strong>
                                <div style="margin-top: 6px; color: #444; font-size: 15px;">
                                    {{ $alasan ?? 'Tidak ada catatan tambahan.' }}
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 0 32px;">
                            <a href="mailto:support@sicape.com" style="display: inline-block; margin-top: 8px; background: #388e3c; color: #fff; text-decoration: none; font-size: 15px; font-weight: 500; border-radius: 6px; padding: 10px 28px;">
                                Hubungi Support
                            </a>
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
