<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Kode OTP</title>
  </head>
  <body style="margin:0; padding:0; background-color:#2f3041; font-family: Arial, sans-serif;">
    <table align="center" cellpadding="0" cellspacing="0" width="100%" style="padding: 40px 0;">
      <tr>
        <td align="center">
          <table width="100%" style="max-width: 600px; background-color: #ffffff; border-radius: 10px; padding: 30px;">
            <tr>
              <td style="text-align: center; padding-bottom: 20px;">
                <h2 style="color: #2f3041; margin: 0;">Verifikasi Email Anda</h2>
                <p style="color: #555; font-size: 16px; margin-top: 10px;">
                  Terima kasih telah menggunakan layanan kami. Silakan gunakan kode OTP di bawah ini untuk melanjutkan proses verifikasi:
                </p>
              </td>
            </tr>
            <tr>
              <td style="text-align: center; padding: 20px 0;">
                <div style="display: inline-block; padding: 15px 30px; background-color: #ff6600; color: #fff; font-size: 24px; font-weight: bold; border-radius: 8px; letter-spacing: 4px;">
                  {{ $otp }}
                </div>
              </td>
            </tr>
            <tr>
              <td style="text-align: center; padding-top: 10px;">
                <p style="color: #888; font-size: 14px;">
                  Kode ini berlaku selama 5 menit. Jangan berikan kode ini kepada siapa pun.
                </p>
              </td>
            </tr>
            <tr>
              <td style="text-align: center; padding-top: 30px; font-size: 13px; color: #999;">
                &copy; 2025 SICAPE (Sistem Cari PKL SMK) — Semua hak dilindungi.
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
</html>
