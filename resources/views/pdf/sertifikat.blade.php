<html>
<head>
    <title>Sertifikat PKL</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background: linear-gradient(135deg, #f8fafc 60%, #ececec 100%);
            margin: 0;
            padding: 0;
        }
        .certificate-container {
            width: 1000px;
            height: 700px;
            border: 10px solid #ef6603;
            box-shadow: 0 8px 32px #2a2c3930, 0 0 0 8px #2a2c39 inset;
            padding: 40px 60px;
            margin: 30px auto;
            background: linear-gradient(120deg, #fff 80%, #ececec 100%);
            box-sizing: border-box;
            position: relative;
        }
        .certificate-border {
            border: 6px double #2a2c39;
            height: 100%;
            width: 100%;
            padding: 30px 40px;
            box-sizing: border-box;
            position: absolute;
            left: 0;
            top: 0;
            z-index: 0;
        }
        .certificate-content {
            position: relative;
            z-index: 1;
            text-align: center;
        }
        .certificate-title {
            font-size: 2.5em;
            font-weight: bold;
            color: #ef6603;
            margin-bottom: 10px;
            letter-spacing: 2px;
            text-shadow: 1px 2px 0 #fff, 0 2px 12px #2a2c3940;
        }
        .certificate-subtitle {
            font-size: 1.2em;
            color: #2a2c39;
            margin-bottom: 16px;
            font-weight: 500;
        }
        .certificate-name {
            font-size: 2em;
            font-weight: bold;
            color: #fff;
            margin: 14px 0 8px 0;
            text-transform: uppercase;
            background: linear-gradient(90deg,#ef6603 0%, #2a2c39 100%);
            border-radius:14px;
            padding:12px 0 12px 0;
            box-shadow:0 2px 18px #ef660340, 0 1px 0 #fff inset;
            display:inline-block;
            width:62%;
        }
        .certificate-body {
            font-size: 1.1em;
            margin-bottom: 38px;
            color: #2a2c39;
        }
        .certificate-footer {
            margin-top: 36px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            padding: 0 60px;
            border-top: 2px solid #2a2c39;
            padding-top: 18px;
        }
        .certificate-signature {
            text-align: center;
            color: #2a2c39;
        }
        .certificate-signature img {
            width: 120px;
            margin-bottom: 0;
        }
        .certificate-date {
            font-size: 1em;
            color: #ef6603;
            text-align: right;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="certificate-container">
        <!-- Ornamen diagonal kanan atas -->
        <svg style="position:absolute;top:-40px;right:-60px;z-index:1;" width="380" height="120">
            <polygon points="0,0 380,0 320,120 0,70" fill="#ef6603" opacity="0.18"/>
            <polygon points="40,0 340,0 280,90 40,50" fill="#2a2c39" opacity="0.12"/>
        </svg>
        <!-- Ornamen diagonal kiri bawah -->
        <svg style="position:absolute;bottom:-40px;left:-60px;z-index:1;" width="380" height="120">
            <polygon points="0,120 380,120 320,0 0,50" fill="#ef6603" opacity="0.18"/>
            <polygon points="40,120 340,120 280,30 40,70" fill="#2a2c39" opacity="0.12"/>
        </svg>
        <!-- Watermark logo Sicape tengah -->
        <div style="position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);opacity:0.10;z-index:0;">
            <img src='{{ asset('Logo hitam.png') }}' style="width:320px;filter:grayscale(100%) blur(0.5px);opacity:0.7;" alt="Watermark Sicape" />
        </div>
        <div class="certificate-border" style="border: 6px double #e0c36e; position:absolute; inset:0; pointer-events:none; z-index:2; border-radius:22px;">
    <!-- Lengkungan sudut atas kiri -->
    <svg width="60" height="60" style="position:absolute;top:-3px;left:-3px;">
      <path d="M58,2 Q2,2 2,58" fill="none" stroke="#ef6603" stroke-width="4"/>
      <path d="M56,8 Q8,8 8,56" fill="none" stroke="#2a2c39" stroke-width="2"/>
    </svg>
    <!-- Lengkungan sudut atas kanan -->
    <svg width="60" height="60" style="position:absolute;top:-3px;right:-3px;">
      <path d="M2,2 Q58,2 58,58" fill="none" stroke="#ef6603" stroke-width="4"/>
      <path d="M4,8 Q52,8 52,56" fill="none" stroke="#2a2c39" stroke-width="2"/>
    </svg>
    <!-- Lengkungan sudut bawah kiri -->
    <svg width="60" height="60" style="position:absolute;bottom:-3px;left:-3px;">
      <path d="M58,58 Q2,58 2,2" fill="none" stroke="#ef6603" stroke-width="4"/>
      <path d="M56,52 Q8,52 8,4" fill="none" stroke="#2a2c39" stroke-width="2"/>
    </svg>
    <!-- Lengkungan sudut bawah kanan -->
    <svg width="60" height="60" style="position:absolute;bottom:-3px;right:-3px;">
      <path d="M2,58 Q58,58 58,2" fill="none" stroke="#ef6603" stroke-width="4"/>
      <path d="M4,52 Q52,52 52,4" fill="none" stroke="#2a2c39" stroke-width="2"/>
    </svg>
</div>
        <div class="certificate-content">
            <!-- Logo sicape -->
            <div style="margin-bottom:16px;">
                <img src="{{ asset('Logo hitam.png') }}" alt="Logo Sicape" style="width:220px;height:auto;object-fit:contain;display:block;margin:0 auto 24px auto;box-shadow:0 2px 12px #e0c36e30;border-radius:12px;" />
            </div>
            <div class="certificate-title" style="letter-spacing:3px;">SERTIFIKAT PENGHARGAAN</div>
            <div class="certificate-subtitle" style="margin-bottom:0;">Diberikan kepada</div>
            <div class="certificate-name" style="
    background: linear-gradient(90deg, #fff 0%, #ef6603 100%);
    border-radius: 14px;
    padding: 12px 0;
    box-shadow: 0 2px 18px #ef660340, 0 1px 0 #fff inset;
    display: inline-block;
    width: 62%;
    margin-bottom: 4px;
    margin-top: 4px;
    color: #2a2c39;
    font-weight: bold;
    font-size: 2em;
    text-transform: uppercase;
    text-shadow: 0 2px 8px #fff, 0 1px 0 #ef660340;
">
    Budi Santoso
</div>
<!-- Judul PKL siswa -->
<div style="font-size:1.2em;font-weight:600;color:#ef6603;margin:8px 0 8px 0;letter-spacing:1px;text-transform:capitalize;">
    Front End Developer
</div>
            <div style="font-size:1.1em;margin-bottom:18px;color:#0a3d62;font-weight:500;letter-spacing:1px;">
                Asal Sekolah: <span style="font-weight:bold;">SMK Negeri 1 Bandung</span>
            </div>
            <div class="certificate-body" style="margin-bottom:38px;">
                Sebagai bentuk apresiasi atas partisipasi aktif dan dedikasi yang luar biasa<br>
                dalam menyelesaikan <b>Praktik Kerja Lapangan (PKL)</b> di<br>
                <b>PT. Maju Jaya Abadi</b>.
            </div>
            <div class="certificate-footer" style="margin-top:0px;padding-bottom:0;">
                <div class="certificate-date" style="font-style:italic;">
                    Bandung, 12 Juli 2025
                </div>
                <div class="certificate-signature">
                    <span style="display:block;font-weight:bold;margin-top:16px;">Ir. Siti Aminah, M.T.</span>
                    <span>Owner Perusahaan</span>
                </div>
            </div>
            <div style="margin-top: 8px; text-align: center; color: #b8a14f; font-size: 1em; letter-spacing: 1px; font-weight:bold;">
                Diterbitkan oleh <span style="color:#0a3d62">sicape</span> (sistem cari pkl)
            </div>
        </div>
    </div>
</body>
</html>
