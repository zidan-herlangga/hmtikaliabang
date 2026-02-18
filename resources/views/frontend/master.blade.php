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
