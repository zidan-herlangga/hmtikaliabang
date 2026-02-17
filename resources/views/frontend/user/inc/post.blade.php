<div class="w-full lg:w-2/3">
    <div class="space-y-8">
        @forelse ($posts as $post)
            <article
                class="group bg-dark-800/30 border border-white/10 rounded-2xl overflow-hidden hover:border-primary-500/30 transition-all duration-300">
                <div class="flex flex-col md:flex-row">

                    {{-- Thumbnail --}}
                    <div class="md:w-1/3 flex-shrink-0 overflow-hidden">
                        <a href="{{ route('frontend.post', $post->slug) }}" class="block h-full">
                            <img src="{{ asset('uploads/post/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                                class="w-full h-56 md:h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </a>
                    </div>

                    {{-- Content --}}
                    <div class="p-6 flex flex-col justify-center flex-grow">
                        {{-- Meta Info --}}
                        <div class="flex items-center gap-4 text-sm text-white/50 mb-3">
                            <a href="{{ route('frontend.category', $post->category->slug ?? '#') }}"
                                class="text-primary-400 hover:text-primary-300 font-medium uppercase tracking-wider text-xs">
                                {{ $post->category->title ?? 'Uncategorized' }}
                            </a>
                            <span class="flex items-center gap-1">
                                <span class="iconify" data-icon="mdi:calendar-outline"></span>
                                {{ $post->created_at->format('F d, Y') }}
                            </span>
                        </div>

                        {{-- Title --}}
                        <h2 class="font-heading text-xl md:text-2xl font-bold text-white mb-4 leading-tight">
                            <a href="{{ route('frontend.post', $post->slug) }}"
                                class="hover:text-primary-400 transition-colors">
                                {{ $post->title }}
                            </a>
                        </h2>

                        {{-- Read More Button --}}
                        <div class="mt-auto">
                            <a href="{{ route('frontend.post', $post->slug) }}"
                                class="inline-flex items-center gap-2 text-sm font-semibold text-white/70 hover:text-primary-400 group/link">
                                <span>Lanjut Membaca</span>
                                <span class="iconify transform group-hover/link:translate-x-1 transition-transform"
                                    data-icon="mdi:arrow-right"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </article>
        @empty
            <div class="text-center py-16 bg-dark-800/20 rounded-2xl border border-white/10">
                <span class="iconify text-6xl text-white/20 mb-4" data-icon="mdi:file-document-outline"></span>
                <h3 class="text-xl font-semibold text-white mb-2">Tidak Ada Postingan</h3>
                <p class="text-white/60">Penulis ini belum mempublikasikan postingan apapun.</p>
            </div>
        @endforelse

        {{-- Pagination --}}
        @if ($posts->hasPages())
            <div class="mt-12 flex justify-center">
                <nav class="flex items-center space-x-2">
                    {{ $posts->appends(request()->query())->links('vendor.pagination.custom') }}
                </nav>
            </div>
        @endif
    </div>
</div>
