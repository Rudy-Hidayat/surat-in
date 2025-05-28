<!DOCTYPE html>
<html lang="id">
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
        .identitas {
            font-size: 14px;
            margin-bottom: 40px;
        }
        .identitas p {
            margin: 4px 0;
        }
        .ttd {
            text-align: right;
            margin-top: 150px;
            font-size: 14px;
        }
        .ttd p {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="tanggal">{{ $tempat_tanggal }}</div>
    <div class="kepada">Kepada: {{ $kepada }}</div>

    <div class="identitas">
        <p><strong>Nama:</strong> {{ $nama }}</p>
        <p><strong>NIM / NPM:</strong> {{ $nim }}</p>
        <p><strong>Tempat, Tanggal Lahir:</strong> {{ $ttl }}</p>
        <p><strong>Program Studi:</strong> {{ $prodi }}</p>
        <p><strong>Fakultas:</strong> {{ $fakultas }}</p>
        <p><strong>Tanggal Lulus:</strong> {{ $tanggal_lulus }}</p>
        <p><strong>Alamat:</strong> {{ $alamat }}</p>
        <p><strong>No. HP / WA:</strong> {{ $no_hp }}</p>
    </div>

    <div class="ttd">
        <p>Hormat kami,</p>
        <p style="font-weight: bold;">{{ $ttd }}</p>
    </div>
</body>
</html>
