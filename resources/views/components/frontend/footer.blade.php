<footer class="bg-dark-900 pt-16 pb-8 border-t border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-3 gap-12 mb-12">
            <!-- About -->
            <div>
                <a href="#" class="flex items-center space-x-3 mb-6">
                    <img src="{{ asset('assets/homepage/logo-himpunan.png') }}" alt="Logo HMTI" class="h-16 w-auto">
                    <span class="font-heading font-bold text-2xl text-white">HMTI</span>
                </a>
                <div class="text-white/60 space-y-2">
                    <p>Jl. Raya Kaliabang N0.8 Perwira</p>
                    <p>Bekasi Utara 17142, West Java</p>
                    <p>Indonesia</p>
                    <p class="pt-4">
                        <span class="iconify inline mr-2" data-icon="mdi:phone"></span>
                        +62 21 88985633
                    </p>
                    <p>
                        <span class="iconify inline mr-2" data-icon="mdi:email-outline"></span>
                        hmti.kaliabang@gmail.com
                    </p>
                </div>
            </div>

            <!-- About Links -->
            <div>
                <h4 class="font-heading font-semibold text-white text-lg mb-6">Halaman</h4>
                <div class="space-y-3">
                    <a href="{{ route('frontend.home') }}"
                        class="block text-white/60 hover:text-white transition-colors">Beranda</a>
                    <a href="{{ route('frontend.news') }}"
                        class="block text-white/60 hover:text-white transition-colors">News</a>
                    <a href="#join" class="block text-white/60 hover:text-white transition-colors">Join HMTI</a>
                    <a href="https://www.bsi.ac.id/" target="_blank"
                        class="block text-white/60 hover:text-white transition-colors">BSI
                        Universitas</a>
                    <a href="https://www.kemendikbudristek.com/" target="_blank"
                        class="block text-white/60 hover:text-white transition-colors">Kampus Merdeka</a>
                </div>
            </div>

            <!-- Social -->
            <div>
                <h4 class="font-heading font-semibold text-white text-lg mb-6">Ikuti Kami</h4>
                <div class="flex space-x-4">
                    <a href="#"
                        class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center hover:bg-primary-600 transition-colors group">
                        <span class="iconify text-2xl text-white/60 group-hover:text-white"
                            data-icon="mdi:whatsapp"></span>
                    </a>
                    <a href="https://www.instagram.com/hmti.kaliabang/" target="_blank"
                        class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center hover:bg-primary-600 transition-colors group">
                        <span class="iconify text-2xl text-white/60 group-hover:text-white"
                            data-icon="mdi:instagram"></span>
                    </a>
                    {{-- Youtube --}}
                    <a href="#" target="_blank"
                        class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center hover:bg-primary-600 transition-colors group">
                        <span class="iconify text-2xl text-white/60 group-hover:text-white"
                            data-icon="mdi:youtube"></span>
                    </a>
                    <a href="#" target="_blank"
                        class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center hover:bg-primary-600 transition-colors group">
                        <span class="iconify text-2xl text-white/60 group-hover:text-white"
                            data-icon="mdi:linkedin"></span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="border-t border-white/10 pt-8 text-center">
            <p class="text-white/40">
                @yield('copyright', config('app.sitesettings')::first()?->copyright_text)
            </p>
        </div>
    </div>
</footer>
