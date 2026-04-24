<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Berhasil</title>

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
                        success: '#2D7A46',
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

    @php
        $barang = request('barang', 'Laptop');
        $tanggalPinjam = request('tanggal_pinjam', date('Y-m-d'));
        $tanggalKembali = request('tanggal_kembali', date('Y-m-d', strtotime('+3 days')));
        $kebutuhan = request('kebutuhan', 'Digunakan untuk praktik dan demonstrasi pembelajaran.');
        $nama = request('nama', 'Nama Siswa');
        $kelas = request('kelas', 'XI RPL 1');
        $jurusan = request('jurusan', 'RPL');
        $nisn = request('nisn', '1234567890');
        $rfid = request('rfid', 'RFID-000000');
        $kodeTransaksi = 'TRX-' . date('Ymd') . '-' . strtoupper(substr(md5($nama . $barang . time()), 0, 5));
    @endphp

    <div class="relative min-h-screen px-4 sm:px-6 lg:px-8 pb-16">

        <div class="absolute left-10 top-28 grid grid-cols-8 gap-3 opacity-40">
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

        <header class="sticky top-0 z-50 mx-auto max-w-7xl pt-4">
            <div class="flex items-center justify-between rounded-[28px] border border-white/60 bg-white/80 px-6 py-4 shadow-soft backdrop-blur-md">
                <div class="flex items-center gap-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl border border-[#d8c7b8] bg-[#fffaf6]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-brown" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 3h6m-7 3h8a2 2 0 012 2v10a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2zm4 4h.01" />
                        </svg>
                    </div>

                    <div>
                        <h1 class="text-xl font-semibold leading-tight text-brown">Sistem Peminjaman Alat </h1>
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

        <!-- hero -->
        <section class="relative z-10 mx-auto mt-14 max-w-5xl text-center">
            <div class="mb-5 inline-flex items-center gap-2 rounded-full border border-[#cfe8d7] bg-[#edf8f1] px-4 py-2 text-sm font-semibold text-success">
                <span class="h-2.5 w-2.5 rounded-full bg-success"></span>
                Peminjaman berhasil diproses
            </div>

            <h2 class="font-cormorant text-[52px] font-semibold leading-none text-brown sm:text-[72px] md:text-[88px]">
                Peminjaman Berhasil
            </h2>
            <p class="-mt-2 font-cormorant text-[38px] italic leading-none text-accent sm:text-[50px] md:text-[60px]">
                Bukti Transaksi
            </p>

            <div class="mt-5 flex items-center justify-center gap-3">
                <span class="h-px w-12 bg-line"></span>
                <span class="h-1.5 w-1.5 rounded-full bg-accent"></span>
                <span class="h-px w-12 bg-line"></span>
            </div>

            <p class="mx-auto mt-6 max-w-2xl text-sm text-[#75675a] sm:text-base">
                Data peminjaman telah tersimpan. Bukti ini nantinya dapat digunakan untuk proses cetak thermal print dan pengembalian barang.
            </p>
        </section>

        <!-- konten -->
        <section class="relative z-10 mx-auto mt-10 max-w-6xl">
            <div class="grid gap-8 lg:grid-cols-[1.1fr_0.9fr]">

                <!-- detail utama -->
                <div class="rounded-[32px] border border-white/60 bg-[#fffaf6]/90 p-6 shadow-soft backdrop-blur sm:p-8 md:p-10">
                    <div class="flex flex-col gap-4 border-b border-[#ece1d8] pb-6 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h3 class="text-2xl font-semibold text-brown">Ringkasan Peminjaman</h3>
                            <p class="mt-1 text-sm text-[#8c7e72]">Periksa kembali data siswa dan detail barang yang dipinjam.</p>
                        </div>

                        <span class="inline-flex w-fit items-center rounded bg-[#fff1e8] px-4 py-2 text-sm font-semibold text-accent">
                            Status: Dipinjam
                        </span>
                    </div>

                    <div class="mt-8 grid gap-5 sm:grid-cols-2">
                        <div class="rounded-2xl border border-[#eadfd5] bg-white/80 p-5">
                            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#9d8e80]">Nama Barang</p>
                            <p class="mt-2 text-lg font-semibold text-brown">{{ $barang }}</p>
                        </div>

                        <div class="rounded-2xl border border-[#eadfd5] bg-white/80 p-5">
                            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#9d8e80]">Kode Transaksi</p>
                            <p class="mt-2 text-lg font-semibold text-brown">{{ $kodeTransaksi }}</p>
                        </div>

                        <div class="rounded-2xl border border-[#eadfd5] bg-white/80 p-5">
                            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#9d8e80]">Nama Peminjam</p>
                            <p class="mt-2 text-lg font-semibold text-brown">{{ $nama }}</p>
                        </div>

                        <div class="rounded-2xl border border-[#eadfd5] bg-white/80 p-5">
                            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#9d8e80]">NISN</p>
                            <p class="mt-2 text-lg font-semibold text-brown">{{ $nisn }}</p>
                        </div>

                        <div class="rounded-2xl border border-[#eadfd5] bg-white/80 p-5">
                            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#9d8e80]">Kelas</p>
                            <p class="mt-2 text-lg font-semibold text-brown">{{ $kelas }}</p>
                        </div>

                        <div class="rounded-2xl border border-[#eadfd5] bg-white/80 p-5">
                            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#9d8e80]">Jurusan</p>
                            <p class="mt-2 text-lg font-semibold text-brown">{{ $jurusan }}</p>
                        </div>

                        <div class="rounded-2xl border border-[#eadfd5] bg-white/80 p-5">
                            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#9d8e80]">Tanggal Peminjaman</p>
                            <p class="mt-2 text-lg font-semibold text-brown">{{ $tanggalPinjam }}</p>
                        </div>

                        <div class="rounded-2xl border border-[#eadfd5] bg-white/80 p-5">
                            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#9d8e80]">Tanggal Pengembalian</p>
                            <p class="mt-2 text-lg font-semibold text-brown">{{ $tanggalKembali }}</p>
                        </div>
                    </div>

                    <div class="mt-5 rounded-2xl border border-[#eadfd5] bg-white/80 p-5">
                        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#9d8e80]">Kebutuhan Peminjaman</p>
                        <p class="mt-3 text-sm leading-7 text-[#5f544a]">
                            {{ $kebutuhan }}
                        </p>
                    </div>

                    <div class="mt-5 rounded-2xl border border-[#eadfd5] bg-[#fcf8f4] p-5">
                        <div class="flex items-center justify-between gap-3">
                            <p class="text-sm font-semibold text-brown">RFID Terdeteksi</p>
                            <span class="rounded-full bg-[#e9f7ef] px-3 py-1 text-xs font-semibold text-success">
                                Aktif
                            </span>
                        </div>
                        <p class="mt-2 text-sm text-[#6f6459]">{{ $rfid }}</p>
                    </div>
                </div>

                <!-- kartu bukti / thermal -->
                <div class="rounded-[32px] border border-white/60 bg-[#fffaf6]/90 p-6 shadow-soft backdrop-blur sm:p-8">
                    <div class="rounded-[28px] border border-[#eadfd5] bg-white p-6 shadow-sm">
                        <div class="border-b border-dashed border-[#d8c7b8] pb-5 text-center">
                            <p class="text-xs font-semibold uppercase tracking-[0.28em] text-[#9d8e80]">Thermal Print Preview</p>
                            <h3 class="mt-3 font-cormorant text-4xl font-semibold text-brown">Bukti Peminjaman</h3>
                            <p class="mt-2 text-sm text-[#8c7e72]">Sistem Peminjaman Alat </p>
                        </div>

                        <div class="space-y-4 py-5 text-sm">
                            <div class="flex items-start justify-between gap-4">
                                <span class="text-[#8c7e72]">Nama Barang</span>
                                <span class="text-right font-semibold text-brown">{{ $barang }}</span>
                            </div>

                            <div class="flex items-start justify-between gap-4">
                                <span class="text-[#8c7e72]">Nama Peminjam</span>
                                <span class="text-right font-semibold text-brown">{{ $nama }}</span>
                            </div>

                            <div class="flex items-start justify-between gap-4">
                                <span class="text-[#8c7e72]">Tanggal Pinjam</span>
                                <span class="text-right font-semibold text-brown">{{ $tanggalPinjam }}</span>
                            </div>

                            <div class="flex items-start justify-between gap-4">
                                <span class="text-[#8c7e72]">Tanggal Kembali</span>
                                <span class="text-right font-semibold text-brown">{{ $tanggalKembali }}</span>
                            </div>

                            <div class="flex items-start justify-between gap-4">
                                <span class="text-[#8c7e72]">Kode</span>
                                <span class="text-right font-semibold text-brown">{{ $kodeTransaksi }}</span>
                            </div>
                        </div>

                        <div class="border-y border-dashed border-[#d8c7b8] py-5">
                            <div class="rounded-2xl border border-[#eadfd5] bg-[#fcfcfc] px-4 py-5">
                                <div class="flex items-end justify-center gap-1 h-24">
                                    <span class="w-1 rounded-sm bg-black h-14"></span>
                                    <span class="w-1 rounded-sm bg-black h-20"></span>
                                    <span class="w-0.5 rounded-sm bg-black h-16"></span>
                                    <span class="w-1.5 rounded-sm bg-black h-24"></span>
                                    <span class="w-0.5 rounded-sm bg-black h-12"></span>
                                    <span class="w-1 rounded-sm bg-black h-22"></span>
                                    <span class="w-1.5 rounded-sm bg-black h-16"></span>
                                    <span class="w-0.5 rounded-sm bg-black h-24"></span>
                                    <span class="w-1 rounded-sm bg-black h-18"></span>
                                    <span class="w-1.5 rounded-sm bg-black h-20"></span>
                                    <span class="w-0.5 rounded-sm bg-black h-14"></span>
                                    <span class="w-1 rounded-sm bg-black h-24"></span>
                                    <span class="w-0.5 rounded-sm bg-black h-16"></span>
                                    <span class="w-1.5 rounded-sm bg-black h-22"></span>
                                    <span class="w-1 rounded-sm bg-black h-12"></span>
                                    <span class="w-0.5 rounded-sm bg-black h-20"></span>
                                    <span class="w-1.5 rounded-sm bg-black h-24"></span>
                                    <span class="w-1 rounded-sm bg-black h-14"></span>
                                    <span class="w-0.5 rounded-sm bg-black h-19"></span>
                                    <span class="w-1 rounded-sm bg-black h-24"></span>
                                </div>

                                <p class="mt-4 text-center text-xs font-semibold tracking-[0.3em] text-brown">
                                    {{ $kodeTransaksi }}
                                </p>
                            </div>
                        </div>

                        <div class="pt-5 text-center">
                            <p class="text-xs leading-6 text-[#8c7e72]">
                                Simpan bukti ini dengan baik. Barcode akan digunakan saat proses pengembalian barang.
                            </p>
                        </div>
                    </div>

                    <div class="mt-6 grid gap-3 sm:grid-cols-2">
                        <button onclick="window.print()" type="button"
                            class="inline-flex h-14 items-center justify-center rounded-full border border-[#6d4d34] px-6 text-sm font-semibold text-brown transition hover:bg-[#f6ede5]">
                            Cetak Bukti
                        </button>

                        <a href="{{ route('home') }}"
                           class="inline-flex h-14 items-center justify-center rounded-full bg-brown px-6 text-sm font-semibold text-white shadow-lg shadow-[#321c04]/20 transition hover:scale-[1.02] hover:opacity-95">
                            Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>