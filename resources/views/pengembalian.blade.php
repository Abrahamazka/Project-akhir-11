<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengembalian Barang</title>

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
                        <h1 class="text-xl font-semibold leading-tight text-brown">Sistem Peminjaman Alat Pintar</h1>
                        <p class="text-xs font-semibold uppercase tracking-[0.28em] text-[#9d8e80]">Project Akhir Kelas 11</p>
                    </div>
                </div>

                <nav class="hidden items-center gap-3 md:flex">
                    <a href="{{ route('home') }}" class="rounded-full px-4 py-2 text-sm font-medium text-[#7b6b5d] transition hover:bg-[#f7efe7] hover:text-brown">
                        Beranda
                    </a>
                    <a href="{{ route('pinjam') }}" class="rounded-full px-4 py-2 text-sm font-medium text-[#7b6b5d] transition hover:bg-[#f7efe7] hover:text-brown">
                        Peminjaman
                    </a>
                    <a href="{{ route('pengembalian') }}" class="rounded-full border border-[#f2b092] bg-[#fff3ec] px-5 py-2 text-sm font-semibold text-accent shadow-sm">
                        Pengembalian
                    </a>
                </nav>
            </div>
        </header>

        <section class="relative z-10 mx-auto mt-14 max-w-5xl text-center">
            <h2 class="font-cormorant text-[52px] font-semibold leading-none text-brown sm:text-[72px] md:text-[88px]">
                Pengembalian Barang
            </h2>
            <p class="-mt-2 font-cormorant text-[38px] italic leading-none text-accent sm:text-[50px] md:text-[60px]">
                Scan / Input Kode Transaksi
            </p>

            <div class="mt-5 flex items-center justify-center gap-3">
                <span class="h-px w-12 bg-line"></span>
                <span class="h-1.5 w-1.5 rounded-full bg-accent"></span>
                <span class="h-px w-12 bg-line"></span>
            </div>

            <p class="mx-auto mt-6 max-w-2xl text-sm text-[#75675a] sm:text-base">
                Masukkan kode transaksi dari barcode thermal print untuk menampilkan data pinjaman dan memproses pengembalian.
            </p>
        </section>

        <section class="relative z-10 mx-auto mt-10 max-w-4xl">
            <div class="rounded-[32px] border border-white/60 bg-[#fffaf6]/90 p-6 shadow-soft backdrop-blur sm:p-8 md:p-10">
                <form action="{{ route('pengembalian') }}" method="GET" class="grid gap-4 md:grid-cols-[1fr_auto]">
                    <div>
                        <label for="kode_transaksi" class="mb-3 block text-sm font-semibold text-brown">
                            Kode Transaksi / Barcode
                        </label>
                        <input
                            type="text"
                            id="kode_transaksi"
                            name="kode_transaksi"
                            value="{{ request('kode_transaksi') }}"
                            placeholder="Contoh: TRX-20260429-ABCDE"
                            class="h-14 w-full rounded-2xl border border-[#dccfc2] bg-white px-4 text-sm text-brown outline-none transition placeholder:text-[#b3a69a] focus:border-[#c8ad97] focus:ring-2 focus:ring-[#e8d7ca]">
                    </div>

                    <div class="flex items-end">
                        <button
                            type="submit"
                            class="inline-flex h-14 w-full items-center justify-center rounded-full bg-brown px-8 text-sm font-semibold text-white shadow-lg shadow-[#321c04]/20 transition hover:scale-[1.02] hover:opacity-95 md:w-auto">
                            Cari Transaksi
                        </button>
                    </div>
                </form>

                @if(session('error'))
                <div class="mt-4 rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-600">
                    {{ session('error') }}
                </div>
                @endif

                @if(session('success'))
                <div class="mt-4 rounded-2xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                    {{ session('success') }}
                </div>
                @endif

                <div class="mt-4 rounded-2xl border border-[#eadfd5] bg-[#fcf8f4] px-4 py-3 text-sm text-[#7a6d61]">
                    Barcode scanner biasanya bertindak seperti keyboard, jadi hasil scan akan otomatis masuk ke input ini.
                </div>
            </div>
        </section>

        @if(isset($transaksi) && $transaksi)
        <section class="relative z-10 mx-auto mt-8 max-w-6xl">
            <div class="grid gap-8 lg:grid-cols-[1.1fr_0.9fr]">

                <div class="rounded-[32px] border border-white/60 bg-[#fffaf6]/90 p-6 shadow-soft backdrop-blur sm:p-8 md:p-10">
                    <div class="flex flex-col gap-4 border-b border-[#ece1d8] pb-6 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h3 class="text-2xl font-semibold text-brown">Detail Pinjaman</h3>
                            <p class="mt-1 text-sm text-[#8c7e72]">Data transaksi yang ditemukan dari database.</p>
                        </div>

                        @if($transaksi->status === 'Dikembalikan')
                        <span class="inline-flex w-fit items-center rounded-full bg-green-50 px-4 py-2 text-sm font-semibold text-success">
                            Status: Dikembalikan
                        </span>
                        @else
                        <span class="inline-flex w-fit items-center rounded-full bg-[#fff1e8] px-4 py-2 text-sm font-semibold text-accent">
                            Status: Dipinjam
                        </span>
                        @endif
                    </div>

                    <div class="mt-8 grid gap-5 sm:grid-cols-2">
                        <div class="rounded-2xl border border-[#eadfd5] bg-white/80 p-5">
                            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#9d8e80]">Kode Transaksi</p>
                            <p class="mt-2 text-lg font-semibold text-brown">{{ $transaksi->kode_transaksi }}</p>
                        </div>

                        <div class="rounded-2xl border border-[#eadfd5] bg-white/80 p-5">
                            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#9d8e80]">Nama Barang</p>
                            <p class="mt-2 text-lg font-semibold text-brown">{{ $transaksi->barang->nama_barang ?? '-' }}</p>
                        </div>

                        <div class="rounded-2xl border border-[#eadfd5] bg-white/80 p-5">
                            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#9d8e80]">Nama Peminjam</p>
                            <p class="mt-2 text-lg font-semibold text-brown">{{ $transaksi->nama_peminjam }}</p>
                        </div>

                        <div class="rounded-2xl border border-[#eadfd5] bg-white/80 p-5">
                            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#9d8e80]">Kelas / Jurusan</p>
                            <p class="mt-2 text-lg font-semibold text-brown">{{ $transaksi->kelas }} / {{ $transaksi->jurusan }}</p>
                        </div>

                        <div class="rounded-2xl border border-[#eadfd5] bg-white/80 p-5">
                            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#9d8e80]">Tanggal Peminjaman</p>
                            <p class="mt-2 text-lg font-semibold text-brown">
                                {{ $transaksi->tanggal_peminjaman?->format('d M Y') }}
                            </p>
                        </div>

                        <div class="rounded-2xl border border-[#eadfd5] bg-white/80 p-5">
                            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#9d8e80]">Tanggal Pengembalian</p>
                            <p class="mt-2 text-lg font-semibold text-brown">
                                {{ $transaksi->tanggal_pengembalian?->format('d M Y') }}
                            </p>
                        </div>
                    </div>

                    <div class="mt-5 rounded-2xl border border-[#eadfd5] bg-white/80 p-5">
                        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#9d8e80]">Kebutuhan Peminjaman</p>
                        <p class="mt-3 text-sm leading-7 text-[#5f544a]">
                            {{ $transaksi->kebutuhan }}
                        </p>
                    </div>

                    <div class="rounded-2xl border border-[#eadfd5] bg-white/80 p-5 mt-4">
                        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#9d8e80]">Stok Tersisa</p>
                        <p class="mt-2 text-lg font-semibold text-brown">{{ $transaksi->barang->stok ?? 0 }}</p>
                    </div>

                    <div class="mt-5 rounded-2xl border border-[#eadfd5] bg-[#fcf8f4] p-5">
                        <div class="flex items-center justify-between gap-3">
                            <p class="text-sm font-semibold text-brown">Tanggal Pengembalian Aktual</p>
                            @if($transaksi->tanggal_pengembalian_aktual)
                            <span class="rounded-full bg-green-50 px-3 py-1 text-xs font-semibold text-success">
                                Selesai
                            </span>
                            @else
                            <span class="rounded-full bg-[#f4ebe3] px-3 py-1 text-xs font-semibold text-[#8b7b6d]">
                                Belum diproses
                            </span>
                            @endif
                        </div>

                        <p class="mt-2 text-sm text-[#6f6459]">
                            {{ $transaksi->tanggal_pengembalian_aktual ? $transaksi->tanggal_pengembalian_aktual->format('d M Y H:i') : '-' }}
                        </p>
                    </div>
                </div>

                <div class="rounded-[32px] border border-white/60 bg-[#fffaf6]/90 p-6 shadow-soft backdrop-blur sm:p-8">
                    <div class="rounded-[28px] border border-[#eadfd5] bg-white p-6 shadow-sm">
                        <div class="border-b border-dashed border-[#d8c7b8] pb-5 text-center">
                            <p class="text-xs font-semibold uppercase tracking-[0.28em] text-[#9d8e80]">Aksi Pengembalian</p>
                            <h3 class="mt-3 font-cormorant text-4xl font-semibold text-brown">Konfirmasi Barang</h3>
                            <p class="mt-2 text-sm text-[#8c7e72]">Periksa status sebelum memproses pengembalian.</p>
                        </div>

                        <div class="space-y-4 py-5 text-sm">
                            <div class="flex items-start justify-between gap-4">
                                <span class="text-[#8c7e72]">Kode</span>
                                <span class="text-right font-semibold text-brown">{{ $transaksi->kode_transaksi }}</span>
                            </div>

                            <div class="flex items-start justify-between gap-4">
                                <span class="text-[#8c7e72]">Peminjam</span>
                                <span class="text-right font-semibold text-brown">{{ $transaksi->nama_peminjam }}</span>
                            </div>

                            <div class="flex items-start justify-between gap-4">
                                <span class="text-[#8c7e72]">Barang</span>
                                <span class="text-right font-semibold text-brown">{{ $transaksi->barang->nama_barang ?? '-' }}</span>
                            </div>

                            <div class="flex items-start justify-between gap-4">
                                <span class="text-[#8c7e72]">Status</span>
                                @if($transaksi->status === 'Dikembalikan')
                                <span class="text-right font-semibold text-success">Dikembalikan</span>
                                @else
                                <span class="text-right font-semibold text-accent">Dipinjam</span>
                                @endif
                            </div>
                        </div>

                        <div class="border-y border-dashed border-[#d8c7b8] py-5">
                            <div class="rounded-2xl border border-[#eadfd5] bg-[#fcf8f4] p-4">
                                <p class="text-sm font-semibold text-brown">Status Sistem</p>
                            </div>
                        </div>

                        <div class="mt-5 grid gap-3">
                            @if($transaksi->status !== 'Dikembalikan')
                            <form action="{{ route('pengembalian.proses', $transaksi) }}" method="POST">
                                @csrf
                                <button
                                    type="submit"
                                    class="inline-flex h-14 w-full items-center justify-center rounded-full bg-brown px-6 text-sm font-semibold text-white shadow-lg shadow-[#321c04]/20 transition hover:scale-[1.02] hover:opacity-95">
                                    Proses Pengembalian
                                </button>
                            </form>
                            @else
                            <button
                                type="button"
                                disabled
                                class="inline-flex h-14 w-full cursor-not-allowed items-center justify-center rounded-full bg-[#b8aca1] px-6 text-sm font-semibold text-white">
                                Barang Sudah Dikembalikan
                            </button>
                            @endif
                            <a
                                href="{{ route('home') }}"
                                class="inline-flex h-14 items-center justify-center rounded-full bg-[#f4ebe3] px-6 text-sm font-semibold text-brown transition hover:bg-[#eadfd5]">
                                Kembali ke Beranda
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        @endif
    </div>
</body>

</html>