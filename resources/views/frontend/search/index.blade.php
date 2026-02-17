@extends('frontend.master')

@section('title', config('app.sitesettings')::first()->site_title . ' - ' .
    config('app.sitesettings')::first()->tagline)

@section('content')

    <!-- Featured Post Section (Full Width) -->
    <section class="relative">
        @include('frontend.search.inc.header')
    </section>


    <!-- Main Content Area (Recent Posts + Sidebar) -->
    <section class="py-16 lg:py-24 bg-dark-900 relative overflow-hidden">
        <!-- Background Decoration -->
        <div
            class="absolute top-0 right-0 w-96 h-96 bg-primary-900/30 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2">
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-12">

                <!-- Posts Column (Main Content) -->
                <div class="lg:col-span-2">
                    @include('frontend.search.inc.post')
                </div>

                <!-- Sidebar Column (Widgets) -->
                <aside class="lg:col-span-1 space-y-8">
                    <div class="sticky top-24 space-y-8">
                        @include('frontend.home.inc.sidebar')
                    </div>
                </aside>

            </div>
        </div>
    </section>

@endsection
