<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Identitas Siswa</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        cormorant: ['"Cormorant Garamond"', 'serif'],
                        inter: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        cream: '#F7EFE7',
                        soft: '#F3EBE2',
                        brown: '#321c04',
                        accent: '#F47C4C',
                        line: '#DCCFC2',
                    },
                    boxShadow: {
                        soft: '0 20px 40px rgba(50, 28, 4, 0.08)',
                    }
                }
            }
        }
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="min-h-screen bg-cream font-inter text-brown overflow-x-hidden">

    <div class="relative min-h-screen px-4 sm:px-6 lg:px-8 pb-16">
        <div class="absolute right-0 top-32 h-72 w-72 rounded-full bg-[#f5c8aa]/30 blur-3xl"></div>
        <div class="absolute bottom-10 left-10 h-56 w-56 rounded-full bg-[#f0d8c4]/40 blur-3xl"></div>

        <header class="sticky top-0 pt-4 z-50 mx-auto max-w-7xl">
            <div class="flex items-center justify-between rounded-[28px] border border-white/50 bg-white/70 px-6 py-4 shadow-soft backdrop-blur">
                <div class="flex items-center gap-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl border border-[#d8c7b8] bg-[#fffaf6]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-brown" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 3h6m-7 3h8a2 2 0 012 2v10a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2zm4 4h.01" />
                        </svg>
                    </div>

                    <div>
                        <h1 class="text-xl font-semibold leading-tight text-brown">Sistem Peminjaman Alat</h1>
                        <p class="text-xs font-semibold uppercase tracking-[0.28em] text-[#9d8e80]">Project Akhir Kelas 11</p>
                    </div>
                </div>

                <nav class="hidden items-center gap-3 md:flex">
                    <a href="{{ route('home') }}" class="rounded-full px-4 py-2 text-sm font-medium text-[#7b6b5d] transition hover:bg-[#f7efe7] hover:text-brown">
                        Beranda
                    </a>
                    <a href="{{ route('pinjam') }}" class="rounded-full border border-[#f2b092] bg-[#fff3ec] px-5 py-2 text-sm font-semibold text-accent shadow-sm">
                        Peminjaman
                    </a>
                    <a href="{{ route('balik') }}" class="rounded-full px-4 py-2 text-sm font-medium text-[#7b6b5d] transition hover:bg-[#f7efe7] hover:text-brown">
                        Pengembalian
                    </a>
                </nav>
            </div>
        </header>

        <section class="relative z-10 mx-auto mt-14 max-w-5xl text-center">
            <h2 class="font-cormorant text-[52px] font-semibold leading-none text-brown sm:text-[72px] md:text-[88px]">
                Verifikasi Identitas
            </h2>
            <p class="-mt-2 font-cormorant text-[38px] italic leading-none text-accent sm:text-[50px] md:text-[60px]">
                Siswa Peminjam
            </p>

            <div class="mt-5 flex items-center justify-center gap-3">
                <span class="h-px w-12 bg-line"></span>
                <span class="h-1.5 w-1.5 rounded-full bg-accent"></span>
                <span class="h-px w-12 bg-line"></span>
            </div>

            <p class="mx-auto mt-6 max-w-2xl text-sm text-[#75675a] sm:text-base">
                Lengkapi data siswa dan lakukan verifikasi wajah sebelum proses peminjaman disimpan.
            </p>
        </section>

        <section class="relative z-10 mx-auto mt-10 max-w-6xl">
            <div class="rounded-[16px] border border-white/60 bg-[#fffaf6]/90 p-6 shadow-soft backdrop-blur sm:p-8 md:p-10">
                <form action="{{ route('sukses') }}" method="GET" class="grid gap-8 lg:grid-cols-[1.15fr_0.85fr]">
                    <input type="hidden" name="barang" value="{{ request('barang') }}">
                    <input type="hidden" name="tanggal_pinjam" value="{{ request('tanggal_pinjam') }}">
                    <input type="hidden" name="tanggal_kembali" value="{{ request('tanggal_kembali') }}">
                    <input type="hidden" name="kebutuhan" value="{{ request('kebutuhan') }}">

                    <div class="space-y-6">
                        <div class="rounded-[10px] border border-[#eadfd5] bg-white/70 p-5">
                            <div class="mb-4 flex items-center justify-between gap-4">
                                <div>
                                    <h3 class="text-lg font-semibold text-brown">Scan RFID</h3>
                                    <p class="mt-1 text-sm text-[#8c7e72]">Gunakan kartu siswa.</p>
                                </div>

                                <span id="rfidBadge" class="rounded bg-[#f4ebe3] px-4 py-2 text-xs font-semibold text-[#8b7b6d]">
                                    Belum discan
                                </span>
                            </div>

                            <div class="flex flex-col gap-3 sm:flex-row">
                                <input
                                    type="text"
                                    id="rfid"
                                    name="rfid"
                                    readonly
                                    placeholder="ID RFID akan muncul di sini"
                                    class="h-14 w-full rounded-2xl border border-[#dccfc2] bg-[#fcf8f4] px-4 text-sm text-brown outline-none">
                                <button
                                    type="button"
                                    id="scanBtn"
                                    class="inline-flex h-14 items-center justify-center rounded-2xl bg-brown px-6 text-sm font-semibold text-white transition hover:opacity-95">
                                    Scan RFID
                                </button>
                            </div>
                        </div>

                        <div class="grid gap-5">
                            <div class="grid gap-3 md:grid-cols-[180px_1fr] md:items-center">
                                <label for="nama" class="text-sm font-semibold text-brown">
                                    Nama Lengkap <span class="text-accent">*</span>
                                </label>
                                <input
                                    type="text"
                                    id="nama"
                                    name="nama"
                                    placeholder="Masukkan nama lengkap"
                                    class="h-14 w-full rounded-lg border border-[#dccfc2] bg-white px-4 text-sm text-brown outline-none transition placeholder:text-[#b3a69a] focus:border-[#c8ad97] focus:ring-2 focus:ring-[#e8d7ca]">
                            </div>

                            <div class="grid gap-3 md:grid-cols-[180px_1fr] md:items-center">
                                <label for="kelas" class="text-sm font-semibold text-brown">
                                    Kelas <span class="text-accent">*</span>
                                </label>
                                <input
                                    type="text"
                                    id="kelas"
                                    name="kelas"
                                    placeholder="Contoh: 11"
                                    class="h-14 w-full rounded-lg border border-[#dccfc2] bg-white px-4 text-sm text-brown outline-none transition placeholder:text-[#b3a69a] focus:border-[#c8ad97] focus:ring-2 focus:ring-[#e8d7ca]">
                            </div>

                            <div class="grid gap-3 md:grid-cols-[180px_1fr] md:items-center">
                                <label for="jurusan" class="text-sm font-semibold text-brown">
                                    Jurusan <span class="text-accent">*</span>
                                </label>
                                <select
                                    id="jurusan"
                                    name="jurusan"
                                    class="h-14 w-full rounded-lg border border-[#dccfc2] bg-white px-4 text-sm text-brown outline-none transition focus:border-[#c8ad97] focus:ring-2 focus:ring-[#e8d7ca]">
                                    <option value="">Pilih jurusan</option>
                                    <option>RPL</option>
                                    <option>TKJ</option>
                                    <option>Multimedia</option>
                                    <option>Elektronika</option>
                                    <option>Otomasi Industri</option>
                                </select>
                            </div>

                            <div class="grid gap-3 md:grid-cols-[180px_1fr] md:items-center">
                                <label for="nisn" class="text-sm font-semibold text-brown">
                                    NISN <span class="text-accent">*</span>
                                </label>
                                <input
                                    type="text"
                                    id="nisn"
                                    name="nisn"
                                    placeholder="Masukkan NISN"
                                    class="h-14 w-full rounded-lg border border-[#dccfc2] bg-white px-4 text-sm text-brown outline-none transition placeholder:text-[#b3a69a] focus:border-[#c8ad97] focus:ring-2 focus:ring-[#e8d7ca]">
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="rounded-[10px] border border-[#eadfd5] bg-white/80 p-5 shadow-sm">
                            <div class="mb-4">
                                <h3 class="text-lg font-semibold text-brown">Verifikasi Wajah</h3>
                                <p class="mt-1 text-sm text-[#8c7e72]">Ambil foto wajah siswa untuk proses verifikasi identitas.</p>
                            </div>

                            <div id="previewBox" class="relative flex min-h-[320px] items-center justify-center overflow-hidden rounded-[24px] border border-dashed border-[#d8c7b8] bg-[#fbf6f1]">
                                <img id="previewImage" class="hidden h-full w-full object-cover" alt="Preview wajah">

                                <div id="placeholderContent" class="px-6 text-center">
                                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-[#f2e8df] text-brown">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 7l1.664-1.248A2 2 0 015.864 5h12.272a2 2 0 011.2.752L21 7m-2 0v10a2 2 0 01-2 2H7a2 2 0 01-2-2V7m14 0H5m7 3v4m-2-2h4" />
                                        </svg>
                                    </div>
                                    <p class="mt-4 text-sm font-medium text-brown">Belum ada foto wajah</p>
                                    <p class="mt-1 text-xs text-[#8c7e72]">Klik tombol di bawah untuk upload atau ambil foto dari perangkat.</p>
                                </div>
                            </div>

                            <div class="mt-5 space-y-4">
                                <label for="foto_wajah" class="inline-flex h-14 w-full cursor-pointer items-center justify-center rounded-lg bg-brown px-5 text-sm font-semibold text-white transition hover:opacity-95">
                                    Ambil Foto Wajah
                                </label>
                                <input
                                    type="file"
                                    id="foto_wajah"
                                    name="foto_wajah"
                                    accept="image/*"
                                    capture="user"
                                    class="hidden">

                                <div class="rounded-lg border border-[#eadfd5] bg-[#fcf8f4] px-4 py-3">
                                    <div class="flex items-center justify-between gap-3">
                                        <span class="text-sm font-medium text-brown">Status Verifikasi</span>
                                        <span id="statusVerifikasi" class="rounded-full bg-[#f4ebe3] px-3 py-1 text-xs font-semibold text-[#8b7b6d]">
                                            Belum diverifikasi
                                        </span>
                                    </div>
                                    <p class="mt-2 text-xs text-[#8c7e72]">
                                        Pada tahap frontend ini status masih simulasi. Nanti bisa dihubungkan ke kamera/webcam dan Python untuk face verification.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-2">
                        <div class="h-px w-full bg-[#ece1d8]"></div>

                        <div class="mt-6 flex flex-col gap-5 md:flex-row md:items-center md:justify-between">
                            <a href="{{ route('pinjam') }}"
                                class="inline-flex h-14 items-center justify-center rounded-full border border-[#6d4d34] px-8 text-sm font-semibold text-brown transition hover:bg-[#f6ede5]">
                                Kembali
                            </a>

                            <div class="text-center">
                                <p class="text-sm text-[#8d7e71]">Langkah 2 dari 2</p>
                                <div class="mt-2 flex items-center justify-center gap-2">
                                    <span class="h-2.5 w-2.5 rounded-full bg-accent"></span>
                                    <span class="h-2.5 w-2.5 rounded-full bg-accent"></span>
                                </div>
                            </div>

                            <button
                                type="submit"
                                class="inline-flex h-14 items-center justify-center rounded-full bg-brown px-10 text-sm font-semibold text-white shadow-lg shadow-[#321c04]/20 transition hover:scale-[1.02] hover:opacity-95">
                                Proses Peminjaman
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <script>
        const scanBtn = document.getElementById('scanBtn');
        const rfidInput = document.getElementById('rfid');
        const rfidBadge = document.getElementById('rfidBadge');

        const fotoInput = document.getElementById('foto_wajah');
        const previewImage = document.getElementById('previewImage');
        const placeholderContent = document.getElementById('placeholderContent');
        const statusVerifikasi = document.getElementById('statusVerifikasi');

        scanBtn.addEventListener('click', function() {
            const dummyRFID = 'RFID-' + Math.floor(100000 + Math.random() * 900000);
            rfidInput.value = dummyRFID;
            rfidBadge.textContent = 'RFID berhasil dibaca';
            rfidBadge.className = 'rounded bg-[#e9f7ef] px-4 py-2 text-xs font-semibold text-[#2d7a46]';
        });

        fotoInput.addEventListener('change', function(event) {
            const file = event.target.files[0];

            if (file) {
                const imageUrl = URL.createObjectURL(file);
                previewImage.src = imageUrl;
                previewImage.classList.remove('hidden');
                placeholderContent.classList.add('hidden');

                statusVerifikasi.textContent = 'Foto wajah tersedia';
                statusVerifikasi.className = 'rounded-full bg-[#fff1e8] px-3 py-1 text-xs font-semibold text-[#d46b31]';
            }
        });
    </script>
</body>

</html>