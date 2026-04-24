<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman</title>

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

    <div class="relative min-h-screen px-4 py-5 sm:px-6 lg:px-8">

        <div class="absolute left-10 top-24 grid grid-cols-8 gap-3 opacity-40">
            @for ($i = 0; $i < 48; $i++)
                <span class="h-1 w-1 rounded-full bg-[#cdb9a7]"></span>
            @endfor
        </div>

        <div class="absolute bottom-16 right-10 grid grid-cols-8 gap-3 opacity-40">
            @for ($i = 0; $i < 48; $i++)
                <span class="h-1 w-1 rounded-full bg-[#cdb9a7]"></span>
            @endfor
        </div>

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
            <h2 class="font-cormorant text-[56px] font-semibold leading-none text-brown sm:text-[74px] md:text-[90px]">
                Form Peminjaman
            </h2>
            <p class="-mt-2 font-cormorant text-[42px] italic leading-none text-accent sm:text-[52px] md:text-[64px]">
                Alat
            </p>

            <div class="mt-5 flex items-center justify-center gap-3">
                <span class="h-px w-12 bg-line"></span>
                <span class="h-1.5 w-1.5 rounded-full bg-accent"></span>
                <span class="h-px w-12 bg-line"></span>
            </div>

            <p class="mx-auto mt-6 max-w-2xl text-sm text-[#75675a] sm:text-base">
                Lengkapi data barang yang ingin dipinjam sebelum melanjutkan ke verifikasi identitas.
            </p>
        </section>

        <section class="relative z-10 mx-auto mt-10 mb-10 max-w-5xl">
            <div class="rounded-[10px] border border-white/60 bg-[#fffaf6]/90 p-6 shadow-soft backdrop-blur sm:p-8 md:p-10">
                <form action="{{ route('identitas') }}" method="GET" class="space-y-6" required>

                    <div class="grid gap-3 md:grid-cols-[220px_1fr] md:items-center">
                        <label for="barang" class="text-sm font-semibold text-brown">
                            Barang yang Dipinjam <span class="text-accent">*</span>
                        </label>
                        <select id="barang" name="barang"
                            class="h-14 w-full rounded-lg border border-[#dccfc2] bg-white px-4 text-sm text-brown outline-none transition focus:border-[#c8ad97] focus:ring-2 focus:ring-[#e8d7ca]">
                            <option value="">Pilih barang</option>
                            <option>Laptop</option>
                            <option>Proyektor</option>
                            <option>Kamera</option>
                            <option>Arduino Kit</option>
                            <option>RFID Reader</option>
                            <option>Sensor IoT</option>
                        </select>
                    </div>

                    <div class="grid gap-3 md:grid-cols-[220px_1fr] md:items-center">
                        <label for="tanggal_pinjam" class="text-sm font-semibold text-brown">
                            Tanggal Peminjaman <span class="text-accent">*</span>
                        </label>
                        <input
                            type="date"
                            id="tanggal_pinjam"
                            name="tanggal_pinjam"
                            class="h-14 w-full rounded-lg border border-[#dccfc2] bg-white px-4 text-sm text-brown outline-none transition focus:border-[#c8ad97] focus:ring-2 focus:ring-[#e8d7ca]"
                        >
                    </div>

                    <div class="grid gap-3 md:grid-cols-[220px_1fr] md:items-center">
                        <label for="tanggal_kembali" class="text-sm font-semibold text-brown">
                            Tanggal Pengembalian <span class="text-accent">*</span>
                        </label>
                        <input
                            type="date"
                            id="tanggal_kembali"
                            name="tanggal_kembali"
                            class="h-14 w-full rounded-lg border border-[#dccfc2] bg-white px-4 text-sm text-brown outline-none transition focus:border-[#c8ad97] focus:ring-2 focus:ring-[#e8d7ca]"
                        >
                    </div>

                    <div class="grid gap-3 md:grid-cols-[220px_1fr] md:items-start">
                        <label for="kebutuhan" class="pt-4 text-sm font-semibold text-brown">
                            Kebutuhan Peminjaman <span class="text-accent">*</span>
                        </label>

                        <div>
                            <textarea
                                id="kebutuhan"
                                name="kebutuhan"
                                rows="5"
                                maxlength="300"
                                placeholder="Jelaskan kebutuhan dan tujuan peminjaman barang secara singkat..."
                                class="w-full rounded-lg border border-[#dccfc2] bg-white px-4 py-4 text-sm text-brown outline-none transition placeholder:text-[#b3a69a] focus:border-[#c8ad97] focus:ring-2 focus:ring-[#e8d7ca]"
                            ></textarea>
                            <div class="mt-2 text-right text-sm text-[#9b8c80]">
                                <span id="charCount">0</span> / 300
                            </div>
                        </div>
                    </div>

                    <div class="pt-2">
                        <div class="mb-6 h-px w-full bg-[#ece1d8]"></div>

                        <div class="flex flex-col gap-5 md:flex-row md:items-center md:justify-between">
                            <a href="{{ route('home') }}"
                               class="inline-flex h-14 items-center justify-center rounded-full border border-[#6d4d34] px-8 text-sm font-semibold text-brown transition hover:bg-[#f6ede5]">
                                Kembali
                            </a>

                            <div class="text-center">
                                <p class="text-sm text-[#8d7e71]">Langkah 1 dari 2</p>
                                <div class="mt-2 flex items-center justify-center gap-2">
                                    <span class="h-2.5 w-2.5 rounded-full bg-accent"></span>
                                    <span class="h-2.5 w-2.5 rounded-full bg-[#dacdc2]"></span>
                                </div>
                            </div>

                            <button
                                type="submit"
                                class="inline-flex h-14 items-center justify-center rounded-full bg-brown px-10 text-sm font-semibold text-white shadow-lg shadow-[#321c04]/20 transition hover:scale-[1.02] hover:opacity-95"
                            >
                                Selanjutnya
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <script>
        const kebutuhan = document.getElementById('kebutuhan');
        const charCount = document.getElementById('charCount');
        const tanggalPinjam = document.getElementById('tanggal_pinjam');
        const tanggalKembali = document.getElementById('tanggal_kembali');

        kebutuhan.addEventListener('input', function () {
            charCount.textContent = kebutuhan.value.length;
        });

        const today = new Date().toISOString().split('T')[0];
        tanggalPinjam.min = today;
        tanggalKembali.min = today;

        tanggalPinjam.addEventListener('change', function () {
            tanggalKembali.min = tanggalPinjam.value;
            if (tanggalKembali.value && tanggalKembali.value < tanggalPinjam.value) {
                tanggalKembali.value = '';
            }
        });
    </script>
</body>
</html>