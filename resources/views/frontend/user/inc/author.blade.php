<section class="relative py-16 overflow-hidden">
    <!-- Background Decoration -->
    <div class="absolute inset-0 bg-gradient-to-b from-dark-900 to-dark-800"></div>
    <div class="absolute top-0 left-0 w-72 h-72 bg-primary-600/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-accent-400/5 rounded-full blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div
            class="bg-dark-800/50 backdrop-blur-md border border-white/10 rounded-3xl p-8 md:p-12 flex flex-col md:flex-row items-center gap-8">

            <!-- Profile Image -->
            <div class="flex-shrink-0">
                <a href="{{ route('frontend.user', $user->username) }}">
                    <img src="{{ asset('uploads/author/' . ($user->profile ?? 'default.webp')) }}"
                        alt="{{ $user->name }}"
                        class="w-32 h-32 md:w-40 md:h-40 rounded-full object-cover border-4 border-primary-500/50 shadow-xl shadow-primary-900/30">
                </a>
            </div>

            <!-- Profile Info -->
            <div class="flex-grow text-center md:text-left">
                <h1 class="font-heading text-3xl md:text-4xl font-bold text-white mb-2">
                    {{ $user->name }}
                </h1>
                <p class="text-white/60 text-sm mb-4">
                    <span class="iconify inline-block mr-1" data-icon="mdi:account-circle-outline"></span>
                    {{ $user->username }}
                </p>

                @if ($user->about)
                    <p class="text-white/80 text-lg max-w-2xl mb-6 leading-relaxed">
                        {{ $user->about }}
                    </p>
                @endif

                <!-- Social Icons -->
                <div class="flex items-center justify-center md:justify-start gap-3">
                    @if ($user->facebook)
                        <a href="{{ $user->facebook }}" target="_blank" rel="noopener noreferrer"
                            class="w-10 h-10 rounded-full bg-white/5 hover:bg-blue-600 border border-white/10 hover:border-blue-600 flex items-center justify-center transition-all duration-200">
                            <span class="iconify text-xl text-white/80 hover:text-white"
                                data-icon="mdi:facebook"></span>
                        </a>
                    @endif
                    @if ($user->twitter)
                        <a href="{{ $user->twitter }}" target="_blank" rel="noopener noreferrer"
                            class="w-10 h-10 rounded-full bg-white/5 hover:bg-sky-500 border border-white/10 hover:border-sky-500 flex items-center justify-center transition-all duration-200">
                            <span class="iconify text-xl text-white/80 hover:text-white" data-icon="mdi:twitter"></span>
                        </a>
                    @endif
                    @if ($user->instagram)
                        <a href="{{ $user->instagram }}" target="_blank" rel="noopener noreferrer"
                            class="w-10 h-10 rounded-full bg-white/5 hover:bg-pink-600 border border-white/10 hover:border-pink-600 flex items-center justify-center transition-all duration-200">
                            <span class="iconify text-xl text-white/80 hover:text-white"
                                data-icon="mdi:instagram"></span>
                        </a>
                    @endif
                    @if ($user->linkedin)
                        <a href="{{ $user->linkedin }}" target="_blank" rel="noopener noreferrer"
                            class="w-10 h-10 rounded-full bg-white/5 hover:bg-blue-700 border border-white/10 hover:border-blue-700 flex items-center justify-center transition-all duration-200">
                            <span class="iconify text-xl text-white/80 hover:text-white"
                                data-icon="mdi:linkedin"></span>
                        </a>
                    @endif
                    @if ($user->youtube)
                        <a href="{{ $user->youtube }}" target="_blank" rel="noopener noreferrer"
                            class="w-10 h-10 rounded-full bg-white/5 hover:bg-red-600 border border-white/10 hover:border-red-600 flex items-center justify-center transition-all duration-200">
                            <span class="iconify text-xl text-white/80 hover:text-white" data-icon="mdi:youtube"></span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
