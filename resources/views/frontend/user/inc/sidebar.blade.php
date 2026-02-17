<div class="sticky top-24 space-y-8">
    {{-- Widget Search --}}
    <div class="bg-dark-800/50 backdrop-blur-sm border border-white/10 rounded-2xl p-6">
        <h3 class="font-heading text-lg font-bold text-white mb-4">Cari</h3>
        <form action="{{ route('frontend.search') }}" method="GET">
            <div class="relative">
                <input type="text" name="q" placeholder="Search..."
                    class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/40 focus:ring-2 focus:ring-primary-500 outline-none transition-all">
                <button type="submit"
                    class="absolute right-3 top-1/2 -translate-y-1/2 text-white/40 hover:text-white transition-colors">
                    <span class="iconify text-xl" data-icon="mdi:magnify"></span>
                </button>
            </div>
        </form>
    </div>

    {{-- Widget Kategori --}}
    <x-frontend.sidebar-category />

    {{-- Widget Popular Posts --}}
    <x-frontend.popular-posts />

    {{-- Widget Social Media --}}
    {{-- <x-frontend.sidebar-social /> --}}

    {{-- Widget Tags --}}
    <x-frontend.tags />
</div>
