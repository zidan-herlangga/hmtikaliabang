<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tidak Ditemukan</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/homepage/logo-himpunan.png') }}" />

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    <!-- Iconify -->
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'heading': ['Space Grotesk', 'sans-serif'],
                        'body': ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            500: '#8b5cf6',
                            600: '#7c3aed',
                            700: '#6d28d9',
                        },
                        dark: {
                            800: '#1e1b4b',
                            900: '#0f0d1a',
                        }
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0f0d1a;
        }

        .font-heading {
            font-family: 'Space Grotesk', sans-serif;
        }

        /* Efek Glass */
        .glass {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Animasi Float */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        /* Animasi Pulse Background */
        @keyframes pulse-slow {

            0%,
            100% {
                opacity: 0.2;
            }

            50% {
                opacity: 0.4;
            }
        }

        .animate-pulse-slow {
            animation: pulse-slow 4s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
    </style>
</head>

<body class="min-h-screen font-body bg-dark-900 text-white overflow-x-hidden flex items-center justify-center">

    <!-- Background Decoration -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-primary-600/20 rounded-full blur-3xl animate-pulse-slow">
        </div>
        <div class="absolute bottom-1/4 right-1/4 w-72 h-72 bg-cyan-500/10 rounded-full blur-3xl animate-pulse-slow"
            style="animation-delay: 2s;"></div>
        <!-- Grid Pattern -->
        <div class="absolute inset-0 opacity-10"
            style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 40px 40px;">
        </div>
    </div>

    <!-- Main Content -->
    <main class="relative z-10 max-w-4xl mx-auto px-4 text-center">

        <!-- Gambar / Ilustrasi -->
        <div class="mb-8 animate-float">
            <span class="iconify text-primary-500" data-icon="mdi:robot-confused-outline"
                style="font-size: 160px; filter: drop-shadow(0 0 20px rgba(139, 92, 246, 0.5));"></span>
        </div>

        <!-- Error Code -->
        <h1 class="font-heading text-8xl md:text-9xl font-bold text-white mb-4 tracking-tighter">
            4<span class="text-primary-500">0</span>4
        </h1>

        <!-- Card Glass -->
        <div class="glass rounded-3xl p-8 md:p-12 shadow-2xl border border-white/10">

            <h2 class="font-heading text-2xl md:text-3xl font-bold text-white mb-4">
                Oops! Halaman Tidak Ditemukan
            </h2>

            <p class="text-white/60 text-lg mb-8 max-w-xl mx-auto leading-relaxed">
                Maaf, halaman yang Anda cari mungkin telah dihapus, dipindahkan, atau sementara tidak tersedia. Jangan
                khawatir, mari kembali ke jejak yang benar.
            </p>

            <!-- Tombol Aksi -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ route('frontend.home') }}"
                    class="px-8 py-3.5 bg-gradient-to-r from-primary-600 to-primary-500 text-white font-semibold rounded-full shadow-lg shadow-primary-900/30 hover:shadow-primary-500/25 transition-all duration-300 transform hover:-translate-y-0.5 inline-flex items-center gap-2">
                    <span class="iconify" data-icon="mdi:home-outline"></span>
                    Kembali ke Beranda
                </a>

                <button onclick="history.back()"
                    class="px-8 py-3.5 border border-white/20 rounded-full font-medium hover:bg-white/10 transition-all duration-300 inline-flex items-center gap-2 text-white/70 hover:text-white">
                    <span class="iconify" data-icon="mdi:arrow-left"></span>
                    Halaman Sebelumnya
                </button>
            </div>
        </div>

        <!-- Footer Mini -->
        <div class="mt-12 text-white/40 text-sm">
            &copy; {{ date('Y') }} HMTI Kaliabang. Hak Cipta Dilindungi.
        </div>

    </main>

</body>

</html>
