@extends('dashboard.master')

@section('title', 'Dashboard')

@section('content')
    {{-- Content Header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark font-weight-bold">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    {{-- Main Content --}}
    <section class="content">
        <div class="container-fluid">

            {{-- Stats Cards --}}
            <div class="row">
                {{-- Posts Stats --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info shadow-sm">
                        <div class="inner">
                            <h3>{{ $posts ?? 0 }}</h3>
                            <p>Total Posts</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-pencil-alt"></i>
                        </div>
                        <a href="{{ route('dashboard.posts.index') }}" class="small-box-footer">
                            View Details <i class="fas fa-arrow-circle-right ml-1"></i>
                        </a>
                    </div>
                </div>

                {{-- Comments Stats --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success shadow-sm">
                        <div class="inner">
                            <h3>{{ $comments ?? 0 }}</h3>
                            <p>Total Comments</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-comment-alt"></i>
                        </div>
                        <a href="{{ route('dashboard.comments.index') }}" class="small-box-footer">
                            View Details <i class="fas fa-arrow-circle-right ml-1"></i>
                        </a>
                    </div>
                </div>

                {{-- Users Stats --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning shadow-sm">
                        <div class="inner">
                            <h3>{{ $users ?? 0 }}</h3>
                            <p>Total Users</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <a href="{{ route('dashboard.users.index') }}" class="small-box-footer">
                            View Details <i class="fas fa-arrow-circle-right ml-1"></i>
                        </a>
                    </div>
                </div>

                {{-- Categories Stats --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger shadow-sm">
                        <div class="inner">
                            <h3>{{ $categories ?? 0 }}</h3>
                            <p>Total Categories</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-th-list"></i>
                        </div>
                        <a href="{{ route('dashboard.categories.index') }}" class="small-box-footer">
                            View Details <i class="fas fa-arrow-circle-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Anda bisa menambahkan grafik atau tabel data terbaru di sini --}}

        </div>
    </section>
@endsection
