<div class="lg:col-span-2">
    <!-- Section Header -->
    <div class="mb-10">
        <h2 class="font-heading text-2xl sm:text-3xl font-bold text-white mb-2">Artikel Terbaru</h2>
        <p class="text-white/50">Temukan artikel terbaik.</p>
        <div class="w-16 h-1 bg-gradient-to-r from-primary-500 to-accent-400 rounded-full mt-4"></div>
    </div>

    <!-- Post List -->
    <div class="space-y-6">
        @forelse ($recentposts as $recentpost)
            <article
                class="group flex flex-col sm:flex-row bg-dark-800/30 border border-white/10 rounded-xl overflow-hidden hover:border-primary-500/40 transition-all duration-300 hover:shadow-xl hover:shadow-primary-500/5">

                <!-- Thumbnail -->
                <div class="relative sm:w-1/3 flex-shrink-0 overflow-hidden">
                    <a href="{{ route('frontend.post', $recentpost->slug) }}"
                        class="block aspect-video sm:aspect-auto sm:h-full">
                        <img src="{{ asset('uploads/post/' . $recentpost->thumbnail) }}" alt="{{ $recentpost->title }}"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    </a>
                </div>

                <!-- Content -->
                <div class="flex-1 p-5 sm:p-6 flex flex-col justify-center">
                    <!-- Meta: Category & Date -->
                    <div class="flex items-center flex-wrap gap-x-4 gap-y-1 text-sm text-white/50 mb-3">
                        <a href="{{ route('frontend.category', $recentpost->category->slug) }}"
                            class="inline-flex items-center text-primary-400 hover:text-primary-300 transition-colors font-medium">
                            <span class="w-2 h-2 bg-primary-500 rounded-full mr-2"></span>
                            {{ $recentpost->category->title }}
                        </a>
                        <span class="flex items-center">
                            <span class="iconify text-white/30 mr-1.5" data-icon="mdi:calendar-outline"></span>
                            {{ $recentpost->created_at->format('M d, Y') }}
                        </span>
                    </div>

                    <!-- Title -->
                    <h3
                        class="font-heading text-lg font-semibold text-white mb-4 line-clamp-2 group-hover:text-primary-300 transition-colors">
                        <a href="{{ route('frontend.post', $recentpost->slug) }}">
                            {{ $recentpost->title }}
                        </a>
                    </h3>

                    <!-- Read More Button -->
                    <a href="{{ route('frontend.post', $recentpost->slug) }}"
                        class="inline-flex items-center text-sm font-medium text-white/70 hover:text-primary-400 transition-colors group/link mt-auto">
                        <span>Lanjutkan Membaca</span>
                        <span class="iconify ml-1 transform group-hover/link:translate-x-1 transition-transform"
                            data-icon="mdi:arrow-right"></span>
                    </a>
                </div>
            </article>
        @empty
            <!-- Empty State -->
            <div class="text-center py-16 bg-dark-800/20 rounded-xl border border-white/10">
                <span class="iconify text-5xl text-white/10 mb-4" data-icon="mdi:file-document-outline"></span>
                <p class="text-white/40">Tidak ada artikel terbaru yang tersedia.</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if ($recentposts->hasPages())
        <div class="mt-12 pt-8 border-t border-white/10">
            {{ $recentposts->links('vendor.pagination.custom') }}
        </div>
    @endif
</div>
