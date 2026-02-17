<!-- Categories Widget -->
<div class="w-full">
    <!-- Widget Title -->
    <div class="mb-6">
        <h5 class="font-heading text-lg font-semibold text-white relative inline-block">
            Categories
            <span
                class="absolute bottom-0 left-0 w-12 h-0.5 bg-gradient-to-r from-primary-500 to-accent-400 rounded-full -mb-1"></span>
        </h5>
    </div>

    <!-- Widget Content -->
    @if ($categories->count() > 0)
        <div class="grid grid-cols-2 gap-3">
            @foreach ($categories as $category)
                <a href="{{ route('frontend.category', $category->slug) }}"
                    class="group relative block rounded-xl overflow-hidden aspect-square shadow-lg">

                    <!-- Background Image -->
                    <img src="{{ asset('uploads/category/' . ($category->image ?? 'default.webp')) }}"
                        alt="{{ $category->title }}"
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-110">

                    <!-- Gradient Overlay -->
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-dark-900 via-dark-900/60 to-transparent opacity-80 group-hover:opacity-90 transition-opacity duration-300">
                    </div>

                    <!-- Content -->
                    <div class="absolute inset-0 p-4 flex flex-col justify-end">
                        <h6
                            class="font-heading font-semibold text-white text-sm sm:text-base leading-tight group-hover:text-primary-300 transition-colors duration-300">
                            {{ $category->title }}
                        </h6>

                        <!-- Decorative Line -->
                        <div
                            class="w-0 h-0.5 bg-primary-400 mt-2 group-hover:w-8 transition-all duration-300 rounded-full">
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <!-- Empty State -->
        <div class="flex flex-col items-center justify-center py-8 text-center">
            <span class="iconify text-4xl text-white/20 mb-3" data-icon="mdi:shape-outline"></span>
            <p class="text-white/40 text-sm">Tidak ada kategori yang tersedia.</p>
        </div>
    @endif
</div>
