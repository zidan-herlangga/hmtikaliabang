@if ($categories->count() > 0)
    <div class="w-full">
        <!-- Section Header -->
        <div class="flex items-center justify-between mb-8">
            <h2 class="font-heading text-2xl font-bold text-white">
                Explore Categories
            </h2>
            <div class="w-16 h-1 bg-gradient-to-r from-primary-500 to-accent-400 rounded-full"></div>
        </div>

        <!-- Categories Grid -->
        <!-- Grid 6 kolom di desktop, 3 di tablet, 2 di mobile. Gap 16px. -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
            @foreach ($categories as $category)
                <a href="{{ route('frontend.category', $category->slug) }}"
                    class="group relative block rounded-xl overflow-hidden aspect-square shadow-lg cursor-pointer">

                    <!-- Background Image -->
                    <img src="{{ asset('uploads/category/' . ($category->image ?? 'default.webp')) }}"
                        alt="{{ $category->title }}"
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-110">

                    <!-- Gradient Overlay -->
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-dark-900 via-dark-900/50 to-transparent opacity-90 group-hover:opacity-95 transition-opacity duration-300">
                    </div>

                    <!-- Content -->
                    <div class="absolute inset-0 p-4 flex flex-col justify-end items-center text-center">

                        <!-- Title -->
                        <h3
                            class="font-heading font-semibold text-white text-sm sm:text-base leading-tight mb-2 transition-colors duration-300 group-hover:text-accent-400">
                            {{ $category->title }}
                        </h3>

                        <!-- Post Count Badge -->
                        <span
                            class="inline-flex items-center px-2.5 py-1 rounded-full bg-white/10 backdrop-blur-sm text-xs font-medium text-white/80 border border-white/10">
                            <span class="iconify mr-1 text-primary-300" data-icon="mdi:file-document-outline"></span>
                            {{ count($category->posts->where('status', true)) }} Posts
                        </span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endif
