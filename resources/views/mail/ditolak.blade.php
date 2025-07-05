<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Pemberitahuan Penolakan Ajuan Konfirmasi Perusahaan</title>
</head>
<body style="margin:0; padding:0; background:#f4f6fb; font-family: 'Segoe UI', Arial, sans-serif;">
    <table align="center" cellpadding="0" cellspacing="0" width="100%" style="padding: 40px 0;">
        <tr>
            <td align="center">
                <table width="100%" style="max-width: 480px; background: #fff; border-radius: 16px; box-shadow: 0 4px 24px rgba(44,62,80,0.08); padding: 0 0 32px 0;">
                    <tr>
                        <td style="background: #d32f2f; border-radius: 16px 16px 0 0; text-align: center; padding: 32px 0 16px 0;">
                            <img src="https://img.icons8.com/ios-filled/50/ffffff/cancel.png" alt="Ditolak" width="48" height="48" style="margin-bottom: 12px;">
                            <h1 style="color: #fff; margin: 0; font-size: 26px; letter-spacing: 1px;">Ajuan Ditolak</h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 24px 32px 0 32px; text-align: center;">
                            <p style="color: #333; font-size: 17px; margin: 0 0 12px 0;">
                                Maaf kepada perusahaan {{ $nama }}, ajuan konfirmasi perusahaan Anda <b>tidak dapat kami terima</b> saat ini.
                            </p>
                            <p style="color: #666; font-size: 15px; margin: 0 0 18px 0;">
                                Silakan cek kembali data dan dokumen yang Anda ajukan. Jika butuh bantuan, hubungi tim support kami.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 0 32px;">
                            <div style="background: #fff3f2; border-left: 4px solid #d32f2f; border-radius: 6px; padding: 16px 18px; margin: 0 0 18px 0;">
                                <strong style="color: #d32f2f;">Alasan Penolakan:</strong>
                                <div style="margin-top: 6px; color: #444; font-size: 15px;">
                                    {{ $alasan ?? 'Tidak ada alasan yang diberikan.' }}
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 0 32px;">
                            <a href="mailto:support@sicape.com" style="display: inline-block; margin-top: 8px; background: #d32f2f; color: #fff; text-decoration: none; font-size: 15px; font-weight: 500; border-radius: 6px; padding: 10px 28px;">
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
