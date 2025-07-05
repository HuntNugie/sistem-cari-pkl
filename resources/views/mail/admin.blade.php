<div style="font-family: 'Segoe UI', Arial, sans-serif; max-width: 540px; margin: 40px auto; background: #f9fafb; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.09); padding: 36px;">
    <div style="text-align: center; margin-bottom: 28px;">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Business Notification" width="64" style="margin-bottom: 14px;">
        <h2 style="color: #2563eb; font-size: 1.7rem; margin: 0; font-weight: 700; letter-spacing: 1px; background: #e0e7ff; border-radius: 8px; padding: 10px 0;">
            Pengajuan Konfirmasi Perusahaan
        </h2>
    </div>
    <p style="color: #374151; font-size: 1.05rem; margin-bottom: 24px;">
        Halo <strong style="color:#2563eb;">Admin</strong>,<br>
        Ada perusahaan yang mengajukan konfirmasi dan menunggu verifikasi Anda.
    </p>
    <table style="border-collapse: collapse; width: 100%; background: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 1px 4px rgba(37,99,235,0.07);">
        <tr style="background: #f1f5f9;">
            <td style="padding: 13px 18px; border-bottom: 1px solid #e5e7eb; color: #64748b; width: 40%;">Tanggal Pengajuan</td>
            <td style="padding: 13px 18px; border-bottom: 1px solid #e5e7eb; color: #334155;">{{ $tanggal }}</td>
        </tr>
        <tr>
            <td style="padding: 13px 18px; border-bottom: 1px solid #e5e7eb; color: #64748b;">Nama Perusahaan</td>
            <td style="padding: 13px 18px; border-bottom: 1px solid #e5e7eb; color: #334155;">{{ $nama }}</td>
        </tr>
        <tr style="background: #f1f5f9;">
            <td style="padding: 13px 18px; border-bottom: 1px solid #e5e7eb; color: #64748b;">Nama Pemilik</td>
            <td style="padding: 13px 18px; border-bottom: 1px solid #e5e7eb; color: #334155;">{{ $pemilik }}</td>
        </tr>
        <tr>
            <td style="padding: 13px 18px; color: #64748b;">Email Perusahaan</td>
            <td style="padding: 13px 18px; color: #334155;">{{ $email }}</td>
        </tr>
    </table>
    <div style="margin-top: 32px; text-align: center;">
        <p style="color: #2563eb; font-size: 1rem; background: #e0e7ff; border-radius: 8px; padding: 16px 0; font-weight: 500; margin-top: 18px;">
            Silakan cek dan verifikasi data perusahaan melalui sistem admin.<br>
            Terima kasih atas perhatian dan kerjasamanya.
        </p>
    </div>
</div>
