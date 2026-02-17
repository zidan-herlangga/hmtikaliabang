@extends('frontend.master')

@section('title', $category->title . ' - ' . config('app.sitesettings')::first()->site_title)

@section('content')
    <!-- Page Header / Banner -->
    <section class="relative py-20 overflow-hidden">
        <!-- Background Gradient -->
        <div class="absolute inset-0 bg-gradient-to-br from-primary-900 via-dark-900 to-dark-900"></div>

        <!-- Decorative Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-primary-600/20 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-1/4 w-72 h-72 bg-accent-500/10 rounded-full blur-3xl"></div>
            <div class="absolute inset-0 opacity-20"
                style="background-image: radial-gradient(circle at 1px 1px, rgba(255,255,255,0.15) 1px, transparent 0); background-size: 40px 40px;">
            </div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span
                class="inline-flex items-center px-4 py-1.5 rounded-full bg-primary-500/20 border border-primary-500/30 text-primary-300 text-sm font-medium mb-6">
                <span class="iconify mr-2" data-icon="mdi:folder-outline"></span>
                Category
            </span>
            <h1 class="font-heading text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-6 tracking-tight">
                {{ $category->title }}
            </h1>

            <!-- Breadcrumb -->
            <nav class="flex items-center justify-center space-x-2 text-sm text-white/60">
                <a href="{{ route('frontend.home') }}" class="hover:text-white transition-colors">Beranda</a>
                <span class="iconify" data-icon="mdi:chevron-right"></span>
                <span class="text-white font-medium">{{ $category->title }}</span>
            </nav>
        </div>
    </section>

    <!-- Main Content Area -->
    <section class="py-16 lg:py-24 bg-dark-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-12">

                <!-- Posts List (Main Column) -->
                <div class="lg:col-span-2 space-y-8">

                    @forelse ($posts as $post)
                        <article
                            class="group bg-dark-800/50 border border-white/10 rounded-2xl overflow-hidden hover:border-primary-500/50 transition-all duration-500 hover:shadow-xl hover:shadow-primary-500/5">
                            <div class="flex flex-col md:flex-row">
                                <!-- Thumbnail -->
                                <div class="relative md:w-2/5 lg:w-1/3 flex-shrink-0 overflow-hidden">
                                    <a href="{{ route('frontend.post', $post->slug) }}"
                                        class="block aspect-[4/3] md:aspect-auto md:h-full">
                                        <img src="{{ asset('uploads/post/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                    </a>
                                    <!-- Date Badge (Optional Aesthetic) -->
                                    <div
                                        class="absolute top-4 left-4 bg-dark-900/80 backdrop-blur-sm px-3 py-1 rounded-full text-xs text-white/80 border border-white/10">
                                        {{ $post->created_at->format('M d, Y') }}
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="flex-1 p-6 flex flex-col justify-center">
                                    <!-- Meta Info -->
                                    <div class="flex items-center space-x-4 text-sm text-white/50 mb-3">
                                        <!-- Author -->
                                        <a href="{{ route('frontend.user', $post->user->username) }}"
                                            class="flex items-center space-x-2 hover:text-primary-400 transition-colors">
                                            <img src="{{ asset('uploads/author/' . ($post->user->profile ?? 'default.webp')) }}"
                                                alt="{{ $post->user->name }}"
                                                class="w-6 h-6 rounded-full object-cover border border-white/20">
                                            <span>{{ $post->user->name }}</span>
                                        </a>
                                        <!-- Separator -->
                                        <span class="w-1 h-1 bg-white/30 rounded-full"></span>
                                        <!-- Category -->
                                        <a href="{{ route('frontend.category', $post->category->slug) }}"
                                            class="hover:text-accent-400 transition-colors">
                                            {{ $post->category->title }}
                                        </a>
                                    </div>

                                    <!-- Title -->
                                    <h3
                                        class="font-heading text-xl font-semibold text-white mb-3 group-hover:text-primary-400 transition-colors">
                                        <a href="{{ route('frontend.post', $post->slug) }}">
                                            {{ $post->title }}
                                        </a>
                                    </h3>

                                    <!-- Excerpt -->
                                    <p class="text-white/60 text-sm leading-relaxed mb-4 line-clamp-2">
                                        {{ $str::words(strip_tags($post->content), 20) }}
                                    </p>

                                    <!-- Read More Button -->
                                    <a href="{{ route('frontend.post', $post->slug) }}"
                                        class="inline-flex items-center text-sm font-medium text-primary-400 hover:text-primary-300 transition-colors group/link">
                                        <span>Lanjutkan Membaca</span>
                                        <span
                                            class="iconify ml-1 transform group-hover/link:translate-x-1 transition-transform"
                                            data-icon="mdi:arrow-right"></span>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @empty
                        <!-- Empty State -->
                        <div class="text-center py-20 bg-dark-800/30 rounded-2xl border border-white/10">
                            <span class="iconify text-6xl text-white/10 mb-4" data-icon="mdi:file-document-outline"></span>
                            <h3 class="font-heading text-xl text-white/60 mb-2">Tidak ada artikel ditemukan</h3>
                            <p class="text-white/40 text-sm">Tidak ada artikel dalam kategori ini.</p>
                        </div>
                    @endforelse

                    <!-- Pagination -->
                    @if ($posts->hasPages())
                        <div class="pt-8 border-t border-white/10">
                            {{ $posts->links('vendor.pagination.custom') }}
                        </div>
                    @endif
                </div>

                <!-- Sidebar (Widget Area) -->
                <aside class="lg:col-span-1">
                    <!-- Sticky Container: Hentinya 100px dari atas (top-24/96px) dengan padding top 32px (pt-8) -->
                    <div class="sticky top-24 pt-8 space-y-8">

                        <!-- Widget 1: Search -->
                        <div class="p-6 bg-dark-800/50 border border-white/10 rounded-2xl">
                            <x-frontend.sidebar-search />
                        </div>

                        <!-- Widget 2: Categories -->
                        <div class="p-6 bg-dark-800/50 border border-white/10 rounded-2xl">
                            <x-frontend.sidebar-category />
                        </div>

                        <!-- Widget 3: Popular Posts -->
                        <div class="p-6 bg-dark-800/50 border border-white/10 rounded-2xl">
                            <x-frontend.popular-posts />
                        </div>

                        <!-- Widget 4: Social Media -->
                        {{-- <div class="p-6 bg-dark-800/50 border border-white/10 rounded-2xl">
                            <x-frontend.sidebar-social />
                        </div> --}}

                        <!-- Widget 5: Tags -->
                        <div class="p-6 bg-dark-800/50 border border-white/10 rounded-2xl">
                            <x-frontend.tags />
                        </div>

                    </div>
                </aside>

            </div>
        </div>
    </section>
@endsection
