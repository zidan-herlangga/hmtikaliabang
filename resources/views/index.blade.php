@extends('frontend.master')

@section('title')

@section('content')
    <!-- Scroll to Top -->
    <button id="scroll-top"
        class="fixed bottom-8 right-8 w-12 h-12 bg-primary-600 text-white rounded-full shadow-lg opacity-0 invisible transition-all duration-300 hover:bg-primary-700 z-50 flex items-center justify-center">
        <span class="iconify text-2xl" data-icon="mdi:chevron-up"></span>
    </button>

    <!-- Hero Section -->
    <section id="beranda" class="relative min-h-screen flex items-center gradient-bg wave-container overflow-hidden">
        <!-- Background Elements (Sama seperti kode asli) -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-20 left-10 w-72 h-72 bg-primary-400/20 rounded-full blur-3xl animate-pulse-slow"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-accent-400/10 rounded-full blur-3xl animate-pulse-slow"
                style="animation-delay: 2s;"></div>
        </div>
        <div class="absolute inset-0 opacity-10"
            style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 40px 40px;">
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="text-center lg:text-left order-2 lg:order-1">
                    <h1 class="font-heading text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight mb-6">
                        Himpunan Mahasiswa
                        <span
                            class="block text-transparent bg-clip-text bg-gradient-to-r from-white to-primary-200">Teknologi
                            Informasi</span>
                    </h1>
                    <p class="text-xl sm:text-2xl text-white/80 mb-8 font-light">
                        <span id="typed-text"></span><span class="animate-pulse">|</span>
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="#tentang"
                            class="px-8 py-4 bg-white text-primary-700 rounded-full font-semibold hover:shadow-2xl hover:shadow-white/20 transition-all duration-300 transform hover:scale-105 inline-flex items-center justify-center space-x-2">
                            <span>Explore</span> <span class="iconify" data-icon="mdi:arrow-right"></span>
                        </a>
                        <a href="#divisi"
                            class="px-8 py-4 border-2 border-white/30 rounded-full font-semibold hover:bg-white/10 transition-all duration-300 inline-flex items-center justify-center">
                            Lihat Divisi
                        </a>
                    </div>
                </div>
                <div class="order-1 lg:order-2 flex justify-center items-center space-x-8">
                    <img src="{{ asset('assets/homepage/logo-himpunan.png') }}" alt="Logo HMTI"
                        class="h-40 sm:h-56 w-auto animate-float drop-shadow-2xl">
                    <img src="{{ asset('assets/homepage/logo-universitas-bina-sarana-informatika-ubsi.png') }}"
                        alt="Logo UBSI" class="h-40 sm:h-56 w-auto animate-float-delay drop-shadow-2xl">
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="tentang" class="py-24 bg-primary-50 relative overflow-hidden">
        <!-- Konten Tentang Sama Persis Seperti Kode Asli Anda -->
        <div class="absolute inset-0 opacity-50"
            style="background-image: radial-gradient(circle at 1px 1px, #7c3aed 1px, transparent 0); background-size: 30px 30px;">
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 reveal">
                <h2 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-dark-900 mb-4">Tentang Kami</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-primary-500 to-accent-400 mx-auto rounded-full"></div>
            </div>
            <div class="grid lg:grid-cols-2 gap-12 items-start">
                <div class="reveal" style="transition-delay: 0.1s;">
                    <p class="text-gray-700 text-lg leading-relaxed text-justify">Himpunan Mahasiswa Teknologi Informasi
                        (HMTI) adalah wadah aspirasi dan pelayanan bagi mahasiswa Jurusan Teknologi Informasi. HMTI
                        didirikan pada tanggal 02 Februari 2020 bertempat di Jakarta. Himpunan Mahasiswa Teknologi Informasi
                        terbentuk dengan dilatar belakangi oleh kebutuhan mahasiswa program studi Teknologi Informasi untuk
                        terciptanya lingkungan yang mendukung pengembangan skill mahasiswa pada program studi tersebut
                        sebagai calon teknisi dan akademisi aktif yang akan turun ke tengah-tengah masyarakat.</p>
                </div>
                <div class="reveal" style="transition-delay: 0.2s;">
                    <p class="text-gray-700 text-lg leading-relaxed text-justify">Terbentuknya HMTI adalah sebagai salah
                        satu wadah organisasi yang sangat dibutuhkan oleh seluruh mahasiswa Teknologi Informasi Universitas
                        Bina Sarana Informatika untuk mencurahkan ide-ide brilian dan mengembangkan kemampuan mereka dalam
                        menguasai materi-materi informatika, dan mengembangkan kreativitas yang tidak hanya bersifat
                        teoritis, sehingga mereka menjadi akademisi yang profesional dan patut diteladani.</p>
                    <button onclick="openModal()"
                        class="mt-6 inline-flex items-center space-x-2 text-primary-600 font-semibold hover:text-primary-700 transition-colors group">
                        <span>Lanjut Baca</span> <span
                            class="iconify transform group-hover:translate-x-1 transition-transform"
                            data-icon="mdi:arrow-right"></span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="fixed inset-0 bg-black/60 backdrop-blur-sm" onclick="closeModal()"></div>
        <div class="relative min-h-screen flex items-center justify-center p-4">
            <div class="relative bg-white rounded-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto shadow-2xl">
                <div class="sticky top-0 bg-white border-b px-6 py-4 flex justify-between items-center">
                    <h3 class="font-heading text-xl font-bold text-dark-900">Tentang HMTI</h3>
                    <button onclick="closeModal()" class="p-2 hover:bg-gray-100 rounded-full transition-colors">
                        <span class="iconify text-2xl text-gray-500" data-icon="mdi:close"></span>
                    </button>
                </div>
                <div class="p-6 space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <p class="text-gray-700 text-justify">Himpunan Mahasiswa Teknologi Informasi (HMTI) adalah wadah
                            aspirasi dan pelayanan bagi mahasiswa Jurusan Teknologi Informasi. HMTI didirikan pada tanggal
                            02 Februari 2020 bertempat di Jakarta.</p>
                        <p class="text-gray-700 text-justify">Terbentuknya HMTI adalah sebagai salah satu wadah organisasi
                            yang sangat dibutuhkan oleh seluruh mahasiswa Teknologi Informasi Universitas Bina Sarana
                            Informatika untuk mencurahkan ide-ide brilian.</p>
                        <p class="text-gray-700 text-justify">Memperhatikan realita kemampuan mahasiswa dalam mengelola
                            kepribadian serta kemampuan intelektual dalam sisi akademisi aktif dilingkungan perkuliahan,
                            baik dalam segi teknisi informasi, berkomunikasi atau public speaking dan lain-lain.</p>
                        <p class="text-gray-700 text-justify">HMTI bertempat di Universitas Bina Sarana Informatika Kramat
                            di Jl. Kramat Raya No. 98 RT.18/RW.1, Paseban, kecamatan Senen, Kota Jakarta pusat, Daerah
                            Khusus Ibukota Jakarta 10420.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Visi Misi Section -->
    <section class="py-24 bg-white relative overflow-hidden">
        <!-- Salin kode Visi Misi dari sumber asli Anda di sini -->
        <!-- Pastikan class "reveal" ada untuk animasi -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-primary-100 rounded-full blur-3xl opacity-50"></div>
        <div class="absolute bottom-0 left-0 w-72 h-72 bg-accent-400/10 rounded-full blur-3xl"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="reveal" style="transition-delay: 0.1s;">
                    <img src="{{ asset('assets/homepage/img/skills.png') }}" alt="Skills"
                        class="w-full max-w-md mx-auto drop-shadow-2xl">
                </div>
                <div class="reveal" style="transition-delay: 0.2s;">
                    <h3 class="font-heading text-3xl font-bold text-dark-900 mb-8">Visi & Misi</h3>
                    <div class="space-y-4">
                        <!-- Visi Item -->
                        <div class="faq-item active border border-gray-200 rounded-xl overflow-hidden">
                            <button onclick="toggleFaq(this)"
                                class="w-full px-6 py-4 flex items-center justify-between bg-primary-50 hover:bg-primary-100 transition-colors">
                                <span class="font-heading font-semibold text-lg text-dark-900">Visi</span>
                                <span class="iconify faq-icon text-2xl text-primary-600 transition-transform duration-300"
                                    data-icon="mdi:chevron-down"></span>
                            </button>
                            <div class="faq-content px-6 bg-white">
                                <p class="py-4 text-gray-700">Menjadikan HMTI sebagai wadah aspirasi dan pelayanan demi
                                    mewujudkan mahasiswa teknologi informasi yang aktif, kreatif, kompetitif,
                                    bertanggungjawab, dan berwawasan luas agar mampu bersaing dalam perkembangan teknologi.
                                </p>
                            </div>
                        </div>
                        <!-- Misi Item -->
                        <div class="faq-item border border-gray-200 rounded-xl overflow-hidden">
                            <button onclick="toggleFaq(this)"
                                class="w-full px-6 py-4 flex items-center justify-between hover:bg-gray-50 transition-colors">
                                <span class="font-heading font-semibold text-lg text-dark-900">Misi</span>
                                <span class="iconify faq-icon text-2xl text-primary-600 transition-transform duration-300"
                                    data-icon="mdi:chevron-down"></span>
                            </button>
                            <div class="faq-content px-6 bg-white">
                                <ul class="py-4 text-gray-700 space-y-3">
                                    <li class="flex items-start space-x-3"><span class="iconify text-primary-500 mt-1"
                                            data-icon="mdi:check-circle"></span><span>Meningkatkan kontribusi HMTI kepada
                                            lingkungan kampus serta masyarakat luas terutama dibidang Teknologi
                                            Informasi.</span></li>
                                    <li class="flex items-start space-x-3"><span class="iconify text-primary-500 mt-1"
                                            data-icon="mdi:check-circle"></span><span>Menciptakan prestasi atau akademisi
                                            yang kreatif dan inovatif dari berbagai aspek, baik akademik ataupun non
                                            akademik.</span></li>
                                    <li class="flex items-start space-x-3"><span class="iconify text-primary-500 mt-1"
                                            data-icon="mdi:check-circle"></span><span>Menanamkan sikap disiplin dan
                                            bertanggung jawab dalam berorganisasi kepada setiap anggota.</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Counter Section -->
            <div class="mt-16 reveal" style="transition-delay: 0.3s;">
                <div class="bg-gradient-to-r from-primary-600 via-primary-700 to-primary-800 rounded-2xl p-8 sm:p-12">
                    <div class="grid grid-cols-3 gap-8 text-center">
                        <div>
                            <h2 class="font-heading text-4xl sm:text-5xl font-bold text-white counter" data-target="25">0
                            </h2>
                            <p class="text-white/80 mt-2 font-medium">Proker</p>
                        </div>
                        <div>
                            <h2 class="font-heading text-4xl sm:text-5xl font-bold text-white counter" data-target="3">0
                            </h2>
                            <p class="text-white/80 mt-2 font-medium">Divisi</p>
                        </div>
                        <div>
                            <h2 class="font-heading text-4xl sm:text-5xl font-bold text-white counter" data-target="150">0
                            </h2>
                            <p class="text-white/80 mt-2 font-medium">Anggota</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Divisi Section -->
    <section id="divisi" class="py-24 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-30"
            style="background-image: radial-gradient(circle at 1px 1px, #7c3aed 1px, transparent 0); background-size: 40px 40px;">
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Title -->
            <div class="text-center mb-16 reveal">
                <h2 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-dark-900 mb-4">
                    Divisi HMTI
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-primary-500 to-accent-400 mx-auto rounded-full"></div>
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                    Tiga pilar utama yang menjalankan roda organisasi untuk mencapai visi dan misi.
                </p>
            </div>

            <!-- Divisi Cards -->
            <div class="grid md:grid-cols-3 gap-8">

                <!-- Divisi Kominfo -->
                <div class="reveal group" style="transition-delay: 0.1s;">
                    <div
                        class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 h-full transform hover:-translate-y-2">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg shadow-blue-500/30">
                            <span class="iconify text-3xl text-white" data-icon="mdi:bullhorn-outline"></span>
                        </div>
                        <h4 class="font-heading text-xl font-bold text-dark-900 mb-4">Divisi Kominfo</h4>
                        <p class="text-gray-600 leading-relaxed mb-6">
                            Divisi Komunikasi dan Informasi (Kominfo) bertanggung jawab dalam penyebaran informasi,
                            publikasi kegiatan, pengelolaan media sosial, serta menjalin hubungan masyarakat.
                        </p>
                        <a href="#"
                            class="inline-flex items-center space-x-2 text-blue-600 font-semibold hover:text-blue-700 transition-colors group/link">
                            <span>Selengkapnya</span>
                            <span class="iconify transform group-hover/link:translate-x-1 transition-transform"
                                data-icon="mdi:arrow-right"></span>
                        </a>
                    </div>
                </div>

                <!-- Divisi PSDM -->
                <div class="reveal group" style="transition-delay: 0.2s;">
                    <div
                        class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 h-full transform hover:-translate-y-2">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg shadow-emerald-500/30">
                            <span class="iconify text-3xl text-white" data-icon="mdi:account-group-outline"></span>
                        </div>
                        <h4 class="font-heading text-xl font-bold text-dark-900 mb-4">Divisi PSDM</h4>
                        <p class="text-gray-600 leading-relaxed mb-6">
                            Divisi Pengembangan Sumber Daya Mahasiswa (PSDM) berfokus pada pengembangan soft skills,
                            leadership, serta pengaderan anggota baru untuk mencetak generasi penerus yang berkualitas.
                        </p>
                        <a href="#"
                            class="inline-flex items-center space-x-2 text-emerald-600 font-semibold hover:text-emerald-700 transition-colors group/link">
                            <span>Selengkapnya</span>
                            <span class="iconify transform group-hover/link:translate-x-1 transition-transform"
                                data-icon="mdi:arrow-right"></span>
                        </a>
                    </div>
                </div>

                <!-- Divisi Litbang -->
                <div class="reveal group" style="transition-delay: 0.3s;">
                    <div
                        class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 h-full transform hover:-translate-y-2">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-primary-600 to-primary-800 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg shadow-primary-500/30">
                            <span class="iconify text-3xl text-white" data-icon="mdi:lightbulb-outline"></span>
                        </div>
                        <h4 class="font-heading text-xl font-bold text-dark-900 mb-4">Divisi Litbang</h4>
                        <p class="text-gray-600 leading-relaxed mb-6">
                            Divisi Penelitian dan Pengembangan (Litbang) merupakan wadah bagi anggota untuk melakukan riset,
                            inovasi teknologi, serta mengembangkan proyek-proyek kreatif bermanfaat.
                        </p>
                        <a href="#"
                            class="inline-flex items-center space-x-2 text-primary-600 font-semibold hover:text-primary-700 transition-colors group/link">
                            <span>Selengkapnya</span>
                            <span class="iconify transform group-hover/link:translate-x-1 transition-transform"
                                data-icon="mdi:arrow-right"></span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="py-24 bg-dark-900 relative overflow-hidden">
        <!-- Background -->
        <div class="absolute inset-0">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-primary-600/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-1/4 w-72 h-72 bg-accent-400/5 rounded-full blur-3xl"></div>
        </div>

        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Title -->
            <div class="text-center mb-16 reveal">
                <h2 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4">Pertanyaan yang
                    Sering Diajukan</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-primary-500 to-accent-400 mx-auto rounded-full"></div>
            </div>

            <!-- FAQ Items -->
            <div class="space-y-4">
                <!-- FAQ 1 -->
                <div class="reveal faq-item glass rounded-xl overflow-hidden" style="transition-delay: 0.1s;">
                    <button onclick="toggleFaq(this)"
                        class="w-full px-6 py-5 flex items-center justify-between hover:bg-white/5 transition-colors">
                        <div class="flex items-center space-x-4">
                            <span class="iconify text-2xl text-primary-400" data-icon="mdi:help-circle-outline"></span>
                            <span class="font-heading font-semibold text-white text-left">Apa saja peluang karir
                                yang bisa didapatkan setelah lulus dari jurusan Teknologi Informasi?</span>
                        </div>
                        <span class="iconify faq-icon text-2xl text-primary-400 transition-transform duration-300"
                            data-icon="mdi:chevron-down"></span>
                    </button>
                    <div class="faq-content px-6">
                        <p class="py-4 text-white/70 leading-relaxed">
                            Lulusan jurusan Teknologi Informasi memiliki banyak peluang karir, termasuk posisi
                            sebagai administrator sistem, analis data, pengembang perangkat lunak, spesialis
                            keamanan siber, manajer TI, dan konsultan teknologi. Permintaan yang terus meningkat
                            akan solusi digital dan manajemen data memastikan bahwa profesional TI dapat menemukan
                            berbagai jalur karir yang menjanjikan di berbagai industri.
                        </p>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="reveal faq-item glass rounded-xl overflow-hidden" style="transition-delay: 0.2s;">
                    <button onclick="toggleFaq(this)"
                        class="w-full px-6 py-5 flex items-center justify-between hover:bg-white/5 transition-colors">
                        <div class="flex items-center space-x-4">
                            <span class="iconify text-2xl text-primary-400" data-icon="mdi:help-circle-outline"></span>
                            <span class="font-heading font-semibold text-white text-left">Bagaimana jurusan
                                Teknologi Informasi mendukung inovasi dan kreativitas?</span>
                        </div>
                        <span class="iconify faq-icon text-2xl text-primary-400 transition-transform duration-300"
                            data-icon="mdi:chevron-down"></span>
                    </button>
                    <div class="faq-content px-6">
                        <p class="py-4 text-white/70 leading-relaxed">
                            Jurusan Teknologi Informasi menawarkan banyak kesempatan untuk berinovasi dan berkreasi.
                            Mahasiswa dapat terlibat dalam pengembangan sistem informasi yang efisien, desain
                            arsitektur jaringan, atau penerapan teknologi terbaru seperti kecerdasan buatan (AI) dan
                            Internet of Things (IoT).
                        </p>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="reveal faq-item glass rounded-xl overflow-hidden" style="transition-delay: 0.3s;">
                    <button onclick="toggleFaq(this)"
                        class="w-full px-6 py-5 flex items-center justify-between hover:bg-white/5 transition-colors">
                        <div class="flex items-center space-x-4">
                            <span class="iconify text-2xl text-primary-400" data-icon="mdi:help-circle-outline"></span>
                            <span class="font-heading font-semibold text-white text-left">Apakah gaji di bidang
                                Teknologi Informasi kompetitif dibandingkan dengan bidang lainnya?</span>
                        </div>
                        <span class="iconify faq-icon text-2xl text-primary-400 transition-transform duration-300"
                            data-icon="mdi:chevron-down"></span>
                    </button>
                    <div class="faq-content px-6">
                        <p class="py-4 text-white/70 leading-relaxed">
                            Ya, gaji di bidang Teknologi Informasi cenderung sangat kompetitif. Posisi seperti
                            analis data, manajer TI, dan spesialis keamanan siber sering kali mendapatkan kompensasi
                            yang menarik, mengingat keterampilan teknis yang dibutuhkan dan permintaan yang tinggi
                            untuk profesional TI.
                        </p>
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="reveal faq-item glass rounded-xl overflow-hidden" style="transition-delay: 0.4s;">
                    <button onclick="toggleFaq(this)"
                        class="w-full px-6 py-5 flex items-center justify-between hover:bg-white/5 transition-colors">
                        <div class="flex items-center space-x-4">
                            <span class="iconify text-2xl text-primary-400" data-icon="mdi:help-circle-outline"></span>
                            <span class="font-heading font-semibold text-white text-left">Seberapa fleksibel
                                pekerjaan di bidang Teknologi Informasi?</span>
                        </div>
                        <span class="iconify faq-icon text-2xl text-primary-400 transition-transform duration-300"
                            data-icon="mdi:chevron-down"></span>
                    </button>
                    <div class="faq-content px-6">
                        <p class="py-4 text-white/70 leading-relaxed">
                            Banyak pekerjaan di bidang Teknologi Informasi menawarkan fleksibilitas tinggi, seperti
                            opsi untuk bekerja dari jarak jauh, jam kerja yang fleksibel, atau sistem kerja hybrid.
                            Fleksibilitas ini memungkinkan karyawan TI untuk menyesuaikan jadwal kerja dengan
                            kebutuhan pribadi mereka.
                        </p>
                    </div>
                </div>

                <!-- FAQ 5 -->
                <div class="reveal faq-item glass rounded-xl overflow-hidden" style="transition-delay: 0.5s;">
                    <button onclick="toggleFaq(this)"
                        class="w-full px-6 py-5 flex items-center justify-between hover:bg-white/5 transition-colors">
                        <div class="flex items-center space-x-4">
                            <span class="iconify text-2xl text-primary-400" data-icon="mdi:help-circle-outline"></span>
                            <span class="font-heading font-semibold text-white text-left">Bagaimana peran Teknologi
                                Informasi dalam transformasi digital?</span>
                        </div>
                        <span class="iconify faq-icon text-2xl text-primary-400 transition-transform duration-300"
                            data-icon="mdi:chevron-down"></span>
                    </button>
                    <div class="faq-content px-6">
                        <p class="py-4 text-white/70 leading-relaxed">
                            Teknologi Informasi berperan penting dalam transformasi digital dengan menyediakan alat
                            dan solusi yang memungkinkan organisasi untuk mengoptimalkan operasi mereka dan
                            beradaptasi dengan perubahan teknologi. Ini termasuk pengembangan dan penerapan sistem
                            informasi yang mendukung otomatisasi, analisis data besar, dan integrasi berbagai
                            platform digital.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bengkel IT Section -->
    <section id="bengkel" class="py-24 bg-primary-50 relative overflow-hidden">
        <div class="absolute inset-0 opacity-30"
            style="background-image: radial-gradient(circle at 1px 1px, #7c3aed 1px, transparent 0); background-size: 40px 40px;">
        </div>

        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Title -->
            <div class="text-center mb-16 reveal">
                <h2 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-dark-900 mb-4">Bengkel IT
                </h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Punya keluhan mengenai install ulang, install aplikasi, dan masalah lainnya? Yuk, isi kolom
                    dibawah ini untuk hubungi kami:
                </p>
            </div>

            <!-- Form -->
            <div class="reveal bg-white rounded-2xl shadow-xl p-8 sm:p-12" style="transition-delay: 0.2s;">
                <form id="contact-form" class="space-y-6">
                    <div class="grid sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-dark-900 font-medium mb-2">Nama Lengkap</label>
                            <input type="text" id="name" required
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition-all text-dark-900"
                                placeholder="Masukkan nama lengkap">
                        </div>
                        <div>
                            <label class="block text-dark-900 font-medium mb-2">Terkait</label>
                            <select id="terkait" required
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition-all text-dark-900">
                                <option value="" disabled selected>Pilih masalah</option>
                                <option value="Install Ulang">Install Ulang</option>
                                <option value="Install Aplikasi">Install Aplikasi</option>
                                <option value="Masalah Lain">Masalah Lain</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="block text-dark-900 font-medium mb-2">Keluhan</label>
                        <textarea id="message" rows="5" required
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition-all resize-none text-dark-900"
                            placeholder="Jelaskan keluhan Anda..."></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit"
                            class="px-8 py-4 bg-gradient-to-r from-primary-600 to-primary-500 text-white rounded-full font-semibold hover:shadow-lg hover:shadow-primary-500/25 transition-all duration-300 transform hover:scale-105 inline-flex items-center space-x-2">
                            <span>Kirim Pesan</span>
                            <span class="iconify" data-icon="mdi:send"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script>
        // Typed Text Animation
        const typedText = document.getElementById('typed-text');
        const phrases = ['Aktif, Kreatif, Inovatif', 'Bersama Membangun Masa Depan', 'Teknologi Untuk Indonesia'];
        let phraseIndex = 0,
            charIndex = 0,
            isDeleting = false,
            typingSpeed = 100;

        function typeText() {
            const currentPhrase = phrases[phraseIndex];
            if (isDeleting) {
                typedText.textContent = currentPhrase.substring(0, charIndex - 1);
                charIndex--;
                typingSpeed = 50;
            } else {
                typedText.textContent = currentPhrase.substring(0, charIndex + 1);
                charIndex++;
                typingSpeed = 100;
            }
            if (!isDeleting && charIndex === currentPhrase.length) {
                typingSpeed = 2000;
                isDeleting = true;
            } else if (isDeleting && charIndex === 0) {
                isDeleting = false;
                phraseIndex = (phraseIndex + 1) % phrases.length;
                typingSpeed = 500;
            }
            setTimeout(typeText, typingSpeed);
        }
        setTimeout(typeText, 1000);

        // Counter Animation
        function animateCounters() {
            const counters = document.querySelectorAll('.counter');
            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-target'));
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            let current = 0;
                            const step = target / (2000 / 16);
                            const updateCounter = () => {
                                current += step;
                                if (current < target) {
                                    counter.textContent = Math.floor(current);
                                    requestAnimationFrame(updateCounter);
                                } else {
                                    counter.textContent = target;
                                }
                            };
                            updateCounter();
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.5
                });
                observer.observe(counter);
            });
        }
        animateCounters();

        // Form Handler (Bengkel IT)
        const contactForm = document.getElementById('contact-form');
        if (contactForm) {
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const name = document.getElementById('name').value;
                const terkait = document.getElementById('terkait').value;
                const message = document.getElementById('message').value;
                const waNumber = '6285161334009'; // Ganti dengan nomor WA asli
                const waMessage =
                    `Saya dari web site HMTI Kaliabang%0A%0AHalo, saya ${name}.%0A%0ATerkait: ${terkait}%0A%0AKeluhan:%0A${message}`;
                window.open(`https://wa.me/${waNumber}?text=${waMessage}`, '_blank');
                this.reset();
            });
        }
    </script>
@endsection
