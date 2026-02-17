<nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Logo -->
            <a href="{{ route('frontend.home') }}" class="flex items-center space-x-3">
                <img src="{{ asset('assets/homepage/logo-himpunan.png') }}" alt="Logo HMTI" class="h-12 w-auto">
                <span class="font-heading font-bold text-xl hidden sm:block">HMTI Kaliabang</span>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center space-x-8">
                <a href="{{ route('frontend.home') }}#beranda"
                    class="nav-link text-white/80 hover:text-white transition-colors font-medium">Beranda</a>
                <a href="{{ route('frontend.home') }}#tentang"
                    class="nav-link text-white/80 hover:text-white transition-colors font-medium">Tentang</a>
                <a href="{{ route('frontend.home') }}#divisi"
                    class="nav-link text-white/80 hover:text-white transition-colors font-medium">Divisi</a>
                <a href="{{ route('frontend.home') }}#bengkel"
                    class="nav-link text-white/80 hover:text-white transition-colors font-medium">Bengkel IT</a>
                <a href="{{ route('frontend.home') }}#faq"
                    class="nav-link text-white/80 hover:text-white transition-colors font-medium">FAQ</a>
                <a href="{{ route('frontend.news') }}"
                    class="px-6 py-2.5 border border-white/20 rounded-full font-medium hover:bg-white/10 transition-all duration-300">News</a>
                <a href="#"
                    class="px-6 py-2.5 bg-gradient-to-r from-primary-600 to-primary-500 rounded-full font-medium hover:shadow-lg hover:shadow-primary-500/25 transition-all duration-300 transform hover:scale-105">Join
                    HMTI</a>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="lg:hidden p-2 rounded-lg hover:bg-white/10 transition-colors">
                <span class="iconify text-2xl" data-icon="mdi:menu"></span>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="lg:hidden hidden glass-dark">
        <div class="px-4 py-6 space-y-4">
            <a href="{{ route('frontend.home') }}#beranda"
                class="block py-2 text-white/80 hover:text-white transition-colors font-medium">Beranda</a>
            <a href="{{ route('frontend.home') }}#tentang"
                class="block py-2 text-white/80 hover:text-white transition-colors font-medium">Tentang</a>
            <a href="{{ route('frontend.home') }}#divisi"
                class="block py-2 text-white/80 hover:text-white transition-colors font-medium">Divisi</a>
            <a href="{{ route('frontend.home') }}#bengkel"
                class="block py-2 text-white/80 hover:text-white transition-colors font-medium">Bengkel IT</a>
            <a href="{{ route('frontend.home') }}#faq"
                class="block py-2 text-white/80 hover:text-white transition-colors font-medium">FAQ</a>
            <div class="flex flex-col space-y-3 pt-4">
                <a href="{{ route('frontend.news') }}"
                    class="px-6 py-2.5 border border-white/20 rounded-full font-medium text-center">News</a>
                <a href="#"
                    class="px-6 py-2.5 bg-gradient-to-r from-primary-600 to-primary-500 rounded-full font-medium text-center">Join
                    HMTI</a>
            </div>
        </div>
    </div>
</nav>

<script>
    // Mobile menu logic
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    mobileMenuBtn?.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
    // Close menu on link click
    mobileMenu?.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => mobileMenu.classList.add('hidden'));
    });
</script>
