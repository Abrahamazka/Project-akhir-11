<!doctype html>
<html
    lang="en"
    class="scroll-smooth [scrollbar-width:none] [-ms-overflow-style:none] [&::-webkit-scrollbar]:hidden">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Menu</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        cormorant: ['Cormorant Garamond', 'serif'],
                        inter: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        .grain-overlay::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 0;
            opacity: 0.35;
        }

        .btn-pinjam {
            position: relative;
            overflow: hidden;
        }

        .btn-pinjam::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.15) 0%, transparent 60%);
            pointer-events: none;
        }

        .btn-kembali {
            position: relative;
            overflow: hidden;
        }

        .btn-kembali::before {
            content: '';
            position: absolute;
            inset: 0;
            background: #321c04;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: inherit;
        }

        .btn-kembali:hover::before {
            transform: scaleX(1);
        }

        .btn-kembali span {
            position: relative;
            z-index: 1;
            transition: color 0.35s ease;
        }

        .btn-kembali:hover span {
            color: #FAEEE2;
        }

        .deco-line {
            opacity: 0;
            animation: fadeUp 1s ease 0.6s forwards;
        }

        .hero-h1 {
            opacity: 0;
            animation: fadeUp 0.9s ease 0.25s forwards;
        }

        .hero-h2 {
            opacity: 0;
            animation: fadeUp 0.9s ease 0.35s forwards;
        }

        .hero-btns {
            opacity: 0;
            animation: fadeUp 0.9s ease 0.5s forwards;
        }

        .hero-footer-text {
            opacity: 0;
            animation: fadeUp 0.8s ease 0.75s forwards;
        }

        @keyframes fadeUp {
            0% {
                opacity: 0;
                transform: translateY(24px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .blob-1 {
            position: absolute;
            width: 420px;
            height: 420px;
            background: radial-gradient(circle, rgba(246,118,66,0.13) 0%, transparent 70%);
            border-radius: 9999px;
            top: -80px;
            right: -100px;
            pointer-events: none;
            animation: float 9s ease-in-out infinite;
        }

        .blob-2 {
            position: absolute;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(50,28,4,0.09) 0%, transparent 70%);
            border-radius: 9999px;
            bottom: 30px;
            left: -80px;
            pointer-events: none;
            animation: float 7s ease-in-out 1.5s infinite;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-18px);
            }
        }

        .dot-grid {
            position: absolute;
            width: 180px;
            height: 180px;
            background-image: radial-gradient(circle, rgba(50,28,4,0.18) 1.5px, transparent 1.5px);
            background-size: 18px 18px;
        }
    </style>
</head>

<body class="bg-[#FAEEE2] font-inter text-[#3D3427] grain-overlay">

    <main
        id="landing"
        class="relative flex min-h-screen items-center justify-center overflow-hidden px-6">

        <div class="blob-1"></div>
        <div class="blob-2"></div>

        <div class="dot-grid top-10 left-10 hidden md:block"></div>
        <div class="dot-grid bottom-10 right-10 hidden opacity-50 md:block"></div>

        <div class="deco-line absolute left-1/2 top-12 h-px w-24 -translate-x-1/2 bg-[#321c04]/20"></div>
        <div class="deco-line absolute bottom-12 left-1/2 h-px w-24 -translate-x-1/2 bg-[#321c04]/20"></div>

        <section class="relative z-10 flex max-w-4xl flex-col items-center text-center">

            <h1 class="hero-h1 font-cormorant text-[78px] font-semibold leading-[0.88] text-[#321c04] md:text-[180px]">
                Peminjaman
            </h1>

            <h2 class="hero-h2 -mt-2 font-cormorant text-[100px] font-medium italic leading-[0.88] text-[#F67642] md:-mt-5 md:text-[168px]">
                Barang.
            </h2>

            <div class="deco-line mt-8 flex items-center gap-3">
                <span class="h-px w-16 bg-[#321c04]/20"></span>
                <span class="h-1 w-1 rounded-full bg-[#F67642]/60"></span>
                <span class="h-px w-16 bg-[#321c04]/20"></span>
            </div>

            <div class="hero-btns mt-8 flex flex-col items-center gap-3 sm:flex-row sm:gap-4">

                <a
                    href="{{ route('pinjam') }}"
                    class="btn-pinjam inline-flex items-center gap-2.5 rounded-full bg-[#321c04] px-9 py-4 text-base font-semibold text-[#FAEEE2] shadow-[0_4px_24px_rgba(50,28,4,0.25)] transition-all duration-300 hover:-translate-y-0.5 hover:shadow-[0_6px_32px_rgba(50,28,4,0.38)] active:translate-y-0">
                    Pinjam Barang
                </a>

                <a
                    href="{{ route('pengembalian') }}"
                    class="btn-kembali inline-flex items-center gap-2.5 rounded-full border-2 border-[#321c04] px-9 py-[14px] text-base font-semibold transition-all duration-300">
                    <span class="text-[#321c04]">Kembalikan Barang</span>
                </a>

            </div>

            <p class="hero-footer-text mt-10 text-xs uppercase tracking-widest text-[#3D3427]/35">
                Pilih layanan untuk memulai proses peminjaman atau pengembalian alat.
            </p>

        </section>
    </main>

</body>
</html>