@extends('frontend.master')

@section('title', ($user->name ?? 'Author') . ' - ' . config('app.sitesettings')::first()?->site_title)

@section('content')
    <!-- Author Header Section (Memanggil komponen profil yang sudah kita buat sebelumnya) -->
    @include('frontend.user.inc.author')

    <!-- Main Content Section -->
    <section class="pb-24 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-12">

                <!-- Post List (Kolom Kiri - 2/3 lebar) -->
                <div class="w-full lg:w-2/3">
                    @include('frontend.user.inc.post')
                </div>

                <!-- Sidebar (Kolom Kanan - 1/3 lebar) -->
                <div class="w-full lg:w-1/3">
                    @include('frontend.user.inc.sidebar')
                </div>

            </div>
        </div>
    </section>
@endsection
