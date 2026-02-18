@extends('frontend.master')

@section('title', 'HMTI Kaliabang - Himpunan Mahasiswa Teknologi Informasi')

@section('content')
    <!-- Hero Section -->
    <section id="beranda" class="relative min-h-screen flex items-center overflow-hidden">
        <!-- Particle Canvas Background -->
        <canvas id="particle-canvas" class="absolute inset-0 z-0"></canvas>

        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-dark-900 via-primary-900/30 to-dark-900 z-0"></div>

        <!-- Floating Shapes -->
        <div class="absolute inset-0 overflow-hidden z-0 pointer-events-none">
            <div class="absolute top-20 left-10 w-72 h-72 bg-primary-500/20 rounded-full blur-3xl animate-pulse-slow"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-cyan-500/10 rounded-full blur-3xl animate-pulse-slow"
                style="animation-delay: 2s;"></div>
            <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-accent-500/10 rounded-full blur-3xl animate-pulse-slow"
                style="animation-delay: 4s;"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32 z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="text-center lg:text-left order-2 lg:order-1">
                    <div class="inline-flex items-center px-4 py-1.5 rounded-full bg-white/5 border border-white/10 backdrop-blur-sm mb-6 animate-fade-in-up"
                        style="animation-delay: 0.2s;">
                        <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse mr-2"></span>
                        <span class="text-xs text-white/60 uppercase tracking-wider">Accepting New Members</span>
                    </div>

                    <h1 class="font-heading text-4xl sm:text-5xl lg:text-7xl font-bold leading-tight mb-6 animate-fade-in-up"
                        style="animation-delay: 0.4s;">
                        <span class="text-white">Himpunan Mahasiswa</span>
                        <span
                            class="block text-transparent bg-clip-text bg-gradient-to-r from-primary-400 via-purple-400 to-cyan-400 mt-2">Teknologi
                            Informasi</span>
                    </h1>

                    <p class="text-xl sm:text-2xl text-white/70 mb-8 font-light h-8 animate-fade-in-up"
                        style="animation-delay: 0.6s;">
                        <span id="typed-text"></span><span class="animate-pulse text-primary-400">|</span>
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start animate-fade-in-up"
                        style="animation-delay: 0.8s;">
                        <a href="#tentang"
                            class="group relative px-8 py-4 bg-white text-dark-900 rounded-full font-semibold overflow-hidden transition-all duration-300 transform hover:scale-105 inline-flex items-center justify-center space-x-2 shadow-lg shadow-white/10">
                            <span class="relative z-10">Explore</span>
                            <span class="iconify relative z-10 transform group-hover:translate-x-1 transition-transform"
                                data-icon="mdi:arrow-right"></span>
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-primary-100 to-white transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left">
                            </div>
                        </a>
                        <a href="#divisi"
                            class="px-8 py-4 border-2 border-white/20 text-white rounded-full font-semibold hover:bg-white/10 hover:border-white/40 transition-all duration-300 backdrop-blur-sm inline-flex items-center justify-center">
                            Lihat Divisi
                        </a>
                    </div>
                </div>

                <div class="order-1 lg:order-2 flex justify-center items-center relative animate-fade-in"
                    style="animation-delay: 0.5s;">
                    <!-- Decorative Ring -->
                    <div class="absolute w-80 h-80 border border-white/5 rounded-full animate-spin-slow"></div>
                    <div class="absolute w-96 h-96 border border-primary-500/10 rounded-full"></div>

                    <div class="relative flex items-center justify-center p-4">
                        <img src="{{ asset('assets/homepage/logo-himpunan.png') }}" alt="Logo HMTI"
                            class="h-48 sm:h-64 w-auto animate-float drop-shadow-[0_0_30px_rgba(124,58,237,0.4)]">

                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 z-10 animate-bounce-slow">
            <a href="#tentang" class="flex flex-col items-center text-white/50 hover:text-white transition-colors">
                <span class="text-xs tracking-widest mb-2">SCROLL</span>
                <span class="iconify text-2xl" data-icon="mdi:chevron-down"></span>
            </a>
        </div>
    </section>

    <!-- About Section -->
    <section id="tentang" class="py-24 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden">
        <!-- Grid Pattern -->
        <div class="absolute inset-0 opacity-40"
            style="background-image: radial-gradient(#7c3aed 1px, transparent 1px); background-size: 32px 32px;"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 reveal-scale">
                <span
                    class="inline-block px-4 py-1 bg-primary-100 text-primary-700 rounded-full text-sm font-semibold mb-4">About
                    Us</span>
                <h2 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-dark-900 mb-4">Tentang Kami</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-primary-500 to-accent-400 mx-auto rounded-full"></div>
            </div>

            <div class="grid lg:grid-cols-2 gap-16 items-start">
                <div class="reveal-left relative">
                    <div class="absolute -left-4 top-0 w-24 h-full bg-primary-100 rounded-full blur-3xl opacity-50"></div>
                    <p class="text-gray-700 text-lg leading-relaxed text-justify relative">
                        Himpunan Mahasiswa Teknologi Informasi (HMTI) adalah wadah aspirasi dan pelayanan bagi mahasiswa
                        Jurusan Teknologi Informasi. HMTI didirikan pada tanggal 02 Februari 2020 bertempat di Jakarta.
                        Terbentuk dengan dilatar belakangi oleh kebutuhan mahasiswa program studi Teknologi Informasi untuk
                        terciptanya lingkungan yang mendukung pengembangan skill mahasiswa.
                    </p>
                </div>

                <div class="reveal-right">
                    <p class="text-gray-700 text-lg leading-relaxed text-justify">
                        HMTI sangat dibutuhkan oleh seluruh mahasiswa Teknologi Informasi Universitas Bina Sarana
                        Informatika untuk mencurahkan ide-ide brilian dan mengembangkan kemampuan mereka dalam menguasai
                        materi informatika, serta mengembangkan kreativitas yang tidak hanya bersifat teoritis, sehingga
                        mereka menjadi akademisi yang profesional.
                    </p>
                    <button onclick="openModal()"
                        class="mt-8 inline-flex items-center space-x-2 bg-dark-900 text-white px-6 py-3 rounded-full font-semibold hover:bg-primary-700 transition-all duration-300 group">
                        <span>Lanjut Baca</span>
                        <span class="iconify transform group-hover:translate-x-1 transition-transform"
                            data-icon="mdi:arrow-right"></span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="fixed inset-0 bg-black/80 backdrop-blur-md transition-opacity" onclick="closeModal()"></div>
        <div class="relative min-h-screen flex items-center justify-center p-4">
            <div class="relative bg-white rounded-3xl max-w-4xl w-full shadow-2xl transform scale-95 opacity-0 transition-all duration-500"
                id="modal-content">
                <div
                    class="sticky top-0 bg-gradient-to-r from-primary-700 to-primary-600 px-8 py-6 rounded-t-3xl flex justify-between items-center">
                    <h3 class="font-heading text-2xl font-bold text-white">Tentang HMTI</h3>
                    <button onclick="closeModal()" class="p-2 hover:bg-white/20 rounded-full transition-colors">
                        <span class="iconify text-2xl text-white" data-icon="mdi:close"></span>
                    </button>
                </div>
                <div class="p-8 space-y-6">
                    <div class="grid md:grid-cols-2 gap-8 text-gray-700">
                        <p class="text-justify leading-relaxed">Himpunan Mahasiswa Teknologi Informasi (HMTI) adalah wadah
                            aspirasi dan pelayanan bagi mahasiswa Jurusan Teknologi Informasi. HMTI didirikan pada tanggal
                            02 Februari 2020 bertempat di Jakarta.</p>
                        <p class="text-justify leading-relaxed">Terbentuknya HMTI adalah sebagai salah satu wadah
                            organisasi yang sangat dibutuhkan oleh seluruh mahasiswa Teknologi Informasi Universitas Bina
                            Sarana Informatika untuk mencurahkan ide-ide brilian.</p>
                        <p class="text-justify leading-relaxed">Memperhatikan realita kemampuan mahasiswa dalam mengelola
                            kepribadian serta kemampuan intelektual dalam sisi akademisi aktif dilingkungan perkuliahan,
                            baik dalam segi teknisi informasi, berkomunikasi atau public speaking.</p>
                        <p class="text-justify leading-relaxed">HMTI bertempat di Universitas Bina Sarana Informatika
                            Kramat di Jl. Kramat Raya No. 98 RT.18/RW.1, Paseban, kecamatan Senen, Kota Jakarta pusat,
                            Daerah Khusus Ibukota Jakarta 10420.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Visi Misi Section -->
    <section class="py-24 bg-white relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-primary-100 rounded-full blur-3xl opacity-30"></div>
        <div class="absolute bottom-0 left-0 w-72 h-72 bg-cyan-100 rounded-full blur-3xl opacity-30"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="reveal-left order-2 lg:order-1">
                    <img src="{{ asset('assets/homepage/img/skills.png') }}" alt="Skills"
                        class="w-full max-w-md mx-auto drop-shadow-2xl transform hover:scale-105 transition-transform duration-500">
                </div>

                <div class="reveal-right order-1 lg:order-2">
                    <span
                        class="inline-block px-4 py-1 bg-primary-100 text-primary-700 rounded-full text-sm font-semibold mb-4">Visi
                        & Misi</span>
                    <h3 class="font-heading text-3xl font-bold text-dark-900 mb-8">Goals & Direction</h3>

                    <div class="space-y-4">
                        <!-- Visi -->
                        <div class="faq-item border-l-4 border-primary-500 bg-primary-50/50 rounded-r-xl overflow-hidden">
                            <button onclick="toggleFaq(this)"
                                class="w-full px-6 py-5 flex items-center justify-between hover:bg-primary-100/50 transition-colors">
                                <div class="flex items-center space-x-4">
                                    <span class="iconify text-2xl text-primary-600" data-icon="mdi:eye-outline"></span>
                                    <span class="font-heading font-bold text-lg text-dark-900">Visi</span>
                                </div>
                                <span class="iconify faq-icon text-2xl text-primary-600 transition-transform duration-300"
                                    data-icon="mdi:chevron-down"></span>
                            </button>
                            <div class="faq-content px-6 overflow-hidden transition-all duration-300 max-h-0">
                                <div class="pb-5 pl-10">
                                    <p class="text-gray-700 leading-relaxed">
                                        Menjadikan HMTI sebagai wadah aspirasi dan pelayanan demi mewujudkan mahasiswa
                                        teknologi informasi yang aktif, kreatif, kompetitif, bertanggungjawab, dan
                                        berwawasan luas.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Misi -->
                        <div
                            class="faq-item border-l-4 border-gray-200 hover:border-emerald-500 bg-gray-50 rounded-r-xl overflow-hidden">
                            <button onclick="toggleFaq(this)"
                                class="w-full px-6 py-5 flex items-center justify-between hover:bg-gray-100 transition-colors">
                                <div class="flex items-center space-x-4">
                                    <span class="iconify text-2xl text-emerald-600" data-icon="mdi:flag-outline"></span>
                                    <span class="font-heading font-bold text-lg text-dark-900">Misi</span>
                                </div>
                                <span class="iconify faq-icon text-2xl text-gray-400 transition-transform duration-300"
                                    data-icon="mdi:chevron-down"></span>
                            </button>
                            <div class="faq-content px-6 overflow-hidden transition-all duration-300 max-h-0">
                                <div class="pb-5 pl-10">
                                    <ul class="space-y-3 text-gray-700">
                                        <li class="flex items-start space-x-3">
                                            <span class="iconify text-emerald-500 mt-1 flex-shrink-0"
                                                data-icon="mdi:check-circle"></span>
                                            <span>Meningkatkan kontribusi HMTI kepada lingkungan kampus serta masyarakat
                                                luas.</span>
                                        </li>
                                        <li class="flex items-start space-x-3">
                                            <span class="iconify text-emerald-500 mt-1 flex-shrink-0"
                                                data-icon="mdi:check-circle"></span>
                                            <span>Menciptakan prestasi atau akademisi yang kreatif dan inovatif.</span>
                                        </li>
                                        <li class="flex items-start space-x-3">
                                            <span class="iconify text-emerald-500 mt-1 flex-shrink-0"
                                                data-icon="mdi:check-circle"></span>
                                            <span>Menanamkan sikap disiplin dan bertanggung jawab kepada setiap
                                                anggota.</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Counter -->
            <div class="mt-24 reveal-up">
                <div
                    class="bg-gradient-to-r from-dark-900 via-primary-800 to-dark-900 rounded-3xl p-10 sm:p-16 relative overflow-hidden">
                    <div class="absolute inset-0 opacity-20"
                        style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;">
                    </div>
                    <div class="grid grid-cols-3 gap-8 text-center relative z-10">
                        <div>
                            <h2 class="font-heading text-5xl sm:text-6xl font-bold text-white counter" data-target="25">0
                            </h2>
                            <p class="text-white/60 mt-2 uppercase tracking-wider text-sm font-medium">Proker</p>
                        </div>
                        <div>
                            <h2 class="font-heading text-5xl sm:text-6xl font-bold text-white counter" data-target="3">0
                            </h2>
                            <p class="text-white/60 mt-2 uppercase tracking-wider text-sm font-medium">Divisi</p>
                        </div>
                        <div>
                            <h2 class="font-heading text-5xl sm:text-6xl font-bold text-white counter" data-target="150">0
                            </h2>
                            <p class="text-white/60 mt-2 uppercase tracking-wider text-sm font-medium">Anggota</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Divisi Section -->
    <section id="divisi" class="py-24 bg-gray-50 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-white via-gray-50 to-white h-full w-full pointer-events-none">
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 reveal-scale">
                <span class="inline-block px-4 py-1 bg-blue-100 text-blue-700 rounded-full text-sm font-semibold mb-4">Our
                    Teams</span>
                <h2 class="font-heading text-3xl sm:text-4xl font-bold text-dark-900 mb-4">Divisi HMTI</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-500 via-primary-500 to-emerald-500 mx-auto rounded-full">
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Kominfo Card -->
                <div class="reveal-up group perspective" style="transition-delay: 0.1s;">
                    <div
                        class="relative bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 transform-style-3d hover:rotate-y-3 hover:-rotate-x-3">
                        <div
                            class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-500 to-blue-600 rounded-bl-[100px] rounded-tr-3xl opacity-10 transition-all group-hover:opacity-20">
                        </div>
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-blue-500/20 group-hover:shadow-blue-500/40 transition-all duration-300 transform group-hover:-translate-y-2">
                            <span class="iconify text-3xl text-white" data-icon="mdi:bullhorn-outline"></span>
                        </div>
                        <h4 class="font-heading text-2xl font-bold text-dark-900 mb-3">Divisi Kominfo</h4>
                        <p class="text-gray-500 leading-relaxed mb-6 text-sm">
                            Divisi Komunikasi dan Informasi bertanggung jawab dalam penyebaran informasi, publikasi
                            kegiatan, dan menjalin hubungan masyarakat.
                        </p>
                        <a href="/divisi/kominfo"
                            class="inline-flex items-center text-blue-600 font-semibold text-sm hover:text-blue-800 transition-colors group/link">
                            <span>Selengkapnya</span>
                            <span class="iconify ml-1 transform group-hover/link:translate-x-1 transition-transform"
                                data-icon="mdi:arrow-right"></span>
                        </a>
                    </div>
                </div>

                <!-- PSDM Card -->
                <div class="reveal-up group perspective" style="transition-delay: 0.2s;">
                    <div
                        class="relative bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 transform-style-3d hover:rotate-y-0 hover:-rotate-x-3">
                        <div
                            class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-bl-[100px] rounded-tr-3xl opacity-10 transition-all group-hover:opacity-20">
                        </div>
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-emerald-500/20 group-hover:shadow-emerald-500/40 transition-all duration-300 transform group-hover:-translate-y-2">
                            <span class="iconify text-3xl text-white" data-icon="mdi:account-group-outline"></span>
                        </div>
                        <h4 class="font-heading text-2xl font-bold text-dark-900 mb-3">Divisi PSDM</h4>
                        <p class="text-gray-500 leading-relaxed mb-6 text-sm">
                            Divisi Pengembangan Sumber Daya Mahasiswa berfokus pada pengembangan soft skills, leadership,
                            dan pengaderan.
                        </p>
                        <a href="/divisi/psdm"
                            class="inline-flex items-center text-emerald-600 font-semibold text-sm hover:text-emerald-800 transition-colors group/link">
                            <span>Selengkapnya</span>
                            <span class="iconify ml-1 transform group-hover/link:translate-x-1 transition-transform"
                                data-icon="mdi:arrow-right"></span>
                        </a>
                    </div>
                </div>

                <!-- Litbang Card -->
                <div class="reveal-up group perspective" style="transition-delay: 0.3s;">
                    <div
                        class="relative bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 transform-style-3d hover:-rotate-y-3 hover:-rotate-x-3">
                        <div
                            class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-primary-600 to-primary-800 rounded-bl-[100px] rounded-tr-3xl opacity-10 transition-all group-hover:opacity-20">
                        </div>
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-primary-600 to-primary-800 rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-primary-500/20 group-hover:shadow-primary-500/40 transition-all duration-300 transform group-hover:-translate-y-2">
                            <span class="iconify text-3xl text-white" data-icon="mdi:lightbulb-outline"></span>
                        </div>
                        <h4 class="font-heading text-2xl font-bold text-dark-900 mb-3">Divisi Litbang</h4>
                        <p class="text-gray-500 leading-relaxed mb-6 text-sm">
                            Divisi Penelitian dan Pengembangan merupakan wadah bagi anggota untuk riset dan inovasi
                            teknologi.
                        </p>
                        <a href="/divisi/litbang"
                            class="inline-flex items-center text-primary-600 font-semibold text-sm hover:text-primary-800 transition-colors group/link">
                            <span>Selengkapnya</span>
                            <span class="iconify ml-1 transform group-hover/link:translate-x-1 transition-transform"
                                data-icon="mdi:arrow-right"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section (Infinite Marquee) -->
    <section id="gallery" class="py-20 bg-dark-900 relative overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute top-0 left-0 w-96 h-96 bg-primary-600/20 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-72 h-72 bg-cyan-600/10 rounded-full blur-3xl"></div>
        </div>

        <div class="relative z-10">
            <div class="text-center mb-16 reveal-scale px-4">
                <span
                    class="inline-block px-4 py-1 border border-white/20 text-white/60 rounded-full text-sm font-semibold mb-4">Moments</span>
                <h2 class="font-heading text-3xl sm:text-4xl font-bold text-white mb-4">Gallery Kegiatan</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-primary-500 to-cyan-400 mx-auto rounded-full"></div>
            </div>

            <!-- Marquee Container -->
            <div class="relative"
                style="mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);">
                <!-- Top Row (Slide Right) -->
                <div class="flex mb-4 hover:[animation-play-state:paused]">
                    <div class="flex flex-shrink-0 animate-marquee-right items-center space-x-4">
                        <!-- Images Set 1 -->
                        <img src="https://picsum.photos/seed/hmti1/400/300"
                            class="h-48 w-64 object-cover rounded-2xl border border-white/10 hover:border-primary-500 transition-colors shadow-lg"
                            alt="Gallery 1">
                        <img src="https://picsum.photos/seed/hmti2/400/300"
                            class="h-48 w-64 object-cover rounded-2xl border border-white/10 hover:border-primary-500 transition-colors shadow-lg"
                            alt="Gallery 2">
                        <img src="https://picsum.photos/seed/hmti3/400/300"
                            class="h-48 w-64 object-cover rounded-2xl border border-white/10 hover:border-primary-500 transition-colors shadow-lg"
                            alt="Gallery 3">
                        <img src="https://picsum.photos/seed/hmti4/400/300"
                            class="h-48 w-64 object-cover rounded-2xl border border-white/10 hover:border-primary-500 transition-colors shadow-lg"
                            alt="Gallery 4">
                        <img src="https://picsum.photos/seed/hmti5/400/300"
                            class="h-48 w-64 object-cover rounded-2xl border border-white/10 hover:border-primary-500 transition-colors shadow-lg"
                            alt="Gallery 5">
                        <img src="https://picsum.photos/seed/hmti6/400/300"
                            class="h-48 w-64 object-cover rounded-2xl border border-white/10 hover:border-primary-500 transition-colors shadow-lg"
                            alt="Gallery 6">
                        <!-- Duplicate for seamless loop -->
                        <img src="https://picsum.photos/seed/hmti1/400/300"
                            class="h-48 w-64 object-cover rounded-2xl border border-white/10 hover:border-primary-500 transition-colors shadow-lg"
                            alt="Gallery 1">
                        <img src="https://picsum.photos/seed/hmti2/400/300"
                            class="h-48 w-64 object-cover rounded-2xl border border-white/10 hover:border-primary-500 transition-colors shadow-lg"
                            alt="Gallery 2">
                        <img src="https://picsum.photos/seed/hmti3/400/300"
                            class="h-48 w-64 object-cover rounded-2xl border border-white/10 hover:border-primary-500 transition-colors shadow-lg"
                            alt="Gallery 3">
                        <img src="https://picsum.photos/seed/hmti4/400/300"
                            class="h-48 w-64 object-cover rounded-2xl border border-white/10 hover:border-primary-500 transition-colors shadow-lg"
                            alt="Gallery 4">
                        <img src="https://picsum.photos/seed/hmti5/400/300"
                            class="h-48 w-64 object-cover rounded-2xl border border-white/10 hover:border-primary-500 transition-colors shadow-lg"
                            alt="Gallery 5">
                        <img src="https://picsum.photos/seed/hmti6/400/300"
                            class="h-48 w-64 object-cover rounded-2xl border border-white/10 hover:border-primary-500 transition-colors shadow-lg"
                            alt="Gallery 6">
                    </div>
                </div>

                <!-- Bottom Row (Slide Left) -->
                <div class="flex hover:[animation-play-state:paused]">
                    <div class="flex flex-shrink-0 animate-marquee-left items-center space-x-4">
                        <!-- Images Set 2 -->
                        <img src="https://picsum.photos/seed/ubsi1/400/300"
                            class="h-48 w-64 object-cover rounded-2xl border border-white/10 hover:border-cyan-500 transition-colors shadow-lg"
                            alt="Gallery 7">
                        <img src="https://picsum.photos/seed/ubsi2/400/300"
                            class="h-48 w-64 object-cover rounded-2xl border border-white/10 hover:border-cyan-500 transition-colors shadow-lg"
                            alt="Gallery 8">
                        <img src="https://picsum.photos/seed/ubsi3/400/300"
                            class="h-48 w-64 object-cover rounded-2xl border border-white/10 hover:border-cyan-500 transition-colors shadow-lg"
                            alt="Gallery 9">
                        <img src="https://picsum.photos/seed/ubsi4/400/300"
                            class="h-48 w-64 object-cover rounded-2xl border border-white/10 hover:border-cyan-500 transition-colors shadow-lg"
                            alt="Gallery 10">
                        <img src="https://picsum.photos/seed/ubsi5/400/300"
                            class="h-48 w-64 object-cover rounded-2xl border border-white/10 hover:border-cyan-500 transition-colors shadow-lg"
                            alt="Gallery 11">
                        <img src="https://picsum.photos/seed/ubsi6/400/300"
                            class="h-48 w-64 object-cover rounded-2xl border border-white/10 hover:border-cyan-500 transition-colors shadow-lg"
                            alt="Gallery 12">
                        <!-- Duplicate for seamless loop -->
                        <img src="https://picsum.photos/seed/ubsi1/400/300"
                            class="h-48 w-64 object-cover rounded-2xl border border-white/10 hover:border-cyan-500 transition-colors shadow-lg"
                            alt="Gallery 7">
                        <img src="https://picsum.photos/seed/ubsi2/400/300"
                            class="h-48 w-64 object-cover rounded-2xl border border-white/10 hover:border-cyan-500 transition-colors shadow-lg"
                            alt="Gallery 8">
                        <img src="https://picsum.photos/seed/ubsi3/400/300"
                            class="h-48 w-64 object-cover rounded-2xl border border-white/10 hover:border-cyan-500 transition-colors shadow-lg"
                            alt="Gallery 9">
                        <img src="https://picsum.photos/seed/ubsi4/400/300"
                            class="h-48 w-64 object-cover rounded-2xl border border-white/10 hover:border-cyan-500 transition-colors shadow-lg"
                            alt="Gallery 10">
                        <img src="https://picsum.photos/seed/ubsi5/400/300"
                            class="h-48 w-64 object-cover rounded-2xl border border-white/10 hover:border-cyan-500 transition-colors shadow-lg"
                            alt="Gallery 11">
                        <img src="https://picsum.photos/seed/ubsi6/400/300"
                            class="h-48 w-64 object-cover rounded-2xl border border-white/10 hover:border-cyan-500 transition-colors shadow-lg"
                            alt="Gallery 12">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="py-24 bg-dark-900 relative overflow-hidden">
        <!-- Glowing Orbs -->
        <div class="absolute top-0 left-0 w-full h-full">
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-primary-600/20 rounded-full blur-3xl animate-pulse-slow">
            </div>
            <div class="absolute bottom-1/4 right-1/4 w-72 h-72 bg-cyan-600/10 rounded-full blur-3xl animate-pulse-slow"
                style="animation-delay: 1s;"></div>
        </div>

        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 reveal-scale">
                <span
                    class="inline-block px-4 py-1 border border-white/20 text-white/60 rounded-full text-sm font-semibold mb-4">FAQ</span>
                <h2 class="font-heading text-3xl sm:text-4xl font-bold text-white mb-4">Pertanyaan Umum</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-primary-500 to-cyan-400 mx-auto rounded-full"></div>
            </div>

            <div class="space-y-4">
                <!-- FAQ 1 -->
                <div class="reveal-left faq-item glass rounded-2xl overflow-hidden backdrop-blur-md border border-white/10 hover:border-primary-500/50 "
                    style="transition-delay: 0.1s;">
                    <button onclick="toggleFaq(this)" class="w-full px-6 py-5 flex items-center justify-between group">
                        <div class="flex items-center space-x-4">
                            <span class="text-primary-400 text-xl">&#9889;</span>
                            <span class="font-heading font-semibold text-white text-left">Peluang karir setelah lulus
                                TI?</span>
                        </div>
                        <span
                            class="iconify faq-icon text-2xl text-white/50 group-hover:text-white transition-all duration-300"
                            data-icon="mdi:plus"></span>
                    </button>
                    <div class="faq-content px-6 overflow-hidden transition-all duration-300 max-h-0">
                        <div class="pb-5 pl-12">
                            <p class="text-white/60 leading-relaxed">Lulusan TI memiliki peluang karir yang sangat luas:
                                Software Engineer, Data Analyst, Network Engineer, UI/UX Designer, Project Manager, dan
                                masih banyak lagi.</p>
                        </div>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="reveal-left faq-item glass rounded-2xl overflow-hidden backdrop-blur-md border border-white/10 hover:border-primary-500/50 transition-all duration-300"
                    style="transition-delay: 0.2s;">
                    <button onclick="toggleFaq(this)" class="w-full px-6 py-5 flex items-center justify-between group">
                        <div class="flex items-center space-x-4">
                            <span class="text-cyan-400 text-xl">&#128161;</span>
                            <span class="font-heading font-semibold text-white text-left">Bagaimana TI mendukung
                                inovasi?</span>
                        </div>
                        <span
                            class="iconify faq-icon text-2xl text-white/50 group-hover:text-white transition-all duration-300"
                            data-icon="mdi:plus"></span>
                    </button>
                    <div class="faq-content px-6 overflow-hidden transition-all duration-300 max-h-0">
                        <div class="pb-5 pl-12">
                            <p class="text-white/60 leading-relaxed">TI menyediakan tools dan solusi digital yang
                                memungkinkan efisiensi, analisis data besar, dan otomatisasi proses yang mendorong inovasi
                                di segala bidang.</p>
                        </div>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="reveal-left faq-item glass rounded-2xl overflow-hidden backdrop-blur-md border border-white/10 hover:border-primary-500/50 transition-all duration-300"
                    style="transition-delay: 0.3s;">
                    <button onclick="toggleFaq(this)" class="w-full px-6 py-5 flex items-center justify-between group">
                        <div class="flex items-center space-x-4">
                            <span class="text-primary-400 text-xl">&#128221;</span>
                            <span class="font-heading font-semibold text-white text-left">Bagaimana cara daftar
                                HMTI?</span>
                        </div>
                        <span
                            class="iconify faq-icon text-2xl text-white/50 group-hover:text-white transition-all duration-300"
                            data-icon="mdi:plus"></span>
                    </button>
                    <div class="faq-content px-6 overflow-hidden transition-all duration-300 max-h-0">
                        <div class="pb-5 pl-12">
                            <p class="text-white/60 leading-relaxed">
                                Pendaftaran HMTI dapat dilakukan melalui formulir online yang dibuka setiap awal semester.
                                Informasi lengkap biasanya diumumkan melalui media sosial resmi dan website HMTI.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="reveal-left faq-item glass rounded-2xl overflow-hidden backdrop-blur-md border border-white/10 hover:border-primary-500/50 transition-all duration-300"
                    style="transition-delay: 0.4s;">
                    <button onclick="toggleFaq(this)" class="w-full px-6 py-5 flex items-center justify-between group">
                        <div class="flex items-center space-x-4">
                            <span class="text-cyan-400 text-xl">&#127919;</span>
                            <span class="font-heading font-semibold text-white text-left">Apa saja manfaat bergabung di
                                HMTI?</span>
                        </div>
                        <span
                            class="iconify faq-icon text-2xl text-white/50 group-hover:text-white transition-all duration-300"
                            data-icon="mdi:plus"></span>
                    </button>
                    <div class="faq-content px-6 overflow-hidden transition-all duration-300 max-h-0">
                        <div class="pb-5 pl-12">
                            <p class="text-white/60 leading-relaxed">
                                Anggota HMTI mendapatkan pengalaman organisasi, relasi luas, pelatihan teknis,
                                sertifikat kegiatan, serta kesempatan terlibat dalam proyek dan event kampus.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- FAQ 5 -->
                <div class="reveal-left faq-item glass rounded-2xl overflow-hidden backdrop-blur-md border border-white/10 hover:border-primary-500/50 transition-all duration-300"
                    style="transition-delay: 0.5s;">
                    <button onclick="toggleFaq(this)" class="w-full px-6 py-5 flex items-center justify-between group">
                        <div class="flex items-center space-x-4">
                            <span class="text-primary-400 text-xl">&#128197;</span>
                            <span class="font-heading font-semibold text-white text-left">Kapan pembukaan pendaftaran
                                anggota baru?</span>
                        </div>
                        <span
                            class="iconify faq-icon text-2xl text-white/50 group-hover:text-white transition-all duration-300"
                            data-icon="mdi:plus"></span>
                    </button>
                    <div class="faq-content px-6 overflow-hidden transition-all duration-300 max-h-0">
                        <div class="pb-5 pl-12">
                            <p class="text-white/60 leading-relaxed">
                                Biasanya dibuka pada awal semester ganjil. Namun, jadwal resmi mengikuti
                                keputusan kepengurusan periode berjalan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bengkel IT Section -->
    <section id="bengkel" class="py-24 bg-gradient-to-b from-white to-primary-50 relative overflow-hidden">
        <div class="absolute inset-0 opacity-50"
            style="background-image: radial-gradient(#7c3aed 1px, transparent 1px); background-size: 20px 20px;"></div>

        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 reveal-scale">
                <span
                    class="inline-block px-4 py-1 bg-dark-900 text-white rounded-full text-sm font-semibold mb-4">Services</span>
                <h2 class="font-heading text-3xl sm:text-4xl font-bold text-dark-900 mb-4">Bengkel IT</h2>
                <p class="text-gray-600 text-lg max-w-xl mx-auto">Kendala laptop, install ulang, atau butuh bantuan teknis?
                    Kami siap membantu!</p>
            </div>

            <div class="reveal-up bg-white rounded-3xl shadow-2xl p-8 sm:p-12 relative overflow-hidden"
                style="transition-delay: 0.2s;">
                <div class="absolute top-0 right-0 w-48 h-48 bg-primary-100 rounded-bl-full -z-0"></div>

                <form id="contact-form" class="relative z-10 space-y-6">
                    <div class="grid sm:grid-cols-2 gap-6">
                        <div class="group">
                            <label class="block text-dark-900 font-medium mb-2 text-sm">Nama Lengkap</label>
                            <input type="text" id="name" required
                                class="w-full px-4 py-3 border-2 border-gray-100 rounded-xl focus:border-primary-500 focus:ring-0 outline-none transition-all text-dark-900"
                                placeholder="Nama Anda">
                        </div>
                        <div class="group">
                            <label class="block text-dark-900 font-medium mb-2 text-sm">Kategori</label>
                            <select id="terkait" required
                                class="w-full px-4 py-3 border-2 border-gray-100 rounded-xl focus:border-primary-500 focus:ring-0 outline-none transition-all text-dark-900 bg-white">
                                <option value="" disabled selected>Pilih Kategori</option>
                                <option value="Install Ulang">Install Ulang OS</option>
                                <option value="Install Aplikasi">Install Aplikasi</option>
                                <option value="Konsultasi">Konsultasi IT</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="block text-dark-900 font-medium mb-2 text-sm">Keluhan Detail</label>
                        <textarea id="message" rows="4" required
                            class="w-full px-4 py-3 border-2 border-gray-100 rounded-xl focus:border-primary-500 focus:ring-0 outline-none transition-all resize-none text-dark-900"
                            placeholder="Jelaskan keluhan Anda..."></textarea>
                    </div>
                    <div class="text-center pt-4">
                        <button type="submit"
                            class="px-10 py-4 bg-dark-900 text-white rounded-full font-semibold hover:bg-primary-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl inline-flex items-center space-x-2">
                            <span>Kirim via WhatsApp</span>
                            <span class="iconify" data-icon="mdi:whatsapp"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        // 1. Particle Background
        const canvas = document.getElementById('particle-canvas');
        const ctx = canvas.getContext('2d');
        let particles = [];

        function resizeCanvas() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }

        class Particle {
            constructor() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.size = Math.random() * 2 + 0.5;
                this.speedX = Math.random() * 0.5 - 0.25;
                this.speedY = Math.random() * 0.5 - 0.25;
                this.opacity = Math.random() * 0.5 + 0.1;
            }
            update() {
                this.x += this.speedX;
                this.y += this.speedY;
                if (this.x > canvas.width || this.x < 0) this.speedX *= -1;
                if (this.y > canvas.height || this.y < 0) this.speedY *= -1;
            }
            draw() {
                ctx.fillStyle = `rgba(255, 255, 255, ${this.opacity})`;
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fill();
            }
        }

        function initParticles() {
            resizeCanvas();
            particles = [];
            for (let i = 0; i < 80; i++) {
                particles.push(new Particle());
            }
        }

        function animateParticles() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            for (let i = 0; i < particles.length; i++) {
                particles[i].update();
                particles[i].draw();
            }
            requestAnimationFrame(animateParticles);
        }

        window.addEventListener('resize', resizeCanvas);
        initParticles();
        animateParticles();

        // 2. Typed Text
        const typedText = document.getElementById('typed-text');
        const phrases = ['Inovatif, Kreatif, Interaktif ', 'Bersama Membangun Ekosistem TI ',
        'Jadi Bagian dari Perubahan '];
        let pIndex = 0,
            cIndex = 0,
            isDeleting = false;

        function type() {
            const current = phrases[pIndex];
            typedText.textContent = isDeleting ? current.substring(0, cIndex--) : current.substring(0, cIndex++);
            let speed = isDeleting ? 30 : 80;
            if (!isDeleting && cIndex === current.length) {
                speed = 2000;
                isDeleting = true;
            } else if (isDeleting && cIndex === 0) {
                isDeleting = false;
                pIndex = (pIndex + 1) % phrases.length;
                speed = 400;
            }
            setTimeout(type, speed);
        }
        setTimeout(type, 1500);

        // 3. Counters
        const counters = document.querySelectorAll('.counter');
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const target = +entry.target.getAttribute('data-target');
                    let current = 0;
                    const increment = target / 50;
                    const update = () => {
                        current += increment;
                        entry.target.textContent = Math.ceil(current);
                        if (current < target) requestAnimationFrame(update);
                        else entry.target.textContent = target;
                    };
                    update();
                    counterObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.5
        });
        counters.forEach(c => counterObserver.observe(c));

        // 4. Reveal Animations
        const revealElements = document.querySelectorAll('.reveal-up, .reveal-left, .reveal-right, .reveal-scale');
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, {
            threshold: 0.1
        });
        revealElements.forEach(el => revealObserver.observe(el));



        // 5. FAQ Toggle (Accordion - One open at a time per section)
        window.toggleFaq = function(button) {
            const item = button.closest('.faq-item');
            const content = item.querySelector('.faq-content');
            const icon = item.querySelector('.faq-icon');
            const isActive = item.classList.contains('active');

            // Get parent container to close siblings
            const parentContainer = item.parentElement;
            const allItems = parentContainer.querySelectorAll('.faq-item');

            // Close all other items in the same container
            allItems.forEach(i => {
                if (i !== item) {
                    i.classList.remove('active');
                    i.querySelector('.faq-content').style.maxHeight = null;
                    i.querySelector('.faq-icon').setAttribute('data-icon', 'mdi:plus');
                }
            });

            // Toggle current item
            if (!isActive) {
                item.classList.add('active');
                content.style.maxHeight = content.scrollHeight + "px";
                icon.setAttribute('data-icon', 'mdi:minus');
            } else {
                item.classList.remove('active');
                content.style.maxHeight = null;
                icon.setAttribute('data-icon', 'mdi:plus');
            }
        }

        // 6. Modal
        window.openModal = function() {
            const modal = document.getElementById('modal');
            const content = document.getElementById('modal-content');
            modal.classList.remove('hidden');
            setTimeout(() => {
                content.classList.remove('scale-95', 'opacity-0');
                content.classList.add('scale-100', 'opacity-100');
            }, 10);
            document.body.style.overflow = 'hidden';
        }

        window.closeModal = function() {
            const modal = document.getElementById('modal');
            const content = document.getElementById('modal-content');
            content.classList.remove('scale-100', 'opacity-100');
            content.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = '';
            }, 300);
        }

        // 7. Form WA
        const form = document.getElementById('contact-form');
        if (form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const name = document.getElementById('name').value;
                const cat = document.getElementById('terkait').value;
                const msg = document.getElementById('message').value;
                const wa = '6285161334009'; // Ganti Nomor WA
                const text = `Halo Admin HMTI, saya *${name}*.\n\n*Kategori*: ${cat}\n\n*Pesan*:\n${msg}`;
                window.open(`https://wa.me/${wa}?text=${encodeURIComponent(text)}`, '_blank');
            });
        }
    </script>

    <style>
        /* Marquee Animation */
        @keyframes marquee-right {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        @keyframes marquee-left {
            0% {
                transform: translateX(-50%);
            }

            100% {
                transform: translateX(0);
            }
        }

        .animate-marquee-right {
            animation: marquee-right 30s linear infinite;
        }

        .animate-marquee-left {
            animation: marquee-left 30s linear infinite;
        }
    </style>
@endsection
