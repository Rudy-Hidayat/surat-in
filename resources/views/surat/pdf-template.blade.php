<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Surat Keterangan</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      width: 794px; /* A4 width @96dpi */
      height: 1123px;
      padding: 40px;
      box-sizing: border-box;
      font-size: 0.875rem; /* text-sm */
      line-height: 1.75rem; /* leading-relaxed */
    }

    .header {
      text-align: center;
      margin-bottom: 1.5rem; /* mb-6 */
    }

    .tanggal {
      text-align: right;
      margin-bottom: 1.25rem; /* mb-5 */
    }

    .kepada {
      margin-bottom: 1.5rem; /* mb-6 */
    }

    .section-title {
      font-weight: 700; /* font-bold */
      margin-bottom: 0.625rem; /* mb-2.5 */
      text-decoration: underline;
    }

    .identitas {
      margin-bottom: 1.5rem; /* mb-6 */
    }

    .identitas p {
      margin: 0.375rem 0; /* my-1.5 */
    }

    .persyaratan {
      margin-bottom: 1.5rem; /* mb-6 */
    }

    .persyaratan p {
      margin-bottom: 0.5rem; /* mb-2 */
    }

    .persyaratan ol {
      list-style-type: decimal;
      padding-left: 1.25rem; /* list-inside */
      margin-bottom: 1rem; /* mb-4 */
    }

    .persyaratan ol li {
      margin-bottom: 0.25rem; /* space-y-1 */
    }

    .ttd {
      margin-top: 6rem; /* mt-24 */
      text-align: right;
    }

    .ttd p {
      margin: 0.25rem 0; /* my-1 */
    }

    /* Tambahan gaya umum agar semua p nyaman dibaca */
    p {
      margin-bottom: 1rem;
    }
  </style>
</head>
<body>

  <div class="tanggal">{{ $tempat_tanggal }}</div>

  <div class="kepada">
    <p>Kepada Yth:</p>
    <p>{{ $kepada }}</p>
  </div>

  <div class="section-title">IDENTITAS PEMOHON</div>
  <div class="identitas">
    <p><strong>Nama:</strong> {{ $nama }}</p>
    <p><strong>NIM / NPM:</strong> {{ $nim }}</p>
    <p><strong>Tempat, Tanggal Lahir:</strong> {{ $ttl }}</p>
    <p><strong>Program Studi:</strong> {{ $prodi }}</p>
    <p><strong>Fakultas:</strong> {{ $fakultas }}</p>
    <p><strong>Tanggal Lulus:</strong> {{ $tanggal_lulus }}</p>
    <p><strong>Alamat:</strong> {{ $alamat }}</p>
    <p><strong>No. HP / WA:</strong> {{ $hp }}</p>
  </div>

  <div class="persyaratan">
    <p>
      Dengan ini mengajukan permohonan penerbitan <strong>Surat Keterangan Pengganti Ijazah/Transkrip Akademik</strong> dikarenakan
      <em>&lt;&lt;sebutkan/uraikan sebab pengajuan ijazah/transkrip pengganti&gt;&gt;</em>.
    </p>
    <p>Untuk kelengkapan administrasi, turut saya lampirkan:</p>
    <ol>
      <li>Surat keterangan kehilangan dari Polsek/Polres (asli)</li>
      <li>Fotocopy Ijazah Magister/Sarjana/Diploma*) 1 (satu) lembar</li>
      <li>Fotocopy Transkrip Akademik Magister/Sarjana/Diploma*) 1 (satu) lembar</li>
      <li>Fotocopy Kartu Tanda Penduduk (KTP)</li>
      <li>Pas Photo, latar merah ukuran 4x5 (.jpg)</li>
    </ol>
    <p>
      Demikianlah surat permohonan ini saya ajukan, atas perhatian dan pertimbangannya saya ucapkan terima kasih.
    </p>
  </div>

  <div class="ttd">
    <p>Hormat kami,</p>
    <br><br>
    <p><strong>{{ $ttd }}</strong></p>
  </div>

</body>
</html>
