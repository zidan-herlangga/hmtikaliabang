@extends('frontend.master')

@section('title', ($post->title ?? 'Post') . ' - ' . config('app.sitesettings')::first()?->site_title)

@section('meta')
    @php
        $title = $post->title . ' - ' . config('app.sitesettings')::first()?->site_title;
        $description = \Illuminate\Support\Str::limit(strip_tags($post->content), 160);
        $image = !empty($post->thumbnail)
            ? asset('uploads/post/' . $post->thumbnail)
            : asset('uploads/post/default.webp');
        $url = request()->url();
    @endphp

    <!-- Open Graph -->
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:image" content="{{ $image }}">
    <meta property="og:url" content="{{ $url }}">
    <meta property="og:site_name" content="{{ config('app.sitesettings')::first()?->site_title }}">

    <!-- Article Meta -->
    <meta property="article:published_time" content="{{ $post->created_at->toIso8601String() }}">
    <meta property="article:author" content="{{ $post->user->name ?? '' }}">
    <meta property="article:section" content="{{ $post->category->title ?? '' }}">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title }}">
    <meta name="twitter:description" content="{{ $description }}">
    <meta name="twitter:image" content="{{ $image }}">
@endsection

{{-- CSS Kustom: Paksa Heading tampil Besar dan Putih --}}
<style>
    /* --- HEADING STYLES (Paling Penting) --- */
    .article-content h1 {
        font-size: 3rem;
        /* Ukuran sangat besar */
        font-weight: 800;
        /* Paling tebal */
        color: #ffffff;
        /* Putih bersih */
        font-family: 'Space Grotesk', sans-serif;
        /* Font khusus heading */
        margin-top: 2rem;
        margin-bottom: 1.5rem;
        line-height: 1.1;
    }

    .article-content h2 {
        font-size: 2.25rem;
        /* 36px */
        font-weight: 700;
        color: #f3f4f6;
        /* Putih sedikit pudar */
        font-family: 'Space Grotesk', sans-serif;
        margin-top: 1.8rem;
        margin-bottom: 1rem;
        line-height: 1.2;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        /* Garis bawah opsional */
        padding-bottom: 0.5rem;
    }

    .article-content h3 {
        font-size: 1.75rem;
        /* 28px */
        font-weight: 600;
        color: #e5e7eb;
        font-family: 'Space Grotesk', sans-serif;
        margin-top: 1.5rem;
        margin-bottom: 0.8rem;
    }

    .article-content h4,
    .article-content h5,
    .article-content h6 {
        font-size: 1.25rem;
        font-weight: 600;
        color: #d1d5db;
        margin-top: 1.2rem;
        margin-bottom: 0.5rem;
    }

    /* --- PARAGRAPH & TEXT --- */
    .article-content p {
        font-size: 1.125rem;
        /* 18px */
        line-height: 1.75;
        /* Jarak baris longgar */
        color: rgba(255, 255, 255, 0.8);
        /* Abu terang */
        margin-bottom: 1.5rem;
    }

    /* --- ELEMENT LAINNYA --- */
    .article-content ul,
    .article-content ol {
        padding-left: 2rem;
        margin-bottom: 1.5rem;
    }

    .article-content li {
        margin-bottom: 0.5rem;
        color: rgba(255, 255, 255, 0.8);
    }

    .article-content a {
        color: #a78bfa;
        /* Primary ungu */
        text-decoration: underline;
    }

    .article-content a:hover {
        color: #c4b5fd;
    }

    .article-content img {
        max-width: 100%;
        height: auto;
        border-radius: 0.75rem;
        margin: 2rem auto;
        display: block;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .article-content blockquote {
        border-left: 4px solid #7c3aed;
        background: rgba(124, 58, 237, 0.1);
        padding: 1rem 1.5rem;
        margin: 2rem 0;
        color: #e5e7eb;
        font-style: italic;
        border-radius: 0 0.5rem 0.5rem 0;
    }

    .article-content code {
        background: rgba(0, 0, 0, 0.3);
        padding: 0.2rem 0.4rem;
        border-radius: 0.25rem;
        font-size: 0.9em;
        color: #fbbf24;
        /* Kuning */
    }

    .article-content pre {
        background: #1e1b4b;
        padding: 1rem;
        border-radius: 0.5rem;
        overflow-x: auto;
        margin-bottom: 1.5rem;
    }
</style>

@section('content')
    <!-- Wrapper utama dengan padding dan warna background jika perlu -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <!-- Featured Image -->
        <div class="relative rounded-3xl overflow-hidden mb-8 shadow-2xl shadow-primary-900/20">
            @if (!empty($post->thumbnail))
                <img src="{{ asset('uploads/post/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                    class="w-full h-auto object-cover aspect-video" />
            @else
                <img src="{{ asset('uploads/post/default.webp') }}" alt="{{ $post->title }}"
                    class="w-full h-auto object-cover aspect-video bg-dark-800" />
            @endif

            <!-- Overlay Gradient di bawah gambar (opsional) -->
            <div class="absolute inset-0 bg-gradient-to-t from-dark-900/80 to-transparent pointer-events-none"></div>
        </div>

        <!-- Post Body -->
        <div class="bg-dark-800/50 backdrop-blur-sm border border-white/10 rounded-3xl p-6 md:p-10">

            <!-- Title & Meta -->
            <div class="mb-8 border-b border-white/10 pb-8">
                <h1 class="font-heading text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-6 leading-tight">
                    {{ $post->title }}
                </h1>

                <ul class="flex flex-wrap items-center gap-4 text-sm text-white/70">
                    <!-- Author Image -->
                    <li class="flex items-center gap-2">
                        <img src="{{ asset('uploads/author/' . ($post->user->profile ?? 'default.webp')) }}"
                            alt="{{ $post->user->name ?? 'Author' }}"
                            class="w-10 h-10 rounded-full object-cover border-2 border-primary-500" />
                    </li>
                    <!-- Author Name -->
                    <li class="font-medium text-white">
                        <a href="{{ route('frontend.user', $post->user->username ?? '#') }}"
                            class="hover:text-primary-400 transition-colors">
                            {{ $post->user->name ?? 'Unknown' }}
                        </a>
                    </li>
                    <!-- Separator -->
                    <li class="text-white/30">•</li>
                    <!-- Category -->
                    <li>
                        <a href="{{ route('frontend.category', $post->category->slug ?? '#') }}"
                            class="px-3 py-1 rounded-full bg-primary-600/20 text-primary-400 text-xs font-semibold uppercase tracking-wider hover:bg-primary-600/40 transition-colors">
                            {{ $post->category->title ?? 'Uncategorized' }}
                        </a>
                    </li>
                    <!-- Separator -->
                    <li class="text-white/30">•</li>
                    <!-- Date -->
                    <li>
                        <span class="iconify inline-block mr-1 opacity-60" data-icon="mdi:calendar-outline"></span>
                        {{ $post->created_at->format('F d, Y') }}
                    </li>
                </ul>
            </div>

            <!-- Post Content -->
            <div class="mt-8 article-content">
                {{-- Decode untuk memastikan tag HTML normal --}}
                {!! html_entity_decode($post->content) !!}
            </div>

            <!-- Tags & Share -->
            <div class="mt-10 pt-8 border-t border-white/10 flex flex-col md:flex-row justify-between items-start gap-6">

                <!-- Tags -->
                @if ($post->tags->isNotEmpty())
                    <div>
                        <p class="text-white/60 text-sm font-medium mb-3 uppercase tracking-wider">Tags</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($post->tags as $tag)
                                <a href="{{ route('frontend.tag', \Str::slug($tag->name)) }}"
                                    class="px-4 py-1.5 bg-white/5 hover:bg-primary-600/30 border border-white/10 hover:border-primary-500 rounded-full text-sm text-white/80 hover:text-white transition-all duration-200">
                                    #{{ $tag->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Share Buttons -->
                <div>
                    <p class="text-white/60 text-sm font-medium mb-3 uppercase tracking-wider">Bagikan</p>
                    <div class="flex items-center gap-3">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                            target="_blank" rel="noopener noreferrer"
                            class="w-10 h-10 rounded-full bg-white/5 border border-white/10 hover:bg-blue-600 hover:border-blue-600 flex items-center justify-center transition-all duration-200">
                            <span class="iconify text-xl" data-icon="mdi:facebook"></span>
                        </a>
                        {{-- X --}}
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($post->title) }}"
                            target="_blank" rel="noopener noreferrer"
                            class="w-10 h-10 rounded-full bg-white/5 border border-white/10 hover:bg-sky-500 hover:border-sky-500 flex items-center justify-center transition-all duration-200">
                            <span class="iconify text-xl" data-icon="mdi:twitter"></span>
                        </a>
                        {{-- Linkedin --}}
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}&title={{ urlencode($post->title) }}"
                            target="_blank" rel="noopener noreferrer"
                            class="w-10 h-10 rounded-full bg-white/5 border border-white/10 hover:bg-blue-700 hover:border-blue-700 flex items-center justify-center transition-all duration-200">
                            <span class="iconify text-xl" data-icon="mdi:linkedin"></span>
                        </a>
                        {{-- Pinterest --}}
                        {{-- <a href="https://pinterest.com/pin/create/button/?url={{ urlencode(request()->url()) }}&media={{ urlencode(asset('uploads/post/' . $post->thumbnail)) }}&description={{ urlencode($post->title) }}"
                            target="_blank" rel="noopener noreferrer"
                            class="w-10 h-10 rounded-full bg-white/5 border border-white/10 hover:bg-red-600 hover:border-red-600 flex items-center justify-center transition-all duration-200">
                            <span class="iconify text-xl" data-icon="mdi:pinterest"></span>
                        </a> --}}
                        {{-- Whatsapp --}}
                        <a href="https://api.whatsapp.com/send?text={{ urlencode($post->title . ' - ' . request()->url()) }}"
                            target="_blank" rel="noopener noreferrer"
                            class="w-10 h-10 rounded-full bg-white/5 border border-white/10 hover:bg-green-500 hover:border-green-500 flex items-center justify-center transition-all duration-200">
                            <span class="iconify text-xl" data-icon="mdi:whatsapp"></span>
                        </a>
                        {{-- Salin Link --}}
                        <button onclick="navigator.clipboard.writeText('{{ request()->url() }}')"
                            class="w-10 h-10 rounded-full bg-white/5 border border-white/10 hover:bg-gray-600 hover:border-gray-600 flex items-center justify-center transition-all duration-200">
                            <span class="iconify text-xl" data-icon="mdi:link"></span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Author Box & Comments -->
            @include('frontend.post.inc.author')
            @include('frontend.post.inc.comment')

        </div>
    </div>
@endsection
