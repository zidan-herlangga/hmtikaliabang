<div
    class="mt-12 p-6 md:p-8 bg-dark-800/50 backdrop-blur-sm border border-white/10 rounded-3xl flex flex-col md:flex-row items-center gap-6 md:gap-8 transition-all duration-300 hover:border-primary-500/30">

    <!-- Author Image -->
    <div class="flex-shrink-0">
        <a href="{{ route('frontend.user', $post->user->username ?? '#') }}" class="block">
            <img src="{{ asset('uploads/author/' . ($post->user->profile ?? 'default.webp')) }}"
                alt="{{ $post->user->name ?? 'Author' }}"
                class="w-24 h-24 md:w-32 md:h-32 rounded-full object-cover border-2 border-primary-500/50 shadow-lg shadow-primary-900/30 hover:scale-105 transition-transform duration-300" />
        </a>
    </div>

    <!-- Author Info -->
    <div class="flex-grow text-center md:text-left">
        <a href="{{ route('frontend.user', $post->user->username ?? '#') }}"
            class="hover:text-primary-400 transition-colors">
            <h4 class="font-heading text-xl md:text-2xl font-bold text-white mb-2">
                {{ $post->user->name ?? 'Unknown Author' }}
            </h4>
        </a>

        @if (!empty($post->user->about))
            <p class="text-white/60 text-sm md:text-base mb-4 leading-relaxed">
                {{ $post->user->about }}
            </p>
        @endif

        <!-- Social Media Icons -->
        <div class="flex items-center justify-center md:justify-start gap-3">
            @if (!empty($post->user->facebook))
                <a href="{{ $post->user->facebook }}" target="_blank" rel="noopener noreferrer"
                    class="w-9 h-9 rounded-full bg-white/5 hover:bg-blue-600 border border-white/10 hover:border-blue-600 flex items-center justify-center transition-all duration-200">
                    <span class="iconify text-lg text-white/80 hover:text-white" data-icon="mdi:facebook"></span>
                </a>
            @endif

            @if (!empty($post->user->instagram))
                <a href="{{ $post->user->instagram }}" target="_blank" rel="noopener noreferrer"
                    class="w-9 h-9 rounded-full bg-white/5 hover:bg-pink-600 border border-white/10 hover:border-pink-600 flex items-center justify-center transition-all duration-200">
                    <span class="iconify text-lg text-white/80 hover:text-white" data-icon="mdi:instagram"></span>
                </a>
            @endif

            @if (!empty($post->user->twitter))
                <a href="{{ $post->user->twitter }}" target="_blank" rel="noopener noreferrer"
                    class="w-9 h-9 rounded-full bg-white/5 hover:bg-sky-500 border border-white/10 hover:border-sky-500 flex items-center justify-center transition-all duration-200">
                    <span class="iconify text-lg text-white/80 hover:text-white" data-icon="mdi:twitter"></span>
                </a>
            @endif

            @if (!empty($post->user->youtube))
                <a href="{{ $post->user->youtube }}" target="_blank" rel="noopener noreferrer"
                    class="w-9 h-9 rounded-full bg-white/5 hover:bg-red-600 border border-white/10 hover:border-red-600 flex items-center justify-center transition-all duration-200">
                    <span class="iconify text-lg text-white/80 hover:text-white" data-icon="mdi:youtube"></span>
                </a>
            @endif

            @if (!empty($post->user->pinterest))
                <a href="{{ $post->user->pinterest }}" target="_blank" rel="noopener noreferrer"
                    class="w-9 h-9 rounded-full bg-white/5 hover:bg-red-500 border border-white/10 hover:border-red-500 flex items-center justify-center transition-all duration-200">
                    <span class="iconify text-lg text-white/80 hover:text-white" data-icon="mdi:pinterest"></span>
                </a>
            @endif
        </div>
    </div>
</div>
