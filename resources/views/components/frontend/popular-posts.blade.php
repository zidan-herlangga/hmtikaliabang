<!-- Popular Posts Widget -->
<div class="w-full">
    <!-- Widget Title -->
    <div class="mb-6">
        <h5 class="font-heading text-lg font-semibold text-white relative inline-block">
            Popular Posts
            <span
                class="absolute bottom-0 left-0 w-12 h-0.5 bg-gradient-to-r from-primary-500 to-accent-400 rounded-full -mb-1"></span>
        </h5>
    </div>

    <!-- Widget Content -->
    <div class="space-y-4">
        @forelse ($popularposts as $popularpost)
            <article
                class="group flex items-start space-x-4 p-3 rounded-xl hover:bg-white/5 transition-all duration-300">

                <!-- Thumbnail with Rank -->
                <div class="relative flex-shrink-0 w-20 h-20 sm:w-24 sm:h-24">
                    <a href="{{ route('frontend.post', $popularpost->slug) }}"
                        class="block w-full h-full rounded-lg overflow-hidden">
                        <img src="{{ asset('uploads/post/' . $popularpost->thumbnail) }}" alt="{{ $popularpost->title }}"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    </a>
                    <!-- Rank Badge -->
                    <span
                        class="absolute -top-2 -left-2 w-7 h-7 bg-gradient-to-br from-primary-500 to-primary-600 rounded-full flex items-center justify-center text-xs font-bold text-white shadow-lg shadow-primary-500/30">
                        {{ $loop->iteration }}
                    </span>
                </div>

                <!-- Post Info -->
                <div class="flex-1 min-w-0 pt-1">
                    <h6
                        class="font-heading font-medium text-white group-hover:text-primary-400 transition-colors duration-300 line-clamp-2 mb-2">
                        <a href="{{ route('frontend.post', $popularpost->slug) }}">
                            {{ $popularpost->title }}
                        </a>
                    </h6>
                    <p class="text-sm text-white/40 flex items-center">
                        <span class="iconify mr-1.5 text-primary-400" data-icon="mdi:clock-outline"></span>
                        {{ $popularpost->created_at->diffForHumans() }}
                    </p>
                </div>
            </article>
        @empty
            <!-- Empty State -->
            <div class="flex flex-col items-center justify-center py-8 text-center">
                <span class="iconify text-4xl text-white/20 mb-3" data-icon="mdi:file-document-outline"></span>
                <p class="text-white/40 text-sm">Tidak ada artikel populer yang tersedia.</p>
            </div>
        @endforelse
    </div>
</div>
