@if ($featuredposts->count() > 0)
    <!-- Featured Posts Slider Section -->
    <section class="relative w-full h-[60vh] sm:h-[70vh] lg:h-[80vh] overflow-hidden bg-dark-900">

        <!-- Swiper Container -->
        <div class="swiper featured-swiper w-full h-full">
            <div class="swiper-wrapper">
                @foreach ($featuredposts as $featuredpost)
                    <!-- Slide Item -->
                    <div class="swiper-slide relative">
                        <!-- Background Image -->
                        <div class="absolute inset-0">
                            <img src="{{ asset('uploads/post/' . $featuredpost->thumbnail) }}"
                                alt="{{ $featuredpost->title }}" class="w-full h-full object-cover">
                            <!-- Overlay Gradient -->
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-dark-900 via-dark-900/60 to-transparent opacity-90">
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-r from-dark-900/80 to-transparent"></div>
                        </div>

                        <!-- Content Overlay -->
                        <div class="relative h-full flex items-end">
                            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full pb-16 md:pb-24">
                                <div class="max-w-2xl">

                                    <!-- Category Badge -->
                                    <a href="{{ route('frontend.category', $featuredpost->category->slug) }}"
                                        class="inline-flex items-center px-3 py-1 mb-4 text-sm font-medium text-primary-300 bg-primary-900/50 border border-primary-500/30 rounded-full hover:bg-primary-500/20 transition-colors">
                                        <span class="iconify mr-1.5" data-icon="mdi:folder-outline"></span>
                                        {{ $featuredpost->category->title }}
                                    </a>

                                    <!-- Title -->
                                    <h1
                                        class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-white leading-tight mb-4">
                                        <a href="{{ route('frontend.post', $featuredpost->slug) }}"
                                            class="hover:text-primary-300 transition-colors">
                                            {{ $featuredpost->title }}
                                        </a>
                                    </h1>

                                    <!-- Meta Info -->
                                    <div class="flex items-center flex-wrap gap-4 text-sm text-white/70">
                                        <!-- Author -->
                                        <a href="{{ route('frontend.user', $featuredpost->user->username) }}"
                                            class="flex items-center space-x-2 hover:text-white transition-colors">
                                            <img src="{{ asset('uploads/author/' . ($featuredpost->user->profile ?? 'default.webp')) }}"
                                                alt="{{ $featuredpost->user->name }}"
                                                class="w-8 h-8 rounded-full object-cover border-2 border-primary-500">
                                            <span>{{ $featuredpost->user->name }}</span>
                                        </a>

                                        <!-- Date -->
                                        <div class="flex items-center space-x-2">
                                            <span class="iconify text-primary-400"
                                                data-icon="mdi:calendar-outline"></span>
                                            <span>{{ $featuredpost->created_at->format('F d, Y') }}</span>
                                        </div>

                                        <!-- Reading Time -->
                                        <div class="flex items-center space-x-2">
                                            <span class="iconify text-primary-400" data-icon="mdi:clock-outline"></span>
                                            <span>{{ $featuredpost->readTime() }}</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Navigation Buttons -->
            <div class="absolute bottom-8 right-4 sm:right-8 lg:right-12 z-20 flex items-center space-x-3">
                <button
                    class="swiper-prev w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-white hover:bg-primary-600 hover:border-primary-600 transition-all flex items-center justify-center">
                    <span class="iconify text-xl" data-icon="mdi:chevron-left"></span>
                </button>
                <button
                    class="swiper-next w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-white hover:bg-primary-600 hover:border-primary-600 transition-all flex items-center justify-center">
                    <span class="iconify text-xl" data-icon="mdi:chevron-right"></span>
                </button>
            </div>

            <!-- Pagination Dots -->
            <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-20 flex space-x-2">
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!-- Swiper CSS & JS (Add to your layout or include here) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Swiper('.featured-swiper', {
                loop: true,
                speed: 800,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    renderBullet: function(index, className) {
                        return '<span class="' + className +
                            ' w-2 h-2 bg-white/50 rounded-full transition-all duration-300 hover:bg-white"></span>';
                    },
                },
                navigation: {
                    nextEl: '.swiper-next',
                    prevEl: '.swiper-prev',
                },
            });
        });
    </script>
@endif
