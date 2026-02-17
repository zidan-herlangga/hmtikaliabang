<div class="space-y-6">
    @forelse ($posts as $post)
        <article
            class="group bg-dark-800/30 border border-white/10 rounded-2xl overflow-hidden hover:border-primary-500/30 transition-all duration-300">
            <div class="flex flex-col md:flex-row">

                {{-- Thumbnail --}}
                <div class="md:w-1/3 flex-shrink-0 overflow-hidden">
                    <a href="{{ route('frontend.post', $post->slug) }}" class="block h-full">
                        <img src="{{ asset('uploads/post/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                            class="w-full h-48 md:h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </a>
                </div>

                {{-- Content --}}
                <div class="p-6 flex flex-col justify-center flex-grow">
                    {{-- Category Badge --}}
                    <div class="mb-3">
                        <a href="{{ route('frontend.category', $post->category->slug ?? '#') }}"
                            class="text-xs font-semibold uppercase tracking-wider px-3 py-1 rounded-full bg-primary-600/20 text-primary-400 hover:bg-primary-600/40 transition-colors">
                            {{ $post->category->title ?? 'Uncategorized' }}
                        </a>
                    </div>

                    {{-- Title --}}
                    <h2 class="font-heading text-xl md:text-2xl font-bold text-white mb-3 leading-tight">
                        <a href="{{ route('frontend.post', $post->slug) }}"
                            class="hover:text-primary-400 transition-colors">
                            {{ $post->title }}
                        </a>
                    </h2>

                    {{-- Meta Date --}}
                    <div class="flex items-center text-white/50 text-sm mt-auto">
                        <span class="iconify mr-1.5" data-icon="mdi:calendar-outline"></span>
                        <span>{{ $post->created_at->format('F d, Y') }}</span>
                    </div>
                </div>
            </div>
        </article>
    @empty
        <div class="text-center py-16 bg-dark-800/20 rounded-2xl border border-white/10">
            <span class="iconify text-6xl text-white/20 mb-4" data-icon="mdi:tag-off-outline"></span>
            <h3 class="text-xl font-semibold text-white mb-2">Tidak Ada Postingan</h3>
            <p class="text-white/60">Tidak ada postingan yang terkait dengan tag ini.</p>
        </div>
    @endforelse

    {{-- Pagination --}}
    @if ($posts->hasPages())
        <div class="mt-10 flex justify-center">
            <nav class="flex items-center space-x-2">
                {{ $posts->appends(request()->query())->links('vendor.pagination.custom') }}
            </nav>
        </div>
    @endif
</div>
