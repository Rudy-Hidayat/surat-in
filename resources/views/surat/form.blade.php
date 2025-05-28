<!DOCTYPE html>
<html lang="id">
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
        <div><label class="block font-bold">Tempat & Tanggal</label>
            <input name="tempat_tanggal" id="tempat_tanggal" class="w-full p-2 border rounded" placeholder="Contoh: Banda Aceh, 21 Mei 2025">
        </div>
        <div><label class="block font-bold">Kepada</label>
            <input name="kepada" id="kepada" class="w-full p-2 border rounded" placeholder="Contoh: Dekan Fakultas MIPA">
        </div>
        <div><label class="block font-bold">Nama</label>
            <input name="nama" id="nama" class="w-full p-2 border rounded" placeholder="Nama Lengkap">
        </div>
        <div><label class="block font-bold">NIM / NPM</label>
            <input name="nim" id="nim" class="w-full p-2 border rounded" placeholder="NIM / NPM">
        </div>
        <div><label class="block font-bold">Tempat, Tanggal Lahir</label>
            <input name="ttl" id="ttl" class="w-full p-2 border rounded" placeholder="Banda Aceh, 1 Januari 2000">
        </div>
        <div><label class="block font-bold">Program Studi</label>
            <input name="prodi" id="prodi" class="w-full p-2 border rounded" placeholder="Program Studi">
        </div>
        <div><label class="block font-bold">Fakultas</label>
            <input name="fakultas" id="fakultas" class="w-full p-2 border rounded" placeholder="Fakultas">
        </div>
        <div><label class="block font-bold">Tanggal Lulus</label>
            <input type="date" name="tanggal_lulus" id="tanggal_lulus" class="w-full p-2 border rounded">
        </div>
        <div><label class="block font-bold">Alamat</label>
            <textarea name="alamat" id="alamat" class="w-full p-2 border rounded" rows="2" placeholder="Alamat lengkap"></textarea>
        </div>
        <div><label class="block font-bold">No. HP / WA</label>
            <input name="hp" id="hp" class="w-full p-2 border rounded" placeholder="08xxxxxxxxxx">
        </div>
        <div><label class="block font-bold">TTD</label>
            <input type="text" name="ttd" id="ttd" class="w-full p-2 border rounded" placeholder="Nama penanda tangan">
        </div>
    </form>

    <!-- Preview -->
    <div class="bg-white shadow-md rounded overflow-hidden a4 p-6" id="preview">
        <div class="text-sm mb-6 text-right" id="preview-header-kanan">
            <p id="preview-tempat_tanggal">[Tempat & Tanggal]</p>
            <p><strong>Kepada Yth.</strong></p>
            <p id="preview-kepada">[Kepada]</p>
            <p>Universitas Syiah Kuala</p>
            <p>Darussalam, Banda Aceh</p>
        </div>

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

        <!-- Hardcoded Text -->
        <div class="preview-hardcoded">
            <p class="mb-4">
                Dengan ini mengajukan permohonan penerbitan <strong>Surat Keterangan Pengganti Ijazah/Transkrip Akademik</strong> dikarenakan
                <em>&lt;&lt;sebutkan/uraikan sebab pengajuan ijazah/transkrip pengganti&gt;&gt;</em>.
            </p>
            <p class="mb-2">Untuk kelengkapan administrasi, turut saya lampirkan:</p>
            <ol class="list-decimal list-inside mb-4 space-y-1">
                <li>Surat keterangan kehilangan dari Polsek/Polres (asli)</li>
                <li>Fotocopy Ijazah Magister/Sarjana/Diploma*) 1 (satu) lembar</li>
                <li>Fotocopy Transkrip Akademik Magister/Sarjana/Diploma*) 1 (satu) lembar</li>
                <li>Fotocopy Kartu Tanda Penduduk (KTP)</li>
                <li>Pas Photo, latar merah ukuran 4x5 (.jpg)</li>
            </ol>
            <p class="mb-4">
                Demikianlah surat permohonan ini saya ajukan, atas perhatian dan pertimbangannya saya ucapkan terima kasih.
            </p>
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
        <!-- Hidden Inputs -->
        <input type="hidden" name="tempat_tanggal" id="hidden-tempat_tanggal">
        <input type="hidden" name="kepada" id="hidden-kepada">
        <input type="hidden" name="nama" id="hidden-nama">
        <input type="hidden" name="nim" id="hidden-nim">
        <input type="hidden" name="ttl" id="hidden-ttl">
        <input type="hidden" name="prodi" id="hidden-prodi">
        <input type="hidden" name="fakultas" id="hidden-fakultas">
        <input type="hidden" name="tanggal_lulus" id="hidden-tanggal_lulus">
        <input type="hidden" name="alamat" id="hidden-alamat">
        <input type="hidden" name="hp" id="hidden-hp">
        <input type="hidden" name="ttd" id="hidden-ttd">

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Generate PDF
        </button>
    </form>
</div>

<!-- Script -->
<script>
    const fields = [
        "tempat_tanggal", "kepada", "nama", "nim", "ttl", "prodi",
        "fakultas", "tanggal_lulus", "alamat", "hp", "ttd"
    ];

    fields.forEach(field => {
        const input = document.getElementById(field);
        const hidden = document.getElementById("hidden-" + field);
        const preview = document.getElementById("preview-" + field);
        const hardcodedNama = document.getElementById("hardcoded-nama");

        input.addEventListener('input', () => {
            const value = input.value || `[${field.replaceAll("_", " ").toUpperCase()}]`;
            hidden.value = input.value;

            if (preview) {
                if (field === "ttd") {
                    preview.innerHTML = `<p class="mb-1">Hormat kami,</p><p class="font-bold">${value}</p>`;
                } else if (["nama", "nim", "ttl", "prodi", "fakultas", "tanggal_lulus", "alamat", "hp"].includes(field)) {
                    const label = preview.innerHTML.split(":")[0];
                    preview.innerHTML = `${label}: ${value}`;
                } else {
                    preview.textContent = value;
                }
            }

            if (field === "nama" && hardcodedNama) {
                hardcodedNama.textContent = value;
            }
        });
    });
</script>

</body>
</html>
