@extends('frontend.master')

@section('title', 'Posts tagged "' . $tag . '" - ' . config('app.sitesettings')::first()?->site_title)

@section('content')
    <!-- Header Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="mb-8 border-b border-white/10 pb-8 text-center">
            <span
                class="inline-block px-4 py-1.5 rounded-full bg-primary-600/20 text-primary-400 text-sm font-semibold uppercase tracking-wider mb-4">
                Tag
            </span>
            <h1 class="font-heading text-3xl md:text-4xl font-bold text-white mb-2">
                Posts tagged "{{ $tag }}"
            </h1>
            <p class="text-white/60 text-lg">
                Temukan semua postingan yang terkait dengan tag "{{ $tag }}". Jelajahi berbagai topik menarik yang
                telah kami bahas seputar {{ $tag }} di sini.
            </p>
        </div>
    </div>

    <!-- Content Section -->
    <section class="pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-12">

                <!-- Post List (Include) -->
                <div class="w-full lg:w-2/3">
                    @include('frontend.tag.inc.post')
                </div>

                <!-- Sidebar (Include) -->
                <div class="w-full lg:w-1/3">
                    @include('frontend.tag.inc.sidebar')
                </div>

            </div>
        </div>
    </section>
@endsection
