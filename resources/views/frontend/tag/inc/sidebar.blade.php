<div class="sticky top-24 space-y-8">
    {{-- Contoh Widget Search --}}
    <div class="bg-dark-800/50 backdrop-blur-sm border border-white/10 rounded-2xl p-6">
        <h3 class="font-heading text-lg font-bold text-white mb-4">Search</h3>
        <form action="{{ route('frontend.search') }}" method="GET">
            <div class="relative">
                <input type="text" name="q" placeholder="Search..."
                    class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/40 focus:ring-2 focus:ring-primary-500 outline-none">
                <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-white/40 hover:text-white">
                    <span class="iconify text-xl" data-icon="mdi:magnify"></span>
                </button>
            </div>
        </form>
    </div>

    {{-- Contoh Widget Lainnya --}}
    <x-frontend.sidebar-category />
    <x-frontend.popular-posts />

    {{-- Anda bisa menambahkan widget lain di sini --}}
</div>
