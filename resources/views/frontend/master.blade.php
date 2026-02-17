<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title', config('app.sitesettings')::first()?->site_title . ' - ' . config('app.sitesettings')::first()?->tagline)</title>

    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/homepage/logo-himpunan.png') }}" />

    <meta name="description" content="@yield('description', config('app.sitesettings')::first()?->description ?? 'Himpunan Mahasiswa Teknologi Informasi DPC Kaliabang')" />

    <meta name="keywords" content="HMTI DPC Kaliabang, HMTI Kaliabang, DPC Kaliabang, News HMTI" />

    <!-- Open Graph -->
    @yield('meta')

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap"
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
                            50: '#f5f3ff',
                            100: '#ede9fe',
                            200: '#ddd6fe',
                            300: '#c4b5fd',
                            400: '#a78bfa',
                            500: '#8b5cf6',
                            600: '#7c3aed',
                            700: '#6d28d9',
                            800: '#5b21b6',
                            900: '#4c1d95',
                        },
                        accent: {
                            400: '#22d3ee',
                            500: '#06b6d4'
                        },
                        dark: {
                            800: '#1e1b4b',
                            900: '#0f0d1a'
                        }
                    }
                }
            }
        }
    </script>

    <style>
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #1e1b4b;
        }

        ::-webkit-scrollbar-thumb {
            background: #7c3aed;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #8b5cf6;
        }

        /* Glass Effect */
        .glass {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .glass-dark {
            background: rgba(15, 13, 26, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Nav Scroll Effect */
        .nav-scrolled {
            background: rgba(15, 13, 26, 0.95) !important;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        /* Loader */
        .loader {
            position: fixed;
            inset: 0;
            z-index: 9999;
            background: linear-gradient(135deg, #0f0d1a 0%, #1e1b4b 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }

        .loader.hidden {
            opacity: 0;
            visibility: hidden;
        }

        .loader-element {
            width: 60px;
            height: 60px;
            border: 4px solid rgba(139, 92, 246, 0.2);
            border-top-color: #8b5cf6;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Search Overlay */
        .search-overlay {
            position: fixed;
            inset: 0;
            z-index: 100;
            background: rgba(15, 13, 26, 0.95);
            backdrop-filter: blur(10px);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .search-overlay.active {
            opacity: 1;
            visibility: visible;
        }
    </style>
</head>

<body class="font-body bg-dark-900 text-white antialiased">

    <!-- Loader -->
    <div id="page-loader" class="loader hidden">
        <div class="loader-element"></div>
    </div>

    <!-- Header Component -->
    <x-frontend.header />

    <!-- Main Content -->
    <main class="min-h-screen pt-20">
        @yield('content')
    </main>

    <!-- Footer Component -->
    <x-frontend.footer />

    <!-- Scroll to Top Button -->
    <button id="scroll-top"
        class="fixed bottom-8 right-8 w-12 h-12 bg-primary-600 text-white rounded-full shadow-lg opacity-0 invisible transition-all duration-300 hover:bg-primary-700 z-50 flex items-center justify-center group">
        <span class="iconify text-2xl group-hover:-translate-y-0.5 transition-transform"
            data-icon="mdi:chevron-up"></span>
    </button>

    <!-- Search Overlay -->
    <div id="search-overlay" class="search-overlay">
        <div class="max-w-2xl mx-auto px-4 pt-32">
            <div class="relative">
                <button onclick="closeSearch()"
                    class="absolute -top-16 right-0 p-3 rounded-full hover:bg-white/10 transition-colors">
                    <span class="iconify text-3xl text-white/60 hover:text-white" data-icon="mdi:close"></span>
                </button>
                <form action="{{ route('frontend.search') }}" class="relative">
                    <input type="search" name="q"
                        value="{{ request()->route()->getName() == 'frontend.search' ? request()->q : '' }}"
                        placeholder="What are you looking for?"
                        class="w-full px-6 py-5 pl-14 bg-white/10 border border-white/20 rounded-2xl focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none text-white text-lg placeholder-white/40">
                    <span class="iconify absolute left-5 top-1/2 -translate-y-1/2 text-2xl text-white/40"
                        data-icon="mdi:magnify"></span>
                    <button type="submit"
                        class="absolute right-3 top-1/2 -translate-y-1/2 px-6 py-2.5 bg-primary-600 hover:bg-primary-500 rounded-xl font-medium transition-colors">
                        Search
                    </button>
                </form>
                <p class="text-white/40 text-center mt-6">Press <kbd
                        class="px-2 py-1 bg-white/10 rounded text-xs">ESC</kbd> to close</p>
            </div>
        </div>
    </div>

    <!-- Global JavaScript -->
    <!-- Global JavaScript -->
    <script>
        const navbar = document.getElementById('navbar');
        const scrollTopBtn = document.getElementById('scroll-top');

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) navbar?.classList.add('nav-scrolled');
            else navbar?.classList.remove('nav-scrolled');

            if (window.scrollY > 500) {
                scrollTopBtn.classList.remove('opacity-0', 'invisible');
                scrollTopBtn.classList.add('opacity-100', 'visible');
            } else {
                scrollTopBtn.classList.add('opacity-0', 'invisible');
                scrollTopBtn.classList.remove('opacity-100', 'visible');
            }
        });

        scrollTopBtn.addEventListener('click', () => window.scrollTo({
            top: 0,
            behavior: 'smooth'
        }));

        // Reveal animation on scroll
        function revealOnScroll() {
            const reveals = document.querySelectorAll('.reveal');
            reveals.forEach(reveal => {
                const windowHeight = window.innerHeight;
                const revealTop = reveal.getBoundingClientRect().top;
                if (revealTop < windowHeight - 150) reveal.classList.add('active');
            });
        }
        window.addEventListener('scroll', revealOnScroll);
        revealOnScroll();

        // FAQ toggle helper
        function toggleFaq(button) {
            const faqItem = button.parentElement;
            const isActive = faqItem.classList.contains('active');
            const section = faqItem.parentElement;
            section.querySelectorAll('.faq-item').forEach(item => item.classList.remove('active'));
            if (!isActive) faqItem.classList.add('active');
        }

        // Modal helpers
        function openModal() {
            document.getElementById('modal')?.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            document.getElementById('modal')?.classList.add('hidden');
            document.body.style.overflow = '';
        }
    </script>

    @yield('script')

</body>

</html>
