<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PDF</title>
    <style>
        body {
            font-family: sans-serif;
            width: 794px; /* A4 width in px at 96dpi */
            height: 1123px; /* A4 height in px at 96dpi */
            padding: 40px;
            box-sizing: border-box;
        }
        .tanggal {
            text-align: right;
            font-size: 14px;
            margin-bottom: 20px;
        }
        .kepada {
            font-size: 14px;
            margin-bottom: 30px;
        }
        .judul {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .isi {
            text-align: justify;
            margin-bottom: 60px;
            font-size: 16px;
        }
        .ttd {
            text-align: right;
            margin-top: 150px;
            font-size: 16px;
        }
        .ttd p {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="tanggal">{{ $tempat_tanggal }}</div>
    <div class="kepada">Kepada: {{ $kepada }}</div>
    <div class="judul">{{ $judul }}</div>
    <div class="isi">{{ $isi }}</div>
    <div class="ttd">
        <p>Hormat kami,</p>
        <p style="font-weight: bold;">{{ $ttd }}</p>
    </div>
</body>
</html>
