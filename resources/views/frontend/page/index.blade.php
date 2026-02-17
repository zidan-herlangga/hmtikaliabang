@extends('frontend.master')

@section('title', ($page->title ?? 'Page') . ' - ' . config('app.sitesettings')::first()?->site_title)

@section('content')
    <div class="section-heading">
        <div class="container-fluid">
            <div class="section-heading-2">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-heading-2-title">
                            <h1>{{ $page->title ?? 'Page Title' }}</h1>
                            {{-- Added aria-label for accessibility --}}
                            <nav aria-label="breadcrumb">
                                <p class="links">
                                    <a href="{{ route('frontend.home') }}">Beranda <i class="las la-angle-right"></i></a>
                                    {{ $page->title ?? 'Current Page' }}
                                </p>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="post-single mt-1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="description">
                        {!! $page->content !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
