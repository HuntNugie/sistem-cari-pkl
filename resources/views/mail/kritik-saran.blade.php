<!DOCTYPE html>
<html>
<head>
    <title>Kritik dan Saran Baru</title>
    <style>
        /* General resets */
        body{
            margin:0;
            padding:0;
            background:#f4f4f4;
            font-family:'Helvetica Neue',Arial,sans-serif;
            color:#333333;
        }
        table{border-collapse:collapse;}
        /* Container */
        .email-wrapper{
            width:100%;
            background:#f4f4f4;
            padding:30px 0;
        }
        .email-content{
            width:600px;
            max-width:90%;
            margin:0 auto;
            background:#ffffff;
            border-radius:8px;
            box-shadow:0 4px 14px rgba(0,0,0,0.12);
            overflow:hidden;
        }
        /* Header */
        .email-header{
            background:#00698f;
            padding:24px;
            text-align:center;
        }
        .email-header h1{
            color:#ffffff;
            font-size:28px;
            margin:0;
            text-transform:uppercase;
            letter-spacing:1px;
        }
        .email-header svg{
            width:48px;
            height:48px;
            margin-bottom:8px;
            fill:#ffffff;
        }
        /* Body table */
        .info-table{
            width:100%;
            border-spacing:0;
        }
        .info-table td{
            padding:12px 20px;
            font-size:15px;
        }
        .info-table td.label{
            background:#f7fafc;
            font-weight:600;
            width:35%;
        }
        .info-table td.value{
            background:#ffffff;
        }
        /* Footer */
        .email-footer{
            text-align:center;
            font-size:12px;
            color:#777777;
            padding:16px;
            background:#fafafa;
        }
        @media only screen and (max-width:620px){
            .email-header h1{font-size:22px;}
            .info-table td{font-size:14px;}
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <table class="email-content" role="presentation" width="600" align="center">
            <tr>
                <td class="email-header">
                    <!-- Icon amplop -->
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M2 4a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4zm2 0v.217l8 5.333 8-5.333V4H4zm16 2.783l-7.382 4.91a2 2 0 0 1-2.236 0L4 6.783V20h16V6.783z"/>
                    </svg>
                    <h1>Kritik &amp; Saran Baru</h1>
                </td>
            </tr>
            <tr>
                <td style="padding:24px;">
                    <p style="margin:0 0 20px 0;font-size:16px;">Anda menerima kritik dan saran baru dengan detail sebagai berikut:</p>
                    <table class="info-table" role="presentation">
                        <tr>
                            <td class="label">Nama Pengirim</td>
                            <td class="value">{{ $nama }}</td>
                        </tr>
                        <tr>
                            <td class="label">Email Pengirim</td>
                            <td class="value">{{ $email }}</td>
                        </tr>
                        <tr>
                            <td class="label">Pesan</td>
                            <td class="value">{{ $pesan }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="email-footer">
                    &copy; {{ date('Y') }} Sistem Informasi PKL. Semua hak dilindungi.
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
