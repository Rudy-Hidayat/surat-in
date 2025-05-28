<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Surat & Preview</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .a4 {
            width: 794px;
            height: 1123px;
        }

        @media print {
            body * {
                visibility: hidden;
            }
            #print-area, #print-area * {
                visibility: visible;
            }
            #print-area {
                position: absolute;
                left: 0;
                top: 0;
            }
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen p-6">

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Form Input -->
    <form id="form" class="space-y-4">
        <div>
            <label class="block font-bold">Tempat & Tanggal</label>
            <input name="tempat_tanggal" id="tempat_tanggal" class="w-full p-2 border rounded"
                   placeholder="Contoh: Banda Aceh, 21 Mei 2025">
        </div>
        <div>
            <label class="block font-bold">Kepada</label>
            <input name="kepada" id="kepada" class="w-full p-2 border rounded"
                   placeholder="Contoh: Dekan Fakultas MIPA">
        </div>
        <div>
            <label class="block font-bold">Nama</label>
            <input name="nama" id="nama" class="w-full p-2 border rounded" placeholder="Nama Lengkap">
        </div>
        <div>
            <label class="block font-bold">NIM / NPM</label>
            <input name="nim" id="nim" class="w-full p-2 border rounded" placeholder="NIM / NPM">
        </div>
        <div>
            <label class="block font-bold">Tempat, Tanggal Lahir</label>
            <input name="ttl" id="ttl" class="w-full p-2 border rounded" placeholder="Banda Aceh, 1 Januari 2000">
        </div>
        <div>
            <label class="block font-bold">Program Studi</label>
            <input name="prodi" id="prodi" class="w-full p-2 border rounded" placeholder="Program Studi">
        </div>
        <div>
            <label class="block font-bold">Fakultas</label>
            <input name="fakultas" id="fakultas" class="w-full p-2 border rounded" placeholder="Fakultas">
        </div>
        <div>
            <label class="block font-bold">Tanggal Lulus</label>
            <input type="date" name="tanggal_lulus" id="tanggal_lulus" class="w-full p-2 border rounded">
        </div>
        <div>
            <label class="block font-bold">Alamat</label>
            <textarea name="alamat" id="alamat" class="w-full p-2 border rounded" rows="2"
                      placeholder="Alamat lengkap"></textarea>
        </div>
        <div>
            <label class="block font-bold">No. HP / WA</label>
            <input name="hp" id="hp" class="w-full p-2 border rounded" placeholder="08xxxxxxxxxx">
        </div>
        <div>
            <label class="block font-bold">TTD</label>
            <input type="text" name="ttd" id="ttd" class="w-full p-2 border rounded"
                   placeholder="Nama penanda tangan">
        </div>
    </form>

    <!-- Preview -->
    <div class="bg-white shadow-md rounded overflow-hidden a4 p-6" id="preview">
        <!-- Header kanan atas -->
        <div class="text-sm mb-6 text-right" id="preview-header-kanan">
            <p id="preview-tempat_tanggal">[Tempat & Tanggal]</p>
            <p><strong>Kepada Yth.</strong></p>
            <p id="preview-kepada">[Kepada]</p>
            <p>Universitas Syiah Kuala</p>
            <p>Darussalam, Banda Aceh</p>
        </div>

        <!-- Metadata Mahasiswa -->
        <div class="text-sm space-y-1 mb-6">
            <p id="preview-nama"><strong>Nama:</strong> [Nama]</p>
            <p id="preview-nim"><strong>NIM/NPM:</strong> [NIM]</p>
            <p id="preview-ttl"><strong>Tempat, Tanggal Lahir:</strong> [TTL]</p>
            <p id="preview-prodi"><strong>Program Studi:</strong> [Prodi]</p>
            <p id="preview-fakultas"><strong>Fakultas:</strong> [Fakultas]</p>
            <p id="preview-tanggal_lulus"><strong>Tanggal Lulus:</strong> [Tanggal Lulus]</p>
            <p id="preview-alamat"><strong>Alamat:</strong> [Alamat]</p>
            <p id="preview-hp"><strong>No. HP / WA:</strong> [No HP]</p>
        </div>

        <div class="text-right mt-32" id="preview-ttd">
            <p class="mb-1">Hormat kami,</p>
            <p class="font-bold">[TTD]</p>
        </div>
    </div>
</div>

<!-- Tombol Generate -->
<div class="mt-6">
    <form method="POST" action="{{ route('surat.generate') }}">
        @csrf
        <input type="hidden" name="tempat_tanggal" id="hidden-tempat_tanggal">
        <input type="hidden" name="kepada" id="hidden-kepada">
        <input type="hidden" name="ttd" id="hidden-ttd">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Generate PDF
        </button>
    </form>
</div>

<script>
    // Form Input Elements
    const tempatTanggal = document.getElementById('tempat_tanggal');
    const kepada = document.getElementById('kepada');
    const nama = document.getElementById('nama');
    const nim = document.getElementById('nim');
    const ttl = document.getElementById('ttl');
    const prodi = document.getElementById('prodi');
    const fakultas = document.getElementById('fakultas');
    const tanggalLulus = document.getElementById('tanggal_lulus');
    const alamat = document.getElementById('alamat');
    const hp = document.getElementById('hp');
    const ttd = document.getElementById('ttd');

    // Hidden Inputs
    const hiddenTempatTanggal = document.getElementById('hidden-tempat_tanggal');
    const hiddenKepada = document.getElementById('hidden-kepada');
    const hiddenTTD = document.getElementById('hidden-ttd');

    // Preview Elements
    const previewTempatTanggal = document.getElementById('preview-tempat_tanggal');
    const previewKepada = document.getElementById('preview-kepada');
    const previewNama = document.getElementById('preview-nama');
    const previewNim = document.getElementById('preview-nim');
    const previewTTL = document.getElementById('preview-ttl');
    const previewProdi = document.getElementById('preview-prodi');
    const previewFakultas = document.getElementById('preview-fakultas');
    const previewTanggalLulus = document.getElementById('preview-tanggal_lulus');
    const previewAlamat = document.getElementById('preview-alamat');
    const previewHP = document.getElementById('preview-hp');
    const previewTTD = document.getElementById('preview-ttd');

    // Event Listeners
    tempatTanggal.addEventListener('input', () => {
        previewTempatTanggal.textContent = tempatTanggal.value || '[Tempat & Tanggal]';
        hiddenTempatTanggal.value = tempatTanggal.value;
    });

    kepada.addEventListener('input', () => {
        previewKepada.textContent = kepada.value || '[Kepada]';
        hiddenKepada.value = kepada.value;
    });

    nama.addEventListener('input', () => {
        previewNama.innerHTML = `<strong>Nama:</strong> ${nama.value || '[Nama]'}`;
    });

    nim.addEventListener('input', () => {
        previewNim.innerHTML = `<strong>NIM/NPM:</strong> ${nim.value || '[NIM]'}`;
    });

    ttl.addEventListener('input', () => {
        previewTTL.innerHTML = `<strong>Tempat, Tanggal Lahir:</strong> ${ttl.value || '[TTL]'}`;
    });

    prodi.addEventListener('input', () => {
        previewProdi.innerHTML = `<strong>Program Studi:</strong> ${prodi.value || '[Prodi]'}`;
    });

    fakultas.addEventListener('input', () => {
        previewFakultas.innerHTML = `<strong>Fakultas:</strong> ${fakultas.value || '[Fakultas]'}`;
    });

    tanggalLulus.addEventListener('input', () => {
        previewTanggalLulus.innerHTML = `<strong>Tanggal Lulus:</strong> ${tanggalLulus.value || '[Tanggal Lulus]'}`;
    });

    alamat.addEventListener('input', () => {
        previewAlamat.innerHTML = `<strong>Alamat:</strong> ${alamat.value || '[Alamat]'}`;
    });

    hp.addEventListener('input', () => {
        previewHP.innerHTML = `<strong>No. HP / WA:</strong> ${hp.value || '[No HP]'}`;
    });

    ttd.addEventListener('input', () => {
        previewTTD.innerHTML = `<p class="mb-1">Hormat kami,</p><p class="font-bold">${ttd.value || '[TTD]'}</p>`;
        hiddenTTD.value = ttd.value;
    });
</script>
</body>
</html>
